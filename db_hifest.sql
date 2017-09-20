-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Sep 2017 pada 09.21
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hifest`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_auth`
--

CREATE TABLE `admin_auth` (
  `pk_auth` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_auth`
--

INSERT INTO `admin_auth` (`pk_auth`, `username`, `password`, `status`) VALUES
(2, 'kelvin', '17c4520f6cfd1ab53d8745e84681eb49', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `participants`
--

CREATE TABLE `participants` (
  `pk_participant` int(10) NOT NULL,
  `participant_name` varchar(255) NOT NULL,
  `participant_email` varchar(255) NOT NULL,
  `participant_status` int(1) NOT NULL,
  `fk_team` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `participants`
--

INSERT INTO `participants` (`pk_participant`, `participant_name`, `participant_email`, `participant_status`, `fk_team`) VALUES
(40, 'Dahyun', 'dahyun@twice.com', 1, 6),
(41, 'Choi Tzuyu', 'tzuyu@twice.com', 0, 7),
(42, 'somi', 'somi@ioi.com', 0, 7),
(43, 'Chaeyoung', 'chaeyoung@twice.com', 0, 7),
(44, 'jieqiong', 'jieqiong@ioi.com', 0, 7),
(48, 'Jessica Jung', 'jessica@snsd.com', 0, 8),
(49, 'Taeyeon', 'taeyeon@gmail.com', 0, 8),
(50, 'Tiffany Hwang', 'tiffany@snsd.com', 0, 8),
(51, 'Kelvin', 'kelvindsmn@gmail.com', 0, 8),
(52, 'Roa Pristin', 'roa@kr.com', 0, 9),
(53, 'Song Jihyo', 'jihyo@runningman.com', 0, 9),
(54, 'Bona WJSN', 'bona@wjsn.com', 0, 0),
(55, 'Yuri Kwon', 'yuri@snsd.com', 0, 8),
(56, 'Sunny', 'sunny@snsd.com', 0, 10),
(57, 'Mina', 'mina@twice.com', 0, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `participants_auth`
--

CREATE TABLE `participants_auth` (
  `pk_participant_auth` int(10) NOT NULL,
  `fk_participant` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `participants_auth`
--

INSERT INTO `participants_auth` (`pk_participant_auth`, `fk_participant`, `username`, `password`, `status`) VALUES
(7, 40, 'dahyun@twice.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(8, 41, 'tzuyu@twice.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(9, 42, 'somi@ioi.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(11, 48, 'jessica@snsd.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(12, 51, 'kelvindsmn@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(13, 52, 'roa@kr.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(14, 54, 'bona@wjsn.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(15, 55, 'yuri@snsd.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(16, 56, 'sunny@snsd.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `pk_proposal` int(20) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `uploader` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `teams`
--

CREATE TABLE `teams` (
  `pk_team` int(255) NOT NULL,
  `fk_participant` int(100) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `team_type` varchar(255) NOT NULL,
  `team_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teams`
--

INSERT INTO `teams` (`pk_team`, `fk_participant`, `team_name`, `team_type`, `team_status`) VALUES
(6, 40, 'Twice Team', 'bp', 1),
(7, 42, 'Timmy', 'bp', 0),
(8, 48, 'SNSD', 'f', 0),
(9, 52, 'Pristin', 'sd', 0),
(10, 56, 'SNSD HATERS', 'sm', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_auth`
--
ALTER TABLE `admin_auth`
  ADD PRIMARY KEY (`pk_auth`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`pk_participant`);

--
-- Indexes for table `participants_auth`
--
ALTER TABLE `participants_auth`
  ADD PRIMARY KEY (`pk_participant_auth`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`pk_proposal`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`pk_team`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `pk_auth` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `pk_participant` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `participants_auth`
--
ALTER TABLE `participants_auth`
  MODIFY `pk_participant_auth` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `pk_proposal` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `pk_team` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
