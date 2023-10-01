-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2023 at 03:44 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `type`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '43” LED TV', 0, 1, 1, NULL, '2023-09-30 23:19:42', '2023-09-30 23:19:42', NULL),
(2, 'Safe', 0, 1, 1, NULL, '2023-09-30 23:19:52', '2023-09-30 23:19:52', NULL),
(3, 'Flashlight', 0, 1, 1, NULL, '2023-09-30 23:20:02', '2023-09-30 23:20:02', NULL),
(4, 'Iron and ironing board', 0, 1, 1, NULL, '2023-09-30 23:20:11', '2023-09-30 23:20:11', NULL),
(5, 'Wooden clothes brush', 0, 1, 1, NULL, '2023-09-30 23:20:19', '2023-09-30 23:20:19', NULL),
(6, 'Shoe horn', 0, 1, 1, NULL, '2023-09-30 23:20:28', '2023-09-30 23:20:28', NULL),
(7, 'Shoe polish cloth', 0, 1, 1, NULL, '2023-09-30 23:20:41', '2023-09-30 23:20:41', NULL),
(8, 'Alarm clock', 0, 1, 1, NULL, '2023-09-30 23:20:49', '2023-09-30 23:20:49', NULL),
(9, 'Mini Bar', 0, 1, 1, NULL, '2023-09-30 23:20:58', '2023-09-30 23:20:58', NULL),
(10, 'Emergency escape route', 0, 1, 1, NULL, '2023-09-30 23:21:09', '2023-09-30 23:21:09', NULL),
(11, 'Scale', 0, 1, 1, NULL, '2023-09-30 23:21:17', '2023-09-30 23:21:17', NULL),
(12, 'Slippers', 0, 1, 1, NULL, '2023-09-30 23:21:25', '2023-09-30 23:21:25', NULL),
(13, 'Bathroom amenities', 1, 1, 1, NULL, '2023-09-30 23:21:34', '2023-09-30 23:21:34', NULL),
(14, 'Disposable toothbrushes and toothpaste', 1, 1, 1, NULL, '2023-09-30 23:21:43', '2023-09-30 23:21:43', NULL),
(15, 'Razor', 1, 1, 1, NULL, '2023-09-30 23:21:52', '2023-09-30 23:21:52', NULL),
(16, 'Bathrobe', 1, 1, 1, NULL, '2023-09-30 23:22:04', '2023-09-30 23:22:04', NULL),
(17, 'Bathtub', 1, 1, 1, NULL, '2023-09-30 23:22:12', '2023-09-30 23:22:12', NULL),
(18, 'Shower', 1, 1, 1, NULL, '2023-09-30 23:22:21', '2023-09-30 23:22:21', NULL),
(19, 'Hair dryer', 1, 1, 1, NULL, '2023-09-30 23:22:29', '2023-09-30 23:22:29', NULL),
(20, 'Cable Satellite TV channels', 2, 1, 1, NULL, '2023-09-30 23:22:38', '2023-09-30 23:22:38', NULL),
(21, 'Coffee and tea maker', 2, 1, 1, NULL, '2023-09-30 23:22:47', '2023-09-30 23:22:47', NULL),
(22, 'Voicemail Service', 2, 1, 1, NULL, '2023-09-30 23:23:10', '2023-09-30 23:23:10', NULL),
(23, 'Stationary', 2, 1, 1, NULL, '2023-09-30 23:23:18', '2023-09-30 23:23:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bed_types`
--

DROP TABLE IF EXISTS `bed_types`;
CREATE TABLE IF NOT EXISTS `bed_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bed_types`
--

INSERT INTO `bed_types` (`id`, `name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Single Bed', 1, 1, NULL, '2023-09-30 23:17:39', '2023-09-30 23:17:39', NULL),
(2, 'Double Bed', 1, 1, NULL, '2023-09-30 23:17:46', '2023-09-30 23:17:46', NULL),
(3, 'Family Bed', 1, 1, NULL, '2023-09-30 23:18:00', '2023-09-30 23:18:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `is_extra_bed` tinyint NOT NULL,
  `price` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_out_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `room_id`, `customer_id`, `is_extra_bed`, `price`, `check_in_date`, `check_out_date`, `status`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 3, 1, '100000', '2023-10-01', '2023-10-02', 0, NULL, '2023-10-01 00:17:22', '2023-10-01 00:17:22', NULL),
(2, 5, 4, 0, '120000', '2023-10-04', '2023-10-06', 0, NULL, '2023-10-01 00:18:03', '2023-10-01 00:18:03', NULL),
(3, 3, 5, 0, '400000', '2023-10-02', '2023-10-07', 0, NULL, '2023-10-01 00:18:39', '2023-10-01 00:18:39', NULL),
(4, 4, 6, 1, '800000', '2023-10-02', '2023-10-10', 0, NULL, '2023-10-01 00:20:48', '2023-10-01 00:20:48', NULL),
(5, 6, 7, 1, '130000', '2023-10-05', '2023-10-06', 0, NULL, '2023-10-01 00:21:28', '2023-10-01 00:21:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Htet Aung Linn', '09779009919', 'htetaunglinn@gmail.com', NULL, '2023-10-01 00:09:54', '2023-10-01 00:09:54', NULL),
(2, 'User 1', '0912345678', 'user1@gmail.com', NULL, '2023-10-01 00:10:38', '2023-10-01 00:10:38', NULL),
(3, 'Htet Aung Linn', '0912345678', 'htetaunglinn@gmail.com', NULL, '2023-10-01 00:17:22', '2023-10-01 00:17:22', NULL),
(4, 'User 1', '0912121211', 'user1@gmail.com', NULL, '2023-10-01 00:18:03', '2023-10-01 00:18:03', NULL),
(5, 'User 2', '0922123saf', 'user2@gmail.com', NULL, '2023-10-01 00:18:39', '2023-10-01 00:18:39', NULL),
(6, 'User 3', '0988274373', 'user3@gmail.com', NULL, '2023-10-01 00:20:48', '2023-10-01 00:20:48', NULL),
(7, 'User 5', '09725438257', 'user5@gmail.com', NULL, '2023-10-01 00:21:28', '2023-10-01 00:21:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_settings`
--

DROP TABLE IF EXISTS `hotel_settings`;
CREATE TABLE IF NOT EXISTS `hotel_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time NOT NULL,
  `phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupancy` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_path` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_settings`
--

INSERT INTO `hotel_settings` (`id`, `name`, `email`, `address`, `check_in_time`, `check_out_time`, `phone`, `size_unit`, `occupancy`, `price_unit`, `logo_path`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Softguide Hotel', 'softguide@gmail.com', 'No.(575B), Pyay Road, Hledan, Yangon', '09:43:00', '09:43:00', '09 779009919', 'mm²', 'People', 'Kyats', 'img.jpg', 1, 1, NULL, '2023-09-30 23:12:51', '2023-09-30 23:12:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_23_052415_create_rooms_table', 1),
(6, '2023_08_23_052724_create_amenities_table', 1),
(7, '2023_08_23_052814_create_bed_types_table', 1),
(8, '2023_08_23_052848_create_bookings_table', 1),
(9, '2023_08_23_052919_create_customers_table', 1),
(10, '2023_08_23_165556_create_hotel_settings_table', 1),
(11, '2023_08_23_170058_create_room_amenities_table', 1),
(12, '2023_08_23_170203_create_room_galleries_table', 1),
(13, '2023_08_23_170256_create_room_special_features_table', 1),
(14, '2023_08_23_170505_create_special_features_table', 1),
(15, '2023_08_23_170808_create_views_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double NOT NULL,
  `occupancy` mediumint NOT NULL,
  `bed_type_id` tinyint NOT NULL,
  `view_id` tinyint NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_per_day` int NOT NULL,
  `extra_bed_price_per_day` int NOT NULL,
  `thumbnail_img` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `size`, `occupancy`, `bed_type_id`, `view_id`, `description`, `detail`, `price_per_day`, `extra_bed_price_per_day`, `thumbnail_img`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Resorts room', 180, 2, 2, 1, 'A comfortable and budget-friendly option for solo travelers or couples.', 'One queen bed or two twin beds, private bathroom, TV, Wi-Fi, and basic amenities.', 50000, 25000, '20231001_061314_65190dfaef2e3.jpeg', 1, 1, NULL, '2023-09-30 23:43:14', '2023-09-30 23:43:14', NULL),
(2, 'Deluxe Suite', 200, 4, 2, 4, 'A spacious and luxurious room for a relaxing stay.', 'King-size bed, separate living area, en-suite bathroom with a bathtub, minibar, flat-screen TV, and complimentary breakfast.', 100000, 25000, '20231001_061649_65190ed1bee17.jpg', 1, 1, NULL, '2023-09-30 23:46:49', '2023-09-30 23:46:49', NULL),
(3, 'Executive Business Room', 150, 2, 2, 2, 'Ideal for business travelers, this room offers extra workspace and amenities.', 'King-size bed, ergonomic workstation, high-speed internet, coffee maker, and access to a business center.', 80000, 40000, '20231001_061946_65190f827b363.jpg', 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(4, 'Ocean View Room', 150, 2, 2, 3, 'Enjoy stunning ocean vistas from this premium room.', 'Queen or king bed, private balcony, ocean-facing windows, mini-fridge, and beachfront access.', 70000, 30000, '20231001_062436_651910a422f18.jpeg', 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(5, 'Pet-Friendly Room', 100, 1, 1, 1, 'A room where you can bring your furry companion along.', 'Pet-friendly amenities, designated outdoor pet area, pet bed, and food and water bowls.', 60000, 25000, '20231001_062742_6519115ee85de.jpg', 1, 1, NULL, '2023-09-30 23:57:42', '2023-09-30 23:57:42', NULL),
(6, 'Family Suite', 180, 3, 3, 2, 'A family-friendly room with ample space for parents and children.', 'One king bed and one sofa bed, separate kids\' area, kitchenette, two bathrooms, and a gaming console.', 100000, 30000, '20231001_063035_6519120b5f01d.jpg', 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_amenities`
--

DROP TABLE IF EXISTS `room_amenities`;
CREATE TABLE IF NOT EXISTS `room_amenities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `amenity_id` int NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_amenities`
--

INSERT INTO `room_amenities` (`id`, `room_id`, `amenity_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(2, 1, 3, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(3, 1, 4, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(4, 1, 6, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(5, 1, 8, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(6, 1, 10, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(7, 1, 12, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(8, 1, 13, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(9, 1, 15, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(10, 1, 18, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(11, 1, 19, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(12, 1, 20, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(13, 1, 21, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(14, 1, 22, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(15, 1, 23, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(16, 2, 1, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(17, 2, 2, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(18, 2, 3, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(19, 2, 4, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(20, 2, 5, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(21, 2, 6, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(22, 2, 7, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(23, 2, 8, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(24, 2, 9, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(25, 2, 10, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(26, 2, 14, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(27, 2, 15, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(28, 2, 16, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(29, 2, 17, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(30, 2, 18, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(31, 2, 19, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(32, 2, 20, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(33, 2, 21, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(34, 2, 22, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(35, 3, 1, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(36, 3, 2, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(37, 3, 3, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(38, 3, 4, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(39, 3, 5, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(40, 3, 6, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(41, 3, 7, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(42, 3, 8, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(43, 3, 10, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(44, 3, 11, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(45, 3, 12, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(46, 3, 13, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(47, 3, 14, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(48, 3, 16, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(49, 3, 17, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(50, 3, 18, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(51, 3, 19, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(52, 3, 20, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(53, 3, 21, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(54, 3, 22, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(55, 3, 23, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(56, 4, 1, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(57, 4, 3, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(58, 4, 4, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(59, 4, 8, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(60, 4, 10, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(61, 4, 13, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(62, 4, 14, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(63, 4, 17, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(64, 4, 19, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(65, 4, 20, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(66, 4, 21, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(67, 4, 22, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(68, 4, 23, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(69, 5, 1, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(70, 5, 2, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(71, 5, 3, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(72, 5, 4, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(73, 5, 5, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(74, 5, 6, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(75, 5, 7, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(76, 5, 8, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(77, 5, 9, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(78, 5, 10, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(79, 5, 11, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(80, 5, 12, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(81, 5, 13, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(82, 5, 14, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(83, 5, 15, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(84, 5, 16, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(85, 5, 17, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(86, 5, 18, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(87, 5, 19, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(88, 5, 20, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(89, 5, 21, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(90, 5, 22, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(91, 5, 23, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(92, 6, 1, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(93, 6, 2, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(94, 6, 3, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(95, 6, 4, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(96, 6, 5, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(97, 6, 6, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(98, 6, 7, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(99, 6, 8, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(100, 6, 9, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(101, 6, 10, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(102, 6, 11, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(103, 6, 12, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(104, 6, 13, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(105, 6, 14, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(106, 6, 15, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(107, 6, 16, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(108, 6, 17, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(109, 6, 18, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(110, 6, 19, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(111, 6, 20, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(112, 6, 21, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(113, 6, 22, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(114, 6, 23, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_galleries`
--

DROP TABLE IF EXISTS `room_galleries`;
CREATE TABLE IF NOT EXISTS `room_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_galleries`
--

INSERT INTO `room_galleries` (`id`, `room_id`, `image`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '20231001_061328_65190e08ccf0a.jpg', 1, 1, NULL, '2023-09-30 23:43:28', '2023-09-30 23:43:28', NULL),
(2, 1, '20231001_061348_65190e1c4ec59.jpg', 1, 1, NULL, '2023-09-30 23:43:48', '2023-09-30 23:43:48', NULL),
(3, 1, '20231001_061353_65190e216677f.jpg', 1, 1, NULL, '2023-09-30 23:43:53', '2023-09-30 23:43:53', NULL),
(4, 1, '20231001_061403_65190e2be120f.jpeg', 1, 1, NULL, '2023-09-30 23:44:03', '2023-09-30 23:44:03', NULL),
(5, 1, '20231001_061415_65190e3772afb.jpg', 1, 1, NULL, '2023-09-30 23:44:15', '2023-09-30 23:44:15', NULL),
(6, 2, '20231001_061656_65190ed8c816b.jpg', 1, 1, NULL, '2023-09-30 23:46:56', '2023-09-30 23:46:56', NULL),
(7, 2, '20231001_061705_65190ee1aec37.jpg', 1, 1, NULL, '2023-09-30 23:47:05', '2023-09-30 23:47:05', NULL),
(8, 2, '20231001_061712_65190ee8295b0.jpg', 1, 1, NULL, '2023-09-30 23:47:12', '2023-09-30 23:47:12', NULL),
(9, 2, '20231001_061719_65190eef4b0db.jpg', 1, 1, NULL, '2023-09-30 23:47:19', '2023-09-30 23:47:19', NULL),
(10, 2, '20231001_061727_65190ef76e993.jpg', 1, 1, NULL, '2023-09-30 23:47:27', '2023-09-30 23:47:27', NULL),
(11, 3, '20231001_062001_65190f91102b9.jpg', 1, 1, NULL, '2023-09-30 23:50:01', '2023-09-30 23:50:01', NULL),
(12, 3, '20231001_062008_65190f988b74f.jpg', 1, 1, 1, '2023-09-30 23:50:08', '2023-09-30 23:50:17', '2023-09-30 23:50:17'),
(13, 3, '20231001_062014_65190f9e0c9df.jpg', 1, 1, NULL, '2023-09-30 23:50:14', '2023-09-30 23:50:14', NULL),
(14, 3, '20231001_062025_65190fa9d1e88.jpg', 1, 1, NULL, '2023-09-30 23:50:25', '2023-09-30 23:50:25', NULL),
(15, 3, '20231001_062035_65190fb3d88d8.jpg', 1, 1, NULL, '2023-09-30 23:50:35', '2023-09-30 23:50:35', NULL),
(16, 3, '20231001_062130_65190feacaf3c.jpg', 1, 1, NULL, '2023-09-30 23:51:30', '2023-09-30 23:51:30', NULL),
(17, 4, '20231001_062454_651910b62e010.jpg', 1, 1, NULL, '2023-09-30 23:54:54', '2023-09-30 23:54:54', NULL),
(18, 4, '20231001_062512_651910c85d42d.jpg', 1, 1, NULL, '2023-09-30 23:55:12', '2023-09-30 23:55:12', NULL),
(19, 4, '20231001_062522_651910d2d08a5.jpg', 1, 1, NULL, '2023-09-30 23:55:22', '2023-09-30 23:55:22', NULL),
(20, 4, '20231001_062531_651910db4c582.jpg', 1, 1, NULL, '2023-09-30 23:55:31', '2023-09-30 23:55:31', NULL),
(21, 5, '20231001_062759_6519116f3aa19.jpg', 1, 1, NULL, '2023-09-30 23:57:59', '2023-09-30 23:57:59', NULL),
(22, 5, '20231001_062804_65191174b10c5.jpg', 1, 1, NULL, '2023-09-30 23:58:04', '2023-09-30 23:58:04', NULL),
(23, 5, '20231001_062812_6519117ce8e73.jpg', 1, 1, NULL, '2023-09-30 23:58:12', '2023-09-30 23:58:12', NULL),
(24, 5, '20231001_062821_651911857f10c.jpg', 1, 1, NULL, '2023-09-30 23:58:21', '2023-09-30 23:58:21', NULL),
(25, 6, '20231001_063056_65191220b714c.jpg', 1, 1, 1, '2023-10-01 00:00:56', '2023-10-01 00:01:18', '2023-10-01 00:01:18'),
(26, 6, '20231001_063109_6519122d9b50d.jpeg', 1, 1, NULL, '2023-10-01 00:01:09', '2023-10-01 00:01:09', NULL),
(27, 6, '20231001_063139_6519124bd9c67.jpg', 1, 1, NULL, '2023-10-01 00:01:39', '2023-10-01 00:01:39', NULL),
(28, 6, '20231001_063157_6519125d4882c.jpg', 1, 1, NULL, '2023-10-01 00:01:57', '2023-10-01 00:01:57', NULL),
(29, 6, '20231001_063203_65191263912e7.jpg', 1, 1, NULL, '2023-10-01 00:02:03', '2023-10-01 00:02:03', NULL),
(30, 6, '20231001_063212_6519126c162c2.jpg', 1, 1, NULL, '2023-10-01 00:02:12', '2023-10-01 00:02:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_special_features`
--

DROP TABLE IF EXISTS `room_special_features`;
CREATE TABLE IF NOT EXISTS `room_special_features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `special_feature_id` int NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_special_features`
--

INSERT INTO `room_special_features` (`id`, `room_id`, `special_feature_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 7, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(2, 1, 5, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(3, 1, 3, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(4, 1, 1, 1, 1, NULL, '2023-09-30 23:43:15', '2023-09-30 23:43:15', NULL),
(5, 2, 7, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(6, 2, 6, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(7, 2, 4, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(8, 2, 3, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(9, 2, 2, 1, 1, NULL, '2023-09-30 23:46:50', '2023-09-30 23:46:50', NULL),
(10, 3, 7, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(11, 3, 6, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(12, 3, 5, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(13, 3, 4, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(14, 3, 3, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(15, 3, 2, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(16, 3, 1, 1, 1, NULL, '2023-09-30 23:49:46', '2023-09-30 23:49:46', NULL),
(17, 4, 7, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(18, 4, 5, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(19, 4, 4, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(20, 4, 3, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(21, 4, 2, 1, 1, NULL, '2023-09-30 23:54:36', '2023-09-30 23:54:36', NULL),
(22, 5, 7, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(23, 5, 6, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(24, 5, 5, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(25, 5, 4, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(26, 5, 3, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(27, 5, 2, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(28, 5, 1, 1, 1, NULL, '2023-09-30 23:57:43', '2023-09-30 23:57:43', NULL),
(29, 6, 7, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(30, 6, 6, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(31, 6, 5, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(32, 6, 4, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(33, 6, 3, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(34, 6, 2, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL),
(35, 6, 1, 1, 1, NULL, '2023-10-01 00:00:35', '2023-10-01 00:00:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `special_features`
--

DROP TABLE IF EXISTS `special_features`;
CREATE TABLE IF NOT EXISTS `special_features` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `special_features`
--

INSERT INTO `special_features` (`id`, `name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Each room of the hotel commands resplendent views of Inya Lake.', 1, 1, NULL, '2023-09-30 23:23:35', '2023-09-30 23:23:35', NULL),
(2, 'Super premium bedding sets: Top class beds and bedding for a perfect night’s sleep.', 1, 1, NULL, '2023-09-30 23:23:44', '2023-09-30 23:23:44', NULL),
(3, 'Complimentary use of our Fitness Center (including swimming pool).', 1, 1, NULL, '2023-09-30 23:23:50', '2023-09-30 23:23:50', NULL),
(4, 'Free high-speed wireless internet in all rooms.', 1, 1, NULL, '2023-09-30 23:23:57', '2023-09-30 23:23:57', NULL),
(5, 'Turndown service at guest’s request', 1, 1, NULL, '2023-09-30 23:24:03', '2023-09-30 23:24:03', NULL),
(6, 'Customized pillow (a selection of five fine pillows).', 1, 1, NULL, '2023-09-30 23:24:10', '2023-09-30 23:24:10', NULL),
(7, 'Separate shower and bathtub.', 1, 1, NULL, '2023-09-30 23:24:16', '2023-09-30 23:24:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Y1b6MYJ4BnKBF8HQdhlPoumb226njVomuss2/3uC.6QsRK8YeXBQa', NULL, 1, 1, NULL, '2023-09-30 23:12:51', '2023-09-30 23:12:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE IF NOT EXISTS `views` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `updated_by` int NOT NULL,
  `deleted_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `name`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'City View', 1, 1, NULL, '2023-09-30 23:16:38', '2023-09-30 23:16:38', NULL),
(2, 'Pagoda View', 1, 1, NULL, '2023-09-30 23:16:53', '2023-09-30 23:16:53', NULL),
(3, 'Lake View', 1, 1, NULL, '2023-09-30 23:17:01', '2023-09-30 23:17:01', NULL),
(4, 'Mountain View', 1, 1, NULL, '2023-09-30 23:17:10', '2023-09-30 23:17:10', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
