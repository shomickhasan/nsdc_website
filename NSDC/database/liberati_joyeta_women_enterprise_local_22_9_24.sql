-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2024 at 12:45 PM
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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` mediumint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `status`, `group`, `activity_type`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 09:00:12', '2024-07-08 09:00:12'),
(2, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-08 10:19:51', '2024-07-08 10:19:51'),
(3, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 10:19:58', '2024-07-08 10:19:58'),
(4, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-07-08 11:13:26', '2024-07-08 11:13:26'),
(5, 'success', 'Logout', 'user logout', 'user login successfully', 2, '2024-07-08 11:14:25', '2024-07-08 11:14:25'),
(6, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 11:14:46', '2024-07-08 11:14:46'),
(7, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-08 11:35:00', '2024-07-08 11:35:00'),
(8, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 11:46:17', '2024-07-08 11:46:17'),
(9, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-08 12:47:32', '2024-07-08 12:47:32'),
(10, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 12:47:47', '2024-07-08 12:47:47'),
(11, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-08 12:51:15', '2024-07-08 12:51:15'),
(12, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 12:52:36', '2024-07-08 12:52:36'),
(13, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-08 12:53:13', '2024-07-08 12:53:13'),
(14, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 12:58:13', '2024-07-08 12:58:13'),
(15, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-08 12:58:20', '2024-07-08 12:58:20'),
(16, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-08 12:58:46', '2024-07-08 12:58:46'),
(17, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-09 04:51:17', '2024-07-09 04:51:17'),
(18, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-10 06:52:35', '2024-07-10 06:52:35'),
(19, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-07-10 06:52:54', '2024-07-10 06:52:54'),
(20, 'success', 'Login', 'user Login', 'User Login Successfully', 2, '2024-07-10 06:53:02', '2024-07-10 06:53:02'),
(21, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-11 05:26:38', '2024-07-11 05:26:38'),
(22, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-29 07:27:54', '2024-07-29 07:27:54'),
(23, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-07-30 09:24:13', '2024-07-30 09:24:13'),
(24, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-08-01 07:05:12', '2024-08-01 07:05:12'),
(25, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-08-22 06:51:43', '2024-08-22 06:51:43'),
(26, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-08-22 06:54:19', '2024-08-22 06:54:19'),
(27, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-08-22 06:54:24', '2024-08-22 06:54:24'),
(28, 'success', 'Logout', 'user logout', 'user login successfully', 1, '2024-08-22 06:59:27', '2024-08-22 06:59:27'),
(29, 'success', 'Login', 'user Login', 'User Login Successfully', 1, '2024-08-22 07:28:14', '2024-08-22 07:28:14');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_division_id_foreign` (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `bn_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'Dhaka', 'ঢাকা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(2, 3, 'Faridpur', 'ফরিদপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(3, 3, 'Gazipur', 'গাজীপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(4, 3, 'Gopalganj', 'গোপালগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(5, 8, 'Jamalpur', 'জামালপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(6, 3, 'Kishoreganj', 'কিশোরগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(7, 3, 'Madaripur', 'মাদারীপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(8, 3, 'Manikganj', 'মানিকগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(9, 3, 'Munshiganj', 'মুন্সিগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(10, 8, 'Mymensingh', 'ময়মনসিংহ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(11, 3, 'Narayanganj', 'নারায়াণগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(12, 3, 'Narsingdi', 'নরসিংদী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(13, 8, 'Netrokona', 'নেত্রকোণা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(14, 3, 'Rajbari', 'রাজবাড়ি', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(15, 3, 'Shariatpur', 'শরীয়তপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(16, 8, 'Sherpur', 'শেরপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(17, 3, 'Tangail', 'টাঙ্গাইল', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(18, 5, 'Bogura', 'বগুড়া', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(19, 5, 'Joypurhat', 'জয়পুরহাট', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(20, 5, 'Naogaon', 'নওগাঁ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(21, 5, 'Natore', 'নাটোর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(22, 5, 'Nawabganj', 'নবাবগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(23, 5, 'Pabna', 'পাবনা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(24, 5, 'Rajshahi', 'রাজশাহী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(25, 5, 'Sirajgonj', 'সিরাজগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(26, 6, 'Dinajpur', 'দিনাজপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(27, 6, 'Gaibandha', 'গাইবান্ধা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(28, 6, 'Kurigram', 'কুড়িগ্রাম', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(29, 6, 'Lalmonirhat', 'লালমনিরহাট', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(30, 6, 'Nilphamari', 'নীলফামারী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(31, 6, 'Panchagarh', 'পঞ্চগড়', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(32, 6, 'Rangpur', 'রংপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(33, 6, 'Thakurgaon', 'ঠাকুরগাঁও', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(34, 1, 'Barguna', 'বরগুনা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(35, 1, 'Barishal', 'বরিশাল', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(36, 1, 'Bhola', 'ভোলা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(37, 1, 'Jhalokati', 'ঝালকাঠি', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(38, 1, 'Patuakhali', 'পটুয়াখালী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(39, 1, 'Pirojpur', 'পিরোজপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(40, 2, 'Bandarban', 'বান্দরবান', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(41, 2, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(42, 2, 'Chandpur', 'চাঁদপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(43, 2, 'Chattogram', 'চট্টগ্রাম', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(44, 2, 'Cumilla', 'কুমিল্লা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(45, 2, 'Cox\'s Bazar', 'কক্স বাজার', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(46, 2, 'Feni', 'ফেনী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(47, 2, 'Khagrachari', 'খাগড়াছড়ি', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(48, 2, 'Lakshmipur', 'লক্ষ্মীপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(49, 2, 'Noakhali', 'নোয়াখালী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(50, 2, 'Rangamati', 'রাঙ্গামাটি', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(51, 7, 'Habiganj', 'হবিগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(52, 7, 'Maulvibazar', 'মৌলভীবাজার', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(53, 7, 'Sunamganj', 'সুনামগঞ্জ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(54, 7, 'Sylhet', 'সিলেট', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(55, 4, 'Bagerhat', 'বাগেরহাট', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(56, 4, 'Chuadanga', 'চুয়াডাঙ্গা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(57, 4, 'Jashore', 'যশোর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(58, 4, 'Jhenaidah', 'ঝিনাইদহ', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(59, 4, 'Khulna', 'খুলনা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(60, 4, 'Kushtia', 'কুষ্টিয়া', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(61, 4, 'Magura', 'মাগুরা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(62, 4, 'Meherpur', 'মেহেরপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(63, 4, 'Narail', 'নড়াইল', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(64, 4, 'Satkhira', 'সাতক্ষীরা', '2024-07-08 08:59:49', '2024-07-08 08:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `created_at`, `updated_at`) VALUES
(1, 'Barishal', 'বরিশাল', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(2, 'Chattogram', 'চট্টগ্রাম', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(3, 'Dhaka', 'ঢাকা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(4, 'Khulna', 'খুলনা', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(5, 'Rajshahi', 'রাজশাহী', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(6, 'Rangpur', 'রংপুর', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(7, 'Sylhet', 'সিলেট', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(8, 'Mymensingh', 'ময়মনসিংহ', '2024-07-08 08:59:49', '2024-07-08 08:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `loan_name` text COLLATE utf8mb4_unicode_ci,
  `basic_amount` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `loan_name`, `basic_amount`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Loan 2', '1000', NULL, 1, 1, '2024-08-22 12:39:53', '2024-08-22 12:45:17'),
(3, 'Loan1', '10000', NULL, 1, 1, '2024-08-22 12:40:49', '2024-08-22 12:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_09_21_095713_create_activity_logs_table', 1),
(11, '2024_03_07_112235_create_divisions_table', 1),
(12, '2024_03_07_112247_create_districts_table', 1),
(13, '2024_03_07_112819_create_product_types_table', 1),
(14, '2024_04_24_113641_create_uddoktas_table', 1),
(17, '2024_08_22_173707_create_loans_table', 2),
(18, '2024_08_22_173736_create_tranings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
-- Table structure for table `product_types`
--

DROP TABLE IF EXISTS `product_types`;
CREATE TABLE IF NOT EXISTS `product_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ফ্যাশন/পোশাক', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(2, 'তৈরি খাদ্য ব্যবসা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(3, 'খাদ্য প্রক্রিয়াজাতকরণ ব্যবসা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(4, 'ক্র্যাফট', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(5, 'কৃষি', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(6, 'কাঁচা ফল-সব্জি', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(7, 'মহিলা হোস্টেল ব্যবস্থাপনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(8, 'লন্ড্রী ব্যবসা ব্যবস্থাপনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(9, 'সিএনজি/থ্রি-হুইলার চালানো/ব্যবস্থাপনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(10, 'বিউটি পার্লার ব্যবস্থাপনা/পরিচালনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(11, 'মহিলা ব্যায়ামাগার ব্যবস্থাপনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(12, 'গৃহকর্মী সরবরাহ ও ব্যবস্থাপনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(13, 'ফার্মেসি ব্যবস্থাপনা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(14, 'ক্ষুদ্র ব্যবসা', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(15, 'অন্যান্য', 'Active', '2024-07-08 08:59:49', '2024-07-08 08:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `tranings`
--

DROP TABLE IF EXISTS `tranings`;
CREATE TABLE IF NOT EXISTS `tranings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tranings`
--

INSERT INTO `tranings` (`id`, `name`, `status`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Training 1', 'Active', NULL, 1, 1, '2024-08-22 12:13:10', '2024-08-22 12:24:23'),
(2, 'Training 2', 'Inactive', NULL, 1, NULL, '2024-08-22 12:21:31', '2024-08-22 12:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `uddoktas`
--

DROP TABLE IF EXISTS `uddoktas`;
CREATE TABLE IF NOT EXISTS `uddoktas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `entrepreneur_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `husband_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint UNSIGNED DEFAULT NULL,
  `district_id` bigint UNSIGNED DEFAULT NULL,
  `present_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permanent_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `birth_date` date DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `organization_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `organization_email_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type_id` bigint UNSIGNED DEFAULT NULL,
  `product_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `online_shop_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_shop_url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tin_bin_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_register_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entrepreneur_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `association_registration_certificate` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Association Registration certificate',
  `association_trade_license` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Association Trade License',
  `constitution_association` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Constitution of the Association',
  `council_members_association` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'List of Executive Council Members of Association',
  `president_photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `association_image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `president_nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'National Identity Card of President',
  `association_nid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'National Identity Card of President',
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uddoktas_division_id_foreign` (`division_id`),
  KEY `uddoktas_district_id_foreign` (`district_id`),
  KEY `uddoktas_product_type_id_foreign` (`product_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uddoktas`
--

INSERT INTO `uddoktas` (`id`, `entrepreneur_type`, `registration_number`, `full_name`, `father_name`, `mother_name`, `husband_name`, `division_id`, `district_id`, `present_address`, `permanent_address`, `birth_date`, `phone`, `nid`, `email`, `organization_name`, `organization_address`, `organization_email_address`, `product_type_id`, `product_description`, `online_shop_name`, `online_shop_url`, `tin_bin_number`, `vat_register_number`, `entrepreneur_image`, `association_registration_certificate`, `association_trade_license`, `constitution_association`, `council_members_association`, `president_photo`, `association_image`, `president_nid`, `association_nid`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 'সমিতি উদ্যোক্তা', 'twrw', 'wefrw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dummy/user/user.png', '', '', '', '', '', '', '', '', 'Active', 1, NULL, '2024-08-22 12:00:15', '2024-08-22 12:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `user_name`, `slug`, `status`, `email`, `phone`, `email_verified_at`, `password`, `photo`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '3 Devs', '3-devs', '3-devs', 'Active', NULL, NULL, NULL, '$2y$10$o/vzifi92rZJvmt8QGWD1u.2NVvEVGdWj3Y6Mz3Qg1mgFIrCRDZMC', NULL, NULL, NULL, NULL, '2024-07-08 08:59:49', '2024-07-08 08:59:49'),
(2, 'MD. Mahadi Hasan Shakil', 'shakil123', 'md-mahadi-hasan-shakil', 'Active', 'm.h.shakil@3-devs.com', '01637621452', NULL, '$2y$10$/lGxKukj5hdR3QS2DErBTuFn8Nqc5nyPrD6z0Rp4yML6G6IerdQIO', 'dummy/user/user.png', 1, 1, NULL, '2024-07-08 09:46:41', '2024-07-10 06:52:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uddoktas`
--
ALTER TABLE `uddoktas`
  ADD CONSTRAINT `uddoktas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uddoktas_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `uddoktas_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
