-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 26, 2021 at 10:20 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `productpurchase`
--

CREATE TABLE `productpurchase` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productpurchase`
--

INSERT INTO `productpurchase` (`id`, `userid`, `name`, `quantity`, `price`) VALUES
(1, 21, 'Water Melon', 2, 4),
(2, 21, 'Water Melon', 3, 6),
(3, 21, 'Milk', 3, 6.75),
(4, 21, 'Water Melon', 2, 4),
(5, 21, 'Water Melon', 2, 4),
(6, 21, 'Water Melon', 2, 4),
(7, 21, 'Water Melon', 2, 4),
(8, 21, 'Water Melon', 2, 4),
(9, 21, 'Water Melon', 2, 4),
(10, 21, 'Water Melon', 2, 4),
(11, 21, 'Water Melon', 2, 4),
(12, 21, 'Water Melon', 2, 4),
(13, 21, 'Water Melon', 2, 4),
(14, 21, 'Water Melon', 2, 4),
(15, 21, 'Milk', 2, 4.5),
(16, 21, 'Water Melon', 2, 4),
(17, 21, 'Water Melon', 2, 4),
(18, 21, 'Egg', 123, 30.75),
(19, 21, 'Water Melon', 2, 4),
(20, 21, 'Milk', 2, 4.5),
(21, 21, 'Milk', 2, 4.5),
(22, 21, 'Water Melon', 2, 4),
(23, 21, 'Water Melon', 2, 4),
(24, 21, 'Water Melon', 2, 4),
(25, 21, 'Milk', 2, 4.5),
(26, 21, 'Water Melon', 2, 4),
(27, 21, 'Milk', 2, 4.5),
(28, 21, 'Water Melon', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `cardnumber` int(11) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `fname`, `lname`, `email`, `address`, `district`, `cardName`, `cardnumber`, `cvv`, `total`) VALUES
(1, '123', '123', '', '', '', '1231', 231, '123', 200),
(2, '123123', '13123', '', '', '', '123', 1231, '123', 200),
(3, '1231', '23', '', '', '', '123', 123123, '123', 200),
(4, 'hector', 'castellanos', '', '', '', 'hector', 12312312, '1234', 200),
(5, 'asd', 'asd', '', '', '', '123', 123, '123', 200),
(6, 'asd', 'asd', '', '', '', '123', 1231, '23', 200),
(7, 'asd', '123', '', '', '123', '123', 123, '123', 200),
(8, '123', '123', '123', '', 'Corozal', '213', 123, '123', 200),
(9, '23', '123', '123', '123', 'Corozal', '123', 123, '123', 200),
(10, '123', '123', '1231', 'asd', 'Corozal', '123', 123, '123', 0),
(11, 'asd', '21', '123', '123', 'Corozal', '123', 123, '123', 2),
(12, '123', '123', '123', '123', 'Corozal', '123', 123, '23', 0),
(13, '123', '123', '123', '123', 'Corozal', '123', 123, '23', 4),
(14, '1231', '123', '123', '123', 'Corozal', '123', 123, '123', 4),
(15, '123', '123', '123', '13', 'Belize', '123', 123, '123', 4),
(16, '123', '123', '123', '13', 'Belize', '123', 123, '123', 0),
(17, '123', '123', '123', '123', 'Corozal', '123', 123, '123', 4),
(18, '123', '123', '123', '123', 'Corozal', '123', 123, '123', 4),
(19, '123', '123', '123', '123', 'Orange Walk', '123', 123, '123', 4),
(20, '123', '123', '123', '123', 'Corozal', '123', 123, '123', 5),
(21, '123', '123', '123', '123', 'Belize', '123', 123, '123', 4),
(22, '123', '123', '123', '123', 'Orange Walk', '123', 123, '123', 4),
(23, '123', '123', '123', '123', 'Orange Walk', '123', 123, '123', 0),
(24, '123', '123', '123', '123', 'Corozal', '123', 123, '123', 31),
(25, '123', '1231', '123', '123', 'Orange Walk', '123', 123, '123', 4),
(26, '123', '123', 'hectorcaste94@gmail.com', '123', 'Orange Walk', '123', 123, '123', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usersID` int(11) NOT NULL,
  `usersName` varchar(255) NOT NULL,
  `usersEmail` varchar(255) NOT NULL,
  `usersUid` varchar(255) NOT NULL,
  `usersPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usersID`, `usersName`, `usersEmail`, `usersUid`, `usersPassword`) VALUES
(4, 'Hector Castellanos', 'asd', 'hectorcaste94@gmail.com', '2'),
(21, 'Hector Castellanos', 'hectorcaste94@gmail.com', 'kurai', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productpurchase`
--
ALTER TABLE `productpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productpurchase`
--
ALTER TABLE `productpurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
