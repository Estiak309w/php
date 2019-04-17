-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2019 at 09:08 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `donator`
--

CREATE TABLE `donator` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `card_number` varchar(25) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donator`
--

INSERT INTO `donator` (`id`, `name`, `card_number`, `amount`) VALUES
(1, 'c', '2222', 12),
(2, 'section donator', '3456', 1200),
(3, 'section donator', '8888', 90000),
(4, 'education donator', '3333', 90000),
(5, 'section donator', '3333', 90000),
(6, 'arif ajad', '8888', 90000),
(7, 'arif ajad', '12345', 90000),
(8, 'estiak', '12345', 10000),
(9, 'eee', '8888', 90000),
(10, 'estiak', '12345', 90000),
(11, 'estiak', '12345', 1200),
(12, 'arif ajad', '12345', 10000),
(13, 's alam', '444', 12000),
(14, 's alam', '12', 12000),
(15, 'www', '12345', 90000),
(16, 'ttt', '8888', 90000),
(17, 'www', '12345', 1200),
(18, 'rahim', '777', 10000),
(19, 'rahim', '12345', 90000),
(20, 'karim', '3333', 1200),
(21, 'x', '8888', 1200),
(22, 'rahim', '3333', 22000),
(23, '56456', '2222', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `title` varchar(25) NOT NULL,
  `location` varchar(20) NOT NULL,
  `target` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`title`, `location`, `target`, `type`, `created_at`) VALUES
('bonani fire', 'bonani', 2000000, 'health', '0000-00-00 00:00:00'),
('rohinga', 'teknaf', 10000, 'food', '2019-04-10 20:17:07'),
('bonani fire', 'bonani', 10000, 'health', '2019-04-11 00:19:33'),
('drought at rangpur', 'rangpur', 50000, 'food', '2019-04-13 11:42:21'),
('jante chai', 'badda', 70000, 'educationa', '2019-04-13 11:43:22');

-- --------------------------------------------------------

--
-- Table structure for table `event_donator`
--

CREATE TABLE `event_donator` (
  `full name` varchar(13) NOT NULL,
  `email` varchar(13) NOT NULL,
  `address` varchar(13) NOT NULL,
  `city` varchar(13) NOT NULL,
  `card name` varchar(13) NOT NULL,
  `card number` varchar(15) NOT NULL,
  `expire month` date NOT NULL,
  `amount` int(11) NOT NULL,
  `event title` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_donator`
--

INSERT INTO `event_donator` (`full name`, `email`, `address`, `city`, `card name`, `card number`, `expire month`, `amount`, `event title`) VALUES
('www', 'es@gmail.com', 'gulshan', '', 'bkash', '12345', '2019-04-09', 90000, 'food'),
('ttt', 'estiakemon309', 'gulshan', '', 'bkash', '8888', '2019-04-16', 90000, 'bonani fire'),
('www', 'es@gmail.com', 'gulshan', '', 'bkash', '12345', '2019-04-17', 1200, 'bonani fire'),
('rahim', 'meraj@gmail.c', 'gulshan', '', 'bkash', '777', '2019-04-23', 10000, 'food'),
('rahim', 'es@gmail.com', 'gulshan', '', 'bkash', '12345', '2019-04-09', 90000, 'education'),
('karim', 'meraj@gmail.c', 'gulshan', '', 'bkash', '3333', '2019-04-21', 1200, ''),
('x', 'meraj@gmail.c', 'gulshan', '', 'bkash', '8888', '2019-04-29', 1200, ''),
('rahim', 'meraj@gmail.c', 'banani', '', 'bkash', '3333', '2019-04-23', 22000, 'rohinga');

-- --------------------------------------------------------

--
-- Table structure for table `j`
--

CREATE TABLE `j` (
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `j`
--

INSERT INTO `j` (`name`, `email`, `password`, `type`) VALUES
('estiak', 'estiakemon309@gmail.com', '222', 'type'),
('eee', 'es@gmail.com', '123', 'type'),
('estiak', 'estiakemon309@gmail.com', '222', 'admin'),
('arif ajad', 'es@gmail.com', '123', 'user'),
('www', 'es@gmail.com', '123', 'user'),
('Rity', 'es@gmail.com', '123', 'donator'),
('www', 'es@gmail.com', '23', 'volunteer'),
('ahmed', 'es@gmail.com', '111', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `name` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`name`, `password`, `email`) VALUES
('', '', ''),
('', '', ''),
('estiak,emon', '12', 'estiakemon309@gmail.com'),
('12', '', 'es@gmail.com'),
('12', '', 'es@gmail.com'),
('www', '', 'es@gmail.com'),
('', '', ''),
('', '', ''),
('', '', ''),
('arif ajad', '', 'es@gmail.com'),
('arif ajad', '', 'es@gmail.com'),
('arif ajad', '', 'es@gmail.com'),
('arif ajad', '', 'es@gmail.com'),
('arif ajad', '', 'es@gmail.com'),
('arif ajad', '', 'es@gmail.com'),
('arif ajad', '', 'es@gmail.com'),
('x', '', 'es@gmail.com'),
('x', '', 'es@gmail.com'),
('', '', ''),
('', '', ''),
('', '', ''),
('eee', '12', 'es@gmail.com'),
('eee', '', 'es@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `section_donator`
--

CREATE TABLE `section_donator` (
  `full name` varchar(12) NOT NULL,
  `email` varchar(15) NOT NULL,
  `address` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `card name` varchar(15) NOT NULL,
  `card number` int(11) NOT NULL,
  `expire month` date NOT NULL,
  `amount` int(11) NOT NULL,
  `section type` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section_donator`
--

INSERT INTO `section_donator` (`full name`, `email`, `address`, `city`, `card name`, `card number`, `expire month`, `amount`, `section type`) VALUES
('s alam', 'e@gmail.com', 'g,dhaka', '', 'bkash', 444, '2019-04-18', 12000, ''),
('s alam', 'e@gmail.com', 'g,dhaka', '', 'bkash', 12, '2019-04-09', 12000, 'food'),
('56456', 'e3@ff.co', 'bonani', '', 'bkash', 2222, '2019-04-24', 10000, 'health');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `name`, `email`, `password`) VALUES
(1, 'meraj', 'meraj@gmail.com', '789'),
(2, 'meraj', 'meraj@gmail.com', '90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donator`
--
ALTER TABLE `donator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donator`
--
ALTER TABLE `donator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
