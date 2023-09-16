<?php
include("zaglavlje.php");
$bp=spojiSeNaBazu();
?>

<?php
	$sql="SELECT COUNT(*) FROM pjesma";
	$rs=izvrsiUpit($bp,$sql);
	$red=mysqli_fetch_array($rs);
	$broj_redaka=$red[0];
	$broj_stranica=ceil($broj_redaka/$vel_str_pjesma);
	$sql="SELECT * FROM pjesma ORDER BY broj_svidanja DESC LIMIT ".$vel_str_pjesma;

	if(isset($_GET['stranica'])){
		$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_pjesma);
		$aktivna=$_GET['stranica'];
	}

	else $aktivna=1;
	$rs=izvrsiUpit($bp,$sql);

	if($aktivni_korisnik_tip>=0) {
	echo "<form action='pjesme.php' method='GET'>
		<label for='medijska_kuca'>Medijska kuća:</label>
		<select name='medijska_kuca' id='medijska_kuca'>
			<option value='0'>Sve</option>";
			$sql_medijske_kuce = "SELECT * FROM medijska_kuca";
			$rs_medijske_kuce = izvrsiUpit($bp, $sql_medijske_kuce);
			while(list($medijska_kuca_id, $naziv, $opis) = mysqli_fetch_array($rs_medijske_kuce)) {
				echo "<option value='$medijska_kuca_id'>$naziv</option>";
			}
		echo "</select>
		<label for='pocetak'>Početak:</label>
		<input type='datetime-local' name='pocetak' id='pocetak'>
		<label for='kraj'>Kraj:</label>
		<input type='datetime-local' name='kraj' id='kraj'>
		<input type='submit' value='FILTRIRAJ'>
	</form>";
	}
	if(isset($_GET['medijska_kuca']) && $_GET['medijska_kuca'] != 0) {
		$medijska_kuca_id = $_GET['medijska_kuca'];
		$sql = "SELECT COUNT(*) FROM pjesma WHERE medijska_kuca_id = $medijska_kuca_id";
		$rs = izvrsiUpit($bp, $sql);
		$red = mysqli_fetch_array($rs);
		$broj_redaka = $red[0];
		$broj_stranica = ceil($broj_redaka/$vel_str_pjesma);
		$sql = "SELECT * FROM pjesma WHERE medijska_kuca_id = $medijska_kuca_id ORDER BY broj_svidanja DESC LIMIT ".$vel_str_pjesma;
		if(isset($_GET['stranica'])){
			$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_pjesma);
			$aktivna=$_GET['stranica'];
		}
		else $aktivna=1;
		$rs=izvrsiUpit($bp,$sql);
	} else if(isset($_GET['pocetak']) && isset($_GET['kraj'])) {
		$pocetak = $_GET['pocetak'];
		$kraj = $_GET['kraj'];
		$sql = "SELECT COUNT(*) FROM pjesma WHERE datum_vrijeme_kreiranja BETWEEN '$pocetak' AND '$kraj'";
		$rs = izvrsiUpit($bp, $sql);
		$red = mysqli_fetch_array($rs);
		$broj_redaka = $red[0];
		$broj_stranica = ceil($broj_redaka/$vel_str_pjesma);
		$sql = "SELECT * FROM pjesma WHERE datum_vrijeme_kreiranja BETWEEN '$pocetak' AND '$kraj' ORDER BY broj_svidanja DESC LIMIT ".$vel_str_pjesma;
		if(isset($_GET['stranica'])){
			$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_pjesma);
			$aktivna=$_GET['stranica'];
		}
		else $aktivna=1;
		$rs=izvrsiUpit($bp,$sql);
	} else if(isset($_GET['medijska_kuca']) && $_GET['medijska_kuca'] != 0 && isset($_GET['pocetak']) && isset($_GET['kraj'])) {
		$medijska_kuca_id = $_GET['medijska_kuca'];
		$pocetak = $_GET['pocetak'];
		$kraj = $_GET['kraj'];
		$sql = "SELECT COUNT(*) FROM pjesma WHERE medijska_kuca_id = $medijska_kuca_id AND datum_vrijeme_kreiranja BETWEEN '$pocetak' AND '$kraj'";
		$rs = izvrsiUpit($bp, $sql);
		$red = mysqli_fetch_array($rs);
		$broj_redaka = $red[0];
		$broj_stranica = ceil($broj_redaka/$vel_str_pjesma);
		$sql = "SELECT * FROM pjesma WHERE medijska_kuca_id = $medijska_kuca_id AND datum_vrijeme_kreiranja BETWEEN '$pocetak' AND '$kraj' ORDER BY broj_svidanja DESC LIMIT ".$vel_str_pjesma;
		if(isset($_GET['stranica'])){
			$sql=$sql." OFFSET ".(($_GET['stranica']-1)*$vel_str_pjesma);
			$aktivna=$_GET['stranica'];
		}
		else $aktivna=1;
		$rs=izvrsiUpit($bp,$sql);
	}
	
	echo "<table>";
	if($aktivni_korisnik_tip>=0){
		echo "<a href='moje_pjesme.php' class='link'>Prikaži moje pjesme</a>";
	}

	if($aktivni_korisnik_tip == 1 || $aktivni_korisnik_tip == 0){
		echo "<br><a href='medijska_pjesme.php' class='link'>Prikaži pjesme medijske kuće</a>";
	
	}
	echo "<caption>Popis pjesama</caption>
	<thead><tr>
	<th>Naziv pjesme</th>
	<th>Audio pjesme</th>
	<th>Korisnik</th>";
	if ($aktivni_korisnik_tip >= 0) {
		echo "<th>Medijska kuća</th>
		<th>Opis pjesme</th>
		<th>Datum i vrijeme kreiranja</th>
		<th>Datum i vrijeme kupnje</th>";
	}
	echo "<th>Broj sviđanja</th>
	<th></th>
	</tr></thead>
	<tbody>";
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
		if(isset($_GET['kupi'])){
			$pjesma_id=$_GET['kupi'];
			$sql="UPDATE pjesma SET medijska_kuca_id=$aktivni_korisnik_id WHERE pjesma_id=$pjesma_id AND medijska_kuca_id IS NULL AND datum_vrijeme_kupnje IS NULL";
			izvrsiUpit($bp,$sql);
			header("Location:pjesme.php");
		}

		if ($aktivni_korisnik_tip >= 0 || $datum_vrijeme_kupnje != null) {
		echo "<tr "; 
    	if ($datum_vrijeme_kupnje == null && $aktivni_korisnik_tip <= 1){
        echo "class='nekupljeno'";}
        else {
			echo "";
    	}
	echo "><td>";
	if ($aktivni_korisnik_tip >= 0){ 
		echo "<a href='pjesma.php?pjesma=$pjesma_id' class='link'>$naziv</a>";} 
		else {			
			echo "$naziv</a>"; }
			echo "</td>
			<td><audio controls> <source='$poveznica' type='audio/mpeg'></audio></td>
			<td>$korisnik_ime</td>";
			if ($aktivni_korisnik_tip >= 0) {
				echo "<td>$medijska_kuca_naziv</td>";
			}
				if ($aktivni_korisnik_tip >= 0) {
					echo "<td>$opis</td>
					<td>$datum_vrijeme_kreiranja</td>";
					if ($datum_vrijeme_kupnje == NULL && $medijska_kuca_id==null) echo "<td>Nije kupljena</td>";
					else if (!empty($medijska_kuca_id) && $datum_vrijeme_kupnje == NULL) echo "<td>Zatražena kupnja</td>";
					else echo "<td>$datum_vrijeme_kupnje</td>";	
					if ($aktivni_korisnik_tip >= 0){	
						echo "<td>$broj_svidanja</td>";	

					if (($medijska_kuca_id == null || $datum_vrijeme_kupnje ==null) && $aktivni_korisnik_id == $korisnik_id) {
						echo "<td><a href='nova_pjesma.php?pjesma=$pjesma_id' class='link'>UREDI</a></td>";
					}	

					if ($aktivni_korisnik_tip <= 1 && $datum_vrijeme_kupnje == NULL && $medijska_kuca_id == null) {
						echo "<td><a href='pjesme.php?kupi=$pjesma_id' class='link'>Zatraži kupnju</a></td>";
					}
					if ($aktivni_korisnik_tip >= 0 && $datum_vrijeme_kupnje == NULL && !empty($medijska_kuca_id) && $korisnik_id == $aktivni_korisnik_id) {
						echo "<td><a href='moje_pjesme.php?odobri=$pjesma_id' class='link'>ODOBRI</a></td>
						<td><a href='moje_pjesme.php?odbij=$pjesma_id' class='link'>ODBACI</a></td>";
					}} else
					{echo "<td>$broj_svidanja</td>";}}
				else {
					echo "<td>$broj_svidanja</td>";}
			echo "</tr>";
	}}
	echo "</tbody>";
	echo "</table>";

	echo '<div id="paginacija">';
	if ($aktivna!=1){
		$prethodna=$aktivna-1;
		echo "<a class='link' href=\"pjesme.php?stranica=".$prethodna."\">&lt;</a>";
	}
	for($i=1;$i<=$broj_stranica;$i++){
		echo "<a class='link";
		if($aktivna==$i)echo " aktivna"; 
		echo "' href=\"pjesme.php?stranica=".$i."\">$i</a>";
	}
	if($aktivna<$broj_stranica){
		$sljedeca=$aktivna+1;
		echo "<a class='link' href=\"pjesme.php?stranica=".$sljedeca."\">&gt;</a>";
	}
	echo '<br/>';
	if($aktivni_korisnik_tip>=0)echo '<a class="link" href="nova_pjesma.php">DODAJ PJESMU</a>';
	echo '</div>';
?>
<?php
include("podnozje.php");
?>