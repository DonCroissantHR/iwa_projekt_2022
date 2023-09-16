<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
    if ($aktivni_korisnik_tip!=0){
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
            $korime=$_POST['korime'];
            $lozinka=$_POST['lozinka'];
            $email=$_POST['email'];
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $tip_korisnika_id=$_POST['tip_korisnika_id'];
            $id=$_POST['novi'];
            $medijska_kuca=$_POST['medijska_kuca'];
            
            if($id==0){
                $sql="INSERT INTO korisnik
                    (korisnik_id, tip_korisnika_id, medijska_kuca_id, korime, ime, prezime, email, lozinka)
                    VALUES
                    (default, '$tip_korisnika_id', '$medijska_kuca', '$korime', '$ime', '$prezime', '$email', '$lozinka')";
            }else{
                $sql="UPDATE korisnik SET
                    tip_korisnika_id='$tip_korisnika_id',
                    medijska_kuca_id='$medijska_kuca',
                    korime='$korime',
                    ime='$ime',
                    prezime='$prezime',
                    email='$email',
                    lozinka='$lozinka'
                    WHERE korisnik_id='$id'";
            }
            izvrsiUpit($bp,$sql);
            header("Location: korisnici.php");
        }
    }
    if(isset($_GET['korisnik'])){
        $id=$_GET['korisnik'];
        $sql="SELECT korisnik_id,tip_korisnika_id,medijska_kuca_id,korime,ime,prezime,email,lozinka FROM korisnik WHERE korisnik_id='$id'";
        $rs=izvrsiUpit($bp,$sql);
        list($id,$tip_korisnika_id,$medijska_kuca,$korime,$ime,$prezime,$email,$lozinka)=mysqli_fetch_array($rs);
    }else{
        $id=0;
        $tip_korisnika_id="";
        $medijska_kuca="";
        $korime="";
        $ime="";
        $prezime="";
        $email="";
        $lozinka="";
    }
?>

<form method="POST" action="<?php if($id==0)echo $_SERVER['PHP_SELF']; else echo "novi_korisnik.php";?>">
    <table>
        <caption><?php if($id==0)echo "Novi korisnik"; else echo "Uređivanje korisnika";?></caption>
        <tbody>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="novi" value="<?php echo $id;?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="tip_korisnika_id">Tip korisnika</label>
                </td>
                <td>
                    <select name="tip_korisnika_id" id="tip_korisnika_id">
                        <?php
                            $sql="SELECT * FROM tip_korisnika";
                            $rs=izvrsiUpit($bp,$sql);
                            while(list($id_tipa,$naziv)=mysqli_fetch_array($rs)){
                                echo "<option value='$id_tipa'";
                                if($id_tipa==$tip_korisnika_id)echo " selected";
                                echo ">$naziv</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="medijska_kuca">Medijska kuća</label>
                </td>
                <td>
                    <select name="medijska_kuca" id="medijska_kuca">
                        <?php
                            $sql="SELECT * FROM medijska_kuca";
                            $rs=izvrsiUpit($bp,$sql);
                            while(list($id_medijske,$naziv)=mysqli_fetch_array($rs)){
                                echo "<option value='$id_medijske'";
                                if($id_medijske==$medijska_kuca)echo " selected";
                                echo ">$naziv</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="korime">Korisničko ime</label>
                </td>
                <td>
                    <input type="text" name="korime" id="korime" value="<?php echo $korime;?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ime">Ime</label>
                </td>
                <td>
                    <input type="text" name="ime" id="ime" value="<?php echo $ime;?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prezime">Prezime</label>
                </td>
                <td>
                    <input type="text" name="prezime" id="prezime" value="<?php echo $prezime;?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>
                    <input type="text" name="email" id="email" value="<?php echo $email;?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lozinka">Lozinka</label>
                </td>
                <td>
                    <input type="password" name="lozinka" id="lozinka" value="<?php echo $lozinka;?>"/>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" name="submit" value="Pošalji"/>
                    <input type="submit" name="reset" value="Ponovi"/>
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>