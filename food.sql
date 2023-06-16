-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2021 at 10:39 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `review` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `review`) VALUES
(1, 'Jayenth', 'Awesome !'),
(4, 'SK', 'Mind blowing...');

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE `foodlist` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`id`, `image`, `name`, `category`, `hotel`, `description`, `price`) VALUES
(1, '1.png', 'Kaju Katli', 'Sweets', 'JFF', 'Delicious cashew experience', 257),
(2, '2.jpg', 'Diamond Cake', 'Sweets', 'JFF', 'Proper blend of pista and cashew', 343),
(3, '3.jpg', 'Gulkand Burfi', 'Sweets', 'JFF', 'Enjoy refreshing gulkand', 143),
(4, '4.jpg', 'Paneer Jamun', 'Sweets', 'JFF', 'Delicious paneer jamun', 131),
(5, '5.jpg', 'Jangiri', 'Sweets', 'JFF', 'Sweetest jangiri on Earth', 143),
(6, '6.jpg', 'Assorted Sweets', 'Sweets', 'JFF', 'Just a proper combo !', 143),
(7, '7.jpg', 'Dal Mixture', 'Savouries', 'JFF', 'Dal as it should be...', 45),
(8, '8.png', 'Butter Murukku', 'Savouries', 'JFF', 'Melts in mouth !', 38),
(9, '9.jpg', 'Dosa', 'Tiffin', 'JFF', 'Crispy dosas !', 80),
(10, '10.jpg', 'Idly', 'Tiffin', 'JFF', 'Soft as cotton...', 50),
(11, '11.jpg', 'Chapati', 'Tiffin', 'JFF', 'Wheat and only wheat', 80),
(12, '12.jpg', 'Paneer Butter Masala', 'Main Course', 'JFF', 'Paneer OMG!', 180),
(13, '13.jpeg', 'Mushroom Gravy', 'Main Course', 'JFF', 'Spicy gravy for winters', 180),
(14, '14.jpg', 'Aloo Gobi Masala', 'Main Course', 'JFF', 'For the love of aloo and gobi', 180),
(15, '15.jpg', 'Babycorn Gravy', 'Main Course', 'JFF', 'Babycorn is love !', 180),
(16, '16.jpg', 'Chana Masala', 'Main Course', 'JFF', 'Who doesn\'t love chana ?', 160),
(17, '17.jpg', 'Kadai Vegetable', 'Main Course', 'JFF', 'Good mix of all the veggies !', 170),
(18, '18.jpg', 'Parotta', 'Tiffin', 'JFF', 'Hot parottas to satisfy your hunger', 80),
(19, '19.jpg', 'Butter Naan', 'Tiffin', 'JFF', 'Utterly Butterly Delicious...', 90),
(20, '20.jpg', 'Masala Dosa', 'Tiffin', 'JFF', 'Mouth watering Masala Dosa', 95),
(21, '21.jpg', 'Idiyappam', 'Tiffin', 'JFF', 'Diet conscious guys...Here', 80),
(22, '22.jpg', 'Potato Sweet Mixture', 'Savouries', 'JFF', 'For the kids...', 100),
(23, '23.jpg', 'Seedai', 'Savouries', 'JFF', 'Leisure times made interesting', 40),
(24, '24.jpg', 'Aloo Bhujia', 'Savouries', 'JFF', 'Typical chat...Everyone loves', 75),
(25, '25.jpg', 'Pepper Sev', 'Savouries', 'JFF', 'With goodness of pepper', 35),
(26, '26.png', 'Jeera Rice', 'Rice', 'JFF', 'Subtle...but has falvours', 200),
(27, '27.jpg', ' Veg Fried Rice', 'Rice', 'JFF', 'Chinese at it\'s best', 210),
(28, '28.jpg', 'Paneer Fried Rice', 'Rice', 'JFF', 'Fusion: Chinese and Paneer', 230),
(29, '29.jpg', 'Mushroom Fried Rice', 'Rice', 'JFF', 'Fusion: Chinese and Mushroom', 230),
(30, '30.jpg', 'Poori', 'Tiffin', 'JFF', 'Hot & Hot', 80),
(31, '31.png', 'Schezwann Fried Rice', 'Rice', 'JFF', 'Chinese at it\'s best', 240);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `email`, `password`, `mobile`, `address`) VALUES
(1, 'abc', 'abc@gmail.com', '123', '0123456789', '6th cross street'),
(2, 'user', 'xyz@gmail.com', '123', '1234567890', 'wzsexdrcftvg'),
(3, 'qwerty', 'qwerty@gmail.com', '12345', '1478632145', 'swerfgtrfdew');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foodlist`
--
ALTER TABLE `foodlist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
