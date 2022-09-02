-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 01, 2022 at 05:47 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizcuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_nyawa`
--

CREATE TABLE `cash_nyawa` (
  `cash_nyawa_id` int(11) NOT NULL,
  `nama_top_up` varchar(80) NOT NULL,
  `jumlah_nyawa_dipulihkan` int(11) NOT NULL,
  `jumlah_cash_dibayar` int(11) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash_nyawa`
--

INSERT INTO `cash_nyawa` (`cash_nyawa_id`, `nama_top_up`, `jumlah_nyawa_dipulihkan`, `jumlah_cash_dibayar`, `dibuat_saat`) VALUES
(1, 'paket sedekah', 5, 15000, '2022-08-24 01:41:52'),
(2, 'paket miskin', 10, 29000, '2022-08-24 01:41:52'),
(3, 'paket menengah', 15, 42000, '2022-08-24 01:41:52'),
(4, 'paket mahal', 30, 70000, '2022-08-24 01:41:52'),
(5, 'paket mewah', 50, 100000, '2022-08-24 01:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilihan_user`
--

CREATE TABLE `jawaban_pilihan_user` (
  `jawaban_pilihan_user_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_quiz_id` int(11) NOT NULL,
  `pilihan` char(1) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_pilihan_user`
--

INSERT INTO `jawaban_pilihan_user` (`jawaban_pilihan_user_id`, `fk_user_id`, `fk_quiz_id`, `pilihan`, `dibuat_saat`) VALUES
(1, 2, 1, 'b', '2022-08-24 01:41:52'),
(2, 2, 6, 'c', '2022-08-24 01:41:52'),
(4, 2, 12, 'a', '2022-08-24 01:41:52'),
(5, 2, 10, 'a', '2022-08-24 01:41:52'),
(6, 2, 13, 'a', '2022-08-24 01:41:52'),
(7, 2, 16, 'c', '2022-08-24 01:41:52'),
(8, 3, 1, 'c', '2022-08-24 01:41:52'),
(9, 3, 1, 'b', '2022-08-24 01:41:52'),
(10, 3, 6, 'c', '2022-08-24 01:41:52'),
(12, 3, 6, 'a', '2022-08-24 01:41:52'),
(13, 3, 12, 'a', '2022-08-24 01:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_quiz`
--

CREATE TABLE `kategori_quiz` (
  `kategori_quiz_id` int(11) NOT NULL,
  `nama_kategori` varchar(80) NOT NULL,
  `link_foto_kategori` varchar(255) DEFAULT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_quiz`
--

INSERT INTO `kategori_quiz` (`kategori_quiz_id`, `nama_kategori`, `link_foto_kategori`, `dibuat_saat`) VALUES
(1, 'ipa', 'img/kategori/IPA.jpg', '2022-08-24 01:41:52'),
(2, 'matematika', 'img/kategori/Matik.jpg', '2022-08-24 01:41:52'),
(3, 'english', 'img/kategori/English.jpg', '2022-08-24 01:41:52'),
(4, 'teka-teki', 'img/kategori/TTS.jpg', '2022-08-24 01:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `koin_nyawa`
--

CREATE TABLE `koin_nyawa` (
  `koin_nyawa_id` int(11) NOT NULL,
  `jumlah_nyawa_dipulihkan` int(11) NOT NULL,
  `jumlah_koin_dibayar` int(11) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `koin_nyawa`
--

INSERT INTO `koin_nyawa` (`koin_nyawa_id`, `jumlah_nyawa_dipulihkan`, `jumlah_koin_dibayar`, `dibuat_saat`) VALUES
(1, 1, 3, '2022-08-24 01:41:52'),
(2, 3, 8, '2022-08-24 01:41:52'),
(3, 10, 28, '2022-08-24 01:41:52'),
(4, 20, 45, '2022-08-24 01:41:52'),
(5, 50, 115, '2022-08-24 01:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `nama_level` int(11) NOT NULL,
  `jumlah_koin_didapatkan` int(11) NOT NULL DEFAULT '3',
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `nama_level`, `jumlah_koin_didapatkan`, `dibuat_saat`) VALUES
(1, 1, 1, '2022-08-24 01:41:52'),
(2, 2, 1, '2022-08-24 01:41:52'),
(3, 3, 1, '2022-08-24 01:41:52'),
(4, 4, 1, '2022-08-24 01:41:52'),
(5, 5, 1, '2022-08-24 01:41:52'),
(6, 6, 1, '2022-08-24 01:41:52'),
(7, 7, 1, '2022-08-24 01:41:52'),
(8, 8, 1, '2022-08-24 01:41:52'),
(9, 9, 1, '2022-08-24 01:41:52'),
(10, 10, 1, '2022-08-24 01:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `fk_kategori_quiz_id` int(11) NOT NULL,
  `fk_level_id` int(11) NOT NULL,
  `link_foto_soal` varchar(255) DEFAULT NULL,
  `soal` text NOT NULL,
  `opsi_a` varchar(255) NOT NULL,
  `opsi_b` varchar(255) NOT NULL,
  `opsi_c` varchar(255) NOT NULL,
  `opsi_d` varchar(255) NOT NULL,
  `jawaban_benar` char(1) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `fk_kategori_quiz_id`, `fk_level_id`, `link_foto_soal`, `soal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `jawaban_benar`, `dibuat_saat`) VALUES
(1, 1, 1, NULL, 'apa singkatan dari SDA?', 'sumber dari alam', 'sumber daya alam', 'senang dapat A', 'siapa dia', 'b', '2022-08-24 01:41:52'),
(2, 1, 1, NULL, 'kenapa kita butuh tidur?', 'karena kita memerlukannya', 'untuk menambah tenaga', 'karena takdir', 'karena hobi', 'b', '2022-08-24 01:41:52'),
(3, 1, 1, NULL, 'ciri hewan mamalia adalah?', 'mama nya dari anak yang bernama lia', 'hewan memakan rumput', 'hewan mempunyai daun telinga', 'hewan yang berdarah dingin', 'c', '2022-08-24 01:41:52'),
(4, 1, 2, NULL, 'apa singkatan dari PLN?', 'Pembangkit Listrik Tenaga Narapidana', 'Pembangkit Listrik Tenaga Nuklir', 'Pembangkit Laut Tenaga Nuklir', 'Pembangkit Laut Tenaga Ndak Tau', 'b', '2022-08-24 01:41:52'),
(6, 1, 2, NULL, 'ciri hewan reptil adalah?', 'mama nya dari anak yang bernama lia', 'hewan memakan rumput', 'hewan mempunyai daun telinga', 'hewan yang berdarah dingin', 'c', '2022-08-24 01:41:52'),
(9, 1, 3, NULL, 'apa itu PLTA?', 'pembangkit listrik tenaga alfa', 'pembangkit listrik tenaga air', 'pembangkit listrik tanpa air', 'pembangkit listrik tenaga api', 'b', '2022-08-24 01:41:52'),
(10, 1, 4, NULL, 'apa itu m dalam fisika?', 'mana saya tahu', 'massa', 'kekuatan', 'kecepatan', 'b', '2022-08-24 01:41:52'),
(11, 1, 4, NULL, 'cara merubah dari suhu celcius ke reamur adalah?', '4 / 5 x suhu C', '5 / 4 x suhu C', '5 / 9 x suhu F', '9 / 5 x suhu C', 'a', '2022-08-24 01:41:52'),
(12, 1, 4, NULL, 'apa itu karnivora?', 'hewan pemakan daging', 'hewan pemakan tumbuhan', 'hewan pemakan segala', 'gak bisa makan', 'a', '2022-08-24 01:41:52'),
(13, 2, 1, NULL, '1 + 1 = ?', '2', '1', '3', '11', 'a', '2022-08-24 01:41:52'),
(14, 2, 1, NULL, '1 + 4 = ?', '4', '5', '6', '1', 'b', '2022-08-24 01:41:52'),
(15, 2, 1, NULL, '5 x 1 = ?', '0', '1', '10', '5', 'c', '2022-08-24 01:41:52'),
(16, 2, 2, NULL, '1 + 1 x 2 = ?', '3', '2', '4', '1', 'a', '2022-08-24 01:41:52'),
(17, 2, 2, NULL, '4 - 2 x 2 = ?', '4', '0', '1', '8', 'a', '2022-08-24 01:41:52'),
(18, 2, 2, NULL, '3 x 3 - 3 = ?', '6', '0', '1', '2', 'a', '2022-08-24 01:41:52'),
(19, 2, 3, NULL, '(4 + 7) x 2 = ?', '22', '11', '18', '0', 'a', '2022-08-24 01:41:52'),
(20, 2, 3, NULL, '( 4 - 4 ) x 8 = ? ', '1', '0', '28', '24', 'b', '2022-08-24 01:41:52'),
(21, 2, 3, NULL, '( 8 x 2 ) - 8 = ?', '22', '-48', '8', '-8', 'c', '2022-08-24 01:41:52'),
(22, 4, 1, NULL, 'bagaimana cara memasukan gajah ke dalam kulkas?', 'ya gabisa lah anjir', 'buka kulkasnya masukin gajahnya selesai deh', 'buka kulkasnya masukin gajahnya tutup kulkasnya', 'tinggal masukin aja', 'c', '2022-08-30 23:50:49'),
(23, 4, 2, NULL, 'bagaimana cara memasukan jerapah ke dalam kulkas?', 'kaya di soal pertama kann', 'buka kulkasnya masukin jerapahnya selesai deh', 'buka kulkasnya masukin jerapahnya tutup kulkasnya', 'buka kulkasnya keluarin gajahnya masukin jerapahnya tutup kulkasnya', 'd', '2022-08-30 23:52:31'),
(24, 4, 3, NULL, 'singa membuat pesta dihutan, mengundang semua binatang, binatang apa yang tidak hadir dalam pesta tersebut?', 'gajah, karena sedang berada dalam kulkas', 'kancil, karena takut dimakan singa', 'jerapah, karena didalam kulkas', 'kerbau, karena ikut kancil', 'c', '2022-09-01 16:50:49'),
(25, 4, 4, NULL, 'kancil sedang menyebrang sungai yang dipenuhi buaya, bagaimana cara kancil menyebrangi sungai tanpa harus dimakan buaya?', 'mengelabui buaya,kan kancil pinter', 'ya nyebrang aja kan buayanya ke pesta singa', 'diem aja gausah nyebrang', 'cari bantuan hewan lain buat nyebrang', 'b', '2022-09-01 16:53:48'),
(26, 4, 5, NULL, 'ada 5 burung di pohon, ditembak 1 oleh pemburu, berapa burung yang lari?', 'semuanya kan burungnya panik', 'empat kan yang satu mati ditembak', 'tidak ada kan burung terbang', 'tidak ada yang lari pelurunya si pemburu habis', 'c', '2022-09-01 16:56:42'),
(27, 3, 1, NULL, 'One, two, three, four, â€¦, six, seven, The dots are filled in?', 'eight', 'nine', 'three', 'five', 'd', '2022-09-01 17:00:18'),
(28, 3, 2, NULL, 'Yang termasuk nama buah adalah â€¦', 'Table', 'Clothes', 'Horse', 'Apple', 'd', '2022-09-01 17:01:51'),
(29, 3, 3, NULL, 'Bahasa Inggris dari buku adalah â€¦', 'Chair', 'Table', 'Book', 'Kitchen', 'c', '2022-09-01 17:03:05'),
(30, 3, 4, NULL, 'Saat ingin minta maaf kita mengucapkan â€¦', 'Sorry', 'Thank you', 'Goodbye', 'Good morning', 'a', '2022-09-01 17:04:22'),
(31, 3, 5, NULL, 'Rudi : Hai Maya, how are you?\r\nMaya : â€¦', 'Yes, I am', 'Fine, and you?', 'This is mine', 'Itâ€™s okay', 'b', '2022-09-01 17:05:45'),
(32, 3, 6, NULL, 'Kita mengucapkan good morning saat â€¦', 'pagi', 'siang', 'sore', 'malam', 'a', '2022-09-01 17:06:34'),
(33, 3, 7, NULL, 'mother has a sister, you call your mother\'s sister by?', 'grandmother', 'uncle', 'aunt', 'niece', 'c', '2022-09-01 17:09:41'),
(34, 3, 8, NULL, 'a â€“ l â€“ p â€“ n â€“ e\r\nThe correct word is â€¦', 'planet', 'plan', 'plane', 'plate', 'c', '2022-09-01 17:10:50'),
(35, 3, 9, NULL, 'Do you bring the book ... I gave it to you yesterday?', 'when', 'where', 'that', 'which', 'd', '2022-09-01 17:13:15'),
(36, 3, 10, NULL, 'If I â€¦ a lot of money, I â€¦ a perfect match for her.\r\nFill in the blanks with the best option.', 'had, would be', 'have, would be', 'had, wouldnâ€™t have been', 'had, would have been', 'a', '2022-09-01 17:15:52'),
(37, 3, 1, NULL, 'Even before the coronavirus pandemic ignited global conversations about hygiene, there was one part of an airplane that nobody wanted to touch â€” the bathroom door.\r\n\r\nWhat can we infer from the sentence above?', 'people are afraid to touch airplane bathroom door due to fear of coronavirus spreads.', 'airplane bathroom door is among top suspects of coronavirus spreaders.', 'people have always been concerned about airplane bathroom door hygiene even before the pandemic.', 'lack of hygiene is the reason why coronavirus pandemic spreads across the globe.', 'c', '2022-09-01 17:18:14'),
(38, 1, 5, NULL, 'Molaritas KI pada larutan yang mengandung 5,0% w/w (weight/weight) pada KI dengan densitas 1,038 g/ml adalahâ€¦\r\n(Ar K = 39, Ar I = 127)', '0,031 M', '0,3114 M', '0,5001 M', '0,6250 M', 'b', '2022-09-01 17:23:24'),
(39, 1, 6, NULL, 'Hitunglah titik didih larutan dan naik titik didih dari 34,2 gram zat Q (mr=34,2) yang dilarutkan dalam 500 gram air dengan kenaikan titik didih air 0,52 Â°C dan titik didih air pelarut 100Â°C.', '105,04Â°C', '102,04Â°C', '101,04Â°C', '98,04Â°C', 'c', '2022-09-01 17:24:18'),
(40, 1, 7, NULL, 'Bilangan oksidasi dari unsur N dan P pada senyawa di bawah ini adalahâ€¦\r\nNH4 H2 PO4', '-1 dan +3', '+1 dan +3', '-3 dan +5', '+3 dan +5', 'c', '2022-09-01 17:26:14'),
(41, 1, 8, NULL, 'Pada elektrolisis 400mL larutan CuSO4 0,01 M, untuk mengendapkan seluruh ion tembaga diperlukan arus listrik dengan muatan sebesarâ€¦', '0,024 F', '0,008 F', '0,004 F', '0,003 F', 'b', '2022-09-01 17:27:18'),
(42, 1, 9, NULL, 'Di antara pilihan berikut ini, manakah yang merupakan bintang dengan temperatur paling panas?', 'Matahari', 'Antares (bintang merah)', 'Alpha Centauri A ( bintang kuning)', 'Zeta Puppis (bintang biru)', 'd', '2022-09-01 17:33:19'),
(43, 1, 10, NULL, 'Elektron A bergerak ke barat dengan laju 0,6 c relatif terhadap laboratorium. Elektron B juga bergerak ke barat dengan laju 0,8 c relatif terhadap laboratorium. Laju relatif elektron A menurut kerangka acuan dimana elektron B berada dalam keadaan diam adalah â€¦.', '4/5 c mendekati B', '4/5c menjauhi B', '5/13 mendekati B', '5/13 menjauhi B', 'd', '2022-09-01 17:34:44'),
(44, 2, 4, NULL, 'Jika x dan y adalah solusi dari sistem persamaan 4x + y = 9 dan x + 4y = 6, maka nilai 2x + 3y.', 'enam (6)', 'tujuh (7)', 'delapan (8)', 'sembilan (9)', 'd', '2022-09-01 17:37:08'),
(45, 2, 5, NULL, 'Persamaan garis vertikal dengan 2x â€“ 3y + 8 = 0 dan melalui titik (-3.2) adalah.', '2x + 3y = 0', '3x + 2y = 0', '-2x + 3y-12 = 0', '3x + 2y-13 = 0', 'b', '2022-09-01 17:38:07'),
(46, 2, 6, NULL, 'Peluru ditembakkan ke atas pada kecepatan awal vo m / detik. Ketinggian lantai setelah t detik dinyatakan oleh fungsi h (t) = 100 + 40t â€“ 4t2. Tinggi maksimum yang bisa dicapai bola adalah.', '400m', '300m', '200m', '100m', 'd', '2022-09-01 17:39:22'),
(47, 2, 7, NULL, 'Kemampuan petani untuk mengolah sampah menjadi kompos dari hari ke hari semakin baik. Pada hari pertama ia mampu mengolah 2 m3 sampah, pada hari kedua 5 m3 sampah dan pada hari ketiga 8 m3 sampah. Pada hari ke 10, petani dapat memproses limbah berikut.', '29 m3', '56 m3', '100 m3', '155 m3', 'c', '2022-09-01 17:40:19'),
(48, 2, 8, NULL, 'Persamaan garis lurus melalui titik (8, 0) dan (0, 6) adalah.', '8x + 6 y = 48', '6x + 8y = 48', '8x + 6th> 48', '6x -8y = 483', 'd', '2022-09-01 17:41:23'),
(49, 2, 9, NULL, 'Penjual buah menjual dua jenis buah, yaitu mangga dan lengkeng. Dia membeli mangga seharga 12.000 rupee per kilogram dan menjualnya dengan harga 16.000 rupee per kilogram. Dia membeli buah lengkeng dengan harga 9.000 rupee per kilogram dan menjualnya dengan harga 12.000 rupee per kilogram. Modal yang dimilikinya adalah Rp1.800.000,00, sedangkan mobilnya hanya bisa menampung 175 kilogram buah.\r\n\r\nKeuntungan maksimum yang bisa dia dapatkan adalah.', 'Rp.400.000.00', 'Rp.500.000,00', 'Rp.600.000,00', 'Rp.700.000,00', 'c', '2022-09-01 17:43:36'),
(50, 2, 10, NULL, 'Diketahui bahwa balok ABCD EFGH dengan panjang AB = 6 cm, BC = 4 cm dan AE = 3 cm, jarak dari D ke F.', 'âˆš61 cm', 'âˆš72 cm', '52 cm', '25 cm', 'b', '2022-09-01 17:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `jumlah_nyawa` int(11) NOT NULL DEFAULT '3',
  `jumlah_koin` int(11) NOT NULL DEFAULT '5',
  `nama_posisi` enum('admin','pemain') NOT NULL DEFAULT 'pemain',
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `password`, `email`, `no_telpon`, `jumlah_nyawa`, `jumlah_koin`, `nama_posisi`, `dibuat_saat`) VALUES
(1, 'superadmin', '12345678', 'superadmin@gmail.com', '0898892211', 3, 9999, 'admin', '2022-08-24 01:41:52'),
(2, 'konen', '12345678', 'addykonen80@gmail.com', '0898892211', 3, 5, 'pemain', '2022-08-24 01:41:52'),
(3, 'dedy', '12345678', 'Omekdedy@gmail.com', '0878821117812', 3, 5, 'pemain', '2022-08-24 01:41:52'),
(4, 'palguna', '12345678', 'palguna1121@gmail.com', '0815527723941', 5, 285, 'pemain', '2022-08-24 01:41:52'),
(5, 'master sukiawan', 'hipertensi', 'mastersukiawan@gmail.com', '088812311222', 3, 5, 'pemain', '2022-08-24 01:41:52'),
(6, 'pras_gaming', 'prass12', 'pras@module.com', '0912288002', 3, 5, 'pemain', '2022-08-24 01:41:52'),
(7, 'john', 'john22', 'johncena@gmail.com', '122448821122', 3, 5, 'pemain', '2022-08-24 01:41:52'),
(8, 'anna', 'anna22', 'anna@gmail.com', '729911122888', 3, 5, 'pemain', '2022-08-24 01:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_cash_nyawa`
--

CREATE TABLE `user_cash_nyawa` (
  `user_cash_nyawa_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_cash_nyawa_id` int(11) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cash_nyawa`
--

INSERT INTO `user_cash_nyawa` (`user_cash_nyawa_id`, `fk_user_id`, `fk_cash_nyawa_id`, `dibuat_saat`) VALUES
(1, 3, 1, '2022-01-24 01:41:52'),
(2, 3, 3, '2022-02-24 01:41:52'),
(3, 3, 4, '2022-03-24 01:41:52'),
(4, 2, 1, '2022-04-24 01:41:52'),
(5, 2, 5, '2022-05-24 01:59:12'),
(6, 4, 5, '2022-06-24 01:59:40'),
(7, 4, 5, '2022-07-24 01:59:49'),
(8, 4, 1, '2022-08-24 01:59:52'),
(9, 4, 5, '2022-08-30 23:44:54'),
(10, 4, 5, '2022-08-30 23:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_koin_nyawa`
--

CREATE TABLE `user_koin_nyawa` (
  `user_koin_nyawa_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_koin_nyawa_id` int(11) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_koin_nyawa`
--

INSERT INTO `user_koin_nyawa` (`user_koin_nyawa_id`, `fk_user_id`, `fk_koin_nyawa_id`, `dibuat_saat`) VALUES
(1, 2, 1, '2022-01-24 01:41:52'),
(2, 2, 2, '2022-02-24 01:41:52'),
(3, 2, 3, '2022-03-24 01:41:52'),
(4, 3, 1, '2022-04-24 01:41:52'),
(5, 2, 2, '2022-05-24 01:54:53'),
(6, 2, 1, '2022-06-24 01:55:17'),
(7, 2, 1, '2022-07-24 01:55:20'),
(8, 2, 2, '2022-08-24 01:57:18'),
(9, 2, 1, '2022-08-24 01:57:23'),
(10, 2, 5, '2022-08-24 01:59:09'),
(11, 4, 5, '2022-08-30 23:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_level_kategori`
--

CREATE TABLE `user_level_kategori` (
  `user_level_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_level_id` int(11) NOT NULL DEFAULT '1',
  `fk_kategori_quiz_id` int(11) NOT NULL,
  `dibuat_saat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level_kategori`
--

INSERT INTO `user_level_kategori` (`user_level_id`, `fk_user_id`, `fk_level_id`, `fk_kategori_quiz_id`, `dibuat_saat`) VALUES
(1, 1, 1, 1, '2022-08-24 01:41:52'),
(2, 1, 1, 2, '2022-08-24 01:41:52'),
(3, 1, 1, 3, '2022-08-24 01:41:52'),
(4, 1, 1, 4, '2022-08-24 01:41:52'),
(5, 2, 4, 1, '2022-08-24 01:41:52'),
(6, 2, 3, 2, '2022-08-24 01:41:52'),
(7, 2, 1, 3, '2022-08-24 01:41:52'),
(8, 2, 1, 4, '2022-08-24 01:41:52'),
(9, 3, 4, 1, '2022-08-24 01:41:52'),
(10, 3, 1, 2, '2022-08-24 01:41:52'),
(11, 3, 1, 3, '2022-08-24 01:41:52'),
(12, 3, 1, 4, '2022-08-24 01:41:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_nyawa`
--
ALTER TABLE `cash_nyawa`
  ADD PRIMARY KEY (`cash_nyawa_id`);

--
-- Indexes for table `jawaban_pilihan_user`
--
ALTER TABLE `jawaban_pilihan_user`
  ADD PRIMARY KEY (`jawaban_pilihan_user_id`),
  ADD KEY `fk_quiz_id` (`fk_quiz_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `kategori_quiz`
--
ALTER TABLE `kategori_quiz`
  ADD PRIMARY KEY (`kategori_quiz_id`);

--
-- Indexes for table `koin_nyawa`
--
ALTER TABLE `koin_nyawa`
  ADD PRIMARY KEY (`koin_nyawa_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `fk_kategori_quiz_id` (`fk_kategori_quiz_id`),
  ADD KEY `fk_level_id` (`fk_level_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_cash_nyawa`
--
ALTER TABLE `user_cash_nyawa`
  ADD PRIMARY KEY (`user_cash_nyawa_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_cash_nyawa_id` (`fk_cash_nyawa_id`);

--
-- Indexes for table `user_koin_nyawa`
--
ALTER TABLE `user_koin_nyawa`
  ADD PRIMARY KEY (`user_koin_nyawa_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_koin_nyawa_id` (`fk_koin_nyawa_id`);

--
-- Indexes for table `user_level_kategori`
--
ALTER TABLE `user_level_kategori`
  ADD PRIMARY KEY (`user_level_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_level_id` (`fk_level_id`),
  ADD KEY `fk_kategori_quiz_id` (`fk_kategori_quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash_nyawa`
--
ALTER TABLE `cash_nyawa`
  MODIFY `cash_nyawa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jawaban_pilihan_user`
--
ALTER TABLE `jawaban_pilihan_user`
  MODIFY `jawaban_pilihan_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori_quiz`
--
ALTER TABLE `kategori_quiz`
  MODIFY `kategori_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `koin_nyawa`
--
ALTER TABLE `koin_nyawa`
  MODIFY `koin_nyawa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_cash_nyawa`
--
ALTER TABLE `user_cash_nyawa`
  MODIFY `user_cash_nyawa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_koin_nyawa`
--
ALTER TABLE `user_koin_nyawa`
  MODIFY `user_koin_nyawa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_level_kategori`
--
ALTER TABLE `user_level_kategori`
  MODIFY `user_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban_pilihan_user`
--
ALTER TABLE `jawaban_pilihan_user`
  ADD CONSTRAINT `jawaban_pilihan_user_ibfk_1` FOREIGN KEY (`fk_quiz_id`) REFERENCES `quiz` (`quiz_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jawaban_pilihan_user_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`fk_kategori_quiz_id`) REFERENCES `kategori_quiz` (`kategori_quiz_id`),
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`fk_level_id`) REFERENCES `level` (`level_id`);

--
-- Constraints for table `user_cash_nyawa`
--
ALTER TABLE `user_cash_nyawa`
  ADD CONSTRAINT `user_cash_nyawa_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_cash_nyawa_ibfk_2` FOREIGN KEY (`fk_cash_nyawa_id`) REFERENCES `cash_nyawa` (`cash_nyawa_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_koin_nyawa`
--
ALTER TABLE `user_koin_nyawa`
  ADD CONSTRAINT `user_koin_nyawa_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_koin_nyawa_ibfk_2` FOREIGN KEY (`fk_koin_nyawa_id`) REFERENCES `koin_nyawa` (`koin_nyawa_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_level_kategori`
--
ALTER TABLE `user_level_kategori`
  ADD CONSTRAINT `user_level_kategori_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_level_kategori_ibfk_2` FOREIGN KEY (`fk_level_id`) REFERENCES `level` (`level_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_level_kategori_ibfk_3` FOREIGN KEY (`fk_kategori_quiz_id`) REFERENCES `kategori_quiz` (`kategori_quiz_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
