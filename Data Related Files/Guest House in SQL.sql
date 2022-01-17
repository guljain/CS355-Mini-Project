-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2021 at 02:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblab`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accomodation`
--

CREATE TABLE `Accomodation` (
  `AID` varchar(100) DEFAULT NULL,
  `GID` varchar(100) NOT NULL,
  `SID` varchar(100) DEFAULT NULL,
  `accomodationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Accomodation`
--

INSERT INTO `Accomodation` (`AID`, `GID`, `SID`, `accomodationDate`) VALUES
('A6', '1901CS22', 'S4', '2021-11-30'),
('A2', '1901CS28', 'S4', '2021-12-01'),
('A3', '1901EE07', 'S4', '2021-12-02'),
('A1', '1', 'S4', '2021-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `dutySchecule`
--

CREATE TABLE `dutySchecule` (
  `sid` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `wage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dutySchecule`
--

INSERT INTO `dutySchecule` (`sid`, `date`, `wage`) VALUES
('S6', '2021-11-28', 100),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S4', '2021-11-30', 1000),
('S6', '2021-11-28', 100),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S6', '2021-11-28', 100),
('S4', '2021-12-01', 1000),
('S4', '2021-12-02', 1000),
('S6', '2021-11-28', 100),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S6', '2021-11-28', 100),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S4', '2021-11-29', 1000),
('S6', '2021-11-28', 100),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200),
('S6', '2021-11-28', 100),
('S6', '2021-11-28', 100),
('S3', '2021-11-28', 50),
('S1', '2021-11-28', 200);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `gid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phoneNo` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`gid`, `name`, `age`, `phoneNo`, `password`) VALUES
('1', 'ABC', 29, 12345, '123'),
('1901CS22', 'Gul Jain', 20, 85278, '1'),
('1901CS27', 'Ishita Singh', 20, 12345, '1'),
('1901CS28', 'Jenish Monpara', 28, 12345, '1'),
('1901EE07', 'Aditya Samantaroy', 20, 85245, '1'),
('1901ME92', 'Shivanshu Sanjeev', 80, 98157, '1'),
('2', 'Gul Jain', 20, 1234, '1'),
('2020CB34', 'Aditi Goel', 40, 87491, '1');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `fid` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`fid`, `name`, `description`, `price`) VALUES
('F1', 'Pasta', 'Sphagetti with rich tomato aroma and cheese', 300),
('F10', 'Daal Makhni', 'Blend of four lentils in smooth flavoured curry', 200),
('F11', 'Chicken Korma', 'Bonless chicken in curry of cashew amd mild spices', 200),
('F2', 'Vegetarian Tandoori Platter', 'Melenge of exotic vegetable preparation', 395),
('F3', 'Extra Cold Coffee', 'Cold Coffee served with ice-cream', 100),
('F4', 'Thandai', 'Traditional Drink with Aldmond, Saffron, Cardomom in milk', 150),
('F5', 'Egg Sandwich', 'Fresh omlette with buttered bread and chopped vegetables', 40),
('F6', 'Cheese Sandwhich', 'Cheese is sliced onto bread with chopped vegetables', 30),
('F7', 'Coffee', 'Freshly Grounded Hot Coffee', 20),
('F8', 'Pancakes', 'Maple Syruped Pancake', 50),
('F9', 'Butter Chicken', 'Sweet curry with fresh chicken', 200);

-- --------------------------------------------------------

--
-- Table structure for table `optionsA`
--

