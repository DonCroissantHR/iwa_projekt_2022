<?php
    include("baza.php");
    if(session_id()=="") {
        session_start();
    }
    $trenutna=basename($_SERVER["PHP_SELF"]);
	$putanja=$_SERVER['REQUEST_URI'];
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
    $vel_str=10;
    $vel_str_pjesma=5;
    $vel_str_medijska_kuca=5;
    $vel_str_korisnik=5;
    $vel_str_kupnja=5;
    $vel_str_korisnik_kupnja=5;
    $vel_str_korisnik_pjesma=5;
    $vel_str_korisnik_medijska_kuca=5;
	if(isset($_SESSION['aktivni_korisnik'])){
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id=$_SESSION["aktivni_korisnik_id"];
        $korisnik_vrsta=$_SESSION['korisnik_vrsta'];
	}
?>
<!doctype html>
<html>
<head>
    <title>Glazbeni katalog</title>
    <meta charset="UTF-8">
    <meta name="author" content="Petar Krajačić">
    <meta name="description" content="23.08.2022.">
    <link rel="stylesheet" type="text/css" href="pkrajacic.css">
</head>

<body>
    <header>
        <?php
            if(empty($korisnik_vrsta)){
                echo "<span><strong>Status: </strong>Neprijavljeni korisnik</span><br>";
                echo "<a class='link' href='login.php'>prijava</a>";
            }
            else{
                echo "<span><strong>Status: </strong>Dobrodošli, $aktivni_korisnik_ime ($korisnik_vrsta)</span><br/>";
                echo "<a class='link' href='login.php?logout=1'>odjava</a>";
            }
        ?>
    </header>
    <h1>Glazbeni katalog</h1>
    <nav id="navigacija" class="menu">
        <?php
            switch(true) {
                case $trenutna:
                    switch($aktivni_korisnik_tip>=0) {
                        case 'true':
                            echo '<a href="index.php"';
                            if($trenutna=="index.php")echo ' class="link"';
                            echo ">Početna</a>";

                            echo '<a href="o_autoru.html"';
                            if($trenutna=="o_autoru.html")echo ' class="link"';
                            echo ">O autoru</a>";

                            echo '<a href="pjesme.php"';
                            if($trenutna=="pjesme.php")echo ' class="link"';
                            echo ">Pjesme</a>";
                            
                            if($aktivni_korisnik_tip==0){
                                echo '<a href="korisnici.php"';
                                if($trenutna=="korisnici.php")echo ' class="link"';
                                echo ">Korisnici</a>";
                                echo '<a href="medijske_kuce.php"';
                                if($trenutna=="medijske_kuce.php")echo ' class="link"';
                                echo ">Medijske kuće</a>";
                            }
                            break;

                        default:
                            echo '<a href="index.php"';
                            if($trenutna=="index.php")echo ' class="link" ';
                            echo ">Početna</a>";

                            echo '<a href="o_autoru.html"';
                            if($trenutna=="o_autoru.html")echo ' class="meni"';
                            echo ">O autoru</a>";

                            echo '<a href="pjesme.php"';
                            if($trenutna=="pjesme.php")echo ' class="link"';
                            echo ">Pjesme</a>";
                            break;
                        }
                    default:
                        break;
            }
        ?>     
    </nav>
<section id="sadrzaj">