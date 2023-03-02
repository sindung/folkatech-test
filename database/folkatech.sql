-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 10:36 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `folkatech`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `sort_desc` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Draft',
  `info_produk` text NOT NULL,
  `is_new` enum('true','false') NOT NULL DEFAULT 'true',
  `points` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`id`, `title`, `image`, `sort_desc`, `category`, `created_date`, `updated_date`, `status`, `info_produk`, `is_new`, `points`) VALUES
(1, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'test', '2022-11-30 02:16:09', '2022-11-30 02:15:28', 'Publish', '', 'true', 0),
(2, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'test2', '2022-11-30 02:16:09', '2022-11-30 02:15:28', 'Publish', '', 'false', 0),
(3, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'testC', '2022-11-30 02:57:49', NULL, 'Draft', '', 'true', 0),
(6, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'testC', '2022-11-30 03:12:10', NULL, 'Draft', '', 'false', 0),
(7, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'testC', '2022-11-30 03:12:21', NULL, 'Draft', '', 'false', 0),
(8, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'testC2', '2022-11-30 03:43:20', NULL, 'Draft', '', 'false', 0),
(10, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'teh5', '2022-12-02 07:38:18', '2023-03-01 00:29:32', 'Draft', '', 'false', 0),
(11, 'Samsung Galaxy S9', 'samsung-s9.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '', '2023-03-02 04:53:11', NULL, 'Draft', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed finibus tincidunt velit, eu facilisis enim blandit vel. Praesent quis quam nec nulla ultricies hendrerit vel at dui. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'true', 200000),
(12, 'coba insert', 'samsung-s9.webp', 'coba insert', 'coba insert', '2023-03-02 09:02:19', NULL, 'coba insert', 'coba insert', 'true', 100);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `gifts_id` int(11) NOT NULL,
  `stars` float(2,1) NOT NULL,
  `wish` enum('false','true') NOT NULL DEFAULT 'false',
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `gifts_id`, `stars`, `wish`, `users_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4.0, 'true', 1, '2023-03-02 05:08:49', '2023-03-02 05:08:49'),
(2, 2, 5.0, 'true', 1, '2023-03-02 08:35:59', '2023-03-02 08:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-03-02 05:14:07', '2023-03-02 05:14:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gifts_review` (`gifts_id`),
  ADD KEY `users_review` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
