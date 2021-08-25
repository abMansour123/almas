-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 11:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almasdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminName`, `email`, `password`) VALUES
(1, 'abdelrahman', 'abdelrahman@3dos.com', '123'),
(2, 'diaa', 'dai@3dos.com ', '123'),
(3, 'nehal', 'nehal@3dos.com', '123'),
(4, 'nouran', 'nouran@3dos.com', '123'),
(5, 'Ganna', 'ganna@3dos.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `prodQuan` int(11) NOT NULL,
  `custId` int(11) NOT NULL,
  `prodId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(4) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custPassword` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `custName`, `custPassword`, `address`, `email`, `phone`) VALUES
(13, 'abdelrahman', '123', '34 almostaqbal - elsheikh zayed', 'abdelrahman@gmail.com', '01147542249'),
(17, 'rania', 'raniasherifhamdy', 'cairo', 'raniasherif895@gmail.com', '01111906102'),
(18, 'omar', 'omar1001', 'omar1001', 'omar.zain.1001@gmail.com', '01097943406'),
(19, 'ahmed@gmail.com', '123', '44 hozombol gize', 'ahmed898@gmail.com', '011111119');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(4) NOT NULL,
  `depName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `depName`) VALUES
(5, 'Marketing'),
(6, 'IT'),
(7, 'Sales'),
(8, 'HR'),
(9, 'Customer Services');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(4) NOT NULL,
  `empName` varchar(255) NOT NULL,
  `salary` int(4) NOT NULL,
  `depId` int(4) NOT NULL,
  `empEmail` varchar(255) NOT NULL,
  `empPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `empName`, `salary`, `depId`, `empEmail`, `empPass`) VALUES
(16, 'mohammed', 2300, 5, 'mohamed@emp.com', '123'),
(17, 'mahmoud', 5200, 7, 'mahmoud@emp.com', '123'),
(18, 'noha', 4300, 5, 'noha@emp.com', '123'),
(19, 'ahmed', 7800, 8, 'ahmed@emp.com', '123'),
(20, 'yousra', 4100, 8, 'yousra@emp.com', '123'),
(21, 'marwan', 1400, 9, 'marwan@emp.com', '123'),
(22, 'moomen', 6300, 8, 'moomen@emp.com', '123\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(4) NOT NULL,
  `content` varchar(255) NOT NULL,
  `custId` int(4) NOT NULL,
  `prodId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(4) NOT NULL,
  `price` int(4) NOT NULL,
  `prodQuan` int(4) NOT NULL,
  `custId` int(4) NOT NULL,
  `prodId` int(4) NOT NULL,
  `totprice` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orderAd` varchar(255) NOT NULL,
  `orderPhone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `price`, `prodQuan`, `custId`, `prodId`, `totprice`, `time`, `orderAd`, `orderPhone`) VALUES
