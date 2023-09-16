<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
?>
<?php
	if(isset($_GET['logout'])){
		unset($_SESSION["aktivni_korisnik"]);
		unset($_SESSION["aktivni_korisnik_ime"]);
		unset($_SESSION["aktivni_korisnik_tip"]);
		unset($_SESSION["aktivni_korisnik_id"]);
		session_destroy();
		header("Location:index.php");
	}
	$korisnik_vrsta='';
	$greska= "";
	if(isset($_POST['submit'])){
		$korime=mysqli_real_escape_string($bp,$_POST['korime']);
		$lozinka=mysqli_real_escape_string($bp,$_POST['lozinka']);

		if(!empty($korime)&&!empty($lozinka)){
			$sql="SELECT korisnik_id,tip_korisnika_id,ime,prezime FROM korisnik WHERE korime='{$korime}' AND lozinka='{$lozinka}'";
			$rs=izvrsiUpit($bp,$sql);
			if(mysqli_num_rows($rs)==0)$greska="Ne postoji korisnik s navedenim korisničkim imenom i lozinkom";
			else{
				list($id,$tip,$ime,$prezime)=mysqli_fetch_array($rs);
				$_SESSION['aktivni_korisnik']=$korime;
				if ($tip == 2){
				$_SESSION['aktivni_korisnik_ime']=$ime." ".$prezime; 
			} else if ($tip <=1 && $tip >= 0) {
					$_SESSION['aktivni_korisnik_ime']=$ime;
				}
				$_SESSION["aktivni_korisnik_id"]=$id;
				$_SESSION['aktivni_korisnik_tip']=$tip;
				switch($tip) {
					case 0:
						$_SESSION['korisnik_vrsta']='administrator'; break;
					case 1:
						$_SESSION['korisnik_vrsta']='moderator'; break;
					case 2:
						$_SESSION['korisnik_vrsta']='korisnik'; break;

				}
				header("Location:index.php");
			}
		}
		else $greska = "Molim unesite korisničko ime i lozinku";
	}
?>
<form id="prijava" name="prijava" method="POST" action="login.php">
	<table>
		<caption>Prijava u sustav</caption>
		<tbody>
			<tr>
					<td colspan="2" style="text-align:center;">
						<label class="greska"><?php if($greska!="")echo $greska; ?></label>
					</td>
			</tr>
			<tr>
				<td class="lijevi">
					<label for="korime"><strong>Korisničko ime:</strong></label>
				</td>
				<td>
					<input name="korime" id="korime" type="text" size="120"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="lozinka"><strong>Lozinka:</strong></label>
				</td>
				<td>
					<input name="lozinka"	id="lozinka" type="password" size="120"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<input name="submit" type="submit" value="Prijavi se"/>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
