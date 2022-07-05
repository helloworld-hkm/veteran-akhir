-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2022 at 08:52 AM
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
  `nama_kelas` varchar(30) NOT NULL,
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
(9, '12ASP1212', 12, 1212, 8);

-- --------------------------------------------------------

--
-- Table structure for table `kelassmk`
--

CREATE TABLE `kelassmk` (
  `id` int(11) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelassmk`
--

INSERT INTO `kelassmk` (`id`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'sepuluh', '2022-06-23 07:13:26', 2022),
(2, 'sebelas', '2022-06-23 07:18:14', 2022);

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
  `nama` varchar(256) NOT NULL,
  `tempat_lahir` varchar(256) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `agama` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `nama_orangtua` varchar(256) NOT NULL,
  `pekerjaan_orangtua` varchar(256) NOT NULL,
  `no_hp_orangtua` varchar(128) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `foto` text NOT NULL,
  `status_pendaftaran` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_hp`, `alamat`, `nama_orangtua`, `pekerjaan_orangtua`, `no_hp_orangtua`, `angkatan`, `foto`, `status_pendaftaran`, `created_at`, `updated_at`) VALUES
(2, 13, 'percobaan2', '', '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 15, 'percobaan3', '', '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 16, 'percobaan4', '', '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 17, 'hakim firman', '', '0000-00-00', '', '', '', '', '', '', '', 0, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswasmk`
--

CREATE TABLE `siswasmk` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kd_kelas` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(5) NOT NULL,
  `id_ulangan` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `knc_jawaban` varchar(30) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `id_ulangan`, `soal`, `a`, `b`, `c`, `d`, `knc_jawaban`, `gambar`, `tanggal`, `aktif`) VALUES
(9, 0, 'User atau Operator Komputer dalam Istilah Komputer disebut dengan..?', 'Brainware', 'Fireware', 'Software', 'Hardware', 'a', '', '0000-00-00', 'Y'),
(10, 0, 'CPU Merupakan Singkatan dari', 'Central Progamming Unit', 'Central Promoting Unit', 'Central Processing Unit', 'Central Producing Unit', 'c', '', '0000-00-00', 'Y'),
(11, 0, 'Jaringan dari elemen-elemen yang saling berhubungan adalah ?', 'pentium ', 'instal', 'system', 'data', 'c', '', '0000-00-00', 'Y'),
(12, 0, 'Berikut merupakan elemen-elemen sistem komputer kecuali...?', 'Fireware', 'Brainware', 'Software', 'Hadware', 'a', '', '0000-00-00', 'Y'),
(13, 0, 'Program yang berisi perinta-perintah / perangkat lunak disebut...?', 'Pentium', 'Brainware', 'Hardware', 'software', 'd', '', '0000-00-00', 'Y'),
(14, 0, 'Proses memasukkan dan memasang software ke dalam komputer disebut...?', 'data', 'instal', 'loading', 'online', 'b', '', '0000-00-00', 'Y'),
(15, 0, 'Berikut yang bukan termasuk alat output adalah...?', 'keyboard', 'speaker', 'monitor', 'printer', 'a', '', '0000-00-00', 'Y'),
(16, 0, 'Tanda panah (tanda lain) yang mewakili posisi gerakan mouse disebut dengan...?', 'kursor', 'mouse', 'pointer', 'printer', 'c', '', '0000-00-00', 'Y'),
(17, 0, 'Fungsi printer adalah untuk....?', 'mengeluarkan suara', 'mencetak dokumen', 'menyimpan dokumen', 'salah semua', 'b', '86image003.jpg', '0000-00-00', 'Y'),
(18, 0, 'USB merupakan singkatan dari', 'universal serial buss', 'unit serial bus', 'Universal Serial Bus', 'Unit serial booster', 'c', '', '0000-00-00', 'Y'),
(19, 0, 'Salah satu perangkat Lunak pengolah kata adalah', 'Ms.Word', 'Winamp', 'CC cleaner', 'Jet audio', 'a', '', '0000-00-00', 'Y'),
(20, 0, 'Program yang digunakan untuk disain gambar adalah..?', 'Ms.Exel', 'Media Player', 'Power Point', 'Photoshop', 'd', '', '0000-00-00', 'N'),
(21, 0, 'Yang bukan termasuk Hadware / Perangkat Keras adalah..', 'CPU', 'Keyboard', 'Ms.Office', 'Printer', 'c', '', '0000-00-00', 'N');

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
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ulangan`
--

INSERT INTO `ulangan` (`id_ulangan`, `id_kelas`, `id_mapel`) VALUES
(5, 4, 9);

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
(1, 1, '202300063', '$2y$10$J4QATgEgOmG1XitYX9.H1uHaMuUWgkWhUxzQEbFbcm0ojwqeHT0M6', '2022-07-01 13:47:48', '2022-07-01 13:47:48'),
(4, 3, 'hakim', 'firmanfebrian', '2022-07-01 14:01:06', '2022-07-01 14:01:06'),
(6, 1, 'admin', '$2y$10$S6lj64xdDT.ysyNwTh00eugEvFyRNP1JyBC0KPkwuWtj9vQaLtC9.', '2022-07-05 01:50:25', '2022-07-05 01:50:25'),
(7, 1, 'hakim', '$2y$10$T7FB6Uucarp9FjXPZq/hfOBAs1ogY83wMvrnixwaiyVOeP.AwZzWO', '2022-07-05 01:56:01', '2022-07-05 01:56:01'),
(8, 2, 'user1', '$2y$10$Qss9xt3xDWqaEqJdIsZ/uuSgSbxcH7AR/GV/94jNAyz0gueF/yWTy', '2022-07-05 03:10:22', '2022-07-05 03:10:22'),
(9, 2, 'hakimff', '$2y$10$1hkSFHCL2WfwpR/0P3hyQOMSqnjDir1KveKviCJtdbTzBh/p5n2Me', '2022-07-05 03:13:21', '2022-07-05 03:13:21'),
(10, 3, 'guru', '$2y$10$wzAvlWVODnimEh8GbzDUW.nAH7v06UTiotjGnVa2Rp4GSXZtLRltS', '2022-07-05 03:30:51', '2022-07-05 03:30:51'),
(11, 1, 'hakim', '$2y$10$tigytSyiwlt3Fa5AI7.pQeZtvkYz89B/s05W7Ca8vd/v9PYiXzUzy', '2022-07-05 05:18:48', '2022-07-05 05:18:48'),
(12, 1, 'percobaan1', '$2y$10$9oLTHcZAJJunlvdg6wQOKu.YxR7DKL29VFpLiJQgPYOB5Koj.WPCq', '2022-07-05 05:19:15', '2022-07-05 05:19:15'),
(13, 1, 'percobaan2', '$2y$10$wTScyjEJPYIuolN4HzbWm.8Q2jVhb0H2FUs6CbR.YlUxQczJ5jgwy', '2022-07-05 05:20:27', '2022-07-05 05:20:27'),
(14, 1, 'percobaan2', '$2y$10$ficU8Eh3VqlnZUSxjCYDZuBPln.JXsBR9Clri9SOzrAvVp3qy/zVS', '2022-07-05 05:22:46', '2022-07-05 05:22:46'),
(15, 1, 'percobaan3', '$2y$10$jqMSpBzF.x02PpsELymfauHyQetK7kj0CUb2LcUgWyMKlNioQvyuy', '2022-07-05 05:23:00', '2022-07-05 05:23:00'),
(16, 2, 'percobaan4', '$2y$10$VTO2y.V/pcUMuxKVJPjy6eCVCST3vPgEY.rSewFKWTPQDoBvKGjCS', '2022-07-05 05:30:16', '2022-07-05 05:30:16'),
(17, 2, '13940', '$2y$10$VRhskuelIKSSIGoAZborUOu/aOYdq2ClGz3MrVb1Olk7QsWvuXmQ2', '2022-07-05 12:19:18', '2022-07-05 12:19:18');

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
-- Indexes for table `kelassmk`
--
ALTER TABLE `kelassmk`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `siswasmk`
--
ALTER TABLE `siswasmk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_kelas` (`kd_kelas`),
  ADD KEY `id_kelas` (`kd_kelas`),
  ADD KEY `kd_kelas_2` (`kd_kelas`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_kelas` (`id_ulangan`);

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
  ADD KEY `matkul_id` (`id_mapel`),
  ADD KEY `dosen_id` (`id_kelas`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelassmk`
--
ALTER TABLE `kelassmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswasmk`
--
ALTER TABLE `siswasmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulangan`
--
ALTER TABLE `ulangan`
  MODIFY `id_ulangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswasmk`
--
ALTER TABLE `siswasmk`
  ADD CONSTRAINT `siswasmk_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulangan`
--
ALTER TABLE `ulangan`
  ADD CONSTRAINT `ulangan_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulangan_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_user_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
