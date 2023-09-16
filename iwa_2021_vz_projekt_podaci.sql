SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE `iwa_2021_vz_projekt` ;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'moderator'),
(2, 'korisnik');

INSERT INTO `medijska_kuca` (`medijska_kuca_id`, `naziv`, `opis`) VALUES
(1,'Novi pokret','Strane, domaće, ma sve. Kod nas možeš čuti alternativne zvukove.'),
(2,'Klasika','Klasična glazba je sve što nas zanima.'),
(3,'Rokaši Studio','Kao što i ime govori, rock glazba nam teče u venama.'),
(4,'Mild One','Volimo zvukove prirode, laganice, violinu i dobar glas.'),
(5,'Folklor','Volimo tambure i folklorne pjesme.');

INSERT INTO `korisnik` (`korisnik_id`, `tip_korisnika_id`, `medijska_kuca_id`,`korime`, `lozinka`, `ime`, `prezime`, `email`) VALUES
(1,  0, null, 'admin', 'foi', 'Administrator', 'Admin', 'admin@foi.hr'),
(2,  1, 2, 'voditelj', '123456', 'voditelj', 'Vodi', 'voditelj@foi.hr'),
(3,  2, null, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr'),
(4,  1, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr'),
(5,  2, null, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr'),
(6,  2, null, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr'),
(7,  2, null, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr'),
(8,  2, null, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr'),
(9,  2, null, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr'),
(10, 2, null, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr'),
(11, 2, null, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr'),
(12, 1, 5, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr'),
(13, 2, null, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr'),
(14, 1, 1, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr'),
(15, 2, null, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr'),
(16, 1, 3, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr'),
(17, 1, 1, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr'),
(18, 2, null, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr'),
(19, 2, null, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr'),
(20, 2, null, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr'),
(21, 2, null, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr'),
(22, 2, null, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr'),
(23, 2, null, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr'),
(24, 2, null, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr'),
(25, 2, null, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr'),
(26, 2, null, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr'),
(27, 2, null, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr'),
(28, 2, null, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr'),
(29, 2, null, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr'),
(30, 2, null, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr'),
(31, 2, null, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr'),
(32, 2, null, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr'),
(33, 2, null, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr'),
(34, 2, null, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr'),
(35, 2, null, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr'),
(36, 2, null, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr'),
(37, 2, null, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr'),
(43, 2, null, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr'),
(44, 2, null, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr'),
(45, 2, null, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr'),
(46, 2, null, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr'),
(47, 2, null, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr'),
(48, 2, null, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr'),
(49, 2, null, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr'),
(50, 2, null, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr'),
(51, 2, null, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr'),
(52, 2, null, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr'),
(53, 2, null, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr'),
(54, 2, null, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr'),
(55, 2, null, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr'),
(56, 2, null, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr'),
(57, 2, null, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr'),
(58, 2, null, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr'),
(59, 2, null, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr'),
(60, 2, null, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr'),
(61, 2, null, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr'),
(62, 2, null, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr'),
(63, 2, null, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr'),
(64, 2, null, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr'),
(65, 2, null, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr'),
(66, 2, null, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr'),
(67, 2, null, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr'),
(68, 2, null, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr'),
(69, 2, null, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr'),
(70, 2, null, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr');


INSERT INTO `pjesma` (`pjesma_id`, `medijska_kuca_id`,`korisnik_id`,`naziv`,`poveznica`,`opis`,`datum_vrijeme_kreiranja`,`datum_vrijeme_kupnje`,`broj_svidanja`) VALUES
(1, 1, 3, 'Namcor', 'https://pl.meln.top/mr/3be43f7c60e76d1db08c5a22c36994c5.mp3?session_key=5909fa02c57a57a535614d9d6456bf53', 'Ne volem ništa, al tebe volem.', '2021-10-22 15:29:00', '2021-11-05 10:22:00', 200),
(2, 2, 3, 'Kiša poslje tuge', 'https://pl.meln.top/mr/a8b5488c70bd60bccd3f6fd66be37da3.mp3?session_key=233523b7faa91570e1ff0c7e2cc01597', 'Ovo je moja interpretacija unutarnjeg doživljaja tuge.', '2021-10-23 11:00:00', '2021-12-21 12:29:00', 100),
(3, 3, 13, 'We Will Rock You', 'https://pl.meln.top/mr/581dd34ce98c6ab8776b7953b2628f26.mp3?session_key=e80e165db60b922d3fd0516848fe2a67', 'We really will rock you.', '2020-09-10 11:21:00', '2021-10-22 15:29:00', 321),
(4, 3, 3, 'I Can\'t Go on Without You', 'https://pl.meln.top/mr/af9e48b76d942400e8c8b3d6e00c8397.mp3?session_key=f7ccfe392176b2f79586b9be3880ba5f', 'S ovom pjesmom pokušavamo doprijeti do mladih, živio Rock.', '2021-12-12 12:12:00', '2021-01-12 21:21:00', 1543),
(5, 2, 19, 'Mezimica', 'https://pl.meln.top/mr/349b1f5973a71aefe7f124e7b6eb98b5.mp3?session_key=8c18b3ef34f55f838777e8f7bb403afa', 'Ovo je pjesma o mojoj mački Mazi.', '2021-08-12 12:29:00', '2021-09-12 12:12:00', 5233),
(6, 1, 5, 'Ringišpil', 'https://pl.meln.top/mr/4a996906a6b5ba32e56a2c1827aeec85.mp3?session_key=2b3a7c11af4919e2ef43e4c1c74e35af', 'Pa daj okreni taj ringišpil u mojoj glavi. To niko ne zna, samo ti. Bez tebe, drveni konjići tužno stoje.', '2021-10-22 15:29:00', '2021-10-22 17:29:00', 86),
(7, 1, 5, 'Olivera', 'https://cdnm.meln.top/ml/?audio=0_33818195653023&title=Djordje%20Balasevic%20-%20Olivera&hash=cFiuwHHM15FgKfltB5zoKmxS5i8=', 'Ti si bila još devojčica. Leteo je kao leptir tvoj čuperak. ', '2021-10-10 13:29:00', null, 254),
(8, 5, 18, 'Zaljuljali smo svijet', 'https://pl.meln.top/mr/3d6bb4639ada46ad7cda4e9e975ba55c.mp3?session_key=389b9863c19efdb46c673cc639b06443', 'Ovo je pjesma o ljubavi koja je najbolji osječaj na svijetu.', '2021-09-28 12:11:00', null, 603),
(9, 5, 21, 'Zajdi, zajdi', 'https://pl.meln.top/mr/5987cf0a902c1d7be8d797c13acccb60.mp3?session_key=1ec6a45b803e939da17028d1e5ea6832', 'Moja verzija makedonske pjesme Zajdi zajdi sonce.', '2021-12-29 11:03:00', null, 326),
(10, 4, 21, 'Everything I Wanted', 'https://pl.meln.top/mr/50e5795710b72022c698b2e4d56854ee.mp3?session_key=3052dcf6e7556da4e187a38fa068e06b', 'I wanted nothing.', '2021-05-03 21:29:00', null, 23),
(11, 3, 25, 'Dogs of War', 'https://pl.meln.top/mr/a51602324fad5eef3116e0a90ef38f19.mp3?session_key=ba40560321c36f4c4d4e3feec88c21c3', 'Blues Saraceno!', '2021-05-03 03:12:00', null, 7543),
(12, null, 3, 'Industry Baby', 'https://pl.meln.top/mr/c3366c8002be2e35ef0d194d444e98b0.mp3?session_key=70dd0afd0a34297f498eea5121a7154b', 'Pjesma je snimana sa naglaskom na industriju.', '2021-10-22 11:09:00', null, 321),
(13, null, 3, 'Bad Habits', 'https://pl.meln.top/mr/d03dd7709a537096e685ec668c438ea9.mp3?session_key=9b1674af73a3e3152826750a21c683d9', 'Pjesma je napravljena u suradnji Ed Sheeranom', '2020-03-10 12:12:00', null, 54),
(14, null, 13, 'Levitating', 'https://pl.meln.top/mr/65d7913e1ffe205c082ad4e5b9478d80.mp3?session_key=7d47327be416695d88ad5d462b93d868', 'If you wanna run away with me, I know a galaxy and I can take you for a RIDE!', '2021-10-11 12:11:00', '', 532),
(15, null, 19, 'Don\'t go yet', 'https://pl.meln.top/mr/98a6ac59bc5d180eb4ca4f1167ccc545.mp3?session_key=5f3f944b4ae2acb8919745b30d00dcfe', 'Dongoye, dongoye', '2021-11-11 11:11:00', null, 12),
(16, null, 5, 'Beggin', 'https://pl.meln.top/mr/52f8aaf4b2ca0bb7fb269aa0bcd07360.mp3?session_key=7692ee09bd24c3c38480dc8eaf0cae23', 'Ovo je cover poznate pjesme u našoj novoj izvedbi.', '2021-02-20 11:11:00', null, 53),
(17, null, 5, 'My Universe', 'https://pl.meln.top/mr/b86285eee3d7cb1c7617b6a6bf6b0ace.mp3?session_key=71f03f01c2a1b6b3fbf1955a1cd76b18', 'Pjesma u suradnji s BTS-om. Cookie je najbolji.', '2021-10-22 15:10:00', null, 24),
(18, null, 20, 'Montero', 'https://pl.meln.top/mr/94839be3cbd4a7505c260408ca91dbda.mp3?session_key=e9d99c78afa3b56992c6201fe249ec12', 'Call me by your name!', '2021-10-10 11:22:00', null, 56);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
