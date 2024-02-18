-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2022 at 02:25 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `pov` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `aemail` varchar(40) NOT NULL,
  `adate` varchar(30) NOT NULL,
  `iproof` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `fname`, `mname`, `lname`, `pov`, `address`, `desig`, `phone`, `aemail`, `adate`, `iproof`, `photo`, `status`) VALUES
(24, 'Santanu', 'Kaushik', 'Gohain', 'Office Work regarding exmamination', 'Dhemaji, Assam', 'Office Staff', '81818181818', 'singhanjum5@gmail.com', '2022-05-31', 'photo new.jpg', 'photo new.png', 'Approve'),
(25, 'Trishna', '', 'Baruah', 'Admit card related work', 'Chabua, Dibrugarh', 'LDA', '82764789387467383', 't@gmail.com', '2022-05-31', 'RAHAT AHMED_photo.jfif', 'CHANDINI KHATOON_photo.jfif', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aemail` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `aemail`, `username`, `password`) VALUES
(1, 'a@gmail.com', 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
