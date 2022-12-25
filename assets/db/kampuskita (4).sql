-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 06:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampuskita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role_id`, `date_created`) VALUES
(11, 'admin', 'jamur@gmail.com', '$2y$10$ersfhsO2dmMa5f7Z80QohuqSYzWaGlyRyUQjJD9oCwhYiPp36raji', 1, 1671031701),
(12, 'admin2', 'kedua@gmail.com', '$2y$10$dyr.P.565W8YDMnx7nwrdOL.R14AEk1Iu279i7BNZCJw6a2MyI43a', 1, 1671441386);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(8) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `email`) VALUES
(1, 'Muji Astuti', 10000001, 'muji@hotmail.com'),
(4, 'Cerberus Tor-tor', 10000012, 'cerberus@hotmail.com'),
(6, 'Watson', 10000012, 'watson@gmail.com'),
(8, 'Tuti ', 87462827, 'boti@gmail.com'),
(9, 'asd', 10000002, 'amir@gmail.com'),
(10, 'Amir', 10000003, 'jamur@gmail.com'),
(11, 'asd', 10000002, 'jamur@gmail.com'),
(14, 'Aditya Ramadhan', 10000321, 'diasspratamaa24@gmail.com'),
(15, 'Fikri', 10000002, 'protegas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`) VALUES
(37, 'Dias', '00000002', 'hana@gmail.com', 'Teknik Gorong Gorong'),
(40, 'Budi Setiawan', '00000006', 'budi@gmail.com', 'Rekayasa Perangkat Lunak'),
(41, 'Amir', '00000003', 'amir@gmail.com', 'Management'),
(42, 'admin', '00000012', 'amir@gmail.com', 'Management'),
(43, 'admin', '00000002', 'jamur@gmail.com', 'Graphic Engineering'),
(44, 'Amir', '00000002', 'jamur@gmail', 'Management'),
(50, 'asd', '00000002', 'jamur@gmail.com', 'Graphic Engineering'),
(51, 'Amir', '00000002', 'diasspratamaa24@gmail.com', 'Management'),
(54, 'Amir', '00000002', 'diasspratamaa24@gmail.com', 'Graphic Engineering'),
(55, 'Aditya Ramadhan', '00000002', 'adit@gmail.com', 'Rekayasa Perangkat Lunak'),
(56, 'Fiqri Maulana Syach', '00000122', 'protegas@gmail.com', 'Graphic Engineering'),
(57, 'Amir', '00000002', 'amir@gmail.com', 'Management'),
(58, 'Bintang', '00000124', 'bintang@gmail.com', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role_id`, `date_created`) VALUES
(1, 'Dias', '$2y$10$o42tK5zmMAU8OnAX/zmyaectXAsaM413fwnU5i3EeN4SDdVvvbcku', 'dias@gmail.com', 2, '0000-00-00'),
(2, 'Luthfi', '$2y$10$ODB52qo5GbbKzTHR4lTTyuR8cRiCKKNlsZvQqAw2neEcmXEnAz6Ki', 'upi@gmail.com', 3, '0000-00-00'),
(3, 'protegas', '$2y$10$vIsw9pcQQJlc4htJQgFSF.GhTXdapAbUQ8Y5U6yrUg2wxKzEKgXlC', 'fiqri@gmail.com', 3, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
