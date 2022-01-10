-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 10:01 AM
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
  `adminProfileImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminStatus` tinyint(5) NOT NULL,
  `adminUserType` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminEmail`, `adminPassword`, `adminFirstName`, `adminLastName`, `adminGender`, `adminBirthdate`, `adminNumber`, `adminAddress`, `adminProfileImage`, `adminStatus`, `adminUserType`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Andrei', 'Militante', 'Male', '', '0919-144-1800', 'M.J Cuenco Avenue Cor L Tudtud St. Mabolo Cebu City', '../files/images/profile_pic/2021-10-02_andrei.jpg', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `vendor_Id` int(11) NOT NULL,
  `bookingDp` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bookingDpStatus` tinyint(4) NOT NULL,
  `eventFinalPrice` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `eventBalance` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `eventStartDate` date NOT NULL,
  `eventEndDate` date NOT NULL,
  `eventStartTime` time NOT NULL,
  `eventEndTime` time NOT NULL,
  `eventDetails` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bookingPaymentMethod` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bookingPaymentStatus` tinyint(4) NOT NULL,
  `bookingDateTime` datetime NOT NULL,
  `bookingStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `customerAddress` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `customerProfileImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerStatus` tinyint(5) NOT NULL,
  `customerUserType` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerEmail`, `customerPassword`, `customerFirstName`, `customerLastName`, `customerGender`, `customerBirthdate`, `customerNumber`, `customerAddress`, `customerProfileImage`, `customerStatus`, `customerUserType`) VALUES
(4, 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', 'customer', 'customer', '', '0000-00-00', '', '', '../files/images/profile_pic/default-profile.png', 1, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventId` int(11) NOT NULL,
  `eventName` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eventDescription` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `eventImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventId`, `eventName`, `eventDescription`, `eventImage`) VALUES
(1, 'Art', 'An art exhibition is traditionally the space in which art objects meet an audience. The exhibit is universally understood to be for some temporary period unless, as is rarely true, it is stated to be ', '../files/images/works/2021-10-19_art.jpg'),
(2, 'Birthday', 'A celebration is a special enjoyable event that people organize because something pleasant has happened or because it is someone birthday or anniversary', '../files/images/works/2021-10-19_birthday.jpg'),
(3, 'Debut', 'Debut is a traditional filipino coming-of-age celebration which celebrates a young woman 18th birthday, the age of maturity in the Philippines.', '../files/images/works/2021-10-19_debut.jpg'),
(4, 'Festival', 'A festival is an event ordinarily celebrated by a community and centering on some characteristic aspect of that community and its religion or cultures.', '../files/images/works/2021-10-19_festival.jpg'),
(5, 'Modelling', 'Is an event put on by a fashion designer to showcase their upcoming line of clothing and/or accessories', '../files/images/works/2021-10-19_modelling.jpg'),
(6, 'Pageants', 'Pageant is a beauty contest or is an elaborate form of entertainment consisting of historical scenes and colorful costumes.', '../files/images/works/2021-10-19_pageants.jpg'),
(7, 'Trade Shows', 'A trade show is an event held to bring together members of a particular industry to display, demonstrate, and discuss their latest products and services', '../files/images/works/2021-10-19_tradeshows.jpeg'),
(8, 'Wedding', 'A wedding is a ceremony where two people are united in marriage.  Most wedding ceremonies involve an exchange of marriage vows by a couple, presentation of a gift (offering, rings, symbolic item, flow', '../files/images/works/2021-10-19_wedding.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(11) NOT NULL,
  `notificationAdminId` int(11) NOT NULL,
  `notificationVendorId` int(11) NOT NULL,
  `notificationCustomerId` int(11) NOT NULL,
  `notificationMessage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notificationStatus` tinyint(4) NOT NULL,
  `notificationUserType` int(11) NOT NULL,
  `notificationDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `notificationAdminId`, `notificationVendorId`, `notificationCustomerId`, `notificationMessage`, `notificationStatus`, `notificationUserType`, `notificationDateTime`) VALUES
