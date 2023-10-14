-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 03, 2021 at 03:49 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp`
--

-- --------------------------------------------------------

--
-- Table structure for table `allaccount`
--

DROP TABLE IF EXISTS `allaccount`;
CREATE TABLE IF NOT EXISTS `allaccount` (
  `UserUID` int(30) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Birthday` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Role` varchar(10) NOT NULL,
  PRIMARY KEY (`UserUID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `allaccount`
--

INSERT INTO `allaccount` (`UserUID`, `Username`, `Password`, `Name`, `Birthday`, `Phone`, `Email`, `Address`, `Role`) VALUES
(1, 'admin1', 'admin1', 'adminname', 'adminbirth', 'adminphone', 'adminemail', 'adminadd', 'Admin'),
(2, 'user1', 'user1', 'Chan Weng Hong', '2000-01-24', 'Phone', 'Email', 'No.373, Jalan 1/8, Taman Dagang, 68000 Ampang Selangor', 'User'),
(3, 'user2', 'user2', 'Syramid', '2021-01-21', '123344552', '123abc@mail.com', 'Earth', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `appointmentrecord`
--

DROP TABLE IF EXISTS `appointmentrecord`;
CREATE TABLE IF NOT EXISTS `appointmentrecord` (
  `AppRecUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` int(11) NOT NULL,
  `HospitalUID` int(11) NOT NULL,
  `HospitalName` varchar(255) NOT NULL,
  `PatientName` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(255) NOT NULL,
  `TestResult` varchar(255) NOT NULL,
  `Others` varchar(255) NOT NULL,
  `Attendance` varchar(255) NOT NULL,
  PRIMARY KEY (`AppRecUID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointmentrecord`
--

INSERT INTO `appointmentrecord` (`AppRecUID`, `UserUID`, `HospitalUID`, `HospitalName`, `PatientName`, `Date`, `Time`, `TestResult`, `Others`, `Attendance`) VALUES
(1, 2, 18, 'f', 'Chan Weng Hong', '2021-01-11', '10am-12pm', 'Positive', 'very healthy', 'Yes'),
(2, 2, 18, 'Ampang Putera', 'Chan Weng Hong', '2021-01-12', '10am-12pm', '', '', ''),
(3, 2, 18, 'Ampang Putera', 'Chan Weng Hong', '2021-01-20', '10am-12pm', '', '', ''),
(4, 2, 18, 'Ampang Putera', 'Chan Weng Hong', '2021-01-19', '2pm-4pm', 'Negative', 'Cough, flu', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `appointmentschedule`
--

DROP TABLE IF EXISTS `appointmentschedule`;
CREATE TABLE IF NOT EXISTS `appointmentschedule` (
  `AppScheUID` int(11) NOT NULL AUTO_INCREMENT,
  `HospitalUID` int(11) NOT NULL,
  `Week` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time1` varchar(255) NOT NULL,
  `Time2` varchar(255) NOT NULL,
  `Time3` varchar(255) NOT NULL,
  PRIMARY KEY (`AppScheUID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointmentschedule`
--

INSERT INTO `appointmentschedule` (`AppScheUID`, `HospitalUID`, `Week`, `Date`, `Time1`, `Time2`, `Time3`) VALUES
(7, 18, 1, '2021-01-11', '10am-12pm', '2pm-4pm', '6pm-9pm'),
(8, 18, 2, '2021-01-18', '10am-12pm', '2pm-4pm', '6pm-8pm'),
(9, 19, 1, '2021-01-11', '10am-12pm', '2pm-4pm', '6pm-8pm'),
(10, 19, 2, '2021-01-18', '10am-12pm', '2pm-4pm', '6pm-8pm'),
(11, 20, 1, '2021-01-18', '10am-12pm', '2pm-4pm', '6pm-8pm'),
(12, 20, 2, '2021-01-25', '10am-12pm', '2pm-4pm', '6pm-8pm'),
(13, 21, 1, '2021-01-25', '10am-12pm', '2pm-4pm', '6pm-8pm'),
(14, 21, 2, '2021-02-01', '10am-12pm', '2pm-4pm', '6pm-8pm');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `CartUID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductUID` int(11) NOT NULL,
  `UserUID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  PRIMARY KEY (`CartUID`)
) ENGINE=MyISAM AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `ContentUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` int(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Content` text NOT NULL,
  PRIMARY KEY (`ContentUID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`ContentUID`, `UserUID`, `Author`, `Date`, `Content`) VALUES
(1, 1, 'lolol', '2021-01-20', 'covid is cured!');

-- --------------------------------------------------------

--
-- Table structure for table `donationentry`
--

DROP TABLE IF EXISTS `donationentry`;
CREATE TABLE IF NOT EXISTS `donationentry` (
  `DonationEntryUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` int(11) NOT NULL,
  `HospitalName` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`DonationEntryUID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donationentry`
--

INSERT INTO `donationentry` (`DonationEntryUID`, `UserUID`, `HospitalName`, `Date`, `Description`) VALUES
(1, 1, 'Hospital Ampang', '2021-01-12', 'blablablablackship');

-- --------------------------------------------------------

--
-- Table structure for table `donationhistory`
--

DROP TABLE IF EXISTS `donationhistory`;
CREATE TABLE IF NOT EXISTS `donationhistory` (
  `DonationUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` int(11) NOT NULL,
  `DonatorName` varchar(255) NOT NULL,
  `ICNumber` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DonationDate` date NOT NULL,
  `HospitalName` varchar(255) NOT NULL,
  `PaymentAmount` double NOT NULL,
  `PaymentMethod` varchar(255) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `CVV` int(11) NOT NULL,
  `ExpDate` int(11) NOT NULL,
  PRIMARY KEY (`DonationUID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donationhistory`
--

INSERT INTO `donationhistory` (`DonationUID`, `UserUID`, `DonatorName`, `ICNumber`, `Address`, `Gender`, `DonationDate`, `HospitalName`, `PaymentAmount`, `PaymentMethod`, `CardNumber`, `CVV`, `ExpDate`) VALUES
(1, 2, 'abc', 112233, 'blabla', 'Male', '2021-01-07', 'Hospital Ampang', 100, 'MasterCard', 1122334455, 123, 2155),
(2, 2, 'test ', 246810, 'test', 'Male', '2021-01-19', 'Hospital Ampang', 200, 'Visa', 654952, 666, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hospitalaccount`
--

DROP TABLE IF EXISTS `hospitalaccount`;
CREATE TABLE IF NOT EXISTS `hospitalaccount` (
  `HospitalUID` int(11) NOT NULL AUTO_INCREMENT,
  `HospitalName` varchar(100) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  PRIMARY KEY (`HospitalUID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospitalaccount`
--

INSERT INTO `hospitalaccount` (`HospitalUID`, `HospitalName`, `Username`, `Password`, `ContactNumber`, `Address`) VALUES
(21, 'Gleneagles', 'hos2', 'hos2', '012345676', 'Kuala Lumpur'),
(18, 'Ampang Putera', 'hos1', 'hos1', '123456789', 'Ampang lolol');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

DROP TABLE IF EXISTS `ordertable`;
CREATE TABLE IF NOT EXISTS `ordertable` (
  `OrderUID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductUID` varchar(255) NOT NULL,
  `UserUID` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `Quantity` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `DeliveryStatus` varchar(255) NOT NULL,
  PRIMARY KEY (`OrderUID`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`OrderUID`, `ProductUID`, `UserUID`, `TotalPrice`, `Quantity`, `Date`, `DeliveryStatus`) VALUES
(27, 'Dettol Hand Sanitizer', 2, 15, '1', '2021-01-19', 'Packaging'),
(28, '3M™ N95 Particulate Respirator N95', 2, 20, '1', '2021-01-19', 'Packaging'),
(31, '3 Layer Face Mask,Face Shield', 2, 50, '1,1', '2021-01-29', 'Packaging'),
(30, 'Dettol Hand Sanitizer,3 Layer Face Mask', 2, 35, '1,1', '2021-01-19', 'Packaging');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductUID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDescription` varchar(255) NOT NULL,
  `ProductPrice` int(11) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `StockAvailability` int(11) NOT NULL,
  PRIMARY KEY (`ProductUID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductUID`, `UserUID`, `ProductName`, `ProductDescription`, `ProductPrice`, `ProductImage`, `StockAvailability`) VALUES
(1, 1, '3 Layer Face Mask', 'A box contains 50 pcs of face masks and each of them is constructed with an outer hydrophobic non-woven layer, a middle melt-blown layer, and an inner soft absorbent non-woven layer.', 20, 'facemask.jpg', 3),
(2, 1, 'Dettol Hand Sanitizer', 'Dettol Original Instant Hand Sanitizer kills 99.9% of germs without water. This instant formula is enriched with soothing aloe vera, is rinse free and non-sticky.', 5, 'handsan.jpg', 4),
(3, 1, '3M™ N95 Particulate Respirator N95', 'Two strap design with a comfortable nose clip and advanced electret media help make breathing easier and cooler. With 3M™ Cool Flow™ Exhalation Valve, it reduces heat build-up inside the respirator effectively.', 10, 'n95.jpeg', 5),
(5, 1, 'Face Shield', 'A face shield, an item of personal protective equipment, aims to protect the wearers entire face from hazards such as flying objects and road debris and chemical splashes.', 20, 'faceshield.jpg', 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
