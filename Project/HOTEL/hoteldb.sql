-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 03:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `mbno` varchar(15) NOT NULL,
  `rooms` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `nofro` varchar(30) NOT NULL,
  `chkin` date NOT NULL,
  `chkout` date NOT NULL,
  `tnod` varchar(30) NOT NULL,
  `amt` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `onlinebooking`
--

CREATE TABLE `onlinebooking` (
  `id` int(3) NOT NULL,
  `uid` int(11) NOT NULL,
  `rooms` varchar(10) NOT NULL,
  `price` int(100) NOT NULL,
  `nofro` int(50) NOT NULL,
  `chkin` date NOT NULL,
  `chkout` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinebooking`
--

INSERT INTO `onlinebooking` (`id`, `uid`, `rooms`, `price`, `nofro`, `chkin`, `chkout`) VALUES
(82, 38, 'A/C', 300, 2, '2019-09-04', '2019-09-27'),
(81, 38, 'A/C', 300, 9, '2019-09-05', '2019-09-28'),
(80, 36, 'A/C', 300, 7, '2019-09-04', '2019-09-14'),
(79, 36, 'A/C', 300, 8, '2019-09-25', '2019-09-28'),
(78, 36, 'A/C', 300, 4, '2019-09-12', '2019-09-27'),
(77, 36, 'A/C', 300, 2, '2019-09-12', '2019-09-26'),
(76, 36, 'A/C', 300, 12, '2019-09-26', '2019-09-27'),
(75, 36, 'A/C', 300, 1, '2019-09-24', '2019-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `onlinecancel`
--

CREATE TABLE `onlinecancel` (
  `id` int(3) NOT NULL,
  `uid` int(11) NOT NULL,
  `rooms` varchar(10) NOT NULL,
  `price` int(100) NOT NULL,
  `nofro` int(50) NOT NULL,
  `chkin` date NOT NULL,
  `chkout` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlinecancel`
--

INSERT INTO `onlinecancel` (`id`, `uid`, `rooms`, `price`, `nofro`, `chkin`, `chkout`) VALUES
(26, 36, 'A/C', 300, 12, '2019-09-26', '2019-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `chn` varchar(30) NOT NULL,
  `cn` varchar(20) NOT NULL,
  `cvvno` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`chn`, `cn`, `cvvno`) VALUES
('fgjdsfg', '1234123412341234', '112');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(30) NOT NULL,
  `mbno` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `conpass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `address`, `city`, `mbno`, `email`, `user`, `password`, `conpass`) VALUES
(36, 'ruchi', 'kadia plot', 'porbandar', '7046119875', 'ruchi@gmail.com', 'ruchi', 'ruchi', 'ruchi'),
(37, 'admin', 'kadia plot', 'porbandar', '7046990975', 'nishi@g.con', 'admin', 'admin1234', 'admin1234'),
(38, 'nishi', 'kadia plot', 'porbandar', '9087654321', 'o@gmail.com', 'nishi', 'nishi', 'nishi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlinebooking`
--
ALTER TABLE `onlinebooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlinecancel`
--
ALTER TABLE `onlinecancel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `onlinebooking`
--
ALTER TABLE `onlinebooking`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `onlinecancel`
--
ALTER TABLE `onlinecancel`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
