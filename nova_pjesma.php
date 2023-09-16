<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if($aktivni_korisnik_tip <0){
		header("Location:index.php");
	}
?>
<?php
	$greska="";
	if(isset($_POST['submit'])){
		foreach($_POST as $key => $value){
			if(strlen($value)==0){
				$greska="Sva polja za unos su obavezna";}
		}
		if(empty($greska)){
			$naziv=$_POST['naziv'];
			$poveznica=$_POST['poveznica'];
			$opis=$_POST['opis'];
			$id=$_POST['novi'];
			$korisnik_id=$_SESSION['aktivni_korisnik_id'];
			
			if($id==0){
				$sql="INSERT INTO pjesma
					(naziv, poveznica, opis, korisnik_id)
					VALUES
					('$naziv', '$poveznica', '$opis', '$korisnik_id')";
			}
			else{
				$sql="UPDATE pjesma SET
					naziv='$naziv',
					poveznica='$poveznica',
					opis='$opis'
					WHERE pjesma_id='$id'";
			}
			izvrsiUpit($bp,$sql);
			header("Location:pjesme.php");
		}
	}
	if(isset($_GET['pjesma'])){
		$id=$_GET['pjesma'];
		$sql="SELECT pjesma_id,naziv,poveznica,opis FROM pjesma WHERE pjesma_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$naziv,$poveznica,$opis)=mysqli_fetch_array($rs);
	}
	else{
		$naziv = "";
		$poveznica = "";
		$opis = "";
		
	}
		if(isset($_POST['reset'])){
		header("Location:pjesme.php");
		}
?>
<form method="post" action="<?php if(isset($_GET['pjesma']))echo "nova_pjesma.php?pjesma=$id"; else echo "nova_pjesma.php";?>">
	<table>
		<caption>
			<?php
				if(isset($_GET['pjesma']))echo "Uredi pjesmu";
				else echo "Dodaj pjesmu";
			?>
		</caption>
		<tbody>
			<tr>
				<td colspan="2">
					<input type="hidden" name="novi" value="<?php if(!empty($id))echo $id;else echo 0;?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<label class="greska"><?php if($greska!="")echo $greska; ?></label>
				</td>
			</tr>
			<tr>
				<td class="lijevi">
					<label for="naziv"><strong>Naziv pjesme:</strong></label>
				</td>
				<td>
					<input type="text" name="naziv" id="naziv" size="120" maxlength="50"
						placeholder="naziv pjesme treba započeti velikim početnim slovom, može uključivati praznine i sadržati do 50 znakova"
						value="<?php if(!isset($_POST['naziv']))echo $naziv; else echo $_POST['naziv'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="poveznica"><strong>Poveznica:</strong></label>
				</td>
				<td>
					<input type="url" name="poveznica" id="poveznica" size="120" placeholder="Ispravan oblik poveznice je https://pl.meln.top/mr/a51602324fad5eef3116e0a90ef..."
					     value="<?php if(!isset($_POST['poveznica']))echo $poveznica; else echo $_POST['poveznica'];?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="opis"><strong>Opis:</strong></label>
				</td>
				<td>
					<input type="text" name="opis" id="opis" min="1" max="1000000" size="120"
						value="<?php if(!isset($_POST['opis']))echo $opis; else echo $_POST['opis'];?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<?php
						if(isset($id)&&$aktivni_korisnik_id==$id||!empty($id))echo '<input type="submit" name="submit" value="Pošalji"/>';
						else echo '<input type="submit" name="reset" value="Izbriši"/><input type="submit" name="submit" value="Pošalji"/>';
					?>
				</td>
			</tr>
		</tbody>
	</table>
</form>

<?php
	zatvoriVezuNaBazu($bp);
	include("podnozje.php");
?>
