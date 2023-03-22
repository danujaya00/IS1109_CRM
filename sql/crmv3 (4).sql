-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 02:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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

CREATE TABLE `crm_customer` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mob` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_customer`
--

INSERT INTO `crm_customer` (`customer_id`, `fname`, `lname`, `username`, `mob`, `address`, `email`, `age`, `gender`) VALUES
(16, 'test1', 'lname', 'test1cust', 111, 'test', 'test@gmail.com', 22, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `crm_invoice`
--

CREATE TABLE `crm_invoice` (
  `Sales_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crm_product`
--

CREATE TABLE `crm_product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Price_per_unit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `crm_users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `roles` enum('admin','salesman') NOT NULL,
  `lastLogin` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crm_users`
--

INSERT INTO `crm_users` (`id`, `name`, `email`, `password`, `roles`, `lastLogin`, `deleted`) VALUES
(5, 'dee', 'danujayaadmin@xyz.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '2023-03-21 18:53:26', 0),
(8, 'shika shika', 'shikastaff@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'salesman', '2023-03-22 06:33:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `Sales_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `Purchased_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`Sales_ID`, `Product_ID`, `customer_id`, `Purchased_date`) VALUES
(4, 2, 16, '2023-03-15'),
(5, 1, 16, '2023-03-15'),
(6, 6, 16, '2023-03-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_customer`
--
ALTER TABLE `crm_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `crm_invoice`
--
ALTER TABLE `crm_invoice`
  ADD PRIMARY KEY (`Sales_ID`);

--
-- Indexes for table `crm_product`
--
ALTER TABLE `crm_product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `crm_users`
--
ALTER TABLE `crm_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`Sales_ID`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crm_customer`
--
ALTER TABLE `crm_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `crm_product`
--
ALTER TABLE `crm_product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crm_users`
--
ALTER TABLE `crm_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `Sales_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crm_invoice`
--
ALTER TABLE `crm_invoice`
  ADD CONSTRAINT `crm_invoice_ibfk_1` FOREIGN KEY (`Sales_ID`) REFERENCES `sales_details` (`Sales_ID`);

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
