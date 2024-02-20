-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2023 at 03:03 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `Brand_id` int NOT NULL AUTO_INCREMENT,
  `Brand_name` varchar(199) NOT NULL,
  `Brand_img` varchar(199) NOT NULL,
  PRIMARY KEY (`Brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_id`, `Brand_name`, `Brand_img`) VALUES
(14, 'Maggi', 'Maggi_logo.svg.png'),
(13, 'Nestle', 'nestle-logo.png'),
(12, 'Amul', 'amul.jpg'),
(16, 'Haldiram', 'Haldiram-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `parent_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `parent_id`) VALUES
(6, 'Dairy', 'dairy-products-milk-food-cartoon-vector-illustration-isolated-white-background-94255658.webp', 0),
(5, 'Milk', '1000_F_106688812_rVoRFXazgIMEUJdvffG9p0XvP8Lntf0a.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplierlist`
--

DROP TABLE IF EXISTS `supplierlist`;
CREATE TABLE IF NOT EXISTS `supplierlist` (
  `sup_id` int NOT NULL AUTO_INCREMENT,
  `supName` varchar(199) NOT NULL,
  `supAddress` varchar(199) NOT NULL,
  `supEmail` varchar(199) NOT NULL,
  `supNum` int NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplierlist`
--

INSERT INTO `supplierlist` (`sup_id`, `supName`, `supAddress`, `supEmail`, `supNum`) VALUES
(1, 'East General stores', 'lucknow', 'eastGeneral@gmail.com', 976531223),
(10, 'UP Stores', '529D/1/173 Lucknow', 'upstores@gmail.com', 987654321),
(12, 'New Stores', 'Agra', 'newStores@gmail.com', 987654320);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(199) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `isAdmin` int NOT NULL,
  `Status` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `isAdmin`, `Status`) VALUES
(1, 'admin', '123', 'admin@gmail.com', 1, ''),
(9, 'user_1', '123', '', 0, 'Active'),
(10, 'user1', '123', '', 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `warehouse_id` int NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(255) NOT NULL,
  `warehouse_email` varchar(255) NOT NULL,
  `warehouse_ph` int NOT NULL,
  `warehouse_address` varchar(255) NOT NULL,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_name`, `warehouse_email`, `warehouse_ph`, `warehouse_address`) VALUES
(2, 'Kalyan Warehouse', 'Kalyan@gmail.com', 987654321, 'Hazratganj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
