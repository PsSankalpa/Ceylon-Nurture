-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2022 at 08:35 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int NOT NULL AUTO_INCREMENT,
  `nameWithInitials` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `nameWithInitials`, `fname`, `lname`, `email`, `password`) VALUES
(1, '', 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'A.K.C.Dilshani', 'chamodi', 'dilshani', 'cham.dil@gmail.com', 'Chamdil@12345'),
(3, 'B.A.P.Sankalpa', 'piyum', 'sankalpa', 'piyum@gmail.com', 'Piyum@12345'),
(4, 'J.M.A.U.Jayaweera', 'avishi', 'jayaweera', 'avishi@gmail.com', 'Avishi@12345');

-- --------------------------------------------------------

--
-- Table structure for table `adminpayment`
--

DROP TABLE IF EXISTS `adminpayment`;
CREATE TABLE IF NOT EXISTS `adminpayment` (
  `adminPaymentid` int NOT NULL AUTO_INCREMENT,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`adminPaymentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adminpaymentdoctor`
--

DROP TABLE IF EXISTS `adminpaymentdoctor`;
CREATE TABLE IF NOT EXISTS `adminpaymentdoctor` (
  `adminpaymentid` int NOT NULL AUTO_INCREMENT,
  `doctorName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `doctorid` int NOT NULL,
  `doctorCharge` int NOT NULL,
  PRIMARY KEY (`adminpaymentid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminpaymentdoctor`
--

INSERT INTO `adminpaymentdoctor` (`adminpaymentid`, `doctorName`, `amount`, `date`, `doctorid`, `doctorCharge`) VALUES
(1, 'Avishi', 1000, '2022-06-25', 4, 0),
(2, 'SanathP', 2500, '2022-06-26', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointmentid` int NOT NULL AUTO_INCREMENT,
  `doctorName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patientName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `totalPayment` double NOT NULL,
  `date` date NOT NULL,
  `symptoms` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nic` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int NOT NULL,
  `Patientid` int NOT NULL,
  `scheduleid` int NOT NULL,
  `commission` int NOT NULL,
  `patientCount` int NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `noOfPatients` int NOT NULL,
  `slotTimeStart` time NOT NULL,
  `slotTimeEnd` time NOT NULL,
  PRIMARY KEY (`appointmentid`),
  KEY `DoctorID` (`doctorid`),
  KEY `PatientID` (`Patientid`),
  KEY `scheduleID` (`scheduleid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointmentid`, `doctorName`, `patientName`, `tpNumber`, `totalPayment`, `date`, `symptoms`, `nic`, `doctorid`, `Patientid`, `scheduleid`, `commission`, `patientCount`, `availability`, `noOfPatients`, `slotTimeStart`, `slotTimeEnd`) VALUES
(21, 'B.A.Sankalpa', 'A.K.Cham Dil', 777846877, 2700, '2022-03-29', 'cholera', '986012303V', 2, 22, 9, 200, 1, 1, 3, '08:00:00', '08:15:00'),
(22, 'B.A.Sankalpa', 'A.K.Cham Dil', 777846877, 2700, '2022-03-29', 'cholera', '986012303V', 2, 22, 9, 200, 2, 1, 3, '08:15:00', '08:30:00'),
(23, 'B.A.Sankalpa', 'A.K.Cham Dil', 777846877, 2700, '2022-03-29', 'cholera', '986012303V', 2, 22, 9, 200, 3, 1, 3, '08:30:00', '08:45:00'),
(24, 'A.U.Jayaweera', 'B.A.Sankalpa', 1124857385, 2200, '2022-03-29', 'Leg Pain', '98302044v', 4, 2, 14, 200, 1, 1, 10, '09:00:00', '09:15:00'),
(25, 'A.U.Jayaweera', 'B.A.Sankalpa', 1124857385, 2200, '2022-03-29', 'Leg Pain', '98302044v', 4, 2, 16, 200, 1, 1, 18, '08:00:00', '08:15:00'),
(26, 'A.U.Jayaweera', 'Z.E.Zen', 761234566, 2200, '2022-03-29', 'Leg Pain', '950739281891', 4, 5, 14, 200, 2, 1, 10, '09:15:00', '09:30:00'),
(27, 'A.U.Jayaweera', 'A.K.Cham Dil', 777846877, 2200, '2022-03-29', 'cholera', '986012303V', 4, 22, 14, 200, 3, 1, 10, '09:30:00', '09:45:00'),
(28, 'A.U.Jayaweera', 'A.K.Cham Dil', 777846877, 1700, '2022-03-29', 'cholera', '986012303V', 4, 22, 15, 200, 1, 1, 24, '13:00:00', '13:15:00'),
(29, 'A.U.Jayaweera', 'B.A.Sankalpa', 1124857385, 2200, '2022-06-25', '', '98302044v', 4, 2, 14, 200, 4, 1, 10, '09:45:00', '10:00:00'),
(30, 'A.U.Jayaweera', 'B.A.Sankalpa', 1124857385, 1700, '2022-06-25', '', '98302044v', 4, 2, 15, 200, 2, 1, 24, '13:15:00', '13:30:00'),
(31, 'A.U.Jayaweera', 'B.A.Sankalpa', 1124857385, 1700, '2022-06-25', '', '98302044v', 4, 2, 15, 200, 3, 1, 24, '13:30:00', '13:45:00'),
(32, 'A.U.Jayaweera', 'B.A.Sankalpa', 1124857385, 2200, '2022-06-26', 'cholera', '98302044v', 4, 2, 14, 200, 5, 1, 10, '10:00:00', '10:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `articlereviews`
--

DROP TABLE IF EXISTS `articlereviews`;
CREATE TABLE IF NOT EXISTS `articlereviews` (
  `reviewid` int NOT NULL AUTO_INCREMENT,
  `reviewOwner` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `review` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `articleid` int NOT NULL,
  `ownerid` int NOT NULL,
  PRIMARY KEY (`reviewid`),
  KEY `articleid` (`articleid`),
  KEY `ownerid` (`ownerid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articlereviews`
--

INSERT INTO `articlereviews` (`reviewid`, `reviewOwner`, `review`, `articleid`, `ownerid`) VALUES
(1, 'PsSanka2', 'This is good', 2, 2),
(2, 'Avishi', 'These are good information', 2, 4),
(3, 'Cham dil', 'This is a useful herb', 2, 12),
(4, 'Avishi', 'Learn a lot of information from this', 2, 4),
(5, 'PsSanka2', 'Useful herb', 2, 2),
(6, 'Cham dil', 'Information is very accurate', 2, 12),
(7, 'Pssanka2', 'Good information', 27, 2),
(8, 'Pssanka2', 'This is a useful herb', 2, 2),
(9, 'Pssanka2', 'Good information', 2, 2),
(10, 'cham dil', 'awesome', 2, 22),
(11, 'Pssanka2', 'Good information', 27, 2);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleid` int NOT NULL AUTO_INCREMENT,
  `articleName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uses` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sideEffects` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `precautions` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `interactions` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dosing` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int NOT NULL,
  `date` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`articleid`),
  KEY `doctorid` (`doctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleid`, `articleName`, `description`, `uses`, `sideEffects`, `precautions`, `interactions`, `dosing`, `image`, `doctorid`, `date`, `status`) VALUES
(2, 'Ashwagandha', 'Ashwagandha is an evergreen shrub that grows in Asia and Africa. It is commonly used for stress. There is little evidence for its use as an ', 'Possibly Effective for,Stress. Taking ashwagandha by mouth seems to help reduce stress in some people. It might also help reduce stress-related weight gain.There is interest in using ashwagandha f', 'When taken by mouth Ashwagandha is possibly safe when used for up to 3 months. The longterm safety of ashwagandha is not known. Large doses of ashwagandha might cause stomach upset diarrhea and ', 'Pregnancy It is likely unsafe to use ashwagandha when pregnant. There is some evidence that ashwagandha might cause miscarriages.Breastfeeding: There is not enough reliable information to know if as', 'Moderate InteractionBe cautious with this combinationMedications that decrease the immune system (Immunosuppressants) interacts with ASHWAGANDHAAshwagandha seems to increase the immune system. T', 'Ashwagandha has most often been used by adults in doses up to 1000 mg daily for up to 12 weeks. Speak with a healthcare provider to find out what dose might be best for a specific condition.', 'articles_images/ashwagandha-root-extract-withania-somnifera.jpg', 2, '2021-12-26', 1),
(3, 'Boswellia', 'Boswellia, also known as Indian frankincense or olibanum, is made from the resin of the Boswellia serrata tree. It’s known for its easily recognizable spicy, woody aroma.', '', '', '', '', '', 'articles_images/boswellia-serrata-planet.jpg', 2, '2021-12-26', 1),
(4, 'Triphala', 'Triphala is an Ayurvedic remedy consisting of the following three small medicinal fruits (26Trusted Source):\r\namla (Emblica officinalis, or Indian gooseberry)\r\nbibhitaki (Terminalia bellirica)\r\nharita', '', '', '', '', '', 'articles_images/triphala-herbal-plant.jpg', 2, '2021-12-26', 1),
(5, 'Brahmi', 'Brahmi (Bacopa monieri) is a staple herb in Ayurvedic medicine.\r\nAccording to test-tube and animal studies, brahmi appears to have strong anti-inflammatory properties that are as effective as common NSAIDs', '', '', '', '', '', 'articles_images/Brahmi-Oil1.jpg', 4, '2021-12-26', 1),
(6, 'Calendula', 'Calendula (Calendula officinalis) is a plant known as pot marigold. It is not the same as ornamental marigolds of the Tagetes genus grown in vegetable gardens.Calendula is native to Asia and southern Europe\r\n', 'We currently have no information for CALENDULA Uses.', 'When taken by mouth: Preparations of calendula flower are likely safe for most people.\r\nWhen applied to the skin: Preparations of calendula flower are likely safe for most people.', 'Pregnancy: Don\'t take calendula by mouth if you are pregnant. It is likely unsafe. There is a concern that it might cause a miscarriage. It\'s best to avoid topical use as well until more is known.\r\nBreastfeeding: There isn\'t enough reliable information to know if calendula is safe to use when breast-feeding. Stay on the safe side and avoid use.', 'Calendula might cause sleepiness and drowsiness. Medications that cause sleepiness are called sedatives. Taking calendula along with sedative medications might cause too much sleepiness.\r\nSome sedative medications include clonazepam (Klonopin), lorazepam (Ativan), phenobarbital (Donnatal), zolpidem (Ambien), and others.', 'There isn\'t enough reliable information to know what an appropriate dose of calendula might be. Keep in mind that natural products are not always necessarily safe and dosages can be important. Be sure to follow relevant directions on product labels and consult a healthcare professional before using.', 'articles_images/Calendula.jpg', 2, '2022-01-04', 1),
(22, 'Cumin', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that ', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'articles_images/Cumin.jpg', 2, '2022-01-05', 1),
(23, ' Turmeric', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', 'articles_images/Turmeric.jpg', 2, '2022-01-06', 1),
(24, ' Licorice root', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', 'articles_images/Licorice root.jpg', 2, '2022-01-07', 1),
(25, ' Gotu kola', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', 'articles_images/Gotu kola.jpg', 2, '2022-01-08', 1),
(26, ' Bitter melon', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', 'articles_images/Bitter melon.jpg', 2, '2022-01-09', 1),
(27, ' Cardamom', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', 'articles_images/Cardamom.jpg', 2, '2022-01-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `channeling`
--

DROP TABLE IF EXISTS `channeling`;
CREATE TABLE IF NOT EXISTS `channeling` (
  `channelingid` int NOT NULL AUTO_INCREMENT,
  `doctorName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `patientName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recordNumber` int NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `category` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DocotorID` int NOT NULL,
  `PatientID` int NOT NULL,
  `scheduleID` int NOT NULL,
  PRIMARY KEY (`channelingid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channelingpayments`
--

DROP TABLE IF EXISTS `channelingpayments`;
CREATE TABLE IF NOT EXISTS `channelingpayments` (
  `paymentid` int NOT NULL AUTO_INCREMENT,
  `doctorCharges` double NOT NULL,
  `hospitalCharges` double NOT NULL,
  `commision` double NOT NULL,
  `amount` double NOT NULL,
  `doctorid` int NOT NULL,
  `patientid` int NOT NULL,
  `channelingid` int NOT NULL,
  PRIMARY KEY (`paymentid`),
  KEY `doctorid` (`doctorid`),
  KEY `channelinpayments_ibfk_2` (`patientid`),
  KEY `channelingid` (`channelingid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channeling_history`
--

DROP TABLE IF EXISTS `channeling_history`;
CREATE TABLE IF NOT EXISTS `channeling_history` (
  `historyID` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `category` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recordNumber` int NOT NULL,
  `doctorID` int NOT NULL,
  `patientID` int NOT NULL,
  `channelingID` int NOT NULL,
  PRIMARY KEY (`historyID`),
  KEY `channelingID` (`channelingID`),
  KEY `DoctorID` (`doctorID`),
  KEY `PatientID` (`patientID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

DROP TABLE IF EXISTS `commission`;
CREATE TABLE IF NOT EXISTS `commission` (
  `feesID` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `userName` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `commissionNumber` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`feesID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_user`
--

DROP TABLE IF EXISTS `common_user`;
CREATE TABLE IF NOT EXISTS `common_user` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `nameWithInitials` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `common_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `common_user`
--

INSERT INTO `common_user` (`userid`, `nameWithInitials`, `username`, `gender`, `common_user_id`, `email`, `tpNumber`, `image`, `password`, `date`) VALUES
(1, 'g.h.k.piyummmm', 'PsSanka', 'Male', 'Ep6JzzmGIQkJlSZYfkJjiFXDDP7h8MZYkrtxIi6W1LjIgQWN0H', 'ps@gmail.com', 777846877, '', '$2y$10$FXQiTH5vWeioK5sfFMRIJOtUXC8wfHZve29dqX15mSFq/8M.aFxje', '2021-12-03'),
(2, 'B.A.Sankalpa', 'Pssanka2', 'Male', 'BBTv9NYPL4ydsSDSXw3WxynaPVtkh1yCEWsFIdzCbxLduHVwGM', 'piyumsankalpaps@gmail.com', 1124857385, '', '$2y$10$VLmMzQah/ePr1V9eM4BttekUNRymXoJ0vZr4xzImW3bDcXcFAJoOS', '2021-12-06'),
(3, 'B.A.Sankalpa', 'PSSankaps', '', '1lObAnUEI9U4DaAWf2Bn4MGivjyxlh3FtjlBHA5Jf0PfHauvp4', 'PSSanka@gmail.com', 118372648, '', '$2y$10$1D9ZFE0eKkoqJ4m9KPeWR.LHBMK2M0o4n7pllB3taWMCOZGNRXxyy', '2022-01-15'),
(4, 'A.U.Jayaweera', 'Avishi', 'Female', 'TQO7ihOxFUBA0bDOMvVKlJiKD4EGxstg0vM1U2imq1p46nhdLl', 'avijayaweera1@gmail.com', 761234567, '', '$2y$10$kL2SHzWDi.lysU562uCR7uVd7QGAptEBIGuaIHwu89VFDF8DP1uW6', '2022-01-20'),
(5, 'Z.E.Zen', 'ZenS', 'Male', 'zl79aHzFCxD71JmcekpQMt5o7HHS9ADH3uw2d4YIXBfUFoMdIm', 'zen@gmail.com', 761234566, '', '$2y$10$bsff4dG.wEcGkQ.jLh8q..r5VY7KYsGb/eFdlprdRWvSHOo/j8eba', '2022-01-25'),
(6, '', 'SanathP', 'Male', '8mixHJLXTH3kN3O8zJc2mHw2ZTNRuCruEsNW8BprnhyJ1eWVfw', 'sanath@gmail.com', 761234566, '', '$2y$10$orsCbxjYk71gFRyXv.Vw0uWB9gUCqcJVd/HbzoYS9bIZRrOavrDra', '2022-02-02'),
(7, '', 'NihalK', '', 'TfBsSZfbHPPRXqRssQ9JCKmO2EoQqzrwCJEjC0El9hWuVyIgcG', 'nihal@gmail.com', 711234567, '', '$2y$10$E18n2ToCZcKHBnM9ruNdJu0npjtMb5OdW1RXAfj9quStKNfvViDpC', '2022-02-10'),
(17, 'J.S.John', 'JS', 'Male', 'yzNG3hL3dGf0nIgDobylUBihE4p0HycLb0rYWXf0hkbaU5RLmf', 'js@gmail.com', 112748593, '', '$2y$10$HMQPdHpHB3MtrG.a2xBqqOeSj61kY1tnI13u1Cj4mwAaCk4U3cb46', '2022-03-02'),
(20, 'Sankalpa', 'PsSankasss', 'Male', 'rICI4eBRDqbTXtxgh6kAExSs6KDyZZCGBpRrcaGP9McVZOf8VE', 'pss@gmail.com', 76496212, '', '$2y$10$nIsI0690d/bYHbjjoEBvRelXucL7zyL7pXYSYMZP5eIGtDoopalzm', '2022-03-07'),
(21, 'Piyum Sankalpa', 'PSSank', 'Male', 'GAdtYeF4Fg2OzEn9IN9oA2UtS76do5tUjv3ab8sWwAKtIafAf7', 'piyumsankalpa@gmail.com', 764962123, '', '$2y$10$0wBA3wNLGnn4LbdZ4lR7wenInrh2vTO9fZk819YyBGJefDAEIeaBW', '2022-03-15'),
(22, 'A.K.Cham Dil', 'cham dil', 'Female', 'Vy3rheW4efFjfM83NgRapKk4k1PznSEnyhxTcn3EylSW1hPwtQ', 'cham.dil333@gmail.com', 777846877, '', '$2y$10$W8AE775keO5dLvESLE3C1eZ0MYRtt1.vCZwBhu.8e14pW9LVf0ldy', '2022-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `contactusid` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`contactusid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctorforum`
--

DROP TABLE IF EXISTS `doctorforum`;
CREATE TABLE IF NOT EXISTS `doctorforum` (
  `forumID` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyID` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`forumID`),
  KEY `doctorforum_ibfk_1` (`replyID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `userid` int NOT NULL,
  `nameWithInitials` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registrationNumber` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `specialities` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hospital` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`userid`, `nameWithInitials`, `gender`, `registrationNumber`, `specialities`, `hospital`, `city`, `address`, `image`) VALUES
(2, 'B.A.Sankalpa', 'male', '435636363hg56', 'Handi', 'Ambagaha yata sewana', 'Homagama', '404/A3,ewewerw,rwrwrw,rwrwrw', 'doctor_qualification/depositphotos_102710504-stock-illustration-natural-wellness-logo.jpg'),
(4, 'A.U.Jayaweera', 'female', '1234567', 'Internal Medicine', 'Nuga Uyana', 'Rathnapura', 'No 12,Main Street,Rathnapura', 'doctor_qualification/doctor certificate.jpg'),
(6, 'W.M.S.Perera', 'male', 'RGS045876', 'Internal Medicine', 'Osu Sewana', 'Kandy', 'No 12,Park Street,Ahungalla', 'doctor_qualification/certificat_03.jpg'),
(20, 'Sankalpa', 'male', 'fafafaf12', 'Handi', 'ABC', 'Homagama', '610/05,3rd Lane, Gabadawaththa ii, Pitipana City, Homagama.', 'doctor_qualification/Gotu kola.jpg'),
(22, 'A.K.Cham Dil', 'Female', '7685757', 'general physician', 'General Hospital', 'Colombo', 'jfhjhfj', 'doctor_qualification/cham dil-doctor2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `feesID` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userID` int NOT NULL,
  `donationID` int NOT NULL,
  `status` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`feesID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`feesID`, `date`, `amount`, `userName`, `userID`, `donationID`, `status`) VALUES
(6, '2021-12-09', '100', 'B.A Sankalpa', 2, 1, 'completed'),
(7, '2021-12-28', '120', 'Avishi', 1, 2, 'completed'),
(8, '2022-01-08', '50', 'Sankalpa', 6, 3, 'completed'),
(9, '2022-01-17', '120', 'Chamodi', 4, 4, 'completed'),
(10, '2022-02-03', '200', 'B.A.Sankalpa', 2, 5, 'completed'),
(11, '2022-02-16', '100', 'Chamodi', 3, 6, 'completed'),
(12, '2022-03-03', '120', 'Avishi', 4, 7, 'completed'),
(13, '2022-03-12', '200', 'Chamodi', 3, 8, 'completed'),
(31, '2022-03-25', '1000.00', 'Pssanka2', 2, 28, 'completed'),
(36, '2022-06-26', '0', 'Pssanka2', 2, 33, 'not_completed');

-- --------------------------------------------------------

--
-- Table structure for table `forumdoctor`
--

DROP TABLE IF EXISTS `forumdoctor`;
CREATE TABLE IF NOT EXISTS `forumdoctor` (
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `forumDoctorid` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`forumDoctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forumdoctor`
--

INSERT INTO `forumdoctor` (`name`, `description`, `tpNumber`, `location`, `forumDoctorid`, `date`, `userid`) VALUES
('Cham Dil', ' General Hospital, Anuradhapura', 2147483647, ' General Hospital, Anuradhapura', 8, '2022-03-08', 1),
('Sankalpa', 'good for diabetics', 777846877, 'colombo', 9, '2022-06-25', 2),
('cham', 'good doctor', 764962891, 'colombo', 10, '2022-06-26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `forumherb`
--

DROP TABLE IF EXISTS `forumherb`;
CREATE TABLE IF NOT EXISTS `forumherb` (
  `forumHerbid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `verification` int NOT NULL,
  `verificationDoctorid` int NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int NOT NULL,
  `replyid` int NOT NULL,
  `date` date NOT NULL,
  `verifiedDoctorName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`forumHerbid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forumherb`
--

INSERT INTO `forumherb` (`forumHerbid`, `name`, `description`, `verification`, `verificationDoctorid`, `image`, `userid`, `replyid`, `date`, `verifiedDoctorName`) VALUES
(6, 'ashwaganda', 'very good for nervous system', 1, 2, 'forum_herb/iStock-473454180.jpg', 22, 1, '2022-03-08', 'B.A.Sankalpa');

-- --------------------------------------------------------

--
-- Table structure for table `forumproduct`
--

DROP TABLE IF EXISTS `forumproduct`;
CREATE TABLE IF NOT EXISTS `forumproduct` (
  `forumproductid` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyid` int NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`forumproductid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forumproduct`
--

INSERT INTO `forumproduct` (`forumproductid`, `name`, `date`, `description`, `image`, `replyid`, `userid`) VALUES
(5, 'hair oil', '2022-03-08', 'good for hair growth', 'forum_product/cham dil-272050473_2070591639765939_4953144688621902852_n.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forumreplydoctor`
--

DROP TABLE IF EXISTS `forumreplydoctor`;
CREATE TABLE IF NOT EXISTS `forumreplydoctor` (
  `forumDoctorid` int NOT NULL,
  `reply` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forumreplydoctor`
--

INSERT INTO `forumreplydoctor` (`forumDoctorid`, `reply`, `replyid`, `userid`) VALUES
(8, 'good information', 1, 22),
(8, 'very good', 2, 2),
(8, 'good information', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `forumreplydproduct`
--

DROP TABLE IF EXISTS `forumreplydproduct`;
CREATE TABLE IF NOT EXISTS `forumreplydproduct` (
  `forumProductid` int NOT NULL,
  `reply` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forumreplyherb`
--

DROP TABLE IF EXISTS `forumreplyherb`;
CREATE TABLE IF NOT EXISTS `forumreplyherb` (
  `forumHerbid` int NOT NULL,
  `reply` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyid` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  PRIMARY KEY (`replyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `herbsforum`
--

DROP TABLE IF EXISTS `herbsforum`;
CREATE TABLE IF NOT EXISTS `herbsforum` (
  `forumID` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyID` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`forumID`),
  KEY `herbsforum_ibfk_1` (`replyID`),
  KEY `herbsforum_ibfk_2` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientpayment`
--

DROP TABLE IF EXISTS `patientpayment`;
CREATE TABLE IF NOT EXISTS `patientpayment` (
  `paymentid` int NOT NULL AUTO_INCREMENT,
  `appointmentid` int NOT NULL,
  `commission` int NOT NULL,
  `totalPayment` int NOT NULL,
  `doctorCharge` int NOT NULL,
  `patientName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DoctorName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int NOT NULL,
  PRIMARY KEY (`paymentid`),
  KEY `patientPayment_ibfk_1` (`appointmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patientrate`
--

DROP TABLE IF EXISTS `patientrate`;
CREATE TABLE IF NOT EXISTS `patientrate` (
  `patientRateid` int NOT NULL AUTO_INCREMENT,
  `feedback` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int NOT NULL,
  `doctorid` int NOT NULL,
  `doctorName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `patientName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`patientRateid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patientrate`
--

INSERT INTO `patientrate` (`patientRateid`, `feedback`, `userid`, `doctorid`, `doctorName`, `date`, `patientName`) VALUES
(1, 'very friendly', 22, 4, 'A.U.Jayaweera', '2022-03-27', ''),
(2, 'he was nice', 22, 6, 'W.M.S.Perera', '2022-03-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `userid` int NOT NULL,
  `nic` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`userid`, `nic`, `image`) VALUES
(2, '98302044v', 'medical_records/managers-looking-.jpg'),
(3, '983456124v', 'medical_records/unnamed (1).jpg'),
(4, '200063502850', 'medical_records/pdf.png'),
(5, '950739281891', 'medical_records/pdf.png'),
(21, '980730245v', 'medical_records/ayurveda.jpg'),
(22, '986012303V', 'medical_records/DSC_5703.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

DROP TABLE IF EXISTS `paymenthistory`;
CREATE TABLE IF NOT EXISTS `paymenthistory` (
  `paymentHistoryNumber` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `channelingID` int NOT NULL,
  `paymentID` int NOT NULL,
  `amount` double NOT NULL,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorID` int NOT NULL,
  `patientID` int NOT NULL,
  PRIMARY KEY (`paymentHistoryNumber`),
  KEY `doctorID` (`doctorID`),
  KEY `patientID` (`patientID`),
  KEY `channelingID` (`channelingID`),
  KEY `paymentID` (`paymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productcommission`
--

DROP TABLE IF EXISTS `productcommission`;
CREATE TABLE IF NOT EXISTS `productcommission` (
  `feesID` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productid` int NOT NULL,
  `userID` int NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`feesID`),
  KEY `userID` (`userID`),
  KEY `productcommission_ibfk_2` (`productid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productcommission`
--

INSERT INTO `productcommission` (`feesID`, `date`, `amount`, `productid`, `userID`, `status`, `productName`) VALUES
(3, '2021-12-09', '35', 33, 2, 'completed', 'Product One'),
(4, '2021-12-23', '40', 34, 2, 'completed', 'Product two'),
(5, '2022-01-05', '40', 35, 2, 'completed', 'Product three'),
(6, '2022-01-06', '54', 36, 2, 'completed', 'Product Four'),
(7, '2022-01-08', '52.50', 37, 2, 'completed', 'Product Five'),
(8, '2022-01-17', '52.50', 38, 2, 'completed', 'Product Six'),
(9, '2022-02-09', '30.00', 39, 2, 'completed', 'Product Seven'),
(10, '2022-02-12', '37.50', 40, 2, 'completed', 'Product Eight'),
(11, '2022-02-14', '30.00', 41, 3, 'completed', 'Product Five two'),
(12, '2022-02-16', '105.00', 42, 2, 'completed', 'Product Nine'),
(13, '2022-03-09', '100', 46, 2, 'completed', 'Product Five three'),
(14, '2022-03-16', '105', 50, 2, 'completed', 'Product Five'),
(21, '2022-03-29', '67.50', 57, 2, 'completed', 'Nawarathna Oil'),
(22, '2022-06-25', '0', 58, 2, 'not_completed', 'Product Eight t'),
(23, '2022-06-26', '0', 59, 2, 'not_completed', 'Product Five two');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productid` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int NOT NULL,
  `description` varchar(800) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sellerName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `sellerid` int NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `sellerid` (`sellerid`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productName`, `productPrice`, `description`, `image`, `category`, `sellerName`, `address`, `tpNumber`, `sellerid`) VALUES
(1, 'Venivel Body Wash', 400, 'Antibacterial Cleanser Satkara Venivel Body Wash 300ml Product of Ayurvedic Drugs Corporation', 'seller_products/Pssanka2-images (4).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(3, 'Dharani Oil', 250, 'Dharani Oil is a variant of a classical recipe, Dharani oil is an invigorating blend of herbs including Himalayan Cedar, Ginger and Rasna processed in the juice of tamarind leaves, in sesame oil base. This energizing blend of herbs is vital for balancing kapha dosha.', 'seller_products/Pssanka2-images (2).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(4, 'Product One seller two', 350, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (3).jpg', 'Product', 'P.S.Sankalpa', 'ffdafafaf/fadfaf/afadfad', 113253627, 1),
(5, 'Karela Jamun Juice', 200, 'This bottle purifies blood,control blood sugar level,improves liver function,beneficial for skin health,aids in weight management', 'seller_products/Pssanka2-images.jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(6, 'Ashwagandha ', 120, 'This product contains chemicals that might help calm the brain,reduce swelling,lower blood pressure and alter the imune system', 'seller_products/Pssanka2-images (5).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(8, 'Gotu Kola', 301, 'Gotu kola is a perennial plant native to India Japan China Indonesia South Africa Srilanka and the Soth Pacific.It thrives in and around water', 'seller_products/Pssanka2-Gotu kola.jpg', 'Herb', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(9, 'Maha Neelyadi Thailaya', 500, 'This oil bottle have been used as an important self-care regimen since Vedic times.', 'seller_products/Pssanka2-ayur_head_massag.jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(10, 'Product Seven', 240, 'Bala Thailam is a widely used effective Ayurvedic oil for various neurological diseases andrheunatoid disorder', 'seller_products/Pssanka2-images (4).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(16, 'Cumin Seeds', 200, 'Cumin seeds are actually dry fruits known as schizocarps.They are thin yellowish brown elongated ovals about 6 mm long', 'seller_products/Pssanka2-Cumin.jpg', 'Herb', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(17, 'SLIMDERM', 123, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/Pssanka2-images (5).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(57, 'Nawarathna Oil', 225, 'Navratna Oil is a multi-benefit cooling oil that is enriched with herbal extracts. It is used for head and body massage and is effective for both men and women. A massage with Navratna oil relaxes the muscles. It imparts a cooling effect on the scalp and body.', 'seller_products/Pssanka2-images (3).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productsforum`
--

DROP TABLE IF EXISTS `productsforum`;
CREATE TABLE IF NOT EXISTS `productsforum` (
  `forumID` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `replyID` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`forumID`),
  KEY `replyID` (`replyID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_fees`
--

DROP TABLE IF EXISTS `registration_fees`;
CREATE TABLE IF NOT EXISTS `registration_fees` (
  `feesID` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registration_Number` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`feesID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `replyId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`replyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resetpassword`
--

DROP TABLE IF EXISTS `resetpassword`;
CREATE TABLE IF NOT EXISTS `resetpassword` (
  `resetid` int NOT NULL AUTO_INCREMENT,
  `resetEmail` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resetSelector` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `restTocken` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `resetExpires` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`resetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewid` int NOT NULL AUTO_INCREMENT,
  `review` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `reviewerid` int NOT NULL,
  `reviewerName` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `articleID` int NOT NULL,
  PRIMARY KEY (`reviewid`),
  KEY `reviewerid` (`reviewerid`),
  KEY `articleID` (`articleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `scheduleid` int NOT NULL AUTO_INCREMENT,
  `slotNumber` int NOT NULL,
  `dateofSlot` date NOT NULL,
  `arrivalTime` time(1) NOT NULL,
  `departureTime` time(6) NOT NULL,
  `noOfPatient` int NOT NULL,
  `timePerPatient` time(6) NOT NULL,
  `doctorCharge` decimal(65,0) NOT NULL,
  `doctorNote` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int NOT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `doctorid` (`doctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `slotNumber`, `dateofSlot`, `arrivalTime`, `departureTime`, `noOfPatient`, `timePerPatient`, `doctorCharge`, `doctorNote`, `doctorid`) VALUES
(3, 1, '2022-06-27', '00:00:00.0', '12:00:00.000000', 12, '00:00:16.000000', '1500', 'Be on Time for the Appointment', 6),
(4, 2, '2022-06-27', '00:00:00.0', '09:00:00.000000', 12, '00:00:16.000000', '2500', 'Be on Time for the Appointment', 2),
(5, 1, '2022-06-27', '00:00:00.0', '12:00:00.000000', 10, '00:00:16.000000', '2000', 'Rs.500 off  from the second visit', 6),
(8, 21, '2022-06-27', '08:00:00.0', '09:00:00.000000', 8, '00:00:16.000000', '2500', 'gdfjlhjlg', 2),
(9, 32, '2022-06-27', '08:00:00.0', '09:00:00.000000', 3, '00:00:15.000000', '2500', 'lofrkpgsmpvsfkpg rgfsfsvfs', 2),
(11, 121, '2022-06-27', '09:47:00.0', '10:47:00.000000', 4, '00:00:16.000000', '2400', 'gdfjlhjlg', 2),
(13, 12, '2022-06-27', '10:50:00.0', '11:50:00.000000', 4, '00:00:15.000000', '2400', 'gdfjlhjlg', 2),
(14, 1, '2022-06-27', '09:00:00.0', '11:00:00.000000', 10, '00:00:12.000000', '2000', 'Rs.500 off  from the second visit', 4),
(15, 2, '2022-06-27', '13:00:00.0', '17:00:00.000000', 24, '00:00:10.000000', '1500', 'Rs.500 off  from the second visit', 4),
(16, 1, '2022-06-27', '08:00:00.0', '11:00:00.000000', 18, '00:00:10.000000', '2000', 'Doctor\'s Payment', 4),
(17, 3, '2022-06-27', '08:00:00.0', '22:22:00.000000', 54, '00:00:16.000000', '2500', 'Note', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `userid` int NOT NULL,
  `nameWithInitials` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `registrationNumber` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `nic` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `tempdonations`
--

DROP TABLE IF EXISTS `tempdonations`;
CREATE TABLE IF NOT EXISTS `tempdonations` (
  `donationid` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `userid` int NOT NULL,
  PRIMARY KEY (`donationid`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Patientid`) REFERENCES `patients` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`scheduleid`) REFERENCES `schedule` (`scheduleid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articlereviews`
--
ALTER TABLE `articlereviews`
  ADD CONSTRAINT `articlereviews_ibfk_1` FOREIGN KEY (`articleid`) REFERENCES `articles` (`articleid`) ON UPDATE CASCADE;

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channelingpayments`
--
ALTER TABLE `channelingpayments`
  ADD CONSTRAINT `channelingpayments_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channelingpayments_ibfk_2` FOREIGN KEY (`patientid`) REFERENCES `patients` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channelingpayments_ibfk_3` FOREIGN KEY (`channelingid`) REFERENCES `appointments` (`appointmentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channeling_history`
--
ALTER TABLE `channeling_history`
  ADD CONSTRAINT `channeling_history_ibfk_1` FOREIGN KEY (`channelingID`) REFERENCES `appointments` (`appointmentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channeling_history_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channeling_history_ibfk_3` FOREIGN KEY (`patientID`) REFERENCES `patients` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commission`
--
ALTER TABLE `commission`
  ADD CONSTRAINT `commission_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorforum`
--
ALTER TABLE `doctorforum`
  ADD CONSTRAINT `doctorforum_ibfk_1` FOREIGN KEY (`replyID`) REFERENCES `reply` (`replyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorforum_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `common_user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `herbsforum`
--
ALTER TABLE `herbsforum`
  ADD CONSTRAINT `herbsforum_ibfk_1` FOREIGN KEY (`replyID`) REFERENCES `reply` (`replyId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `herbsforum_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `common_user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `patientpayment`
--
ALTER TABLE `patientpayment`
  ADD CONSTRAINT `patientPayment_ibfk_1` FOREIGN KEY (`appointmentid`) REFERENCES `appointments` (`appointmentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD CONSTRAINT `paymenthistory_ibfk_1` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymenthistory_ibfk_2` FOREIGN KEY (`patientID`) REFERENCES `patients` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymenthistory_ibfk_3` FOREIGN KEY (`channelingID`) REFERENCES `appointments` (`appointmentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymenthistory_ibfk_4` FOREIGN KEY (`paymentID`) REFERENCES `channelingpayments` (`paymentid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `sellers` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productsforum`
--
ALTER TABLE `productsforum`
  ADD CONSTRAINT `productsforum_ibfk_1` FOREIGN KEY (`replyID`) REFERENCES `reply` (`replyId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productsforum_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `common_user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `registration_fees`
--
ALTER TABLE `registration_fees`
  ADD CONSTRAINT `registration_fees_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `common_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`reviewerid`) REFERENCES `common_user` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`articleID`) REFERENCES `articles` (`articleid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
