-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 27, 2023 at 01:30 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `operation` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `operation`, `date`) VALUES
('Tope123', 'UPDATE registration SET adminStatus = 1 WHERE username = \"coolguy123\"', '2023-11-25 21:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `adminStatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`username`, `password`, `adminStatus`) VALUES
('coolguy123', '$2y$10$0w54tLpos7l2yCbOVm9IV.VGWATEmJhtLZ79iYkopIcqfycYJ.oI6', 0),
('forward', '$2y$10$y.VFpTpSIsWegBtPEUflkufZYQGfegO8RiXpjo33wfERaxjgkmwva', 0),
('ILoveThis', '$2y$10$AFMeDUHbIi/zkXy6TZTSwuJuFf4QTxiRv0UjLaDsXzbM61F5zRDd2', 0),
('LigmaBalls', '$2y$10$7y9ar2umGtdyEzmUiP7YVe7xRh6j/GZhJkeleOr0.bNqJBM3ObdWm', 0),
('ope123', '$2y$10$ixuKjJZSLFDH4opXYWoU2ucfGgiBbzekpBwnysswow/UWyFX8xRdS', 1),
('tadio123', '$2y$10$TgMsCxXVb.ujgVSq/b31xe9gIeD/bwDR5sA0zaHZ8lFeo2/VdZfeO', 0),
('Tope123', '$2y$10$cTATh7jm3OEk8kQKI8xM/.ka4UWVZEDBP/QvZhMjyIrBq/5HLcVJS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `username` varchar(12) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`username`, `realname`, `stars`, `review`, `date`) VALUES
('coolguy123', 'Austin Luebbers', 4, 'I love TOpe more than BElla but because he doesn\'t cuddle with me he only gets 4 stars.\r\n', '2023-11-26 14:14:37'),
('ope123', 'cool guy', 5, 'I love Tope', '2023-11-24 19:23:20'),
('Tope123', 'Tope Adio', 5, 'I think this guy is pretty cool.', '2023-11-24 19:00:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `username link` FOREIGN KEY (`username`) REFERENCES `registration` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
