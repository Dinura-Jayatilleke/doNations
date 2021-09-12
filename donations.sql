-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 09:20 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donations`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `full Name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone number` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `description`, `price`) VALUES
(1, 'T-shirt', 'Products\\Images\\products\\work-88615281-active-t-shirt.jpg', 'Couple T-shirts, package includes 2 shirts', 4500),
(2, 'Zipped Hoodie', 'Products\\Images\\products\\work-88615281-zipped-hoodie.jpg', 'Premium materials', 3000),
(3, 'Long sleve shirt', 'Products\\Images\\products\\work-88615281-baseball-¾-sleeve-t-shirt.jpg', 'Black and White ¾ sleeve t-shirt', 2500),
(4, 'Clock', 'Products\\Images\\products\\work-88615281-clock.jpg', 'Clock radius-5 inches', 1500),
(5, 'Printed Cap', 'Products\\Images\\products\\work-88615281-dad-hat.jpg', 'Unisex item', 1000),
(6, 'Backpack', 'Products\\Images\\products\\work-88615281-backpack.jpg', 'Premium materials, good for hard use', 5000),
(7, 'Drawstring-bag', 'Products\\Images\\products\\work-88615281-drawstring-bag.jpg', 'Original, sizes from small to large ', 1000),
(8, 'Zipper pouch', 'Products\\Images\\products\\work-88615281-zipper-pouch.jpg', 'Pencil Cases', 1000),
(9, 'ipad-skin', 'Products\\Images\\products\\work-88615281-ipad-skin.jpg', 'Can be choose for any type', 3000),
(10, 'iphone skin', 'Products\\Images\\products\\work-88615281-iphone-skin.jpg', 'Can be choose for any type', 3000),
(11, 'iphone snap case', 'Products\\Images\\products\\work-88615281-iphone-snap-case.jpg', 'Can be choose for any type', 3000),
(12, 'Laptop Skin', 'Products\\Images\\products\\work-88615281-laptop-skin.jpg', 'Can be choose for any type', 5000),
(13, 'Laptop-Sleeve', 'Products\\Images\\products\\work-88615281-laptop-sleeve.jpg', 'Can be choose for any type', 5000),
(14, 'doNAtions Logo magnet', 'Products\\Images\\products\\work-88615281-magnet.jpg', 'Stick on any metal surface', 1000),
(15, 'doNations Pin', 'Products\\Images\\products\\work-88615281-pin.jpg', '---', 500),
(16, 'doNations spiral-notebook', 'Products\\Images\\products\\work-88615281-spiral-notebook.jpg', 'regular size books with 200pgs', 200),
(17, 'doNations sticker', 'Products\\Images\\products\\work-88615281-sticker.jpg', 'Sticker Only', 100),
(18, 'travel-mug', 'Products\\Images\\products\\work-88615281-travel-mug.jpg', '1 litre volume', 1000),
(19, 'Mug', 'Products\\Images\\products\\work-88615281-classic-mug.jpg', 'only availabe in white', 1000),
(20, 'Water bottle', 'Products\\Images\\products\\work-88615281-water-bottle.jpg', 'only availabe in white', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `usercomments`
--

CREATE TABLE `usercomments` (
  `user_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercomments`
--

INSERT INTO `usercomments` (`user_ID`, `name`, `comment`) VALUES
(1, 'Thisumi Samarasekara', 'Well done'),
(2, 'dinura143@gmail.com', 'nice'),
(3, 'dinura143@gmail.com', 'good job'),
(4, 'dinura', 'nice'),
(5, 'dinura', 'hi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`full Name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercomments`
--
ALTER TABLE `usercomments`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usercomments`
--
ALTER TABLE `usercomments`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
