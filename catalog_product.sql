-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: iun. 12, 2020 la 03:22 PM
-- Versiune server: 10.4.10-MariaDB
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `catalog_product`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'Fashion'),
(2, 'Gaming'),
(3, 'Electronics'),
(4, 'Furniture'),
(6, 'PC');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `try_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `login_log`
--

INSERT INTO `login_log` (`id`, `username`, `try_time`) VALUES
(1, 'admin_new', '2020-06-12 12:51:32'),
(2, 'admin_new', '2020-06-12 12:52:01'),
(3, 'admin_new', '2020-06-12 12:56:10'),
(4, 'admin_new', '2020-06-12 12:57:29'),
(5, 'admin_new', '2020-06-12 12:57:36'),
(6, 'admin_new', '2020-06-12 12:57:40'),
(7, 'admin_new', '2020-06-12 12:57:41'),
(8, 'admin_new', '2020-06-12 12:57:45'),
(9, 'admin_new', '2020-06-12 12:58:49'),
(10, 'admin_new', '2020-06-12 12:58:52'),
(11, 'admin_new', '2020-06-12 12:58:52'),
(12, 'admin_new', '2020-06-12 12:58:53'),
(13, 'admin_new', '2020-06-12 12:58:54'),
(14, 'admin_new', '2020-06-12 12:58:55'),
(15, 'admin_new', '2020-06-12 12:58:55'),
(16, 'admin_new', '2020-06-12 12:58:56'),
(17, 'admin_new', '2020-06-12 12:58:57'),
(18, 'admin_new', '2020-06-12 12:58:57'),
(19, 'admin_new', '2020-06-12 12:58:58'),
(20, 'admin_new', '2020-06-12 12:58:59'),
(21, 'admin_new', '2020-06-12 12:58:59'),
(22, 'admin_new', '2020-06-12 12:59:00'),
(23, 'admin_new', '2020-06-12 12:59:00'),
(24, 'admin_new', '2020-06-12 12:59:01'),
(25, 'admin_new', '2020-06-12 12:59:01'),
(26, 'admin_new', '2020-06-12 12:59:02'),
(27, 'admin_new', '2020-06-12 12:59:08'),
(28, 'admin_new', '2020-06-12 12:59:10'),
(29, 'admin_new', '2020-06-12 12:59:10'),
(30, 'admin_new', '2020-06-12 12:59:11'),
(31, 'admin_new', '2020-06-12 12:59:11'),
(32, 'admin_new', '2020-06-12 12:59:12'),
(33, 'admin_new', '2020-06-12 12:59:12'),
(34, 'admin_new', '2020-06-12 12:59:13'),
(35, 'admin_new', '2020-06-12 12:59:13'),
(36, 'admin_new', '2020-06-12 12:59:14'),
(37, 'admin_new', '2020-06-12 12:59:14'),
(38, 'admin_new', '2020-06-12 12:59:15'),
(39, 'admin_new', '2020-06-12 12:59:15'),
(40, 'admin_new', '2020-06-12 12:59:15'),
(41, 'admin_new', '2020-06-12 12:59:48'),
(42, 'admin_new', '2020-06-12 12:59:49'),
(43, 'admin_new', '2020-06-12 12:59:50'),
(44, 'admin_new', '2020-06-12 12:59:51'),
(45, 'admin_new', '2020-06-12 12:59:51'),
(46, 'admin_new', '2020-06-12 12:59:52'),
(47, 'admin_new', '2020-06-12 12:59:53'),
(48, 'admin_new', '2020-06-12 12:59:53'),
(49, 'admin_new', '2020-06-12 12:59:54'),
(50, 'admin_new', '2020-06-12 12:59:54'),
(51, 'admin_new', '2020-06-12 12:59:54'),
(52, 'admin_new', '2020-06-12 12:59:55'),
(53, 'admin_new', '2020-06-12 12:59:56'),
(54, 'admin_new', '2020-06-12 12:59:56'),
(55, 'admin_new', '2020-06-12 12:59:57'),
(56, 'admin_new', '2020-06-12 12:59:57'),
(57, 'admin_new', '2020-06-12 13:00:31'),
(58, 'admin_new', '2020-06-12 13:00:33'),
(59, 'admin_new', '2020-06-12 13:00:35'),
(60, 'admin_new', '2020-06-12 13:00:36'),
(61, 'admin_new', '2020-06-12 13:02:05'),
(62, 'admin_new', '2020-06-12 13:02:07'),
(63, 'admin_new', '2020-06-12 13:02:09'),
(64, 'admin_new', '2020-06-12 13:02:10'),
(65, 'admin_new', '2020-06-12 13:02:11'),
(66, 'admin_new', '2020-06-12 13:02:21'),
(67, 'admin_new', '2020-06-12 13:02:23'),
(68, 'admin_new', '2020-06-12 13:02:44'),
(69, 'admin_new', '2020-06-12 13:02:50'),
(70, 'admin_new', '2020-06-12 13:02:54'),
(71, 'admin_new', '2020-06-12 13:04:17'),
(72, 'admin_new', '2020-06-12 13:06:01'),
(73, 'admin_new', '2020-06-12 13:06:05'),
(74, 'admin_new', '2020-06-12 13:06:08'),
(75, 'admin_new', '2020-06-12 13:06:10'),
(76, 'admin_new', '2020-06-12 13:06:11'),
(77, 'admin_new', '2020-06-12 13:06:12'),
(78, 'admin_new', '2020-06-12 13:06:12'),
(79, 'admin_new', '2020-06-12 13:06:13'),
(80, 'admin_new', '2020-06-12 13:06:13'),
(81, 'admin_new', '2020-06-12 13:06:14'),
(82, 'admin_new', '2020-06-12 13:06:15'),
(83, 'admin_new', '2020-06-12 13:06:15'),
(84, 'admin_new', '2020-06-12 13:06:16'),
(85, 'admin_new', '2020-06-12 13:06:16'),
(86, 'admin_new', '2020-06-12 13:06:48'),
(87, 'admin_new', '2020-06-12 13:06:52'),
(88, 'admin_new', '2020-06-12 13:06:59'),
(89, 'admin_new', '2020-06-12 13:07:00'),
(90, 'admin_new', '2020-06-12 13:10:01'),
(91, 'admin_new', '2020-06-12 13:10:19'),
(92, 'admin_new', '2020-06-12 13:11:11'),
(93, 'admin_new', '2020-06-12 13:11:42'),
(94, 'admin_new', '2020-06-12 13:11:49'),
(95, 'admin_new', '2020-06-12 13:11:49'),
(96, 'admin_new', '2020-06-12 13:11:50'),
(97, 'admin_new', '2020-06-12 13:12:29'),
(98, 'admin_new', '2020-06-12 13:12:31'),
(99, 'admin_new', '2020-06-12 13:12:32'),
(100, 'admin_new', '2020-06-12 13:12:32'),
(101, 'admin_new', '2020-06-12 13:12:33'),
(102, 'admin_new', '2020-06-12 13:12:34'),
(103, 'admin_new', '2020-06-12 13:12:34'),
(104, 'admin_new', '2020-06-12 13:12:35'),
(105, 'admin_new', '2020-06-12 13:13:13'),
(106, 'admin_new', '2020-06-12 13:20:02'),
(107, 'admin_new', '2020-06-12 13:20:24');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 6,
  `Name` varchar(100) DEFAULT NULL,
  `Price` int(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp(),
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `products`
--

INSERT INTO `products` (`ID`, `user_id`, `Name`, `Price`, `category_id`, `CreatedDate`, `UpdatedDate`) VALUES
(1, 6, 'Desk', 1000, 4, '2020-06-11 14:25:55', '0000-00-00 00:00:00'),
(3, 6, 'Mouse', 200, 2, '2020-06-11 14:29:48', '0000-00-00 00:00:00'),
(4, 6, 'Refrigerator', 1500, 3, '2020-06-11 14:30:26', '0000-00-00 00:00:00'),
(5, 6, 'Jeans', 60, 1, '2020-06-11 14:30:48', '2020-06-11 15:08:56'),
(8, 0, '', 0, 0, '2020-06-12 14:18:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(6, 'user_new', '$2y$10$OkJYdEkuGm8tv3FaOpmh3OTuqVsOLLpN9JAo1aCEn3QK3Uab8Gyau'),
(7, 'admin', '$2y$10$gDmBZzkLxLnKEoD2NG1yQudJ.deitZS0kbwkKEeX7gIUjnp6wFTve'),
(8, 'admin1', '$2y$10$GCzl.9jf/oO/JCTTgGnnBeGyE8ci3s4PR26Ia67PeQJvbqq.zdssq'),
(9, 'admin_new', '$2y$10$AQwzJPuzctUbUfjdFP1zt.Ex5oVI/kgeqSyQx9AKaEjmUrITcb3E2');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexuri pentru tabele `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pentru tabele `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
