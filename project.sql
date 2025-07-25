-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2024 at 01:02 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `a_ID` int NOT NULL AUTO_INCREMENT,
  `a_Email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_FirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_LastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_PhoneNumber` int NOT NULL,
  `a_Gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_DOB` date NOT NULL,
  `a_Address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_UserPassword` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `a_LastLogin` datetime DEFAULT NULL,
  `a_StartingDate` date NOT NULL,
  PRIMARY KEY (`a_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_ID`, `a_Email`, `a_FirstName`, `a_LastName`, `a_PhoneNumber`, `a_Gender`, `a_DOB`, `a_Address`, `a_UserPassword`, `a_LastLogin`, `a_StartingDate`) VALUES
(1, 'aliibrahimaigamer10@gmail.com', 'Ali', 'Ibrahim', 3678234, 'male', '2004-08-14', 'lebanon', 'ali@123', '2024-08-27 15:49:50', '2024-08-27'),
(1001, 'karen@gmail.com', 'karen', 'serhal', 70567549, 'female', '2005-08-02', 'lebanon', 'karen@123', NULL, '2024-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

DROP TABLE IF EXISTS `cartitems`;
CREATE TABLE IF NOT EXISTS `cartitems` (
  `cart_ID` int NOT NULL,
  `i_ID` int NOT NULL,
  `quantityAdded` int NOT NULL,
  `AddedDate` datetime NOT NULL,
  PRIMARY KEY (`cart_ID`,`i_ID`),
  KEY `cartitems_ibfk_2` (`i_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_ID` int NOT NULL AUTO_INCREMENT,
  `cartCreationDate` datetime NOT NULL,
  `c_ID` int NOT NULL,
  PRIMARY KEY (`cart_ID`),
  KEY `carts_ibfk_1` (`c_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_ID`, `cartCreationDate`, `c_ID`) VALUES
(3, '2024-08-27 15:06:46', 1007);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `c_ID` int NOT NULL AUTO_INCREMENT,
  `c_Email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_FirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_LastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_PhoneNumber` int NOT NULL,
  `c_Gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_DOB` date NOT NULL,
  `c_Address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_UserPassword` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `c_LastLogin` datetime DEFAULT NULL,
  `c_RegistrationDate` datetime NOT NULL,
  `c_Balance` int NOT NULL,
  PRIMARY KEY (`c_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`c_ID`, `c_Email`, `c_FirstName`, `c_LastName`, `c_PhoneNumber`, `c_Gender`, `c_DOB`, `c_Address`, `c_UserPassword`, `c_LastLogin`, `c_RegistrationDate`, `c_Balance`) VALUES
(1007, 'adriana.tarhini@gmail.com', 'Adriana ', 'tarhini', 3938793, 'female', '2003-02-12', 'beirut', 'adriana@123', '2024-08-27 14:23:44', '2024-08-27 14:23:44', 174);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `i_ID` int NOT NULL AUTO_INCREMENT,
  `iName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iType` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iDescription` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iPrice` double NOT NULL,
  `iExpDate` date DEFAULT NULL,
  `item_image_src` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iQuantityInStock` int NOT NULL,
  `Quantitysold` int NOT NULL,
  PRIMARY KEY (`i_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`i_ID`, `iName`, `iType`, `iDescription`, `iPrice`, `iExpDate`, `item_image_src`, `iQuantityInStock`, `Quantitysold`) VALUES
(21, 'Dumbells 10 kg', 'Equipment', '2 pieces 5kg each', 13, '0000-00-00', 'ItemImage/10kg.jpg', 28, 2),
(22, 'Tredmill', 'Equipment', 'a walking machine that supports up to 100kg', 200, '0000-00-00', 'ItemImage/tradmill2.jpg', 20, 0),
(23, 'Tredmill', 'Equipment', 'a walking machine that supports up to 150kg', 300, '0000-00-00', 'ItemImage/tredmill.jpg', 20, 0),
(24, 'Creatine 80 scoops', 'Supplements', 'increase strength, improve performance and help keep their minds sharp.', 20, '2027-08-27', 'ItemImage/images.jpg', 50, 0),
(26, 'Whey protein 73 scoops', 'Supplements', 'a premium protein derived from cows milk rich in beneficial amino acids', 45, '2027-08-27', 'ItemImage/Wheyprotein.jpg', 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `modifiesitems`
--

DROP TABLE IF EXISTS `modifiesitems`;
CREATE TABLE IF NOT EXISTS `modifiesitems` (
  `Modification_ID` int NOT NULL AUTO_INCREMENT,
  `a_ID` int NOT NULL,
  `i_ID` int DEFAULT NULL,
  `changes` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Modificationtime` datetime NOT NULL,
  PRIMARY KEY (`Modification_ID`),
  KEY `a_ID` (`a_ID`),
  KEY `i_ID` (`i_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modifiesitems`
--

INSERT INTO `modifiesitems` (`Modification_ID`, `a_ID`, `i_ID`, `changes`, `Modificationtime`) VALUES
(1, 1, 21, 'ADDED 21', '2024-08-27 11:55:04'),
(2, 1, 22, 'ADDED 22', '2024-08-27 11:56:20'),
(3, 1, 23, 'ADDED 23', '2024-08-27 11:56:46'),
(4, 1, 24, 'ADDED 24', '2024-08-27 11:59:40'),
(5, 1, NULL, 'ADDED 25', '2024-08-27 12:01:57'),
(6, 1, NULL, 'DELETED 25 ', '2024-08-27 15:02:10'),
(7, 1, 26, 'ADDED 26', '2024-08-27 12:02:41'),
(8, 1, 26, '26 edit: item_image_src: Old Value = ItemImage/whe', '2024-08-27 15:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `o_ID` int NOT NULL,
  `i_ID` int NOT NULL,
  `itemQuantity` int NOT NULL,
  `priceAtPurchase` double NOT NULL,
  PRIMARY KEY (`o_ID`,`i_ID`),
  KEY `i_ID` (`i_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`o_ID`, `i_ID`, `itemQuantity`, `priceAtPurchase`) VALUES
(17, 21, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `o_ID` int NOT NULL AUTO_INCREMENT,
  `oDateTime` datetime NOT NULL,
  `oAmmount` double NOT NULL,
  `oStatus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `c_ID` int NOT NULL,
  `cart_ID` int DEFAULT NULL,
  `a_ID` int DEFAULT NULL,
  PRIMARY KEY (`o_ID`),
  KEY `orders_ibfk_1` (`cart_ID`),
  KEY `orders_ibfk_2` (`a_ID`),
  KEY `c_ID` (`c_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_ID`, `oDateTime`, `oAmmount`, `oStatus`, `c_ID`, `cart_ID`, `a_ID`) VALUES
(17, '2024-08-27 12:08:27', 26, 'pending', 1007, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pbceditedbyadmin`
--

DROP TABLE IF EXISTS `pbceditedbyadmin`;
CREATE TABLE IF NOT EXISTS `pbceditedbyadmin` (
  `Edit_ID` int NOT NULL AUTO_INCREMENT,
  `a_ID` int NOT NULL,
  `pbC_ID` double NOT NULL,
  `EditChange` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `EditDate` datetime NOT NULL,
  PRIMARY KEY (`Edit_ID`),
  KEY `a_ID` (`a_ID`),
  KEY `pbceditedbyadmin_ibfk_2` (`pbC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pbceditedbyadmin`
--

INSERT INTO `pbceditedbyadmin` (`Edit_ID`, `a_ID`, `pbC_ID`, `EditChange`, `EditDate`) VALUES
(1, 1, 1.1, 'Added the session', '2024-08-27 14:47:54'),
(2, 1, 2.1, 'Added the session', '2024-08-27 15:51:08'),
(3, 1, 4.1, 'Added the session', '2024-08-27 15:51:43'),
(4, 1, 3.2, 'Added the session', '2024-08-27 15:52:45'),
(5, 1, 1.2, 'Added the session', '2024-08-27 15:53:09'),
(6, 1, 5.1, 'Added the session', '2024-08-27 15:54:52'),
(7, 1, 2.4, 'Added the session', '2024-08-27 15:56:52'),
(8, 1, 4.3, 'Added the session', '2024-08-27 15:58:26'),
(9, 1, 3.5, 'Added the session', '2024-08-27 15:59:14'),
(10, 1, 5.6, 'Added the session', '2024-08-27 16:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `pbcregistrations`
--

DROP TABLE IF EXISTS `pbcregistrations`;
CREATE TABLE IF NOT EXISTS `pbcregistrations` (
  `c_ID` int NOT NULL,
  `pbC_ID` double NOT NULL,
  `pbCRegistrationDate` datetime NOT NULL,
  PRIMARY KEY (`c_ID`,`pbC_ID`),
  KEY `pbcregistrations_ibfk_2` (`pbC_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pbcregistrations`
--

INSERT INTO `pbcregistrations` (`c_ID`, `pbC_ID`, `pbCRegistrationDate`) VALUES
(1007, 1.1, '2024-08-27 14:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `privateclasses`
--

DROP TABLE IF EXISTS `privateclasses`;
CREATE TABLE IF NOT EXISTS `privateclasses` (
  `prvC_ID` double NOT NULL,
  `prvCName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prvCStatus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Available',
  `prvCRoomNum` int DEFAULT NULL,
  `prvCDuration` int DEFAULT NULL,
  `prvCPrice` double DEFAULT NULL,
  `c_ID` int DEFAULT NULL,
  `prvCRegistrationDate` datetime DEFAULT NULL,
  `t_ID` int NOT NULL,
  PRIMARY KEY (`prvC_ID`,`t_ID`),
  KEY `privateclasses_ibfk_1` (`c_ID`),
  KEY `privateclasses_ibfk_2` (`t_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privateclasses`
--

INSERT INTO `privateclasses` (`prvC_ID`, `prvCName`, `prvCStatus`, `prvCRoomNum`, `prvCDuration`, `prvCPrice`, `c_ID`, `prvCRegistrationDate`, `t_ID`) VALUES
(1.1, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(1.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(1.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(1.1, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(1.1, 'crossfit', 'Booked', 21, 90, 25, NULL, NULL, 18),
(1.2, 'pilates', 'Booked', 17, 90, 40, NULL, NULL, 14),
(1.2, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(1.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(1.2, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(1.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(1.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(1.3, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(1.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(1.3, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(1.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(1.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(1.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(1.4, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(1.4, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(1.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(1.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(1.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(1.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(1.5, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(1.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(1.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(1.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(1.6, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(1.6, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(1.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(2.1, 'pilates', 'Booked', 17, 90, 40, NULL, NULL, 14),
(2.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(2.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(2.1, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(2.1, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(2.2, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(2.2, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(2.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(2.2, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(2.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(2.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(2.3, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(2.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(2.3, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(2.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(2.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(2.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(2.4, 'zumba', 'Booked', 15, 90, 25, NULL, NULL, 16),
(2.4, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(2.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(2.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(2.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(2.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(2.5, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(2.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(2.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(2.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(2.6, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(2.6, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(2.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(3.1, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(3.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(3.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(3.1, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(3.1, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(3.2, 'pilates', 'Booked', 17, 90, 40, NULL, NULL, 14),
(3.2, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(3.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(3.2, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(3.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(3.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(3.3, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(3.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(3.3, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(3.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(3.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(3.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(3.4, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(3.4, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(3.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(3.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(3.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(3.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(3.5, 'resistance', 'Booked', 16, 90, 30, NULL, NULL, 17),
(3.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(3.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(3.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(3.6, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(3.6, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(3.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(4.1, 'pilates', 'Booked', 17, 90, 40, NULL, NULL, 14),
(4.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(4.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(4.1, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(4.1, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(4.2, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(4.2, 'resistance', 'Booked', 18, 90, 30, 1007, '2024-08-27 14:44:49', 15),
(4.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(4.2, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(4.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(4.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(4.3, 'resistance', 'Booked', 18, 90, 30, NULL, NULL, 15),
(4.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(4.3, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(4.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(4.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(4.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(4.4, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(4.4, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(4.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(4.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(4.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(4.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(4.5, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(4.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(4.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(4.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(4.6, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(4.6, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(4.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(5.1, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(5.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(5.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(5.1, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(5.1, 'crossfit', 'Booked', 21, 90, 25, NULL, NULL, 18),
(5.2, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(5.2, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(5.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(5.2, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(5.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(5.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(5.3, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(5.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(5.3, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(5.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(5.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(5.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(5.4, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(5.4, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(5.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(5.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(5.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(5.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(5.5, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(5.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(5.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(5.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(5.6, 'zumba', 'Booked', 15, 90, 25, NULL, NULL, 16),
(5.6, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(5.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(6.1, 'pilates', 'Booked', 17, 90, 40, 1007, '2024-08-27 14:52:05', 14),
(6.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(6.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(6.1, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(6.1, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(6.2, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(6.2, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(6.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(6.2, 'resistance', 'Available', 16, 90, 30, NULL, NULL, 17),
(6.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(6.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(6.3, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(6.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(6.3, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(6.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(6.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(6.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(6.4, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(6.4, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(6.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(6.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(6.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(6.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(6.5, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(6.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(6.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(6.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(6.6, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(6.6, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(6.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(7.1, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(7.1, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(7.1, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(7.1, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(7.1, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(7.2, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(7.2, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(7.2, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(7.2, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(7.2, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(7.3, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(7.3, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(7.3, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(7.3, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(7.3, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(7.4, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(7.4, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(7.4, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(7.4, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(7.4, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(7.5, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(7.5, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(7.5, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(7.5, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(7.5, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18),
(7.6, 'pilates', 'Available', 17, 90, 40, NULL, NULL, 14),
(7.6, 'resistance', 'Available', 18, 90, 30, NULL, NULL, 15),
(7.6, 'zumba', 'Available', 15, 90, 25, NULL, NULL, 16),
(7.6, 'resistance', 'NOT AVAILABLE', 16, 90, 30, NULL, NULL, 17),
(7.6, 'crossfit', 'Available', 21, 90, 25, NULL, NULL, 18);

-- --------------------------------------------------------

--
-- Table structure for table `publicclasses`
--

DROP TABLE IF EXISTS `publicclasses`;
CREATE TABLE IF NOT EXISTS `publicclasses` (
  `pbC_ID` double NOT NULL,
  `pbCName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pbCStatus` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'nosession',
  `pbCDuration` int DEFAULT NULL,
  `pbCRoomNum` int DEFAULT NULL,
  `pbCPrice` double DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `t_ID` int DEFAULT NULL,
  PRIMARY KEY (`pbC_ID`),
  KEY `publicclasses_ibfk_1` (`t_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publicclasses`
--

INSERT INTO `publicclasses` (`pbC_ID`, `pbCName`, `pbCStatus`, `pbCDuration`, `pbCRoomNum`, `pbCPrice`, `capacity`, `t_ID`) VALUES
(1.1, 'crossfit', 'exists', 90, 1, 35, 10, 18),
(1.2, 'pilates', 'exists', 120, 4, 35, 10, 14),
(1.3, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(1.4, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(1.5, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(1.6, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(2.1, 'pilates', 'exists', 120, 2, 35, 15, 14),
(2.2, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(2.3, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(2.4, 'zumba', 'exists', 60, 3, 20, 20, 16),
(2.5, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(2.6, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(3.1, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(3.2, 'pilates', 'exists', 120, 4, 35, 10, 14),
(3.3, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(3.4, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(3.5, 'resistance', 'exists', 120, 3, 15, 10, 17),
(3.6, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(4.1, 'pilates', 'exists', 120, 2, 35, 15, 14),
(4.2, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(4.3, 'resistance', 'exists', 120, 3, 15, 10, 15),
(4.4, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(4.5, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(4.6, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(5.1, 'crossfit', 'exists', 90, 5, 20, 10, 18),
(5.2, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(5.3, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(5.4, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(5.5, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(5.6, 'zumba', 'exists', 60, 4, 15, 20, 16),
(6.1, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(6.2, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(6.3, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(6.4, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(6.5, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(6.6, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(7.1, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(7.2, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(7.3, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(7.4, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(7.5, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL),
(7.6, NULL, 'nosession', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratingitems`
--

DROP TABLE IF EXISTS `ratingitems`;
CREATE TABLE IF NOT EXISTS `ratingitems` (
  `c_ID` int NOT NULL,
  `i_ID` int NOT NULL,
  `iRating` int NOT NULL,
  `iRatingDateTime` datetime NOT NULL,
  PRIMARY KEY (`c_ID`,`i_ID`),
  KEY `ratingitems_ibfk_2` (`i_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratingtrainers`
--

DROP TABLE IF EXISTS `ratingtrainers`;
CREATE TABLE IF NOT EXISTS `ratingtrainers` (
  `c_ID` int NOT NULL,
  `t_ID` int NOT NULL,
  `tRating` int NOT NULL,
  `tRatingDateTime` datetime NOT NULL,
  PRIMARY KEY (`t_ID`,`c_ID`),
  KEY `ratingtrainers_ibfk_1` (`c_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratingtrainers`
--

INSERT INTO `ratingtrainers` (`c_ID`, `t_ID`, `tRating`, `tRatingDateTime`) VALUES
(1007, 15, 5, '2024-08-27 14:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

DROP TABLE IF EXISTS `trainers`;
CREATE TABLE IF NOT EXISTS `trainers` (
  `t_ID` int NOT NULL AUTO_INCREMENT,
  `t_Email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_FirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_LastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_PhoneNumber` int NOT NULL,
  `t_Gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_DOB` date NOT NULL,
  `t_Address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_Speciality` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_UserPassword` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_LastLogin` datetime NOT NULL,
  `t_StartingDate` date NOT NULL,
  PRIMARY KEY (`t_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`t_ID`, `t_Email`, `t_FirstName`, `t_LastName`, `t_PhoneNumber`, `t_Gender`, `t_DOB`, `t_Address`, `t_Speciality`, `t_UserPassword`, `t_LastLogin`, `t_StartingDate`) VALUES
(14, 'nicole.ibrahim@gmail.com', 'Nicole', 'Ibrahim', 3938793, 'Female', '2000-06-27', 'Damour', 'pilates', 'nicole@123', '0000-00-00 00:00:00', '2024-08-27'),
(15, 'pierre.dalati@gmail.com', 'Pierre', 'Dalati', 5800623, 'Male', '2024-08-27', 'Jieh', 'resistance', 'pierre@123', '0000-00-00 00:00:00', '2024-08-27'),
(16, 'rick.assaad@gmail.com', 'Rick', 'Assaad', 3938793, 'Male', '2024-08-27', 'hamra', 'zumba', 'ali@123', '0000-00-00 00:00:00', '2024-08-27'),
(17, 'pamela.reif@gmail.com', 'Pamela', 'Reif', 5800623, 'Female', '2001-02-08', 'Beirut', 'resistance', 'pamela@123', '0000-00-00 00:00:00', '2024-08-27'),
(18, 'kate.musi@gmail.com', 'Kate', 'Musni', 5800623, 'Female', '2024-08-27', 'Beirut', 'crossfit', 'kate@123', '0000-00-00 00:00:00', '2024-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

DROP TABLE IF EXISTS `workouts`;
CREATE TABLE IF NOT EXISTS `workouts` (
  `w_ID` int NOT NULL AUTO_INCREMENT,
  `wName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wDescription` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `wSource` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `t_ID` int NOT NULL,
  PRIMARY KEY (`w_ID`),
  KEY `workouts_ibfk_1` (`t_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD CONSTRAINT `cartitems_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `carts` (`cart_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cartitems_ibfk_2` FOREIGN KEY (`i_ID`) REFERENCES `items` (`i_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `clients` (`c_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modifiesitems`
--
ALTER TABLE `modifiesitems`
  ADD CONSTRAINT `modifiesitems_ibfk_1` FOREIGN KEY (`a_ID`) REFERENCES `admins` (`a_ID`),
  ADD CONSTRAINT `modifiesitems_ibfk_2` FOREIGN KEY (`i_ID`) REFERENCES `items` (`i_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `i_ID` FOREIGN KEY (`i_ID`) REFERENCES `items` (`i_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `o_ID` FOREIGN KEY (`o_ID`) REFERENCES `orders` (`o_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cart_ID`) REFERENCES `carts` (`cart_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`a_ID`) REFERENCES `admins` (`a_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`c_ID`) REFERENCES `clients` (`c_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pbceditedbyadmin`
--
ALTER TABLE `pbceditedbyadmin`
  ADD CONSTRAINT `pbceditedbyadmin_ibfk_1` FOREIGN KEY (`a_ID`) REFERENCES `admins` (`a_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pbceditedbyadmin_ibfk_2` FOREIGN KEY (`pbC_ID`) REFERENCES `publicclasses` (`pbC_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pbcregistrations`
--
ALTER TABLE `pbcregistrations`
  ADD CONSTRAINT `pbcregistrations_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `clients` (`c_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pbcregistrations_ibfk_2` FOREIGN KEY (`pbC_ID`) REFERENCES `publicclasses` (`pbC_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `privateclasses`
--
ALTER TABLE `privateclasses`
  ADD CONSTRAINT `privateclasses_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `clients` (`c_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `privateclasses_ibfk_2` FOREIGN KEY (`t_ID`) REFERENCES `trainers` (`t_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publicclasses`
--
ALTER TABLE `publicclasses`
  ADD CONSTRAINT `publicclasses_ibfk_1` FOREIGN KEY (`t_ID`) REFERENCES `trainers` (`t_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratingitems`
--
ALTER TABLE `ratingitems`
  ADD CONSTRAINT `ratingitems_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `clients` (`c_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratingitems_ibfk_2` FOREIGN KEY (`i_ID`) REFERENCES `items` (`i_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratingtrainers`
--
ALTER TABLE `ratingtrainers`
  ADD CONSTRAINT `ratingtrainers_ibfk_1` FOREIGN KEY (`c_ID`) REFERENCES `clients` (`c_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratingtrainers_ibfk_2` FOREIGN KEY (`t_ID`) REFERENCES `trainers` (`t_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`t_ID`) REFERENCES `trainers` (`t_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
