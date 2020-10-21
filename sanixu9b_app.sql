-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2020 at 04:49 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanixu9b_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `mobile`, `password`, `remember_token`, `status`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super  Admin', 'asif.sanix@gmail.com', '7894561230', '$2y$10$a3HkWAs95HNae6vWdiL2euXGYh0Dyz1oa6o/MT5gjNvUNCVQu1Wku', 'FpE922ljCs6CRzsxSFvOcpkX0llFD7sCdAHfsLGR9qbq6lcdQxfAcwVhvsBz', 1, 'storage/admin/1_1580730539.png', '2019-03-27 00:00:00', '2020-02-03 17:18:59', NULL),
(2, 2, 'Admin', 'admin@yopmail.com', '7894561230', '$2y$10$3fXEKyaX43xqozb5fL8Seeo5dhYGsVTp4peQW4Y7orDbghrqGHzQO', 'EWrq1pHrkxwT1ZoblpoaFwCPoZsnrp60uDqs0yIjlmwEErq8A4COzQrdghdz', 1, 'storage/admin/2_1566799662.png', '2019-03-27 00:00:00', '2019-08-26 11:37:42', NULL),
(16, 3, 'Asif Jamal', 'asifjamal@yopmail.com', NULL, '$2y$10$0tGGVF7A7ygiSs1bmHMNyOk3R5I4X3dMljQndSpN5UyM3YKcE10CK', NULL, 1, NULL, '2019-08-31 18:17:54', '2019-09-06 17:06:32', NULL),
(31, 3, 'sandeep', 'sandeep.sanix@gmail.com', NULL, NULL, NULL, 2, NULL, '2019-09-06 17:27:52', '2019-09-06 17:27:52', NULL),
(32, 3, 'asif', 'asif.sanix@yopmail.com', NULL, NULL, NULL, 2, NULL, '2019-09-06 17:28:29', '2019-09-06 17:28:29', NULL),
(33, 3, 'Aadil Hussain', 'aadil.sanix@yopmail.com', NULL, NULL, NULL, 2, NULL, '2019-09-06 17:29:40', '2019-09-06 17:29:40', NULL),
(34, 3, 'Aadil Hussain', 'aadil.sanix@gmail.com', NULL, NULL, NULL, 2, NULL, '2019-09-06 17:42:57', '2019-09-06 17:42:57', NULL),
(35, 3, 'Adam Wennon', 'wannonadam@gmail.com', NULL, '$2y$10$0U/XFVXVienNtD41wW910OCzAi3xKQvhrUBLwZRr6KFALwV0UpXEa', NULL, 1, NULL, '2019-09-06 21:20:32', '2019-09-06 21:21:48', NULL),
(36, 3, 'Eric Wannon', 'junk@wannon.com', NULL, '$2y$10$86ex/DIm3XKI74XhyfHJX.EjYRn1e5pqSLSicpGSe5l33IedpX2Ma', NULL, 1, NULL, '2019-09-07 05:44:21', '2020-10-08 03:52:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `employee_id`, `login_at`, `logout_at`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '10.107.4.84', '2019-03-30 06:32:21', '2019-03-30 06:32:21'),
(2, 1, '2019-03-30 06:59:32', NULL, '10.107.4.84', '2019-03-30 06:59:32', '2019-03-30 06:59:32'),
(3, 1, '2019-03-30 07:08:27', '2019-03-30 07:08:54', '10.107.4.84', '2019-03-30 07:08:27', '2019-03-30 07:08:54'),
(4, 1, '2019-03-30 12:39:50', '2019-03-30 12:40:05', '10.107.4.84', '2019-03-30 12:39:50', '2019-03-30 12:40:05'),
(5, 6, '2019-03-30 12:42:15', NULL, '10.107.4.84', '2019-03-30 12:42:15', '2019-03-30 12:42:15'),
(6, 2, '2019-03-30 12:43:22', '2019-03-30 12:56:44', '10.107.4.84', '2019-03-30 12:43:22', '2019-03-30 12:56:44'),
(7, 1, '2019-03-30 13:10:08', NULL, '10.107.4.84', '2019-03-30 13:10:08', '2019-03-30 13:10:08'),
(8, 1, '2019-03-30 14:19:38', NULL, '10.107.4.84', '2019-03-30 14:19:38', '2019-03-30 14:19:38'),
(9, 1, '2019-04-02 11:59:52', NULL, '10.107.4.29', '2019-04-02 11:59:52', '2019-04-02 11:59:52'),
(10, 1, '2019-04-02 16:42:21', '2019-04-02 19:04:57', '10.107.4.29', '2019-04-02 16:42:21', '2019-04-02 19:04:57'),
(11, 1, '2019-04-02 19:05:03', NULL, '10.107.4.29', '2019-04-02 19:05:03', '2019-04-02 19:05:03'),
(12, 1, '2019-04-04 12:50:24', '2019-04-04 13:29:58', '10.107.4.29', '2019-04-04 12:50:24', '2019-04-04 13:29:58'),
(13, 1, '2019-04-04 13:30:03', NULL, '10.107.4.29', '2019-04-04 13:30:03', '2019-04-04 13:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`email`, `token`, `created_at`) VALUES
('admin@yopmail.com', '$2y$10$Szxm4MIWMWH8mreVcxRSTevsjfTH2eZGQOGv.HR/PC9ZbJY3sx2Xy', '2019-08-02 17:12:02'),
('asifjamal@yopmail.com', '$2y$10$0BzjCPvqqVPfvbIUo/3on.YqYVkmcD4.EOQB2I/2UZK/rwKmVMTY6', '2019-08-08 11:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 3, 4, NULL, NULL),
(4, 7, 3, NULL, NULL),
(6, 3, 3, NULL, NULL),
(7, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backlogs`
--

CREATE TABLE `backlogs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '9',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backlogs`
--

INSERT INTO `backlogs` (`id`, `user_id`, `admin_id`, `image`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 16, 'storage/user/backlog/1_1_1580197760.jpeg', 'storage/user/icon/1_1_1580197760.jpeg', 13, '2020-01-28 13:19:20', '2020-01-28 15:02:37', NULL),
(2, 1, 16, 'storage/user/backlog/1_1_1580203804.jpeg', 'storage/user/icon/1_1_1580203804.jpeg', 13, '2020-01-28 15:00:04', '2020-01-28 15:02:37', NULL),
(3, 1, 16, 'storage/user/backlog/1_2_1580203804.png', 'storage/user/icon/1_2_1580203804.png', 13, '2020-01-28 15:00:04', '2020-01-28 15:02:37', NULL),
(4, 1, 16, 'storage/user/backlog/1_3_1580203804.png', 'storage/user/icon/1_3_1580203804.png', 13, '2020-01-28 15:00:04', '2020-01-28 15:02:37', NULL),
(5, 1, 16, 'storage/user/backlog/1_4_1580203804.png', 'storage/user/icon/1_4_1580203804.png', 13, '2020-01-28 15:00:05', '2020-01-28 15:02:37', NULL),
(6, 1, 16, 'storage/user/backlog/1_5_1580203805.png', 'storage/user/icon/1_5_1580203805.png', 13, '2020-01-28 15:00:05', '2020-01-28 15:02:37', NULL),
(7, 1, NULL, 'storage/user/backlog/1_1_1580206967.png', 'storage/user/icon/1_1_1580206967.png', 9, '2020-01-28 15:52:48', '2020-01-28 15:52:48', NULL),
(8, 1, NULL, 'storage/user/backlog/1_2_1580206968.png', 'storage/user/icon/1_2_1580206968.png', 9, '2020-01-28 15:52:48', '2020-01-28 15:52:48', NULL),
(9, 1, NULL, 'storage/user/backlog/1_1_1580215140.png', 'storage/user/icon/1_1_1580215140.png', 9, '2020-01-28 18:09:01', '2020-01-28 18:09:01', NULL),
(10, 1, NULL, 'storage/user/backlog/1_2_1580215141.png', 'storage/user/icon/1_2_1580215141.png', 9, '2020-01-28 18:09:01', '2020-01-28 18:09:01', NULL),
(11, 1, NULL, 'storage/user/backlog/1_1_1580215146.png', 'storage/user/icon/1_1_1580215146.png', 9, '2020-01-28 18:09:07', '2020-01-28 18:09:07', NULL),
(12, 1, NULL, 'storage/user/backlog/1_2_1580215147.png', 'storage/user/icon/1_2_1580215147.png', 9, '2020-01-28 18:09:07', '2020-01-28 18:09:07', NULL),
(13, 2, NULL, 'storage/user/backlog/2_1_1580266864.jpeg', 'storage/user/icon/2_1_1580266864.jpeg', 9, '2020-01-29 08:31:04', '2020-01-29 08:31:04', NULL),
(14, 2, NULL, 'storage/user/backlog/2_2_1580266864.jpeg', 'storage/user/icon/2_2_1580266864.jpeg', 9, '2020-01-29 08:31:04', '2020-01-29 08:31:04', NULL),
(15, 2, NULL, 'storage/user/backlog/2_3_1580266864.jpeg', 'storage/user/icon/2_3_1580266864.jpeg', 9, '2020-01-29 08:31:04', '2020-01-29 08:31:04', NULL),
(16, 2, NULL, 'storage/user/backlog/2_4_1580266864.jpeg', 'storage/user/icon/2_4_1580266864.jpeg', 9, '2020-01-29 08:31:04', '2020-01-29 08:31:04', NULL),
(17, 3, NULL, 'storage/user/backlog/3_1_1580274924.jpeg', 'storage/user/icon/3_1_1580274924.jpeg', 9, '2020-01-29 10:45:24', '2020-01-29 10:45:24', NULL),
(18, 1, NULL, 'storage/user/backlog/1_1_1580380459.png', 'storage/user/icon/1_1_1580380459.png', 9, '2020-01-30 16:04:19', '2020-01-30 16:04:19', NULL),
(19, 1, NULL, 'storage/user/backlog/1_2_1580380459.png', 'storage/user/icon/1_2_1580380459.png', 9, '2020-01-30 16:04:19', '2020-01-30 16:04:19', NULL),
(20, 1, NULL, 'storage/user/backlog/1_3_1580380459.png', 'storage/user/icon/1_3_1580380459.png', 9, '2020-01-30 16:04:19', '2020-01-30 16:04:19', NULL),
(21, 4, NULL, 'storage/user/backlog/4_1_1580538121.jpeg', 'storage/user/icon/4_1_1580538121.jpeg', 9, '2020-02-01 11:52:02', '2020-02-01 11:52:02', NULL),
(22, 4, NULL, 'storage/user/backlog/4_2_1580538122.jpeg', 'storage/user/icon/4_2_1580538122.jpeg', 9, '2020-02-01 11:52:02', '2020-02-01 11:52:02', NULL),
(23, 4, NULL, 'storage/user/backlog/4_3_1580538122.jpeg', 'storage/user/icon/4_3_1580538122.jpeg', 9, '2020-02-01 11:52:02', '2020-02-01 11:52:02', NULL),
(24, 4, NULL, 'storage/user/backlog/4_4_1580538122.jpeg', 'storage/user/icon/4_4_1580538122.jpeg', 9, '2020-02-01 11:52:02', '2020-02-01 11:52:02', NULL),
(25, 4, NULL, 'storage/user/backlog/4_5_1580538122.jpeg', 'storage/user/icon/4_5_1580538122.jpeg', 9, '2020-02-01 11:52:02', '2020-02-01 11:52:02', NULL),
(26, 4, NULL, 'storage/user/backlog/4_6_1580538122.jpeg', 'storage/user/icon/4_6_1580538122.jpeg', 9, '2020-02-01 11:52:02', '2020-02-01 11:52:02', NULL),
(27, 2, NULL, 'storage/user/backlog/2_1_1580791699.jpeg', 'storage/user/icon/2_1_1580791699.jpeg', 9, '2020-02-04 10:18:19', '2020-02-04 10:18:19', NULL),
(28, 2, NULL, 'storage/user/backlog/2_2_1580791699.jpeg', 'storage/user/icon/2_2_1580791699.jpeg', 9, '2020-02-04 10:18:19', '2020-02-04 10:18:19', NULL),
(29, 2, 35, 'storage/user/backlog/2_3_1580791699.jpeg', 'storage/user/icon/2_3_1580791699.jpeg', 13, '2020-02-04 10:18:19', '2020-02-08 02:19:13', NULL),
(30, 2, NULL, 'storage/user/backlog/2_4_1580791699.jpeg', 'storage/user/icon/2_4_1580791699.jpeg', 9, '2020-02-04 10:18:19', '2020-02-04 10:18:19', NULL),
(31, 2, NULL, 'storage/user/backlog/2_1_1580793021.jpeg', 'storage/user/icon/2_1_1580793021.jpeg', 9, '2020-02-04 10:40:21', '2020-02-04 10:40:21', NULL),
(32, 2, NULL, 'storage/user/backlog/2_2_1580793021.jpeg', 'storage/user/icon/2_2_1580793021.jpeg', 9, '2020-02-04 10:40:21', '2020-02-04 11:59:50', '2020-02-04 11:59:50'),
(33, 2, NULL, 'storage/user/backlog/2_1_1580795575.jpeg', 'storage/user/icon/2_1_1580795575.jpeg', 9, '2020-02-04 11:22:55', '2020-02-04 11:27:37', '2020-02-04 11:27:37'),
(34, 2, NULL, 'storage/user/backlog/2_2_1580795575.jpeg', 'storage/user/icon/2_2_1580795575.jpeg', 9, '2020-02-04 11:22:55', '2020-02-04 11:27:35', '2020-02-04 11:27:35'),
(35, 2, NULL, 'storage/user/backlog/2_3_1580795575.jpeg', 'storage/user/icon/2_3_1580795575.jpeg', 9, '2020-02-04 11:22:55', '2020-02-04 11:27:39', '2020-02-04 11:27:39'),
(36, 2, NULL, 'storage/user/backlog/2_4_1580795575.jpeg', 'storage/user/icon/2_4_1580795575.jpeg', 9, '2020-02-04 11:22:55', '2020-02-04 11:27:43', '2020-02-04 11:27:43'),
(37, 2, 35, 'storage/user/backlog/2_1_1580797662.jpeg', 'storage/user/icon/2_1_1580797662.jpeg', 13, '2020-02-04 11:57:42', '2020-02-04 11:58:24', NULL),
(38, 2, 35, 'storage/user/backlog/2_2_1580797662.jpeg', 'storage/user/icon/2_2_1580797662.jpeg', 13, '2020-02-04 11:57:42', '2020-02-04 11:58:24', NULL),
(39, 2, NULL, 'storage/user/backlog/2_3_1580797662.jpeg', 'storage/user/icon/2_3_1580797662.jpeg', 9, '2020-02-04 11:57:42', '2020-02-04 11:57:42', NULL),
(40, 2, 35, 'storage/user/backlog/2_4_1580797662.jpeg', 'storage/user/icon/2_4_1580797662.jpeg', 13, '2020-02-04 11:57:42', '2020-02-04 11:58:24', NULL),
(41, 2, NULL, 'storage/user/backlog/2_1_1580877951.jpeg', 'storage/user/icon/2_1_1580877951.jpeg', 9, '2020-02-05 10:15:51', '2020-02-05 10:15:51', NULL),
(42, 2, NULL, 'storage/user/backlog/2_2_1580877951.jpeg', 'storage/user/icon/2_2_1580877951.jpeg', 9, '2020-02-05 10:15:51', '2020-02-05 10:15:51', NULL),
(43, 2, 35, 'storage/user/backlog/2_3_1580877951.jpeg', 'storage/user/icon/2_3_1580877951.jpeg', 13, '2020-02-05 10:15:51', '2020-02-08 02:19:13', NULL),
(44, 5, NULL, 'storage/user/backlog/5_1_1580998331.jpeg', 'storage/user/icon/5_1_1580998331.jpeg', 9, '2020-02-06 19:42:11', '2020-02-06 19:42:11', NULL),
(45, 2, NULL, 'storage/user/backlog/2_1_1581386833.jpeg', 'storage/user/icon/2_1_1581386833.jpeg', 9, '2020-02-11 07:37:14', '2020-02-11 07:37:14', NULL),
(46, 2, NULL, 'storage/user/backlog/2_2_1581386834.jpeg', 'storage/user/icon/2_2_1581386834.jpeg', 9, '2020-02-11 07:37:14', '2020-02-11 07:37:14', NULL),
(47, 2, NULL, 'storage/user/backlog/2_3_1581386834.jpeg', 'storage/user/icon/2_3_1581386834.jpeg', 9, '2020-02-11 07:37:14', '2020-02-11 07:37:14', NULL),
(48, 2, NULL, 'storage/user/backlog/2_1_1581609482.jpeg', 'storage/user/icon/2_1_1581609482.jpeg', 9, '2020-02-13 21:28:02', '2020-02-13 21:28:02', NULL),
(49, 2, 35, 'storage/user/backlog/2_1_1582133399.jpeg', 'storage/user/icon/2_1_1582133399.jpeg', 13, '2020-02-19 22:59:59', '2020-02-20 02:27:08', NULL),
(50, 2, NULL, 'storage/user/backlog/2_1_1582146371.jpeg', 'storage/user/icon/2_1_1582146371.jpeg', 9, '2020-02-20 02:36:11', '2020-02-20 02:36:11', NULL),
(51, 2, NULL, 'storage/user/backlog/2_2_1582146371.jpeg', 'storage/user/icon/2_2_1582146371.jpeg', 9, '2020-02-20 02:36:11', '2020-02-20 02:36:11', NULL),
(52, 2, NULL, 'storage/user/backlog/2_1_1582440240.jpeg', 'storage/user/icon/2_1_1582440240.jpeg', 9, '2020-02-23 12:14:00', '2020-02-23 12:14:00', NULL),
(53, 2, NULL, 'storage/user/backlog/2_2_1582440240.jpeg', 'storage/user/icon/2_2_1582440240.jpeg', 9, '2020-02-23 12:14:00', '2020-02-23 12:14:00', NULL),
(54, 2, NULL, 'storage/user/backlog/2_1_1583978834.jpeg', 'storage/user/icon/2_1_1583978834.jpeg', 9, '2020-03-12 07:37:14', '2020-03-12 07:37:14', NULL),
(55, 2, 35, 'storage/user/backlog/2_2_1583978834.jpeg', 'storage/user/icon/2_2_1583978834.jpeg', 13, '2020-03-12 07:37:14', '2020-03-12 07:39:10', NULL),
(56, 2, 35, 'storage/user/backlog/2_3_1583978834.jpeg', 'storage/user/icon/2_3_1583978834.jpeg', 13, '2020-03-12 07:37:14', '2020-03-12 07:39:10', NULL),
(57, 11, NULL, 'storage/user/backlog/11_1_1584613070.jpeg', 'storage/user/icon/11_1_1584613070.jpeg', 9, '2020-03-19 15:47:50', '2020-03-19 15:47:50', NULL),
(58, 11, NULL, 'storage/user/backlog/11_1_1584618852.jpeg', 'storage/user/icon/11_1_1584618852.jpeg', 9, '2020-03-19 17:24:12', '2020-03-19 17:24:12', NULL),
(59, 4, NULL, 'storage/user/backlog/4_1_1586068126.jpeg', 'storage/user/icon/4_1_1586068126.jpeg', 9, '2020-04-05 11:58:49', '2020-04-05 11:58:49', NULL),
(60, 4, NULL, 'storage/user/backlog/4_2_1586068133.jpeg', 'storage/user/icon/4_2_1586068133.jpeg', 9, '2020-04-05 11:58:53', '2020-04-05 11:58:53', NULL),
(61, 4, NULL, 'storage/user/backlog/4_3_1586068133.jpeg', 'storage/user/icon/4_3_1586068133.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(62, 4, NULL, 'storage/user/backlog/4_4_1586068134.jpeg', 'storage/user/icon/4_4_1586068134.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(63, 4, NULL, 'storage/user/backlog/4_5_1586068134.jpeg', 'storage/user/icon/4_5_1586068134.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(64, 4, NULL, 'storage/user/backlog/4_6_1586068134.jpeg', 'storage/user/icon/4_6_1586068134.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(65, 4, NULL, 'storage/user/backlog/4_7_1586068134.jpeg', 'storage/user/icon/4_7_1586068134.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(66, 4, NULL, 'storage/user/backlog/4_8_1586068134.jpeg', 'storage/user/icon/4_8_1586068134.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(67, 4, NULL, 'storage/user/backlog/4_9_1586068134.jpeg', 'storage/user/icon/4_9_1586068134.jpeg', 9, '2020-04-05 11:58:54', '2020-04-05 11:58:54', NULL),
(68, 12, NULL, 'storage/user/backlog/12_1_1586091182.jpeg', 'storage/user/icon/12_1_1586091182.jpeg', 9, '2020-04-05 18:23:02', '2020-04-05 18:23:02', NULL),
(69, 12, NULL, 'storage/user/backlog/12_2_1586091182.jpeg', 'storage/user/icon/12_2_1586091182.jpeg', 9, '2020-04-05 18:23:02', '2020-04-05 18:23:02', NULL),
(70, 12, NULL, 'storage/user/backlog/12_3_1586091182.jpeg', 'storage/user/icon/12_3_1586091182.jpeg', 9, '2020-04-05 18:23:02', '2020-04-05 18:23:02', NULL),
(71, 12, NULL, 'storage/user/backlog/12_1_1591597730.jpeg', 'storage/user/icon/12_1_1591597730.jpeg', 9, '2020-06-08 11:58:50', '2020-06-08 11:58:50', NULL),
(72, 12, NULL, 'storage/user/backlog/12_2_1591597730.jpeg', 'storage/user/icon/12_2_1591597730.jpeg', 9, '2020-06-08 11:58:50', '2020-06-08 11:58:50', NULL),
(73, 13, NULL, 'storage/user/backlog/13_1_1591636784.jpeg', 'storage/user/icon/13_1_1591636784.jpeg', 9, '2020-06-08 22:49:44', '2020-06-08 22:49:44', NULL),
(74, 13, NULL, 'storage/user/backlog/13_2_1591636784.jpeg', 'storage/user/icon/13_2_1591636784.jpeg', 9, '2020-06-08 22:49:44', '2020-06-08 22:49:44', NULL),
(75, 13, NULL, 'storage/user/backlog/13_3_1591636784.jpeg', 'storage/user/icon/13_3_1591636784.jpeg', 9, '2020-06-08 22:49:44', '2020-06-08 22:49:44', NULL),
(76, 13, NULL, 'storage/user/backlog/13_4_1591636784.jpeg', 'storage/user/icon/13_4_1591636784.jpeg', 9, '2020-06-08 22:49:44', '2020-06-08 22:49:44', NULL),
(77, 13, NULL, 'storage/user/backlog/13_5_1591636784.jpeg', 'storage/user/icon/13_5_1591636784.jpeg', 9, '2020-06-08 22:49:44', '2020-06-08 22:49:44', NULL),
(78, 13, NULL, 'storage/user/backlog/13_6_1591636784.jpeg', 'storage/user/icon/13_6_1591636784.jpeg', 9, '2020-06-08 22:49:45', '2020-06-08 22:49:45', NULL),
(79, 13, NULL, 'storage/user/backlog/13_7_1591636785.jpeg', 'storage/user/icon/13_7_1591636785.jpeg', 9, '2020-06-08 22:49:45', '2020-06-08 22:49:45', NULL),
(80, 13, NULL, 'storage/user/backlog/13_8_1591636785.jpeg', 'storage/user/icon/13_8_1591636785.jpeg', 9, '2020-06-08 22:49:45', '2020-06-08 22:49:45', NULL),
(81, 13, NULL, 'storage/user/backlog/13_9_1591636785.jpeg', 'storage/user/icon/13_9_1591636785.jpeg', 9, '2020-06-08 22:49:45', '2020-06-08 22:49:45', NULL),
(82, 13, NULL, 'storage/user/backlog/13_10_1591636785.jpeg', 'storage/user/icon/13_10_1591636785.jpeg', 9, '2020-06-08 22:49:45', '2020-06-08 22:49:45', NULL),
(83, 13, NULL, 'storage/user/backlog/13_11_1591636785.jpeg', 'storage/user/icon/13_11_1591636785.jpeg', 9, '2020-06-08 22:49:45', '2020-06-08 22:49:45', NULL),
(84, 13, NULL, 'storage/user/backlog/13_1_1591637001.jpeg', 'storage/user/icon/13_1_1591637001.jpeg', 9, '2020-06-08 22:53:21', '2020-06-08 22:53:21', NULL),
(85, 13, NULL, 'storage/user/backlog/13_2_1591637002.jpeg', 'storage/user/icon/13_2_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(86, 13, NULL, 'storage/user/backlog/13_3_1591637002.jpeg', 'storage/user/icon/13_3_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(87, 13, NULL, 'storage/user/backlog/13_4_1591637002.jpeg', 'storage/user/icon/13_4_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(88, 13, NULL, 'storage/user/backlog/13_5_1591637002.jpeg', 'storage/user/icon/13_5_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(89, 13, NULL, 'storage/user/backlog/13_6_1591637002.jpeg', 'storage/user/icon/13_6_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(90, 13, NULL, 'storage/user/backlog/13_7_1591637002.jpeg', 'storage/user/icon/13_7_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(91, 13, NULL, 'storage/user/backlog/13_8_1591637002.jpeg', 'storage/user/icon/13_8_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(92, 13, NULL, 'storage/user/backlog/13_9_1591637002.jpeg', 'storage/user/icon/13_9_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(93, 13, NULL, 'storage/user/backlog/13_10_1591637002.jpeg', 'storage/user/icon/13_10_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(94, 13, NULL, 'storage/user/backlog/13_11_1591637002.jpeg', 'storage/user/icon/13_11_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(95, 13, NULL, 'storage/user/backlog/13_12_1591637002.jpeg', 'storage/user/icon/13_12_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(96, 13, NULL, 'storage/user/backlog/13_13_1591637002.jpeg', 'storage/user/icon/13_13_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(97, 13, NULL, 'storage/user/backlog/13_14_1591637002.jpeg', 'storage/user/icon/13_14_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(98, 13, NULL, 'storage/user/backlog/13_15_1591637002.jpeg', 'storage/user/icon/13_15_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(99, 13, NULL, 'storage/user/backlog/13_16_1591637002.jpeg', 'storage/user/icon/13_16_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(100, 13, NULL, 'storage/user/backlog/13_17_1591637002.jpeg', 'storage/user/icon/13_17_1591637002.jpeg', 9, '2020-06-08 22:53:22', '2020-06-08 22:53:22', NULL),
(101, 14, NULL, 'storage/user/backlog/14_1_1592202660.jpeg', 'storage/user/icon/14_1_1592202660.jpeg', 9, '2020-06-15 12:01:00', '2020-06-15 12:01:00', NULL),
(102, 14, NULL, 'storage/user/backlog/14_1_1592202962.jpeg', 'storage/user/icon/14_1_1592202962.jpeg', 9, '2020-06-15 12:06:02', '2020-06-15 12:06:02', NULL),
(103, 3, NULL, 'storage/user/backlog/3_1_1592203911.jpeg', 'storage/user/icon/3_1_1592203911.jpeg', 9, '2020-06-15 12:21:51', '2020-06-15 12:21:51', NULL),
(104, 2, NULL, 'storage/user/backlog/2_1_1592339642.jpeg', 'storage/user/icon/2_1_1592339642.jpeg', 9, '2020-06-17 02:04:02', '2020-06-17 02:04:02', NULL),
(105, 13, NULL, 'storage/user/backlog/13_1_1592839086.jpeg', 'storage/user/icon/13_1_1592839086.jpeg', 9, '2020-06-22 20:48:06', '2020-06-22 20:48:06', NULL),
(106, 2, NULL, 'storage/user/backlog/2_1_1594150869.jpeg', 'storage/user/icon/2_1_1594150869.jpeg', 9, '2020-07-08 01:11:10', '2020-07-08 01:11:10', NULL),
(107, 2, NULL, 'storage/user/backlog/2_1_1594151001.jpeg', 'storage/user/icon/2_1_1594151001.jpeg', 9, '2020-07-08 01:13:21', '2020-07-08 01:13:21', NULL),
(108, 15, NULL, 'storage/user/backlog/15_1_1597295761.jpeg', 'storage/user/icon/15_1_1597295761.jpeg', 9, '2020-08-13 10:46:02', '2020-08-13 10:46:02', NULL),
(109, 15, NULL, 'storage/user/backlog/15_1_1597296378.jpeg', 'storage/user/icon/15_1_1597296378.jpeg', 9, '2020-08-13 10:56:18', '2020-08-13 10:56:18', NULL),
(110, 15, NULL, 'storage/user/backlog/15_1_1597296471.jpeg', 'storage/user/icon/15_1_1597296471.jpeg', 9, '2020-08-13 10:57:51', '2020-08-13 10:57:51', NULL),
(111, 15, NULL, 'storage/user/backlog/15_1_1597297150.jpeg', 'storage/user/icon/15_1_1597297150.jpeg', 9, '2020-08-13 11:09:10', '2020-08-13 11:09:10', NULL),
(112, 15, NULL, 'storage/user/backlog/15_1_1597301912.jpeg', 'storage/user/icon/15_1_1597301912.jpeg', 9, '2020-08-13 12:28:32', '2020-08-13 12:28:32', NULL),
(113, 15, NULL, 'storage/user/backlog/15_1_1597302695.jpeg', 'storage/user/icon/15_1_1597302695.jpeg', 9, '2020-08-13 12:41:35', '2020-08-13 12:41:35', NULL),
(114, 20, NULL, 'storage/user/backlog/20_1_1597310420.jpeg', 'storage/user/icon/20_1_1597310420.jpeg', 9, '2020-08-13 14:50:20', '2020-08-13 14:50:20', NULL),
(115, 20, NULL, 'storage/user/backlog/20_1_1597311171.jpeg', 'storage/user/icon/20_1_1597311171.jpeg', 9, '2020-08-13 15:02:51', '2020-08-13 15:02:51', NULL),
(116, 20, NULL, 'storage/user/backlog/20_1_1597311198.jpeg', 'storage/user/icon/20_1_1597311198.jpeg', 9, '2020-08-13 15:03:18', '2020-08-13 15:03:18', NULL),
(117, 20, NULL, 'storage/user/backlog/20_1_1597311341.jpeg', 'storage/user/icon/20_1_1597311341.jpeg', 9, '2020-08-13 15:05:41', '2020-08-13 15:05:41', NULL),
(118, 20, NULL, 'storage/user/backlog/20_1_1597312672.jpeg', 'storage/user/icon/20_1_1597312672.jpeg', 9, '2020-08-13 15:27:52', '2020-08-13 15:27:52', NULL),
(119, 2, NULL, 'storage/user/backlog/2_1_1597349252.jpeg', 'storage/user/icon/2_1_1597349252.jpeg', 9, '2020-08-14 01:37:32', '2020-08-14 01:37:32', NULL),
(120, 2, NULL, 'storage/user/backlog/2_1_1597349503.jpeg', 'storage/user/icon/2_1_1597349503.jpeg', 9, '2020-08-14 01:41:43', '2020-08-14 01:41:43', NULL),
(121, 2, NULL, 'storage/user/backlog/2_1_1597364424.jpeg', 'storage/user/icon/2_1_1597364424.jpeg', 9, '2020-08-14 05:50:24', '2020-08-14 05:50:24', NULL),
(122, 2, NULL, 'storage/user/backlog/2_1_1597364444.jpeg', 'storage/user/icon/2_1_1597364444.jpeg', 9, '2020-08-14 05:50:44', '2020-08-14 05:50:44', NULL),
(123, 2, NULL, 'storage/user/backlog/2_1_1597605303.jpeg', 'storage/user/icon/2_1_1597605303.jpeg', 9, '2020-08-17 00:45:03', '2020-08-17 00:45:03', NULL),
(124, 23, NULL, 'storage/user/backlog/23_1_1597644080.jpeg', 'storage/user/icon/23_1_1597644080.jpeg', 9, '2020-08-17 11:31:20', '2020-08-17 11:31:20', NULL),
(125, 25, NULL, 'storage/user/backlog/25_1_1597644438.jpeg', 'storage/user/icon/25_1_1597644438.jpeg', 9, '2020-08-17 11:37:18', '2020-08-17 11:37:18', NULL),
(126, 25, NULL, 'storage/user/backlog/25_2_1597644438.jpeg', 'storage/user/icon/25_2_1597644438.jpeg', 9, '2020-08-17 11:37:18', '2020-08-17 11:37:18', NULL),
(127, 27, NULL, 'storage/user/backlog/27_1_1597645672.jpeg', 'storage/user/icon/27_1_1597645672.jpeg', 9, '2020-08-17 11:57:52', '2020-08-17 11:57:52', NULL),
(128, 29, NULL, 'storage/user/backlog/29_1_1597779043.jpeg', 'storage/user/icon/29_1_1597779043.jpeg', 9, '2020-08-19 01:00:43', '2020-08-19 01:00:43', NULL),
(129, 29, NULL, 'storage/user/backlog/29_1_1599156093.jpeg', 'storage/user/icon/29_1_1599156093.jpeg', 9, '2020-09-03 23:31:33', '2020-09-03 23:31:33', NULL),
(130, 29, NULL, 'storage/user/backlog/29_1_1599156452.jpeg', 'storage/user/icon/29_1_1599156452.jpeg', 9, '2020-09-03 23:37:32', '2020-09-03 23:37:32', NULL),
(131, 27, NULL, 'storage/user/backlog/27_1_1599156912.jpeg', 'storage/user/icon/27_1_1599156912.jpeg', 9, '2020-09-03 23:45:12', '2020-09-03 23:45:12', NULL),
(132, 29, NULL, 'storage/user/backlog/29_1_1599670954.jpeg', 'storage/user/icon/29_1_1599670954.jpeg', 9, '2020-09-09 22:32:34', '2020-09-09 22:32:34', NULL),
(133, 2, NULL, 'storage/user/backlog/2_1_1599671051.jpeg', 'storage/user/icon/2_1_1599671051.jpeg', 9, '2020-09-09 22:34:11', '2020-09-09 22:34:11', NULL),
(134, 27, NULL, 'storage/user/backlog/27_1_1600186626.jpeg', 'storage/user/icon/27_1_1600186626.jpeg', 9, '2020-09-15 21:47:06', '2020-09-15 21:47:06', NULL),
(135, 27, NULL, 'storage/user/backlog/27_2_1600186626.jpeg', 'storage/user/icon/27_2_1600186626.jpeg', 9, '2020-09-15 21:47:06', '2020-09-15 21:47:06', NULL),
(136, 27, NULL, 'storage/user/backlog/27_3_1600186626.jpeg', 'storage/user/icon/27_3_1600186626.jpeg', 9, '2020-09-15 21:47:06', '2020-09-15 21:47:06', NULL),
(137, 27, NULL, 'storage/user/backlog/27_4_1600186626.jpeg', 'storage/user/icon/27_4_1600186626.jpeg', 9, '2020-09-15 21:47:06', '2020-09-15 21:47:06', NULL),
(138, 2, NULL, 'storage/user/backlog/2_1_1600314046.jpeg', 'storage/user/icon/2_1_1600314046.jpeg', 9, '2020-09-17 09:10:46', '2020-09-17 09:11:29', '2020-09-17 09:11:29'),
(139, 2, NULL, 'storage/user/backlog/2_2_1600314046.jpeg', 'storage/user/icon/2_2_1600314046.jpeg', 9, '2020-09-17 09:10:46', '2020-09-17 09:10:46', NULL),
(140, 2, NULL, 'storage/user/backlog/2_3_1600314046.jpeg', 'storage/user/icon/2_3_1600314046.jpeg', 9, '2020-09-17 09:10:46', '2020-09-17 09:10:46', NULL),
(141, 27, NULL, 'storage/user/backlog/27_1_1600965618.jpeg', 'storage/user/icon/27_1_1600965618.jpeg', 9, '2020-09-24 22:10:19', '2020-09-24 22:10:19', NULL),
(142, 27, NULL, 'storage/user/backlog/27_2_1600965619.jpeg', 'storage/user/icon/27_2_1600965619.jpeg', 9, '2020-09-24 22:10:19', '2020-09-24 22:10:19', NULL),
(143, 25, NULL, 'storage/user/backlog/25_1_1600998479.jpeg', 'storage/user/icon/25_1_1600998479.jpeg', 9, '2020-09-25 07:17:59', '2020-09-25 07:17:59', NULL),
(144, 2, 36, 'storage/user/backlog/2_1_1602109092.jpeg', 'storage/user/icon/2_1_1602109092.jpeg', 13, '2020-10-08 03:48:12', '2020-10-08 03:48:54', NULL),
(145, 2, 35, 'storage/user/backlog/2_1_1602628792.jpeg', 'storage/user/icon/2_1_1602628792.jpeg', 13, '2020-10-14 04:09:52', '2020-10-14 04:30:44', NULL),
(146, 2, 35, 'storage/user/backlog/2_1_1602631489.jpeg', 'storage/user/icon/2_1_1602631489.jpeg', 13, '2020-10-14 04:54:49', '2020-10-14 04:55:11', NULL),
(147, 2, 35, 'storage/user/backlog/2_1_1602707325.jpeg', 'storage/user/icon/2_1_1602707325.jpeg', 13, '2020-10-15 01:58:45', '2020-10-15 02:00:02', NULL),
(148, 2, NULL, 'storage/user/backlog/2_1_1602708440.jpeg', 'storage/user/icon/2_1_1602708440.jpeg', 9, '2020-10-15 02:17:20', '2020-10-15 02:17:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keep_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `keep_id`, `qty`, `created_at`, `updated_at`) VALUES
(20, 2, 25, 1, '2020-02-20 02:29:23', '2020-02-20 02:29:23'),
(19, 2, 32, 1, '2020-02-20 02:29:04', '2020-02-20 02:29:15'),
(18, 2, 3, 1, '2020-02-13 23:51:27', '2020-02-15 05:00:43'),
(15, 3, 6, 1, '2020-02-09 23:51:17', '2020-02-09 23:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reply` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `device` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_tokens`
--

INSERT INTO `device_tokens` (`id`, `user_id`, `device`, `token`, `created_at`, `updated_at`) VALUES
(1, 19, 'ios', 'eMDoBEEibUwsi74T1vPKxi:APA91bFqENF--91YcyyAbNSJLlu9kzBuV0bAWpqPXUPjPH1BCWhH6pLnwHtIQmvmKnB_a7hJNO2sKsQ-USJ7ezJDomJl7lOZdl7m--mrX779dJAqb0nU_egCwUBfz7f4Ng3wwhCO5ndo', '2020-08-13 13:24:12', '2020-08-13 13:24:12'),
(2, 20, 'ios', 'dEZSQluCakYwiv0ThNxnTV:APA91bEKy2d2AFu5KTgOkFJzIv1FJeRL_fPCiUk-1u2zw3aqEzjsAH7CzZL4n5nqxqyMR85hBHeY0tJku7xYcEJB0pB7gh6nsRfy9fbSzt3esl4zp1iWhB2c-ERAxn9yyOzpK3Psq0kW', '2020-08-13 14:46:03', '2020-08-13 14:46:03'),
(3, 21, 'ios', 'fuKOxNgsvEiftdCvkXZud6:APA91bFsAdhwAFpPRy2GhEuxJitpNksb70rQMf7o_MNxGSHoDJIPVE64KUWJxnmg8k3lSvX_7JRhcDdMxDMSq-22GUl3GBe9DfaY_NV33xt3DMqfD3NlU7TErIcTZbrtaUjSfVZMVZ81', '2020-08-14 12:47:39', '2020-08-14 12:47:39'),
(4, 28, 'ios', 'cZRwagpE2E3AgTgkStBXEp:APA91bGGnRIfCRE2V9VOOCJVFn9V0aErVV0PuMgBhQLW7Hd5dk00tsWqO8fFCCY76jjG_QY5pH9bWfby_i2aARPFYvgwuwCwGObRTqb7GbKJ7OiYkgYZYKvDMGTa0delIsLuQywiFi24', '2020-08-17 11:18:42', '2020-08-17 11:54:55'),
(5, 23, 'ios', 'chn_SdEwBEHUtcb0iSwprL:APA91bHIDFPOPnj_cDe1SJ0UzuGopK5P8I7ZOFRpHLpiI2er28QHTbTot9vU0m_50TBJfwBAHQTlhMBwBVl-5JoiuT_zflcOa7C4UYI7iMpjju6lvM1B-8wvPR-4Eun_7dJRRMeXXlTc', '2020-08-17 11:26:01', '2020-08-17 11:26:01'),
(6, 25, 'ios', 'dokcJ_gThke9rJpIhr8ZAn:APA91bFj2-SLrlti_plm-v6bl_INscTMyb31zzCEiWd0jydI_2_pN_YPyrAic3BwddC3hSVKsMZvQZEvmV_AKrctXehQ3rlrNovwFAwqV2hTz3GU3wVbxQvADC3imMRSaQrr80HRp5BX', '2020-08-17 11:35:39', '2020-08-17 11:35:39'),
(7, 27, 'ios', 'ecAzabH_DUKEtqKfwuPY3V:APA91bGRuWe0DLf2lRCt4i0PfxRcDNBSdrdmwJI-jBspSkMM0xptJHozSDTMsH9RZW1-pSYgGDIz39YdI3beGh-PUKzxwN_jgFrhJDpv47RSDvOCgcddIDzp762bpQPR13BfrODldgrj', '2020-08-17 11:54:48', '2020-08-17 11:54:48'),
(8, 29, 'ios', 'dpuKY8FF_kd2uwQEJ9K8qN:APA91bES9Zaacw5ysReP0xk4ecX1Um8zN1GfoyxAlUzzUUfgYV8MRpACtiwZhvrsQvJBlhQpeRzoadGER__NqSfkNYpfv0rplch30LlWARl9RlYHjSGMKEWgqisBxQIT4MCfySRRfhDO', '2020-08-17 12:10:27', '2020-08-17 12:10:27'),
(9, 31, 'ios', 'eE52X3_Xh0sRm9KI72_aW8:APA91bHd2H41QRJgtKv8cH_L-mfXmwFNN09sVD3gXCnvf6aj9RrqG6PWqva9wbwL-QhZbUc5c38tHE90j5q2pSEsBWPLRIU5FROEq_6mB87NP8r6QP_u9pO1JOwuXCDJ7woPp0v63OFj', '2020-09-17 09:08:25', '2020-09-17 09:08:25'),
(10, 32, 'ios', 'deDWgt3lR05-m2oJdyXpbo:APA91bEoHP6E5clHYhJwNhscd6WmrIIr_O9BZMrsahQTYA7LnY8KqDR8Rujq9kTi8_cpKVX13_urYznxS2o2qccriNkhD5svTP50WLMnB2pBntbzy17wrTQVyGfdhJETodFd5JtF0Vvo', '2020-09-17 11:59:28', '2020-09-17 11:59:28'),
(11, 33, 'ios', 'cocVs8ENOUnaiZd0KNl0E1:APA91bEFsI2EeN_MXAjoqeFi3NE4tthx1YcOoxVWBSBuJPNqOmvTXbOqLtBSefGkwgMK6KtrHW0-aadR9IQF0osjSbB1ZP7SIjbg-4sdgf9olq-jjLRFe7KClBh2-U4PV9PihdYNoBpw', '2020-09-17 13:57:34', '2020-09-17 13:57:34'),
(12, 34, 'ios', 'drpbqcUoMEOsr9sTtVbDxt:APA91bH0TrHYYeFMBtyidOPtOvRTfMX2SfGggQWumCjPVRr97KCrQQlllTJc81QT6imT0C3EUxDEMLPmR3Glg6XvDjGceMg8Rglz392DNXgKDLjYvT_Id0jez8rudZYMT97DcJoyB3BH', '2020-09-19 22:12:47', '2020-09-19 22:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keeps`
--

CREATE TABLE `keeps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `backlog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `shipped` tinyint(1) NOT NULL DEFAULT '0',
  `print` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keeps`
--

INSERT INTO `keeps` (`id`, `user_id`, `admin_id`, `backlog_id`, `image`, `icon`, `status`, `shipped`, `print`, `transaction_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 5, 'storage/user/keep/1_1580206722.png', 'storage/user/icon/1_1580206722.png', 7, 0, 0, NULL, '2020-01-28 15:48:42', '2020-01-28 18:12:06', NULL),
(2, 1, NULL, 2, 'storage/user/keep/1_1580210184.jpeg', 'storage/user/icon/1_1580210184.jpeg', 10, 0, 0, NULL, '2020-01-28 16:46:24', '2020-01-28 16:46:24', NULL),
(3, 2, NULL, 14, 'storage/user/keep/2_1580266887.jpeg', 'storage/user/icon/2_1580266887.jpeg', 7, 0, 0, NULL, '2020-01-29 08:31:27', '2020-01-29 08:32:13', NULL),
(4, 2, NULL, 13, 'storage/user/keep/2_1580266964.jpeg', 'storage/user/icon/2_1580266964.jpeg', 8, 0, 0, NULL, '2020-01-29 08:32:44', '2020-01-29 08:37:03', NULL),
(5, 2, NULL, 16, 'storage/user/keep/2_1580266988.jpeg', 'storage/user/icon/2_1580266988.jpeg', 8, 0, 0, NULL, '2020-01-29 08:33:08', '2020-01-29 08:37:01', NULL),
(6, 3, NULL, 17, 'storage/user/keep/3_1580274944.jpeg', 'storage/user/icon/3_1580274944.jpeg', 7, 0, 0, NULL, '2020-01-29 10:45:45', '2020-01-29 10:46:30', NULL),
(7, 1, NULL, 12, 'storage/user/keep/1_1580276620.png', 'storage/user/icon/1_1580276620.png', 7, 0, 0, 52, '2020-01-29 11:13:40', '2020-06-10 13:01:30', NULL),
(8, 1, NULL, 11, 'storage/user/keep/1_1580276631.png', 'storage/user/icon/1_1580276631.png', 7, 0, 0, NULL, '2020-01-29 11:13:51', '2020-01-29 11:22:49', NULL),
(9, 1, NULL, 10, 'storage/user/keep/1_1580366360.png', 'storage/user/icon/1_1580366360.png', 7, 0, 0, 1, '2020-01-30 12:09:20', '2020-01-30 12:12:45', NULL),
(10, 4, NULL, 21, 'storage/user/keep/4_1580538170.jpeg', 'storage/user/icon/4_1580538170.jpeg', 7, 0, 0, 12, '2020-02-01 11:52:50', '2020-02-01 21:36:57', NULL),
(11, 4, NULL, 22, 'storage/user/keep/4_1580538179.jpeg', 'storage/user/icon/4_1580538179.jpeg', 7, 0, 0, 11, '2020-02-01 11:52:59', '2020-02-01 21:36:53', NULL),
(12, 4, NULL, 23, 'storage/user/keep/4_1580538191.jpeg', 'storage/user/icon/4_1580538191.jpeg', 7, 0, 0, 10, '2020-02-01 11:53:11', '2020-02-01 21:36:50', NULL),
(13, 4, NULL, 24, 'storage/user/keep/4_1580540680.jpeg', 'storage/user/icon/4_1580540680.jpeg', 7, 0, 0, 9, '2020-02-01 12:34:40', '2020-02-01 19:49:19', NULL),
(14, 4, NULL, 25, 'storage/user/keep/4_1580540689.jpeg', 'storage/user/icon/4_1580540689.jpeg', 14, 0, 0, NULL, '2020-02-01 12:34:49', '2020-02-01 12:35:17', NULL),
(15, 4, NULL, 26, 'storage/user/keep/4_1580540699.jpeg', 'storage/user/icon/4_1580540699.jpeg', 8, 0, 0, NULL, '2020-02-01 12:34:59', '2020-02-01 19:27:17', NULL),
(16, 2, NULL, 15, 'storage/user/keep/2_1580791472.jpeg', 'storage/user/icon/2_1580791472.jpeg', 8, 0, 0, NULL, '2020-02-04 10:14:33', '2020-02-04 10:20:10', NULL),
(17, 2, NULL, 27, 'storage/user/keep/2_1580792128.jpeg', 'storage/user/icon/2_1580792128.jpeg', 7, 0, 0, 18, '2020-02-04 10:18:55', '2020-02-04 10:34:09', NULL),
(18, 2, NULL, 28, 'storage/user/keep/2_1580791750.jpeg', 'storage/user/icon/2_1580791750.jpeg', 8, 0, 0, NULL, '2020-02-04 10:19:10', '2020-02-04 10:23:12', NULL),
(19, 2, NULL, 29, 'storage/user/keep/2_1580792289.jpeg', 'storage/user/icon/2_1580792289.jpeg', 7, 0, 0, 17, '2020-02-04 10:19:22', '2020-02-04 10:34:09', NULL),
(20, 2, NULL, 32, 'storage/user/keep/2_1580793036.jpeg', 'storage/user/icon/2_1580793036.jpeg', 8, 0, 0, NULL, '2020-02-04 10:40:36', '2020-02-04 10:42:03', NULL),
(21, 2, NULL, 31, 'storage/user/keep/2_1580793049.jpeg', 'storage/user/icon/2_1580793049.jpeg', 7, 0, 0, 19, '2020-02-04 10:40:49', '2020-02-04 10:41:36', NULL),
(22, 2, NULL, 37, 'storage/user/keep/2_1580797851.jpeg', 'storage/user/icon/2_1580797851.jpeg', 7, 0, 0, 20, '2020-02-04 12:00:51', '2020-02-04 12:03:20', NULL),
(23, 2, NULL, 38, 'storage/user/keep/2_1580798015.jpeg', 'storage/user/icon/2_1580798015.jpeg', 14, 0, 0, NULL, '2020-02-04 12:02:51', '2020-02-04 12:04:47', NULL),
(24, 2, NULL, 42, 'storage/user/keep/2_1580877982.jpeg', 'storage/user/icon/2_1580877982.jpeg', 8, 0, 0, NULL, '2020-02-05 10:16:22', '2020-02-05 10:17:38', NULL),
(25, 2, NULL, 41, 'storage/user/keep/2_1580877997.jpeg', 'storage/user/icon/2_1580877997.jpeg', 7, 0, 0, 21, '2020-02-05 10:16:34', '2020-02-05 10:17:26', NULL),
(26, 2, NULL, 39, 'storage/user/keep/2_1581108504.jpeg', 'storage/user/icon/2_1581108504.jpeg', 8, 0, 0, NULL, '2020-02-08 02:18:24', '2020-02-08 02:21:37', NULL),
(27, 2, NULL, 43, 'storage/user/keep/2_1581108592.jpeg', 'storage/user/icon/2_1581108592.jpeg', 8, 0, 0, NULL, '2020-02-08 02:19:51', '2020-02-08 02:20:58', NULL),
(28, 2, NULL, 46, 'storage/user/keep/2_1581386848.jpeg', 'storage/user/icon/2_1581386848.jpeg', 7, 0, 0, 23, '2020-02-11 07:37:29', '2020-02-11 07:39:03', NULL),
(29, 2, NULL, 45, 'storage/user/keep/2_1581386893.jpeg', 'storage/user/icon/2_1581386893.jpeg', 8, 0, 0, NULL, '2020-02-11 07:38:13', '2020-02-11 07:39:00', NULL),
(30, 2, NULL, 47, 'storage/user/keep/2_1581400893.jpeg', 'storage/user/icon/2_1581400893.jpeg', 8, 0, 0, NULL, '2020-02-11 11:30:35', '2020-02-12 23:22:17', NULL),
(31, 2, NULL, 48, 'storage/user/keep/2_1581609493.jpeg', 'storage/user/icon/2_1581609493.jpeg', 8, 0, 0, NULL, '2020-02-13 21:28:13', '2020-02-13 21:29:12', NULL),
(32, 2, NULL, 49, 'storage/user/keep/2_1582145851.jpeg', 'storage/user/icon/2_1582145851.jpeg', 7, 0, 0, 28, '2020-02-20 02:27:31', '2020-02-20 02:28:34', NULL),
(33, 2, NULL, 54, 'storage/user/keep/2_1583978907.jpeg', 'storage/user/icon/2_1583978907.jpeg', 8, 0, 0, NULL, '2020-03-12 07:38:24', '2020-03-16 07:41:22', NULL),
(34, 2, NULL, 55, 'storage/user/keep/2_1583978974.jpeg', 'storage/user/icon/2_1583978974.jpeg', 8, 0, 0, NULL, '2020-03-12 07:39:34', '2020-03-12 07:41:37', NULL),
(35, 2, NULL, 56, 'storage/user/keep/2_1583979058.jpeg', 'storage/user/icon/2_1583979058.jpeg', 8, 0, 0, NULL, '2020-03-12 07:39:53', '2020-03-16 07:41:21', NULL),
(36, 12, NULL, 69, 'storage/user/keep/12_1586096478.jpeg', 'storage/user/icon/12_1586096478.jpeg', 6, 0, 0, NULL, '2020-04-05 19:51:18', '2020-04-05 19:51:58', NULL),
(37, 12, NULL, 70, 'storage/user/keep/12_1586096485.jpeg', 'storage/user/icon/12_1586096485.jpeg', 7, 0, 0, 45, '2020-04-05 19:51:25', '2020-04-05 20:02:48', NULL),
(38, 12, NULL, 68, 'storage/user/keep/12_1586096500.jpeg', 'storage/user/icon/12_1586096500.jpeg', 7, 0, 0, 44, '2020-04-05 19:51:41', '2020-04-05 20:01:31', NULL),
(39, 13, NULL, 100, 'storage/user/keep/13_1591639291.jpeg', 'storage/user/icon/13_1591639291.jpeg', 7, 0, 0, 57, '2020-06-08 23:31:31', '2020-06-11 10:16:29', NULL),
(40, 13, NULL, 91, 'storage/user/keep/13_1591639299.jpeg', 'storage/user/icon/13_1591639299.jpeg', 7, 0, 0, 56, '2020-06-08 23:31:39', '2020-06-10 18:26:34', NULL),
(41, 13, NULL, 90, 'storage/user/keep/13_1591639309.jpeg', 'storage/user/icon/13_1591639309.jpeg', 7, 0, 0, 55, '2020-06-08 23:31:49', '2020-06-10 18:25:56', NULL),
(42, 13, NULL, 89, 'storage/user/keep/13_1591639319.jpeg', 'storage/user/icon/13_1591639319.jpeg', 7, 0, 0, 54, '2020-06-08 23:31:59', '2020-06-10 18:25:02', NULL),
(43, 13, NULL, 94, 'storage/user/keep/13_1591639331.jpeg', 'storage/user/icon/13_1591639331.jpeg', 7, 0, 0, 51, '2020-06-08 23:32:11', '2020-06-10 12:57:55', NULL),
(44, 13, NULL, 93, 'storage/user/keep/13_1591639348.jpeg', 'storage/user/icon/13_1591639348.jpeg', 7, 0, 0, 50, '2020-06-08 23:32:28', '2020-06-10 12:55:13', NULL),
(45, 13, NULL, 87, 'storage/user/keep/13_1591639527.jpeg', 'storage/user/icon/13_1591639527.jpeg', 7, 0, 0, 49, '2020-06-08 23:35:27', '2020-06-10 12:49:28', NULL),
(46, 13, NULL, 86, 'storage/user/keep/13_1591639539.jpeg', 'storage/user/icon/13_1591639539.jpeg', 7, 0, 0, 48, '2020-06-08 23:35:39', '2020-06-08 23:44:43', NULL),
(47, 13, NULL, 88, 'storage/user/keep/13_1591639552.jpeg', 'storage/user/icon/13_1591639552.jpeg', 7, 0, 0, 46, '2020-06-08 23:35:52', '2020-06-08 23:37:29', NULL),
(48, 13, NULL, 85, 'storage/user/keep/13_1591639566.jpeg', 'storage/user/icon/13_1591639566.jpeg', 7, 0, 0, 47, '2020-06-08 23:36:06', '2020-06-08 23:39:28', NULL),
(49, 13, NULL, 99, 'storage/user/keep/13_1591852236.jpeg', 'storage/user/icon/13_1591852236.jpeg', 7, 0, 0, 59, '2020-06-11 10:40:31', '2020-06-11 10:42:30', NULL),
(50, 13, NULL, 95, 'storage/user/keep/13_1591852400.jpeg', 'storage/user/icon/13_1591852400.jpeg', 7, 0, 0, 60, '2020-06-11 10:43:20', '2020-06-11 10:43:57', NULL),
(51, 13, NULL, 80, 'storage/user/keep/13_1591852467.jpeg', 'storage/user/icon/13_1591852467.jpeg', 10, 0, 0, NULL, '2020-06-11 10:44:27', '2020-06-11 10:44:27', NULL),
(52, 13, NULL, 81, 'storage/user/keep/13_1591852514.jpeg', 'storage/user/icon/13_1591852514.jpeg', 7, 0, 0, 61, '2020-06-11 10:45:15', '2020-06-11 10:45:53', NULL),
(53, 13, NULL, 82, 'storage/user/keep/13_1591857583.jpeg', 'storage/user/icon/13_1591857583.jpeg', 7, 0, 0, 62, '2020-06-11 12:09:43', '2020-06-11 12:10:13', NULL),
(54, 13, NULL, 92, 'storage/user/keep/13_1591863014.jpeg', 'storage/user/icon/13_1591863014.jpeg', 10, 0, 0, NULL, '2020-06-11 13:40:13', '2020-06-11 13:40:14', NULL),
(55, 13, NULL, 78, 'storage/user/keep/13_1591863060.jpeg', 'storage/user/icon/13_1591863060.jpeg', 7, 0, 0, 63, '2020-06-11 13:41:00', '2020-06-11 13:42:46', NULL),
(56, 2, NULL, 53, 'storage/user/keep/2_1592161512.jpeg', 'storage/user/icon/2_1592161512.jpeg', 8, 0, 0, NULL, '2020-06-15 00:35:12', '2020-06-19 11:49:12', NULL),
(57, 2, NULL, 52, 'storage/user/keep/2_1592161685.jpeg', 'storage/user/icon/2_1592161685.jpeg', 8, 0, 0, NULL, '2020-06-15 00:38:01', '2020-06-15 00:41:07', NULL),
(58, 13, NULL, 98, 'storage/user/keep/13_1592201650.jpeg', 'storage/user/icon/13_1592201650.jpeg', 7, 0, 0, 66, '2020-06-15 11:44:10', '2020-06-15 11:44:56', NULL),
(59, 14, NULL, 101, 'storage/user/keep/14_1592202702.jpeg', 'storage/user/icon/14_1592202702.jpeg', 7, 0, 0, 68, '2020-06-15 12:01:42', '2020-07-14 17:21:20', NULL),
(60, 14, NULL, 102, 'storage/user/keep/14_1592202980.jpeg', 'storage/user/icon/14_1592202980.jpeg', 7, 0, 0, 69, '2020-06-15 12:06:20', '2020-07-14 17:07:29', NULL),
(61, 2, NULL, 104, 'storage/user/keep/2_1592547463.jpeg', 'storage/user/icon/2_1592547463.jpeg', 8, 0, 0, NULL, '2020-06-19 11:47:40', '2020-07-01 03:58:18', NULL),
(62, 2, NULL, 106, 'storage/user/keep/2_1594150964.jpeg', 'storage/user/icon/2_1594150964.jpeg', 8, 0, 0, NULL, '2020-07-08 01:11:47', '2020-07-14 16:29:02', NULL),
(63, 2, NULL, 107, 'storage/user/keep/2_1594715557.jpg', 'storage/user/icon/2_1594715557.jpg', 8, 0, 1, NULL, '2020-07-08 01:13:44', '2020-08-14 01:37:08', NULL),
(64, 20, NULL, 117, 'storage/user/keep/20_1597312690.jpeg', 'storage/user/icon/20_1597312690.jpeg', 6, 0, 0, NULL, '2020-08-13 15:28:10', '2020-08-13 15:28:31', NULL),
(65, 20, NULL, 118, 'storage/user/keep/20_1597314657.jpeg', 'storage/user/icon/20_1597314657.jpeg', 6, 0, 0, NULL, '2020-08-13 15:30:05', '2020-08-13 16:01:07', NULL),
(66, 20, NULL, 116, 'storage/user/keep/20_1597313284.jpeg', 'storage/user/icon/20_1597313284.jpeg', 6, 0, 0, NULL, '2020-08-13 15:38:04', '2020-08-13 15:38:22', NULL),
(67, 20, NULL, 115, 'storage/user/keep/20_1597313575.jpeg', 'storage/user/icon/20_1597313575.jpeg', 7, 0, 0, 70, '2020-08-13 15:42:55', '2020-08-13 16:33:25', NULL),
(68, 2, NULL, 119, 'storage/user/keep/2_1597349311.jpeg', 'storage/user/icon/2_1597349311.jpeg', 8, 0, 0, NULL, '2020-08-14 01:38:31', '2020-08-14 01:40:51', NULL),
(69, 2, NULL, 120, 'storage/user/keep/2_1597349544.jpeg', 'storage/user/icon/2_1597349544.jpeg', 8, 0, 0, NULL, '2020-08-14 01:42:24', '2020-08-14 05:48:52', NULL),
(70, 2, NULL, 121, 'storage/user/keep/2_1597364504.jpeg', 'storage/user/icon/2_1597364504.jpeg', 8, 0, 0, NULL, '2020-08-14 05:51:44', '2020-08-15 01:14:54', NULL),
(71, 2, NULL, 122, 'storage/user/keep/2_1597364587.jpeg', 'storage/user/icon/2_1597364587.jpeg', 8, 0, 0, NULL, '2020-08-14 05:53:07', '2020-08-14 05:53:33', NULL),
(72, 25, NULL, 126, 'storage/user/keep/25_1597644723.jpeg', 'storage/user/icon/25_1597644723.jpeg', 6, 0, 0, NULL, '2020-08-17 11:42:03', '2020-08-17 11:42:48', NULL),
(73, 27, NULL, 127, 'storage/user/keep/27_1597645701.jpeg', 'storage/user/icon/27_1597645701.jpeg', 7, 0, 0, 71, '2020-08-17 11:58:21', '2020-08-17 11:59:39', NULL),
(74, 25, NULL, 125, 'storage/user/keep/25_1597652126.jpeg', 'storage/user/icon/25_1597652126.jpeg', 7, 0, 0, 73, '2020-08-17 13:43:46', '2020-08-25 21:16:23', NULL),
(75, 29, NULL, 128, 'storage/user/keep/29_1597779088.jpeg', 'storage/user/icon/29_1597779088.jpeg', 7, 0, 1, 72, '2020-08-19 01:01:29', '2020-09-03 22:55:06', NULL),
(76, 29, NULL, 129, 'storage/user/keep/29_1599156117.jpeg', 'storage/user/icon/29_1599156117.jpeg', 8, 0, 0, NULL, '2020-09-03 23:31:58', '2020-09-03 23:37:25', NULL),
(77, 29, NULL, 130, 'storage/user/keep/29_1599156471.jpeg', 'storage/user/icon/29_1599156471.jpeg', 7, 0, 0, 74, '2020-09-03 23:37:51', '2020-09-03 23:47:14', NULL),
(78, 27, NULL, 131, 'storage/user/keep/27_1599156992.jpeg', 'storage/user/icon/27_1599156992.jpeg', 8, 0, 0, NULL, '2020-09-03 23:46:32', '2020-09-05 17:47:30', NULL),
(79, 29, NULL, 132, 'storage/user/keep/29_1599670981.jpeg', 'storage/user/icon/29_1599670981.jpeg', 6, 0, 0, NULL, '2020-09-09 22:33:01', '2020-09-09 22:33:31', NULL),
(80, 2, NULL, 133, 'storage/user/keep/2_1599671079.jpeg', 'storage/user/icon/2_1599671079.jpeg', 8, 0, 0, NULL, '2020-09-09 22:34:39', '2020-09-15 21:55:06', NULL),
(81, 2, NULL, 140, 'storage/user/keep/2_1600314131.jpeg', 'storage/user/icon/2_1600314131.jpeg', 8, 0, 0, NULL, '2020-09-17 09:12:11', '2020-09-17 09:17:37', NULL),
(82, 2, NULL, 139, 'storage/user/keep/2_1602105231.jpeg', 'storage/user/icon/2_1602105231.jpeg', 8, 0, 0, NULL, '2020-10-08 02:43:52', '2020-10-08 03:48:04', NULL),
(83, 2, NULL, 144, 'storage/user/keep/2_1602109487.jpeg', 'storage/user/icon/2_1602109487.jpeg', 14, 0, 0, NULL, '2020-10-08 03:54:47', '2020-10-08 03:55:40', NULL),
(84, 2, NULL, 145, 'storage/user/keep/2_1602630898.jpeg', 'storage/user/icon/2_1602630898.jpeg', 14, 0, 0, NULL, '2020-10-14 04:44:59', '2020-10-14 04:53:33', NULL),
(85, 2, NULL, 146, 'storage/user/keep/2_1602631524.jpeg', 'storage/user/icon/2_1602631524.jpeg', 7, 1, 1, 78, '2020-10-14 04:55:24', '2020-10-14 05:04:10', NULL),
(86, 2, NULL, 147, 'storage/user/keep/2_1602707491.jpeg', 'storage/user/icon/2_1602707491.jpeg', 7, 1, 1, 79, '2020-10-15 02:01:31', '2020-10-15 02:03:52', NULL),
(87, 2, NULL, 148, 'storage/user/keep/2_1602708453.jpeg', 'storage/user/icon/2_1602708453.jpeg', 10, 0, 0, NULL, '2020-10-15 02:17:33', '2020-10-15 02:17:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL,
  `ordering` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`slug`, `name`, `icon`, `parent`, `ordering`, `status`) VALUES
('admin', 'Admin', 'fa fa-user-secret', NULL, 1, 1),
('backlog', 'Backlog', NULL, 'gallery', 0, 1),
('bread', 'Bread', 'ft-target', 'setting', 3, 1),
('dashboard', 'Dashboard', 'ft-home', NULL, 0, 1),
('help', 'Help', 'ft-mail', NULL, 7, 1),
('image', 'Image', 'fa fa-picture-o', NULL, 3, 1),
('menu', 'Menu', NULL, 'setting', 2, 1),
('notification', 'Notification', NULL, NULL, NULL, 1),
('order', 'Order', 'fa fa-shopping-bag', NULL, 5, 1),
('role', 'Role', NULL, 'setting', 1, 1),
('setting', 'Setting', 'ft-settings', NULL, 8, 1),
('site_setting', 'Site Setting', 'ft-sliders', 'setting', 0, 1),
('transaction', 'Transaction', 'fa fa-usd', NULL, 6, 1),
('user', 'User', 'ft-users', NULL, 4, 1),
('user_image', 'User Image', 'fa  fa-file-image-o', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2017_06_19_070344_create_posts_table', 1),
(34, '2017_06_19_070731_create_tags_table', 1),
(35, '2017_06_19_070801_create_categories_table', 1),
(36, '2017_06_19_070824_create_category_posts_table', 1),
(37, '2017_06_19_070923_create_post_tags_table', 1),
(38, '2017_06_19_071000_create_admins_table', 1),
(39, '2017_06_19_071103_create_roles_table', 1),
(40, '2017_06_19_071125_create_admin_roles_table', 1),
(41, '2017_07_22_070234_create_permissions_table', 2),
(42, '2017_08_04_055752_likes', 3),
(48, '2014_10_12_000000_create_users_table', 4),
(49, '2014_10_12_100000_create_password_resets_table', 4),
(50, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(51, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(52, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(53, '2016_06_01_000004_create_oauth_clients_table', 4),
(54, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('3556a0e74469242fd2c10de1d1a6ab6afab599f4699260339ef485f714f4130a910e268139350afa', 1, 1, '', '[]', 1, '2020-01-28 13:11:50', '2020-01-28 13:11:50', '2021-01-28 13:11:50'),
('06c5b2d520eca893f3e16f786efe6c8aa9992397d84118eb585ba714bf6f702db832cc61592800c5', 2, 1, '', '[]', 1, '2020-01-28 21:55:41', '2020-01-28 21:55:41', '2021-01-28 21:55:41'),
('0e322edf1e10b63b58a0392b49fa53aef3e5eb01949feb041a7e16049e48477943e7ab5a3b39a221', 3, 1, '', '[]', 1, '2020-01-29 01:42:31', '2020-01-29 01:42:31', '2021-01-29 01:42:31'),
('fbc97c3d87fe5561843bfbe4eb5e3f5256e69ba085e6b4bfc8d1f64b5054e419e94d64cab2a5dc1e', 4, 1, '', '[]', 1, '2020-01-29 20:46:27', '2020-01-29 20:46:27', '2021-01-29 20:46:27'),
('0b345ef85f5b42d7e230f623d9b957225bcf2fd61549679ab29c497a08def3a4e0c5169f7082c170', 4, 1, 'android', '[]', 1, '2020-02-01 10:36:38', '2020-02-01 10:36:38', '2021-02-01 10:36:38'),
('64d0d6160521ada72ae3626f3c50c1c2fc1356790745deccdfb1328f77dbb5ace6a90f95fd56ddc0', 4, 1, 'ios', '[]', 1, '2020-02-01 10:37:35', '2020-02-01 10:37:35', '2021-02-01 10:37:35'),
('a5a4414c6bc8d600a28662e755eb0e9e85c3a89900756343a02d57b2439e98bb7a6c0a538eb6f9ad', 1, 1, 'android', '[]', 1, '2020-02-01 11:46:12', '2020-02-01 11:46:12', '2021-02-01 11:46:12'),
('c190ef93049244a397ae572e4789c3346b6e9cb56a0d79362cd30fe3748e318ef91463f68007648a', 4, 1, 'android', '[]', 1, '2020-02-01 13:03:31', '2020-02-01 13:03:31', '2021-02-01 13:03:31'),
('9bec6d5da41b707b5a7f08a2ba4858e0e11d50ba8def76aaeb61ebe88e58947feca206fd24c59eda', 4, 1, 'ios', '[]', 1, '2020-02-01 14:20:27', '2020-02-01 14:20:27', '2021-02-01 14:20:27'),
('10a592a1172c1433353e1760c2e991abca50936ecd1bedd22f2dbc7c4941df64e364b431e720eefd', 4, 1, 'ios', '[]', 1, '2020-02-01 19:27:05', '2020-02-01 19:27:05', '2021-02-01 19:27:05'),
('e81f9c068dc886d4f5e94f25bbcc4a4a01f68c85663a96d9028f7bedc117e49843f4bbe2b7052078', 4, 1, 'android', '[]', 1, '2020-02-01 20:57:13', '2020-02-01 20:57:13', '2021-02-01 20:57:13'),
('b06ff5d379de613a028d9e44495d460f8134a92c3861bc551414f12591e2d44409fee57030245f9f', 4, 1, 'ios', '[]', 1, '2020-02-01 21:19:43', '2020-02-01 21:19:43', '2021-02-01 21:19:43'),
('89210036742042526f5fd50aacf552c7bf867c3f44fd300a26699e45d95d568c9bd1e7e1038a7828', 4, 1, 'android', '[]', 1, '2020-02-01 21:41:08', '2020-02-01 21:41:08', '2021-02-01 21:41:08'),
('1b2972c2cb5eb89a960802e8fd440c9de1db30e7d60a90da382dc5b6d0d49e1aa6a88d590d82dad3', 4, 1, 'ios', '[]', 1, '2020-02-01 21:45:56', '2020-02-01 21:45:56', '2021-02-01 21:45:56'),
('849dfedc1bcfdeac0ab0f74e29ac1ba68200b2efc57fc8d851cc0f3a9863143684fa30c897c9ba5a', 4, 1, 'android', '[]', 1, '2020-02-01 21:51:52', '2020-02-01 21:51:52', '2021-02-01 21:51:52'),
('5fad4b08665074c679d5280de7e9c0c62424fcb560e8f8d17f97d85cd3dbdf177116339b398c9e6a', 4, 1, 'ios', '[]', 1, '2020-02-01 22:04:15', '2020-02-01 22:04:15', '2021-02-01 22:04:15'),
('eca306a1010b48508a7aa106f08473169d77cffc364ce0a546c627661ac633083950adacd9ba7282', 4, 1, 'ios', '[]', 1, '2020-02-02 10:31:49', '2020-02-02 10:31:49', '2021-02-02 10:31:49'),
('c049b9bbf3d3adc3fa2639745770d8fbd6e971ac5eaa3e59a0b60a61abbccecaf38656f77a6ff7a7', 4, 1, 'ios', '[]', 1, '2020-02-02 14:11:39', '2020-02-02 14:11:39', '2021-02-02 14:11:39'),
('e32395518961ed1ee82908585b24bc71f1b0e05560ba41b04def9b8f4030015602a862c34f44d3c5', 1, 1, 'android', '[]', 1, '2020-02-03 11:10:24', '2020-02-03 11:10:24', '2021-02-03 11:10:24'),
('98c96ed58684b9d14d0f988ebc7cfe4be4f35521af245720fbb5df2368683ebd90c8fd187a2f98b2', 1, 1, 'android', '[]', 1, '2020-02-04 10:02:25', '2020-02-04 10:02:25', '2021-02-04 10:02:25'),
('99dfb7caad98e60338fb90192536af9f64191dc2b21c48eaba62513bc492c16a800dc906c0ecad7d', 2, 1, 'android', '[]', 1, '2020-02-04 10:24:22', '2020-02-04 10:24:22', '2021-02-04 10:24:22'),
('6ca8642289da32a9394f2da4bb8444920ca0b1f2794d24bc4cc3c7b9d5bc64bcf1d7c257999c5dee', 2, 1, 'ios', '[]', 1, '2020-02-04 10:29:13', '2020-02-04 10:29:13', '2021-02-04 10:29:13'),
('a2f84172a4addbb156f2d5169e0d7199784d85935ed3e377d0c5d1c84864558e7ea3a9b9f8451682', 2, 1, 'ios', '[]', 1, '2020-02-05 22:51:26', '2020-02-05 22:51:26', '2021-02-05 22:51:26'),
('9e27bf9272f0cf5138db95cf86554141d70f4016892ece3f99b60e9d9f8cbc478ef552b46b4bc2f3', 5, 1, '', '[]', 0, '2020-02-06 19:40:12', '2020-02-06 19:40:12', '2021-02-06 19:40:12'),
('2c6d2178e3a3ed87ef35469f06fdfb9f071ac484df79b357efc2d13e97b68de3b3b1833a1bb25789', 3, 1, 'ios', '[]', 0, '2020-02-09 23:50:59', '2020-02-09 23:50:59', '2021-02-09 23:50:59'),
('63d970af8f94788208929e538c75ca44bb782289eac16e3dac4c72aefeb2c72c7bee0dca7c3aa63d', 2, 1, 'ios', '[]', 1, '2020-02-10 00:55:47', '2020-02-10 00:55:47', '2021-02-10 00:55:47'),
('cc91c96cfc1bb5b2dca656e15000f32d8601ea879fed3ef866e20a0e25d913c1d8c898282955db0b', 4, 1, 'ios', '[]', 1, '2020-02-23 09:36:28', '2020-02-23 09:36:28', '2021-02-23 09:36:28'),
('d81ee5950e4d18272f711a076a0bfc4d51c534b7f3160e344154e42f72796bee414b2d05257c014d', 4, 1, 'ios', '[]', 1, '2020-02-23 09:42:01', '2020-02-23 09:42:01', '2021-02-23 09:42:01'),
('d7b62ce3ec1c4ec116308180cc18a64095fa8a48ff34335b2c2ef961f48a2ebc55330ba52b747891', 9, 1, '', '[]', 0, '2020-02-28 17:21:45', '2020-02-28 17:21:45', '2021-02-28 17:21:45'),
('54898fa6c2f09a0a4f47ea5c65a33a3c7da3de4b5e7dc9e51e77e7293cc31f38f0c282dc6ca22c7f', 2, 1, 'android', '[]', 1, '2020-03-03 15:57:39', '2020-03-03 15:57:39', '2021-03-03 15:57:39'),
('43f8c5e31ee71f06d6a83320f029619fad2a0ff5489cade9829637b09c33ee31876f585a0224d8f8', 2, 1, 'ios', '[]', 1, '2020-03-12 03:58:00', '2020-03-12 03:58:00', '2021-03-12 03:58:00'),
('6e333777bf4120fea4544e249c82e87f1a793668e0479d08e2e7ae413c7b3e97a3e69f679716dc05', 2, 1, 'ios', '[]', 1, '2020-03-13 01:42:07', '2020-03-13 01:42:07', '2021-03-13 01:42:07'),
('1baba2408a9cf1b908be3ddc0517b6241b9f6611a2f42a8cc341e41a16d09ed471b5d648d98f5843', 10, 1, '', '[]', 0, '2020-03-14 12:06:45', '2020-03-14 12:06:45', '2021-03-14 12:06:45'),
('184c6477082a528a5197459cb24f62e75ebc4be462a545752c167537d3c582b534cf3a21fb62f58c', 11, 1, '', '[]', 0, '2020-03-16 14:28:04', '2020-03-16 14:28:04', '2021-03-16 14:28:04'),
('23dac3ed7e4530e0171f0035ece6ab452b0c17e31af57b114eebb4379e3c1f844c274154c90d0f9d', 4, 1, 'ios', '[]', 1, '2020-04-05 11:18:05', '2020-04-05 11:18:05', '2021-04-05 11:18:05'),
('cd2859ef8cf9e0269be8e0ce4316410f2a8767a2c19633466b9bc09245ef2d4bc95ddeaf17d605c6', 4, 1, 'ios', '[]', 1, '2020-04-05 15:41:03', '2020-04-05 15:41:03', '2021-04-05 15:41:03'),
('03b60b2ddc5b414da429a2260953ca0aca67785414aaac06ef73d2c7cd8af1824c94b85fa71c830d', 4, 1, 'ios', '[]', 1, '2020-04-05 17:13:43', '2020-04-05 17:13:43', '2021-04-05 17:13:43'),
('cbca5324e941ca66825e8ecacb3fdfb1b660d6bed0513d938d29e91b598833076d43c944c242a6c1', 4, 1, 'ios', '[]', 1, '2020-04-05 17:33:38', '2020-04-05 17:33:38', '2021-04-05 17:33:38'),
('34cfbace8e4e073fd62cf59cd6487b02f1377d3c8e62cea47682192939718ec4106bad021b7d2523', 4, 1, 'ios', '[]', 0, '2020-04-05 18:21:31', '2020-04-05 18:21:31', '2021-04-05 18:21:31'),
('7e003902dd93b3df72ed9a2f9fcba6f4b65f3d63100239092900085adba26d2ab06fb840be8b1ed4', 12, 1, '', '[]', 0, '2020-04-05 18:22:43', '2020-04-05 18:22:43', '2021-04-05 18:22:43'),
('45b84c236cd600c445e0473c2f5610fe530b0edf72316bab251b4ba2b433440fa426a3c83e06dbee', 13, 1, '', '[]', 1, '2020-06-08 11:48:20', '2020-06-08 11:48:20', '2021-06-08 11:48:20'),
('bc4f65b0f0d7ed8019d2d78236d4340522fa5289220dd5f08356e03ef0eee5bb5858d4dc986bf79d', 13, 1, 'android', '[]', 1, '2020-06-08 11:48:36', '2020-06-08 11:48:36', '2021-06-08 11:48:36'),
('552857c1a305af93faac4c93a3c9e13d32ee7ad54b6646863f9cf3d16b106359612b691b6cdfbc14', 13, 1, 'ios', '[]', 1, '2020-06-08 11:48:45', '2020-06-08 11:48:45', '2021-06-08 11:48:45'),
('4c3137ff5472b5f72ac811d951f0dc201c556060cdbef0b6a1c65207fcf322a93ef233bf7bd672dc', 13, 1, 'android', '[]', 1, '2020-06-08 22:47:19', '2020-06-08 22:47:19', '2021-06-08 22:47:19'),
('385da2b6cbb46dca977b9de47cb40cbbad0e4e7a4472eaf1ca87591d9ca8feec627e834a3dc25125', 13, 1, 'ios', '[]', 1, '2020-06-08 22:48:10', '2020-06-08 22:48:10', '2021-06-08 22:48:10'),
('c94b25ba03a456206aac4d78e3d000ba01adadd353509395b94946b0c468509a181423f6884f599e', 13, 1, 'ios', '[]', 1, '2020-06-08 23:04:13', '2020-06-08 23:04:13', '2021-06-08 23:04:13'),
('e88aaa33f7451c5ced13d22bce1523d7e1f1d0446b12bfa4031287397d3c3ea4984e16ae53269536', 1, 1, 'android', '[]', 0, '2020-06-10 12:50:33', '2020-06-10 12:50:33', '2021-06-10 12:50:33'),
('8dcc6715a35ea3adca9fe325deaa16d177b422dfb8da74e648929f16eaa7dd9f11989e5ab4c286bf', 13, 1, 'ios', '[]', 1, '2020-06-11 11:19:21', '2020-06-11 11:19:21', '2021-06-11 11:19:21'),
('e43a9ff7b3475a6e843b720b2c34cba8aca39045d8b15966244172bfe7762f0274519a3d267b3110', 13, 1, 'ios', '[]', 1, '2020-06-11 12:19:49', '2020-06-11 12:19:49', '2021-06-11 12:19:49'),
('20ce3a3f36933fce1b91e91a41458a87c24c9574a5c472e9c244eb5d457e10b4cd1c135fc1fd575c', 13, 1, 'ios', '[]', 1, '2020-06-15 11:35:37', '2020-06-15 11:35:37', '2021-06-15 11:35:37'),
('357ff8cc8e286a800911ec0970669caa2312cfd2637d07902cc5818453a26697040e0e0e6d371f57', 13, 1, 'ios', '[]', 1, '2020-06-15 11:44:49', '2020-06-15 11:44:49', '2021-06-15 11:44:49'),
('991b17a4bc0365a07a7f66cdae2d17b9aa0b257af52bca74bb815fca6c027afe185c5dc2e9969a1b', 14, 1, '', '[]', 1, '2020-06-15 11:58:16', '2020-06-15 11:58:16', '2021-06-15 11:58:16'),
('f750cca878596a799ef2390d9442d5207a0c979821b77a5f9de29f145e63e4e41285c25cc9a9966e', 14, 1, 'ios', '[]', 1, '2020-06-15 12:00:31', '2020-06-15 12:00:31', '2021-06-15 12:00:31'),
('a617eb7491ec65e79f6773b999944a11870711f2646683fa6582ee1ad92cc435a7fbb63ba52481ab', 14, 1, 'ios', '[]', 1, '2020-06-15 12:03:01', '2020-06-15 12:03:01', '2021-06-15 12:03:01'),
('3917584bd6b907c4162763fe82965f017d8c36d847a6500bafbbf68cb92ae657d9039d9060e3640a', 14, 1, 'ios', '[]', 1, '2020-06-15 12:05:54', '2020-06-15 12:05:54', '2021-06-15 12:05:54'),
('46fcc76dbfa504840bed7d6382fdbbdbf51c236e3e699306b42236a6519f04ddf2d99c6e62dd4741', 14, 1, 'ios', '[]', 0, '2020-06-15 12:07:19', '2020-06-15 12:07:19', '2021-06-15 12:07:19'),
('6f30fd86a19f6ed7100ce63ce6011f1f89a17e4d71bebfdd7e13c01553c827b40a5d20f3a8e29c90', 2, 1, 'ios', '[]', 1, '2020-06-15 12:25:29', '2020-06-15 12:25:29', '2021-06-15 12:25:29'),
('ff5b2402537868361191d26731051725fc1fd73226636b202b00e8197f87806ed07af28dfc4ec41e', 2, 1, 'ios', '[]', 1, '2020-06-15 12:27:11', '2020-06-15 12:27:11', '2021-06-15 12:27:11'),
('8c4e98c2d7c44ba72322e071c6f8f5516c71b1212f376687081bf7bd18a8474400f69bb68073bfca', 2, 1, 'ios', '[]', 1, '2020-06-16 12:02:05', '2020-06-16 12:02:05', '2021-06-16 12:02:05'),
('8bad5f354926c23946511a41d462b7ab64032aa03d99df531b583c4a10660b86c3e18f0f6b813340', 2, 1, 'ios', '[]', 1, '2020-06-17 02:02:58', '2020-06-17 02:02:58', '2021-06-17 02:02:58'),
('3721f60287c7d85d729443249681ee984d2dd34e55576a162b1e32eae3c8ab3e05717259a8445da1', 2, 1, 'ios', '[]', 1, '2020-06-18 08:25:20', '2020-06-18 08:25:20', '2021-06-18 08:25:20'),
('1116384194cf8e36d44bee31882a42eed673fb66de986290239725a7eeb9882d3c3ad3589088a968', 2, 1, 'ios', '[]', 1, '2020-06-18 09:17:55', '2020-06-18 09:17:55', '2021-06-18 09:17:55'),
('50bc111f85d5b8158fdaf766f1b7ef11693161d48a3654b6106706303196545516312e6efd03ea1e', 2, 1, 'ios', '[]', 1, '2020-06-19 11:48:55', '2020-06-19 11:48:55', '2021-06-19 11:48:55'),
('0a96a8375ffd50fc915841323d74da0259920ccdbe474c770ad076bb792937a1da09f54e3e878d0c', 2, 1, 'ios', '[]', 1, '2020-06-20 11:56:52', '2020-06-20 11:56:52', '2021-06-20 11:56:52'),
('f1cd803ca4970e8779dfc8b94620ce0547cc91b71d405c19fba11614210e455c6342e2b349018b8d', 2, 1, 'ios', '[]', 1, '2020-06-21 12:27:02', '2020-06-21 12:27:02', '2021-06-21 12:27:02'),
('f7b2a7dd15d29e93449322ebc0c72b38f596d7318522651378b00768fc1ff41b449a69c5538460aa', 13, 1, 'ios', '[]', 0, '2020-06-22 20:47:15', '2020-06-22 20:47:15', '2021-06-22 20:47:15'),
('e29cfe1444a38d2cfdfaa4ee97366cb9e2ddf0feee90012f603030601aa68c18fcd66bf6556f8477', 2, 1, 'ios', '[]', 1, '2020-07-09 07:46:39', '2020-07-09 07:46:39', '2021-07-09 07:46:39'),
('24c33617fdcd05228ba158e82d7fc92586354bd6865a288e781095eb76d941f04890adf689f16179', 2, 1, 'ios', '[]', 1, '2020-07-14 10:25:36', '2020-07-14 10:25:36', '2021-07-14 10:25:36'),
('50a0a23aa016a21eef85d809950c516805d0e6f4135832aba697b532379276876dbc986c586fdf59', 2, 1, 'ios', '[]', 1, '2020-07-14 10:50:35', '2020-07-14 10:50:35', '2021-07-14 10:50:35'),
('ee6042bdb3c183cdadd1f964edda1fda6f2a1ef53f269e31d5298f8912f80ef6f39ce3ea9815ff05', 2, 1, 'ios', '[]', 1, '2020-07-14 11:49:46', '2020-07-14 11:49:46', '2021-07-14 11:49:46'),
('ec7e0d7879f07c4eced91a614752cac1670a048aa07c480a8e2085baa1f541b701f57e793aa63a97', 2, 1, 'ios', '[]', 1, '2020-07-14 11:52:58', '2020-07-14 11:52:58', '2021-07-14 11:52:58'),
('4cea2a91b8c0347049bc55fdf0cb564228a8e94d8a0561c20188ec0fb9435adb586320ecdcef48df', 15, 1, '', '[]', 0, '2020-08-13 10:45:26', '2020-08-13 10:45:26', '2021-08-13 10:45:26'),
('4408e828f55a1139c5a48a62660b2730f3e0278de8a2c65c6921fe85e40720dd8605e3caf8ee91a4', 17, 1, '', '[]', 0, '2020-08-13 12:43:49', '2020-08-13 12:43:49', '2021-08-13 12:43:49'),
('b5ed205496c5ec4d8c0984b7b7e86b18579839942f454cc34b530f493e81e602c79f32590c136ba1', 19, 1, '', '[]', 0, '2020-08-13 13:24:12', '2020-08-13 13:24:12', '2021-08-13 13:24:12'),
('b1d52f92f4f7fcfe02ce61819e24389ae8081c46c579582b3e6a57c722fa1c651fd17d37a412543a', 20, 1, '', '[]', 1, '2020-08-13 14:46:03', '2020-08-13 14:46:03', '2021-08-13 14:46:03'),
('2fbb36b7a170caff0f065fbe662bd7c054a8e16b12075797f3ec4a5f7624ae8bdf02266236c47174', 20, 1, 'ios', '[]', 1, '2020-08-13 16:09:17', '2020-08-13 16:09:17', '2021-08-13 16:09:17'),
('73d8db044e2e1bc1d2dc5cc1918de871e95007da05f52a650260d2d80f38a4076c61dd4cca0d533a', 20, 1, 'ios', '[]', 1, '2020-08-13 16:22:02', '2020-08-13 16:22:02', '2021-08-13 16:22:02'),
('934a9fc17755b43c7d02d3bcba4561379495243de38e0176ad577adeb98cb4b6ce6810beaf5a9855', 2, 1, 'ios', '[]', 1, '2020-08-14 01:36:55', '2020-08-14 01:36:55', '2021-08-14 01:36:55'),
('2730df18d2470c4ef820cc77b6aad7cc8b3dc65c496f2aa817e4e078873ef2c20a92a2cf424cae8d', 20, 1, 'ios', '[]', 0, '2020-08-14 10:45:29', '2020-08-14 10:45:29', '2021-08-14 10:45:29'),
('343e979aa7e00fdbbaab24cf6f8f461e3f9a336c6e7ed00ff5b48c2de436be3c32b681b15d4f9d0f', 21, 1, '', '[]', 0, '2020-08-14 12:47:40', '2020-08-14 12:47:40', '2021-08-14 12:47:40'),
('c2dea480ff5f8829fbbe14d200675fbead4f6b76e16e4f3e1cea8b7a682ac081a1f9e2dad075d921', 22, 1, '', '[]', 0, '2020-08-17 11:18:43', '2020-08-17 11:18:43', '2021-08-17 11:18:43'),
('5fd2f6dd6414188c9a5b6c469f73e7d79df5632227a1565b6e2b77d40dc47108a07abab3ad9b2dc1', 23, 1, '', '[]', 0, '2020-08-17 11:26:01', '2020-08-17 11:26:01', '2021-08-17 11:26:01'),
('764a2887245033aefa3b4b93a02056a9c9cdba78e88a52f773aed8f3dd0ed7c3dbd0e02858f2eb38', 25, 1, '', '[]', 0, '2020-08-17 11:35:39', '2020-08-17 11:35:39', '2021-08-17 11:35:39'),
('cfef930ed18b4df63053f8ba2247384295fefb5ebb66592ef033f12cd4ef2602f1c5be32d898e11d', 26, 1, '', '[]', 0, '2020-08-17 11:50:36', '2020-08-17 11:50:36', '2021-08-17 11:50:36'),
('e36e2d6e464015f98ce4d24cd97911535d2c742b00095be8a1ce28a78408b1713d61b7c110a9ac08', 27, 1, '', '[]', 0, '2020-08-17 11:54:48', '2020-08-17 11:54:48', '2021-08-17 11:54:48'),
('e67cde20def5ed864573eba205393150c14a9de576b66280977ea16515a15fa7e4ee20585d93b9e1', 28, 1, '', '[]', 0, '2020-08-17 11:54:55', '2020-08-17 11:54:55', '2021-08-17 11:54:55'),
('004ebbb708eaba8f8539f46c33970392907f210fbd4c1cf9a06f5115d7bef6152d8fe96bbca1cd8d', 29, 1, '', '[]', 0, '2020-08-17 12:10:27', '2020-08-17 12:10:27', '2021-08-17 12:10:27'),
('12e55fa63bae76c639979c85f823cf263a6e79519341879514afdd65d2b9890a93f3de1204864f9c', 2, 1, 'ios', '[]', 1, '2020-09-09 22:33:51', '2020-09-09 22:33:51', '2021-09-09 22:33:51'),
('c0ea991ca6fb4fc67556f74f35330670ac8c0dee687924b04410f16d35558a9461809901be881e81', 30, 1, '', '[]', 1, '2020-09-12 11:22:24', '2020-09-12 11:22:24', '2021-09-12 11:22:24'),
('2e3609643326729d30b0b3413da6afcb4eed012352f53fa087cdc45ebb5de3ca7abf91086325f21e', 30, 1, 'ios', '[]', 0, '2020-09-12 11:23:40', '2020-09-12 11:23:40', '2021-09-12 11:23:40'),
('e70ab3e8c67cbb11e7f118cfbe4df3f34e1288bfe1dce6222fd8e7a42361c1474fa73752fb6c167f', 31, 1, '', '[]', 0, '2020-09-17 09:08:25', '2020-09-17 09:08:25', '2021-09-17 09:08:25'),
('034a3ce1aa4509bfc7bac84c4f37df8b21b083bb9fee4380f4e3dde83e99aa8536085b3116e94ff7', 32, 1, '', '[]', 0, '2020-09-17 11:59:29', '2020-09-17 11:59:29', '2021-09-17 11:59:29'),
('d6560f995329e8e208b447dafec0f82a4390b8ae8acf999b6c856331e87ad42e22130a63ecc387d4', 33, 1, '', '[]', 0, '2020-09-17 13:57:35', '2020-09-17 13:57:35', '2021-09-17 13:57:35'),
('f7ff019e6b6ad2e344ebbf5465e9c9d8740ecbadb783bd9cddead76c6955a63b03561c8ce07641f5', 34, 1, '', '[]', 1, '2020-09-19 22:12:48', '2020-09-19 22:12:48', '2021-09-19 22:12:48'),
('381fe6beac07d9b43e37daf6335681c6791d30c153523f9dbb635fbf235483c7b28d912c7adc947e', 34, 1, 'ios', '[]', 1, '2020-09-19 22:16:40', '2020-09-19 22:16:40', '2021-09-19 22:16:40'),
('9b486e85d5488ef45fbf6a7d81f691d94c7a6eed5fb6a519042a80bf297048bcc9ee337cae037efb', 34, 1, 'ios', '[]', 1, '2020-09-19 22:24:38', '2020-09-19 22:24:38', '2021-09-19 22:24:38'),
('ea8cc1b5552a4c52e2ce5da110b8333fe1f7c0bda567c21ab7d4fd75f2369949cbfe38bb8099033f', 34, 1, 'ios', '[]', 0, '2020-09-20 10:13:06', '2020-09-20 10:13:06', '2021-09-20 10:13:06'),
('8a228cdfe62430d084283c755545c711c1bbaa802393a177f70e08c34b30b19cdab1d18f4ce5d4c0', 2, 1, 'ios', '[]', 0, '2020-10-14 04:09:42', '2020-10-14 04:09:42', '2021-10-14 04:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Keep Personal Access Client', 'Pddvc4TwVbNseQa8DahcqbuwK9ypyZiB7QnzcLVG', 'http://localhost', 1, 0, 0, '2020-01-28 13:10:38', '2020-01-28 13:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-01-28 13:10:38', '2020-01-28 13:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) NOT NULL,
  `shipping_charge` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) DEFAULT '0.00',
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `transaction_id`, `shipping_id`, `shipping_charge`, `discount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 2, 0.10, 0.00, 16, '2020-01-29 17:35:32', '2020-01-29 17:35:32', NULL),
(2, 1, 2, 2, 0.50, 0.00, 16, '2020-01-30 12:26:34', '2020-01-30 12:26:34', NULL),
(3, 1, 3, 2, 0.50, 0.00, 16, '2020-01-30 12:32:24', '2020-01-30 12:32:24', NULL),
(4, 1, 4, 2, 0.50, 0.00, 16, '2020-01-30 12:32:50', '2020-01-30 12:32:50', NULL),
(5, 1, 5, 2, 0.50, 0.00, 16, '2020-01-30 16:38:36', '2020-01-30 16:38:36', NULL),
(6, 1, 6, 1, 0.50, 0.00, 16, '2020-02-01 12:19:34', '2020-02-01 12:19:34', NULL),
(7, 4, 14, 8, 1.30, 0.00, 16, '2020-02-02 10:56:42', '2020-02-02 10:56:42', NULL),
(8, 1, 15, 2, 0.30, 0.00, 16, '2020-02-03 11:11:40', '2020-02-03 11:11:40', NULL),
(9, 1, 16, 2, 0.30, 0.00, 16, '2020-02-03 11:12:39', '2020-02-03 11:12:39', NULL),
(10, 4, 22, 3, 2.20, 0.00, 16, '2020-02-09 21:05:08', '2020-02-09 21:05:08', NULL),
(11, 2, 27, 9, 0.30, 0.00, 16, '2020-02-12 23:22:30', '2020-02-12 23:22:30', NULL),
(12, 4, 30, 3, 0.20, 0.00, 16, '2020-02-23 10:22:54', '2020-02-23 10:22:54', NULL),
(13, 4, 31, 3, 0.30, 0.00, 16, '2020-02-23 10:25:38', '2020-02-23 10:25:38', NULL),
(14, 4, 37, 3, 0.10, 0.00, 16, '2020-04-05 11:18:33', '2020-04-05 11:18:34', NULL),
(15, 4, 38, 3, 0.10, 0.00, 16, '2020-04-05 11:19:22', '2020-04-05 11:19:22', NULL),
(16, 4, 39, 3, 0.10, 0.00, 16, '2020-04-05 11:20:03', '2020-04-05 11:20:03', NULL),
(17, 4, 40, 3, 0.20, 0.00, 16, '2020-04-05 11:40:44', '2020-04-05 11:40:44', NULL),
(18, 4, 41, 3, 0.10, 0.00, 16, '2020-04-05 12:02:09', '2020-04-05 12:02:09', NULL),
(19, 4, 42, 3, 0.10, 0.00, 16, '2020-04-05 12:03:29', '2020-04-05 12:03:29', NULL),
(20, 4, 43, 3, 0.10, 0.00, 16, '2020-04-05 12:06:22', '2020-04-05 12:06:22', NULL),
(21, 13, 64, 13, 3.50, 0.00, 16, '2020-06-12 12:48:02', '2020-06-12 12:48:02', NULL),
(22, 13, 65, 13, 0.50, 0.00, 16, '2020-06-15 11:36:00', '2020-06-15 11:36:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `keep_id` int(255) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `order_id`, `transaction_id`, `keep_id`, `qty`, `image`, `shipping_charge`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-01-29 17:35:32', '2020-01-29 17:35:32'),
(2, 1, 2, NULL, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-01-30 12:26:34', '2020-01-30 12:26:34'),
(3, 1, 2, NULL, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-01-30 12:26:34', '2020-01-30 12:26:34'),
(4, 1, 2, NULL, 9, 3, 'storage/user/keep/1_1580366360.png', 0.30, '2020-01-30 12:26:34', '2020-01-30 12:26:34'),
(5, 1, 3, NULL, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-01-30 12:32:24', '2020-01-30 12:32:24'),
(6, 1, 3, NULL, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-01-30 12:32:24', '2020-01-30 12:32:24'),
(7, 1, 3, NULL, 9, 3, 'storage/user/keep/1_1580366360.png', 0.30, '2020-01-30 12:32:24', '2020-01-30 12:32:24'),
(8, 1, 4, 4, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-01-30 12:32:50', '2020-01-30 12:32:50'),
(9, 1, 4, 4, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-01-30 12:32:50', '2020-01-30 12:32:50'),
(10, 1, 4, 4, 9, 3, 'storage/user/keep/1_1580366360.png', 0.30, '2020-01-30 12:32:50', '2020-01-30 12:32:50'),
(11, 1, 5, 5, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-01-30 16:38:36', '2020-01-30 16:38:36'),
(12, 1, 5, 5, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-01-30 16:38:36', '2020-01-30 16:38:36'),
(13, 1, 5, 5, 9, 3, 'storage/user/keep/1_1580366360.png', 0.30, '2020-01-30 16:38:36', '2020-01-30 16:38:36'),
(14, 1, 6, 6, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-02-01 12:19:34', '2020-02-01 12:19:34'),
(15, 1, 6, 6, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-02-01 12:19:34', '2020-02-01 12:19:34'),
(16, 1, 6, 6, 9, 3, 'storage/user/keep/1_1580366360.png', 0.30, '2020-02-01 12:19:34', '2020-02-01 12:19:34'),
(17, 4, 7, 14, 7, 3, 'storage/user/keep/1_1580276620.png', 0.30, '2020-02-02 10:56:42', '2020-02-02 10:56:42'),
(18, 4, 7, 14, 8, 2, 'storage/user/keep/1_1580276631.png', 0.20, '2020-02-02 10:56:42', '2020-02-02 10:56:42'),
(19, 4, 7, 14, 9, 2, 'storage/user/keep/1_1580366360.png', 0.20, '2020-02-02 10:56:42', '2020-02-02 10:56:42'),
(20, 4, 7, 14, 10, 3, 'storage/user/keep/4_1580538170.jpeg', 0.30, '2020-02-02 10:56:42', '2020-02-02 10:56:42'),
(21, 4, 7, 14, 11, 3, 'storage/user/keep/4_1580538179.jpeg', 0.30, '2020-02-02 10:56:42', '2020-02-02 10:56:42'),
(22, 1, 8, 15, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-02-03 11:11:40', '2020-02-03 11:11:40'),
(23, 1, 8, 15, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-02-03 11:11:40', '2020-02-03 11:11:40'),
(24, 1, 8, 15, 9, 1, 'storage/user/keep/1_1580366360.png', 0.10, '2020-02-03 11:11:40', '2020-02-03 11:11:40'),
(25, 1, 9, 16, 9, 1, 'storage/user/keep/1_1580366360.png', 0.10, '2020-02-03 11:12:39', '2020-02-03 11:12:39'),
(26, 1, 9, 16, 8, 1, 'storage/user/keep/1_1580276631.png', 0.10, '2020-02-03 11:12:39', '2020-02-03 11:12:39'),
(27, 1, 9, 16, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-02-03 11:12:39', '2020-02-03 11:12:39'),
(28, 4, 10, 22, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-02-09 21:05:08', '2020-02-09 21:05:08'),
(29, 4, 10, 22, 7, 4, 'storage/user/keep/1_1580276620.png', 0.40, '2020-02-09 21:05:08', '2020-02-09 21:05:08'),
(30, 4, 10, 22, 8, 5, 'storage/user/keep/1_1580276631.png', 0.50, '2020-02-09 21:05:08', '2020-02-09 21:05:08'),
(31, 4, 10, 22, 9, 4, 'storage/user/keep/1_1580366360.png', 0.40, '2020-02-09 21:05:08', '2020-02-09 21:05:08'),
(32, 4, 10, 22, 10, 4, 'storage/user/keep/4_1580538170.jpeg', 0.40, '2020-02-09 21:05:08', '2020-02-09 21:05:08'),
(33, 4, 10, 22, 11, 4, 'storage/user/keep/4_1580538179.jpeg', 0.40, '2020-02-09 21:05:08', '2020-02-09 21:05:08'),
(34, 2, 11, 27, 7, 1, 'storage/user/keep/1_1580276620.png', 0.10, '2020-02-12 23:22:30', '2020-02-12 23:22:30'),
(35, 2, 11, 27, 28, 1, 'storage/user/keep/2_1581386848.jpeg', 0.10, '2020-02-12 23:22:30', '2020-02-12 23:22:30'),
(36, 2, 11, 27, 25, 1, 'storage/user/keep/2_1580877997.jpeg', 0.10, '2020-02-12 23:22:30', '2020-02-12 23:22:30'),
(37, 4, 12, 30, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-02-23 10:22:54', '2020-02-23 10:22:54'),
(38, 4, 12, 30, 13, 1, 'storage/user/keep/4_1580540680.jpeg', 0.10, '2020-02-23 10:22:54', '2020-02-23 10:22:54'),
(39, 4, 13, 31, 10, 1, 'storage/user/keep/4_1580538170.jpeg', 0.10, '2020-02-23 10:25:38', '2020-02-23 10:25:38'),
(40, 4, 13, 31, 11, 1, 'storage/user/keep/4_1580538179.jpeg', 0.10, '2020-02-23 10:25:38', '2020-02-23 10:25:38'),
(41, 4, 13, 31, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-02-23 10:25:38', '2020-02-23 10:25:38'),
(42, 4, 14, 37, 13, 1, 'storage/user/keep/4_1580540680.jpeg', 0.10, '2020-04-05 11:18:33', '2020-04-05 11:18:34'),
(43, 4, 15, 38, 11, 1, 'storage/user/keep/4_1580538179.jpeg', 0.10, '2020-04-05 11:19:22', '2020-04-05 11:19:22'),
(44, 4, 16, 39, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-04-05 11:20:03', '2020-04-05 11:20:03'),
(45, 4, 17, 40, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-04-05 11:40:44', '2020-04-05 11:40:44'),
(46, 4, 17, 40, 13, 1, 'storage/user/keep/4_1580540680.jpeg', 0.10, '2020-04-05 11:40:44', '2020-04-05 11:40:44'),
(47, 4, 18, 41, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-04-05 12:02:09', '2020-04-05 12:02:09'),
(48, 4, 19, 42, 12, 1, 'storage/user/keep/4_1580538191.jpeg', 0.10, '2020-04-05 12:03:29', '2020-04-05 12:03:29'),
(49, 4, 20, 43, 11, 1, 'storage/user/keep/4_1580538179.jpeg', 0.10, '2020-04-05 12:06:22', '2020-04-05 12:06:22'),
(50, 13, 21, 64, 50, 1, 'storage/user/keep/13_1591852400.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(51, 13, 21, 64, 52, 1, 'storage/user/keep/13_1591852514.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(52, 13, 21, 64, 46, 1, 'storage/user/keep/13_1591639539.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(53, 13, 21, 64, 43, 1, 'storage/user/keep/13_1591639331.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(54, 13, 21, 64, 48, 1, 'storage/user/keep/13_1591639566.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(55, 13, 21, 64, 53, 1, 'storage/user/keep/13_1591857583.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(56, 13, 21, 64, 55, 1, 'storage/user/keep/13_1591863060.jpeg', 0.50, '2020-06-12 12:48:02', '2020-06-12 12:48:02'),
(57, 13, 22, 65, 53, 1, 'storage/user/keep/13_1591857583.jpeg', 0.50, '2020-06-15 11:36:00', '2020-06-15 11:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('appleios@yopmail.com', '$2y$10$dorpWWTViLAocU3vysFDFOhHZoe.E3DaSXGrpm5QVbMhF25cFfgdC', '2019-08-21 00:35:46'),
('nitishik2014@gmail.com', '$2y$10$2eC.q1Hyh9CuovV4eEj4Oeuzu6y4CKH9FzChp41EpgV1p6eJDXNqu', '2019-08-07 17:34:53'),
('shikha.sanix123@gmail.com', '$2y$10$YXcyNOZ.8xIuMHCBUU2S5OKau7krdvimr/O6Km/VwALrGQshX8Bte', '2019-08-07 17:18:36'),
('pankaj12@yopmail.com', '$2y$10$dX5ROe7.xlx0QpbpXRt.X.SSJfhEanX4C620TuRWpB20280IGEswO', '2019-08-20 23:55:20'),
('pankaj@yopmail.com', '$2y$10$86bjbaYPgIxnPT11jedJt.bsjMi0YIE2.LVSlnLRirAWqnAKdtfU2', '2019-08-26 23:52:58'),
('shikha.sanix@gmail.com', '$2y$10$VnwmYi7DmiNE9583TBCoK.7MhWr4IRzJv6iwfRpviGmkrGxmEVxk6', '2019-08-26 16:19:09'),
('asif@yopmail.com', '$2y$10$vblo.SBTc14qdoqsOwSqduM6GihDT1tbdZdIX.doHSYBJTgwHJSEq', '2019-08-28 01:11:19'),
('testuser@yopmail.com', '$2y$10$Pcjo71os0TuqoJEZunw99uYfb8kgeaU6XJcPOde8uNjNvxGbfwfNy', '2019-11-16 16:40:53'),
('zx@yopmail.com', '$2y$10$mveONiQb/MBBicmnLWo6puZ0pYrjiS75dwRkNENCiBaTkPNnJxyNu', '2019-12-14 16:41:42'),
('aaqibali@gmail.com', '$2y$10$Rk6roQ/TB6Famx1FRfJBE.f6XIk5B86NgeVCOqmZqxRJmR0BlIOhe', '2020-01-11 18:42:48'),
('aaqibali2@gmail.com', '$2y$10$GU2ADt0aFTbEWWepGgih8OqIYAjNZgf6uhqziYHAs/6XQu.Unb9F2', '2020-01-11 14:38:18'),
('emaaqibali279@gmail.com', '$2y$10$dHstVNihkzOZDvVBBY7PR.hnMNEIk.Di0JJ.ccpaUYxIujUa7uVz6', '2020-01-11 15:44:54'),
('aaqibali279@gmail.com', '$2y$10$S.4aBXUeEYF.hE50gSgyLOgjZPgmwFn04vUD3WDDMJilmFiFjcJX.', '2020-01-11 18:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `menu_slug` varchar(200) DEFAULT NULL,
  `permission_key` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `menu_slug`, `permission_key`) VALUES
(1, 'role', 'browse_role'),
(2, 'role', 'read_role'),
(3, 'role', 'add_role'),
(4, 'role', 'edit_role'),
(5, 'role', 'delete_role'),
(6, 'menu', 'browse_menu'),
(7, 'menu', 'read_menu'),
(8, 'menu', 'add_menu'),
(9, 'menu', 'edit_menu'),
(10, 'menu', 'delete_menu'),
(11, 'setting', 'browse_setting'),
(21, 'dashboard', 'browse_dashboard'),
(26, 'bread', 'browse_bread'),
(27, 'bread', 'read_bread'),
(28, 'bread', 'add_bread'),
(29, 'bread', 'edit_bread'),
(30, 'bread', 'delete_bread'),
(47, 'site_setting', 'browse_site_setting'),
(48, 'site_setting', 'read_site_setting'),
(49, 'site_setting', 'add_site_setting'),
(50, 'site_setting', 'edit_site_setting'),
(51, 'site_setting', 'delete_site_setting'),
(62, 'site_setting', 'logo_site_setting'),
(70, 'admin', 'browse_admin'),
(71, 'admin', 'read_admin'),
(72, 'admin', 'add_admin'),
(73, 'admin', 'edit_admin'),
(74, 'admin', 'delete_admin'),
(80, 'backlog', 'browse_backlog'),
(81, 'backlog', 'read_backlog'),
(82, 'backlog', 'add_backlog'),
(83, 'backlog', 'edit_backlog'),
(84, 'backlog', 'delete_backlog'),
(85, 'user', 'browse_user'),
(86, 'user', 'read_user'),
(87, 'user', 'add_user'),
(88, 'user', 'edit_user'),
(89, 'user', 'delete_user'),
(90, 'help', 'browse_help'),
(91, 'help', 'read_help'),
(92, 'help', 'add_help'),
(93, 'help', 'edit_help'),
(94, 'help', 'delete_help'),
(100, 'image', 'browse_image'),
(101, 'image', 'read_image'),
(102, 'image', 'edit_image'),
(109, 'admin', 'change_status_admin'),
(131, 'user_image', 'browse_user_image'),
(132, 'user_image', 'read_user_image'),
(133, 'user_image', 'add_user_image'),
(134, 'user_image', 'edit_user_image'),
(135, 'user_image', 'delete_user_image'),
(150, 'order', 'browse_order'),
(151, 'order', 'read_order'),
(152, 'order', 'add_order'),
(153, 'order', 'edit_order'),
(154, 'order', 'delete_order'),
(160, 'transaction', 'browse_transaction'),
(161, 'transaction', 'read_transaction'),
(162, 'transaction', 'add_transaction'),
(163, 'transaction', 'edit_transaction'),
(164, 'transaction', 'delete_transaction'),
(165, 'notification', 'browse_notification'),
(166, 'notification', 'read_notification'),
(167, 'notification', 'add_notification'),
(168, 'notification', 'edit_notification'),
(169, 'notification', 'delete_notification');

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`id`, `title`, `message`, `image`, `category`, `category_id`, `read_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'ds', 'ds', 'http://pwtthemes.com/demo/hannari/wp-content/uploads/2013/03/unicorn-wallpaper.jpg', '', NULL, NULL, '2018-09-27 09:23:22', '2018-09-27 09:23:22', NULL),
(7, 'cxc', 'cx', 'http://pwtthemes.com/demo/hannari/wp-content/uploads/2013/03/unicorn-wallpaper.jpg', '', NULL, NULL, '2018-09-27 09:24:14', '2018-09-27 09:24:14', NULL),
(8, 'Saksham', 'hello', 'http://pwtthemes.com/demo/hannari/wp-content/uploads/2013/03/unicorn-wallpaper.jpg', '', NULL, NULL, '2018-09-27 10:17:45', '2018-09-27 10:17:45', NULL),
(9, 'Hello', 'Saksham', 'http://pwtthemes.com/demo/hannari/wp-content/uploads/2013/03/unicorn-wallpaper.jpg', '', NULL, NULL, '2018-09-27 10:22:42', '2018-09-27 10:22:42', NULL),
(10, 'asif', 'test', 'image/notification/e7y21EOVDk43dZi812DIpJn4XAFYeu6AwnK8U57c.png', NULL, NULL, NULL, '2020-08-13 14:01:29', '2020-08-13 14:01:29', NULL),
(11, 'vdfv', 'vfdvdf', 'image/notification/H79CTUEFrLuHYxOgACd3LLYjXMe1mestoLdFls05.png', NULL, NULL, NULL, '2020-08-13 14:12:35', '2020-08-13 14:12:35', NULL),
(12, 'lkhol', 'kjhbkj', 'image/notification/EmCD45R5YGI284wFLSt0WYa8Gyw3yN1I63QDKnzL.png', NULL, NULL, NULL, '2020-08-13 14:51:01', '2020-08-13 14:51:01', NULL),
(13, 'asif', 'test', 'image/notification/wNeRKDOmjDvisIuRCng63RpQMQznNSRGOJr7QKaQ.png', NULL, NULL, NULL, '2020-08-13 15:29:36', '2020-08-13 15:29:36', NULL),
(14, 'rrrr', 'rrr', 'image/notification/RvT4cGIliEjeliCcOVP1nC2SKHFkmvgcp1DCVx6m.png', NULL, NULL, NULL, '2020-08-13 15:31:00', '2020-08-13 15:31:00', NULL),
(15, 'hgvjh', 'kjbkj', 'image/notification/ieqYzXM4XJXTPRhDtlAA3r59HLHabotkcEggWINu.png', NULL, NULL, NULL, '2020-08-13 15:32:52', '2020-08-13 15:32:52', NULL),
(16, 'dcsvsdfb', 'bdfbd', 'image/notification/ZsVPE9DVwdDe0PWnNHJwDovFPLhGNfS2bi4xqD0H.png', NULL, NULL, NULL, '2020-08-13 15:35:09', '2020-08-13 15:35:09', NULL),
(17, 'dcsvsdfb', 'bdfbd', 'image/notification/7mRqIid9pbW1FglzGFR95JRvANWfn9fx6sZYK10h.png', NULL, NULL, NULL, '2020-08-13 15:35:34', '2020-08-13 15:35:34', NULL),
(18, 'asif', 'cdsvsdv', 'image/notification/hzGYpidgEUO0Z8qEJK3jrXYqM7hZxMqCqRR1p9au.png', NULL, NULL, NULL, '2020-08-13 15:36:14', '2020-08-13 15:36:14', NULL),
(19, 'sdfyghjkl', 'dtfghjknlm,', 'image/notification/6WbnVvZXd0TlHmkbsLUADcwVUV4NAcJDq0Gy0C4K.jpeg', NULL, NULL, NULL, '2020-08-13 15:57:59', '2020-08-13 15:57:59', NULL),
(20, 'ghfhg', 'hhvb', 'image/notification/DBe3DBr3q0GKNY77Xf1cBQhvkVVDQP3olUDuMxQr.jpeg', NULL, NULL, NULL, '2020-08-17 11:56:03', '2020-08-17 11:56:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'root', 'Super Admin', '2019-03-28 06:21:03', '2019-03-28 06:21:03'),
(2, 'admin', 'Admin', '2019-03-28 06:21:03', '2019-03-28 06:21:03'),
(3, 'Editor', NULL, '2019-08-31 16:53:22', '2019-08-31 16:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`role_id`, `permission_key`) VALUES
(1, 'add_admin'),
(1, 'add_backlog'),
(1, 'add_bread'),
(1, 'add_help'),
(1, 'add_menu'),
(1, 'add_notification'),
(1, 'add_order'),
(1, 'add_role'),
(1, 'add_site_setting'),
(1, 'add_transaction'),
(1, 'add_user'),
(1, 'add_user_image'),
(1, 'browse_admin'),
(1, 'browse_backlog'),
(1, 'browse_bread'),
(1, 'browse_dashboard'),
(1, 'browse_help'),
(1, 'browse_image'),
(1, 'browse_menu'),
(1, 'browse_notification'),
(1, 'browse_order'),
(1, 'browse_role'),
(1, 'browse_setting'),
(1, 'browse_site_setting'),
(1, 'browse_transaction'),
(1, 'browse_user'),
(1, 'browse_user_image'),
(1, 'change_status_admin'),
(1, 'delete_admin'),
(1, 'delete_backlog'),
(1, 'delete_bread'),
(1, 'delete_help'),
(1, 'delete_menu'),
(1, 'delete_notification'),
(1, 'delete_order'),
(1, 'delete_role'),
(1, 'delete_site_setting'),
(1, 'delete_transaction'),
(1, 'delete_user'),
(1, 'delete_user_image'),
(1, 'edit_admin'),
(1, 'edit_backlog'),
(1, 'edit_bread'),
(1, 'edit_help'),
(1, 'edit_image'),
(1, 'edit_menu'),
(1, 'edit_notification'),
(1, 'edit_order'),
(1, 'edit_role'),
(1, 'edit_site_setting'),
(1, 'edit_transaction'),
(1, 'edit_user'),
(1, 'edit_user_image'),
(1, 'logo_site_setting'),
(1, 'read_admin'),
(1, 'read_backlog'),
(1, 'read_bread'),
(1, 'read_help'),
(1, 'read_image'),
(1, 'read_menu'),
(1, 'read_notification'),
(1, 'read_order'),
(1, 'read_role'),
(1, 'read_site_setting'),
(1, 'read_transaction'),
(1, 'read_user'),
(1, 'read_user_image'),
(2, 'add_admin'),
(2, 'add_backlog'),
(2, 'add_help'),
(2, 'add_menu'),
(2, 'add_order'),
(2, 'add_site_setting'),
(2, 'add_transaction'),
(2, 'add_user'),
(2, 'add_user_image'),
(2, 'browse_admin'),
(2, 'browse_dashboard'),
(2, 'browse_help'),
(2, 'browse_menu'),
(2, 'browse_order'),
(2, 'browse_setting'),
(2, 'browse_site_setting'),
(2, 'browse_transaction'),
(2, 'browse_user'),
(2, 'browse_user_image'),
(2, 'change_status_admin'),
(2, 'delete_backlog'),
(2, 'delete_help'),
(2, 'delete_menu'),
(2, 'delete_site_setting'),
(2, 'delete_user'),
(2, 'delete_user_image'),
(2, 'edit_admin'),
(2, 'edit_backlog'),
(2, 'edit_help'),
(2, 'edit_menu'),
(2, 'edit_site_setting'),
(2, 'edit_user'),
(2, 'edit_user_image'),
(2, 'logo_site_setting'),
(2, 'read_admin'),
(2, 'read_backlog'),
(2, 'read_help'),
(2, 'read_menu'),
(2, 'read_order'),
(2, 'read_site_setting'),
(2, 'read_transaction'),
(2, 'read_user'),
(2, 'read_user_image'),
(3, 'add_order'),
(3, 'browse_dashboard'),
(3, 'browse_image'),
(3, 'browse_order'),
(3, 'delete_order'),
(3, 'edit_image'),
(3, 'edit_order'),
(3, 'read_image'),
(3, 'read_order');

-- --------------------------------------------------------

--
-- Table structure for table `role_policies`
--

CREATE TABLE `role_policies` (
  `role_id` int(11) NOT NULL,
  `policy` longtext NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_policies`
--

INSERT INTO `role_policies` (`role_id`, `policy`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdvsdfsdfsdfsd', NULL, NULL),
(4, 'dsfdsfdsfsd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `shipping_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` text,
  `notification_title` varchar(255) DEFAULT NULL,
  `notification_content` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_description` text,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `product_price`, `shipping_price`, `email`, `mobile`, `address`, `notification_title`, `notification_content`, `site_title`, `site_description`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 0.50, 0.50, 'Wannonadam@gmail.com', '3236301826', 'E-99 Phase-7 Mohali Industrial Area \r\nPunjab - 160059', 'New image available', 'Your new edited image is available now', 'Keep', 'ios app', 'storage/sitesetting//1580274604_logo.png', 'storage/sitesetting//1580274802_favicon.png', NULL, '2020-08-13 16:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Success ', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(2, 'Pending', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(3, 'Canceled', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(4, 'Failed', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(5, 'Processing', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(6, 'Edited Image Approved By Admin', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(7, 'Image Keep By User', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(8, 'Image Discarded By User', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(9, 'Unprocessed Image ', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(11, 'Active User', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(13, 'Image Assigned To Editor', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(10, 'Processed Image ', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(12, 'Deactivated User', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(14, 'Image Reassigned To Editor', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(15, 'Image Cancelled and Reassigned To Other Editor', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(16, 'Order Placed', '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(17, 'Order Delivered Successful', '2020-01-25 00:00:00', '2020-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_type_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_charge` decimal(10,2) DEFAULT '0.00',
  `transaction_id` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `response_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response_failure_message` text COLLATE utf8mb4_unicode_ci,
  `activity_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `transaction_type_id`, `amount`, `transaction_charge`, `transaction_id`, `status`, `response_status`, `response_failure_message`, `activity_by`, `remarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-01-30 12:12:45', '2020-01-30 12:12:45', NULL),
(2, 1, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-01-30 12:26:34', '2020-01-30 12:26:34', NULL),
(3, 1, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-01-30 12:32:24', '2020-01-30 12:32:24', NULL),
(4, 1, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-01-30 12:32:50', '2020-01-30 12:32:50', NULL),
(5, 1, 3, 0.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-01-30 16:38:36', '2020-01-30 16:38:36', NULL),
(6, 1, 3, 0.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-01 12:19:34', '2020-02-01 12:19:34', NULL),
(7, 1, 2, NULL, 0.00, 'ch_1G7GFkGK06UtkCoHpgja7yKt', 1, 'succeeded', NULL, 'Balance added to wallet', NULL, '2020-02-01 12:48:52', '2020-02-01 12:48:53', NULL),
(8, 4, 2, 1234.00, 0.00, 'ch_1G7MoFGK06UtkCoHD6LIy28A', 1, 'succeeded', NULL, 'Balance added to wallet', NULL, '2020-02-01 19:48:54', '2020-02-01 19:48:57', NULL),
(9, 4, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-01 19:49:19', '2020-02-01 19:49:19', NULL),
(10, 4, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-01 21:36:50', '2020-02-01 21:36:50', NULL),
(11, 4, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-01 21:36:53', '2020-02-01 21:36:53', NULL),
(12, 4, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-01 21:36:57', '2020-02-01 21:36:57', NULL),
(13, 4, 2, 4321.00, 0.00, 'ch_1G7anPGK06UtkCoHuqDVXccR', 1, 'succeeded', NULL, 'Balance added to wallet', NULL, '2020-02-02 10:44:59', '2020-02-02 10:45:00', NULL),
(14, 4, 3, 1.30, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-02 10:56:42', '2020-02-02 10:56:42', NULL),
(15, 1, 3, 0.30, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-03 11:11:40', '2020-02-03 11:11:40', NULL),
(16, 1, 3, 0.30, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-03 11:12:39', '2020-02-03 11:12:39', NULL),
(17, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-04 10:34:09', '2020-02-04 10:34:09', NULL),
(18, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-04 10:34:09', '2020-02-04 10:34:09', NULL),
(19, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-04 10:41:36', '2020-02-04 10:41:36', NULL),
(20, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-04 12:03:20', '2020-02-04 12:03:20', NULL),
(21, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-05 10:17:26', '2020-02-05 10:17:26', NULL),
(22, 4, 3, 2.20, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-09 21:05:08', '2020-02-09 21:05:08', NULL),
(23, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-11 07:39:03', '2020-02-11 07:39:03', NULL),
(24, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-11 11:26:27', '2020-02-11 11:26:27', NULL),
(25, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-11 11:27:02', '2020-02-11 11:27:02', NULL),
(26, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-11 12:03:35', '2020-02-11 12:03:35', NULL),
(27, 2, 3, 0.30, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-12 23:22:30', '2020-02-12 23:22:30', NULL),
(28, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-02-20 02:28:34', '2020-02-20 02:28:34', NULL),
(29, 4, 2, 0.00, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-23 10:00:41', '2020-02-23 10:00:41', NULL),
(30, 4, 3, 0.20, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-23 10:22:54', '2020-02-23 10:22:54', NULL),
(31, 4, 3, 0.30, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-02-23 10:25:38', '2020-02-23 10:25:38', NULL),
(32, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-28 17:41:29', '2020-02-28 17:41:29', NULL),
(33, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-28 17:43:55', '2020-02-28 17:43:55', NULL),
(34, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-28 17:45:36', '2020-02-28 17:45:36', NULL),
(35, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-28 17:46:45', '2020-02-28 17:46:45', NULL),
(36, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-02-28 17:49:47', '2020-02-28 17:49:47', NULL),
(37, 4, 3, 0.10, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 11:18:34', '2020-04-05 11:18:34', NULL),
(38, 4, 3, 0.10, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 11:19:22', '2020-04-05 11:19:22', NULL),
(39, 4, 3, 0.10, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 11:20:03', '2020-04-05 11:20:03', NULL),
(40, 4, 3, 0.20, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 11:40:44', '2020-04-05 11:40:44', NULL),
(41, 4, 3, 0.10, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 12:02:09', '2020-04-05 12:02:09', NULL),
(42, 4, 3, 0.10, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 12:03:29', '2020-04-05 12:03:29', NULL),
(43, 4, 3, 0.10, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-04-05 12:06:22', '2020-04-05 12:06:22', NULL),
(44, 12, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-04-05 20:01:31', '2020-04-05 20:01:31', NULL),
(45, 12, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-04-05 20:02:48', '2020-04-05 20:02:48', NULL),
(46, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-08 23:37:29', '2020-06-08 23:37:29', NULL),
(47, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-08 23:39:28', '2020-06-08 23:39:28', NULL),
(48, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-08 23:44:43', '2020-06-08 23:44:43', NULL),
(49, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 12:49:28', '2020-06-10 12:49:28', NULL),
(50, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 12:55:13', '2020-06-10 12:55:13', NULL),
(51, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 12:57:55', '2020-06-10 12:57:55', NULL),
(52, 1, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 13:01:30', '2020-06-10 13:01:30', NULL),
(53, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-06-10 13:06:28', '2020-06-10 13:06:28', NULL),
(54, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 18:25:02', '2020-06-10 18:25:02', NULL),
(55, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 18:25:56', '2020-06-10 18:25:56', NULL),
(56, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-10 18:26:34', '2020-06-10 18:26:34', NULL),
(57, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 10:16:29', '2020-06-11 10:16:29', NULL),
(58, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 10:42:10', '2020-06-11 10:42:10', NULL),
(59, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 10:42:30', '2020-06-11 10:42:30', NULL),
(60, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 10:43:57', '2020-06-11 10:43:57', NULL),
(61, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 10:45:53', '2020-06-11 10:45:53', NULL),
(62, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 12:10:12', '2020-06-11 12:10:12', NULL),
(63, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-11 13:42:46', '2020-06-11 13:42:46', NULL),
(64, 13, 3, 3.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-06-12 12:48:02', '2020-06-12 12:48:02', NULL),
(65, 13, 3, 0.50, 0.00, NULL, 1, NULL, NULL, 'Request print and shipped keep image', NULL, '2020-06-15 11:36:00', '2020-06-15 11:36:00', NULL),
(66, 13, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-15 11:44:56', '2020-06-15 11:44:56', NULL),
(67, 14, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-15 12:03:07', '2020-06-15 12:03:07', NULL),
(68, 14, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-15 12:03:35', '2020-06-15 12:03:35', NULL),
(69, 14, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-06-15 12:07:25', '2020-06-15 12:07:25', NULL),
(70, 20, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-08-13 16:22:49', '2020-08-13 16:22:49', NULL),
(71, 27, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-08-17 11:59:39', '2020-08-17 11:59:39', NULL),
(72, 29, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-08-19 01:02:13', '2020-08-19 01:02:13', NULL),
(73, 25, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-08-25 21:16:23', '2020-08-25 21:16:23', NULL),
(74, 29, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-09-03 23:47:14', '2020-09-03 23:47:14', NULL),
(75, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-10-05 11:38:23', '2020-10-05 11:38:23', NULL),
(76, 1, 2, NULL, 0.00, NULL, 2, NULL, NULL, 'Balance added to wallet', NULL, '2020-10-05 11:47:58', '2020-10-05 11:47:58', NULL),
(77, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-10-14 05:02:39', '2020-10-14 05:02:41', NULL),
(78, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-10-14 05:02:41', '2020-10-14 05:02:43', NULL),
(79, 2, 1, 0.50, 0.00, NULL, 1, NULL, NULL, 'Keep an image', NULL, '2020-10-15 02:03:21', '2020-10-15 02:03:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_card_details`
--

CREATE TABLE `transaction_card_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `card_brand` varchar(150) DEFAULT NULL,
  `card_last4_digit` int(16) DEFAULT NULL,
  `name_on_card` varchar(255) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_card_details`
--

INSERT INTO `transaction_card_details` (`id`, `user_id`, `transaction_id`, `card_brand`, `card_last4_digit`, `name_on_card`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Visa', 4242, NULL, 'US', '2020-02-01 12:48:53', '2020-02-01 12:48:53'),
(2, 4, 8, 'Visa', 4242, NULL, 'US', '2020-02-01 19:48:57', '2020-02-01 19:48:57'),
(3, 4, 13, 'Visa', 4242, NULL, 'US', '2020-02-02 10:45:00', '2020-02-02 10:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

CREATE TABLE `transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, ' Keep', '2019-02-06 18:30:00', '2019-02-06 18:30:00'),
(2, 'Srtip To Wallet', '2019-02-06 18:30:00', '2019-02-06 18:30:00'),
(3, 'Shipping Charge', '2019-02-06 18:30:00', '2019-02-06 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '11',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` text COLLATE utf8mb4_unicode_ci,
  `shopify_namespace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `stripe_customer_id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `status`, `avatar`, `device_id`, `shopify_namespace`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'cus_HQVJrw6sX4JTYo', 'Asif Jamal', 'asifjamal@gmail.com', NULL, NULL, '$2y$10$sc6/R45nJRjjnxiV/NCzsua5QgY3cI3dmmxyA991.tT39jurjC44.', NULL, 11, NULL, NULL, '', '2020-01-28 13:11:50', '2020-01-28 13:11:50', NULL),
(2, 'cus_ICLgp0sOuDHoWA', 'Adam Wannon', 'Wannonadam@gmail.com', '3236301826', NULL, '$2y$10$MlavgRvUncAEDPHmYSHxyOsxV8UGTsKCMoRLhIZPRUedBavNA6Ste', 'vFwuU17UnzhAG1obkWyQd0uh0sKLB8iGymQKzzKfATgLP1hRmBN06VktmhPZ', 11, 'storage/user/profile/2_1580784403.jpg', NULL, '', '2020-01-28 21:55:41', '2020-10-14 05:02:43', NULL),
(3, NULL, 'Aadil Hussain', 'Aadil.sanix@gmail.com', '9569475819', NULL, '$2y$10$.1CC2x5K/zEpARA4FlmQ5uPOQDReZg2IVN4uIXrcqXkvWwNkk0Use', NULL, 11, 'storage/user/profile/3_1580274964.jpg', NULL, '', '2020-01-29 01:42:31', '2020-01-29 10:46:04', NULL),
(4, NULL, 'Aaqib Ali', 'aaqibali278@gmail.com', '8825035108', NULL, '$2y$10$GbsA80D2hFLD3N3PdBbwSOknkwwRG9zKWirpvhLfD42vJO9mVSNFS', 'aNhUxHB0SlC26wQkpERgaZSz8dvPMdFn3vqyJHDNpC0QcNkDVgu3d3i4Jhb1', 11, 'storage/user/profile/4_1580315105.jpg', NULL, '', '2020-01-29 20:46:26', '2020-04-05 11:17:49', NULL),
(5, NULL, 'Eric Wannon', 'Junk@wannon.com', NULL, NULL, '$2y$10$JXSdh0DrVP9pec/0kyRwBuKP9ytChhRSPymZpjCtdannwwM.vQ0wK', NULL, 11, NULL, NULL, '', '2020-02-06 19:40:12', '2020-02-06 19:40:12', NULL),
(6, NULL, 'Asif Jamal', 'asifjamal123456@gmail.com', NULL, NULL, '$2y$10$wC6Vf/lnA0UMOndwWYsI3OEE9skmfZ053RQoYLcCrYwc74cQDkXFa', NULL, 11, NULL, NULL, '', '2020-02-28 17:13:12', '2020-02-28 17:13:12', NULL),
(7, NULL, 'Asif Jamal', 'asifjamal3123456@gmail.com', NULL, NULL, '$2y$10$4f/McE7XH0TfseXriReznuMrs8yZenjVSVeLUNRDGWUV.e3vt9CYi', NULL, 11, NULL, NULL, '', '2020-02-28 17:13:51', '2020-02-28 17:13:51', NULL),
(8, NULL, 'Asif Jamal', 'asifjamal312345556@gmail.com', NULL, NULL, '$2y$10$0jq5FU53x/FPTaDUbhhnZ.QjfM6vQoMA2xXcYGG0tCY0yFidrRfMK', NULL, 11, NULL, NULL, '', '2020-02-28 17:16:04', '2020-02-28 17:16:04', NULL),
(9, 'cus_Gokt7YbQpmbHt9', 'Asif Jamal', 'asifj2@gmail.com', NULL, NULL, '$2y$10$BgJnaXkwJhca/SUylEPirOTeblwQLVyfnDLeIcwzs2q2ajcy.vsd2', NULL, 11, NULL, NULL, '', '2020-02-28 17:21:43', '2020-02-28 17:21:44', NULL),
(10, 'cus_GuICsMSLwe886f', 'Aaqibali', 'Aaqibali279@gmail.com', '8825035108', NULL, '$2y$10$fsDUX7RCQ0uz9/ZBmw5Zv.vCn81Q4Kn8Fn7df4qA5UigyZAj4h1Aa', NULL, 11, 'storage/user/profile/10_1585453594.jpg', NULL, '', '2020-03-14 12:06:42', '2020-03-29 09:16:34', NULL),
(11, 'cus_Gv4vdOVxF92p81', 'Test', 'nastenkagurya@i.ua', NULL, NULL, '$2y$10$Z/a7pNsJS7A/xM4dMjTZFuhx8ID5uGIoed4S4u.9hn2YnfTeTJBYO', NULL, 11, NULL, NULL, '', '2020-03-16 14:28:03', '2020-03-16 14:28:04', NULL),
(12, 'cus_H2dECiRab82NiN', 'Keep', 'keep@gmail.con', '8825035108', NULL, '$2y$10$C0qTbbT7Ev66iwhTUKCree.mbvMhYXbpTzTxL2UfpdoF5XQb1nega', NULL, 11, 'storage/user/profile/12_1586091269.jpg', NULL, '', '2020-04-05 18:22:41', '2020-04-05 18:24:29', NULL),
(13, 'cus_HRbwwIJJM2QVtK', 'demo', 'demotest@yopmail.com', '8825035108', NULL, '$2y$10$czWlxwLbLvb575XCHQq9VuwZCnN/CRvh8bJibT3QVpcoRbRyA01ze', NULL, 11, 'storage/user/profile/13_1591636728.jpg', NULL, '', '2020-06-08 11:48:18', '2020-06-11 10:42:32', NULL),
(14, 'cus_HT89PtnjVhLPL1', 'Test1', 'Test123@yopmail.com', NULL, NULL, '$2y$10$7Ws7sK6.OK4c3k3bQii4PeCzaWf11VdNykvn16AZ651uzWM2Bae66', NULL, 11, NULL, NULL, '', '2020-06-15 11:58:15', '2020-06-15 12:03:36', NULL),
(15, 'cus_HpDDz4R9rTbi6x', 'testkeep', 'testkeep@yopmail.com', '9966338855', NULL, '$2y$10$.SkHiaCIapWRjwprd5.ukOMtB6qq/t73dreCkVO5UN.L69OFpU9FS', NULL, 11, 'storage/user/profile/15_1597297179.jpg', NULL, '', '2020-08-13 10:45:25', '2020-08-13 11:09:39', NULL),
(16, 'cus_HpF5rjBcvAeZLe', 'uufufud', 'yyyyyyy@yopmail.com', NULL, NULL, '$2y$10$RC.mgy/951x4d0EzHaCZYetwRKaCz3nry6aabSdubpPq21wLOB36.', NULL, 11, NULL, NULL, '', '2020-08-13 12:42:07', '2020-08-13 12:42:08', NULL),
(17, 'cus_HpF7VKnPk328BQ', 'Asif Jamal', 'asifjamal212@gmail.com', NULL, NULL, '$2y$10$TvAlUqf/2SDi6sn7VhuWGezqQFh7w8xld9kSvI41SrXO7g7hblIcG', NULL, 11, NULL, NULL, '', '2020-08-13 12:43:48', '2020-08-13 12:43:48', NULL),
(18, 'cus_HpFfWgxX18uK5e', 'Zzzzz', 'Zzzz@yopmail.com', NULL, NULL, '$2y$10$UCUfRzwHFAUmp204szmZBufGANeQm1QzLcwHVwWQn86cxbQF/1zw.', NULL, 11, NULL, NULL, '', '2020-08-13 13:18:15', '2020-08-13 13:18:15', NULL),
(19, 'cus_HpFlA0WQ4KGLEL', 'Zzzzz', 'Zzzz1@yopmail.com', NULL, NULL, '$2y$10$sJpT0RB7hg/ll1qmAsofIOOxccJDm8Sr1ZS5ZqE.eOGc6QJsYn4qy', NULL, 11, NULL, NULL, '', '2020-08-13 13:24:11', '2020-08-13 13:24:12', NULL),
(20, 'cus_HpH54SQVbwghws', 'hhhhhhh', 'hhhhhh@yopmail.com', NULL, NULL, '$2y$10$mDOewP/7r780q6F6ANSgYuehCNV2PZsZ99zX6so5Sf8hQDmPTrmQ.', NULL, 11, NULL, NULL, '', '2020-08-13 14:46:02', '2020-08-13 14:46:03', NULL),
(21, 'cus_HpcP0PiwxrH6qt', 'gggggg', 'gggggg@yopmail.com', NULL, NULL, '$2y$10$CGzN8ak08/u8lm73e05RC.dAZC4OvW59qairINpohIXV24KZXRswy', NULL, 11, NULL, NULL, '', '2020-08-14 12:47:38', '2020-08-14 12:47:39', NULL),
(22, 'cus_HqieczOKcOok7N', 'Yellow', 'Yellow@yopmail.com', NULL, NULL, '$2y$10$RVu5xG/0ir2.qaXAmBSX0.184LbTQh60CPHL0JX602SC0MgbqIRFW', NULL, 11, NULL, NULL, '', '2020-08-17 11:18:41', '2020-08-17 11:18:42', NULL),
(23, 'cus_HqilZL9b8r5VWu', 'Blue', 'Blue@yopmail.com', NULL, NULL, '$2y$10$X2g493F/Tqh62q3j0JYSheNBngkzCIReH9zRbHNWnhpY5UBS79bf6', NULL, 11, NULL, NULL, '', '2020-08-17 11:26:00', '2020-08-17 11:26:01', NULL),
(24, NULL, 'Test name', 'Testmail@yopmail .com', NULL, NULL, '$2y$10$/gDZMiQs1pFTNtPiRcpPDOZKJ2D6MoZayvxknV7sNb6OSaSIbnUme', NULL, 11, NULL, NULL, '', '2020-08-17 11:33:36', '2020-08-17 11:33:36', NULL),
(25, 'cus_HqivPcJVVTY4yq', 'Rest', 'rest@yopmail.com', '8825035108', NULL, '$2y$10$7DEWoIKcrObNknjFI7Z8xuVSN1jdvZXj8lzpQujrsMErRq53DJ0z.', NULL, 11, 'storage/user/profile/25_1601182713.jpg', NULL, '', '2020-08-17 11:35:38', '2020-09-27 10:28:33', NULL),
(26, 'cus_HqjAkyWFeX3E2S', 'Asif Jamal', 'asifjamkal212@Gmail.com', NULL, NULL, '$2y$10$z.lCMi8o4YdpUWk5538kAexvsBQz4FZdolxU3FrWNgsyrhGLWx/nG', NULL, 11, NULL, NULL, '', '2020-08-17 11:50:36', '2020-08-17 11:50:36', NULL),
(27, 'cus_HqjE6tnsQHmBF4', 'Aadil', 'Aadildon@Gmail.com', NULL, NULL, '$2y$10$o1UStxkmgROfnOVgNsqOpu4OAkG5qZOgOXpAoiV51dmpd2Fdcq6DG', NULL, 11, NULL, NULL, '', '2020-08-17 11:54:47', '2020-08-17 11:54:48', NULL),
(28, 'cus_HqjE7rJhO0E4bb', 'Hello SUNY', 'Sunny@yopmail.com', NULL, NULL, '$2y$10$qlKHAbZWXCiS7A4YSUqjMOmndvguTtSdq6T.nvYQRqYZO.Id/jliW', NULL, 11, NULL, NULL, '', '2020-08-17 11:54:55', '2020-08-17 11:54:55', NULL),
(29, 'cus_HqjUrQ7aXhg4IG', 'Adam', 'Adamwannon@me.com', NULL, NULL, '$2y$10$XMWgPGm3Xlz.hPiNC40UaupGLGXtnnu.EGBU6WK1WAxq9/tOAejNG', NULL, 11, NULL, NULL, '', '2020-08-17 12:10:26', '2020-08-17 12:10:27', NULL),
(30, 'cus_I0SaphjEAZvJPm', 'demo', 'demotest1@yopmail.com', NULL, NULL, '$2y$10$m3dPj8aBbQ4ofKDnzUbRU.vKpEDawf.OrZifG.mZkQo3JaycDxKcu', NULL, 11, NULL, NULL, '', '2020-09-12 11:22:22', '2020-09-12 11:22:23', NULL),
(31, 'cus_I2IYH5zuaWRKAL', 'Sabrina', 'Sabrina@wannon.com', NULL, NULL, '$2y$10$eD7aiJeQoF607vXC0W/DOedOYUY/pYtchLXei.yTRcWgwu9RbmNLe', NULL, 11, NULL, NULL, '', '2020-09-17 09:08:24', '2020-09-17 09:08:25', NULL),
(32, 'cus_I2LJePwcBb69SC', 'Tester01', 'luan.truong@hdwebsoft.co', NULL, NULL, '$2y$10$1/tcESZuIUEcVQUvMiBGHOFLs00Amq8A.p0NjnWYXEdWe0BHwwHmq', NULL, 11, NULL, NULL, '', '2020-09-17 11:59:27', '2020-09-17 11:59:28', NULL),
(33, 'cus_I2ND2nhHvM3kPI', 'tester01', 'luan.truong+01@hdwebsoft.co', NULL, NULL, '$2y$10$fE8MJTtWxiDgKR.ICRFQzuBENq.5navQIJt19hqoCKVk2ucqVUmy.', NULL, 11, NULL, NULL, '', '2020-09-17 13:57:34', '2020-09-17 13:57:34', NULL),
(34, 'cus_I3FeaXUR2g9Ggl', 'NinjaKID', 'Boytpcm123@gmail.com', '0377777777', NULL, '$2y$10$kPF6PSOdGNiov9XcirQZ5O60ivZUsERSoGk6HzVB9j/TV0/1kVipC', NULL, 11, 'storage/user/profile/34_1600534606.jpg', NULL, '', '2020-09-19 22:12:46', '2020-09-19 22:26:47', NULL),
(35, NULL, 'sanix.myshopify.com', 'shop@sanix.myshopify.com', NULL, NULL, '', NULL, 11, NULL, NULL, NULL, '2020-10-14 07:47:12', '2020-10-14 07:47:12', NULL),
(36, NULL, 'sanix-shopify-dev.myshopify.com', 'shop@sanix-shopify-dev.myshopify.com', NULL, NULL, '', NULL, 11, NULL, NULL, NULL, '2020-10-14 07:51:32', '2020-10-14 07:51:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(156) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `name`, `mobile`, `email`, `address`, `country`, `state`, `city`, `pin_code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Aadil Hussain', '1234567890', '1234567890', 'Fake street', NULL, 'Fake state', 'Fake city', '1234', 1, '2020-01-29 10:48:50', '2020-01-29 10:48:50', NULL),
(2, 1, 'Asif Jamal', '9315647380', 'asif.sanix@gmail.com', 'E-99 Pahse-7 Industrial area Mohali', NULL, 'Punjab yjfvyjug', 'Chandigarh', '160059', 1, '2020-01-29 17:27:22', '2020-01-29 17:27:22', NULL),
(3, 4, 'Hello', '54554545545454', 'Hshshhs', 'Sjsjshhs', NULL, 'Shshhshs', 'Hshhshs', 'Hshshhs', 1, '2020-02-01 10:43:58', '2020-02-01 10:43:58', NULL),
(4, 4, 'Hello', '54554545545454', 'Hshshhs', 'Sjsjshhs', NULL, 'Shshhshs', 'Hshhshs', '7484746352', 1, '2020-02-01 10:45:01', '2020-02-01 10:45:01', NULL),
(5, 4, 'Aaqib ali', '8825035108', 'aaqibali278@gmail.com', 'Shahimajra', NULL, 'Punjab', 'Mohali', '160055', 1, '2020-02-01 11:14:57', '2020-02-01 11:14:57', NULL),
(6, 1, 'Asif Jamal', '9315647380', 'asif.sanix@gmail.com', 'E-99 Pahse-7 Industrial area Mohali', NULL, 'Punjab yjfvyjug', 'Chandigarh', '160059', 1, '2020-02-01 11:46:48', '2020-02-01 11:46:48', NULL),
(7, 1, 'Asif Jamal', '9315647380', 'asif.sanix@gmail.com', 'E-99 Pahse-7 Industrial area Mohali', NULL, 'Punjab yjfvyjug', 'Chandigarh', '160059', 1, '2020-02-01 11:57:14', '2020-02-01 11:57:14', NULL),
(8, 4, 'Phase 8b', '8825035108', 'aaqibali279@gmail.com', 'AthenaSoft', NULL, 'Punjab', 'Mohali', '160055', 1, '2020-02-01 11:57:18', '2020-02-01 11:57:18', NULL),
(9, 2, 'Adam', '3236301826', 'Wannonadam@Gmail.com', '368 north kings road', NULL, 'Los Angeles', 'California', '90048', 1, '2020-02-05 10:19:20', '2020-02-05 10:19:20', NULL),
(10, 2, 'Adam', '3236301826', 'Wannonadam@Gmail.com', '368 north kings road', NULL, 'Los Angeles', 'California', '90048', 1, '2020-02-05 10:19:24', '2020-02-05 10:19:24', NULL),
(11, 10, 'Hello', '8825035108', 'aaqibali279@gmail.com', 'Mohali', NULL, 'Punjab', 'Mohali', '160055', 1, '2020-04-05 11:11:29', '2020-04-05 11:11:29', NULL),
(12, 12, 'Keep', '8825035108', 'keep@gmail.com', 'Mohali', NULL, 'Punjab', 'Mohali', '160055', 1, '2020-04-05 18:37:32', '2020-04-05 18:37:32', NULL),
(13, 13, 'Aaron', '8825035108', 'Demotest@yopmail.com', '87/10', NULL, 'Punjab', 'Mohali', '160055', 1, '2020-06-08 23:05:15', '2020-06-08 23:05:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_otps`
--

CREATE TABLE `user_otps` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE `user_wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `user_id`, `amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 44.80, '2020-01-28 13:02:56', '2020-02-03 11:12:39', NULL),
(2, 2, 46.20, '2020-01-28 21:55:41', '2020-02-20 02:28:34', NULL),
(3, 3, 50.00, '2020-01-29 01:42:31', '2020-01-29 01:42:31', NULL),
(4, 4, 5548.20, '2020-01-29 20:46:27', '2020-04-05 12:06:22', NULL),
(5, 5, 0.00, '2020-02-06 19:40:12', '2020-02-06 19:40:12', NULL),
(6, 9, 0.00, '2020-02-28 17:21:45', '2020-02-28 17:21:45', NULL),
(7, 10, 0.00, '2020-03-14 12:06:45', '2020-03-14 12:06:45', NULL),
(8, 11, 0.00, '2020-03-16 14:28:04', '2020-03-16 14:28:04', NULL),
(9, 12, 0.00, '2020-04-05 18:22:43', '2020-04-05 18:22:43', NULL),
(10, 13, 0.00, '2020-06-08 11:48:20', '2020-06-08 11:48:20', NULL),
(11, 14, 0.00, '2020-06-15 11:58:16', '2020-06-15 11:58:16', NULL),
(12, 15, 0.00, '2020-08-13 10:45:26', '2020-08-13 10:45:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backlogs`
--
ALTER TABLE `backlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keeps`
--
ALTER TABLE `keeps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`slug`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`permission_key`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD UNIQUE KEY `role_id_2` (`role_id`,`permission_key`);

--
-- Indexes for table `role_policies`
--
ALTER TABLE `role_policies`
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transaction_card_details`
--
ALTER TABLE `transaction_card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_types`
--
ALTER TABLE `transaction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallets`
--
ALTER TABLE `user_wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `backlogs`
--
ALTER TABLE `backlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keeps`
--
ALTER TABLE `keeps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `transaction_card_details`
--
ALTER TABLE `transaction_card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_types`
--
ALTER TABLE `transaction_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wallets`
--
ALTER TABLE `user_wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
