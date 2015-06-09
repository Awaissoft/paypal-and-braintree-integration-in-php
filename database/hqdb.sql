-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 12:28 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hqdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hqtab`
--

CREATE TABLE IF NOT EXISTS `hqtab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` varchar(100) NOT NULL,
  `t_status` varchar(50) NOT NULL,
  `getway` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hqtab`
--

INSERT INTO `hqtab` (`id`, `t_id`, `t_status`, `getway`, `timestamp`) VALUES
(1, '4h4c2d', 'Amount successfully paid!', 'braintree', '2015-06-08 09:56:21'),
(2, 'UNKNOWN_ERROR', 'An unknown error has occurred', 'paypal', '2015-06-08 10:00:23'),
(3, 'gjmf5t', 'Amount successfully paid!', 'braintree', '2015-06-08 10:00:35'),
(4, 'ccj46d', 'Amount successfully paid!', 'braintree', '2015-06-08 10:16:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
