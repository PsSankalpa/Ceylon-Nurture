-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2021 at 12:03 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceylon_nurture_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `articleName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uses` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sideEffects` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `precautions` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `interactions` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dosing` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int(11) NOT NULL,
  `reviewid` int(11) NOT NULL,
  PRIMARY KEY (`articleid`),
  KEY `doctorid` (`doctorid`),
  KEY `reviewid` (`reviewid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_user`
--

DROP TABLE IF EXISTS `common_user`;
CREATE TABLE IF NOT EXISTS `common_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `common_user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int(11) NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `common_user`
--

INSERT INTO `common_user` (`userid`, `fname`, `lname`, `username`, `common_user_id`, `email`, `tpNumber`, `password`) VALUES
(1, 'Piyum', 'Sankalpa', 'PsSanka', 'Ep6JzzmGIQkJlSZYfkJjiFXDDP7h8MZYkrtxIi6W1LjIgQWN0H', 'ps@gmail.com', 113253627, '$2y$10$FXQiTH5vWeioK5sfFMRIJOtUXC8wfHZve29dqX15mSFq/8M.aFxje'),
(2, 'Piyum', 'Sankalpa', 'Pssanka2', 'BBTv9NYPL4ydsSDSXw3WxynaPVtkh1yCEWsFIdzCbxLduHVwGM', 'sanka@gmail.com', 1124857385, '$2y$10$VLmMzQah/ePr1V9eM4BttekUNRymXoJ0vZr4xzImW3bDcXcFAJoOS'),
(3, 'PSSanka', 'Sanka', 'PSSankaps', '1lObAnUEI9U4DaAWf2Bn4MGivjyxlh3FtjlBHA5Jf0PfHauvp4', 'PSSanka@gmail.com', 118372648, '$2y$10$1D9ZFE0eKkoqJ4m9KPeWR.LHBMK2M0o4n7pllB3taWMCOZGNRXxyy'),
(4, 'Avishi', 'Jayaweera', 'Avishi', 'TQO7ihOxFUBA0bDOMvVKlJiKD4EGxstg0vM1U2imq1p46nhdLl', 'avijayaweera1@gmail.com', 761234567, '$2y$10$qJ3KxMdx6OZiQF91Nv9Oye3rt8CBWSG78/Z3bxzpyX/8s9Wy9JxRm'),
(5, 'Zen', 'Singh', 'ZenS', 'zl79aHzFCxD71JmcekpQMt5o7HHS9ADH3uw2d4YIXBfUFoMdIm', 'zen@gmail.com', 761234566, '$2y$10$bsff4dG.wEcGkQ.jLh8q..r5VY7KYsGb/eFdlprdRWvSHOo/j8eba'),
(6, 'Sanath', 'Perera', 'SanathP', '8mixHJLXTH3kN3O8zJc2mHw2ZTNRuCruEsNW8BprnhyJ1eWVfw', 'sanath@gmail.com', 761234566, '$2y$10$orsCbxjYk71gFRyXv.Vw0uWB9gUCqcJVd/HbzoYS9bIZRrOavrDra'),
(7, 'Nihal', 'Kumara', 'NihalK', 'TfBsSZfbHPPRXqRssQ9JCKmO2EoQqzrwCJEjC0El9hWuVyIgcG', 'nihal@gmail.com', 711234567, '$2y$10$E18n2ToCZcKHBnM9ruNdJu0npjtMb5OdW1RXAfj9quStKNfvViDpC');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `userid` int(11) NOT NULL,
  `nameWithInitials` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` text COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `registrationNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `specialities` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`userid`, `nameWithInitials`, `gender`, `dob`, `registrationNumber`, `specialities`, `hospital`, `city`, `address`, `image`) VALUES
(2, 'B.A.Sankalpa', 'male', '1998-04-06', '435636363hg56', 'Handi', 'Lorem ipsum dolor sit amet consectetur', 'Homagama', '404/A3,ewewerw,rwrwrw,rwrwrw', 'doctor_qualification/depositphotos_102710504-stock-illustration-natural-wellness-logo.jpg'),
(4, 'A.U.Jayaweera', 'female', '2000-05-14', '1234567', 'Internal Medicine', 'Nuga Uyana', 'Rathnapura', 'No 12,Main Street,Rathnapura', 'doctor_qualification/doctor certificate.jpg'),
(6, 'W.M.S.Perera', 'male', '1957-03-12', 'RGS045876', 'Internal Medicine', 'Osu Sewana', 'Kandy', 'No 12,Park Street,Ahungalla', 'doctor_qualification/certificat_03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `userid` int(11) NOT NULL,
  `nameWithInitials` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `nic` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`userid`, `nameWithInitials`, `gender`, `DOB`, `nic`, `image`) VALUES
