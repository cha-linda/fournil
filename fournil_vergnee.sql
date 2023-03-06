-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 05, 2022 at 12:23 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fournil_vergnee`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `pickup` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `img_alt` varchar(100) DEFAULT NULL,
  `price` double UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `size`, `img`, `img_alt`, `price`) VALUES
(1, 'Pain à l\'Engrain', 'Farine de petit épeautre bio, levain naturel. Pauvre en gluten, riche en goût !', '500gr', 'pain-engrain.jpg', 'pain-engrain', 3.8),
(2, 'Pain de Campagne', 'Farine de blé et de seigle bio, levain naturel.', '1kg', 'pain-campagne.jpg', 'pain-campagne', 4.5),
(3, 'Petit Pain de Campagne', 'Farine de blé et de seigle bio, levain naturel.', '500gr', 'petit-pain-campagne.jpg', 'petit-pain-campagne', 3.8),
(4, 'Pain aux Noix', 'Farine de blé et de seigle bio, éclats de noix bio, levain naturel. Parfait avec du fromage !', '500gr', 'pain-noix.jpg', 'pain-noix', 3.8),
(5, 'Pain aux Graines', 'Farine de blé et de seigle bio, levain naturel, graines de lin brun, lin doré, courge, tournesol et sésame.', '500g', 'pain-graines.jpg', 'pain-graines', 3.8),
(6, 'Brioche', 'Farine de blé, levain naturel, beurre bio.\r\nDélicieuse brioche, délicatement parfumée.', '1kg', 'brioche.jpg', 'brioche', 10),
(17, 'Tarte aux fruits', 'Fruits de saison bio', '600gr', 'tarte-fruits-saison.jpg', 'tarte', 8),
(25, 'Croissant', 'Lorem Ipsum', '100gr', 'random.jpg', 'croissant', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `zipcode` int(5) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `phone`, `email`, `zipcode`, `password`, `role`) VALUES
(11, 'Lovecraft', 'HP', NULL, 'hp.lovecraft@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$LmtSbUFic1JacDlBd1FOOQ$HURHjX28KsGl0+RorCCvoHfU5ziWZTpCkcfKk0tZ6Qk', 0),
(12, 'Tolkien', 'JR', NULL, 'jr.tolkien@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$L3YvM0VXWmZWTEpCTjBHYQ$PqXzoycUBfpvUEwZ3CWiTGSmLR6+Qjv3dTeqQc1ekDk', 0),
(13, 'Doe', 'Jane', NULL, 'jane.doe@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$WjNmdDRaeVhsMEdXZDMwbw$FqpeBWHW8SffhQ/yCVwVTHYQewN8kb5INpviv+ECTkg', 1),
(14, 'Sand', 'Georges', NULL, 'georges.sand@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$cm5YdkNHZXRMLy9yY2VtRw$bHn1MfZlJwtHyoHQriU8krxvs2iHClWmkcEQXmVGY74', 0),
(16, 'London', 'Jack', NULL, 'london@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$ZllyYWZ6OURET2dhcWovMw$nlFXvxfQd8nMWu4a8hCDRT0gl6N9Lg4ZLI30VP7z0zE', 0),
(17, 'Ionesco', 'Eugène', NULL, 'ionesco@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$T3JZRWt1RFJVOUg3Z3JPMQ$UeR20zOTJxZpdawMnBJQjt+fUFiM1UtHWVpZa+Sv5cA', 0),
(18, 'Lang', 'Fritz', NULL, 'metropolis@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$M2ZGamw0MXBsRUlPZW1EVg$CLPhqKe8eHH3Sl1BKdziuJ0QM+oVHu1u26lGlvM4FBM', 0),
(19, 'Davis', 'Miles', NULL, 'miles@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$eU1sNE9lZXI4eExUR29Rcg$4fO8VVJTO1/Q56LzLFvcEYOToTLNZZRcYFyorsAEc6Y', 0),
(20, 'Cobain', 'Kurt', NULL, 'nirvana@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$M0hST2lPTHh5eG1Ldmh6eQ$JmH7Iw7h5fQyVcg351WiXVg5VGfdZrx8DdU4Iuz9RIo', 0),
(21, 'arthur', 'jean', NULL, 'test@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$bGlkNXJOc3R5UVRGNlguVQ$S/A8mYu/06iDpYGha+6OOb+LyTA5Sbt5tqmg9FHvw1Y', 0),
(22, 'Lupin', 'Arsene', NULL, 'lupin@fournil.com', NULL, '$argon2i$v=19$m=65536,t=4,p=1$dDFDa0ZGWnhWNVUwaVRlcQ$gv88iINNsQLoXmZYsb0mM3o6bSGVlAhVxCumH0JsyFQ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`order_id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
