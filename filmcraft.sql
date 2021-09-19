-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 01:40 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmcraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminPassword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminLastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminGender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adminBirthdate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adminAddress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminStatus` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminEmail`, `adminPassword`, `adminFirstName`, `adminLastName`, `adminGender`, `adminBirthdate`, `adminNumber`, `adminAddress`, `adminStatus`) VALUES
(1, 'test@gmail.com', 'test', 'Andrei', 'Militante', 'Male', '01/01/2000', '0919-144-1800', 'M.J Cuenco Avenue Cor L Tudtud St. Mabolo Cebu City', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customerEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customerPassword` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customerFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customerLastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customerGender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customerBirthdate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customerNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolioId` int(11) NOT NULL,
  `vendor_Id` int(11) NOT NULL,
  `vendorWork_Id` int(11) NOT NULL,
  `portfolioFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioLastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioAddress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioRating` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolioId`, `vendor_Id`, `vendorWork_Id`, `portfolioFirstName`, `portfolioLastName`, `portfolioAddress`, `portfolioEmail`, `portfolioRating`) VALUES
(3, 8, 8, 'Kyle', 'Catolpos', 'Cebu City', 'kyle@gmail.com', '5');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorId` int(11) NOT NULL,
  `vendorEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vendorPassword` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vendorFirstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vendorLastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vendorGender` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vendorBirthdate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vendorNumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vendorAddress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vendorType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vendorPosition` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorId`, `vendorEmail`, `vendorPassword`, `vendorFirstName`, `vendorLastName`, `vendorGender`, `vendorBirthdate`, `vendorNumber`, `vendorAddress`, `vendorType`, `vendorPosition`) VALUES
(8, 'kyle@gmail.com', 'kyle', 'Kyle', 'Catolpos1', 'Male', 'test', 'test', 'test', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioId`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
