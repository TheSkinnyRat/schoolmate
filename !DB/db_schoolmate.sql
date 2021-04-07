-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 04:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schoolmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'UTYEYlY/AD1UOA==');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `judul_post` varchar(50) NOT NULL,
  `isi_post` text NOT NULL,
  `tgl_post` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `id_pengajar`, `judul_post`, `isi_post`, `tgl_post`) VALUES
(7, 13, 'hai', 'ini testing', '03-12-2018'),
(8, 8, 'hai', 'ini testing', '03-12-2018'),
(9, 8, 'komentar woe', 'koment koment', '05-12-2018'),
(10, 19, 'MTK', 'MTK RPL 2', '2018-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nip`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_tlp`, `jenis_kelamin`) VALUES
(8, 0, 'AWAFclEnByY=', 'Purwa Sabrang Ramadhan', 'Tokyo', '2019-01-01', 'psr@email.com', '081234567890', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'XII-RPL 2 '),
(2, 'XII-RPL 1  ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kirim_tugas`
--

CREATE TABLE `tbl_kirim_tugas` (
  `id_kirim_tugas` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `direktori` varchar(100) NOT NULL,
  `waktu_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kirim_tugas`
--

INSERT INTO `tbl_kirim_tugas` (`id_kirim_tugas`, `id_tugas`, `id_siswa`, `nama_file`, `direktori`, `waktu_upload`) VALUES
(14, 26, 15, 'p_XII-RPL_1_10.docx', 'C:/xampp/htdocs/schoolmate/Tugas_Siswa/p_XII-RPL_1_10.docx', '2018-12-07'),
(15, 23, 15, 'p_XII-RPL_1_12.docx(telat mengumpulkan)', 'C:/xampp/htdocs/schoolmate/Tugas_Siswa/p_XII-RPL_1_12.docx', '2018-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_berita`, `id_tugas`, `id_video`, `id_guru`, `id_siswa`, `nama`, `isi_komentar`) VALUES
(12, 8, 0, 0, 2, 0, 'azra     ', 'KOMENT ANJING'),
(14, 8, 0, 0, 0, 16, 'qq ', 'aaqq'),
(18, 8, 0, 0, 0, 15, 'p', 'WOEYYYYYY'),
(21, 9, 0, 0, 0, 15, 'p', 'APAAN SIH INI !!!'),
(22, 0, 21, 0, 0, 15, 'p ', 'z'),
(23, 23, 0, 0, 0, 15, 'p', 'zz'),
(27, 0, 23, 0, 0, 15, 'p', 'BBB'),
(30, 0, 0, 1, 0, 15, 'p', 'AA'),
(32, 10, 0, 0, 0, 15, 'p', 'APA SI NI'),
(35, 10, 0, 0, 4, 0, 'z <i class=\'fa fa-check-circle\'></i>', 'GUA GURU DISINI'),
(38, 10, 0, 0, 8, 0, 'Purwa Sabrang Ramadhan <i class=\'fa fa-check-circle\'></i>', 'WOYY'),
(39, 0, 26, 0, 8, 0, 'Purwa Sabrang Ramadhan <i class=\'fa fa-check-circle\'></i>', 'GUA GURU'),
(40, 10, 0, 0, 8, 0, 'Purwa Sabrang Ramadhan <i class=\'fa fa-check-circle\'></i>', 'A'),
(43, 0, 0, 1, 8, 0, 'Purwa Sabrang Ramadhan <i class=\'fa fa-check-circle\'></i>', 'GUA GURU!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia '),
(3, 'Bahasa inggris'),
(5, 'Bahasa jepang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajar`
--

CREATE TABLE `tbl_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajar`
--

INSERT INTO `tbl_pengajar` (`id_pengajar`, `nip`, `id_mapel`, `id_kelas`) VALUES
(8, 12345, 3, 2),
(13, 12345, 1, 1),
(16, 0, 1, 1),
(17, 0, 2, 1),
(18, 0, 3, 2),
(19, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posting_admin`
--

CREATE TABLE `tbl_posting_admin` (
  `id_posting` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `judul_post` varchar(50) NOT NULL,
  `isi_post` text NOT NULL,
  `direktori` varchar(100) NOT NULL,
  `tgl_post` varchar(20) NOT NULL,
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posting_admin`
--

INSERT INTO `tbl_posting_admin` (`id_posting`, `id`, `judul_post`, `isi_post`, `direktori`, `tgl_post`, `status`) VALUES
(1, 1, 'hai ', 'ini testing', '', '03-12-2018', '2'),
(2, 1, 'hai', 'contoh_tugas.docx', 'C:/xampp/htdocs/schoolmate/admin_post/contoh_tugas.docx', '06-12-2018', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `no_tlp`, `jenis_kelamin`, `id_kelas`) VALUES
(15, 0, 'UCVWPQVyBiVSMQ==', 'Siswa', 'Jakarta', '2018-12-06', 'p@p', '0893', 'P', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_posting`
--

CREATE TABLE `tbl_status_posting` (
  `status` int(11) NOT NULL,
  `target` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status_posting`
--

INSERT INTO `tbl_status_posting` (`status`, `target`) VALUES
(1, 'murid'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_tugas`
--

CREATE TABLE `tbl_status_tugas` (
  `status` int(11) NOT NULL,
  `isi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status_tugas`
--

INSERT INTO `tbl_status_tugas` (`status`, `isi`) VALUES
(1, 'Tidak boleh telat mengumpulkan'),
(2, 'Boleh telat mengumpulkan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tugas`
--

CREATE TABLE `tbl_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `judul_tugas` varchar(100) NOT NULL,
  `isi_tugas` text NOT NULL,
  `direktori` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `status` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tugas`
--

INSERT INTO `tbl_tugas` (`id_tugas`, `id_pengajar`, `judul_tugas`, `isi_tugas`, `direktori`, `waktu_mulai`, `waktu_selesai`, `status`) VALUES
(21, 8, 'TUGAS 2 B ING                                           ', 'cerita_sejarah.docx', 'C:/xampp/htdocs/schoolmate/file/cerita_sejarah.docx', '2018-12-02 00:00:00', '2018-12-03 00:00:00', '1'),
(22, 13, 'TUGAS 2 B ING ', 'cerita_sejarah.docx', 'C:/xampp/htdocs/schoolmate/Tugas/cerita_sejarah.docx', '2018-12-05 22:00:00', '2018-12-06 22:00:00', '1'),
(23, 8, 'TUGAS 2 B ING                                                   ', 'cerita_sejarah1.docx', 'C:/xampp/htdocs/schoolmate/Tugas/cerita_sejarah1.docx', '2018-12-06 14:33:00', '2018-12-06 14:35:00', '2'),
(26, 19, 'MTK', 'Cover_-_Purwa_Sabrang_Ramadhan3.docx', 'C:/xampp/htdocs/schoolmate/Tugas/Cover_-_Purwa_Sabrang_Ramadhan3.docx', '2018-12-07 00:00:00', '2017-12-15 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id_video` int(11) NOT NULL,
  `id_pengajar` int(11) NOT NULL,
  `judul_video` varchar(50) NOT NULL,
  `isi_video` text NOT NULL,
  `direktori` text NOT NULL,
  `tgl_video` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id_video`, `id_pengajar`, `judul_video`, `isi_video`, `direktori`, `tgl_video`) VALUES
(1, 8, 'B ING 1', '2.mp4', 'C:/xampp/htdocs/schoolmate/Video/AniBatch_in_Eyeshield_21_-_01.mp4', '2018-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votting`
--

CREATE TABLE `tbl_votting` (
  `id_votting` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `judul_votting` varchar(100) NOT NULL,
  `isi_votting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votting_kandidat`
--

CREATE TABLE `tbl_votting_kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `id_votting` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_kirim_tugas`
--
ALTER TABLE `tbl_kirim_tugas`
  ADD PRIMARY KEY (`id_kirim_tugas`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_mapel_2` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_posting_admin`
--
ALTER TABLE `tbl_posting_admin`
  ADD PRIMARY KEY (`id_posting`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_status_posting`
--
ALTER TABLE `tbl_status_posting`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `tbl_status_tugas`
--
ALTER TABLE `tbl_status_tugas`
  ADD PRIMARY KEY (`status`);

--
-- Indexes for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `tbl_votting`
--
ALTER TABLE `tbl_votting`
  ADD PRIMARY KEY (`id_votting`);

--
-- Indexes for table `tbl_votting_kandidat`
--
ALTER TABLE `tbl_votting_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kirim_tugas`
--
ALTER TABLE `tbl_kirim_tugas`
  MODIFY `id_kirim_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengajar`
--
ALTER TABLE `tbl_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_posting_admin`
--
ALTER TABLE `tbl_posting_admin`
  MODIFY `id_posting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_status_posting`
--
ALTER TABLE `tbl_status_posting`
  MODIFY `status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status_tugas`
--
ALTER TABLE `tbl_status_tugas`
  MODIFY `status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tugas`
--
ALTER TABLE `tbl_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_votting`
--
ALTER TABLE `tbl_votting`
  MODIFY `id_votting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_votting_kandidat`
--
ALTER TABLE `tbl_votting_kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