(2, 'B.A.Sankalpa', 'male', '1998-04-04', '98302044v', 'medical_records/managers-looking-.jpg'),
(4, 'A.U.Jayaweera', 'female', '2000-05-14', '200063502850', 'medical_records/pdf.png'),
(5, 'Zen Singh', 'male', '1995-02-06', '950739281891', 'medical_records/pdf.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sellerName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `sellerid` (`sellerid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productName`, `productPrice`, `description`, `image`, `category`, `sellerName`, `address`, `tpNumber`, `sellerid`) VALUES
(1, 'Product One', 400, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (1).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(3, 'Product Two', 250, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (2).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(4, 'Product One seller two', 350, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (3).jpg', 'Product', 'P.S.Sankalpa', 'ffdafafaf/fadfaf/afadfad', 113253627, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

DROP TABLE IF EXISTS `pwdreset`;
CREATE TABLE IF NOT EXISTS `pwdreset` (
  `pwdResetId` int(11) NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text COLLATE utf8mb4_bin NOT NULL,
  `pwdResetSelector` text COLLATE utf8mb4_bin NOT NULL,
  `pwdResetToken` longtext COLLATE utf8mb4_bin NOT NULL,
  `pwdResetExpires` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewid` int(11) NOT NULL AUTO_INCREMENT,
  `review` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reviewerid` int(11) NOT NULL,
  `reviewerName` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`reviewid`),
  KEY `reviewerid` (`reviewerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleid` int(11) NOT NULL AUTO_INCREMENT,
  `slotNumber` int(11) NOT NULL,
  `dateofSlot` date NOT NULL,
  `arrivalTime` time(6) NOT NULL,
  `departureTime` time(6) NOT NULL,
  `noOfPatient` int(11) NOT NULL,
  `timePerPatient` time(6) NOT NULL,
  `doctorCharge` decimal(65,0) NOT NULL,
  `doctorNote` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int(11) NOT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `doctorid` (`doctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `slotNumber`, `dateofSlot`, `arrivalTime`, `departureTime`, `noOfPatient`, `timePerPatient`, `doctorCharge`, `doctorNote`, `doctorid`) VALUES
(1, 1, '2021-10-20', '00:00:08.000000', '00:00:12.000000', 12, '00:00:16.000000', '1500', 'Rs.500 off  from the second visit', 4),
(2, 2, '2021-10-21', '00:00:04.000000', '00:00:07.000000', 12, '00:00:15.000000', '2500', 'Be on Time for the Appointment', 4),
(3, 1, '2021-10-23', '00:00:08.300000', '12:00:00.000000', 12, '00:00:16.000000', '1500', 'Be on Time for the Appointment', 6),
(4, 2, '2021-10-23', '00:00:04.000000', '00:00:08.000000', 12, '00:00:16.000000', '2000', 'Be on Time for the Appointment', 6),
(5, 1, '2021-10-24', '00:00:09.000000', '12:00:00.000000', 10, '00:00:16.000000', '2000', 'Rs.500 off  from the second visit', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `userid` int(11) NOT NULL,
  `nameWithInitials` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `registrationNumber` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int(30) NOT NULL,
  `nic` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`userid`, `nameWithInitials`, `registrationNumber`, `tpNumber`, `nic`, `address`, `image`) VALUES
(1, 'P.S.Sankalpa', '323443ertwet', 112748352, '980439294', 'ffdafafaf/fadfaf/afadfad', 'seller_certificates/images.png'),
(2, 'B.A.Sankalpa', '2141415say', 112847583, '983949582', '404/A1/13,pitipana north,Homagama', 'seller_certificates/content-co'),
(4, 'A.U.Jayaweera', 'RGS0175642', 765640123, '200063502850', 'No 12,Main Street,Rathnapura', 'seller_certificates/certificate 2.jpg'),
(7, 'J.Nihal Kumara', 'RGS0175642', 711234567, '681234512V', 'No 26/B ,Main Road,Matara', 'seller_certificates/certificat_03.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`reviewid`) REFERENCES `reviews` (`reviewid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `sellers` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`reviewerid`) REFERENCES `common_user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
