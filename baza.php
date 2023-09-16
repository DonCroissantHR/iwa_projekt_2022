<?php

define("POSLUZITELJ","localhost");
define("BAZA","iwa_2021_vz_projekt");
define("BAZA_KORISNIK","iwa_2021");
define("BAZA_LOZINKA","foi2021");

function spojiSeNaBazu(){
	$veza = mysqli_connect(POSLUZITELJ,BAZA_KORISNIK,BAZA_LOZINKA);
	
	if(!$veza){
		echo "GREŠKA: 
		Problem sa spajanjem u datoteci baza.php funkcija otvoriVezu:  
		".mysqli_connect_error();
	}
	
	mysqli_select_db($veza,BAZA);
	
	if(mysqli_error($veza)!==""){
		echo "GREŠKA: 
		Problem sa odabirom baze u baza.php funkcija otvoriVezu:  
		".mysqli_error($veza);
	}
	
	mysqli_set_charset($veza,"utf8");
	
	if(mysqli_error($veza)!==""){
		echo "GREŠKA: 
		Problem sa odabirom baze u baza.php funkcija otvoriVezu:  
		".mysqli_error($veza);
	}
	
	return $veza;

}
function izvrsiUpit($veza, $upit){
	
	$rezultat = mysqli_query($veza,$upit);
	
	if(mysqli_error($veza)!==""){
		echo "GREŠKA: 
		Problem sa upitom: ".$upit." : u datoteci baza.php funkcija izvrsiUpit:  
		".mysqli_error($veza);
	}
	
	return $rezultat;
}
function zatvoriVezuNaBazu($veza){
	mysqli_close($veza);
}
?>