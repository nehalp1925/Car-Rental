-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2019 at 02:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`CarID`, `Brand`, `Model`, `Type`, `TankCapacity`, `GasConsumption`, `Color`, `NumberOfPassenger`, `RentPrice`, `Image`, `Description`, `Status`) VALUES
(1, 'Nissan', 'Rogue', 'Crossover', '55L', '7.5 Highway 9.6 City', 'Red', 5, 169, 'nissan_canada_nissan_rogue.jpg', 'MostRogues come standard with a 2.5-liter four-cylinder engine (170 horsepower, 175 pound-feet of torque) paired with a continuously variable automatic transmission (CVT) that sends power to the front wheels.', 1),
(3, 'Toyota', 'Prius', 'Sedan', '43L', '4.4 City 4.6 Higway', 'silver', 5, 139, '2019-toyota-prius-le-classic-silver-metallic-0.jpg', 'is a full hybrid electric automobiledeveloped by Toyota and manufactured by the company since 1997.', 0),
(4, 'Kia', 'Optima', 'Sedan', '85L', '10 city 7.1 highway', 'White', 5, 189, '2019-kia-optima-lx-snow-white-pearl-0.jpg', 'is a four-door mid-size car manufactured by Kia Motors since 2000', 1),
(5, 'BMW', 'X5', 'SUV', '85L', '15 city 11 highway', 'Blue', 5, 189, '19534801401.jpg', 'The BMW X5 is an mid-size luxury SUV produced by BMW', 1),
(6, 'Audi', 'A7', 'Sportback', '73L', '11 city 8.2 highway', 'Black', 5, 189, '5719251_08415_2018-audi-a7-sportback_002.jpg', 'is an executive car produced by Audi since 2010. A five-door liftback', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `Username`, `Password`, `Fullname`, `DateOfBirth`, `Phone`, `Email`, `Address`, `DriverNo`, `CreditCardNo`, `valid`) VALUES
(1, 'tejyquh', '96e79218965eb72c92a549dd5a330112', 'Basia Lang', '2012-09-21', '164-473-1309', 'tezid@mailinator.com', 'Officia laudantium ', 'Officia laudantium ', '4520123456781456', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`RentalID`, `CarID`, `CustomerID`, `DateStart`, `DateEnd`, `TosAccepted`, `Cancelled`, `Inspected`, `Notes`) VALUES
(1, 3, 1, '2019-06-28 00:00:00', '2019-06-30 00:00:00', 1, 0, 1, '');

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
