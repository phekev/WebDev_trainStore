-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 11:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g00228349`
--
CREATE DATABASE IF NOT EXISTS `g00228349` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `g00228349`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustID` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `F_Name` varchar(20) DEFAULT NULL,
  `L_Name` varchar(20) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Address1` varchar(40) DEFAULT NULL,
  `Address2` varchar(40) DEFAULT NULL,
  `Address3` varchar(40) DEFAULT NULL,
  `County` varchar(20) DEFAULT NULL,
  `AccountCreated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustID`, `Username`, `Password`, `F_Name`, `L_Name`, `Email`, `Address1`, `Address2`, `Address3`, `County`, `AccountCreated`) VALUES
(1, 'ethan', 'pass', 'Ethan ', 'Fitzgerald', 'ethan@namename.com', 'Temple House', 'Church Road', 'Chapeltown', 'Cork', '0000-00-00'),
(2, 'john', 'pass', 'John', 'Carpenter', 'johnc1987@hotmail.co', 'Apt 42', 'Round Rd.', 'Townville', 'Dublin', '0000-00-00'),
(3, 'emily', 'pass', 'Emily', 'Dooley', 'dooleyemily@yahoo.ya', '2 de Manor', 'Bourne', 'Ballyplace', 'Wexford', '0000-00-00'),
(4, 'user', 'pass', 'User', 'Name', 'user@user.com', 'U', 'S', 'E', 'R', '2022-04-27'),
(8, 'amy', 'amy', 'amy', 'amy', 'amy@amy.amy', 'amy', 'amy', 'amy', 'antrim', NULL),
(9, 'jimmy', 'jim', 'jimmy', 'jimmerson', 'jim@jimmer.jim', '', '', '', 'county', NULL),
(11, 'James', 'pass', 'James', 'Thornton', 'james@son.com', '12 Elm Lane', 'Wicker Rd.', 'Tuam', 'galway', NULL),
(12, 'James', 'pass', 'James', 'Thornton', 'james@son.com', '12 Elm Lane', 'Wicker Rd.', 'Tuam', 'galway', NULL),
(13, 'sean', 'pass', '', '', 'sean@naes.com', '', '', '', 'county', NULL),
(14, 'sean', 'pass', '', '', 'sean@naes.com', '', '', '', 'county', NULL),
(15, 'liam', 'pass', '', '', 'liam@liam', '', '', '', 'county', NULL),
(16, 'sad', 'pass', '', '', 'josd@asd', '', '', '', 'county', NULL),
(17, 'sad', 'pass', '', '', 'josd@asd', '', '', '', 'county', NULL),
(18, 'sdaf', 'asdf', '', '', 'sdaf@sadf', '', '', '', 'county', NULL),
(19, 'qwer', 'qwer', '', '', 'wqer@weqr', '', '', '', 'county', NULL),
(20, 'sadf', 'asdf', '', '', 'sdaf@sadf', '', '', '', 'county', NULL),
(21, 'sdf', '1111', '', '', 'sdf@sdf', '', '', '', 'county', NULL),
(22, 'ed', 'er', '', '', 'user@user.com', '', '', '', 'county', NULL),
(23, 'user', 'pass', 'user', 'user', 'user@us.com', '', '', '', 'county', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(4) NOT NULL,
  `CustID` int(10) DEFAULT NULL,
  `OrderDate` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustID`, `OrderDate`) VALUES
(101, 2, '23/04/2022'),
(115, 3, '05/05/2022'),
(116, 3, '05/05/2022'),
(117, 3, '05/05/2022'),
(118, 3, '05/05/2022'),
(119, 3, '05/05/2022'),
(120, 3, '05/05/2022'),
(121, 3, '06/05/2022'),
(122, 3, '06/05/2022'),
(123, 3, '06/05/2022'),
(124, 4, '06/05/2022'),
(125, 4, '06/05/2022'),
(126, 4, '06/05/2022'),
(127, 4, '06/05/2022'),
(128, 15, '06/05/2022'),
(129, 15, '06/05/2022'),
(130, 4, '09/05/2022'),
(131, 4, '09/05/2022'),
(132, 4, '09/05/2022'),
(133, 4, '09/05/2022'),
(134, 4, '09/05/2022'),
(135, 4, '09/05/2022');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `ID` int(4) NOT NULL,
  `OrderID` int(4) DEFAULT NULL,
  `ProdID` int(4) DEFAULT NULL,
  `Price` decimal(4,2) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL,
  `Total` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`ID`, `OrderID`, `ProdID`, `Price`, `Quantity`, `Total`) VALUES