CREATE TABLE `optionsA` (
  `AID` varchar(100) NOT NULL,
  `carName` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optionsA`
--

INSERT INTO `optionsA` (`AID`, `carName`, `description`, `price`) VALUES
('A1', 'Sedan', 'Car Hire For Outstation', 2000),
('A2', 'SUV', 'Car Hire For Outstation', 3000),
('A3', 'Jeep', 'Car Hire For Outstation', 3000),
('A4', 'Indigo', 'Car Hire For Outstation', 1500),
('A5', 'Taxi', 'Car to railway/bus/airport', 1000),
('A6', 'i10', 'Car to railway/bus/airport', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `optionsR`
--

CREATE TABLE `optionsR` (
  `RID` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optionsR`
--

INSERT INTO `optionsR` (`RID`, `description`, `price`) VALUES
('R1', 'Single Room', 1000),
('R2', 'Double Room', 1500),
('R3', 'King Room', 2000),
('R4', 'Queen Room', 2000),
('R5', 'Twin Room', 2000),
('R6', 'Executive Suite', 2500),
('R7', 'Room for Extended Stay', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `GID` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `totalBill` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`GID`, `date`, `totalBill`) VALUES
('1', '2021-11-28', 18020),
('1901CS22', '2021-11-28', 5270),
('1901CS27', '2021-11-28', 10340),
('1901CS28', '2021-11-28', 7420),
('1901EE07', '2021-11-28', 7660),
('2', '2021-11-28', 3100),
('3', '2021-11-28', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `resourceStatus`
--

CREATE TABLE `resourceStatus` (
  `ID` varchar(100) NOT NULL,
  `Date` date DEFAULT NULL,
  `isAvailable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resourceStatus`
--

INSERT INTO `resourceStatus` (`ID`, `Date`, `isAvailable`) VALUES
('R1', '2021-11-28', 0),
('R1', '2021-11-29', 0),
('R1', '2021-11-30', 0),
('A6', '2021-11-30', 0),
('R4', '2021-11-29', 0),
('R4', '2021-11-30', 0),
('R4', '2021-12-01', 0),
('R4', '2021-12-02', 0),
('R4', '2021-12-03', 0),
('R3', '2021-11-29', 0),
('A2', '2021-12-01', 0),
('A3', '2021-12-02', 0),
('R3', '2021-11-30', 0),
('R3', '2021-12-01', 0),
('R6', '2021-11-28', 0),
('R6', '2021-11-29', 0),
('R6', '2021-11-30', 0),
('R6', '2021-12-01', 0),
('R6', '2021-12-02', 0),
('R6', '2021-12-03', 0),
('A1', '2021-11-29', 0),
('R2', '2021-11-28', 0),
('R2', '2021-11-29', 0),
('R2', '2021-11-30', 0),
('R2', '2021-12-01', 0),
('R5', '2021-11-28', 0),
('R5', '2021-11-29', 0),
('R7', '2021-11-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `gid` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`gid`, `date`, `bill`) VALUES
('1901CS22', '2021-11-28', 520),
('1901CS22', '2021-11-28', 150),
('1901CS27', '2021-11-28', 340),
('1901CS28', '2021-11-28', 920),
('1901CS28', '2021-11-28', 1500),
('1901EE07', '2021-11-28', 60),
('1901EE07', '2021-11-28', 300),
('1901EE07', '2021-11-28', 300),
('1', '2021-11-28', 510),
('1', '2021-11-28', 510),
('1901CS22', '2021-11-28', 100),
('2', '2021-11-28', 100);

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `RID` varchar(100) DEFAULT NULL,
  `GID` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`RID`, `GID`, `date`, `bill`) VALUES
('R1', '1901CS22', '2021-11-28', 3000),
('R4', '1901CS27', '2021-11-28', 10000),
('R3', '1901CS28', '2021-11-28', 2000),
('R3', '1901EE07', '2021-11-28', 4000),
('R6', '1', '2021-11-28', 15000),
('R7', '2', '2021-11-28', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `SID` varchar(100) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `PhoneNo` int(11) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `Role` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`SID`, `Name`, `Age`, `PhoneNo`, `Department`, `Role`, `password`) VALUES
('S1', 'Manjul Bamrara', 25, 14134, 'Restaurant', 'Head Chef', '1'),
('S2', 'Adarsh Shrivastava', 23, 34313, 'Restaurnt', 'Restaurant General Manager', '1'),
('S3', 'Aman Madame', 23, 52513, 'Hotel', 'Room Service', '1'),
('S4', 'Akshat Porwal', 32, 46242, 'Accomodation', 'Driver', '1'),
('S5', 'Aarooj Yashin', 32, 12133, 'Hotel', 'Manager', '1'),
('S6', 'Priyaansi Singh', 25, 12341, 'Hotel', 'House Cleaning', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `optionsA`
--
ALTER TABLE `optionsA`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `optionsR`
--
ALTER TABLE `optionsR`
  ADD PRIMARY KEY (`RID`),
  ADD KEY `RID` (`RID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`GID`),
  ADD KEY `GID` (`GID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `SID` (`SID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
