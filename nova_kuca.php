<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();
    if($aktivni_korisnik_tip != 0){
        header("Location: index.php");
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
        $opis=$_POST['opis'];
        $id=$_POST['novi'];
        
        if($id==0){
            $sql="INSERT INTO medijska_kuca
                (naziv, opis)
                VALUES
                ('$naziv', '$opis')
            ";
        }
        else{
            $sql="UPDATE medijska_kuca SET
                naziv='$naziv',
                opis='$opis'
                WHERE medijska_kuca_id='$id'";
        }
        izvrsiUpit($bp,$sql);
        header("Location:medijske_kuce.php");
    }
}
if(isset($_GET['medijska_kuca'])){
    $id=$_GET['medijska_kuca'];
    $sql="SELECT medijska_kuca_id,naziv,opis FROM medijska_kuca WHERE medijska_kuca_id='$id'";
    $rs=izvrsiUpit($bp,$sql);
    list($id,$naziv,$opis)=mysqli_fetch_array($rs);
}
else{
    $naziv = "";
    $opis = "";
    
}
    if(isset($_POST['reset'])){
    header("Location:medijske_kuce.php");
    }
?>
<form method="post" action="<?php if(isset($_GET['medijska_kuca']))echo "nova_kuca.php?medijska_kuca=$id"; else echo "nova_kuca.php";?>">
    <table>
        <caption>
            <?php
                if(isset($_GET['medijska_kuca']))echo "Uredi medijsku kuću";
                else echo "Nova medijska kuća";
            ?>
        </caption>
        <tbody>
            <tr>
                <td>Naziv</td>
                <td><input type="text" name="naziv" value="<?php echo $naziv;?>"></td>
            </tr>
            <tr>
                <td>Opis</td>
                <td><input type="text" name="opis" value="<?php echo $opis;?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="novi" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Spremi">
                    <input type="submit" name="reset" value="Odustani">
                </td>
            </tr>
        </tbody>
    </table>
</form>

<?php
zatvoriVezuNaBazu($bp);
include("podnozje.php");
?>
