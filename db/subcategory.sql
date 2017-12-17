-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 02:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `ekart_subcategory` (
  `cat_id` varchar(30) NOT NULL,
  `subcategory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `ekart_subcategory` (`cat_id`, `subcategory`) VALUES
('1', 'Casual Shirts'),
('1', 'jeans'),
('1', 'T-shirts'),
('1', 'Footwear'),
('1', 'Shorts'),
('1', 'watches'),
('2', 'Dresses'),
('2', 'Churidar Suits'),
('2', 'Kurtas'),
('2', 'Sandals'),
('2', 'Office Wear'),
('2', 'Artificial Jewellery'),
('3', 'Baby Apparel'),
('3', 'Girls Apparel'),
('3', 'Boys Apparel'),
('3', 'Kids Toys');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
