-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 05:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(50) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Mobile` int(10) DEFAULT NULL,
  `password` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Name`, `Email`, `Mobile`, `password`) VALUES
('A3', 'Saman', 'saman@gmail.com', 754856852, 123);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) DEFAULT NULL,
  `customer_password` varchar(50) DEFAULT NULL,
  `customer_phone` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_password`, `customer_phone`, `customer_email`) VALUES
('1', 'yansilu', '123', '0742563254', 'yansilu@gmail.com'),
('2', 'Kumara', '123', '075485236', 'kumara@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` varchar(25) NOT NULL,
  `medicine_name` varchar(50) DEFAULT NULL,
  `quanity` varchar(50) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `selling_price` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `quanity`, `expiry_date`, `selling_price`) VALUES
('m2', 'panadol', '100', NULL, 5),
('m3', 'piriton', '1000', '2022-06-23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `medstock`
--

CREATE TABLE `medstock` (
  `stock_id` varchar(25) NOT NULL,
  `medicine_id` varchar(50) DEFAULT NULL,
  `admin_id` varchar(50) DEFAULT NULL,
  `M_date` date DEFAULT NULL,
  `quanity` int(11) DEFAULT NULL,
  `Expiary_date` date DEFAULT NULL,
  `Buying_price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medstock`
--

INSERT INTO `medstock` (`stock_id`, `medicine_id`, `admin_id`, `M_date`, `quanity`, `Expiary_date`, `Buying_price`) VALUES
('s2', 'm2', 'A3', '2021-06-23', 500, '2021-06-30', 2),
('S3', 'M2', 'A3', '2021-06-17', 500, '2022-07-22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `order_id` int(11) NOT NULL,
  `mediname` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `purchase_date` date DEFAULT current_timestamp(),
  `Type` enum('Pending','Confirm') NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`order_id`, `mediname`, `quantity`, `Total`, `purchase_date`, `Type`, `customer_id`) VALUES
(19, 'panadol', 50, 250, '2021-06-28', 'Confirm', '1'),
(20, 'panadol', 300, 1500, '2021-06-28', 'Pending', '2');

-- --------------------------------------------------------

--
-- Table structure for table `purchasemedicine`
--

CREATE TABLE `purchasemedicine` (
  `medicine_id` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
('001', 'Sales'),
('002', 'Stock keeper'),
('003', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` varchar(50) NOT NULL,
  `staff_name` varchar(50) DEFAULT NULL,
  `staff_password` varchar(50) DEFAULT NULL,
  `staff_phone` varchar(50) DEFAULT NULL,
  `staff_email` varchar(50) DEFAULT NULL,
  `role_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_password`, `staff_phone`, `staff_email`, `role_id`) VALUES
('1', 'kanchana', '123', '0714526356', 'rathnayakekanchana616@gmail.com', '001'),
('2', 'Oshadi', '123', '075452635', 'oshadi@gmail.com', '002'),
('3', 'darshana', '123', '0785624562', 'darashana@gmail.com', '001'),
('C100', 'Oshadi', '123', '075415263', 'oshadi@gmail.com', 'S001'),
('C101', '  darshana', 'darshana@gmail.com', '0785682365', 'darshana@gmail.com', 'SK002'),
('C103', 'Aravinda', '123', '0762563254', 'aravinda@gmail.com', 'A003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `medstock`
--
ALTER TABLE `medstock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `purchasemedicine`
--
ALTER TABLE `purchasemedicine`
  ADD KEY `medicine_id` (`medicine_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medstock`
--
ALTER TABLE `medstock`
  ADD CONSTRAINT `medstock_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `medstock_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `purchasemedicine`
--
ALTER TABLE `purchasemedicine`
  ADD CONSTRAINT `purchasemedicine_ibfk_1` FOREIGN KEY (`medicine_id`) REFERENCES `medicine` (`medicine_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchasemedicine_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `purchase` (`order_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
