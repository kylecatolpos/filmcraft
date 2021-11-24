-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2021 at 12:20 AM
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
(1, 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Andrei', 'Militante', 'Male', '01/01/2000', '0919-144-1800', 'M.J Cuenco Avenue Cor L Tudtud St. Mabolo Cebu City', '../files/images/profile_pic/2021-10-02_andrei.jpg', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `vendor_Id` int(11) NOT NULL,
  `bookingStatus` tinyint(4) NOT NULL,
  `bookingStartDate` datetime NOT NULL,
  `bookingEndDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `customer_Id`, `vendor_Id`, `bookingStatus`, `bookingStartDate`, `bookingEndDate`) VALUES
(1, 1, 15, 1, '2021-10-20 18:51:51', '2021-10-21 18:51:51');

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
(1, 'kyle@gmail.com', '4b75751e170e00f56886726c3f46eecd', 'Kyle', 'Catolpos', '', '', '', '', '../files/images/profile_pic/default-profile.png', 0, 'customer'),
(2, 'customer@gmail.com', '91ec1f9324753048c0096d036a694f86', 'Customer', 'Karon', '', '', '', '', '../files/images/profile_pic/default-profile.png', 0, 'customer');

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
(2, 'Debut', 'Debut is a traditional filipino coming-of-age celebration which celebrates a young woman 18th birthday, the age of maturity in the Philippines.', '../files/images/works/2021-10-19_debut.jpg'),
(3, 'Art', 'An art exhibition is traditionally the space in which art objects meet an audience. The exhibit is universally understood to be for some temporary period unless, as is rarely true, it is stated to be ', '../files/images/works/2021-10-19_art.jpg'),
(4, 'Birthday', 'A celebration is a special enjoyable event that people organize because something pleasant has happened or because it is someone birthday or anniversary', '../files/images/works/2021-10-19_birthday.jpg'),
(5, 'Festival', 'A festival is an event ordinarily celebrated by a community and centering on some characteristic aspect of that community and its religion or cultures.', '../files/images/works/2021-10-19_festival.jpg'),
(6, 'Modelling', 'Is an event put on by a fashion designer to showcase their upcoming line of clothing and/or accessories', '../files/images/works/2021-10-19_modelling.jpg'),
(7, 'Pageants', 'Pageant is a beauty contest or is an elaborate form of entertainment consisting of historical scenes and colorful costumes.', '../files/images/works/2021-10-19_pageants.jpg'),
(8, 'Trade Shows', 'A trade show is an event held to bring together members of a particular industry to display, demonstrate, and discuss their latest products and services', '../files/images/works/2021-10-19_tradeshows.jpeg'),
(9, 'Wedding', 'A wedding is a ceremony where two people are united in marriage.  Most wedding ceremonies involve an exchange of marriage vows by a couple, presentation of a gift (offering, rings, symbolic item, flow', '../files/images/works/2021-10-19_wedding.jpg');

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
  `portfolioStartPrice` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `portfolioEndPrice` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `portfolioDescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `portfolioStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolioId`, `vendor_Id`, `vendorWork_Id`, `portfolioFirstName`, `portfolioLastName`, `portfolioAddress`, `portfolioEmail`, `portfolioVendorPosition`, `portfolioProfileImage`, `portfolioRating`, `portfolioBookingRate`, `portfolioStartPrice`, `portfolioEndPrice`, `portfolioDescription`, `portfolioStatus`) VALUES
(7, 12, 12, 'test', 'test', '', 'test@gmail.com', 'None', '../files/images/profile_pic/default-profile.png', '', '500', '15000', '0', '', 0),
(8, 13, 13, 'charles', 'chan', '', 'chan123@gmail.com', 'None', '../files/images/profile_pic/2021-10-02_logo.jpg', '', '200', '5000', '0', '', 0),
(9, 14, 14, 'test', 'test', '', 'test123456@gmail.com', 'None', '../files/images/profile_pic/default-profile.png', '', '100', '0', '0', '', 0),
(10, 15, 15, 'Charles', 'Chan', '', 'chan123@gmail.com', 'Videographer', '../files/images/profile_pic/2021-11-10_card-img1.jpg', '', '1000', '5000', '10000', '', 1),
(11, 17, 17, 'Vendor', 'Test', '', 'vendor@gmail.com', 'None', '../files/images/profile_pic/default-profile.png', '', '500', '0', '0', '', 1),
(12, 19, 19, 'Vendor', 'Today', '', 'vendor123@gmail.com', 'None', '../files/images/profile_pic/default-profile.png', '', '700', '5000', '0', 'asdhajsdhakjsda', 1);

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
(15, 'chan123@gmail.com', '26c322652770620e64ac90682eb6504c', 'Charles', 'Chan', 'Male', '', '09457891234', 'Cebu City', '', 'None', '../files/images/profile_pic/2021-10-02_charles.jpg', 1, 'vendor', '10.289078507831345', '123.86214848956111'),
(17, 'vendor@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Vendor', 'Test', '', '', '09457894134', '', '', 'None', '../files/images/profile_pic/default-profile.png', 0, 'vendor', '10.28253153717443', '123.87930747103219'),
(19, 'vendor123@gmail.com', '6c6e1464695ec20feb0b2a633f9cf27b', 'Vendor', 'Today', '', '', '097894561253', '', '', 'None', '../files/images/profile_pic/default-profile.png', 0, 'vendor', '', '');

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
(10, 13, 'Prenup Video Trailer', '', '../files/videos/works/2021-10-02_Unser+Coming+Soon+Wedding+Trailer+ðŸ¤µðŸ¼ðŸ‘°ðŸ¼_+Patrizia+Palme-56mNziw4RRY.mp4', 'video/mp4'),
(11, 13, 'Wedding Couple Perfect Shot', '', '../files/images/works/2021-10-02_77525152_medium.jpg', 'image/jpeg'),
(12, 13, '123', '', '../files/videos/works/2021-10-02_WEDDING+TRAILER+-+PIERCARMINE+&+MARILENA+-+TROINA+-+28+settembre+2021-cZkBLVEjyvo.mp4', 'video/mp4'),
(13, 14, 'Wedding ', '', '../files/videos/works/2021-10-02_WEDDING+TRAILER+-+PIERCARMINE+&+MARILENA+-+TROINA+-+28+settembre+2021-cZkBLVEjyvo.mp4', 'video/mp4'),
(14, 15, 'Couple Shots', '', '../files/images/works/2021-10-02_77525152_medium.jpg', 'image/jpeg'),
(15, 15, 'Wedding Trailer', '', '../files/videos/works/2021-10-02_WEDDING+TRAILER+-+PIERCARMINE+&+MARILENA+-+TROINA+-+28+settembre+2021-cZkBLVEjyvo.mp4', 'video/mp4'),
(16, 15, '123123', '', '../files/videos/works/2021-10-02_Unser+Coming+Soon+Wedding+Trailer+ðŸ¤µðŸ¼ðŸ‘°ðŸ¼_+Patrizia+Palme-56mNziw4RRY.mp4', 'video/mp4'),
(17, 15, 'asdasda', 'Wedding', '../files/images/works/2021-10-08_jvtujan_code2.png', 'image/png');

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
  MODIFY `bookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `worksId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