(1, 1600000, 4000, 13, 91, 1600000, '2021-05-22 14:14:11', '', '0'),
(2, 800, 2, 13, 91, 800, '2021-05-22 14:14:11', '', '0'),
(3, 800, 2, 13, 91, 800, '2021-05-22 02:14:48', '', '0'),
(4, 500, 1, 13, 1, 500, '2021-05-22 04:33:56', '', '0'),
(5, 1000, 2, 13, 1, 1000, '2021-05-22 04:58:03', '', ''),
(6, 1000, 2, 13, 1, 1000, '2021-05-22 04:59:55', '', ''),
(7, 800, 2, 13, 91, 1800, '2021-05-22 05:01:24', '', ''),
(7, 1000, 2, 13, 1, 1800, '2021-05-22 05:01:24', '', ''),
(9, 500, 1, 13, 1, 500, '2021-05-22 05:03:23', '', ''),
(10, 1000, 2, 13, 1, 1000, '2021-05-22 05:04:29', '', ''),
(11, 1000, 2, 13, 1, 1000, '2021-05-22 05:05:39', '', ''),
(12, 1000, 2, 13, 1, 1000, '2021-05-22 05:05:59', '', ''),
(13, 1000, 2, 13, 1, 1000, '2021-05-22 05:06:53', '', ''),
(14, 1000, 2, 13, 1, 1000, '2021-05-22 05:07:24', '', ''),
(15, 1000, 2, 13, 1, 1000, '2021-05-22 05:20:57', '34 almostaqbal - elsheikh zayed', '01147542249'),
(16, 1000, 2, 13, 1, 1000, '2021-05-22 05:49:25', 'gh- elsheikh zayed', '01147542249'),
(1, 6000, 12, 17, 1, 6000, '2021-05-25 10:21:28', 'cairo', '01111906102'),
(2, 1200, 3, 17, 91, 1200, '2021-05-25 10:22:04', 'cairo', '01111906102'),
(1, 2500000, 5000, 18, 1, 10839500, '2021-05-24 23:13:51', 'omar1001', '01097943406'),
(1, 5500, 11, 18, 1, 10839500, '2021-05-24 23:13:51', 'omar1001', '01097943406'),
(1, 8258000, 16516, 18, 1, 10839500, '2021-05-24 23:13:51', 'omar1001', '01097943406'),
(1, 76000, 190, 18, 91, 10839500, '2021-05-24 23:13:51', 'omar1001', '01097943406'),
(5, 400, 1, 18, 91, 400, '2021-05-24 23:14:34', 'omar1001', '01097943406'),
(1, 25000000, 50000, 19, 1, 25000000, '2021-05-25 04:26:37', '44 hozombol gize', '011111119'),
(17, 400, 1, 13, 91, 400, '2021-08-24 04:29:06', '34 almostaqbal - elsheikh zayed', '01147542249'),
(18, 6000, 12, 13, 1, 6000, '2021-08-24 04:39:02', '34 almostaqbal - elsheikh zayed', '01147542249'),
(19, 500, 1, 13, 1, 900, '2021-08-24 04:40:30', '34 almostaqbal - elsheikh zayed', '01147542249'),
(19, 400, 1, 13, 91, 900, '2021-08-24 04:40:30', '34 almostaqbal - elsheikh zayed', '01147542249');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `proName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `metalPurty` varchar(255) NOT NULL,
  `metalColor` varchar(200) NOT NULL,
  `Brand` varchar(200) NOT NULL,
  `price` int(4) NOT NULL,
  `image` mediumtext NOT NULL,
  `adminId` int(4) NOT NULL,
  `categoryId` int(4) NOT NULL,
  `prodQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `proName`, `description`, `metalPurty`, `metalColor`, `Brand`, `price`, `image`, `adminId`, `categoryId`, `prodQuantity`) VALUES
(1, 'Watch', 'Alarm Chronograph Radio Controlled Eco-Drive', 'null', 'null', 'Guess', 500, 'watch1.jpg', 1, 61, 50010),
(91, 'Fireworks', '', '18k', 'Rose Gold', 'asd', 400, 'Ring1.png', 1, 59, 8);

-- --------------------------------------------------------

--
-- Table structure for table `subcat`
--

CREATE TABLE `subcat` (
  `id` int(4) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcat`
--

INSERT INTO `subcat` (`id`, `subname`, `type`) VALUES
(59, 'Rings', 'woman'),
(60, 'braclette', 'woman'),
(61, 'romance', 'men');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custId` (`custId`),
  ADD KEY `prodId` (`prodId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `custName` (`custName`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depId` (`depId`),
  ADD KEY `depId_2` (`depId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodId` (`prodId`),
  ADD KEY `custId` (`custId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD KEY `prodId` (`prodId`),
  ADD KEY `custId` (`custId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `categoryId_2` (`categoryId`);

--
-- Indexes for table `subcat`
--
ALTER TABLE `subcat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `subcat`
--
ALTER TABLE `subcat`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`custId`) REFERENCES `customer` (`cid`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`depId`) REFERENCES `department` (`id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`prodId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`custId`) REFERENCES `customer` (`cid`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`custId`) REFERENCES `customer` (`cid`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `subcat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
