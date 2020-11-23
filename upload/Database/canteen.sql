-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2018 at 09:54 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `canteen`
--
CREATE DATABASE IF NOT EXISTS `canteen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `canteen`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foodid` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `totalprice` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `foodid`, `quantity`, `userid`, `address`, `status`, `date`, `totalprice`) VALUES
(1, '4', '1', '11', 'clge', 'delivered', '10', ''),
(2, '4', '1', '4', 'clge', 'delivered', '11', ''),
(3, '2', '2', '3', 'college', 'delivered', '2018-09-01', ''),
(4, '', '2', '3', 'college', 'delivered', '2018-09-01', ''),
(5, '', '2', '3', 'library', 'ordered', '2018-09-01', ''),
(10, '', '3', '3', 'office', 'ordered', '2018-09-01', ''),
(11, '10', '4', '3', 'college', 'ordered', '2018-09-01', ''),
(12, '1', '4', '3', 'college', 'ordered', '2018-09-01', '100'),
(13, '5', '4', '3', 'cse block', 'ordered', '2018-08-10', '160'),
(14, '1', '2', '5', 'no.22,ashok nagar,chennai-33', 'delivered', '2018-09-01', '50');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) NOT NULL,
  `name` varchar(30) NOT NULL,
  `information` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `image`, `name`, `information`, `price`, `category`) VALUES
(1, 'uploads/veg4.jpg', 'sambhar rice', 'cheap in price..good for health', '25', 'breakfast'),
(2, 'uploads/veg1.jpg', 'Dosa', 'easy to eat', '30', 'breakfast'),
(3, 'uploads/veg2.jpg', 'Poori', 'gives energy and low oil', '40', 'breakfast'),
(4, 'uploads/breakfast.jpg', 'Tiffin', 'There Is a variety of breakfast', '50', 'breakfast'),
(5, 'uploads/veg6.jpg', 'Curd Rice', 'Cools your body and mind', '40', 'veg'),
(6, 'uploads/veg5.jpg', 'vegetable-briyani', 'Vegetable makes you fresh', '30', 'veg'),
(7, 'uploads/veg3.jpg', 'Meals', 'Meals will fulfill you', '45', 'veg'),
(8, 'uploads/veg.jpg', 'Variety Rice', 'Many variety of food will be available everyday', '50', 'veg'),
(9, 'uploads/nonveg1.jpg', 'Chicken Briyani', 'Chicken Briyani will take you to the out of the world', '100', 'nonveg'),
(10, 'uploads/nonveg3.jpg', 'Chicken Manjurian', 'It will be a best side dish', '95', 'nonveg'),
(11, 'uploads/nonveg2.jpg', 'Egg Paratha', 'Taste will be too good', '120', 'nonveg'),
(12, 'uploads/nonveg.jpg', 'Variety of food', 'There are many variety of non-veg food', '150', 'nonveg'),
(13, 'uploads/samosa.jpg', 'samosa', 'It will gives you a great evening', '10', 'snacks'),
(14, 'uploads/samosa1.jpg', 'Onion Bajji', 'Bajji will releives you from hunger', '10', 'snacks'),
(15, 'uploads/coffee.jpg', 'Coffee', 'Coffee will relieves you from stress', '10', 'snacks'),
(16, 'uploads/cupcake.jpg', 'Cupcake', 'Cupcake with lots of nuts and taste', '25', 'snacks'),
(18, 'uploads/burger.jpg', 'Burger', 'Its very healthy', '75', 'SNACKS'),
(19, 'uploads/pizza.jpg', 'Pizza', 'na', '250', 'BREAKFAST');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE IF NOT EXISTS `register` (
  `s.no` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `combination` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `year` varchar(100) NOT NULL,
  `regno` varchar(50) NOT NULL,
  PRIMARY KEY (`s.no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`s.no`, `name`, `email`, `password`, `combination`, `gender`, `year`, `regno`) VALUES
(1, '', 'deenaprasath18@gmail.com', 'hyy', '', '', 'II', '1106'),
(2, '', 'deenaprasath18@gmail.com', 'hyy', '', '', 'II', '1106'),
(3, 'jothy', 'deenaprasath18@gmail.com', 'hyy', '', '', 'II', '1106'),
(4, 'jothy', 'deenaprasath18@gmail.com', 'hyy', 'MCZ', 'on', 'II', '1106'),
(5, 'meena', 'meenakshi18@gmai.com', 'meena', 'IES', 'on', 'III', '1104');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
