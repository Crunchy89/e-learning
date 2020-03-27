-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2020 at 12:17 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'RPL'),
(3, 'Perhotelan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `kelas`) VALUES
(1, 3, 'X Perhotelan'),
(2, 3, 'XI Perhotelan'),
(3, 1, 'X RPL'),
(4, 1, 'XI RPL'),
(5, 1, 'XII RPL');

-- --------------------------------------------------------

--
-- Table structure for table `medsos`
--

CREATE TABLE `medsos` (
  `id_medsos` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medsos`
--

INSERT INTO `medsos` (`id_medsos`, `icon`, `warna`, `link`) VALUES
(1, 'fa fa-fw fa-facebook', 'btn-primary', '#'),
(2, 'fa fa-fw fa-instagram', 'btn-warning', '#'),
(3, 'fa fa-fw fa-youtube-play', 'btn-danger', '#'),
(5, 'fa fa-fw fa-twitter', 'btn-info', '#');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama`, `nohp`, `alamat`, `logo`) VALUES
(1, 'SMK Al-Hasanain NU Beraim', '087849910278', 'Jln. Ahmad Yani no. 5 Beraim Praya Tengah', 'LOGO_STMIK_LOMBOK.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `id_role`, `is_active`) VALUES
(1, 'Admin', '$2y$10$qzUVAmoXQZcpo6iNjjaKdOWXIFZq7GI/8zoorTahkgaDFqzl5Z76C', 1, 1),
(3, 'operator', '$2y$10$F5pUHN2K2XNM5Ys351.c0.Te6TQFDEXzFL1ET/8g0Tcu3PIQflYQi', 6, 1),
(4, 'TU', '$2y$10$lJnNBtphBP8ZNqgd7AZVM..7bAoSklBJYpSmaW4jTP0v3QFrP6cK2', 5, 1),
(5, 'guru', '$2y$10$PV9PwxVePrhx.ZdowFRZQOG.vCXUVUC7VAMXT3o.J280XA6ik420K', 2, 1),
(6, 'siswa', '$2y$10$WxGq9hpPwRgMrfgwKAq9/.9FMvni6nPbC8E9V1mLR9xnW/bLl4ugS', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id_access` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id_access`, `id_menu`, `id_role`) VALUES
(1, 1, 1),
(19, 2, 2),
(40, 6, 1),
(43, 7, 1),
(44, 7, 4),
(50, 6, 2),
(51, 6, 4),
(53, 8, 1),
(54, 6, 5),
(55, 2, 5),
(56, 8, 5),
(59, 6, 6),
(61, 9, 6),
(62, 9, 1),
(64, 2, 6),
(65, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `no_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `title`, `icon`, `is_active`, `no_order`) VALUES
(1, 'Admin Menu', 'fa fa-laptop', 1, 2),
(2, 'Menu Guru', 'fa fa-fw fa-mortar-board', 1, 5),
(6, 'Dashboard', 'fa fa-home', 1, 1),
(7, 'Menu Siswa', 'fa fa-fw fa-users', 1, 6),
(8, 'Menu TU', 'fa fa-fw fa-cogs', 1, 4),
(9, 'Menu Operator', 'fa fa-fw  fa-folder-open', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(4, 'Siswa'),
(5, 'TU'),
(6, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_submenu`
--

INSERT INTO `user_submenu` (`id_submenu`, `id_menu`, `title`, `icon`, `url`, `is_active`, `no_urut`) VALUES
(1, 1, 'User Management', 'fa fa-fw fa-users', 'user', 1, 2),
(2, 1, 'Role management', 'fa fa-fw fa-cogs', 'role', 1, 1),
(3, 1, 'Menu Management', 'fa fa-fw fa-code', 'menu', 1, 3),
(6, 1, 'Access Management', 'fa fa-fw fa-lock', 'access', 1, 4),
(7, 2, 'Upload Materi', 'fa fa-fw fa-cloud-upload', 'uploadmateri', 1, 1),
(12, 6, 'Dashboard', 'fa fa-fw fa-tachometer', 'admin/dashboard', 1, 1),
(22, 2, 'Buat Tugas', 'fa fa-fw fa-clipboard', 'downloadtugas', 1, 2),
(23, 7, 'Download Materi', 'fa fa-fw fa-download', 'downloadmateri', 1, 1),
(24, 7, 'Upload Tugas', 'fa fa-fw fa-cloud-upload', 'uploadtugas', 1, 2),
(26, 8, 'Data Kelas', 'fa fa-fw fa-sitemap', 'kelas', 1, 2),
(27, 9, 'Daftar Jurusan', 'fa fa-fw fa-list', 'jurusan', 1, 2),
(36, 2, 'Buat Quiz', 'fa fa-fw fa-commenting', 'buatquiz', 1, 3),
(37, 7, 'Kerjakan Quiz', 'fa fa-fw fa-clipboard', 'kerjakanquiz', 1, 3),
(38, 9, 'Profil Sekolah', 'fa fa-fw fa-map', 'sekolah', 1, 1),
(39, 9, 'Data Guru', 'fa fa-fw fa-mortar-board', 'guru', 1, 3),
(40, 9, 'Data Siswa', 'fa fa-fw fa-users', 'siswa', 1, 4),
(41, 8, 'Mata Pelajaran', 'fa  fa-fw fa-book', 'pelajaran', 1, 1),
(42, 8, 'Abesnsi Guru', 'fa fa-fw fa-list', 'absensi', 1, 3),
(43, 8, 'Absensi Siswa', 'fa fa-fw fa-list', 'absensi/siswa', 1, 4),
(44, 2, 'Absen', 'fa fa-fw fa-list', 'absenguru', 1, 4),
(45, 7, 'Absen', 'fa fa-fw fa-list', 'absensiswa', 1, 4);

--
-- Indexes for dumped tables
--

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
  ADD KEY `fk_jurusan` (`id_jurusan`);

--
-- Indexes for table `medsos`
--
ALTER TABLE `medsos`
  ADD PRIMARY KEY (`id_medsos`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`),
  ADD KEY `fk_kelas` (`id_kelas`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_role` (`id_role`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `fk_a_role` (`id_role`),
  ADD KEY `fk_a_menu` (`id_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `fk_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `medsos`
--
ALTER TABLE `medsos`
  MODIFY `id_medsos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_access`
--
ALTER TABLE `user_access`
  ADD CONSTRAINT `fk_a_menu` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_a_role` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
