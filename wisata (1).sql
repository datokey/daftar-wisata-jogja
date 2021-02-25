-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 01:49 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `nama`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `wisatajogja`
--

CREATE TABLE `wisatajogja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `propinsi` varchar(15) NOT NULL,
  `rincian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wisatajogja`
--

INSERT INTO `wisatajogja` (`id`, `nama`, `image`, `alamat`, `kabupaten`, `propinsi`, `rincian`) VALUES
(22, 'dadad', 'buki.png', 'adawd', 'Sleman', 'Yogyakarta', 'aud ahdiuao aihdiua auhgiduha aoihdoi ahdaubkjbnfk ahkfuhauh haiuwhgf auhwdiuhag iauhgdkjbnfk kjhfaofh auhfiuha uhiuhf aiuahgdiuha audhgiaji oiahoifdh aiuhdiuad aohdoahd aodhoa  oawdoaoadhoawhdoa oiadoai oahdoa oahdoa oadoaidh adhoa dao daod iaodao doa oa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisatajogja`
--
ALTER TABLE `wisatajogja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wisatajogja`
--
ALTER TABLE `wisatajogja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
