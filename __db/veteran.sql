-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2022 at 03:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veteran`
--
CREATE DATABASE IF NOT EXISTS `veteran` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `veteran`;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(8, 67, 'burhan fs', 'pekalongan sds', '1212-12-12', '2', 'katolik', '12333', 'pekalongan', 'default-l.png', '2022-07-10 15:55:53', '2022-07-10 15:55:53'),
(9, 74, 'hartanto', 'pekalongan', '1212-12-12', '1', 'kristen', '343432423', 'adsdasdasdasd', 'default-l.png', '2022-07-16 08:44:24', '2022-07-16 08:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `guru-mapel`
--

CREATE TABLE `guru-mapel` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ikut_ulangan`
--

CREATE TABLE `ikut_ulangan` (
  `id_tes` int(11) NOT NULL,
  `id_ulangan` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `list_soal` longtext DEFAULT NULL,
  `list_jawaban` longtext DEFAULT NULL,
  `jml_benar` int(11) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `tgl_mulai` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ikut_ulangan`
--

INSERT INTO `ikut_ulangan` (`id_tes`, `id_ulangan`, `id_siswa`, `list_soal`, `list_jawaban`, `jml_benar`, `nilai`, `tgl_mulai`, `tgl_selesai`, `status`) VALUES
(16, 4, 14, NULL, 'kosong dulu', 2, 100, NULL, NULL, 'Y'),
(17, 1, 14, NULL, 'kosong dulu', 5, 83, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` int(10) NOT NULL,
  `nama_hari` varchar(6) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_akhir` time NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `kode_ruangan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `nama_hari`, `waktu_mulai`, `waktu_akhir`, `kode_kelas`, `kode_ruangan`) VALUES
(3, 'rabu', '06:30:00', '09:30:00', 'Prak-OOT-01', 'F304'),
(4, 'kamis', '08:30:00', '10:30:00', 'Fisika-05', 'F126'),
(5, 'jumat', '10:30:00', '12:30:00', 'Indo-01', 'A203'),
(6, 'senin', '12:30:00', '14:30:00', 'Kalkulus-01', 'A203'),
(7, 'selasa', '14:30:00', '16:30:00', 'Kalkulus-03', 'E301'),
(8, 'selasa', '10:30:00', '12:30:00', 'Fisika-05', 'F126'),
(12, 'senin', '08:30:00', '10:30:00', 'Indo-01', 'A203');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(30) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan`) VALUES
(8, 'AK', 'Akuntansi'),
(9, 'RPL', 'Rekayasa perangkat lunak'),
(14, 'TKJ', 'Teknik Komputer Dan Jaringan'),
(16, 'PM', 'Pemasaran'),
(17, 'MM', 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tingkatan` int(11) NOT NULL,
  `rombel` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `tingkatan`, `rombel`, `jurusan_id`) VALUES
