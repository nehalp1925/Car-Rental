-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2019 at 02:11 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herzing`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `CarID` int(11) NOT NULL AUTO_INCREMENT,
  `Brand` varchar(108) NOT NULL,
  `Model` varchar(108) NOT NULL,
  `Type` varchar(108) NOT NULL,
  `TankCapacity` varchar(108) NOT NULL,
  `GasConsumption` varchar(108) NOT NULL,
  `Color` varchar(108) NOT NULL,
  `NumberOfPassenger` int(11) NOT NULL,
  `RentPrice` double NOT NULL,
  `Image` text NOT NULL,
  `Description` text NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CarID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DriverNo` varchar(20) NOT NULL,
  `CreditCardNo` varchar(20) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CustomerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Level` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceID` int(11) NOT NULL AUTO_INCREMENT,
  `ReturnID` int(11) NOT NULL,
  `Charge` double NOT NULL,
  `AdditionalCharge` double NOT NULL,
  PRIMARY KEY (`InvoiceID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

DROP TABLE IF EXISTS `rental`;
CREATE TABLE IF NOT EXISTS `rental` (
  `RentalID` int(11) NOT NULL AUTO_INCREMENT,
  `CarID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `DateStart` datetime NOT NULL,
  `DateEnd` datetime NOT NULL,
  `TosAccepted` tinyint(1) NOT NULL,
  `Cancelled` tinyint(1) NOT NULL,
  `Inspected` tinyint(1) NOT NULL,
  `Notes` text NOT NULL,
  PRIMARY KEY (`RentalID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returnrental`
--

DROP TABLE IF EXISTS `returnrental`;
CREATE TABLE IF NOT EXISTS `returnrental` (
  `ReturnID` int(11) NOT NULL AUTO_INCREMENT,
  `RentalID` int(11) NOT NULL,
  `ReturnDate` datetime NOT NULL,
  `Inspected` tinyint(1) NOT NULL,
  `Damage` tinyint(1) NOT NULL,
  `Notes` text NOT NULL,
  `GasLevel` double NOT NULL,
  `Millage` double NOT NULL,
  PRIMARY KEY (`ReturnID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
