<?php
include("zaglavlje.php");
$bp=spojiSeNaBazu();
?>

<?php
    $sql="SELECT COUNT(*) FROM pjesma WHERE korisnik_id=$aktivni_korisnik_id";
    $rs=izvrsiUpit($bp,$sql);
    $red=mysqli_fetch_array($rs);
    $broj_redaka=$red[0];
    $broj_stranica=ceil($broj_redaka/$vel_str_pjesma);
    $sql="SELECT * FROM pjesma WHERE korisnik_id=$aktivni_korisnik_id ORDER BY broj_svidanja DESC LIMIT ".$vel_str_pjesma;

    if(isset($_GET['stranica'])){
        $sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_pjesma);
        $aktivna=$_GET['stranica'];
    }

    else $aktivna=1;
    $rs=izvrsiUpit($bp,$sql);

echo "<table>
<caption>Popis mojih pjesama</caption><thead><tr>
<th>Naziv pjesme</th>
<th>Audio pjesme</th>
<th>Opis pjesme</th>
<th>Datum i vrijeme kreiranja</th>
<th>Datum i vrijeme kupnje</th>
<th>Medijska kuća</th>
<th>Broj sviđanja</th>
<th></th>
</tr></thead>
<tbody>";

while(list($pjesma_id, $korisnik_id, $medijska_kuca_id, $naziv, $poveznica, $opis, $datum_vrijeme_kreiranja, $datum_vrijeme_kupnje, $broj_svidanja) = mysqli_fetch_array($rs)){
    echo "<tr ";
    if ($aktivni_korisnik_tip <= 1){
        echo "class='nekupljeno' ";
    }  
    echo ">
    <td><a href='pjesma.php?pjesma=$pjesma_id' class='link'>$naziv</a></td>
    <td><audio controls><source src='$poveznica' type='audio/mpeg'></audio></td>
    <td>$opis</td>
    <td>$datum_vrijeme_kreiranja</td>";
    
    if($datum_vrijeme_kupnje==null && $medijska_kuca_id != null){
    echo "<td>Zatražena kupnja</td>";
    } else {
        echo "<td>$datum_vrijeme_kupnje</td>";
    }
    if($medijska_kuca_id!=0){
        $sql_medijska_kuca="SELECT naziv FROM medijska_kuca WHERE medijska_kuca_id=$medijska_kuca_id";
        $rez_medijska_kuca=izvrsiUpit($bp,$sql_medijska_kuca);
        $redak_medijska_kuca=mysqli_fetch_assoc($rez_medijska_kuca);
        $medijska_kuca_naziv=$redak_medijska_kuca['naziv'];
    }
    else{
        $medijska_kuca_naziv="Bez medijske kuće";
    }
    echo "<td>$medijska_kuca_naziv</td>
    <td>$broj_svidanja</td>";
    if(isset($_GET['odobri'])){
        $pjesma_id=$_GET['odobri'];
        $sql="UPDATE pjesma SET datum_vrijeme_kupnje=NOW() WHERE pjesma_id=$pjesma_id";
        izvrsiUpit($bp,$sql);
        header("Location:moje_pjesme.php");
    }
    if(isset($_GET['odbij'])){
        $pjesma_id=$_GET['odbij'];
        $sql="UPDATE pjesma SET medijska_kuca_id=null WHERE pjesma_id=$pjesma_id";
        izvrsiUpit($bp,$sql);
        header("Location:moje_pjesme.php");
    }

    if(isset($_GET['uredi'])){
        $pjesma_id=$_GET['uredi'];
        $sql="UPDATE pjesma SET naziv=$naziv, opis=$opis, poveznica=$poveznica WHERE pjesma_id=$pjesma_id";
        izvrsiUpit($bp,$sql);
        header("Location:moje_pjesme.php");
    }
    
    if ($medijska_kuca_id == null || $datum_vrijeme_kupnje ==null) {
        echo "<td><a href='nova_pjesma.php?pjesma=$pjesma_id' class='link'>UREDI</a></td>";}
    
    if ($aktivni_korisnik_tip >= 0 && $datum_vrijeme_kupnje == NULL && !empty($medijska_kuca_id) && $korisnik_id == $aktivni_korisnik_id) {
						
        echo "<td><a href='moje_pjesme.php?odobri=$pjesma_id' class='link'>ODOBRI</a></td>
        <td><a href='moje_pjesme.php?odbij=$pjesma_id' class='link'>ODBACI</a></td>";
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo '<div id="paginacija">';

if ($aktivna!=1){
    $prethodna=$aktivna-1;
    echo "<a class='link' href=\"moje_pjesme.php?stranica=".$prethodna."\">&lt;</a>";
}
for($i=1;$i<=$broj_stranica;$i++){
    echo "<a class='link";
    if($aktivna==$i)echo " aktivna"; 
    echo "' href=\"moje_pjesme.php?stranica=".$i."\">$i</a>";
}

if($aktivna<$broj_stranica){
    $sljedeca=$aktivna+1;
    echo "<a class='link' href=\"moje_pjesme.php?stranica=".$sljedeca."\">&gt;</a>";
}
echo '<br/>';
if($aktivni_korisnik_tip>=0)echo '<a class="link" href="nova_pjesma.php">DODAJ PJESMU</a>';
echo '</div>';
?>

<?php
include("podnozje.php");
?>
