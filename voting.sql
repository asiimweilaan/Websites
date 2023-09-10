-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2023 at 07:50 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `aname` varchar(10) DEFAULT NULL,
  `pass` varchar(30) NOT NULL,
  `aemail` varchar(30) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `pass`, `aemail`) VALUES
(1, 'Donald', '123', 'donald@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`) VALUES
(6, 'BSE'),
(10, 'BIT'),
(7, 'BBA'),
(11, 'BLL');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(10) NOT NULL AUTO_INCREMENT,
  `postname` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `postname`) VALUES
(5, 'Head Prefect'),
(8, 'Information assistant'),
(7, 'Library Prefect'),
(9, 'Entertainment'),
(10, 'Food Prefect'),
(11, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `prefect`
--

DROP TABLE IF EXISTS `prefect`;
CREATE TABLE IF NOT EXISTS `prefect` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `cid` int(10) NOT NULL,
  `postid` int(10) NOT NULL,
  `prefname` varchar(30) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `FKprefect41503` (`cid`),
  KEY `FKprefect849671` (`postid`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prefect`
--

INSERT INTO `prefect` (`pid`, `email`, `cid`, `postid`, `prefname`, `count`) VALUES
(2, 'splinter@gmail.com', 6, 5, 'Splinter', 1),
(7, 'taika@gmail.com', 10, 5, 'Taika', 1),
(6, 'trevor@gmail.com', 7, 5, 'Trevor', 0),
(8, 'raph@gmail.com', 6, 8, 'Raph', 0),
(9, 'leonardo@gmail.com', 6, 8, 'Leonardo', 1),
(10, 'mikey@gmail.com', 6, 8, 'Michaelangelo', 1),
(12, 'doney@gmail.com', 6, 7, 'Donatello', 1),
(13, 'shredder@gmail.com', 7, 7, 'Shredder', 1),
(14, 'scorpion@gmail.com', 10, 9, 'Scorpion', 1),
(15, 'johnny@gmail.com', 6, 9, 'Johnny Cage', 1),
(16, 'mileena@gmail.com', 6, 10, 'Mileena', 0),
(17, 'kitana@gmail.com', 11, 10, 'Kitana', 2),
(18, 'smoke@gmail.com', 6, 11, 'Smoke', 0),
(19, 'geras@gmail.com', 10, 11, 'Geras', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `sid` int(10) NOT NULL AUTO_INCREMENT,
  `stemail` varchar(20) DEFAULT NULL,
  `pass` varchar(30) NOT NULL,
  `stat` varchar(10) NOT NULL DEFAULT 'not voted',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `stemail`, `pass`, `stat`) VALUES
(1, 'loard@gmail.com', '123', 'voted'),
(2, 'dev@gmail.com', '123', 'voted'),
(3, 'ret@gmail.com', '123', 'voted'),
(4, 'revas@gmail.com', '123', 'voted');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