(1, 101, 1020, '12.99', 2, '25.98'),
(7, 122, 1008, '19.99', 8, '99.99'),
(8, 124, 1003, '17.99', 1, '17.99'),
(9, 124, 1008, '19.99', 1, '19.99'),
(10, 124, 1002, '39.99', 1, '39.99'),
(11, 124, 1024, '29.99', 1, '29.99'),
(12, 124, 1019, '39.99', 1, '39.99'),
(13, 124, 1004, '24.99', 1, '24.99'),
(14, 124, 1025, '34.99', 1, '34.99'),
(15, 124, 1014, '29.99', 1, '29.99'),
(16, 124, 1010, '13.99', 1, '13.99'),
(17, 124, 1028, '24.99', 1, '24.99'),
(18, 124, 1001, '19.99', 1, '19.99'),
(19, 126, 1001, '19.99', 1, '19.99'),
(20, 126, 1002, '39.99', 1, '39.99'),
(21, 128, 1002, '39.99', 1, '39.99'),
(22, 130, 1019, '39.99', 1, '39.99'),
(23, 130, 1026, '29.99', 2, '59.98'),
(24, 130, 1024, '29.99', 1, '29.99'),
(25, 130, 1007, '19.99', 1, '19.99'),
(26, 130, 1006, '39.99', 1, '39.99'),
(27, 132, 1019, '39.99', 1, '39.99'),
(28, 132, 1024, '29.99', 1, '29.99'),
(29, 132, 1001, '19.99', 1, '19.99'),
(30, 132, 1007, '19.99', 1, '19.99'),
(31, 132, 1026, '29.99', 2, '59.98'),
(32, 132, 1006, '39.99', 1, '39.99'),
(33, 134, 1011, '15.99', 1, '15.99'),
(34, 134, 1003, '17.99', 1, '17.99'),
(35, 134, 1012, '13.99', 1, '13.99'),
(36, 134, 1002, '39.99', 1, '39.99'),
(37, 134, 1004, '24.99', 1, '24.99'),
(38, 134, 1006, '39.99', 1, '39.99'),
(39, 134, 1014, '29.99', 1, '29.99'),
(40, 134, 1001, '19.99', 1, '19.99');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProdID` int(4) NOT NULL,
  `Name` varchar(21) DEFAULT NULL,
  `Desc` varchar(599) DEFAULT NULL,
  `Price` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProdID`, `Name`, `Desc`, `Price`) VALUES
