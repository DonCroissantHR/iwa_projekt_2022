<?php
include("zaglavlje.php");
$bp=spojiSeNaBazu();
if($aktivni_korisnik_tip > 1){
    header("Location: index.php");
}
?>

<?php
$sql = "SELECT * FROM pjesma WHERE medijska_kuca_id = $aktivni_korisnik_id";
$rs = izvrsiUpit($bp, $sql);
echo "<table>";
echo "<caption>Popis pjesama po medijskim kućama</caption>";
echo "<thead><tr>
    <th>Naziv</th>
    <th>Opis</th>
    <th>Datum i vrijeme kreiranja</th>
    <th>Broj sviđanja</th>
    <th>Status</th>
    </tr></thead>";
echo "<tbody>";
while (list($pjesma_id, $korisnik_id, $medijska_kuca_id, $naziv, $poveznica, $opis, $datum_vrijeme_kreiranja, $datum_vrijeme_kupnje, $broj_svidanja) = mysqli_fetch_array($rs)) {
    $sql_korime = "SELECT korime FROM korisnik WHERE korisnik_id = $korisnik_id";
    $rez = mysqli_query($bp, $sql_korime);
    $redak = mysqli_fetch_assoc($rez);
    $korisnik_ime = $redak['korime'];
    if ($medijska_kuca_id != 0) {
        $sql_medijska_kuca = "SELECT naziv FROM medijska_kuca WHERE medijska_kuca_id = $medijska_kuca_id";
        $rez_medijska_kuca = mysqli_query($bp, $sql_medijska_kuca);
        $redak_medijska_kuca = mysqli_fetch_assoc($rez_medijska_kuca);
        $medijska_kuca_naziv = $redak_medijska_kuca['naziv'];
    } else {
        $medijska_kuca_naziv = "Bez medijske kuće";
    }
    if ($aktivni_korisnik_tip == -1 && $medijska_kuca_id == 0) continue;

    echo "<tr>
        <td><a href='pjesma.php?pjesma=$pjesma_id' class='link'>$naziv<a></td>
        <td>$opis</td>
        <td>$datum_vrijeme_kreiranja</td>
        <td>$broj_svidanja</td>
        <td>";
    if ($datum_vrijeme_kupnje == null) {
        echo "Čeka odobrenje";
    } else {
        echo "Kupljeno";
    }
    echo "</td>
        </tr>";
}
echo "</tbody>";
echo "</table>";
?>

<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>