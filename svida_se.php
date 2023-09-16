<?php
include("zaglavlje.php");
$bp = spojiSeNaBazu();

if (isset($_GET['pjesma'])) {
    $pjesma_id = $_GET['pjesma'];
    $sql = "SELECT broj_svidanja FROM pjesma WHERE pjesma_id = $pjesma_id";
    $rs = izvrsiUpit($bp, $sql);
    list($broj_svidanja) = mysqli_fetch_array($rs);
    $sql = "UPDATE pjesma SET broj_svidanja = broj_svidanja + 1 WHERE pjesma_id = $pjesma_id";
    izvrsiUpit($bp, $sql);
    header("Location:pjesma.php?pjesma=$pjesma_id");
}

?>