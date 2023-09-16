<?php
include("zaglavlje.php");
$bp=spojiSeNaBazu();
if ($aktivni_korisnik_tip < 0) {
    header("Location:index.php");
}
?>

<?php
    $pjesma_id=$_GET['pjesma'];
    $sql="SELECT pjesma_id, korisnik_id, medijska_kuca_id, naziv, poveznica, opis, datum_vrijeme_kreiranja, datum_vrijeme_kupnje, broj_svidanja FROM pjesma WHERE pjesma_id='$pjesma_id'";
    $rs=izvrsiUpit($bp,$sql);
    list($pjesma_id, $korisnik_id, $medijska_kuca_id, $naziv, $poveznica, $opis, $datum_vrijeme_kreiranja, $datum_vrijeme_kupnje, $broj_svidanja) = mysqli_fetch_array($rs);
    
    $sql_korime = "SELECT ime, prezime FROM korisnik WHERE korisnik_id = $korisnik_id";
    $rez = mysqli_query($bp, $sql_korime);
    $redak = mysqli_fetch_assoc($rez);
    $korisnik_ime = $redak['ime'];
    $korisnik_prezime = $redak['prezime'];
    
    if ($medijska_kuca_id != 0) {
        $sql_medijska_kuca = "SELECT naziv FROM medijska_kuca WHERE medijska_kuca_id = $medijska_kuca_id";
        $rez_medijska_kuca = mysqli_query($bp, $sql_medijska_kuca);
        $redak_medijska_kuca = mysqli_fetch_assoc($rez_medijska_kuca);
        $medijska_kuca_naziv = $redak_medijska_kuca['naziv'];
    } else {
        $medijska_kuca_naziv = "Bez medijske kuće";
    }
    
    if ($aktivni_korisnik_tip == -1 && $medijska_kuca_id == 0) {
        header("Location:pjesme.php");
    }
   
	echo "<a href='moje_pjesme.php' class='link'>Prikaži moje pjesme</a>";
	
    echo "<table>";
    echo "<caption>Detalji pjesme</caption>";
    echo "<thead><tr>
    <th>Naziv pjesme</th>
    <th>Korisnik</th>
    <th>Medijska kuća</th>
    <th>Opis pjesme</th>
    <th>Datum i vrijeme kreiranja</th>
    <th>Broj sviđanja</th>
    <th></th>
    </tr></thead>
    <tbody>
    <tr>
        <td>$naziv</td>
        <td>$korisnik_ime $korisnik_prezime</td>
        <td>$medijska_kuca_naziv</td>
        <td>$opis</td>
        <td>$datum_vrijeme_kreiranja</td>
        <td>$broj_svidanja</td>
        <td><a href='svida_se.php?pjesma=$pjesma_id' class='link'>Sviđa mi se</a></td>
   </tr>
   </tbody>
   </table>";
   if($aktivni_korisnik_id == $korisnik_id)echo "<a href='nova_pjesma.php?pjesma=$pjesma_id' class='link'>UREDI PJESMU</a>";
?>

<?php
include("podnozje.php");
zatvoriVezuNaBazu($bp);
?>