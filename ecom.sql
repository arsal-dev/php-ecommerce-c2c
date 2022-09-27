-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 02:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `created_at`) VALUES
(5, 'Shirts', 'shirts', '2022-09-26 11:31:32'),
(6, 'Shoes', 'shoes', '2022-09-26 11:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `product_desc`, `thumbnail`, `pictures`, `stock`, `created_at`) VALUES
(11, 5, 'Polo', '2000', 'asdasd,asdasdas,asdfasdf,asdfasdf,awerf,asdfawer,', './uploads/facefact-log.16642806617504.jpeg', './uploads/download (2).16642806618526.jpeg,./uploads/download (3).16642806613935.jpeg,./uploads/download.16642806619841.png', '200', '2022-09-27 12:11:01'),
(12, 6, 'Nike', '50000', 'sasty tareeen shose, khwabo main, ghreeb dur rahyn, only ameer log, no timepass please', './uploads/img (30).16642810263933.jpeg', './uploads/1_3HR1asSfIVdOVcPcoApvDQ.16642810267787.jpeg,./uploads/download (1).16642810267565.jpeg,./uploads/person-1911.16642810261290.jpeg', '20', '2022-09-27 12:17:06'),
(13, 5, 'Nikea', '600000', 'sasty tareeen shose, khwabo main, ghreeb dur rahyn, only ameer log, no timepass please', './uploads/person-1911.16642811096410.jpeg', './uploads/images (2).16642811098984.jpeg,./uploads/images (3).16642811094195.jpeg,./uploads/images.16642811093220.jpeg', '20', '2022-09-27 12:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `role`, `password`, `created_at`) VALUES
(1, 'Hassan asdf', 'asdasd@gmail.com', '03468457485', 'address 123 street abc town 123', 0, '$2y$10$fqme2DhsnQDbo55AF.WtberDrdcRVUo.rUC6GPQfrISZk6rHP1MUG', '2022-09-22 11:49:59'),
(2, 'john doe', 'john@gmail.com', '1034156432', 'this street that street', 0, '$2y$10$kcJWm1AaXJbDvPPToyVVFej4u1K09tP0LMMxaXZK5AnMvgDWIQMKO', '2022-09-22 11:53:34'),
(6, 'Hassan asdf', 'john1@gmail.com', '03468457485', 'Rawalpindi', 0, '$2y$10$3VWng0dgcMJYj31xpeWGaOi2c98JlIckIXpTuLyCP5rYy708Zvsh2', '2022-09-23 10:05:10'),
(7, 'Admin', 'admin@gmaal.com', '03468457485', 'Rawalpindi', 1, '$2y$10$ZyHr3R8mINSyXK4mjxcww.tx8ZLhMYA5wkjOai8AZ/.MoxJiKAsVy', '2022-09-23 11:09:36'),
(8, 'Admin', 'admin1@gmaal.com', '03468457485', 'Rawalpindi', 1, '$2y$10$wZcvUl2fk0hTAJhUBdbe3.0z5GLvA6BPZLpep2zUon6DRd9vAR8XO', '2022-09-23 11:10:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
