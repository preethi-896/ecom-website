-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2023 at 05:44 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `cartid` int NOT NULL AUTO_INCREMENT,
  `cartuserid` int DEFAULT NULL,
  `cartprodcode` int DEFAULT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cartid`, `cartuserid`, `cartprodcode`) VALUES
(1, 2, 3),
(3, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

DROP TABLE IF EXISTS `tblcategories`;
CREATE TABLE IF NOT EXISTS `tblcategories` (
  `catcode` int NOT NULL AUTO_INCREMENT,
  `catname` varchar(200) NOT NULL,
  PRIMARY KEY (`catcode`),
  UNIQUE KEY `catname` (`catname`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`catcode`, `catname`) VALUES
(1, 'Accessories'),
(2, 'Mobile'),
(3, 'Home Appliances'),
(4, 'Perfume'),
(5, 'Books'),
(6, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `prodcode` int NOT NULL AUTO_INCREMENT,
  `prodname` varchar(200) NOT NULL,
  `prodcatcode` int DEFAULT NULL,
  `prodprice` int DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`prodcode`),
  UNIQUE KEY `prodname` (`prodname`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`prodcode`, `prodname`, `prodcatcode`, `prodprice`, `image`) VALUES
(1, 'Kids Story Book English', 1, 250, 'download.jpg'),
(2, 'lyrca shirt', 6, 300, 'Men’s-Designer-Party-Shirt.jpg.jpg'),
(3, 'Perfume', 4, 200, 'perfume.jpg'),
(4, 'Tv', 3, 14500, 'Isi_LCD_TV.jpg'),
(5, 'Shirt', 1, 245, 'Blue_Tshirt.jpg'),
(6, 'jeans', 6, 700, 'blue-jeans-isolated-white-34440719.jpg'),
(7, 'Mobile', 2, 15000, 'pexels-photo-699122.jpeg'),
(8, 'Washing', 2, 13000, 'washing.jpg'),
(9, 'Redmi', 2, 16000, 'Redmi-K50i-Wallpapers.webp'),
(10, 'Ac', 3, 14000, 'air-conditioner-6605973__340.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile` bigint NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`userid`, `username`, `email`, `password`, `mobile`, `role`) VALUES
(1, 'test', 'test@gmail.com', 'pass', 9750985568, 'seller'),
(2, 'aadhi', 'axarathi1999@gmail.com', 'pass', 7010468974, 'Customer'),
(3, 'test23', 'test23@gmail.com', 'pass', 6789022344, 'Customer'),
(4, 'test10', 'test19@gmail.com', 'pass', 6789123455, 'Customer'),
(5, 'test78', 'test78@gmail.com', 'pass', 6789034567, 'Customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
