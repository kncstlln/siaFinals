-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 06:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_integration`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE `orders_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(5) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_info_tbl`
--

CREATE TABLE `payment_info_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` int(20) NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`id`, `name`, `description`, `quantity`, `price`, `image_url`, `created_at`, `modified_at`) VALUES
(2, 'Smart Watch', '\r\nDiscover the ultimate Smart Watch – stylish, functional, and connected. Stay updated, track fitness goals, and enjoy voice control. Embrace the future of wearables today!', 99999999, '159.53', 'smart.jpg', '2023-05-09 12:33:29', '2023-05-09 12:33:29'),
(3, 'Airpods', 'Immerse yourself in superior sound quality with our cutting-edge headphones. Experience wireless freedom, noise cancellation, and sleek design. Elevate your audio experience today!', 99999999, '260.46', 'headphones.jpg', '2023-05-09 12:35:03', '2023-05-09 12:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart_tbl`
--

CREATE TABLE `shopping_cart_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `ZipCode` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login_tbl`
--

CREATE TABLE `user_login_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_details_tbl`
--
ALTER TABLE `order_details_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `payment_info_tbl`
--
ALTER TABLE `payment_info_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_number` (`card_number`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_cart_tbl`
--
ALTER TABLE `shopping_cart_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_login_tbl`
--
ALTER TABLE `user_login_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details_tbl`
--
ALTER TABLE `order_details_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_info_tbl`
--
ALTER TABLE `payment_info_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopping_cart_tbl`
--
ALTER TABLE `shopping_cart_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login_tbl`
--
ALTER TABLE `user_login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_tbl`
--
ALTER TABLE `orders_tbl`
  ADD CONSTRAINT `orders_tbl_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products_tbl` (`id`);

--
-- Constraints for table `order_details_tbl`
--
ALTER TABLE `order_details_tbl`
  ADD CONSTRAINT `order_details_tbl_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders_tbl` (`id`);

--
-- Constraints for table `payment_info_tbl`
--
ALTER TABLE `payment_info_tbl`
  ADD CONSTRAINT `payment_info_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shopping_cart_tbl`
--
ALTER TABLE `shopping_cart_tbl`
  ADD CONSTRAINT `shopping_cart_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  ADD CONSTRAINT `user_details_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_login_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
