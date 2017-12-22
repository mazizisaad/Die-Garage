-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2017 at 12:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diegarage`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(11) NOT NULL,
  `addressLine1` varchar(255) NOT NULL,
  `addressLine2` varchar(255) NOT NULL,
  `addressCity` varchar(255) NOT NULL,
  `addressPostcode` varchar(255) NOT NULL,
  `addressState` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `addressLine1`, `addressLine2`, `addressCity`, `addressPostcode`, `addressState`, `userID`) VALUES
(6, 'D2303 Kolej Delima 2', 'Universiti Teknologi MARA Shah Alam', 'Shah Alam', '40450', 'Selangor', '950917026405');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `carID` varchar(255) NOT NULL,
  `carRegistrationDate` varchar(255) NOT NULL,
  `carType` varchar(255) NOT NULL,
  `carEngineNo` varchar(255) NOT NULL,
  `carCasisNo` varchar(255) NOT NULL,
  `carManufacturer` varchar(255) NOT NULL,
  `carManufacturingYear` varchar(255) NOT NULL,
  `carModelName` varchar(255) NOT NULL,
  `carEngineCapacity` varchar(255) NOT NULL,
  `carFuel` varchar(255) NOT NULL,
  `carColor` varchar(255) NOT NULL,
  `carCapacity` varchar(255) NOT NULL,
  `carTransmission` varchar(255) NOT NULL,
  `carCondition` varchar(255) NOT NULL,
  `carStatus` varchar(255) NOT NULL,
  `carInsuranceID` varchar(255) NOT NULL,
  `carServiceID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`carID`, `carRegistrationDate`, `carType`, `carEngineNo`, `carCasisNo`, `carManufacturer`, `carManufacturingYear`, `carModelName`, `carEngineCapacity`, `carFuel`, `carColor`, `carCapacity`, `carTransmission`, `carCondition`, `carStatus`, `carInsuranceID`, `carServiceID`, `userID`) VALUES
('G1M 4444', '29/02/2016', 'Hatchback', '265479853SDF152', '265479853SDF111', 'Produa', '2016', 'Myvi GearUp', '2.3', 'Petrol', 'Maroon', '5', 'Automatic', 'Excellent', 'Not Available', 'G1M 4444265479853SDF152', 'G1M 4444950917026405', '950917026405');

-- --------------------------------------------------------

--
-- Table structure for table `carpicture`
--

CREATE TABLE `carpicture` (
  `carPicID` int(11) NOT NULL,
  `carID` varchar(255) NOT NULL,
  `carPicName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(11) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactEmail` varchar(255) NOT NULL,
  `contactPhone` varchar(255) NOT NULL,
  `contactComment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `insuranceID` varchar(255) NOT NULL,
  `insuranceProvider` varchar(255) NOT NULL,
  `insuranceTel` varchar(255) NOT NULL,
  `insuranceRenewDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`insuranceID`, `insuranceProvider`, `insuranceTel`, `insuranceRenewDate`) VALUES
('G1M 4444265479853SDF152', 'MAA Insurance', '049558312', '28/02/2018');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `licenseID` varchar(255) NOT NULL,
  `licenseExpDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`licenseID`, `licenseExpDate`) VALUES
('156498723DF4582', '17/09/2018');

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `userID` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`userID`, `userEmail`, `userPassword`) VALUES
('950917026405', 'muhammadazizisaad95@gmail.com', 'x5MgtRoqngWjc');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `paymentDate` varchar(255) NOT NULL,
  `paymentEmail` varchar(255) NOT NULL,
  `paymentName` varchar(255) NOT NULL,
  `paymentIssuer` varchar(255) NOT NULL,
  `paymentTotal` varchar(255) NOT NULL,
  `rentalID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profileID` int(11) NOT NULL,
  `profilePicture` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileID`, `profilePicture`, `userID`) VALUES
(6, '', '950917026405');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `ratingID` int(11) NOT NULL,
  `ratingCount` int(11) NOT NULL,
  `carID` varchar(255) NOT NULL,
  `userID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `rentalID` int(11) NOT NULL,
  `rentalDate` varchar(255) NOT NULL,
  `rentalStart` varchar(255) NOT NULL,
  `rentalEnd` varchar(255) NOT NULL,
  `renterID` varchar(255) NOT NULL,
  `carID` varchar(255) NOT NULL,
  `rentalStatus` varchar(255) NOT NULL,
  `rentalDelivery` varchar(255) NOT NULL,
  `rentalNote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` varchar(255) NOT NULL,
  `serviceFirstHourRate` varchar(255) NOT NULL,
  `serviceNextRate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceFirstHourRate`, `serviceNextRate`) VALUES
('G1M 4444950917026405', '9.00', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(255) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userDOB` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPhone` varchar(255) NOT NULL,
  `userCategory` varchar(255) NOT NULL,
  `userLicense` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userFirstName`, `userLastName`, `userDOB`, `userEmail`, `userPhone`, `userCategory`, `userLicense`) VALUES
('950917026405', 'Muhammad Azizi', 'Saad', '17/09/1995', 'muhammadazizisaad95@gmail.com', '0103735036', 'Owner', '156498723DF4582');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`carID`);

--
-- Indexes for table `carpicture`
--
ALTER TABLE `carpicture`
  ADD PRIMARY KEY (`carPicID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`insuranceID`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`licenseID`);

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profileID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingID`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`rentalID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carpicture`
--
ALTER TABLE `carpicture`
  MODIFY `carPicID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