(1, 1, 0, 0, 'Test', 1, 1, '2022-01-09 15:19:50'),
(2, 0, 32, 0, 'Test', 1, 2, '2022-01-09 15:19:50'),
(3, 0, 0, 4, 'Test', 1, 3, '2022-01-09 15:19:50');

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
  `portfolioVendorPosition` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioProfileImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioRating` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioBookingRate` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioStartPrice` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioEndPrice` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioStatus` tinyint(4) NOT NULL,
  `portfolioSessionStatus` tinyint(4) NOT NULL,
  `portfolioEvent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolioId`, `vendor_Id`, `vendorWork_Id`, `portfolioFirstName`, `portfolioLastName`, `portfolioAddress`, `portfolioEmail`, `portfolioVendorPosition`, `portfolioProfileImage`, `portfolioRating`, `portfolioBookingRate`, `portfolioStartPrice`, `portfolioEndPrice`, `portfolioDescription`, `portfolioStatus`, `portfolioSessionStatus`, `portfolioEvent`) VALUES
(25, 32, 32, 'vendor', 'vendor', '123', 'vendor@gmail.com', 'Photographer', '../files/images/profile_pic/default-profile.png', '', '400', '5000', '', '', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_session`
--

CREATE TABLE `portfolio_session` (
  `portfolioSessionId` int(11) NOT NULL,
  `portfolioSessionPortfolioId` int(11) NOT NULL,
  `portfolioSessionVendorId` int(11) NOT NULL,
  `portfolioSessionStartSession` datetime NOT NULL,
  `portfolioSessionEndSession` datetime NOT NULL,
  `portfolioSessionStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscriptionId` int(11) NOT NULL,
  `subscriptionVendorId` int(11) NOT NULL,
  `subscriptionPortfolioSessionId` int(11) NOT NULL,
  `subscriptionAmountPaid` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `subscriptionType` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `subscriptionStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `vendorPosition` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vendorProfileImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendorStatus` tinyint(5) NOT NULL,
  `vendorUserType` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vendorLatitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vendorLongitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorId`, `vendorEmail`, `vendorPassword`, `vendorFirstName`, `vendorLastName`, `vendorGender`, `vendorBirthdate`, `vendorNumber`, `vendorAddress`, `vendorType`, `vendorPosition`, `vendorProfileImage`, `vendorStatus`, `vendorUserType`, `vendorLatitude`, `vendorLongitude`) VALUES
(32, 'vendor@gmail.com', '7c3613dba5171cb6027c67835dd3b9d4', 'vendor', 'vendor', '', '0000-00-00', '', '', '', 'None', '../files/images/profile_pic/default-profile.png', 1, 'vendor', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `worksId` int(11) NOT NULL,
  `portfolioWorks_Id` int(11) NOT NULL,
  `occassion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `occassion_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `occassion_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occassion_file_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`worksId`, `portfolioWorks_Id`, `occassion`, `occassion_type`, `occassion_file`, `occassion_file_type`) VALUES
(22, 32, '1234', '5', '../files/images/works/2021-12-16_pipe.png', 'image/png'),
(25, 32, 'Couple Shots123', '4', '../files/videos/works/2021-12-16_Unser+Coming+Soon+Wedding+Trailer+ðŸ¤µðŸ¼ðŸ‘°ðŸ¼_+Patrizia+Palme-56mNziw4RRY.mp4', 'video/mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolioId`);

--
-- Indexes for table `portfolio_session`
--
ALTER TABLE `portfolio_session`
  ADD PRIMARY KEY (`portfolioSessionId`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscriptionId`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorId`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`worksId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `portfolio_session`
--
ALTER TABLE `portfolio_session`
  MODIFY `portfolioSessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscriptionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `worksId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
