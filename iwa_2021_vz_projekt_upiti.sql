#odabir svih atributa svih korisnika
SELECT * FROM korisnik;

#odabir naziva, opisa svih medijskih kuća
SELECT naziv, opis FROM medijska_kuca;

#odabir svih registriranih korisnika
SELECT * FROM korisnik WHERE tip_korisnika_id = 2;

#odabir svih pjesmi korisnika 1
SELECT * FROM pjesma WHERE korisnik_id = 1;

#odabir svih kupljenih pjesmi sortiranih po broju sviđanja
SELECT * FROM pjesma WHERE medijska_kuca_id IS NOT NULL AND datum_vrijeme_kupnje IS NOT NULL ORDER BY datum_vrijeme_kupnje;

#odabir svih pjesmi(zatraženih i kupljenih) medijske kuće 1 sa imenom i prezimenom korisnika je kreirao pjesmu
SELECT  k.ime, k.prezime, p.naziv, p.opis, p.poveznica, p.broj_sviđanja, p.datum_vrijeme_kreiranja FROM pjesma p, korisnik k WHERE p.medijska_kuca_id=1 AND p.korisnik_id=k.korisnik_id;

#odabir svih korisnika prema medijskim kućama sortiranih prema medijskim kućama
SELECT m.naziv,k.ime, k.prezime FROM korisnik k, medijska_kuca m WHERE m.medijska_kuca_id=k.medijska_kuca_id ORDER BY m.medijska_kuca_id

#odabir svih pjesmi korisnika 1 koje su zatražene ili kupljene od medijske kuće sa nazivom medijske kuće a koje su kreirane između 23.10.2021 01:00:00 i 25.10.2021 15:00:00
SELECT m.naziv, p.naziv, p.opis, p.poveznica, p.broj_sviđanja, p.datum_vrijeme_kreiranja, p.datum_vrijeme_kupnje FROM pjesma p, korisnik k, medijska_kuca m WHERE k.korisnik_id=1 AND m.medijska_kuca_id=p.medijska_kuca_id AND p.datum_vrijeme_kreiranja BETWEEN '2021-10-23 01:00:00' AND '2021-10-25 15:00:00'

#odabir svih pjesmi korisnika prema medijskim kućama u koje pjesme pripadaju pri čemu se prikazuju ime i prezime korisnika i naziv medijske kuće
SELECT m.naziv, p.*, k.ime, k.prezime FROM pjesma p, korisnik k, medijska_kuca m WHERE k.korisnik_id = p.korisnik_id AND m.medijska_kuca_id=p.medijska_kuca_id

#statistika ukupnog broja sviđanja po medijskim kućama
SELECT m.naziv,SUM(p.broj_svidanja) as ukupan_broj_svidanja FROM pjesma p, medijska_kuca m WHERE p.medijska_kuca_id=m.medijska_kuca_id AND p.datum_vrijeme_kupnje IS NOT NULL GROUP BY p.medijska_kuca_id

#ažuriranje id medijske kuće na null unutar pjesme 1
UPDATE pjesma  SET medijska_kuca_id=null WHERE pjesma_id=1;