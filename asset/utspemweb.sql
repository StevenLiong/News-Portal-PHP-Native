-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 06:39 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utspemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(10) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penulis` varchar(100) DEFAULT NULL,
  `konten` longtext DEFAULT NULL,
  `tglpublish` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `penulis`, `konten`, `tglpublish`, `gambar`) VALUES
('168', 'Kuliner Malam Legendaris di Dago Bandung, Warung Jadoel', 'Suparmin ', 'Jagung bakar dan minuman hangat selalu jadi camilan andalan saat malam hari di Bandung yang sejuk. Bagi warga Bandung dan mahasiswa pendatang, Warung Jagung Bakar Doel atau yang dikenal Jadoel tidak asing lagi.  Pemilik Warung Jadoel Tatang (59) mengatakan sudah berjualan jagung bakar sejak 20 tahun lalu.  Sesuai dengan nama usahanya, yaitu Jadoel,  Tatang tetap mempertahankan kondisi warung seperti pertama buka.', '2021-10-11', '1e9a8de244c4a8c242e12baa5007713f.jpg'),
('304', 'Alergi', 'Jessica Rosa Nathania', 'Alergi merupakan reaksi sistem kekebalan tubuh yang tidak normal atau berlebihan terhadap alergen, yang umumnya tidak menimbulkan reaksi di tubuh orang lain. Alergen merupakan zat tertentu yang dapat menyebabkan alergi, seperti serbuk sari tumbuhan, sengatan serangga, makanan, dan lainnya. Pada dasarnya, sistem kekebalan tubuh menghasilkan antibodi.', '2021-10-11', '6cee78b68c3cdca1ad077bb375756dec.jpg'),
('43', 'Fajar/Rian Menang, Indonesia vs Thailand 2-2', 'CNN', 'Jakarta, CNN Indonesia -- Fajar Alfian/Muhammad Rian Ardianto berhasil mengalahkan Natthapat Trinkajee/Tanupat Viriyangkura dengan skor 21-9, 21-12. Indonesia pun menyamakan kedudukan menjadi 2-2.\r\nFajar/Rian yang berada dalam kondisi tekanan besar lantaran Indonesia tertinggal 1-2 bermain baik sejak awal laga. Serangan-serangan Fajar/Rian sukses menembus pertahanan Natthapat/Tanupat.\r\nSetelah memimpin 11-4 di saat interval, Fajar/Rian bisa merebut enam poin beruntun untuk menjauh dengan skor 17-4.', '2021-10-11', 'cf35f6b5717c4de2803e089582201e51jpeg'),
('6', 'Alasan Hujan Meteor Arids Diperhitungkan Astronom', 'Memet', 'Jakarta, CNN Indonesia -- Persatuan Astronom Internasional (IAU) menambahkan hujan meteor Arids ke dalam daftar kerja hujan meteor IAU pada 1 Oktober. Hujan meteor Arids yang dapat dilihat dari belahan Bumi paling selatan dari akhir September hingga 7 Oktober.\r\nTerjadinya hujan meteor Arids karena lokasi serpihan meteor tersebut baru dilewati oleh Bumi.\r\n\r\nUntuk diingat hujan meteor umumnya terjadi setiap tahun pada periode waktu yang hampir sama dikarenakan lokasi serpihan meteor yang terletak di angkasa luar dilewati pada waktu yang sama ketika Bumi berevolusi.', '2021-10-11', '5ec114c670cb61836102dddfa8ed234ejpeg'),
('670', 'Lagi, China Modern Land Terancam Ikut Jejak Krisis Evergrande', 'Beni Susanto', 'Setelah Evergrande dan Fantasia Holding, kini giliran Modern Land, perusahaan pengembang properti China lain, yang terancam gagal bayar utang. Saat ini, Modern Land tengah meminta perpanjangan waktu kepada investor untuk membayar obligasi senilai US$250 juta.\r\nModern Land menyampaikan hal itu ke Bursa Efek Hong Kong, pasar modal tempat perusahaan mendaftarkan sahamnya.', '2021-10-11', '17e1e9410f0ba9663a55d55bed18a617jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_berita` varchar(10) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_berita`, `kategori`) VALUES
('168', 'Food'),
('304', 'Health'),
('43', 'Sports'),
('6', 'Science'),
('670', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komen` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_berita` varchar(10) NOT NULL,
  `tgl` date DEFAULT NULL,
  `jmlhlike` int(11) DEFAULT NULL,
  `isikomen` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_user`, `id_berita`, `tgl`, `jmlhlike`, `isikomen`) VALUES
('55652', '76864', '168', '2021-10-11', 0, 'wah enak ya jagung ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `profilepicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `tgllahir`, `gender`, `password`, `profilepicture`) VALUES
('76864', 'Steven', 'Liong', 'liong@gmail.com', '1985-02-28', 'Female', 'liong123', '13e759c9134e3b0901c69cf854a9a35d.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_berita`,`kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`),
  ADD KEY `id_berita` (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
