-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 29, 2022 at 05:02 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookreqtbl`
--

DROP TABLE IF EXISTS `bookreqtbl`;
CREATE TABLE IF NOT EXISTS `bookreqtbl` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `BookingID` int(100) NOT NULL,
  `ServiceID` int(100) NOT NULL,
  `Requirement` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ServiceID` (`ServiceID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `bookreqtbl`
--

INSERT INTO `bookreqtbl` (`ID`, `BookingID`, `ServiceID`, `Requirement`) VALUES
(1, 347194934, 9, 'Mike set '),
(2, 347194934, 9, 'dj lights ');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Test', 'admin', 5689784589, 'admin@gmail.com', 'Test@123', '2020-01-21 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

DROP TABLE IF EXISTS `tblbooking`;
CREATE TABLE IF NOT EXISTS `tblbooking` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `BookingID` int(10) DEFAULT NULL,
  `ServiceID` int(10) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `EventDate` varchar(200) DEFAULT NULL,
  `EventStartingtime` varchar(200) DEFAULT NULL,
  `EventEndingtime` varchar(200) DEFAULT NULL,
  `VenueAddress` mediumtext,
  `EventType` varchar(200) DEFAULT NULL,
  `AdditionalInformation` varchar(100) DEFAULT NULL,
  `ReqPrice` int(100) DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ServiceID` (`ServiceID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `BookingID`, `ServiceID`, `Name`, `MobileNumber`, `Email`, `EventDate`, `EventStartingtime`, `EventEndingtime`, `VenueAddress`, `EventType`, `AdditionalInformation`, `ReqPrice`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(44, 347194934, 9, 'aiswarya', 12345678, 'aiswarya@gmail.com', '2022-12-08', '11 a.m', '12 p.m', 'MCA LAB', 'Cultural Events', NULL, NULL, '2022-11-30 16:01:49', 'approved', 'Approved', '2022-11-30 16:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbleventtype`
--

DROP TABLE IF EXISTS `tbleventtype`;
CREATE TABLE IF NOT EXISTS `tbleventtype` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `EventType` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `EventType` (`EventType`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbleventtype`
--

INSERT INTO `tbleventtype` (`ID`, `EventType`, `CreationDate`) VALUES
(1, 'Model Examination', '2020-01-22 07:01:39'),
(2, 'Placement Examination', '2020-01-22 07:02:34'),
(3, 'Cultural Events', '2020-01-22 07:02:43'),
(4, 'Semester Examination', '2020-01-22 07:03:00'),
(5, 'Club Activity', '2020-01-22 07:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PageType` varchar(100) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'about', 'About Us', '<h2>The College Amenity Booking System</h2>\r\n<p>The College Amenity Booking System is an application that\r\nis used for booking labs, seminar halls and other amenities in an organization\r\nfor a user. They help to avoid collision regarding the booking of amenities.\r\nThey help to provide a systematic approach in managing the booking of\r\namenities. </p>\r\n<p>Users can select the necessary amenities that he or she needed and\r\ncan add necessary requirements that are needed to conduct their programs. Once,\r\nthe booking is approved by the admin they can view the report and detailed\r\ninvoice regarding the booking that they have made.</p>\r\n\r\n', NULL, NULL, '2022-12-27 15:47:49'),
(2, 'contactus', 'Contact Us', 'kerala,India', 'info@gmail.com', 1234567890, '2022-11-04 15:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequirement`
--

DROP TABLE IF EXISTS `tblrequirement`;
CREATE TABLE IF NOT EXISTS `tblrequirement` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Requirement` varchar(120) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ReqPrice` int(100) NOT NULL,
  `CreationDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`ID`),
  KEY `Requirement` (`Requirement`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `tblrequirement`
--

INSERT INTO `tblrequirement` (`ID`, `Requirement`, `ReqPrice`, `CreationDate`) VALUES
(1, 'Mike set', 100, '2022-11-10 08:31:41.961810'),
(2, 'dj lights', 200, '2022-11-10 08:32:18.925990');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

DROP TABLE IF EXISTS `tblservice`;
CREATE TABLE IF NOT EXISTS `tblservice` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(200) DEFAULT NULL,
  `SerDes` varchar(250) NOT NULL,
  `ServicePrice` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservice`
--

INSERT INTO `tblservice` (`ID`, `ServiceName`, `SerDes`, `ServicePrice`, `CreationDate`) VALUES
(15, 'MCA LAB', 'Well equipped computer labs with latest software installed and can be used for examinations', NULL, '2022-12-27 15:59:15'),
(17, 'MBA HALL', 'Seminar hall with high quality equipments to make your presentation more interactive and can hold upto more than 100 people at a time', NULL, '2022-12-27 16:00:49'),
(18, 'SEMINNAR HALL', 'Seminar hall with high quality equipments to make your presentation more interactive and can hold upto more than 100 people at a time\r\n\r\n', NULL, '2022-12-27 16:07:37'),
(19, 'MBA LAB', 'Well equipped computer labs with latest software installed and can be used for examinations\r\n\r\n', NULL, '2022-12-27 16:08:08'),
(20, 'MCA HALL', 'Seminar hall with high quality equipments to make your presentation more interactive and can hold upto more than 100 people at a time\r\n\r\n', NULL, '2022-12-27 16:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext,
  `MsgDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `Name`, `MobileNumber`, `Email`, `Message`, `MsgDate`, `IsRead`) VALUES
(1, 'Test', 7887878787, 'test@gmail.com', 'Hello', '2020-01-24 07:00:34', 1),
(3, 'Test', 7654659878, 'test@gmail.com', 'Sample test.', '2020-01-29 06:05:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `UserRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=hp8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `UserRegdate`) VALUES
(1, 'User', 'Test', 123456789, 'test@gmail.com', 'test', '2022-10-24 06:58:46'),
(2, 'User', 'aiswarya', 12345678, 'aiswarya@gmail.com', 'test', '2022-11-05 01:24:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
