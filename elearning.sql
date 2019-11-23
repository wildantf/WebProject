-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2019 pada 20.06
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id`, `course_name`, `user_id`, `description`, `date_created`) VALUES
(1, 'Menjahit', 16, 'Kursus Menjahit, bordir, sulam, payes, smok, dll.', '2019-11-05'),
(15, 'Berenang', 1, 'berenang ketepian', '2019-11-21'),
(16, 'Memasak', 1, 'Belajar Memasak masakan western', '2019-11-23'),
(17, 'Seni Rupa', 5, 'Belajar Melukis, Membuart patung, dan Mengukir', '2019-07-16'),
(18, 'Mengemudi', 13, 'Kursu Mengendarai kendaraan roda empat termasuk truk tronton', '2019-11-19'),
(19, 'Bahasa Tubuh', 3, 'Belajar memahamami bahasa tubuh orang sekitar', '2019-11-19'),
(20, 'Vocal', 12, 'Kursus Bernyanyi menggunakan mulut', '2019-11-07'),
(21, 'Bahasa Betawi', 16, 'Kursus ini diajarkan cara membuat pantun ala ala orang betawi', '2019-11-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `course_participant`
--

CREATE TABLE `course_participant` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course_participant`
--

INSERT INTO `course_participant` (`course_id`, `user_id`) VALUES
(1, 1),
(1, 11),
(1, 16),
(15, 1),
(15, 2),
(15, 8),
(15, 14),
(16, 1),
(16, 5),
(17, 1),
(18, 3),
(18, 6),
(20, 13),
(21, 8),
(21, 9),
(21, 12),
(21, 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `file_material` varchar(50) DEFAULT NULL,
  `content` varchar(4000) DEFAULT NULL,
  `date_posted` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `material`
--

INSERT INTO `material` (`id`, `course_id`, `user_id`, `title`, `file_material`, `content`, `date_posted`) VALUES
(4, 1, 1, 'Belajar Menjahit Dress', 'tugas.pdf', 'Belajar menjahit bagi pemula dimulai dari ', '1574429336'),
(6, 17, 1, 'Pemotongan Kayu Utuh', NULL, 'Pemotongan kayu adalah hal yang paling awal untuk membuat pola ukiran. Memotong pada sebuah kayu datar untuk membuat pola ukiran sehingga tampak menjadi tiga dimensi. Proses pemotongan ini biasa dilakukan dengan sebuah gergaji manual atau mesin. Kemudian setelah sudah dapat ukuran yang kita perlukan, lalu memotong kayu secara tepat', '1574510120');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'Instruktur'),
(2, 'Asisten Instruktur'),
(3, 'Peserta Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(254) NOT NULL,
  `role_id` int(11) NOT NULL,
  `photo_profile` varchar(150) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `bio` varchar(240) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `role_id`, `photo_profile`, `date_of_birth`, `bio`) VALUES
(1, 'Wildan Tamma Faza Chair', 'wildantammafaza@gmail.com', 'f35aa573da6aa0397a37750ad53f381e9a1183e042bbec5f380b4c0ebea7a97d', 1, '1574532824_IMG_1670 (2).jpg', '1998-06-03', 'I Know beacuse i tried'),
(2, 'Najwa Shihab', 'najwashihab@gmail.com', '60aaa347916978c7b3a3c84b494cd83823e5f847f3b9787a3a7de1e7127822a9', 3, 'default.jpg', NULL, NULL),
(3, 'Ricardo Kaka', 'ricardokaka@gmail.com', '3a38f42cfb8f4ad7419c4c4a5bdbbf2f447ebf05d6dce5de5daa670469dc0e56', 1, 'default.jpg', NULL, NULL),
(4, 'Subhan Aja', 'subhandokma@gmail.com	', '5d99c97e6950a40ef3a0a36ee7164be6da4bc53d3b681460ff43120370122272', 3, 'default.jpg', NULL, NULL),
(5, 'Alif Rahman', 'alifgokil123@gmail.com', 'df2bd8c393f3b0835f1a38cc71b35f56b25925885aa24bd7eef3abb96fcfb98a', 3, 'default.jpg', NULL, NULL),
(6, 'Mahendra Gunawan', 'mahendragunawa@gmail.com', '4068a6fc1a91f82f818c3359ebfbd01e4e3cc7c21cb61a2e1098583f64f70c0f', 3, 'default.jpg', NULL, NULL),
(7, 'Septian Rizaldi', 'rizaldi123@gmail.com', 'ec79db0575ad620621ede0d3d36740c918731a5f0b4990d4961a9552f1cef6a4', 3, 'default.jpg', NULL, NULL),
(8, 'Ana Ma Ente', 'anamana@gmail.com', '83157143932dca897edcef2d695e505dcd458dff1826db6172d085e28ee5dbc8', 3, 'default.jpg', NULL, NULL),
(9, 'Udin Gambut', 'udingambut123@gmail.com', 'b1624a48de24aa81052d82df5d65ad7706561f24d7b015540d1c933c495c945d', 1, 'default.jpg', NULL, NULL),
(10, 'Sony Agustian', 'sonywakwaw@yahoo.com', '587d392b6c7680ec7656baf143511491e62c4ec6f459c21cce6953e6f1707bd7', 3, 'default.jpg', NULL, NULL),
(11, 'Iwan Setiawans', 'iwanjebret@gmail.coms', '571a360dde9b119ecb57c79b1cc42bff8ddf977fe308196b71085ea25de080d3', 2, 'default.jpgs', NULL, NULL),
(12, 'Hari Panca', 'haripancasila@gmail.com', '8671efbd3c240566656dd852770e61c75e60c48aa9b84bae332f8cbea15f2858', 3, 'default.jpg', NULL, NULL),
(13, 'Steven Gerrad', 'mbahdukun@gmail.com', 'c7c084318b6f1bece6f74ffce1ea53596070345272dee8040037497c7d4cbffe', 3, 'default.jpg', NULL, NULL),
(14, 'Raihan Hone', 'raihanimut@gmail.com', '9d3dd43da79985b968136dee69646e9c04746a91b6179671f3a86a63b3ddf2fd', 3, 'default.jpg', NULL, NULL),
(15, 'Moh. Ramadhani Firdaus', 'mrfirdaus@gmail.com	', '680d647e3bf88bc66877b2004247a63ea7338057aa735ddbdb9cf82b46ed0a09', 1, 'default.jpg', NULL, NULL),
(16, 'Alfin Niam', 'alfinniam@gmail.com', '6853ff3da32d49d0dd39aff61b0303147abb3321a66a8870e6787a102be73087', 1, 'default.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `course_participant`
--
ALTER TABLE `course_participant`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `course_participant`
--
ALTER TABLE `course_participant`
  ADD CONSTRAINT `course_participant_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `course_participant_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
