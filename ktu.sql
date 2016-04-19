-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2016 at 09:50 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ktu`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `dpt` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `password`, `dpt`) VALUES
(1, 'hari', '12345678', 'cse'),
(2, 'joe', '12345678', 'cse'),
(3, 'mary', '12345678', 'ce');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `name` varchar(20) NOT NULL,
  `dpt` varchar(4) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `dpt`, `id`, `phone`) VALUES
('Arjun', 'cse', 1, 909037371),
('Rahul', 'cse', 3, 909037371),
('Naveen', 'cse', 4, 909037371),
('Vimal', 'cse', 5, 909037371),
('Amal', 'cse', 6, 909037371),
('Jobin', 'ce', 7, 909037371),
('Nivin', 'ce', 8, 909037371),
('Akhil', 'ce', 9, 909037371),
('Nikhil', 'ce', 10, 909037371);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
