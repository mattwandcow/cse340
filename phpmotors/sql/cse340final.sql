-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: db5001370268.hosting-data.io
-- Generation Time: Jul 15, 2021 at 07:43 PM
-- Server version: 5.7.32-log
-- PHP Version: 7.0.33-0+deb9u10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs1161479`
--
CREATE DATABASE IF NOT EXISTS `dbs1161479` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbs1161479`;

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used'),
(10, 'Van'),
(11, 'Tank');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientID` int(11) NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientID`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(13, 'Matthais', 'Wilson', 'mattwandcow@yahoo.com', '$2y$10$PA9ztMJ7hUfcveP9Ar9wKOQfK6f4eKGxr0YbWDwZhcuX7E.69B6U2', '1', NULL),
(15, 'Raechael', 'Redd', 'Red@mad-matt.com', '$2y$10$HJOFrnu5O72bsIR2APAXluvHlzW94N1icwKCsVleBuHq57GET.zBC', '1', NULL),
(16, 'Rae', 'Red', 'Rae@mad-matt.com', '$2y$10$nTVILo/jhwzeC4xVDSX3Dup5WguYM9bVaN7FOaZrsdT35LquR/7WK', '1', NULL),
(17, 'Tim', 'Torpedo', 'tt@mad-matt.com', '$2y$10$JTgWxaVEmIVDr4BZgJFOleewM4RDg4HClmaec1Ph.LfEWVN17q/TG', '1', NULL),
(18, 'Squirtle', 'Squirtle', 'squirtle@squirtle.com', '$2y$10$ZNQRf3IwkQTZgX.KHeQikujr7CWQGRMO.Nc9aIf8gi4JXaFkQ1x4m', '1', NULL),
(19, 'natu', 'tu!', 'natu@natu.natu', '$2y$10$yes16P22sugXOl8d/PgrNOqoxFMkv33VPmjWwwLD8a1afv.L7SuM.', '1', NULL),
(20, 'Jenny', 'Cop', 'jc@vcpd.com', '$2y$10$YoSDpLAzI6VuG6Jwp/8U/eXj34Il8AWRtGgTBL5an19ulBnL4XUc2', '1', NULL),
(21, 'gem', 'inim', 'gg@g.com', '$2y$10$eeoipGgrlxSdRBpsvfigC.qpvod2cYxEhTXdrgddeRnPhVY4VnP/i', '1', NULL),
(22, 'Admin', 'Strator', 'admin@cse340.net', '$2y$10$glWtz0MDE05HMLTUJg3PGOepl/PNFR2GbnTrl1N1zoDnE3nYfP5wm', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(11) NOT NULL,
  `imgName` varchar(100) NOT NULL,
  `imgPath` varchar(150) NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imgPrimary` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(19, 2, 'model-t.jpg', '../images/vehicles/model-t.jpg', '2021-07-03 23:21:53', 1),
(20, 2, 'model-t-tn.jpg', '../images/vehicles/model-t-tn.jpg', '2021-07-03 23:21:53', 1),
(21, 3, 'adventador.jpg', '../images/vehicles/adventador.jpg', '2021-07-03 23:22:40', 1),
(22, 3, 'adventador-tn.jpg', '../images/vehicles/adventador-tn.jpg', '2021-07-03 23:22:40', 1),
(23, 4, 'monster-truck.jpg', '../images/vehicles/monster-truck.jpg', '2021-07-03 23:47:51', 1),
(24, 4, 'monster-truck-tn.jpg', '../images/vehicles/monster-truck-tn.jpg', '2021-07-03 23:47:54', 1),
(25, 5, 'mechanic.jpg', '../images/vehicles/mechanic.jpg', '2021-07-03 23:23:55', 1),
(26, 5, 'mechanic-tn.jpg', '../images/vehicles/mechanic-tn.jpg', '2021-07-03 23:23:55', 1),
(27, 6, 'batmobile.jpg', '../images/vehicles/batmobile.jpg', '2021-07-03 23:24:05', 1),
(28, 6, 'batmobile-tn.jpg', '../images/vehicles/batmobile-tn.jpg', '2021-07-03 23:24:05', 1),
(29, 7, 'mystery-van.jpg', '../images/vehicles/mystery-van.jpg', '2021-07-03 23:24:13', 1),
(30, 7, 'mystery-van-tn.jpg', '../images/vehicles/mystery-van-tn.jpg', '2021-07-03 23:24:13', 1),
(31, 8, 'fire-truck.jpg', '../images/vehicles/fire-truck.jpg', '2021-07-03 23:24:30', 1),
(32, 8, 'fire-truck-tn.jpg', '../images/vehicles/fire-truck-tn.jpg', '2021-07-03 23:24:30', 1),
(33, 9, 'crwn-vic.jpg', '../images/vehicles/crwn-vic.jpg', '2021-07-03 23:24:37', 1),
(34, 9, 'crwn-vic-tn.jpg', '../images/vehicles/crwn-vic-tn.jpg', '2021-07-03 23:24:37', 1),
(35, 10, 'camaro.jpg', '../images/vehicles/camaro.jpg', '2021-07-03 23:24:46', 1),
(36, 10, 'camaro-tn.jpg', '../images/vehicles/camaro-tn.jpg', '2021-07-03 23:24:46', 1),
(37, 11, 'escalade.jpg', '../images/vehicles/escalade.jpg', '2021-07-03 23:25:03', 1),
(38, 11, 'escalade-tn.jpg', '../images/vehicles/escalade-tn.jpg', '2021-07-03 23:25:03', 1),
(39, 12, 'hummer.jpg', '../images/vehicles/hummer.jpg', '2021-07-03 23:25:14', 1),
(40, 12, 'hummer-tn.jpg', '../images/vehicles/hummer-tn.jpg', '2021-07-03 23:25:14', 1),
(41, 13, 'aerocar.jpg', '../images/vehicles/aerocar.jpg', '2021-07-03 23:25:25', 1),
(42, 13, 'aerocar-tn.jpg', '../images/vehicles/aerocar-tn.jpg', '2021-07-03 23:25:25', 1),
(43, 14, 'van.jpg', '../images/vehicles/van.jpg', '2021-07-03 23:25:32', 1),
(44, 14, 'van-tn.jpg', '../images/vehicles/van-tn.jpg', '2021-07-03 23:25:32', 1),
(45, 15, 'no-image.png', '../images/vehicles/no-image.png', '2021-07-03 23:25:40', 1),
(46, 15, 'no-image-tn.png', '../images/vehicles/no-image-tn.png', '2021-07-03 23:25:40', 1),
(47, 21, 'delorean.jpg', '../images/vehicles/delorean.jpg', '2021-07-03 23:29:14', 1),
(48, 21, 'delorean-tn.jpg', '../images/vehicles/delorean-tn.jpg', '2021-07-03 23:29:14', 1),
(49, 17, 'abrams.png', '../images/vehicles/abrams.png', '2021-07-03 23:29:27', 1),
(50, 17, 'abrams-tn.png', '../images/vehicles/abrams-tn.png', '2021-07-03 23:29:27', 1),
(51, 17, 'tank2.jpg', '../images/vehicles/tank2.jpg', '2021-07-03 23:34:43', 0),
(52, 17, 'tank2-tn.jpg', '../images/vehicles/tank2-tn.jpg', '2021-07-03 23:34:43', 0),
(53, 2, 'modelt2.jpg', '../images/vehicles/modelt2.jpg', '2021-07-03 23:36:53', 0),
(54, 2, 'modelt2-tn.jpg', '../images/vehicles/modelt2-tn.jpg', '2021-07-03 23:36:53', 0),
(55, 7, 'giphy.gif', '../images/vehicles/giphy.gif', '2021-07-03 23:38:21', 0),
(56, 7, 'giphy-tn.gif', '../images/vehicles/giphy-tn.gif', '2021-07-03 23:38:21', 0),
(57, 17, 'tank3.png', '../images/vehicles/tank3.png', '2021-07-04 00:28:55', 0),
(58, 17, 'tank3-tn.png', '../images/vehicles/tank3-tn.png', '2021-07-04 00:28:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(11) NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want as long as it\'s black.', '../images/vehicles/model-t.jpg', '../images/vehicles/model-t-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '../images/vehicles/adventador.jpg', '../images/vehicles/adventador-tn.jpg', '417650', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '../images/vehicles/monster-truck.jpg', '../images/vehicles/monster-truck-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '../images/vehicles/ms-tn.jpg', '../images/vehicles/ms-tn.jpg', '100', 200, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a super hero? now you can with the batmobile. This car allows you to switch to bike mode allowing you to easily maneuver through trafic during rush hour.', '../images/vehicles/batmobile.jpg', '../images/vehicles/batmobile-tn.jpg', '65000', 2, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.	', '../images/vehicles/mystery-van.jpg', '../images/vehicles/mystery-van-tn.jpg', '10000', 12, 'Green', 10),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '../images/vehicles/fire-truck.jpg', '../images/vehicles/fire-truck-tn.jpg', '50000', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '../images/vehicles/crwn-vic.jpg', '../images/vehicles/crwn-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '../images/vehicles/camaro.jpg', '../images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '../images/vehicles/escalade.jpg', '../images/vehicles/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the spacious interiors with an engine to get you out of any muddy or rocky situation.', '../images/vehicles/hummer.jpg', '../images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '../images/vehicles/aerocar.jpg', '../images/vehicles/aerocar-tn.jpg', '1000000', 6, 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You&#39;ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. 		', '../images/vehicles/van.jpg', '../images/vehicles/van-tn.jpg', '20000', 1, 'Green', 10),
(15, 'Dog ', 'Car', 'Do you like dogs? Well this car is for you straight from the 90s from Aspen, Colorado we have the orginal Dog Car complete with fluffy ears.  ', '../images/vehicles/dog.jpg', '../images/vehicles/dog-tn.jpg', '35000', 1, 'Brown', 2),
(17, 'Abrams', 'M1', 'The M1 Abrams entered service in 1980 and currently serves as the main battle tank of the United States Army and Marine Corps.', '../images/vehicles/no-image.png', '../images/vehicles/no-image.png', '6210000', 1, 'Tan', 11),
(21, 'DMC', 'Delorean', 'OuttaTime', '/phpmotors/images/no-image.jpg', '', '52500', 1, 'Silver', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `invId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(3, 'Well worth the Price!', '2021-07-14 22:40:56', 17, 22),
(5, 'Squir-squirt.', '2021-07-15 17:16:49', 11, 18),
(6, 'Squirt squirtle!!', '2021-07-15 17:19:14', 2, 18),
(7, 'Squirt!!', '2021-07-15 17:42:58', 17, 18);

-- --------------------------------------------------------

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_client` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_client` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
