-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2015 at 04:58 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `softdev_urquiza_trixia_ourspace`
--
CREATE DATABASE IF NOT EXISTS `softdev_urquiza_trixia_ourspace` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `softdev_urquiza_trixia_ourspace`;

-- --------------------------------------------------------

--
-- Table structure for table `myaddress`
--

CREATE TABLE IF NOT EXISTS `myaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `home_address` varchar(50) DEFAULT NULL,
  `landline` varchar(20) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `myaddress`
--

INSERT INTO `myaddress` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `created_at`, `home_address`, `landline`, `cellphone`) VALUES
(1, 'Trixia Marie', 'Ambagan', 'Urquiza', 'F', '0000-00-00 00:00:00', '147 champaca st. western bicutan taguig city', '', '+639177760794');

-- --------------------------------------------------------

--
-- Table structure for table `mycomment`
--

CREATE TABLE IF NOT EXISTS `mycomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `myaddress_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mycomment_ibfk_1` (`myaddress_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mycomment`
--

INSERT INTO `mycomment` (`id`, `myaddress_id`, `author`, `body`, `created_at`) VALUES
(1, 1, 'Trixia Marie A. Urquiza', 'asdfghjgkhjdfgfgf', '2015-02-28 03:58:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mycomment`
--
ALTER TABLE `mycomment`
  ADD CONSTRAINT `mycomment_ibfk_1` FOREIGN KEY (`myaddress_id`) REFERENCES `myaddress` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
