-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 07, 2016 at 08:58 PM
-- Server version: 5.5.48-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `j3delive_j3data`
--
CREATE DATABASE IF NOT EXISTS `j3delive_j3data` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `j3delive_j3data`;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
CREATE TABLE IF NOT EXISTS `Customer` (
  `cust_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cust_Pass` char(30) NOT NULL,
  `cust_Phone` char(15) NOT NULL,
  `cust_Address` char(30) NOT NULL,
  PRIMARY KEY (`cust_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CustomerFavourites`
--

DROP TABLE IF EXISTS `CustomerFavourites`;
CREATE TABLE IF NOT EXISTS `CustomerFavourites` (
  `cust_ID` int(11) NOT NULL,
  `rest_ID` int(11) NOT NULL,
  `item_Number` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cust_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CustomerRatings`
--

DROP TABLE IF EXISTS `CustomerRatings`;
CREATE TABLE IF NOT EXISTS `CustomerRatings` (
  `rest_ID` int(11) NOT NULL,
  `cust_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` char(200) NOT NULL,
  PRIMARY KEY (`rest_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Hours`
--

DROP TABLE IF EXISTS `Hours`;
CREATE TABLE IF NOT EXISTS `Hours` (
  `rest_ID` int(11) NOT NULL,
  `day_ID` char(4) NOT NULL,
  `open_Time` time NOT NULL,
  `interval_Open` int(11) NOT NULL,
  PRIMARY KEY (`rest_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
CREATE TABLE IF NOT EXISTS `Items` (
  `item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `item_Name` char(30) NOT NULL,
  `item_Price` decimal(10,0) NOT NULL,
  `item_Desc` char(50) NOT NULL,
  `item_Additional` char(50) NOT NULL,
  PRIMARY KEY (`item_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Menu`
--

DROP TABLE IF EXISTS `Menu`;
CREATE TABLE IF NOT EXISTS `Menu` (
  `menu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `item_Number` int(11) NOT NULL,
  `special_Instructions` char(50) NOT NULL,
  `grouping_Types` char(50) NOT NULL,
  PRIMARY KEY (`menu_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
CREATE TABLE IF NOT EXISTS `Orders` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `time_In` datetime NOT NULL,
  `time_Out` datetime NOT NULL,
  `item_Number` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `special_Instructions` char(50) NOT NULL,
  PRIMARY KEY (`order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

DROP TABLE IF EXISTS `Restaurant`;
CREATE TABLE IF NOT EXISTS `Restaurant` (
  `rest_ID` int(11) NOT NULL AUTO_INCREMENT,
  `rest_Pass` char(15) NOT NULL,
  `business_Phone` char(15) NOT NULL,
  `business_Address` char(30) NOT NULL,
  PRIMARY KEY (`rest_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
