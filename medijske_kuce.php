<?php
include("zaglavlje.php");
$bp=spojiSeNaBazu();
?>

<?php
    $sql="SELECT COUNT(*) FROM medijska_kuca";
    $rs=izvrsiUpit($bp,$sql);
    $red=mysqli_fetch_array($rs);
    $broj_redaka=$red[0];
    $broj_stranica=ceil($broj_redaka/$vel_str_medijska_kuca);
    $sql="SELECT * FROM medijska_kuca ORDER BY naziv LIMIT ".$vel_str_medijska_kuca;

    if(isset($_GET['stranica'])){
        $sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_medijska_kuca);
        $aktivna=$_GET['stranica'];
    }
    else $aktivna=1;
    $rs=izvrsiUpit($bp,$sql);

    echo "<table>";
    echo "<caption>Popis medijskih kuća</caption>";
    echo "<thead><tr>
    <th>Naziv medijske kuće</th>
    <th>Opis medijske kuće</th>
    <th></th>
    </tr></thead>";
    echo "<tbody>";
    while(list($medijska_kuca_id,$naziv,$opis)=mysqli_fetch_array($rs)){
        echo "<tr>
            <td>$naziv</td>
            <td>$opis</td>";
            if($aktivni_korisnik_tip==0)echo "<td><a href='nova_kuca.php?medijska_kuca=$medijska_kuca_id' class='link'>UREDI</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

    echo '<div id="paginacija">';
    
    if($aktivna!=1){
        $prethodna=$aktivna-1;
        echo "<a href=\"medijske_kuce.php?stranica=$prethodna\">&lt;</a>";
    }

    for($i=1;$i<=$broj_stranica;$i++){
        if($aktivna==$i){
            echo "<a class='aktivna' href=\"medijske_kuce.php?stranica=$i\">$i</a>";
        }
        else{
            echo "<a href=\"medijske_kuce.php?stranica=$i\">$i</a>";
        }
    }
    if($aktivna<$broj_stranica){
        $sljedeca=$aktivna+1;
        echo "<a href=\"medijske_kuce.php?stranica=$sljedeca\">&gt;</a>";
    }
    echo "<br><a href='nova_kuca.php' class='link'>DODAJ NOVU MEDIJSKU KUĆU</a><br>";
    echo '</div>';
?>

<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");

?>