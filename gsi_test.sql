-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 11:53 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsi_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `AccountID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Street` varchar(150) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(2) NOT NULL,
  `ZIP` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `Username`, `Password`, `FirstName`, `LastName`, `Street`, `City`, `State`, `ZIP`) VALUES
(5, 'm', '$2y$10$vWftiuvDwvXUx35IArXbyeM9fTyoGXZq.FjnmLxobxt', 'Michael', 'Narine', '1357 Cascade View Dr', 'Grayson', 'GA', '30017'),
(6, 'x', 'x', 'Michael', 'Narine', '1357 Cascade View Dr', 'Grayson', 'GA', '30017'),
(7, 'test', 'test', 'Michael', 'Narine', '1357 Cascade View Dr', 'Grayson', 'GA', '30017');

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `AssetID` int(11) NOT NULL,
  `AssetType` varchar(20) NOT NULL,
  `Value` double NOT NULL,
  `Date` date NOT NULL,
  `Prev` int(11) DEFAULT NULL,
  `Next` int(11) DEFAULT NULL,
  `AccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`AssetID`, `AssetType`, `Value`, `Date`, `Prev`, `Next`, `AccountID`) VALUES
(4, 'Vehicle', 12, '2001-12-12', 0, 0, 0),
(5, 'Home', 1520, '2015-05-09', 0, 0, 0),
(6, 'Business', 846321, '2011-11-11', 0, 0, 0),
(7, 'Home', 123, '2013-12-31', 0, 0, 0),
(8, 'Vehicle', 8965, '2013-05-06', 0, 0, 7),
(9, 'Business', 65132, '2014-11-30', 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE `claim` (
  `ClaimID` int(11) NOT NULL,
  `ClaimType` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `LocationX` double NOT NULL,
  `LocationY` double NOT NULL,
  `Description` varchar(256) NOT NULL,
  `AccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`ClaimID`, `ClaimType`, `Date`, `LocationX`, `LocationY`, `Description`, `AccountID`) VALUES
(1, 'Vehicle', '2018-07-04', 561.25, 351.15, 'dfxgchvj', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `Value` double NOT NULL,
  `DueDate` date NOT NULL,
  `IsPaid` tinyint(1) NOT NULL,
  `AccountID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `PolicyNumber` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `PolicyType` varchar(20) NOT NULL,
  `Asset1` int(11) NOT NULL,
  `Asset2` int(11) NOT NULL,
  `Asset3` int(11) NOT NULL,
  `LatestPayment` int(11) NOT NULL,
  `LatestClaim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`AssetID`);

--
-- Indexes for table `claim`
--
ALTER TABLE `claim`
  ADD PRIMARY KEY (`ClaimID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`PolicyNumber`),
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `Asset1` (`Asset1`),
  ADD KEY `Asset2` (`Asset2`),
  ADD KEY `Asset3` (`Asset3`),
  ADD KEY `LatestPayment` (`LatestPayment`),
  ADD KEY `LatestClaim` (`LatestClaim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `claim`
--
ALTER TABLE `claim`
  MODIFY `ClaimID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `PolicyNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`),
  ADD CONSTRAINT `policy_ibfk_2` FOREIGN KEY (`Asset1`) REFERENCES `asset` (`AssetID`),
  ADD CONSTRAINT `policy_ibfk_3` FOREIGN KEY (`Asset2`) REFERENCES `asset` (`AssetID`),
  ADD CONSTRAINT `policy_ibfk_4` FOREIGN KEY (`Asset3`) REFERENCES `asset` (`AssetID`),
  ADD CONSTRAINT `policy_ibfk_5` FOREIGN KEY (`LatestPayment`) REFERENCES `payment` (`PaymentID`),
  ADD CONSTRAINT `policy_ibfk_6` FOREIGN KEY (`LatestClaim`) REFERENCES `claim` (`ClaimID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
