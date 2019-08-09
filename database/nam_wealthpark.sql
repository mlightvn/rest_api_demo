-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019 年 8 月 09 日 12:19
-- サーバのバージョン： 10.3.14-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nam_hr`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `boss` varchar(100) DEFAULT NULL,
  `salary` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `birthday`, `address`, `boss`, `salary`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nam 1', 'Nguyen', '2019-08-08', 'Tokyo, Toyosu', 'Urban', '1', '2019-08-07 15:00:00', '2019-08-09 02:24:23', NULL),
(2, 'Nam 2', 'Nguyen 2', '2019-08-08', 'Tokyo, Toyosu', 'Urban', '10000', '2019-08-07 15:00:00', '2019-08-07 15:00:00', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:30:31', '2019-08-08 23:30:31', NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:33:50', '2019-08-08 23:33:50', NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:34:21', '2019-08-08 23:34:21', NULL),
(6, 'Nam 6', 'Nguyen', '2019-08-09', 'Earth', '地球', '6000', '2019-08-08 23:35:46', '2019-08-09 02:23:53', NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:40:39', '2019-08-09 01:11:46', '2019-08-09 01:11:46'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:41:22', '2019-08-09 01:11:41', '2019-08-09 01:11:41'),
(9, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:43:15', '2019-08-08 23:43:15', NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:48:10', '2019-08-08 23:48:10', NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-08 23:54:23', '2019-08-09 01:11:36', '2019-08-09 01:11:36'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:00:15', '2019-08-09 00:00:15', NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:18:02', '2019-08-09 00:18:02', NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:25:19', '2019-08-09 00:25:19', NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:25:50', '2019-08-09 00:25:50', NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:30:27', '2019-08-09 00:30:27', NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:32:51', '2019-08-09 01:11:32', '2019-08-09 01:11:32'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:35:59', '2019-08-09 00:35:59', NULL),
(19, '19', NULL, NULL, NULL, NULL, NULL, '2019-08-09 00:37:03', '2019-08-09 00:37:03', NULL),
(20, '20', NULL, NULL, NULL, NULL, '2000000', '2019-08-09 00:37:37', '2019-08-09 00:37:37', NULL),
(21, '21', NULL, NULL, NULL, NULL, '21000', '2019-08-09 00:38:43', '2019-08-09 00:38:43', NULL),
(22, '22', 'Nguyen', '2019-08-09', 'Tokyo', 'Urban', '2200', '2019-08-09 00:40:33', '2019-08-09 00:40:33', NULL),
(23, 'Nam 23', 'Nguyen', '2019-08-09', 'Earth', '地球', '11111111', '2019-08-09 00:41:16', '2019-08-09 02:22:48', NULL),
(24, 'Nam 24', 'Nguyen', '2019-08-09', 'Tokyo, Toyosu', 'Coupon', '240000', '2019-08-09 00:41:21', '2019-08-09 01:03:41', NULL),
(25, 'Nam 25', 'Nguyen', '2019-08-09', 'Tokyo', 'Urban', '2500', '2019-08-09 00:42:43', '2019-08-09 02:23:01', NULL),
(26, 'Nam 26', 'Nguyen', '2019-08-09', '東京都足立区', NULL, '260000', '2019-08-09 02:59:39', '2019-08-09 02:59:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
