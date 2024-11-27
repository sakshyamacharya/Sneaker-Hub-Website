-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 07:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `23189644`
--
CREATE DATABASE IF NOT EXISTS `23189644` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `23189644`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Nike'),
(2, 'Adidas');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`) VALUES
(1, 21, 990.00, 'on the way', '2024-06-19 18:15:19'),
(2, 15, 1440.00, 'finished', '2024-06-19 18:30:25'),
(3, 21, 0.00, 'pending', '2024-06-19 18:34:57'),
(4, 21, 1375.00, 'confirmed', '2024-06-19 18:42:18'),
(5, 21, 1300.00, 'pending', '2024-06-20 04:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(10, 'Dunk Low Retro', 'The Dunk Low Retro features classic design, premium leather, and modern comfort.', 125.00, 1, 'nike1.png', '2024-06-04 06:44:26', '2024-06-04 06:44:26'),
(13, 'Nike Blazer Low \'77 Vintage', 'Praised by the streets for its classic simplicity and comfort.', 90.00, 1, 'nike2.png', '2024-06-05 10:00:15', '2024-06-05 10:00:15'),
(14, 'Nike Blazer', 'This edition features allover suede for retro style.', 100.00, 1, 'blazer.png', '2024-06-05 10:01:37', '2024-06-10 07:19:28'),
(15, 'Nike Air Max 270', 'First lifestyle Air Max brings you comfort, bold style and 270 degrees of Max Air technology to showcase one of our greatest innovations yet. ', 160.00, 1, 'nike4.png', '2024-06-05 10:03:26', '2024-06-05 10:03:26'),
(16, 'Nike Air Force 1 \'07', 'Clean, classic and always in style, these kicks have the perfect amount of flash to make you shine.', 130.00, 1, 'nike5.png', '2024-06-05 10:04:39', '2024-06-05 10:04:39'),
(17, 'Air Jordan 1 Element', 'Shift into casual mode with the Air Jordan 1 Element. ', 110.00, 1, 'nike6.png', '2024-06-05 10:06:40', '2024-06-05 10:06:40'),
(18, 'GAZELLE INDOOR SHOES', 'A revival of the Gazelle Indoor sneakers from 1979, these adidas shoes have all the details that soccer fans, indie rockers and sneakerheads have loved for decades.', 120.00, 2, 'adidas.png', '2024-06-05 10:09:55', '2024-06-05 10:09:55'),
(19, 'Originals Stan Smith', 'The Stan Smith is a classic tennis shoe produced by Adidas, first introduced in the 1960s.', 89.00, 2, 'adidas2.png', '2024-06-06 09:29:02', '2024-06-06 09:29:02'),
(20, 'Adidas Alpha Bounce', 'The mesh upper is soft and breathable to keep you comfortable as you go. ', 113.00, 2, 'Adidas-AlphaBounce.png', '2024-06-10 07:37:40', '2024-06-10 07:39:09'),
(21, 'KAPTIR 3.0', 'Comfortable shoes! These are a little more sturdy. These are great-looking and performing shoes.', 90.00, 2, 'Screenshot 2024-06-18 132540.png', '2024-06-18 07:42:56', '2024-06-18 07:42:56'),
(22, 'VL COURT 3.0 SHOES', 'Dress them up. Dress them down. These adidas sneakers pair effortlessly with just about everything in your closet. While the vulcanized rubber outsole is inspired by the skate park, it\'s equally suited to city exploring. The soft, synthetic leather upper adds a touch of elegance. Inside, lightweight cushioning and a soft lining keep the foot supported day after day.', 75.00, 2, 'Screenshot 2024-06-18 132905.png', '2024-06-18 07:44:53', '2024-06-18 07:44:53'),
(23, 'DAILY 4.0 SHOES', 'Taking inspiration from skater style, these adidas sneakers support your every dynamic move. The leather upper and reinforced toe offer durable protection while the rubber outsole provides grip on any terrain. Inside, a soft lining hugs the foot in place for all-day comfort. Subtle design lines give these kicks a streamlined look that works well with just about any outfit.\r\n\r\nThis product features at least 20% recycled materials. By reusing materials that have already been created, we help to reduce waste and our reliance on finite resources and reduce the footprint of the products we make.', 65.00, 2, 'Screenshot 2024-06-18 133032.png', '2024-06-18 07:46:07', '2024-06-18 07:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(6, 'admin', '$2y$10$N2EHV7yaJ9XaAM0.0m0ozOJokWBXO27gHTwbM11wg496CB4G.L8Km', 'admin@gmail.com', 'admin', '2024-06-02 13:56:53'),
(14, 'pradip', '$2y$10$ZCcffUZJFmPLqiv7WS.d8e8iB4mm/HIt2Jbb0MnQtZQBEPOuURxU2', 'pradip@gmail.com', 'customer', '2024-06-18 07:48:56'),
(15, 'khem ', '$2y$10$AwI8VNpQVyrlKFfnPmeLwO4zgUv6NlA5rIcx0fNx4TKL2nCyPsFMy', 'khem@gmail.com', 'customer', '2024-06-18 07:49:17'),
(16, 'sapkota', '$2y$10$Mz9MQoOpXBFApZrPwGg1g.BTaM6HGv9/oHLoTHrJPCbzlzpEHDZQ6', 'sapkota@gmail.com', 'customer', '2024-06-18 07:49:37'),
(17, 'shubham', '$2y$10$Ny.TBbR5JLUVtD4BFhToSe8D.F3Zz7vf48rDvV/VWOB9ouRT/A4wC', 'shubham@gmail.com', 'customer', '2024-06-18 07:49:54'),
(18, 'solo', '$2y$10$DIvBDoZEG.vCoXdiw98bweSoNuOyZUY6vtdCczJIXQdAh.JTKo0Um', 'solo@gmail.com', 'customer', '2024-06-18 07:50:12'),
(19, 'bhairab', '$2y$10$lXA.2CRbicVxO4gdpgEBGuu1c15QfotUdcum.AauLXCNdvblibC5m', 'bhairab@gmail.com', 'customer', '2024-06-18 07:50:29'),
(20, 'sanket', '$2y$10$LYHI4bDdh86wxm6V/ce5YO5EmSoNbW8umDRxr79nXmbCTz9n/jUVK', 'sanket@gmail.com', 'customer', '2024-06-18 07:50:48'),
(21, 'sakshyam', '$2y$10$hNI0APH3bpr3BW9ngqA4LOc2SM26rrINgzA2qiIwQvQM.Z77WC.fq', 'sakshyam779@gmail.com', 'customer', '2024-06-18 07:51:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
