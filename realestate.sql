-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2019 at 07:04 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `housing`
--

DROP TABLE IF EXISTS `housing`;
CREATE TABLE IF NOT EXISTS `housing` (
  `id_housing` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pc` int(50) NOT NULL,
  `area` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `type` varchar(20) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_housing`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `housing`
--

INSERT INTO `housing` (`id_housing`, `title`, `address`, `city`, `pc`, `area`, `price`, `photo`, `type`, `description`) VALUES
(61, ' NICE VIEW', '16, Am Wangert', ' Michelau', 9171, 845, 3520, 'img/png-hd-of-homes-ordinary-drem-homes-10-house-png-602.png', ' sale', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quidem, illo deserunt cum porro quis harum explicabo, quisquam modi sit natus ipsum itaque et rerum, incidunt qui ad! Veritatis, molestias?\r\n'),
(60, 'beautiful nice house', '16, Am Wangert', ' Michelau', 9171, 150, 12000, 'img/house_PNG57.png', ' letting', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quidem, illo deserunt cum porro quis harum explicabo, quisquam modi sit natus ipsum itaque et rerum, incidunt qui ad! Veritatis, molestias?\r\n'),
(59, 'Big house', '16, Am Wangert', ' Michelau', 9171, 101, 101, 'img/house_PNG61.png', ' letting', '101');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
