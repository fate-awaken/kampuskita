-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2022 pada 06.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role_id`, `date_created`) VALUES
(11, 'admin', 'jamur@gmail.com', '$2y$10$ersfhsO2dmMa5f7Z80QohuqSYzWaGlyRyUQjJD9oCwhYiPp36raji', 1, 1671031701),
(12, 'admin2', 'kedua@gmail.com', '$2y$10$dyr.P.565W8YDMnx7nwrdOL.R14AEk1Iu279i7BNZCJw6a2MyI43a', 1, 1671441386);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(8) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
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
(15, 'Fikri', 10000002, 'protegas@gmail.com'),
(16, 'asd', 10000003, 'hana@gmail.com'),
(17, 'asd', 10000003, 'hana@gmail.com'),
(18, 'Raihana', 10000003, 'jamur@gmail.com'),
(19, 'Raihana', 10000003, 'diasspratamaa24edu@gmail.com'),
(20, 'asd', 10000003, 'asd@gmail.com'),
(21, 'Raihana', 10000003, 'asd@gmail.com'),
(22, 'Raihana', 10000003, 'jamur@gmail.com'),
(23, 'Jamuruu', 10000003, 'dias@gmail.com'),
(24, 'Dias Pratama Yasir', 10000003, 'jamur@gmail.com'),
(25, 'Raihana', 10000003, 'jamur@gmail.com'),
(26, 'asd', 10000003, 'jamur@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `password`, `role_id`, `is_active`) VALUES
(37, 'Dias', '00000002', 'hana@gmail.com', 'Teknik Gorong Gorong', '', 0, 0),
(40, 'Budi Setiawan', '00000006', 'budi@gmail.com', 'Rekayasa Perangkat Lunak', '', 0, 0),
(41, 'Amir', '00000003', 'amir@gmail.com', 'Management', '', 0, 0),
(42, 'admin', '00000012', 'amir@gmail.com', 'Management', '', 0, 0),
(43, 'admin', '00000002', 'jamur@gmail.com', 'Graphic Engineering', '', 0, 0),
(44, 'Amir', '00000002', 'jamur@gmail', 'Management', '', 0, 0),
(50, 'asd', '00000002', 'jamur@gmail.com', 'Graphic Engineering', '', 0, 0),
(51, 'Amir', '00000002', 'diasspratamaa24@gmail.com', 'Management', '', 0, 0),
(54, 'Amir', '00000002', 'diasspratamaa24@gmail.com', 'Graphic Engineering', '', 0, 0),
(55, 'Aditya Ramadhan', '00000002', 'adit@gmail.com', 'Rekayasa Perangkat Lunak', '', 0, 0),
(56, 'Fiqri Maulana Syach', '00000122', 'protegas@gmail.com', 'Graphic Engineering', '', 0, 0),
(57, 'Amir', '00000002', 'amir@gmail.com', 'Management', '', 0, 0),
(58, 'Bintang', '00000124', 'bintang@gmail.com', 'Rekayasa Perangkat Lunak', '', 0, 0),
(59, 'asd', '00000012', 'hana@gmail.com', 'Sastra Gorong Gorong', '', 0, 0),
(60, 'Dias Pratama Yasir', '10210069', 'jamur@gmail.com', 'Sastra Gorong Gorong', '', 0, 0),
(61, 'asd', '00000002', 'jamur@gmail.com', 'Sastra Gorong Gorong', '', 0, 0),
(62, 'Dias Pratama Yasir', '00000012', 'hana@gmail.com', 'Teknik Gorong Gorong', '', 0, 0),
(63, 'asd', '00000002', 'hana@gmail.com', 'asd', '', 0, 0),
(64, 'Dias Pratama Yasir', '00000001', 'hana@gmail.com', 'asd', '', 0, 0),
(65, 'asd', '00000013', 'asd@gmail.com', 'Rekayasa Perangkat Lunak', '', 0, 0),
(66, 'Raihana', '00000012', 'jamur@gmail.com', 'Teknik Gorong Gorong', '', 0, 0),
(67, 'asd', '00000012', 'hana@gmail.com', 'asd', '', 0, 0),
(68, 'asd', '00000012', 'jamur@gmail.com', 'Sastra Gorong Gorong', '', 0, 0),
(69, 'yaran', '10210001', 'yaran@gmail.com', 'sipil', '', 0, 0),
(79, 'Amir', '10210061', 'adityaramadhan399@yahoo.com', 'olahraga', 'asd', 2, 1),
(80, 'Amira', '10210062', 'adityaramadhan43.ar@gmail.com', 'pengangguran elite', '$2y$10$wHmufnLcGyBDL3YPrueQaOdZqsBqsRpGzdHljxSnhEFQG9JZbV73W', 2, 1),
(81, 'lingard', '10210066', 'lingard@gmail.com', 'seni bola', '$2y$10$Qm1rlTNaGsFTLks9WnEVMuD0ulwp7xpgIhK4pqYeBP/KKRf3tPKnm', 2, 1),
(82, 'rian', '1212', 'rian@gmail.com', 'seni musik', '$2y$10$Qsg42IqZfAka7PEt7OvbIuaf7nSbEbi7v0q9.2KtkriyyOrU/cZBC', 2, 1),
(84, 'narto', '10210009', 'narto@gmail.com', 'kpopers', '$2y$10$ugSLmV/wLouJjOvbij2goeUFV9nWymXW9x/pkl5.yjGa3cinbQcuS', 2, 1),
(85, 'Amir', '10210061', 'alejandro@gmail.com', 'olahraga', '$2y$10$foD5Wc9fzOsniJ2CsHBwbezoWNLgGyOPnIj5UY.ok1TnvcJ2qrdpa', 2, 1),
(87, 'bagas', '10210063', 'bagas@gmail.com', 'ritel', '$2y$10$xBkXO3p7f0HIgqcUBnnC0.mBRiVMF.WaJn6O6KSCF.BKesRX3c3u2', 2, 1),
(88, 'Fiqri', '10210067', 'fiqriii@gmail.com', 'peternakan', '$2y$10$HsRFB.NWloOGnlwh1G16E.9oXOPikKAThw3RS8Bhrw0J7V2DYCwKa', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `role_id`, `date_created`) VALUES
(1, 'Dias', '$2y$10$o42tK5zmMAU8OnAX/zmyaectXAsaM413fwnU5i3EeN4SDdVvvbcku', 'dias@gmail.com', 2, '0000-00-00'),
(2, 'Luthfi', '$2y$10$ODB52qo5GbbKzTHR4lTTyuR8cRiCKKNlsZvQqAw2neEcmXEnAz6Ki', 'upi@gmail.com', 3, '0000-00-00'),
(3, 'protegas', '$2y$10$vIsw9pcQQJlc4htJQgFSF.GhTXdapAbUQ8Y5U6yrUg2wxKzEKgXlC', 'fiqri@gmail.com', 3, '0000-00-00'),
(4, 'budi setiawan', '$2y$10$1IOhUUz37DIXQdjrZMpCTePU7IhfID3BffKPqTqF0OSreLZCcva62', 'budi@gmail.com', 2, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
