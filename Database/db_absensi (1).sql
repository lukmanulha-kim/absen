-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 04:32 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_absensi`
--
CREATE DATABASE IF NOT EXISTS `db_absensi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_absensi`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_absen` date NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_mapel` int(11) NOT NULL,
  `kd_siswa` int(11) NOT NULL,
  `kehadiran` enum('H','I','S','A','T') NOT NULL,
  `smt` int(11) NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE IF NOT EXISTS `tb_guru` (
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(80) NOT NULL,
  `level` enum('Admin','User') NOT NULL DEFAULT 'User',
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nip`, `nama_guru`, `jenis_kelamin`, `alamat`, `tpt_lahir`, `tgl_lahir`, `status`, `uname`, `pwd`, `level`) VALUES
(1, 'Nadiem', 'L', 'Jakarta', 'Jakarta', '1987-05-12', 'Aktif', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Makarim', 'L', 'Kebonwaru', 'Jakarta', '1987-09-19', 'Aktif', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(35) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `status`) VALUES
(1, 'Kelas VII MTs', 'Aktif'),
(2, 'Kelas VIII MTs', 'Aktif'),
(3, 'Kelas IX A MTs', 'Aktif'),
(4, 'Kelas IX B MTs', 'Aktif'),
(5, 'Kelas X MA', 'Aktif'),
(6, 'Kelas XI MA', 'Aktif'),
(7, 'Kelas XII MA', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komponen`
--

CREATE TABLE IF NOT EXISTS `tb_komponen` (
  `id_komponen` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(10) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_komponen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_komponen`
--

INSERT INTO `tb_komponen` (`id_komponen`, `semester`, `tahun_ajaran`, `status`) VALUES
(1, 'Ganjil', '2019/2020', 'Tidak Aktif'),
(2, 'Genap', '2019/2020', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE IF NOT EXISTS `tb_mapel` (
  `id_mapel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(25) NOT NULL,
  `status` enum('Aktif','Tidak AKtif') NOT NULL,
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`, `status`) VALUES
(1, 'TIK', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penugasan`
--

CREATE TABLE IF NOT EXISTS `tb_penugasan` (
  `id_penugasan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_guru` int(11) NOT NULL,
  `kd_mapel` int(11) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  PRIMARY KEY (`id_penugasan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_penugasan`
--

INSERT INTO `tb_penugasan` (`id_penugasan`, `kd_guru`, `kd_mapel`, `kd_kelas`) VALUES
(1, 2, 1, 1),
(2, 2, 1, 2),
(3, 2, 1, 3),
(4, 2, 1, 4),
(5, 2, 1, 5),
(6, 2, 1, 6),
(7, 2, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rombel`
--

CREATE TABLE IF NOT EXISTS `tb_rombel` (
  `id_rombel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rombel` varchar(35) NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `kd_siswa` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  PRIMARY KEY (`id_rombel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `tb_rombel`
--

INSERT INTO `tb_rombel` (`id_rombel`, `nama_rombel`, `kd_kelas`, `kd_siswa`, `status`) VALUES
(1, '', 1, 190001, 'Aktif'),
(2, '', 1, 190002, 'Aktif'),
(3, '', 1, 190003, 'Aktif'),
(4, '', 1, 190004, 'Aktif'),
(5, '', 1, 190005, 'Aktif'),
(6, '', 1, 190006, 'Aktif'),
(7, '', 1, 190007, 'Aktif'),
(8, '', 1, 190008, 'Aktif'),
(9, '', 1, 190009, 'Aktif'),
(10, '', 1, 190010, 'Aktif'),
(11, '', 1, 190011, 'Aktif'),
(12, '', 1, 190012, 'Aktif'),
(13, '', 1, 190013, 'Aktif'),
(14, '', 1, 190014, 'Aktif'),
(15, '', 1, 190015, 'Aktif'),
(16, '', 1, 190016, 'Aktif'),
(17, '', 1, 190017, 'Aktif'),
(18, '', 1, 190018, 'Aktif'),
(19, '', 1, 190019, 'Aktif'),
(20, '', 1, 190020, 'Aktif'),
(21, '', 1, 190021, 'Aktif'),
(22, '', 1, 190022, 'Aktif'),
(23, '', 1, 190023, 'Aktif'),
(24, '', 1, 190024, 'Aktif'),
(25, '', 1, 190025, 'Aktif'),
(26, '', 1, 190026, 'Aktif'),
(27, '', 2, 180001, 'Aktif'),
(28, '', 2, 180004, 'Aktif'),
(29, '', 2, 180005, 'Aktif'),
(30, '', 2, 180006, 'Aktif'),
(31, '', 2, 180007, 'Aktif'),
(32, '', 2, 180008, 'Aktif'),
(33, '', 2, 180009, 'Aktif'),
(34, '', 2, 180011, 'Aktif'),
(35, '', 2, 180012, 'Aktif'),
(36, '', 2, 180013, 'Aktif'),
(37, '', 2, 180014, 'Aktif'),
(38, '', 2, 180016, 'Aktif'),
(39, '', 2, 180017, 'Aktif'),
(40, '', 2, 180018, 'Aktif'),
(41, '', 2, 180019, 'Aktif'),
(42, '', 2, 180020, 'Aktif'),
(43, '', 2, 180021, 'Aktif'),
(44, '', 2, 180022, 'Aktif'),
(45, '', 2, 180023, 'Aktif'),
(46, '', 2, 180024, 'Aktif'),
(47, '', 2, 180025, 'Aktif'),
(48, '', 2, 180026, 'Aktif'),
(49, '', 2, 180027, 'Aktif'),
(50, '', 2, 180029, 'Aktif'),
(51, '', 2, 180030, 'Aktif'),
(52, '', 2, 180032, 'Aktif'),
(53, '', 3, 539, 'Aktif'),
(54, '', 3, 540, 'Aktif'),
(55, '', 3, 541, 'Aktif'),
(56, '', 3, 544, 'Aktif'),
(57, '', 3, 548, 'Aktif'),
(58, '', 3, 549, 'Aktif'),
(59, '', 3, 559, 'Aktif'),
(60, '', 3, 560, 'Aktif'),
(61, '', 3, 561, 'Aktif'),
(62, '', 3, 563, 'Aktif'),
(63, '', 3, 564, 'Aktif'),
(64, '', 3, 566, 'Aktif'),
(65, '', 3, 568, 'Aktif'),
(66, '', 3, 569, 'Aktif'),
(67, '', 3, 570, 'Aktif'),
(68, '', 3, 571, 'Aktif'),
(69, '', 3, 180035, 'Aktif'),
(70, '', 4, 537, 'Aktif'),
(71, '', 4, 538, 'Aktif'),
(72, '', 4, 545, 'Aktif'),
(73, '', 4, 550, 'Aktif'),
(74, '', 4, 551, 'Aktif'),
(75, '', 4, 552, 'Aktif'),
(76, '', 4, 553, 'Aktif'),
(77, '', 4, 554, 'Aktif'),
(78, '', 4, 556, 'Aktif'),
(79, '', 4, 557, 'Aktif'),
(80, '', 4, 558, 'Aktif'),
(81, '', 4, 573, 'Aktif'),
(82, '', 4, 180034, 'Aktif'),
(107, '', 5, 20190001, 'Aktif'),
(108, '', 5, 20190002, 'Aktif'),
(109, '', 5, 20190003, 'Aktif'),
(110, '', 5, 20190004, 'Aktif'),
(111, '', 5, 20190005, 'Aktif'),
(112, '', 5, 20190006, 'Aktif'),
(113, '', 5, 20190007, 'Aktif'),
(114, '', 5, 20190008, 'Aktif'),
(115, '', 5, 20190009, 'Aktif'),
(116, '', 5, 20190010, 'Aktif'),
(117, '', 5, 20190011, 'Aktif'),
(118, '', 5, 20190012, 'Aktif'),
(119, '', 5, 20190013, 'Aktif'),
(120, '', 5, 20190014, 'Aktif'),
(121, '', 7, 112, 'Aktif'),
(122, '', 7, 113, 'Aktif'),
(123, '', 7, 114, 'Aktif'),
(124, '', 7, 116, 'Aktif'),
(125, '', 7, 118, 'Aktif'),
(126, '', 7, 119, 'Aktif'),
(127, '', 7, 120, 'Aktif'),
(128, '', 7, 121, 'Aktif'),
(129, '', 7, 122, 'Aktif'),
(130, '', 7, 123, 'Aktif'),
(131, '', 7, 124, 'Aktif'),
(132, '', 7, 20180014, 'Aktif'),
(133, '', 6, 20180001, 'Aktif'),
(134, '', 6, 20180002, 'Aktif'),
(135, '', 6, 20180003, 'Aktif'),
(136, '', 6, 20180004, 'Aktif'),
(137, '', 6, 20180005, 'Aktif'),
(138, '', 6, 20180006, 'Aktif'),
(139, '', 6, 20180007, 'Aktif'),
(140, '', 6, 20180008, 'Aktif'),
(141, '', 6, 20180009, 'Aktif'),
(142, '', 6, 20180011, 'Aktif'),
(143, '', 6, 20180012, 'Aktif'),
(144, '', 6, 20180013, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tpt_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status` enum('Aktif','Mutasi','Alumni') NOT NULL DEFAULT 'Aktif',
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nisn`, `nama_siswa`, `jenis_kelamin`, `alamat`, `tpt_lahir`, `tgl_lahir`, `status`) VALUES
(112, 112, 'Ervin Avandy', 'L', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(113, 113, 'Fathollah', 'L', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(114, 114, 'Hikmatul Ulumiah', 'P', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(116, 116, 'Kurniawati', 'P', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(118, 118, 'Muhammad Zulfi Ramadani', 'L', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(119, 119, 'Ratih Nurul Imani', 'P', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(120, 120, 'Riski Harikus Pandi', 'L', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(121, 121, 'Saenullah Efendi', 'L', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(122, 122, 'Sinta Nuriah', 'P', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(123, 123, 'Siti Romlah', 'P', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(124, 124, 'Sri Wahyunita', 'P', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(537, 537, 'Akhmad Fakihul Islam', 'L', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(538, 538, 'Ali Usman', 'L', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(539, 539, 'Ariska Fitriyani', 'P', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(540, 540, 'Ayang Sagita', 'P', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(541, 541, 'Desi Permata Sari', 'P', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(544, 544, 'Elda Amalia', 'P', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(545, 545, 'Erik Sebastian', 'L', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(548, 548, 'Ira Sintiana', 'P', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(549, 549, 'Ira Susanti', 'P', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(550, 550, 'Kutsi Ega Firdaus', 'L', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(551, 551, 'Miftahur Rozikin', 'L', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(552, 552, 'Moch. Syahrul Asa Pratama', 'L', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(553, 553, 'Mohammad Ferdi Yansyah', 'L', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(554, 554, 'Mohammad Sugeng', 'L', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(556, 556, 'Muhammad Abdul Mukid', 'L', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(557, 557, 'Muhammad Fariqi', 'L', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(558, 558, 'Muhammad Wildan Ghafur', 'L', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(559, 559, 'Noor Aini', 'P', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(560, 560, 'Nor Afni Yugistin', 'P', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(561, 561, 'Nur Jamila', 'P', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(563, 563, 'Risatul Aini', 'P', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(564, 564, 'Riska Anggraini', 'P', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(566, 566, 'Siti Aisyah', 'P', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(568, 568, 'Siti Fatimah', 'P', 'Bataan', 'Bondowoso', '1999-02-15', 'Aktif'),
(569, 569, 'Siti Mutmainah', 'P', 'Bataan', 'Bondowoso', '1999-02-16', 'Aktif'),
(570, 570, 'Susi Kamilawati', 'P', 'Bataan', 'Bondowoso', '1999-02-17', 'Aktif'),
(571, 571, 'Syarifah Nur Hasanah', 'P', 'Bataan', 'Bondowoso', '1999-02-18', 'Aktif'),
(573, 573, 'Salehudin', 'L', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(180001, 180001, 'Afrizal', 'L', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(180004, 180004, 'Citra Dela Sauqiyah', 'P', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(180005, 180005, 'Dwi Alya Nur Alwiyah', 'P', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(180006, 180006, 'Dwi Pansyah', 'L', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(180007, 180007, 'Erki Perdana Putra', 'L', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(180008, 180008, 'Fendi Andika', 'L', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(180009, 180009, 'Ferdi', 'L', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(180011, 180011, 'Imelda ', 'P', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(180012, 180012, 'Irvan Afandi ', 'L', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(180013, 180013, 'Jeki Kurniawan', 'L', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(180014, 180014, 'Lexsa Fifiandara ', 'P', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(180016, 180016, 'Muhammad Sofan Abdillah', 'L', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(180017, 180017, 'Moch. Fachril Miftahus Surur', 'L', 'Bataan', 'Bondowoso', '1999-02-15', 'Aktif'),
(180018, 180018, 'Mocammad Havi Abdus Salam', 'L', 'Bataan', 'Bondowoso', '1999-02-16', 'Aktif'),
(180019, 180019, 'Muhammad Abi Pahlevi ', 'L', 'Bataan', 'Bondowoso', '1999-02-17', 'Aktif'),
(180020, 180020, 'Muhammad Ardi Sahal ', 'L', 'Bataan', 'Bondowoso', '1999-02-18', 'Aktif'),
(180021, 180021, 'Nadiyah Khoyyiroh ', 'P', 'Bataan', 'Bondowoso', '1999-02-19', 'Aktif'),
(180022, 180022, 'Nur Wahid Wahindra ', 'L', 'Bataan', 'Bondowoso', '1999-02-20', 'Aktif'),
(180023, 180023, 'Nuril ', 'L', 'Bataan', 'Bondowoso', '1999-02-21', 'Aktif'),
(180024, 180024, 'Nuriliah Hidayati', 'P', 'Bataan', 'Bondowoso', '1999-02-22', 'Aktif'),
(180025, 180025, 'Rendi ', 'L', 'Bataan', 'Bondowoso', '1999-02-23', 'Aktif'),
(180026, 180026, 'Rina ', 'P', 'Bataan', 'Bondowoso', '1999-02-24', 'Aktif'),
(180027, 180027, 'Rini ', 'P', 'Bataan', 'Bondowoso', '1999-02-25', 'Aktif'),
(180029, 180029, 'Aqidatur Rohmah', 'P', 'Bataan', 'Bondowoso', '1999-02-26', 'Aktif'),
(180030, 180030, 'Siti Nur Wasilah ', 'P', 'Bataan', 'Bondowoso', '1999-02-27', 'Aktif'),
(180032, 180032, 'Wahyu Hasanah ', 'P', 'Bataan', 'Bondowoso', '1999-02-28', 'Aktif'),
(180034, 180034, 'Sandy Pratama Putra', 'L', 'Bataan', 'Bondowoso', '1999-02-15', 'Aktif'),
(180035, 180035, 'Lia Puspita', 'P', 'Bataan', 'Bondowoso', '1999-02-19', 'Aktif'),
(190001, 190001, 'Anafisah Afrilia', 'P', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(190002, 190002, 'Anisa Nur Jannah', 'P', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(190003, 190003, 'Cicik Hidayati', 'P', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(190004, 190004, 'Citra F', 'P', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(190005, 190005, 'Dian Lutfiah', 'P', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(190006, 190006, 'Diaz Aziza Quri', 'L', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(190007, 190007, 'Fanny', 'P', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(190008, 190008, 'Farah Naila Rahmatika', 'P', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(190009, 190009, 'Firdatul Jannah', 'P', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(190010, 190010, 'Halizah Hoirun Nisa', 'P', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(190011, 190011, 'Isabella', 'P', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(190012, 190012, 'Milatus Soleha', 'P', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(190013, 190013, 'Moh. Abdul wafi', 'L', 'Bataan', 'Bondowoso', '1999-02-15', 'Aktif'),
(190014, 190014, 'Moh. Haris', 'L', 'Bataan', 'Bondowoso', '1999-02-16', 'Aktif'),
(190015, 190015, 'Moh. Iqbal', 'L', 'Bataan', 'Bondowoso', '1999-02-17', 'Aktif'),
(190016, 190016, 'Mohammad Babus Salam', 'L', 'Bataan', 'Bondowoso', '1999-02-18', 'Aktif'),
(190017, 190017, 'Mohammad Davi', 'L', 'Bataan', 'Bondowoso', '1999-02-19', 'Aktif'),
(190018, 190018, 'Mohammad Fikriyanto', 'L', 'Bataan', 'Bondowoso', '1999-02-20', 'Aktif'),
(190019, 190019, 'Muhammad Abdul Wafi', 'L', 'Bataan', 'Bondowoso', '1999-02-21', 'Aktif'),
(190020, 190020, 'Nabila Finka Jannati', 'P', 'Bataan', 'Bondowoso', '1999-02-22', 'Aktif'),
(190021, 190021, 'Octin Wardhiny', 'P', 'Bataan', 'Bondowoso', '1999-02-23', 'Aktif'),
(190022, 190022, 'Putra', 'L', 'Bataan', 'Bondowoso', '1999-02-24', 'Aktif'),
(190023, 190023, 'Siti Nurholizah', 'P', 'Bataan', 'Bondowoso', '1999-02-25', 'Aktif'),
(190024, 190024, 'Sitti Anisa', 'P', 'Bataan', 'Bondowoso', '1999-02-26', 'Aktif'),
(190025, 190025, 'Subaidah', 'P', 'Bataan', 'Bondowoso', '1999-02-27', 'Aktif'),
(190026, 190026, 'Zilviatun Nabila', 'P', 'Bataan', 'Bondowoso', '1999-02-28', 'Aktif'),
(20180001, 180001, 'Ahmad Baisori Mufid', 'L', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(20180002, 180002, 'Ahmad Faruk Suhendrik', 'L', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(20180003, 180003, 'Diyayama', 'P', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(20180004, 180004, 'Hairullah', 'L', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(20180005, 180005, 'Nur Fadila', 'P', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(20180006, 180006, 'Sefira', 'P', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(20180007, 180007, 'Shohiyatul Islamiyah', 'P', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(20180008, 180008, 'Siti Aisyah', 'P', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(20180009, 180009, 'Siti Umayyah Khorunniza', 'P', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(20180011, 180011, 'Sri Mustifatul Jannah', 'P', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(20180012, 180012, 'Tolariyanto', 'L', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(20180013, 180013, 'Ulfiyatun Hasanah', 'P', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(20180014, 180014, 'Siti Nurviana ', 'P', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(20190001, 190001, 'Abdul Hadi', 'L', 'Bataan', 'Bondowoso', '1998-05-15', 'Aktif'),
(20190002, 190002, 'Adellatul Mufidah', 'P', 'Bataan', 'Bondowoso', '1999-02-04', 'Aktif'),
(20190003, 190003, 'Ahmad Sofyan Al Arif', 'L', 'Bataan', 'Bondowoso', '1999-02-05', 'Aktif'),
(20190004, 190004, 'Dea Tirta Pratiwi', 'P', 'Bataan', 'Bondowoso', '1999-02-06', 'Aktif'),
(20190005, 190005, 'Dwi Lisnawati', 'P', 'Bataan', 'Bondowoso', '1999-02-07', 'Aktif'),
(20190006, 190006, 'Hairul Umam', 'L', 'Bataan', 'Bondowoso', '1999-02-08', 'Aktif'),
(20190007, 190007, 'Lailatul Ma`rifatuddunya', 'P', 'Bataan', 'Bondowoso', '1999-02-09', 'Aktif'),
(20190008, 190008, 'Lidiya Kristina', 'P', 'Bataan', 'Bondowoso', '1999-02-10', 'Aktif'),
(20190009, 190009, 'Muhammad Angga F', 'L', 'Bataan', 'Bondowoso', '1999-02-11', 'Aktif'),
(20190010, 190010, 'Nurlailia', 'P', 'Bataan', 'Bondowoso', '1999-02-12', 'Aktif'),
(20190011, 190011, 'Riski Hoiriah', 'P', 'Bataan', 'Bondowoso', '1999-02-13', 'Aktif'),
(20190012, 190012, 'Usmul Fausi', 'L', 'Bataan', 'Bondowoso', '1999-02-14', 'Aktif'),
(20190013, 190013, 'Winda Al Aluf', 'P', 'Bataan', 'Bondowoso', '1999-02-15', 'Aktif'),
(20190014, 190014, 'Wulan Nur Holisa', 'P', 'Bataan', 'Bondowoso', '1999-02-16', 'Aktif');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
