-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2018 at 10:51 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discuzzion`
--

-- --------------------------------------------------------

--
-- Table structure for table `headCat`
--

CREATE TABLE `headCat` (
  `cnum` int(3) UNSIGNED NOT NULL,
  `ctitle` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headCat`
--

INSERT INTO `headCat` (`cnum`, `ctitle`) VALUES
(2, 'Programming Languages'),
(3, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `headRep`
--

CREATE TABLE `headRep` (
  `rnum` int(3) UNSIGNED NOT NULL,
  `numcat` int(3) UNSIGNED NOT NULL,
  `numsubcat` int(3) UNSIGNED NOT NULL,
  `tnum` int(3) UNSIGNED NOT NULL,
  `writer` varchar(16) NOT NULL,
  `reply` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headRep`
--

INSERT INTO `headRep` (`rnum`, `numcat`, `numsubcat`, `tnum`, `writer`, `reply`, `date`) VALUES
(1, 3, 5, 1, 'userx', 'Keeping fingers crossed', '2018-07-18'),
(2, 3, 5, 2, 'userx', 'Yeah, really disappointed.', '2018-07-18'),
(3, 3, 5, 2, 'usery', 'Very upset, seeing two legendary players out of the game<br />\r\n', '2018-07-18'),
(4, 2, 3, 3, 'usery', 'These technologies can be used definitely but there are new alternatives coming up<br />\r\n', '2018-07-18'),
(5, 3, 4, 4, 'usery', 'CSK wins, SRH departs<br />\r\n', '2018-07-18'),
(6, 3, 5, 5, 'usery', 'Wow, I\'m loving this.', '2018-07-18'),
(7, 3, 5, 5, 'usery', 'Hilarious, isn\'t it', '2018-07-18'),
(8, 2, 3, 3, 'usery', 'node.js is much faster than php', '2018-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `headSubcat`
--

CREATE TABLE `headSubcat` (
  `snum` int(3) UNSIGNED NOT NULL,
  `pid` int(3) UNSIGNED NOT NULL,
  `stitle` varchar(128) NOT NULL,
  `sdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headSubcat`
--

INSERT INTO `headSubcat` (`snum`, `pid`, `stitle`, `sdesc`) VALUES
(2, 2, 'HTML, CSS, Bootstrap', 'Front-end technologies'),
(3, 2, 'PHP, node.js', 'Back-end Technlogies'),
(4, 3, 'Cricket', 'CSK emerged victorious for the third time in IPL 2k18'),
(5, 3, 'Football', 'FIFA 2k18');

-- --------------------------------------------------------

--
-- Table structure for table `headTop`
--

CREATE TABLE `headTop` (
  `tnum` int(8) UNSIGNED NOT NULL,
  `numcat` int(3) UNSIGNED NOT NULL,
  `numsubcat` int(3) UNSIGNED NOT NULL,
  `writer` varchar(16) NOT NULL,
  `theme` varchar(128) NOT NULL,
  `matter` text NOT NULL,
  `date` date NOT NULL,
  `visits` int(5) UNSIGNED NOT NULL,
  `replies` int(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headTop`
--

INSERT INTO `headTop` (`tnum`, `numcat`, `numsubcat`, `writer`, `theme`, `matter`, `date`, `visits`, `replies`) VALUES
(1, 3, 5, 'userx', 'Germany out of the league', 'New things to happen this world cup', '2018-07-18', 6, 1),
(2, 3, 5, 'userx', 'Argentina and Portugal out', 'Ronaldo and Messi out of the league.', '2018-07-18', 12, 2),
(3, 2, 3, 'usery', 'Back-end of website', 'Used to create back-end of websites', '2018-07-18', 13, 2),
(4, 3, 4, 'usery', 'SRH Vs CSK', 'This match is going to be stunning', '2018-07-18', 8, 1),
(5, 3, 5, 'usery', 'Winner 2k18', 'France captures this year title after defeating Croatia', '2018-07-18', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `uid` int(8) UNSIGNED NOT NULL,
  `sname` varchar(16) NOT NULL,
  `secretword` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`uid`, `sname`, `secretword`) VALUES
(1, 'userx', '1234'),
(2, 'usery', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `headCat`
--
ALTER TABLE `headCat`
  ADD PRIMARY KEY (`cnum`);

--
-- Indexes for table `headRep`
--
ALTER TABLE `headRep`
  ADD PRIMARY KEY (`rnum`),
  ADD KEY `numcat` (`numcat`),
  ADD KEY `numsubcat` (`numsubcat`),
  ADD KEY `tnum` (`tnum`);

--
-- Indexes for table `headSubcat`
--
ALTER TABLE `headSubcat`
  ADD PRIMARY KEY (`snum`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `headTop`
--
ALTER TABLE `headTop`
  ADD PRIMARY KEY (`tnum`),
  ADD KEY `numcat` (`numcat`),
  ADD KEY `numsubcat` (`numsubcat`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `headCat`
--
ALTER TABLE `headCat`
  MODIFY `cnum` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `headRep`
--
ALTER TABLE `headRep`
  MODIFY `rnum` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `headSubcat`
--
ALTER TABLE `headSubcat`
  MODIFY `snum` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `headTop`
--
ALTER TABLE `headTop`
  MODIFY `tnum` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `uid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `headRep`
--
ALTER TABLE `headRep`
  ADD CONSTRAINT `headRep_ibfk_1` FOREIGN KEY (`numcat`) REFERENCES `headCat` (`cnum`),
  ADD CONSTRAINT `headRep_ibfk_2` FOREIGN KEY (`numsubcat`) REFERENCES `headSubcat` (`snum`),
  ADD CONSTRAINT `headRep_ibfk_3` FOREIGN KEY (`tnum`) REFERENCES `headTop` (`tnum`);

--
-- Constraints for table `headSubcat`
--
ALTER TABLE `headSubcat`
  ADD CONSTRAINT `headSubcat_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `headCat` (`cnum`);

--
-- Constraints for table `headTop`
--
ALTER TABLE `headTop`
  ADD CONSTRAINT `headTop_ibfk_1` FOREIGN KEY (`numcat`) REFERENCES `headCat` (`cnum`),
  ADD CONSTRAINT `headTop_ibfk_2` FOREIGN KEY (`numsubcat`) REFERENCES `headSubcat` (`snum`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
