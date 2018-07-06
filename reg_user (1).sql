-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2018 at 02:43 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_assng`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg_user`
--

CREATE TABLE IF NOT EXISTS `reg_user` (
  `user_id` int(8) NOT NULL,
  `user_name` varchar(32) DEFAULT NULL,
  `user_email` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_user`
--

INSERT INTO `reg_user` (`user_id`, `user_name`, `user_email`) VALUES
(5, 'Nikh', 'nikhel@gmail.com'),
(11, 'first', 'hello'),
(34, 'anamika singh', 'ak.singh@gmail.co'),
(40, 'sddf', 'sdfsdf@sdfdf'),
(41, 'arvind yadav', 'aky25@gmail.com'),
(45, 'user_details', 'nikhil@webornate.com'),
(50, 'sanjay kumar', 'sanjay@mail.com'),
(56, 'amit kumar', 'ak@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
