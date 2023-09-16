<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
?>

<?php
	$sql="SELECT COUNT(*) FROM korisnik";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_korisnik);
	$sql="SELECT * FROM korisnik ORDER BY korime LIMIT ".$vel_str_korisnik;

	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_korisnik);
		$aktivna=$_GET['stranica'];
	}
	else $aktivna=1;
	$rs=izvrsiUpit($bp,$sql);

	echo "<table>";
	echo "<caption>Popis korisnika sustava</caption>";
	echo "<thead><tr>
	<th>ID korisnika</th>
	<th>Korisničko ime</th>
	<th>Lozinka</th>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Tip korisnika</th>
	<th></th>
	</tr></thead>";
	echo "<tbody>";
	while(list($korisnik_id, $tip_korisnika_id, $medijska_kuca_id, $korime, $ime, $prezime, $email, $lozinka,)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$korisnik_id</td>
			<td>$korime</td>
			<td>$lozinka</td>
			<td>$ime</td>
			<td>$prezime</td>
			<td>$tip_korisnika_id</td>";
			if($aktivni_korisnik_tip==0)echo "<td><a href='novi_korisnik.php?korisnik=$korisnik_id' class='link'>UREDI</a></td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";

	echo "<div id='paginacija'>";
	if($broj_stranica>1){
		if($aktivna!=1){
			$prethodna=$aktivna-1;
			echo "<a href=\"korisnici.php?stranica=".$prethodna."\">&lt;</a>&nbsp;&nbsp;";
		}
		for($i=1;$i<=$broj_stranica;$i++){
			if($aktivna==$i){
				echo $i."&nbsp;&nbsp;";
			}
			else{
				echo "<a href=\"korisnici.php?stranica=".$i."\">".$i."</a>&nbsp;&nbsp;";
			}
		}
		if($aktivna<$broj_stranica){
			$sljedeca=$aktivna+1;
			echo "<a href=\"korisnici.php?stranica=".$sljedeca."\">&gt;</a>";
		}
			echo "<br><a href='novi_korisnik.php' class='link'>DODAJ KORISNIKA</a>";
		echo "</div>";
	}
?>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>