(4, '12TKJ1', 12, 1, 14),
(6, '10TKJ2', 10, 2, 14),
(7, '11RPL1212', 11, 1212, 9),
(8, '12TKJ12', 12, 12, 14),
(10, '10AK2', 10, 2, 8),
(11, '12MM1', 12, 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Matematika'),
(3, 'Pemprograman Web'),
(4, 'Akuntansi'),
(5, 'Kimia'),
(8, 'bahasa inggris'),
(9, 'komputer dan jaringan dasar'),
(13, 'Prmprograman Web'),
(14, 'Penjas'),
(15, 'Olahraga'),
(16, 'Asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `nama_orangtua` varchar(256) NOT NULL,
  `pekerjaan_orangtua` varchar(256) NOT NULL,
  `foto` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_pembayaran` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `id_kelas`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `nama_orangtua`, `pekerjaan_orangtua`, `foto`, `created_at`, `updated_at`, `status_pembayaran`) VALUES
(9, 51, 4, 'andi kurniawan', 'brebes', '2004-02-01', '1', 'islam', '088232919767', 'jalan soekarno hatta  RT 04/04 desa wonokerto wetan,kec wonokerto kabupaten pekalongan', 'sumarno', 'tukang becak', 'default-l.png', '2022-07-09 12:09:31', '2022-07-09 12:09:31', '1'),
(13, 70, 4, 'sulis', 'pekalongan', '2002-12-12', '1', 'hindu', '231312', 'asdasdaad', 'asdasd', 'asdasd', 'default-l.png', '2022-07-11 06:50:40', '2022-07-16 08:24:24', '1'),
(14, 71, 4, 'kini', 'pekalongan', '2002-06-02', '2', 'islam', '088232919767', 'bebel', 'suriman', 'pedagang', 'default-l.png', '2022-07-15 21:53:45', '2022-07-16 08:24:50', '1'),
(16, 75, 4, 'linda maharani', 'pekalongan', '2004-03-23', '2', 'islam', '088231456', 'brebes', 'kaintan', 'pns', 'default-l.png', '2022-07-18 08:31:23', '2022-07-18 08:31:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `mapel` int(11) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `guru` int(11) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `media` varchar(50) DEFAULT NULL,
  `opsi_a` text DEFAULT NULL,
  `opsi_b` text DEFAULT NULL,
  `opsi_c` text DEFAULT NULL,
  `opsi_d` text DEFAULT NULL,
  `opsi_e` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `mapel`, `kelas`, `guru`, `soal`, `media`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `opsi_e`, `jawaban`) VALUES
(7, 1, 4, 8, '<p>soal1</p>', NULL, 'a', 'b', 'c', 'd', 'e', 'a'),
(8, 1, 4, 8, '<p>soal2</p>', NULL, 'q', 'w', 'e', 'r', 't', 'a'),
(9, 2, 4, 8, '<p>soal lain</p>', NULL, 'q', 'e', 'r', 't', 't', 'a'),
(10, 1, 4, 8, '<p>soal 3</p>', NULL, 'q', 'benar', 's', 'e', 'r', 'b'),
(11, 1, 4, 8, '<p>soal1</p>', NULL, 'a', 'b', 'c', 'd', 'e', 'a'),
(12, 2, 4, 8, '<p>soal lain</p>', NULL, 'q', 'e', 'r', 't', 't', 'a'),
(13, 1, 4, 8, '<p>soal 3</p>', NULL, 'q', 'benar', 's', 'e', 'r', 'b'),
(14, 1, 4, 8, '<p>soal1</p>', NULL, 'a', 'b', 'c', 'd', 'e', 'a'),
(15, 2, 4, 8, '<p>soal lain</p>', NULL, 'q', 'e', 'r', 't', 't', 'a'),
(16, 1, 4, 8, '<p>soal2</p>', NULL, 'q', 'w', 'e', 'r', 't', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'siswa'),
(3, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `ulangan`
--

CREATE TABLE `ulangan` (
  `id_ulangan` int(11) NOT NULL,
  `nama_ulangan` varchar(100) NOT NULL DEFAULT '0',
  `id_kelas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `waktu` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulangan`
--

INSERT INTO `ulangan` (`id_ulangan`, `nama_ulangan`, `id_kelas`, `id_mapel`, `id_guru`, `waktu`, `tanggal`) VALUES
(1, '0', 4, 1, 8, 12, '2022-07-11'),
(2, '0', 6, 1, 8, 12, '1222-02-12'),
(3, '0', 6, 1, 8, 123, '2002-12-12'),
(4, '0', 4, 2, 8, 12, '0012-12-12');

--
-- Triggers `ulangan`
--
DELIMITER $$
CREATE TRIGGER `hapus_ujian` BEFORE DELETE ON `ulangan` FOR EACH ROW BEGIN
	DELETE FROM ikut_ujian WHERE ikut_ujian.id_ujian=OLD.id_ujian;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, '33261', '$2y$10$GL52ySBPnMcwaBvtNCZJS.Kz6YBMUDCW/iRK1FAsZVd5e7T.OmQ/G', '2022-07-01 13:47:48', '2022-07-16 02:05:10'),
(7, 1, 'hakim', '$2y$10$5B3PJPxw2GM9mxAXEYECeu98PjbzvIp/nAw8BC2QQwRU1Q3L.AEKG', '2022-07-05 01:56:01', '2022-07-16 02:05:10'),
(51, 2, '13940', '$2y$10$5B3PJPxw2GM9mxAXEYECeu98PjbzvIp/nAw8BC2QQwRU1Q3L.AEKG', '2022-07-09 12:09:31', '2022-07-16 02:05:10'),
(67, 3, '3369454', '$2y$10$5B3PJPxw2GM9mxAXEYECeu98PjbzvIp/nAw8BC2QQwRU1Q3L.AEKG', '2022-07-10 15:55:53', '2022-07-16 02:05:10'),
(69, 2, '13962', '$2y$10$5B3PJPxw2GM9mxAXEYECeu98PjbzvIp/nAw8BC2QQwRU1Q3L.AEKG', '2022-07-11 02:21:15', '2022-07-16 02:05:10'),
(70, 2, '9999', '$2y$10$5B3PJPxw2GM9mxAXEYECeu98PjbzvIp/nAw8BC2QQwRU1Q3L.AEKG', '2022-07-11 06:50:39', '2022-07-16 02:05:10'),
(71, 2, '13965', '$2y$10$O/bi50.sg3b5Pj0FG67XveNSJ.Fo3PBS5iTaSuJpGObnoLxjDOCSq', '2022-07-15 21:53:45', '2022-07-16 05:01:54'),
(72, 3, '12312312312', '$2y$10$gaPJSXBbQ9zEfnQjW8tju.eObRbjjBjaAaLwIBf6JpEBrgCfvYnNu', '2022-07-16 07:55:10', '2022-07-16 07:55:10'),
(74, 3, '123456789', '$2y$10$GWpbHfhzrG8Z1yM4A63k2.x3QV0oPBHUj4E.SyPR4iEuuUiB2L2NC', '2022-07-16 08:44:24', '2022-07-16 08:44:24'),
(75, 2, '13966', '$2y$10$RZkRUZrzMHK54nMUrZcuPe1vc0JgLYy5F304JS64h3yeQgRxegege', '2022-07-18 08:31:22', '2022-07-18 08:31:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `guru-mapel`
--
ALTER TABLE `guru-mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `ikut_ulangan`
--
ALTER TABLE `ikut_ulangan`
  ADD PRIMARY KEY (`id_tes`),
  ADD KEY `id_ujian` (`id_ulangan`),
  ADD KEY `siswa` (`id_siswa`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`),
  ADD KEY `kode_kelas` (`kode_kelas`,`kode_ruangan`),
  ADD KEY `kode_ruangan` (`kode_ruangan`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `mapel` (`mapel`),
  ADD KEY `kelas` (`kelas`),
  ADD KEY `guru` (`guru`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulangan`
--
ALTER TABLE `ulangan`
  ADD PRIMARY KEY (`id_ulangan`),
  ADD KEY `nama_ujian` (`nama_ulangan`),
  ADD KEY `FK1_kelas` (`id_kelas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `guru-mapel`
--
ALTER TABLE `guru-mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ikut_ulangan`
--
ALTER TABLE `ikut_ulangan`
  MODIFY `id_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `kode_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulangan`
--
ALTER TABLE `ulangan`
  MODIFY `id_ulangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru-mapel`
--
ALTER TABLE `guru-mapel`
  ADD CONSTRAINT `guru-mapel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `guru-mapel_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `ikut_ulangan`
--
ALTER TABLE `ikut_ulangan`
  ADD CONSTRAINT `ikut_ulangan_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`),
  ADD CONSTRAINT `ikut_ulangan_ibfk_2` FOREIGN KEY (`id_ulangan`) REFERENCES `ulangan` (`id_ulangan`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `soal_ibfk_3` FOREIGN KEY (`mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `ulangan`
--
ALTER TABLE `ulangan`
  ADD CONSTRAINT `ulangan_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `ulangan_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `ulangan_ibfk_3` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
