-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2023 at 07:41 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmv3`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_customer`
--

DROP TABLE IF EXISTS `crm_customer`;
CREATE TABLE IF NOT EXISTS `crm_customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mob` int NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_customer`
--

INSERT INTO `crm_customer` (`customer_id`, `fname`, `lname`, `username`, `mob`, `address`, `email`, `age`, `gender`) VALUES
(16, 'Danujaya', 'Liyanage', 'Danu', 12345678, 'Piliyandala', 'danu@gmail.com', 22, 'Male'),
(27, 'Tharindu', 'Prabashwara', 'tharindu', 12345678, 'Kotte', 'tharindu@gmail.com', 22, 'Male'),
(28, 'Hanafe', 'Mira', 'Hanafe', 12345678, 'Galle', 'hanafe@gmail.com', 22, 'Male'),
(29, 'Binali', 'Ukwatte', 'Binu', 12345678, 'No 19B', 'tanyaukwatte@yahoo.com', 21, 'Female'),
(30, 'UCSC', 'UCSC', 'ucsc', 12345678, 'Colombo', 'ucsc@gmail.com', 30, 'Male'),
(31, 'Mike', 'Brown', 'mike12', 12345678, 'Jaffna', 'mike@gmail.com', 25, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `crm_product`
--

DROP TABLE IF EXISTS `crm_product`;
CREATE TABLE IF NOT EXISTS `crm_product` (
  `Product_ID` int NOT NULL AUTO_INCREMENT,
  `Product_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Price_per_unit` double NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_product`
--

INSERT INTO `crm_product` (`Product_ID`, `Product_Name`, `Price_per_unit`) VALUES
(1, 'Chicken Hawaiin pizza', 3630),
(2, 'BBQ Chicken Pizza', 3700),
(3, 'Devilled Chicken Pizza', 3630),
(4, 'Hot Butter Cuttlefish Pizza', 4000),
(5, 'Butter Chicken Masala Pizza', 3700),
(6, 'Cheese Pizza', 3290);

-- --------------------------------------------------------

--
-- Table structure for table `crm_users`
--

DROP TABLE IF EXISTS `crm_users`;
CREATE TABLE IF NOT EXISTS `crm_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `roles` enum('admin','salesman') COLLATE utf8mb4_general_ci NOT NULL,
  `lastLogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_users`
--

INSERT INTO `crm_users` (`id`, `name`, `email`, `password`, `roles`, `lastLogin`, `deleted`) VALUES
(5, 'Danujaya', 'danujayaadmin@xyz.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2023-03-22 12:03:37', 0),
(15, 'Tharindu Prabashwara', 'tharindu@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2023-03-22 11:56:54', 0),
(17, 'UCSC', 'ucsc@admin.com', 'c0d0cb34565fe05ca2a14e8b13285bf6dbdf6dfc', 'admin', '2023-03-22 12:49:54', 0),
(18, 'Binali Tanya ', 'binaliukwatte@sales.com', 'e2e32561eb94bfb144b8589641a65d87bc90768a', 'salesman', '2023-03-22 12:28:49', 0),
(19, 'Hanafe', 'hanafe@sales.com', 'e713d4d941d25ab7c4db0d34eab8c9cd34e674bd', 'salesman', '2023-03-22 12:16:58', 0),
(20, 'ucsc', 'ucsc@sales.com', 'c0d0cb34565fe05ca2a14e8b13285bf6dbdf6dfc', 'salesman', '2023-03-22 13:03:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

DROP TABLE IF EXISTS `sales_details`;
CREATE TABLE IF NOT EXISTS `sales_details` (
  `Sales_ID` int NOT NULL AUTO_INCREMENT,
  `Product_ID` int NOT NULL,
  `customer_id` int NOT NULL,
  `Purchased_date` date NOT NULL,
  PRIMARY KEY (`Sales_ID`),
  KEY `customer_id` (`customer_id`),
  KEY `Product_ID` (`Product_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`Sales_ID`, `Product_ID`, `customer_id`, `Purchased_date`) VALUES
(4, 2, 16, '2023-03-15'),
(5, 1, 16, '2023-03-15'),
(6, 6, 16, '2023-03-17'),
(7, 4, 29, '2023-03-08'),
(8, 5, 29, '2023-03-08'),
(9, 1, 16, '2023-03-18'),
(10, 5, 27, '2023-03-15'),
(11, 3, 30, '2023-02-16'),
(12, 5, 30, '2023-02-07');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `crm_customer` (`customer_id`),
  ADD CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `crm_product` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
