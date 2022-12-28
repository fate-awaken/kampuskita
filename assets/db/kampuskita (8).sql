-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 04:01 PM
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
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nip`, `email`, `password`, `role_id`, `is_active`) VALUES
(30, 'Budi', 10001435, 'budiaja@gmail.com', '$2y$10$Ltt7NsikgGQwZPQKFxwMRuad57jq4CyTMR8/XCLvzJtZVIezNAfq6', 3, 1),
(31, 'Aditya', 10003425, 'aditya@gmail.com', '$2y$10$HWA4qMsc3Zx1PacyjduKrenqGpJZE7MQbMUm0PD95K8w.2s94CJOO', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `password`, `role_id`, `is_active`) VALUES
(91, 'Dias', '10003245', 'diasaja@gmail.com', 'Rekayasa Perangkat Lunak', '$2y$10$NWxW9K5GmrRzO/UHxkNGgek2Xagjmh80.vOw7y3fiFZ6AV.ZmzI8G', 2, 1),
(92, 'Fiqri Maulana', '00003214', 'fiqriii@gmail.com', 'Sistem Informasi', '$2y$10$3YxlvuNrDD7iY5Jp6WhtIen/IWl/uS4GWWlWM/39ArqNdPcIG5ia2', 2, 1),
(93, 'Solah', '00005542', 'solah@gmail.com', 'Rekayasa Perangkat Lunak', '$2y$10$Qi6sbnE5Rj.JV8hXmGXQYOrEq6YxAqyaBXHqd0uh0wVh.alZAmt7i', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `role_id`, `is_active`) VALUES
(6, '$2y$10$Ltt7NsikgGQwZPQKFxwMRuad57jq4CyTMR8/XCLvzJtZVIezNAfq6', 'budiaja@gmail.com', 3, 1),
(7, '$2y$10$HQksZTdF.0PBqiy1Zr5PcOrCKmw6VU28tH69TIzwcnQfJTd4PvD7y', 'diasaja@gmail.com', 2, 1),
(8, '$2y$10$3YxlvuNrDD7iY5Jp6WhtIen/IWl/uS4GWWlWM/39ArqNdPcIG5ia2', 'fiqriii@gmail.com', 2, 1),
(9, '$2y$10$LqIN2O1DZcS23KVEwOQaBeDQrfJPJ14N9FYMlNjBE00VetVUnLQxC', 'solah@gmail.com', 2, 1),
(10, '$2y$10$HWA4qMsc3Zx1PacyjduKrenqGpJZE7MQbMUm0PD95K8w.2s94CJOO', 'aditya@gmail.com', 3, 1);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