(1001, 'Dennis', 'Dennis is a lazy diesel who doesn\'t like work, but he likes other engines to do his work.', '19.99'),
(1002, 'Diesel 10', 'Diesel 10, or simply Diesel, is an evil diesel engine with an excavator claw arm, which he has named \'Pinchy\'. He once had two minions named Splatter and Dodge, but they eventually turned on him.', '39.99'),
(1003, 'Toad', 'Toad is Oliver\'s loyal brake van who escaped from scrap with the help of Douglas.', '17.99'),
(1004, 'Hector', 'Hector (an acronym for \'Heavily Engineered Coal Truck On Rails\') is a large coal hopper truck who is good friends with Thomas and James.', '24.99'),
(1005, 'Side Tipper', 'Unnamed side tipping engine', '12.99'),
(1006, 'Gordon', 'Gordon is a big blue tender engine who works on the Main Line, and is number 4. He is Flying Scotsman\'s only surviving brother. Gordon is also one of the fastest and strongest engines on the Island of Sodor, whose main task is to pull the Wild Nor\' Wester, the railway\'s express train. At times, this leads him to feel superior and cause him to become boastful. Gordon is mainly used for passenger duties, but has occasionally pulled goods trains, to his chagrin. He is also known to haul special services such as royal trains.', '39.99'),
(1007, 'Sir Handel', 'Sir Handel, named after the Skarloey Railway\'s first owner, Sir Handel Brown I - originally named Falcon, after the works where he was built - is a blue narrow gauge saddle tank engine.', '19.99'),
(1008, 'Billy', 'William, better known by his nickname Billy, is an orange tank engine with prominent buckteeth. He is brothers with Charlie.', '19.99'),
(1009, 'Light Blue Tender', 'Coal tender, light blue in colour.', '12.99'),
(1010, 'Blue Tender', 'Coal tender, blue in colour.', '13.99'),
(1011, 'Gordon\'s Tender', 'Gordon\'s coal tender. Has Gordon\'s number, No. 4, painted on the side.', '15.99'),
(1012, 'Black Tender', 'Black coal tender. Can be used for Douglas or Donald.', '13.99'),
(1013, 'James\' Tender', 'James\' coal tender. Has James\' number, No. 5, painted on the side.', '15.99'),
(1014, 'Marion', 'Marion is an orange railway steam shovel. She usually works at the Clay Pits with Bill, Ben and Timothy, although she can be seen at any digging site on the North Western Railway.', '29.99'),
(1015, 'Edward', 'Edward is a blue mixed-traffic tender engine who works on the North Western Railway, and is number 2. He runs his own branch line with BoCo in Wellsworth, where he later moved to upon leaving Tidmouth Sheds. Edward is one of the oldest engines on Sodor and is occasionally chastised for his age. Despite this, he is wise, optimistic, and clever, spreading his knowledge and encouraging other engines. Edward also used to work with Harold at the Sodor Search and Rescue Centre, with assisting those in trouble.', '34.99'),
(1016, 'Duncan', 'Duncan is a grumpy Scottish narrow gauge well tank engine who came to the Skarloey Railway as a spare engine after Peter Sam\'s accident with some slate trucks.', '24.99'),
(1017, 'Skiff', 'Skiff is a railboat. He was originally owned by Sailor John, but now gives Railboat Tours around Arlesburgh Harbour with his new captain, Joe. Railboat?! What lunacy is this!', '30.99'),
(1018, 'Percy', 'Percy is a little green saddle tank engine who was brought to Sodor to help run the railway during Gordon, Henry and James\' strike. He is the youngest member of the Steam Team, and he is also Thomas\' best friend and is quite cheeky, often getting himself into trouble with his attempts to play tricks on the other engines. Percy works on Thomas\' Branch Line as a goods engine, but his favourite job is delivering the mail.', '39.99'),
(1019, 'Thomas', 'Thomas is a blue tank engine who works on the North Western Railway, and is number 1. When he first came to the Island of Sodor, Thomas worked as the station pilot at the big station. After helping to rescue James after a nasty accident, he was rewarded with two new coaches, Annie and Clarabel, and was tasked with running the Ffarquhar Branch Line. Aside from branch line work, Thomas performs several jobs on the railway, namely pulling passenger and goods trains. He also occasionally works as a shunter, performs odd jobs and pulls the post train with his best friend Percy.', '39.99'),
(1020, 'Molly\'s Tender', 'Molly the steam engines tender. Does not have any identifying number.', '12.99'),
(1021, 'Mail Train', 'The Mail Train is a train that consists of rolling stock used to transport letters and parcels throughout the Island of Sodor and the Mainland. Pulling the Mail Train is noted as being one of Percy\'s favourite jobs. Hong-Mei pulls the mail train in China, while Thomas pulls the Sodor Mail Train when Percy is either unavailable or overworked with his deliveries. The train commonly consists of special utility vans and a standard brake van. However, they are occasionally accompanied by open wagons and/or conflats.', '19.99'),
(1022, 'Ferdinand', 'Ferdinand is a fun-loving logging Loco who lives on Misty Island with Bash and Dash. Ferdinand appears first in Misty Island Rescue.', '24.99'),
(1023, 'Donald', 'Donald and Douglas (originally known by their old numbers, 57646 and 57647, respectively) are a pair of Caledonian Railway black mixed-traffic tender engines from Scotland, and their numbers are 9 and 10. Douglas tagged along with Donald to Sodor in order to escape from scrap, despite Donald being the only engine expected. After proving themselves to be really useful, they were both allowed to stay. They now work as utility engines on the North Western Railway; working wherever they are needed. They work primarily on the Little Western, but sometimes on Edward\'s Branch Line and the Main Line.', '24.99'),
(1024, 'Lady', 'Lady is a small, Victorian-styled tank engine who serves as the guardian of the Magic Railroad, using her magic to keep the worlds of Shining Time and Sodor alive. She is owned and protected by Burnett Stone, her driver. Lady appears in the live-action film \'Thomas and the Magic Railroad\' starring Alec Baldwin and Peter Fonda.', '29.99'),
(1025, 'Harvey', 'Harvey is a maroon tank engine with a crane mounted on top of his boiler, which makes him look rather unusual. He is involved in repair, recovery, and industrial jobs on the North Western Railway.', '34.99'),
(1026, 'Sodor Postal Delivery', 'The holiday express. One of six mail cars for the special Christmas mail deliveries.', '29.99'),
(1027, 'Iron Bert', 'Iron Bert is an engine who works at the smelters and scrapyards of the Sodor Ironworks. He has also been seen frequently working at Ffarquhar Quarry. He has a twin \'Arry.', '34.99'),
(1028, 'Annie', 'Annie is one of Thomas\' two faithful coaches, the other being Clarabel, whom he loves dearly and would never dream of being separated from. Annie and Clarabel both have seating accommodation for carrying passengers; Clarabel also has a brake compartment for luggage and a guard. The two coaches are nearly always seen coupled together, with Annie usually facing Thomas and Clarabel facing backwards.', '24.99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustID` (`CustID`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProdID` (`ProdID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProdID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProdID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1029;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `customers` (`CustID`);

--
-- Constraints for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`ProdID`) REFERENCES `products` (`ProdID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
