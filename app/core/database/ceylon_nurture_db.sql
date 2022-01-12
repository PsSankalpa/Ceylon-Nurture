-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2022 at 01:13 PM
-- Server version: 8.0.21
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `articleid` int NOT NULL AUTO_INCREMENT,
  `articleName` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uses` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sideEffects` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `precautions` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `interactions` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dosing` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`articleid`),
  KEY `doctorid` (`doctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleid`, `articleName`, `description`, `uses`, `sideEffects`, `precautions`, `interactions`, `dosing`, `image`, `doctorid`, `date`) VALUES
(2, 'Ashwagandha', 'Ashwagandha is an evergreen shrub that grows in Asia and Africa. It is commonly used for stress. There is little evidence for its use as an \"adaptogen.\"\r\nAshwagandha contains chemicals that might help', 'Possibly Effective for,\r\nStress. Taking ashwagandha by mouth seems to help reduce stress in some people. It might also help reduce stress-related weight gain.\r\nThere is interest in using ashwagandha f', 'When taken by mouth: \r\nAshwagandha is possibly safe when used for up to 3 months. The long-term safety of ashwagandha is not known. Large doses of ashwagandha might cause stomach upset, diarrhea, and ', 'Pregnancy: It is likely unsafe to use ashwagandha when pregnant. There is some evidence that ashwagandha might cause miscarriages.\r\nBreastfeeding: There isn\'t enough reliable information to know if as', 'Moderate Interaction\r\nBe cautious with this combination\r\nMedications that decrease the immune system (Immunosuppressants) interacts with ASHWAGANDHA\r\nAshwagandha seems to increase the immune system. T', 'Ashwagandha has most often been used by adults in doses up to 1000 mg daily, for up to 12 weeks. Speak with a healthcare provider to find out what dose might be best for a specific condition.\r\n', 'articles_images/ashwagandha-.jpg', 2, '2021-12-26'),
(3, 'Boswellia', 'Boswellia, also known as Indian frankincense or olibanum, is made from the resin of the Boswellia serrata tree. It’s known for its easily recognizable spicy, woody aroma.', '', '', '', '', '', 'articles_images/boswellia-serrata-planet.jpg', 2, '2021-12-26'),
(4, 'Triphala', 'Triphala is an Ayurvedic remedy consisting of the following three small medicinal fruits (26Trusted Source):\r\namla (Emblica officinalis, or Indian gooseberry)\r\nbibhitaki (Terminalia bellirica)\r\nharita', '', '', '', '', '', 'articles_images/triphala-herbal-plant.jpg', 2, '2021-12-26'),
(5, 'Brahmi', 'Brahmi (Bacopa monieri) is a staple herb in Ayurvedic medicine.\r\nAccording to test-tube and animal studies, brahmi appears to have strong anti-inflammatory properties that are as effective as common NSAIDs', '', '', '', '', '', 'articles_images/Brahmi-Oil1.jpg', 4, '2021-12-26'),
(6, 'Calendula', 'Calendula (Calendula officinalis) is a plant known as pot marigold. It is not the same as ornamental marigolds of the Tagetes genus grown in vegetable gardens.Calendula is native to Asia and southern Europe\r\n', 'We currently have no information for CALENDULA Uses.', 'When taken by mouth: Preparations of calendula flower are likely safe for most people.\r\nWhen applied to the skin: Preparations of calendula flower are likely safe for most people.', 'Pregnancy: Don\'t take calendula by mouth if you are pregnant. It is likely unsafe. There is a concern that it might cause a miscarriage. It\'s best to avoid topical use as well until more is known.\r\nBreastfeeding: There isn\'t enough reliable information to know if calendula is safe to use when breast-feeding. Stay on the safe side and avoid use.', 'Calendula might cause sleepiness and drowsiness. Medications that cause sleepiness are called sedatives. Taking calendula along with sedative medications might cause too much sleepiness.\r\nSome sedative medications include clonazepam (Klonopin), lorazepam (Ativan), phenobarbital (Donnatal), zolpidem (Ambien), and others.', 'There isn\'t enough reliable information to know what an appropriate dose of calendula might be. Keep in mind that natural products are not always necessarily safe and dosages can be important. Be sure to follow relevant directions on product labels and consult a healthcare professional before using.', 'articles_images/Calendula.jpg', 2, '2022-01-04'),
(22, 'Cumin', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that ', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'Cumin is a spice native to the Mediterranean and Southwest Asia.  It is made from the seeds of the Cuminum cyminum plant,  which are known for their distinctive earthy, nutty, and spicy flavor.   Research shows that cumin may boost the activity of digestive   enzymes and facilitate the release of bile from the liver,  speeding digestion and easing the digestion of fats', 'articles_images/Cumin.jpg', 2, '2022-01-05'),
(23, ' Turmeric', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', ' Turmeric, the spice that gives curry its characteristic yellow color, is another popular   Ayurvedic remedy.  Curcumin, its main active compound, has powerful antioxidant and anti-inflammatory properties.   Test-tube research shows that it may be equally', 'articles_images/Turmeric.jpg', 2, '2022-01-06'),
(24, ' Licorice root', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', ' Licorice root, which is native to Europe and Asia,  comes from the Glycyrrhiza glabra plant and holds a central place in Ayurvedic medicine.  Test-tube and human studies suggest that licorice root may help reduce inflammation', 'articles_images/Licorice root.jpg', 2, '2022-01-07'),
(25, ' Gotu kola', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', ' Gotu kola (Centella asiatica), or \'the-herb of longevity,\'   is another popular Ayurvedic remedy. It is made from a tasteless,  odorless plant with fan-shaped green leaves that grows in and around water.', 'articles_images/Gotu kola.jpg', 2, '2022-01-08'),
(26, ' Bitter melon', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', ' Bitter melon (Momordica charantia) is a tropical vine   closely related to zucchini, squash, cucumber, and pumpkin. It is considered   a staple in Asian cuisine and packed with nutrients and powerful antioxidants.', 'articles_images/Bitter melon.jpg', 2, '2022-01-09'),
(27, ' Cardamom', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', ' Cardamom (Elettaria cardamomum), which is sometimes referred to as the queen of spices,  has been part of Ayurvedic medicine since ancient times.  Research suggests that cardamom powder may help reduce blood pressure in people with ', 'articles_images/Cardamom.jpg', 2, '2022-01-10');

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
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DoctorID` int NOT NULL,
  `PatientID` int NOT NULL,
  `scheduleID` int NOT NULL,
  PRIMARY KEY (`channelingid`),
  KEY `DoctorID` (`DoctorID`),
  KEY `PatientID` (`PatientID`),
  KEY `scheduleID` (`scheduleID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `channeling`
--

INSERT INTO `channeling` (`channelingid`, `doctorName`, `patientName`, `recordNumber`, `amount`, `date`, `category`, `description`, `DoctorID`, `PatientID`, `scheduleID`) VALUES
(1, 'B.A.Sankalpa', 'Natasha Perera', 1, 3500, '2021-12-09', 'Arthritis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed viverra sapien. Vestibulum congue rutrum velit, ut dapibus diam facilisis quis. Phase', 2, 5, 4),
(6, 'W.M.S.Perera\r\n', 'B.A.Sankalpa', 2, 2300, '2021-12-22', 'Handi', 'no description', 6, 3, 3);

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

--
-- Dumping data for table `channelingpayments`
--

INSERT INTO `channelingpayments` (`paymentid`, `doctorCharges`, `hospitalCharges`, `commision`, `amount`, `doctorid`, `patientid`, `channelingid`) VALUES
(1, 2500, 800, 200, 3500, 2, 5, 1);

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
  `verify_token` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `common_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `common_user`
--

INSERT INTO `common_user` (`userid`, `nameWithInitials`, `verify_token`, `fname`, `lname`, `username`, `gender`, `dob`, `common_user_id`, `email`, `tpNumber`, `password`) VALUES
(1, 'g.h.k.piyummmm', '', 'Piyum', 'Sankalpa', 'PsSanka', 'Male', '2021-10-12', 'Ep6JzzmGIQkJlSZYfkJjiFXDDP7h8MZYkrtxIi6W1LjIgQWN0H', 'ps@gmail.com', 113253627, '$2y$10$FXQiTH5vWeioK5sfFMRIJOtUXC8wfHZve29dqX15mSFq/8M.aFxje'),
(2, 'B.A.Sankalpa', '89ef68ceecd05addb2e8129c3b797b00', 'Piyum', 'Sankalpa', 'Pssanka2', 'Male', '0000-00-00', 'BBTv9NYPL4ydsSDSXw3WxynaPVtkh1yCEWsFIdzCbxLduHVwGM', 'piyumsankalpaps@gmail.com', 1124857385, '$2y$10$VLmMzQah/ePr1V9eM4BttekUNRymXoJ0vZr4xzImW3bDcXcFAJoOS'),
(3, 'B.A.Sankalpa', '', 'PSSanka', 'Sanka', 'PSSankaps', '', '0000-00-00', '1lObAnUEI9U4DaAWf2Bn4MGivjyxlh3FtjlBHA5Jf0PfHauvp4', 'PSSanka@gmail.com', 118372648, '$2y$10$1D9ZFE0eKkoqJ4m9KPeWR.LHBMK2M0o4n7pllB3taWMCOZGNRXxyy'),
(4, '', 'f317bfd94e96b1032d632deefee53030', 'Avishi', 'Jayaweera', 'Avishi', '', '0000-00-00', 'TQO7ihOxFUBA0bDOMvVKlJiKD4EGxstg0vM1U2imq1p46nhdLl', 'avijayaweera1@gmail.com', 761234567, '$2y$10$kL2SHzWDi.lysU562uCR7uVd7QGAptEBIGuaIHwu89VFDF8DP1uW6'),
(5, '', '', 'Zen', 'Singh', 'ZenS', '', '0000-00-00', 'zl79aHzFCxD71JmcekpQMt5o7HHS9ADH3uw2d4YIXBfUFoMdIm', 'zen@gmail.com', 761234566, '$2y$10$bsff4dG.wEcGkQ.jLh8q..r5VY7KYsGb/eFdlprdRWvSHOo/j8eba'),
(6, '', '', 'Sanath', 'Perera', 'SanathP', '', '0000-00-00', '8mixHJLXTH3kN3O8zJc2mHw2ZTNRuCruEsNW8BprnhyJ1eWVfw', 'sanath@gmail.com', 761234566, '$2y$10$orsCbxjYk71gFRyXv.Vw0uWB9gUCqcJVd/HbzoYS9bIZRrOavrDra'),
(7, '', '', 'Nihal', 'Kumara', 'NihalK', '', '0000-00-00', 'TfBsSZfbHPPRXqRssQ9JCKmO2EoQqzrwCJEjC0El9hWuVyIgcG', 'nihal@gmail.com', 711234567, '$2y$10$E18n2ToCZcKHBnM9ruNdJu0npjtMb5OdW1RXAfj9quStKNfvViDpC'),
(8, 'J.Mary Kyle', '', 'Mary', 'Kyle', 'MaryK', 'Female', '1995-03-13', 'jsTrFLP5M0UJNEP7uNerOsFXHeuyH5xj9i1EecrGkZksiyDQgb', 'maryk@gmail.com', 711234567, '$2y$10$SjeB8q3wk04mXcQrkp9WwepXbNY6uF2BgEM4r65H9HcsYpG/QESB.'),
(12, 'A.K.Cham Dil', '', 'cham', 'Dil', 'Cham Dil', 'Female', '2021-10-07', 'KsfE85T6uXp5MdmPpqwc6h0P84pn7QFgHhWnR0sqDkXvBulMxG', 'cham.dil@gmail.com', 2147483647, '$2y$10$NODjFVH4.xNzxVBdvp9h2Ot3zzVp.iK/vgHbEGEnVNEHrJrioluk.'),
(13, 'A.K.Cham Dil', '', 'cham', 'Dil', 'gggggggggg', 'Female', '2021-10-06', 'M5ZgB6PNRX1rPCq5ddqAfhN5Eshkic3PfS1deem303QPrX9b1W', 'ssss@gmail.com', 2147483647, '$2y$10$9MKyWp494oByL3SNvOeFDOtjelrrc4MAhMTZ1URQ7NgjfdCDsGIY6'),
(14, 'A.K.Cham Dil', '', 'cham', 'Dil', 'fgbsfhbgdhn', '--Select a Gender--', '2021-10-13', 'rEaOyGEB1g0L0S6cG98TiSqGCffmmBs8uAeNHXquIMH3CW6dqS', 'thushariperera333@gmail.com', 36537368, '$2y$10$QgCQROJByBauOk6issKUgePVAwsrrG8R8AA1EnmkzxiyjpmO63vpa'),
(15, 'A.K.Cham Dil', '', 'cham', 'Dil', 'ssss', 'Male', '2021-10-13', 'Lwgvbfih3fF0lAaY7UJXOj99VpRYno3ZpwO0nt216UTawZBZoC', 'ssss1@gmail.com', 2147483647, '$2y$10$DE8swX4BVeC1UZ0vpIMZF.de0S7ivljqoC3vfCf7bU6qkLBzf8bCG'),
(16, 'A.K.Cham Dil', '', 'Dil', 'nnh', 'wwwwwwwwww', 'Male', '2021-10-12', 'BNemEXXGpW7VSqoEHVbFLw4nXlS5ccYoh3g8CTTJFW1YjLIOMV', 'ssss22@gmail.com', 2147483647, '$2y$10$IbGr7zvBGd3L8Ph9oLH7ge1nrlkkNHcpViI2jazliq4f0ucxIGM4i'),
(17, 'J.S.John', '', 'John', 'Smith', 'JS', 'Male', '1998-12-06', 'yzNG3hL3dGf0nIgDobylUBihE4p0HycLb0rYWXf0hkbaU5RLmf', 'js@gmail.com', 112748593, '$2y$10$HMQPdHpHB3MtrG.a2xBqqOeSj61kY1tnI13u1Cj4mwAaCk4U3cb46'),
(20, 'Sankalpa', 'Dummy Data', 'pps', 'sd', 'PsSankasss', '--Select a Gender--', '1994-10-09', 'rICI4eBRDqbTXtxgh6kAExSs6KDyZZCGBpRrcaGP9McVZOf8VE', 'pss@gmail.com', 76496212, '$2y$10$nIsI0690d/bYHbjjoEBvRelXucL7zyL7pXYSYMZP5eIGtDoopalzm');

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
  `dob` date NOT NULL,
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

INSERT INTO `doctors` (`userid`, `nameWithInitials`, `gender`, `dob`, `registrationNumber`, `specialities`, `hospital`, `city`, `address`, `image`) VALUES
(2, 'B.A.Sankalpa', 'male', '1998-04-06', '435636363hg56', 'Handi', 'Ambagaha yata sewana', 'Homagama', '404/A3,ewewerw,rwrwrw,rwrwrw', 'doctor_qualification/depositphotos_102710504-stock-illustration-natural-wellness-logo.jpg'),
(4, 'A.U.Jayaweera', 'female', '2000-05-14', '1234567', 'Internal Medicine', 'Nuga Uyana', 'Rathnapura', 'No 12,Main Street,Rathnapura', 'doctor_qualification/doctor certificate.jpg'),
(6, 'W.M.S.Perera', 'male', '1957-03-12', 'RGS045876', 'Internal Medicine', 'Osu Sewana', 'Kandy', 'No 12,Park Street,Ahungalla', 'doctor_qualification/certificat_03.jpg'),
(8, 'J.Mary Kyle', 'Female', '1995-03-13', 'RGS0175642', 'Salakya Chikitsa', 'Osu Wimana', 'Kurunegala', 'No 21/A Main Street Kurunegala', 'doctor_qualification/certificate 2.jpg'),
(12, 'A.K.Cham Dil', 'Female', '2021-10-07', '7685757', 'dbgdb', 'gggggg', 'vgyjh', 'jfhjhfj', 'doctor_qualification/depositphotos_83302214-stock-photo-happy-doctor-man-smiling.jpg'),
(15, 'A.K.Cham Dil', 'Male', '2021-10-13', '7685757', 'general physician', 'General Hospital', 'Colombo', '24456dq', 'doctor_qualification/admin_chart2.png'),
(16, 'A.K.Cham Dil', 'Male', '2021-10-12', '7685757', 'general physician', 'General Hospital', 'piliyandala', '24456dq', 'doctor_qualification/1.jpg'),
(20, 'Sankalpa', '--Select a Gender--', '1994-10-09', 'fafafaf12', 'Handi', 'ABC', 'Homagama', '610/05,3rd Lane, Gabadawaththa ii, Pitipana City, Homagama.', 'doctor_qualification/Gotu kola.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `feesID` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `userName` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `donationNumber` int NOT NULL,
  `userID` int NOT NULL,
  PRIMARY KEY (`feesID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forumdoctor`
--

DROP TABLE IF EXISTS `forumdoctor`;
CREATE TABLE IF NOT EXISTS `forumdoctor` (
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `location` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `forumDoctorid` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`forumDoctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forumdoctor`
--

INSERT INTO `forumdoctor` (`name`, `description`, `tpNumber`, `location`, `forumDoctorid`) VALUES
('Dr. Sunil Perera', 'I went to Dr. Sunil Perera to get treatments for my leg pain and he diagonised the problem very well and now i am getting well. so i would like to recommend him.', 2147483647, ' General Hospital, Anuradhapura', 8),
('Chamodi Dilshani', 'amazing doctor', 2147483647, 'Colombo 5', 9),
('A.K.CHAMODI DILSHANI', 'amazing doctor', 2147483647, 'Colombo 5', 10);

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
(12, '678388V', 'medical_records/65210920-black-wood-panels-background.jpg'),
(16, '678388V', 'medical_records/240_F_437556982_qpg2D5yVDYnQaqttF3uzTiuLqQ7bxuud.jpg');

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

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`paymentHistoryNumber`, `date`, `channelingID`, `paymentID`, `amount`, `userName`, `doctorID`, `patientID`) VALUES
(1, '2021-12-09', 1, 1, 3500, '', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `productid` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` int NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sellerName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tpNumber` int NOT NULL,
  `sellerid` int NOT NULL,
  PRIMARY KEY (`productid`),
  KEY `sellerid` (`sellerid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productName`, `productPrice`, `description`, `image`, `category`, `sellerName`, `address`, `tpNumber`, `sellerid`) VALUES
(1, 'Product One', 400, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (1).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(3, 'Product Two', 250, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (2).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(4, 'Product One seller two', 350, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/images (3).jpg', 'Product', 'P.S.Sankalpa', 'ffdafafaf/fadfaf/afadfad', 113253627, 1),
(5, 'Product Three', 200, 'dsdsf fsffsfds gfgdfgdf dghdghdgh dghdghdghdg dfhdfh dfhdf dfghdf', 'seller_products/images (4).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(6, 'Product Four', 120, 'dsfsdg hgjfj fjfjfgj afrete dgsrgrhyrvv dsfgsgsfh d eredfd gsdgsvsdgtsd dfgsd sdg', 'seller_products/images (5).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(8, 'Product Five', 301, 'fdfsgs sgsgsg sgsgsg sgsgs ssgsgsg sgssgsfgsfg sfg sfgs gs gs', 'seller_products/images (7).jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(9, 'Product Six', 500, 'fhghdh jfgjfgjfg grtgeter vbfdgdfhdf dfh dfhdfhfsd fgsdgsgsgs', 'seller_products/images.jpg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(10, 'Product Seven', 240, 'fdfgsdgs gfdhgjh jkkfhjgdhdfhf hdghdghdgj gjfjfgjfjfg fgj fgj fgjfg', 'seller_products/image(8).jpeg', 'Product', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2),
(16, 'Herb one', 200, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis, dignissimos omnis vel mole', 'seller_products/Cumin.jpg', 'Herb', 'B.A.Sankalpa', '404/A1/13,pitipana north,Homagama', 1124857385, 2);

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
  `arrivalTime` time(4) NOT NULL,
  `departureTime` time(6) NOT NULL,
  `noOfPatient` int NOT NULL,
  `timePerPatient` time(6) NOT NULL,
  `doctorCharge` decimal(65,0) NOT NULL,
  `doctorNote` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `doctorid` int NOT NULL,
  PRIMARY KEY (`scheduleid`),
  KEY `doctorid` (`doctorid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleid`, `slotNumber`, `dateofSlot`, `arrivalTime`, `departureTime`, `noOfPatient`, `timePerPatient`, `doctorCharge`, `doctorNote`, `doctorid`) VALUES
(1, 1, '2021-10-20', '00:00:08.0000', '00:00:12.000000', 12, '00:00:16.000000', '1500', 'Rs.500 off  from the second visit', 4),
(3, 1, '2021-10-23', '00:00:08.3000', '12:00:00.000000', 12, '00:00:16.000000', '1500', 'Be on Time for the Appointment', 6),
(4, 2, '2021-10-23', '08:00:00.0000', '09:00:00.000000', 12, '00:00:16.000000', '2500', 'Be on Time for the Appointment', 2),
(5, 1, '2021-10-24', '00:00:09.0000', '12:00:00.000000', 10, '00:00:16.000000', '2000', 'Rs.500 off  from the second visit', 6);

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
(7, 'J.Nihal Kumara', 'RGS0175642', 711234567, '681234512V', 'No 26/B ,Main Road,Matara', 'seller_certificates/certificat_03.jpg'),
(16, 'A.K.Cham Dil', '7685757', 2147483647, '678388V', '24456', 'seller_certificates/landing.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channeling`
--
ALTER TABLE `channeling`
  ADD CONSTRAINT `channeling_ibfk_1` FOREIGN KEY (`DoctorID`) REFERENCES `doctors` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channeling_ibfk_2` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `channeling_ibfk_3` FOREIGN KEY (`scheduleID`) REFERENCES `schedule` (`scheduleid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `channelingpayments`
--
ALTER TABLE `channelingpayments`
  ADD CONSTRAINT `channelingpayments_ibfk_1` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `channelingpayments_ibfk_2` FOREIGN KEY (`patientid`) REFERENCES `patients` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `channelingpayments_ibfk_3` FOREIGN KEY (`channelingid`) REFERENCES `channeling` (`channelingid`) ON UPDATE CASCADE;

--
-- Constraints for table `channeling_history`
--
ALTER TABLE `channeling_history`
  ADD CONSTRAINT `channeling_history_ibfk_1` FOREIGN KEY (`channelingID`) REFERENCES `channeling` (`channelingid`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `paymenthistory_ibfk_3` FOREIGN KEY (`channelingID`) REFERENCES `channeling` (`channelingid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymenthistory_ibfk_4` FOREIGN KEY (`paymentID`) REFERENCES `channelingpayments` (`paymentid`) ON UPDATE CASCADE;

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
