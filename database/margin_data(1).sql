-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 01:24 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exportdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `margin_data`
--

CREATE TABLE IF NOT EXISTS `margin_data` (
`id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `sale_rate` float NOT NULL,
  `buy_rate` float NOT NULL,
  `rate_convert` float NOT NULL,
  `brkage` float NOT NULL,
  `duty` float NOT NULL,
  `meis` float NOT NULL,
  `othre_exp` float NOT NULL,
  `t_date` date NOT NULL,
  `time_stamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `margin_data`
--

INSERT INTO `margin_data` (`id`, `qty`, `sale_rate`, `buy_rate`, `rate_convert`, `brkage`, `duty`, `meis`, `othre_exp`, `t_date`, `time_stamp`) VALUES
(1, 1, 399, 29000, 71.62, 50, 1.5, 2, 0, '2020-03-04', '2020-03-04 16:38:15'),
(2, 1, 399, 2900, 71.62, 50, 1.5, 2, 0, '2020-03-04', '2020-03-04 16:38:15'),
(3, 1, 399, 2900, 71.62, 50, 1.5, 2, 0, '2020-03-04', '2020-03-04 16:38:15'),
(4, 2, 20, 12, 121, 4, 2, 1, 0, '2020-03-04', '2020-03-04 16:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `margin_data`
--
ALTER TABLE `margin_data`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `margin_data`
--
ALTER TABLE `margin_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
