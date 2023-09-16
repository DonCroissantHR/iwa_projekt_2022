<?php
include("zaglavlje.php");
?>


<div id="opis">
<h2>Glazbeni katalog</h2>
<p>Aplikacija za kupovinu i kreiranje novih pjesama</p>
</div>
<br/>
<table>
<caption>Korisnici sustava</caption>
<thead>
    <tr>
        <th class="lijevi">Popis uloga</th>
        <th>Opis uloga</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>Administrator</td>
        <td>Dodavanje i uređivanje korisnika, pjesama i medijskih kuća, definiranje uloga novih korisnika</td>
    </tr>
    <tr>
        <td>Moderator</td>
        <td>Zatraživanje kupnje pjesama od strane medijskih kuća </td>
    </tr>
    <tr>
        <td>Korisnik</td>
        <td>Unos novih pjesama, uređivanje vlastitih i preslušavanje pjesama, "lajkanje" pjesama</td>
    </tr>
    <tr>
        <td>Anonimni korisnik</td>
        <td>Pregledavanje pjesama kupljenih od medijskih kuća</td>
    </tr>
</tbody>
</table>
<br/>
<table>
<caption>Datoteke sustava</caption>
<thead>
    <tr>
        <th class="lijevi">Popis datoteka</th>
        <th>Opis datoteka</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>baza.php</td>
        <td>Skripta za rad s bazom podataka</td>
    </tr>
    <tr>
        <td>index.php</td>
        <td>Kratak opis aplikacije</td>
    </tr>
    <tr>
        <td>korisnici.php</td>
        <td>Tablica koja izlistava korisnike, postoji mogućnost dodavanja novih korisnika</td>
    </tr>
    <tr>
        <td>login.php</td>
        <td>Obrazac za prijavu u sustav</td>
    </tr>
    <tr>
        <td>medijska_pjesme.php</td>
        <td>Pjesme kupljene od medijskih kuća ili na čekanju</td>
    </tr>
    <tr>
        <td>medijske_kuce.php</td>
        <td>Tablica s popisom medijskih kuća</td>
    </tr>
    <tr>
        <td>moje_pjesme.php</td>
        <td>Tablica za prikaz pjesama prijavljenog korisnika</td>
    </tr>
    <tr>
        <td>nova_kuca.php</td>
        <td>Obrazac za unos nove medijske kuće</td>
    </tr>
    <tr>
        <td>nova_pjesma</td>
        <td>Obrazac za dodavanje nove pjesme</td>
    </tr>
    <tr>
        <td>novi_korisnik.php</td>
        <td>Obrazac za unos novog ili uređivanje postojećeg korisnika</td>
    </tr>
    <tr>
        <td>o_autoru.html</td>
        <td>Stranica s kratkim opisom autora</td>
    </tr>
    <tr>
        <td>pjesma.php</td>
        <td>Tablica s detaljima o pojedinoj pjesmi</td>
    </tr>
    <tr>
        <td>pjesme.php</td>
        <td>Tablica s pjesmama</td>
    </tr>
    <tr>
        <td>pkrajacic.css</td>
        <td>CSS datoteka</td>
    </tr>
    <tr>
        <td>podnozje.php</td>
        <td>Podnožje stranice</td>
    </tr>
    <tr>
        <td>slika.jpg</td>
        <td>Slika autora aplikacije</td>
    </tr>
    <tr>
        <td>svida_se.php</td>
        <td>Skripta za "lajkanje" pjesama</td>
    </tr>
    <tr>
        <td>zaglavlje.php</td>
        <td>Zaglavlje, sve ostale datoteke je uključuju, sadrži izbornik i uključuje css</td>
    </tr>    
</tbody>
</table>

<?php
include("podnozje.php");
?>