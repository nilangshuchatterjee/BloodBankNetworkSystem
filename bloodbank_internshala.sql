-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 08:04 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_internshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `addblood`
--

CREATE TABLE `addblood` (
  `abid` int(11) NOT NULL,
  `bgroup` varchar(100) NOT NULL,
  `btype` varchar(100) NOT NULL,
  `bhname` varchar(100) NOT NULL,
  `bhloc` varchar(100) NOT NULL,
  `hid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addblood`
--

INSERT INTO `addblood` (`abid`, `bgroup`, `btype`, `bhname`, `bhloc`, `hid`) VALUES
(1, 'b+', 'rh+', 'Suri Sadar Hospital', 'Suri, Birbhum', 2),
(2, 'ab-', 'rh-', 'Suri Sadar Hospital', 'Suri, Birbhum', 2),
(3, 'o+', 'rh+', 'Suri Sadar Hospital', 'Suri, Birbhum', 2),
(5, 'a+', 'rh+', 'Bardhaman Medical College', 'Bardhaman', 3),
(6, 'b+', 'rh+', 'Bardhaman Medical College', 'Bardhaman', 3),
(8, 'a+', 'rh+', 'Calcutta Medical College', 'Kolkata', 1),
(9, 'ab-', 'rh-', 'Calcutta Medical College', 'Kolkata', 1),
(10, 'b+', 'rh+', 'Calcutta Medical College', 'Kolkata', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `hid` int(11) NOT NULL,
  `hname` varchar(100) NOT NULL,
  `hloc` varchar(100) NOT NULL,
  `hemail` varchar(100) NOT NULL,
  `hpass` varchar(100) NOT NULL,
  `htime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hid`, `hname`, `hloc`, `hemail`, `hpass`, `htime`) VALUES
(1, 'Calcutta Medical College', 'Kolkata', 'cmc@gmail.com', '$2y$10$qBIf5VvWG7hLBCFTOjxLa.5EltM.KKZa1TAx337XyD1XrOc0Eb4Ii', '13-03-18 12:33:53 pm'),
(2, 'Suri Sadar Hospital', 'Suri, Birbhum', 'ssh@gmail.com', '$2y$10$wLgEnZ4OMneLK/5m6Pu.dOmzc8xySX2sAcZOEyf6o.kOaH3p.pUbu', '13-03-18 08:55:54 pm'),
(3, 'Bardhaman Medical College', 'Bardhaman', 'bmc@gmail.com', '$2y$10$cZQPS6kRHipf.Rtf6BhFO.AUReklY7By2QLisskpzux4y7HsGyHdW', '13-03-18 10:59:54 pm');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `rid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bgroup` varchar(100) NOT NULL,
  `regtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`rid`, `name`, `email`, `password`, `bgroup`, `regtime`) VALUES
(2, 'amar singh', 'amar@gmail.com', '$2y$10$nrDChZPmueJ4j2C8juwcIuN/lnRByucr3AxWLCWS.CrA7CLVUsa12', 'a+', '14-03-18 09:23:38 am'),
(3, 'Nilangshu Chatterjee', 'nil@gmail.com', '$2y$10$VaCHaacmoaNcbR/2.KOTvOvYU8ymeXEAE3Lp8zQ7vPC.vAMZ2lN.6', 'b+', '14-03-18 09:26:39 am'),
(4, 'Amal Pal', 'amal@gmail.com', '$2y$10$azaTE9peUMCL52EXRz3RBOq50eCzRUHsIy2FcupziTK1Zpuy0iKhe', 'a+', '14-03-18 10:13:07 pm'),
(5, 'Anamika Das', 'ana@gmail.com', '$2y$10$ZG1AvL2AP5Ic.Evtv6f4pORDN6dnq27l3gKBhbOs6OKrLCif8UUYG', 'ab-', '15-03-18 12:14:40 am');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqid` int(11) NOT NULL,
  `bbname` varchar(100) NOT NULL,
  `recname` varchar(100) NOT NULL,
  `recemail` varchar(100) NOT NULL,
  `hid` int(100) NOT NULL,
  `rid` int(100) NOT NULL,
  `reqstatus` varchar(100) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`reqid`, `bbname`, `recname`, `recemail`, `hid`, `rid`, `reqstatus`) VALUES
(8, 'Suri Sadar Hospital', 'Nilangshu Chatterjee', 'nil@gmail.com', 2, 3, 'Accepted'),
(9, 'CMC', 'amar singh', 'amar@gmail.com', 1, 2, 'Accepted'),
(10, 'CMC', 'Amal Pal', 'amal@gmail.com', 1, 4, 'Pending'),
(11, 'Suri Sadar Hospital', 'Anamika Das', 'ana@gmail.com', 2, 5, 'Pending'),
(12, 'Calcutta Medical College', 'Anamika Das', 'ana@gmail.com', 1, 5, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addblood`
--
ALTER TABLE `addblood`
  ADD PRIMARY KEY (`abid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addblood`
--
ALTER TABLE `addblood`
  MODIFY `abid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
