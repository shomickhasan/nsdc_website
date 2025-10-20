-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2024 at 07:30 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `liberati_joyeta_women_enterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` mediumint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `status`, `group`, `activity_type`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-04-24 05:35:05', '2024-04-24 05:35:05'),
(2, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-04-24 05:35:15', '2024-04-24 05:35:15'),
(3, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-04-24 10:19:39', '2024-04-24 10:19:39'),
(4, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-04-25 04:28:13', '2024-04-25 04:28:13'),
(5, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-04-28 04:28:06', '2024-04-28 04:28:06'),
(6, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-04-29 04:20:49', '2024-04-29 04:20:49'),
(7, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-04-30 05:38:31', '2024-04-30 05:38:31'),
(8, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-04-30 12:30:47', '2024-04-30 12:30:47'),
(9, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-08 04:33:47', '2024-05-08 04:33:47'),
(10, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-09 02:35:05', '2024-05-09 02:35:05'),
(11, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-12 04:22:27', '2024-05-12 04:22:27'),
(12, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-13 04:38:56', '2024-05-13 04:38:56'),
(13, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-14 11:05:26', '2024-05-14 11:05:26'),
(14, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-05-14 11:08:18', '2024-05-14 11:08:18'),
(15, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-14 11:09:41', '2024-05-14 11:09:41'),
(16, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-15 04:22:30', '2024-05-15 04:22:30'),
(17, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-05-15 09:45:26', '2024-05-15 09:45:26'),
(18, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-15 10:15:52', '2024-05-15 10:15:52'),
(19, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-16 04:37:38', '2024-05-16 04:37:38'),
(20, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-05-16 11:56:48', '2024-05-16 11:56:48'),
(21, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-20 07:16:26', '2024-05-20 07:16:26'),
(22, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-05-20 09:39:32', '2024-05-20 09:39:32'),
(23, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-20 09:45:30', '2024-05-20 09:45:30'),
(24, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-05-20 11:40:57', '2024-05-20 11:40:57'),
(25, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-20 11:41:11', '2024-05-20 11:41:11'),
(26, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-21 04:23:40', '2024-05-21 04:23:40'),
(27, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-23 04:32:37', '2024-05-23 04:32:37'),
(28, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-26 04:57:34', '2024-05-26 04:57:34'),
(29, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-26 05:06:09', '2024-05-26 05:06:09'),
(30, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-26 09:47:57', '2024-05-26 09:47:57'),
(31, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-27 04:51:31', '2024-05-27 04:51:31'),
(32, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-28 04:57:55', '2024-05-28 04:57:55'),
(33, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-29 04:49:47', '2024-05-29 04:49:47'),
(34, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-29 10:42:44', '2024-05-29 10:42:44'),
(35, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-29 11:11:44', '2024-05-29 11:11:44'),
(36, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-30 04:42:27', '2024-05-30 04:42:27'),
(37, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-05-30 11:49:35', '2024-05-30 11:49:35'),
(38, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-02 04:24:04', '2024-06-02 04:24:04'),
(39, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-03 04:39:22', '2024-06-03 04:39:22'),
(40, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-03 11:21:53', '2024-06-03 11:21:53'),
(41, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-04 04:27:19', '2024-06-04 04:27:19'),
(42, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-05 04:37:50', '2024-06-05 04:37:50'),
(43, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-06 04:44:48', '2024-06-06 04:44:48'),
(44, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-09 04:23:22', '2024-06-09 04:23:22'),
(45, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-09 07:03:18', '2024-06-09 07:03:18'),
(46, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-09 09:22:55', '2024-06-09 09:22:55'),
(47, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-06-09 09:33:55', '2024-06-09 09:33:55'),
(48, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-09 09:34:22', '2024-06-09 09:34:22'),
(49, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-11 10:44:26', '2024-06-11 10:44:26'),
(50, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-12 11:59:59', '2024-06-12 11:59:59'),
(51, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-13 09:54:50', '2024-06-13 09:54:50'),
(52, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-19 10:19:12', '2024-06-19 10:19:12'),
(53, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-06-24 07:03:51', '2024-06-24 07:03:51'),
(54, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-07-04 07:14:32', '2024-07-04 07:14:32'),
(55, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-07-04 07:28:02', '2024-07-04 07:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `barcode_activites_modules`
--

DROP TABLE IF EXISTS `barcode_activites_modules`;
CREATE TABLE IF NOT EXISTS `barcode_activites_modules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barcode_activites_modules`
--

INSERT INTO `barcode_activites_modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Business', '2024-05-26 10:09:21', '2024-05-26 10:09:21'),
(2, 'Uddokta', '2024-05-26 10:09:21', '2024-05-26 10:09:21'),
(3, 'Product', '2024-05-26 10:09:21', '2024-05-26 10:09:21'),
(4, 'Product Category', '2024-05-26 10:09:21', '2024-05-26 10:09:21'),
(5, 'Material Category', '2024-05-26 10:09:21', '2024-05-26 10:09:21'),
(6, 'Specific Material', '2024-05-26 10:09:21', '2024-05-26 10:09:21'),
(7, 'Brand', '2024-05-29 08:53:11', '2024-05-29 08:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `bar_code_types`
--

DROP TABLE IF EXISTS `bar_code_types`;
CREATE TABLE IF NOT EXISTS `bar_code_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bar_code_types`
--

INSERT INTO `bar_code_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C128A', 'Active', '2024-04-29 08:36:56', '2024-04-29 08:36:56'),
(2, 'C128B', 'Active', '2024-04-29 08:36:56', '2024-04-29 08:36:56'),
(3, 'C128', 'Active', '2024-04-29 08:36:56', '2024-04-29 08:36:56'),
(4, 'I25+', 'Inactive', '2024-04-29 08:36:56', '2024-04-29 08:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `brand_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `business_id`, `brand_name`, `brand_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(16, 3, 'Metal', '01', 'Active', 2, NULL, '2024-05-28 07:43:04', '2024-05-28 07:43:04'),
(17, 3, 'Clay', '02', 'Active', 2, NULL, '2024-05-28 07:43:22', '2024-05-28 07:43:22'),
(18, 4, 'Metal', '01', 'Active', 2, NULL, '2024-05-28 07:43:33', '2024-05-28 07:43:33'),
(19, 4, 'Lean', '02', 'Active', 2, 2, '2024-05-28 07:43:47', '2024-05-28 07:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_type_id` bigint UNSIGNED NOT NULL,
  `business_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `b_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_is_active` tinyint NOT NULL DEFAULT '1',
  `service_charge_is_active` tinyint NOT NULL DEFAULT '1',
  `vat_percent` decimal(10,2) NOT NULL,
  `service_charge_percent` decimal(10,2) NOT NULL,
  `business_uddokta` tinyint NOT NULL DEFAULT '1',
  `uddokta_shop` tinyint NOT NULL DEFAULT '0',
  `barcode_enable` tinyint NOT NULL DEFAULT '1',
  `manage_stok` tinyint NOT NULL DEFAULT '0',
  `price_start` tinyint NOT NULL DEFAULT '0',
  `start_date` date NOT NULL DEFAULT '2024-04-29',
  `logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `business_type_id`, `business_code`, `created_by`, `updated_by`, `b_name`, `address`, `vat_is_active`, `service_charge_is_active`, `vat_percent`, `service_charge_percent`, `business_uddokta`, `uddokta_shop`, `barcode_enable`, `manage_stok`, `price_start`, `start_date`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, '0010', 2, 2, 'Jamdani Saree', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209\r\nFloor:5', 1, 1, 5.00, 5.00, 1, 0, 1, 1, 0, '2024-05-11', 'uploads/busines/download (1)_662f8a9f3cee0.jpg', '2024-04-29 10:28:34', '2024-05-15 06:12:56'),
(2, 2, '0009', 2, NULL, 'Food Court', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209\r\nFloor:5', 1, 1, 5.00, 5.00, 1, 1, 1, 0, 0, '2024-05-20', 'uploads/busines/download (1)_662f8a9f3cee0_663b4d3978c90.jpg', '2024-05-08 10:00:25', '2024-05-08 11:21:30'),
(3, 1, '0016', 2, 2, 'Dry Food', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 1, 1, 5.00, 5.00, 1, 0, 0, 1, 0, '2024-06-01', 'uploads/busines/joyeeta-logo_66459d587cf76.png', '2024-05-16 05:44:56', '2024-05-28 12:20:48'),
(4, 1, '0016', 2, 2, 'Craft Zoon', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 1, 1, 5.00, 5.00, 1, 0, 1, 1, 1, '2024-05-25', 'uploads/busines/joyeeta-logo_66459d8390a4d.png', '2024-05-16 05:45:39', '2024-06-06 05:18:33'),
(5, 1, '0015', 2, 2, 'Test Business', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 1, 1, 5.00, 5.00, 1, 0, 1, 1, 1, '2024-05-30', 'uploads/busines/joyeeta-logo_665448c8ddd82.png', '2024-05-27 08:48:08', '2024-05-27 08:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `business_barcodes`
--

DROP TABLE IF EXISTS `business_barcodes`;
CREATE TABLE IF NOT EXISTS `business_barcodes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `busiess_id` bigint UNSIGNED NOT NULL,
  `bar_code_type_id` bigint UNSIGNED DEFAULT NULL,
  `min_number` tinyint NOT NULL DEFAULT '3',
  `max_number` tinyint NOT NULL DEFAULT '8',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_barcodes`
--

INSERT INTO `business_barcodes` (`id`, `busiess_id`, `bar_code_type_id`, `min_number`, `max_number`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 7, '2024-04-29 10:28:34', '2024-05-08 09:28:20'),
(2, 2, 1, 3, 8, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(3, 3, 1, 3, 8, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(4, 4, 1, 3, 15, '2024-05-16 05:45:39', '2024-05-26 10:30:26'),
(5, 5, 1, 3, 8, '2024-05-27 08:48:08', '2024-05-27 08:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `business_barcode_activetis_module`
--

DROP TABLE IF EXISTS `business_barcode_activetis_module`;
CREATE TABLE IF NOT EXISTS `business_barcode_activetis_module` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `barcode_activites_module_id` bigint UNSIGNED DEFAULT NULL,
  `piroty` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_barcode_activetis_module`
--

INSERT INTO `business_barcode_activetis_module` (`id`, `business_id`, `barcode_activites_module_id`, `piroty`, `created_at`, `updated_at`) VALUES
(13, 5, 3, 3, '2024-06-06 11:33:32', '2024-06-06 11:33:32'),
(14, 5, 1, 1, '2024-06-06 11:33:32', '2024-06-06 11:33:32'),
(15, 5, 2, 2, '2024-06-06 11:33:32', '2024-06-06 11:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `business_business_type_module`
--

DROP TABLE IF EXISTS `business_business_type_module`;
CREATE TABLE IF NOT EXISTS `business_business_type_module` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `business_type_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1=Enable 0=Disable',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_business_type_module`
--

INSERT INTO `business_business_type_module` (`id`, `business_id`, `module_id`, `business_type_id`, `status`, `created_at`, `updated_at`) VALUES
(56, 1, 2, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(57, 1, 3, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(58, 1, 4, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(59, 1, 6, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(60, 1, 7, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(61, 1, 8, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(62, 1, 9, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(63, 1, 10, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(64, 1, 11, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(65, 1, 12, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(66, 1, 13, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(67, 1, 17, 1, 1, '2024-05-08 09:11:10', '2024-05-08 09:11:10'),
(68, 2, 1, 2, 1, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(69, 2, 3, 2, 1, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(70, 2, 4, 2, 1, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(71, 3, 2, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(72, 3, 3, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(73, 3, 4, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(74, 3, 1, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(75, 3, 6, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(76, 3, 7, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(77, 3, 8, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(78, 3, 9, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(79, 3, 10, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(80, 3, 11, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(81, 3, 12, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(82, 3, 13, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(83, 3, 17, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(84, 4, 2, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(85, 4, 3, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(86, 4, 4, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(87, 4, 1, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(88, 4, 6, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(89, 4, 7, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(90, 4, 8, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(91, 4, 9, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(92, 4, 10, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(93, 4, 11, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(94, 4, 12, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(95, 4, 13, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(96, 4, 17, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(97, 5, 2, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(98, 5, 3, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(99, 5, 4, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(100, 5, 1, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(101, 5, 6, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(102, 5, 7, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(103, 5, 8, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(104, 5, 9, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(105, 5, 10, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(106, 5, 11, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(107, 5, 12, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(108, 5, 13, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(109, 5, 17, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `business_invoices`
--

DROP TABLE IF EXISTS `business_invoices`;
CREATE TABLE IF NOT EXISTS `business_invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `busiess_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_enable` tinyint NOT NULL DEFAULT '1',
  `discount_enable` tinyint NOT NULL DEFAULT '1',
  `has_token` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_invoices`
--

INSERT INTO `business_invoices` (`id`, `busiess_id`, `title`, `vat_enable`, `discount_enable`, `has_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jamdani Saree', 1, 1, 0, '2024-04-29 10:28:34', '2024-05-08 09:59:20'),
(2, 2, 'Food Court', 1, 1, 1, '2024-05-08 10:00:25', '2024-05-08 10:01:04'),
(3, 3, 'Dry Food', 1, 1, 0, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(4, 4, 'Craft Food', 1, 1, 0, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(5, 5, 'Test Business', 1, 1, 0, '2024-05-27 08:48:08', '2024-05-27 08:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `business_payment_method`
--

DROP TABLE IF EXISTS `business_payment_method`;
CREATE TABLE IF NOT EXISTS `business_payment_method` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `payment_method_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_payment_method`
--

INSERT INTO `business_payment_method` (`id`, `business_id`, `payment_method_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2024-05-08 09:11:27', '2024-05-08 09:11:27'),
(5, 2, 1, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(6, 2, 2, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(7, 3, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(8, 3, 2, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(9, 4, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(10, 4, 2, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(11, 5, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08'),
(12, 5, 2, '2024-05-27 08:48:08', '2024-05-27 08:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `business_pos`
--

DROP TABLE IF EXISTS `business_pos`;
CREATE TABLE IF NOT EXISTS `business_pos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `busiess_id` bigint UNSIGNED NOT NULL,
  `enable_discount` tinyint NOT NULL DEFAULT '1',
  `enable_draft` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_pos`
--

INSERT INTO `business_pos` (`id`, `busiess_id`, `enable_discount`, `enable_draft`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2024-04-29 10:28:34', '2024-05-08 09:18:12'),
(2, 2, 1, 0, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(3, 3, 1, 0, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(4, 4, 1, 0, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(5, 5, 1, 0, '2024-05-27 08:48:08', '2024-05-27 08:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `business_products`
--

DROP TABLE IF EXISTS `business_products`;
CREATE TABLE IF NOT EXISTS `business_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `busiess_id` bigint UNSIGNED NOT NULL,
  `enable_brand` tinyint NOT NULL DEFAULT '1',
  `enable_category` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_products`
--

INSERT INTO `business_products` (`id`, `busiess_id`, `enable_brand`, `enable_category`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-04-29 10:28:34', '2024-05-08 09:11:17'),
(2, 2, 1, 1, '2024-05-08 10:00:25', '2024-05-08 10:00:25'),
(3, 3, 1, 1, '2024-05-16 05:44:56', '2024-05-16 05:44:56'),
(4, 4, 1, 1, '2024-05-16 05:45:39', '2024-05-16 05:45:39'),
(5, 5, 1, 1, '2024-05-27 08:48:08', '2024-05-27 08:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

DROP TABLE IF EXISTS `business_types`;
CREATE TABLE IF NOT EXISTS `business_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Retail Store', 'Active', '2024-04-28 07:04:52', '2024-04-28 08:58:52'),
(2, 'Food Court', 'Active', '2024-04-28 07:04:52', '2024-04-28 07:04:52'),
(3, 'Gym', 'Inactive', '2024-04-28 07:04:52', '2024-04-28 07:04:52'),
(4, 'Swimming Pool', 'Inactive', '2024-04-28 07:04:52', '2024-04-28 07:04:52'),
(5, 'Auditorium', 'Inactive', '2024-04-28 07:04:52', '2024-04-28 07:04:52'),
(6, 'Beauty Parlor', 'Inactive', '2024-04-28 07:04:52', '2024-04-28 07:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `business_type_module`
--

DROP TABLE IF EXISTS `business_type_module`;
CREATE TABLE IF NOT EXISTS `business_type_module` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_type_id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_type_module`
--

INSERT INTO `business_type_module` (`id`, `business_type_id`, `module_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-04-28 10:41:47', '2024-04-28 10:41:47'),
(2, 1, 3, '2024-04-28 10:41:47', '2024-04-28 10:41:47'),
(3, 1, 4, '2024-04-28 10:41:47', '2024-04-28 10:41:47'),
(4, 1, 1, '2024-04-28 10:47:57', '2024-04-28 10:47:57'),
(5, 2, 1, '2024-04-28 10:48:12', '2024-04-28 10:48:12'),
(6, 2, 3, '2024-04-28 10:48:12', '2024-04-28 10:48:12'),
(7, 2, 4, '2024-04-28 10:48:12', '2024-04-28 10:48:12'),
(8, 1, 6, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(9, 1, 7, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(10, 1, 8, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(11, 1, 9, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(12, 1, 10, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(13, 1, 11, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(14, 1, 12, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(15, 1, 13, '2024-04-29 09:10:49', '2024-04-29 09:10:49'),
(16, 1, 17, '2024-04-29 09:10:49', '2024-04-29 09:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `business_uddokta`
--

DROP TABLE IF EXISTS `business_uddokta`;
CREATE TABLE IF NOT EXISTS `business_uddokta` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uddokta_id` bigint UNSIGNED DEFAULT NULL,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_uddokta`
--

INSERT INTO `business_uddokta` (`id`, `uddokta_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 15, 4, '2024-05-27 05:28:59', '2024-05-27 05:28:59'),
(2, 15, 3, '2024-05-27 05:29:04', '2024-05-27 05:29:04'),
(6, 2, 4, '2024-05-27 05:29:27', '2024-05-27 05:29:27'),
(8, 2, 3, '2024-05-27 05:29:44', '2024-05-27 05:29:44'),
(9, 1, 4, '2024-05-27 05:36:38', '2024-05-27 05:36:38'),
(10, 14, 3, '2024-05-28 11:15:09', '2024-05-28 11:15:09'),
(11, 16, 3, '2024-06-02 04:36:32', '2024-06-02 04:36:32'),
(12, 16, 4, '2024-06-02 04:36:32', '2024-06-02 04:36:32'),
(13, 14, 4, '2024-06-04 08:43:31', '2024-06-04 08:43:31');

-- --------------------------------------------------------

--
-- Table structure for table `business_user`
--

DROP TABLE IF EXISTS `business_user`;
CREATE TABLE IF NOT EXISTS `business_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_user`
--

INSERT INTO `business_user` (`id`, `user_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2024-05-21 06:43:29', '2024-05-21 06:43:29'),
(2, 3, 3, '2024-05-21 06:43:29', '2024-05-21 06:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `c_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `business_id`, `c_name`, `c_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 1, 'Saree', '01', 'Active', 2, 2, '2024-05-16 05:40:01', '2024-05-16 06:15:19'),
(7, 2, 'Crockeries', '02', 'Active', 2, NULL, '2024-05-16 05:40:59', '2024-05-16 05:40:59'),
(8, 2, 'Cutleries', '03', 'Active', 2, NULL, '2024-05-16 05:41:19', '2024-05-16 05:41:19'),
(10, 4, 'Bag', '05', 'Active', 2, NULL, '2024-05-16 05:47:24', '2024-05-16 05:47:24'),
(14, 4, 'Home Decor', '01', 'Active', 2, NULL, '2024-05-16 06:06:01', '2024-05-16 06:06:01'),
(15, 4, 'Crockeries', '02', 'Active', 2, NULL, '2024-05-16 06:06:23', '2024-05-16 06:06:23'),
(16, 4, 'Cutleries', '03', 'Active', 2, 2, '2024-05-16 06:06:45', '2024-05-16 06:08:35'),
(17, 4, 'Daily use products', '04', 'Active', 2, NULL, '2024-05-16 06:09:44', '2024-05-16 06:09:44'),
(18, 4, 'Basket', '06', 'Inactive', 2, 2, '2024-05-16 06:10:03', '2024-05-28 08:57:18'),
(19, 4, 'Ornaments', '07', 'Active', 2, NULL, '2024-05-16 06:10:21', '2024-05-16 06:10:21'),
(20, 4, 'Gift Iteam', '08', 'Active', 2, NULL, '2024-05-16 06:10:47', '2024-05-16 06:10:47'),
(21, 4, 'Floor Broom', '09', 'Active', 2, NULL, '2024-05-16 06:11:03', '2024-05-16 06:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

DROP TABLE IF EXISTS `counters`;
CREATE TABLE IF NOT EXISTS `counters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED NOT NULL,
  `store_id` bigint UNSIGNED DEFAULT NULL,
  `counter_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `counters_counter_code_unique` (`counter_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `business_id`, `store_id`, `counter_name`, `counter_code`, `counter_number`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Counter 1', '0001', '1', 'Active', 2, 2, '2024-05-09 03:54:36', '2024-05-09 04:48:39'),
(2, 2, 2, 'Counter 1', '0002', '1', 'Active', 2, NULL, '2024-05-09 04:10:12', '2024-05-09 04:10:12'),
(3, 2, 2, 'Counter 2', '0003', '2', 'Active', 2, 2, '2024-05-09 04:10:33', '2024-05-28 10:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `c_code`, `phone`, `email`, `address`, `birth_date`, `nid`, `gender`, `status`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'MD. Mahadi Hasan Shakil', '0001', '01637621452', NULL, 'Uttara,Sector -4 ,Road-9', NULL, NULL, NULL, 'Active', 'dummy/user/user.png', 2, NULL, '2024-05-15 06:14:07', '2024-05-15 06:14:07'),
(2, 'Shamim Ahmed', '0002', '01782088923', 'shamim@3-devs.com', 'Uttara,Sector -4 ,Road-9', '1999-05-12', NULL, 'Male', 'Active', 'uploads/customer/images_66445ef3a0b91.jpg', 2, 2, '2024-05-15 06:29:53', '2024-05-15 07:06:27'),
(4, 'Shomick Ahmed', '0003', '01690261920', NULL, 'Nikunjo-02', NULL, NULL, NULL, 'Active', 'dummy/user/user.png', 2, NULL, '2024-05-15 09:07:37', '2024-05-15 09:07:37'),
(5, 'Rezaul Karim', '0004', '01637621452', NULL, 'Nikunjo-02', NULL, NULL, NULL, 'Active', 'dummy/user/user.png', 2, NULL, '2024-05-15 09:09:43', '2024-05-15 09:09:43'),
(6, 'Test User 1', '0005', '0178345345', NULL, 'Test Address', NULL, NULL, NULL, 'Active', 'dummy/user/user.png', 2, NULL, '2024-05-15 09:12:18', '2024-05-15 09:12:18'),
(7, 'Hasan', '0006', '01759513085', NULL, 'Uttara sector 9', NULL, NULL, NULL, 'Active', 'dummy/user/user.png', 2, NULL, '2024-05-15 09:32:31', '2024-05-15 09:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_categories`
--

DROP TABLE IF EXISTS `material_categories`;
CREATE TABLE IF NOT EXISTS `material_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `material_categories`
--

INSERT INTO `material_categories` (`id`, `business_id`, `name`, `code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Natural Leaf', '01', 'Active', 2, NULL, '2024-05-28 08:51:02', '2024-05-28 08:51:02'),
(2, 3, 'Natural Fiber', '02', 'Active', 2, NULL, '2024-05-28 08:54:08', '2024-05-28 08:54:08'),
(3, 3, 'Stem', '03', 'Active', 2, NULL, '2024-05-28 08:54:26', '2024-05-28 08:54:26'),
(4, 4, 'Natural Leaf', '01', 'Active', 2, NULL, '2024-05-28 09:02:27', '2024-05-28 09:02:27'),
(5, 4, 'Natural Fiber', '02', 'Active', 2, 2, '2024-05-28 09:02:39', '2024-05-28 09:14:36'),
(6, 4, 'Stem', '03', 'Active', 2, 2, '2024-05-28 09:02:57', '2024-05-28 09:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_000001_create_roles_table', 1),
(3, '2014_10_12_000002_create_modules_table', 1),
(4, '2014_10_12_000003_create_permissions_table', 1),
(5, '2014_10_12_000004_create_permission_user_table', 1),
(6, '2014_10_12_000005_create_permission_role_table', 1),
(7, '2014_10_12_000006_create_role_user_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(10, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(11, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(12, '2016_06_01_000004_create_oauth_clients_table', 1),
(13, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(16, '2023_09_21_095713_create_activity_logs_table', 1),
(22, '2024_04_24_113641_create_uddoktas_table', 2),
(24, '2024_04_28_121935_create_business_types_table', 3),
(25, '2024_04_28_160056_create_business_type_module_table', 4),
(26, '2024_04_29_124437_create_payment_methods_table', 5),
(27, '2024_04_29_125746_create_businesses_table', 6),
(28, '2024_04_29_132536_create_business_business_type_module_table', 6),
(29, '2024_04_29_133436_create_business_products_table', 6),
(30, '2024_04_29_133916_create_business_payment_method_table', 6),
(31, '2024_04_29_142651_create_business_pos_table', 6),
(32, '2024_04_29_143226_create_bar_code_types_table', 6),
(35, '2024_04_29_143803_create_business_barcodes_table', 7),
(36, '2024_04_29_145306_create_business_invoices_table', 7),
(38, '2024_05_08_161906_create_stores_table', 8),
(39, '2024_05_09_084239_create_counters_table', 9),
(40, '2024_05_12_170156_create_brands_table', 10),
(42, '2024_05_12_173701_create_categories_table', 11),
(45, '2024_05_15_110128_create_customers_table', 12),
(46, '2024_05_15_120405_add_has_stoke_to_businesses_table', 12),
(49, '2024_05_15_164731_add_business_status_to_roles_table', 13),
(50, '2024_05_21_120811_create_business_user_table', 14),
(51, '2024_05_26_155748_create_barcode_activites_modules_table', 15),
(52, '2024_05_27_110835_create_business_uddokta_table', 16),
(53, '2024_05_27_144430_add_price_start_to_business_table', 17),
(55, '2024_05_28_133348_add_brand_code_to_brands_table', 18),
(56, '2024_05_28_135701_create_material_categories_table', 19),
(57, '2024_05_28_135729_create_specific_materials_table', 19),
(63, '2024_05_30_130042_create_supply_chain_product_recive_status_table', 20),
(64, '2024_06_02_132819_add_assigned_scdual_to_supply_chains_table', 21),
(65, '2024_06_02_151002_create_supply_chain_qc_status_table', 22),
(67, '2024_05_29_145516_create_supply_chains_table', 23),
(68, '2024_06_04_141248_create_supply_chain_qcs_table', 24),
(69, '2024_06_05_105730_create_supply_chain_qc_history_table', 25),
(70, '2024_06_05_111202_create_supply_chain_warehouses_table', 25),
(71, '2024_06_06_165901_create_business_barcode_activetis_module_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administration', 'Active', '2024-04-28 09:36:59', '2024-04-28 09:36:59'),
(2, 'Uddokta', 'Active', '2024-04-28 09:38:37', '2024-04-28 09:38:37'),
(3, 'Product Module', 'Active', '2024-04-28 09:38:53', '2024-04-28 09:38:53'),
(4, 'CRM Module', 'Active', '2024-04-28 09:40:13', '2024-04-28 09:46:07'),
(6, 'HRM Module', 'Active', '2024-04-29 09:06:45', '2024-04-29 09:06:54'),
(7, 'Business Setting', 'Active', '2024-04-29 09:07:12', '2024-04-29 09:07:12'),
(8, 'Stock Module', 'Active', '2024-04-29 09:07:32', '2024-04-29 09:07:32'),
(9, 'Inventory Module', 'Active', '2024-04-29 09:07:46', '2024-04-29 09:07:46'),
(10, 'Store Module', 'Active', '2024-04-29 09:08:00', '2024-04-29 09:08:00'),
(11, 'Counter Module', 'Active', '2024-04-29 09:08:14', '2024-04-29 09:08:14'),
(12, 'Sell Module', 'Active', '2024-04-29 09:08:29', '2024-04-29 09:08:29'),
(13, 'Pos Module', 'Active', '2024-04-29 09:08:46', '2024-04-29 09:08:46'),
(14, 'Service Module', 'Active', '2024-04-29 09:08:59', '2024-04-29 09:08:59'),
(15, 'Subscription Module', 'Active', '2024-04-29 09:09:15', '2024-04-29 09:09:15'),
(16, 'Booking Module', 'Active', '2024-04-29 09:09:44', '2024-04-29 09:09:44'),
(17, 'Report', 'Active', '2024-04-29 09:10:08', '2024-04-29 09:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 'Active', '2024-04-29 06:52:10', '2024-04-29 06:52:10'),
(2, 'Card', 'Active', '2024-04-29 06:52:10', '2024-04-29 06:52:10'),
(3, 'Bank Transfer', 'Inactive', '2024-04-29 06:52:10', '2024-04-29 06:52:10'),
(4, 'Cheque', 'Inactive', '2024-04-29 06:52:10', '2024-04-29 06:52:10'),
(5, 'Other', 'Inactive', '2024-04-29 06:52:10', '2024-04-29 06:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `module_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `module_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 2, 'Access Uddokta', 'access-uddokta', '2024-05-15 12:37:34', '2024-05-15 12:37:34'),
(2, 2, 'Uddokta Create', 'uddokta-create', '2024-05-15 12:40:25', '2024-05-15 12:40:25'),
(3, 2, 'Uddokta Update', 'uddokta-update', '2024-05-15 12:40:37', '2024-05-15 12:40:37'),
(5, 3, 'Access Product', 'access-product', '2024-05-15 12:56:35', '2024-05-15 12:56:35'),
(6, 3, 'Create Product', 'create-product', '2024-05-15 12:56:45', '2024-05-15 12:56:45'),
(7, 3, 'Product Edit', 'product-edit', '2024-05-15 12:56:56', '2024-05-15 12:56:56'),
(8, 3, 'Delete Product', 'delete-product', '2024-05-15 13:00:13', '2024-05-15 13:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `permission_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2024-05-15 13:01:14', '2024-05-15 13:01:14'),
(2, 5, 2, '2024-05-15 13:01:14', '2024-05-15 13:01:14'),
(3, 5, 3, '2024-05-15 13:01:14', '2024-05-15 13:01:14'),
(4, 5, 5, '2024-05-15 13:01:14', '2024-05-15 13:01:14'),
(5, 5, 6, '2024-05-15 13:01:14', '2024-05-15 13:01:14'),
(7, 5, 8, '2024-05-15 13:01:14', '2024-05-15 13:01:14'),
(9, 5, 7, '2024-05-16 05:22:12', '2024-05-16 05:22:12'),
(10, 8, 5, '2024-05-21 04:25:20', '2024-05-21 04:25:20'),
(11, 8, 6, '2024-05-21 04:25:20', '2024-05-21 04:25:20'),
(12, 8, 7, '2024-05-21 04:25:20', '2024-05-21 04:25:20'),
(13, 8, 8, '2024-05-21 04:25:20', '2024-05-21 04:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `permission_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `business_id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, NULL, 'Super Admin', 'Active', 2, NULL, '2024-05-15 11:34:30', '2024-05-15 11:34:30'),
(5, 1, 'Admin', 'Active', 2, NULL, '2024-05-15 11:34:42', '2024-05-15 11:34:42'),
(8, 2, 'Admin', 'Active', 2, 2, '2024-05-15 11:38:14', '2024-05-15 11:38:54'),
(11, 3, 'Admin', 'Active', 2, NULL, '2024-05-21 05:06:20', '2024-05-21 05:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `role_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2024-05-20 11:30:38', '2024-05-20 11:30:38'),
(2, 3, 8, '2024-05-20 11:30:38', '2024-05-20 11:30:38'),
(3, 1, 4, '2024-05-20 12:44:02', '2024-05-20 12:44:02'),
(4, 2, 11, '2024-05-27 04:56:29', '2024-05-27 04:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `specific_materials`
--

DROP TABLE IF EXISTS `specific_materials`;
CREATE TABLE IF NOT EXISTS `specific_materials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `material_category_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specific_materials`
--

INSERT INTO `specific_materials` (`id`, `business_id`, `material_category_id`, `name`, `code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'Morta Leaf', '01', 'Active', 2, NULL, '2024-05-28 10:04:56', '2024-05-28 10:04:56'),
(2, 3, 1, 'Palm Leaf', '02', 'Active', 2, NULL, '2024-05-28 10:05:19', '2024-05-28 10:05:19'),
(3, 3, 1, 'Morta Leaf', '01', 'Active', 2, NULL, '2024-05-28 10:11:30', '2024-05-28 10:11:30'),
(4, 4, 4, 'Date Palm Leaf', '02', 'Active', 2, NULL, '2024-05-28 10:11:51', '2024-05-28 10:11:51'),
(6, 4, 5, 'Jute', '03', 'Active', 2, NULL, '2024-06-04 08:58:03', '2024-06-04 08:58:03'),
(7, 4, 6, 'Bamboo', '04', 'Active', 2, NULL, '2024-06-04 09:12:51', '2024-06-04 09:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE IF NOT EXISTS `stores` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `business_id` bigint UNSIGNED NOT NULL,
  `uddokta_id` bigint UNSIGNED DEFAULT NULL,
  `store_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_register_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stores_store_code_unique` (`store_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `business_id`, `uddokta_id`, `store_name`, `store_code`, `store_phone`, `store_register_number`, `store_address`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'DF-03 (প্রবাহ মহিলা উন্নয়ন সমিতি,রাজবাড়ী)', '0003', '01758547235', '004512032-0201', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'uploads/shop/png-transparent-grocery-store-convenience-shop-retail-computer-icons-store-food-company-text-thumbnail_663b6eb76e8ba.png', 'Active', 2, 2, '2024-05-08 12:23:19', '2024-05-08 13:11:05'),
(2, 2, 1, 'DF-04 (নড়াইল নারী উন্নয়ন সংস্থা,নড়াইল)', '0002', '01758547234', '004512032-0202', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'uploads/shop/png-transparent-grocery-store-convenience-shop-retail-computer-icons-store-food-company-text-thumbnail_663b7b7f47d66.png', 'Active', 2, 2, '2024-05-08 12:24:05', '2024-05-08 13:17:51'),
(4, 1, NULL, 'DF-02 (এসো কিছু করি মহিলা সমিতি,মানিকগঞ্জ)', '0004', '01637621455', '004512068-0201', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', '', 'Active', 2, NULL, '2024-05-09 04:30:17', '2024-05-09 04:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `supply_chains`
--

DROP TABLE IF EXISTS `supply_chains`;
CREATE TABLE IF NOT EXISTS `supply_chains` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supply_id` bigint UNSIGNED DEFAULT NULL,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `uddokta_id` bigint UNSIGNED DEFAULT NULL,
  `product_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Come to product type enum class new or old product type',
  `product_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Come to product table if product is old product',
  `uddokta_product_price` decimal(10,2) DEFAULT NULL,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `material_category_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Come to material category table for barcode generator if business has barcode',
  `specific_material_id` bigint UNSIGNED DEFAULT NULL COMMENT 'Come to specific material table for barcode generator if business has barcode',
  `product_chain` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Come to product chain enum class it is go QC tema or WareHouse Team',
  `product_receiable_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'This is product first step status . it is come to SupplyChainStatus enum class',
  `reciable_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `product_recive_status_date` timestamp NULL DEFAULT NULL COMMENT 'product recice current status change date',
  `product_come` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'product come to supplier or uddokta enum class productCome',
  `quantity` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_chains`
--

INSERT INTO `supply_chains` (`id`, `supply_id`, `business_id`, `uddokta_id`, `product_type`, `product_name`, `product_slug`, `category_id`, `brand_id`, `product_id`, `uddokta_product_price`, `product_description`, `material_category_id`, `specific_material_id`, `product_chain`, `product_receiable_status`, `reciable_image`, `created_by`, `updated_by`, `product_recive_status_date`, `product_come`, `quantity`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 15, 'New', 'Lunch Bag (03)', 'lunch-bag-03', 17, NULL, NULL, 130.00, NULL, 5, 6, NULL, 'Approved', 'uploads/supplychain/images (1)_665ed74ad4fd0.jpg', 2, NULL, '2024-06-04 09:34:13', 'Uddokta', 100.00, '2024-06-04 08:58:50', '2024-06-04 09:34:13'),
(2, NULL, 4, 15, 'New', 'Lunch Bag (01)', 'lunch-bag-01', 17, NULL, NULL, 170.00, 'Lunch Bag Product', 5, 6, NULL, 'Approved', '', 2, NULL, '2024-06-04 09:03:54', 'Uddokta', 80.00, '2024-06-04 09:03:54', '2024-06-04 09:03:54'),
(3, NULL, 4, 16, 'New', 'Bamboo Boat', 'bamboo-boat', 17, NULL, NULL, 350.00, 'Bamboo Boat', 6, 7, NULL, 'Approved', 'uploads/supplychain/images (2)_665edacd53924.jpg', 2, 2, '2024-06-04 09:33:06', 'Uddokta', 80.00, '2024-06-04 09:13:49', '2024-06-04 09:33:06'),
(6, NULL, 3, 14, 'New', 'সাগুদানা চিপস(২০০গ্রাম)DF-01', 'sagudana-cips200gramdf-01', NULL, NULL, NULL, 100.00, 'সাগুদানা চিপস', NULL, NULL, NULL, 'Hold', 'uploads/supplychain/istockphoto-1598624722-612x612_666043506ba0a.jpg', 2, NULL, '2024-06-05 10:52:00', 'Uddokta', 50.00, '2024-06-05 10:52:00', '2024-06-05 10:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `supply_chain_product_recive_status`
--

DROP TABLE IF EXISTS `supply_chain_product_recive_status`;
CREATE TABLE IF NOT EXISTS `supply_chain_product_recive_status` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supply_chain_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status_change_date_time` timestamp NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_chain_product_recive_status`
--

INSERT INTO `supply_chain_product_recive_status` (`id`, `supply_chain_id`, `user_id`, `status_change_date_time`, `status`, `created_at`, `updated_at`) VALUES
(7, 3, 2, '2024-06-04 09:32:51', 'Hold', '2024-06-04 09:32:51', '2024-06-04 09:32:51'),
(8, 3, 2, '2024-06-04 09:33:06', 'Approved', '2024-06-04 09:33:06', '2024-06-04 09:33:06'),
(9, 1, 2, '2024-06-04 09:34:13', 'Approved', '2024-06-04 09:34:13', '2024-06-04 09:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `supply_chain_qcs`
--

DROP TABLE IF EXISTS `supply_chain_qcs`;
CREATE TABLE IF NOT EXISTS `supply_chain_qcs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supply_chain_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `uddokta_id` bigint UNSIGNED DEFAULT NULL,
  `supply_id` bigint UNSIGNED DEFAULT NULL,
  `qc_come_date_time` timestamp NULL DEFAULT NULL,
  `sender_by` bigint UNSIGNED DEFAULT NULL,
  `recive_quantity` decimal(8,2) DEFAULT NULL,
  `approved_quantity` decimal(8,2) DEFAULT NULL,
  `rejected_quantity` decimal(8,2) DEFAULT NULL,
  `hold_quantity` decimal(8,2) DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rejected_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hold_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date_assigned` bigint UNSIGNED DEFAULT NULL,
  `qc_assigned_date` date DEFAULT NULL,
  `qc_assigned_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_chain_qcs`
--

INSERT INTO `supply_chain_qcs` (`id`, `supply_chain_id`, `product_id`, `business_id`, `uddokta_id`, `supply_id`, `qc_come_date_time`, `sender_by`, `recive_quantity`, `approved_quantity`, `rejected_quantity`, `hold_quantity`, `last_updated`, `updated_by`, `image`, `approved_description`, `rejected_description`, `hold_description`, `date_assigned`, `qc_assigned_date`, `qc_assigned_time`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 4, 15, NULL, '2024-06-04 09:03:54', 2, 80.00, 20.00, 0.00, 60.00, '2024-06-06 06:17:55', 2, NULL, NULL, NULL, NULL, 2, '2024-06-07', '14:17:00', '2024-06-04 09:03:54', '2024-06-06 06:17:55'),
(2, 3, NULL, 4, 16, NULL, '2024-06-04 09:33:06', 2, 80.00, 0.00, 0.00, 80.00, '2024-06-05 07:22:04', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-04 09:33:06', '2024-06-05 07:22:04'),
(3, 1, NULL, 4, 15, NULL, '2024-06-04 09:34:13', 2, 100.00, 50.00, 20.00, 30.00, '2024-06-05 11:01:11', 2, NULL, NULL, NULL, NULL, 2, '2024-06-05', '17:00:00', '2024-06-04 09:34:13', '2024-06-05 11:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `supply_chain_qc_history`
--

DROP TABLE IF EXISTS `supply_chain_qc_history`;
CREATE TABLE IF NOT EXISTS `supply_chain_qc_history` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supplu_chain_qc_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT '2024-06-05 05:20:17',
  `approved_quantity` decimal(8,2) NOT NULL DEFAULT '0.00',
  `rejected_quantity` decimal(8,2) NOT NULL DEFAULT '0.00',
  `hold_quantity` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_chain_qc_history`
--

INSERT INTO `supply_chain_qc_history` (`id`, `supplu_chain_qc_id`, `user_id`, `date_time`, `approved_quantity`, `rejected_quantity`, `hold_quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2024-06-05 09:52:47', 20.00, 10.00, 70.00, '2024-06-05 09:52:47', '2024-06-05 09:52:47'),
(2, 3, 2, '2024-06-05 09:53:43', 30.00, 0.00, 40.00, '2024-06-05 09:53:43', '2024-06-05 09:53:43'),
(3, 3, 2, '2024-06-05 11:01:11', 0.00, 10.00, 30.00, '2024-06-05 11:01:11', '2024-06-05 11:01:11'),
(4, 1, 2, '2024-06-06 06:17:55', 20.00, 0.00, 60.00, '2024-06-06 06:17:55', '2024-06-06 06:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `supply_chain_warehouses`
--

DROP TABLE IF EXISTS `supply_chain_warehouses`;
CREATE TABLE IF NOT EXISTS `supply_chain_warehouses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `supply_chain_id` bigint UNSIGNED NOT NULL,
  `supply_chain_qc_id` bigint UNSIGNED NOT NULL,
  `business_id` bigint UNSIGNED DEFAULT NULL,
  `uddokta_id` bigint UNSIGNED NOT NULL,
  `suplier_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `send_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `send_date_time` timestamp NOT NULL DEFAULT '2024-06-05 05:20:17',
  `update_date_time` timestamp NULL DEFAULT NULL,
  `recive_quantity` decimal(8,2) DEFAULT NULL,
  `label_done` decimal(8,2) NOT NULL DEFAULT '0.00',
  `label_remaning` decimal(8,2) NOT NULL DEFAULT '0.00',
  `stock_available` decimal(8,2) NOT NULL DEFAULT '0.00',
  `stock_out` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_chain_warehouses`
--

INSERT INTO `supply_chain_warehouses` (`id`, `supply_chain_id`, `supply_chain_qc_id`, `business_id`, `uddokta_id`, `suplier_id`, `product_id`, `send_by`, `updated_by`, `send_date_time`, `update_date_time`, `recive_quantity`, `label_done`, `label_remaning`, `stock_available`, `stock_out`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 15, NULL, NULL, 2, NULL, '2024-06-05 09:53:43', NULL, 50.00, 0.00, 50.00, 50.00, 0.00, '2024-06-05 09:52:47', '2024-06-05 09:53:43'),
(2, 2, 1, 4, 15, NULL, NULL, 2, NULL, '2024-06-06 06:17:55', NULL, 20.00, 0.00, 20.00, 20.00, 0.00, '2024-06-06 06:17:55', '2024-06-06 06:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `uddoktas`
--

DROP TABLE IF EXISTS `uddoktas`;
CREATE TABLE IF NOT EXISTS `uddoktas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uddokta_category` bigint UNSIGNED DEFAULT NULL,
  `uddokta_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permanent_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birth_date` date NOT NULL,
  `nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `online_shop_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_shop_url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_bin_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_register_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uddoktas_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uddoktas`
--

INSERT INTO `uddoktas` (`id`, `uddokta_category`, `uddokta_code`, `first_name`, `last_name`, `phone`, `email`, `father_name`, `mother_name`, `husband_name`, `present_address`, `permanent_address`, `birth_date`, `nid`, `organization_name`, `organization_address`, `product_description`, `online_shop_name`, `online_shop_url`, `tin_bin_number`, `vat_register_number`, `gender`, `bank_name`, `bank_account`, `image`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '001', 'সাগুফতা', 'সুলতানা', '01759513081', 'saguftangedf@gmail.com', 'MR.  Aaditya', 'Aadhila', NULL, '১৩৬/ক, পিসি কালচার হাউজিং সোসাইটি, শ্যামলী, ঢাকা', '১৩৬/ক, পিসি কালচার হাউজিং সোসাইটি, শ্যামলী, ঢাকা', '1996-04-17', '9658465381', 'জয়িতা ফাউন্ডেশন', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'Jamdani is a vividly patterned, sheer cotton fabric, traditionally woven on a handloom by craftspeople and apprentices around Dhaka.', NULL, NULL, NULL, NULL, 'Female', 'Brac Bank', '151410206631900', 'uploads/uddoktas/download (1)_663b5c37ba663.png', NULL, NULL, 'Active', '2024-04-25 07:16:13', '2024-05-08 11:04:23'),
(2, NULL, '002', 'দিলশাদ', 'বেগম', '01716809769', 'ripa.dilshad@gmail.com', 'MR.  Abesh', 'Abanti Akter', NULL, 'অগ্রণী ব্যাংক লিমিটেড মোহাম্মদপুর ,ঢাকা', 'অগ্রণী ব্যাংক লিমিটেড মোহাম্মদপুর ,ঢাকা', '1999-04-22', '958643967', 'জয়িতা ফাউন্ডেশন', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'Jamdani is a vividly patterned, sheer cotton fabric, traditionally woven on a handloom by craftspeople and apprentices around Dhaka.', 'Daraz', 'https://www.daraz.com.bd/', NULL, NULL, 'Female', 'Brac Bank', '15141020663124', 'uploads/uddoktas/images_66446181700d5.jpg', NULL, 2, 'Active', '2024-04-25 08:52:51', '2024-06-04 08:43:51'),
(14, NULL, '003', 'শামীমা আক্তার', 'মুনমুন (DF-1)', '01715696306', 'moon-sbums@yahoo.com', 'MR.  Aaditya', 'Abanti Akter', NULL, 'গ্রামঃ১নং বেড়াভাঙ্গা সজ্জন কান্দা থানাঃরাজবাড়ী জেলাঃরাজবাড়ী', 'গ্রামঃ১নং বেড়াভাঙ্গা সজ্জন কান্দা থানাঃরাজবাড়ী জেলাঃরাজবাড়ী', '1995-05-10', '5195825445', 'Joyeeta', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'Dry Food Product', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, 'uploads/uddoktas/png-transparent-female-avatar-girl-face-woman-user-flat-classy-users-icon-thumbnail_6645b66d0c13c.png', 2, 2, 'Active', '2024-05-16 07:31:57', '2024-06-04 08:43:44'),
(15, NULL, '004', 'Kanij', 'Sultana', '01711541607', NULL, 'MR.  Abesh', 'Abanti Akter', NULL, 'Dhaka', 'Dhaka', '1985-05-23', '516454454451', 'জয়িতা ফাউন্ডেশন', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'Craft Food', NULL, NULL, NULL, NULL, 'Female', 'South-East Bank', '0012100023710', 'uploads/uddoktas/png-transparent-female-avatar-girl-face-woman-user-flat-classy-users-icon-thumbnail_6645b6ece8b43.png', 2, NULL, 'Active', '2024-05-16 07:34:04', '2024-06-04 08:49:10'),
(16, NULL, '005', 'Almas', 'Parvin', '01616595956', NULL, 'MR.  Aaditya', 'Abanti Akter', NULL, 'গ্রামঃ১নং বেড়াভাঙ্গা সজ্জন কান্দা থানাঃরাজবাড়ী জেলাঃরাজবাড়ী', 'গ্রামঃ১নং বেড়াভাঙ্গা সজ্জন কান্দা থানাঃরাজবাড়ী জেলাঃরাজবাড়ী', '1995-06-13', '1256546545', 'জয়িতা ফাউন্ডেশন', 'Concord Royal Court, 275/G, Road No 27 (old), Dhanmondi R/A, Dhaka- 1209', 'Craft Product', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, 'dummy/user/user.png', 2, NULL, 'Active', '2024-06-02 04:36:14', '2024-06-04 08:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uddokta_id` bigint UNSIGNED DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` smallint DEFAULT NULL,
  `user_access` int NOT NULL DEFAULT '1' COMMENT '0 for web user, 1 for app user',
  `photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uddokta_id`, `employee_id`, `customer_id`, `full_name`, `user_name`, `slug`, `status`, `email`, `phone`, `email_verified_at`, `password`, `otp`, `user_access`, `photo`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Super Admin', 'superadmin', 'super-admin', 'Active', NULL, '01782088923', NULL, '$2y$10$KTncjH7H4H8QJv54upz19eMU4C7zJsCWF/shpIya/yL2JaE6f9XUi', NULL, 1, 'uploads/users/images_664c5aee3f95b.jpg', NULL, 2, NULL, '2024-05-20 09:28:54', '2024-05-21 08:27:26'),
(2, NULL, NULL, NULL, '3 Devs', '3-devs', '3-devs', 'Active', NULL, '01637621455', NULL, '$2y$10$QPsOMAq4vcRyeyrXtahBNen.1eFPu6Fvk2hp67B0uZOV/X5RFfmFK', NULL, 1, 'uploads/users/images_664c5ad425070.jpg', NULL, 2, NULL, '2024-05-20 09:28:54', '2024-05-21 08:27:00'),
(3, NULL, NULL, NULL, 'MD. Mahadi Hasan Shakil', 'shakil123', 'md-mahadi-hasan-shakil', 'Active', 'm.h.shakil@3-devs.com', '01637621452', NULL, '$2y$10$owVWTRB8ZWYjWe5ypLvaH..vZdnA75s.lsL9MggGzxN9XZCLYe1Da', NULL, 1, 'uploads/users/images_664b23696d368.jpg', 2, 2, NULL, '2024-05-20 10:00:52', '2024-05-20 10:18:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
