-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2025 at 07:04 AM
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
-- Database: `real_estate_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('paid','free') NOT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`id`, `name`, `image`, `type`, `price`, `description`, `status`, `created_at`, `updated_at`, `deleted`) VALUES
(1, 'whatsapp', '1763031345_6915b9317a900.jpeg', 'free', NULL, NULL, 'active', '2025-11-13 17:02:16', '2025-11-14 07:35:28', '2025-11-13 10:02:16'),
(2, 'SMS integration', '1763031222_6915b8b6753dd.png', 'paid', 50, NULL, 'active', '2025-11-13 17:18:45', '2025-11-13 17:56:07', '2025-11-13 10:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partners`
--

CREATE TABLE `channel_partners` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `office_location` varchar(255) DEFAULT NULL,
  `team_size` int(11) NOT NULL,
  `rera_status` enum('yes','no') NOT NULL,
  `employee_id` bigint(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configrations`
--

CREATE TABLE `configrations` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('percentage','amount') DEFAULT NULL,
  `type_value` int(11) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `type`, `type_value`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'FIRST500', 'amount', 500, 'active', '2025-11-03 10:20:18', '2025-11-17 12:23:24', NULL),
(2, 'FIRST10', 'percentage', 25, 'active', '2025-11-03 10:43:09', '2025-11-03 10:43:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dispositions`
--

CREATE TABLE `dispositions` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted`) VALUES
(2, 'Roll Baswe Access', 'active', '2025-11-13 14:45:28', '2025-11-13 14:51:22', '2025-11-13 07:45:28'),
(3, 'sms integration', 'active', '2025-11-13 14:52:25', '2025-11-13 14:52:25', '2025-11-13 07:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `lead_type`
--

CREATE TABLE `lead_type` (
  `id` int(11) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `have_submenu` varchar(255) NOT NULL DEFAULT 'No',
  `route_name` varchar(255) DEFAULT NULL,
  `icon_class_name` varchar(255) NOT NULL,
  `sorting_index` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `role_id`, `name`, `have_submenu`, `route_name`, `icon_class_name`, `sorting_index`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dashboard', 'No', 'dashboard', '#custom-status-up', 1, 'active', '2024-11-18 07:59:19', '2024-11-22 00:27:37'),
(2, 1, 'Permission', 'No', 'permission.menu', '#custom-shield', 4, 'active', '2024-11-18 08:01:05', '2024-11-18 08:08:59'),
(3, 1, 'Master', 'Yes', NULL, '#custom-text-align-justify-center', 2, 'active', '2024-11-18 08:05:26', '2024-11-18 08:08:44'),
(4, 1, 'Client Management', 'Yes', NULL, '#custom-fatrows', 3, 'active', '2024-11-18 08:08:03', '2024-11-18 08:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(4, '2019_08_19_000000_create_failed_jobs_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2024_11_10_135550_create_menus_table', 3),
(7, '2024_11_10_140124_create_sub_menus_table', 3),
(8, '2024_11_13_112052_create_user_limits_table', 3),
(9, '2024_11_13_170252_create_subscriptions_table', 3),
(10, '2024_11_14_095748_create_orders_table', 3),
(11, '2025_10_15_062720_create_sessions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_of_month` int(11) DEFAULT NULL,
  `payment_method` enum('bank_transfer','cash') NOT NULL,
  `is_free` int(11) NOT NULL DEFAULT 0,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `discount_amount` int(11) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `gst_amount` decimal(10,2) DEFAULT NULL,
  `grand_total` decimal(10,2) DEFAULT NULL,
  `txn_id` text DEFAULT NULL,
  `status` enum('pending','completed','cancelled') NOT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `user_plan_id`, `no_of_month`, `payment_method`, `is_free`, `coupon_id`, `coupon_code`, `discount_amount`, `sub_total`, `gst_amount`, `grand_total`, `txn_id`, `status`, `start_date`, `expiry_date`, `attachment`, `created_at`, `updated_at`) VALUES
(3, 'ADW0003', 7, 5, 5, '', 0, NULL, 'FIRST500', NULL, NULL, NULL, 17110.00, NULL, 'completed', '2025-11-17', '2026-02-17', NULL, '2025-11-17 00:51:46', '2025-11-17 00:51:46'),
(4, 'ADW0004', 5, 6, 10, '', 0, NULL, NULL, NULL, NULL, NULL, 10620.00, NULL, 'completed', '2025-11-17', '2025-12-17', NULL, '2025-11-17 01:57:05', '2025-11-17 01:57:05'),
(14, 'ADW0005', 3, 6, 10, 'bank_transfer', 0, 1, 'FIRST10', 6750, 27000.00, 3645.00, 23895.00, NULL, 'completed', '2025-11-19', '2026-02-19', '1763552038_691dab267027a.png', '2025-11-19 06:03:58', '2025-11-19 06:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'api-token', '653ffc80d2ff71d895ced18fc9432bf80cd89be5bf64f17c6e9239162ddb8adb', '[\"*\"]', NULL, NULL, '2025-10-17 01:54:10', '2025-10-17 01:54:10'),
(2, 'App\\Models\\User', 1, 'api-token', '4cc5bf09843fd6ebb3a2923bdbe28e3c03ee58ca4d4fa05c01b9fb0c5f7f4857', '[\"*\"]', NULL, NULL, '2025-10-17 02:00:25', '2025-10-17 02:00:25'),
(3, 'App\\Models\\User', 1, 'api-token', '6446bd0a57dea80462365072770e3907cf0a349e29c5a38927379a4582dd032e', '[\"*\"]', NULL, NULL, '2025-10-17 02:01:49', '2025-10-17 02:01:49'),
(4, 'App\\Models\\User', 1, 'api-token', '34a0d1f2a9b10525d0d96c0f354616e52943bb84d800c67fa7f64453f9d1e24e', '[\"*\"]', NULL, NULL, '2025-10-17 02:05:02', '2025-10-17 02:05:02'),
(5, 'App\\Models\\User', 1, 'api-token', '53ec7f53c76ebf0d4ce114f606beb4c2913cd34e22fffb69ed1815d39c79a830', '[\"*\"]', NULL, NULL, '2025-10-17 02:13:38', '2025-10-17 02:13:38'),
(6, 'App\\Models\\User', 1, 'api-token', '7bb7b61a6ca777cec5efda02dc8a852de9b88dac6315cc65d13f610a829a42ab', '[\"*\"]', NULL, NULL, '2025-10-17 02:14:22', '2025-10-17 02:14:22'),
(7, 'App\\Models\\User', 1, 'api-token', 'be086adc94ccedc1f4336653b08f082423974c2b7bd182b80918dc430d25ed37', '[\"*\"]', NULL, NULL, '2025-10-17 02:15:09', '2025-10-17 02:15:09'),
(8, 'App\\Models\\User', 1, 'api-token', 'ff8087daeb3961c4019fca41fe40aac14b900426233542a0c298e806cf448f10', '[\"*\"]', NULL, NULL, '2025-10-17 02:18:22', '2025-10-17 02:18:22'),
(9, 'App\\Models\\User', 1, 'api-token', 'e2dfdf600e253503620164389583637adbb59014a693eded38b888c322276ce8', '[\"*\"]', NULL, NULL, '2025-10-17 02:29:58', '2025-10-17 02:29:58'),
(10, 'App\\Models\\User', 1, 'api-token', 'c5f7f2402240895b781ed40d3adaf2b84fd4911a70a6d776f5c710c1663b604d', '[\"*\"]', NULL, NULL, '2025-10-17 02:30:43', '2025-10-17 02:30:43'),
(11, 'App\\Models\\User', 1, 'api-token', '4222ef3896917436b335881bb71e0a6983aa4443850747bbf70bd93be2b26f67', '[\"*\"]', NULL, NULL, '2025-10-17 03:49:39', '2025-10-17 03:49:39'),
(12, 'App\\Models\\User', 1, 'api-token', 'fc6176fefc072a5554263cfd0944065b3f6cd5216ffd9ead95d5a5bb38eaab08', '[\"*\"]', NULL, NULL, '2025-10-17 03:51:45', '2025-10-17 03:51:45'),
(13, 'App\\Models\\User', 1, 'api-token', '872e6dca794d2e3c2dd4c82a875cc9bd9dfb04ea6f7b68b1db6911d225bbf1f3', '[\"*\"]', NULL, NULL, '2025-10-17 03:59:33', '2025-10-17 03:59:33'),
(14, 'App\\Models\\User', 1, 'api-token', '3e2bfec4b59f82ba44c1a9d19a9fda75aaad4a9a32eb3358f2147cf62e86dd9f', '[\"*\"]', NULL, NULL, '2025-10-17 03:59:54', '2025-10-17 03:59:54'),
(15, 'App\\Models\\User', 1, 'api-token', 'ac7beeafa679f27702ea62b746049d1abf25f73cecf274f93f7575165695c3e0', '[\"*\"]', NULL, NULL, '2025-10-17 04:35:36', '2025-10-17 04:35:36'),
(16, 'App\\Models\\User', 1, 'api-token', '0881ea06f361220b94031acd8e352c66b1665d96dbf75fdb0d4082fb1af1d9a2', '[\"*\"]', NULL, NULL, '2025-10-17 04:35:49', '2025-10-17 04:35:49'),
(17, 'App\\Models\\User', 1, 'api-token', '295e7f1c8261b41b0ea96d31073336d713e3282d22b1a9f1a77cc4318aae4c3e', '[\"*\"]', NULL, NULL, '2025-10-17 04:36:46', '2025-10-17 04:36:46'),
(18, 'App\\Models\\User', 1, 'api-token', 'eb808eb3e5f85acb1f153adc702a6adc341f232a123c41a0c7c17baeac7a3d6f', '[\"*\"]', NULL, NULL, '2025-10-17 04:38:06', '2025-10-17 04:38:06'),
(19, 'App\\Models\\User', 1, 'api-token', '152d785f5e7443e39e6d55f3a2cd8083f05e03687380733d66e09404e460849b', '[\"*\"]', NULL, NULL, '2025-10-17 04:38:38', '2025-10-17 04:38:38'),
(20, 'App\\Models\\User', 1, 'api-token', '1f1dbb50e152c69ee8e1bb6bb7d6d4ad7c20aa1319ba8f26f6fbbf2de4d097db', '[\"*\"]', NULL, NULL, '2025-10-17 04:43:24', '2025-10-17 04:43:24'),
(21, 'App\\Models\\User', 1, 'api-token', '2ac827d2bd581d282cf345af4f5a6836e01d60ddcef4b0ffd12aa029f5b8d967', '[\"*\"]', NULL, NULL, '2025-10-17 04:49:30', '2025-10-17 04:49:30'),
(22, 'App\\Models\\User', 1, 'api-token', '31ccf19e747d565d9b777148ea5f6cd8ad0060dfd07bc206ee2c12fbfb5d241f', '[\"*\"]', NULL, NULL, '2025-10-17 05:16:35', '2025-10-17 05:16:35'),
(23, 'App\\Models\\User', 1, 'api-token', '3e5baf06996b6f801777b419d986d30340849991273c3f9b3f214f0990881c0e', '[\"*\"]', NULL, NULL, '2025-10-17 05:22:38', '2025-10-17 05:22:38'),
(24, 'App\\Models\\User', 1, 'api-token', '517b3107576559843fe724ad8d72b4f30eed565cdcf887e46ff5fab3e2e3f911', '[\"*\"]', NULL, NULL, '2025-10-17 05:30:03', '2025-10-17 05:30:03'),
(25, 'App\\Models\\User', 1, 'api-token', 'd87c1b924235096ef80c8e05540dc501cde71e7fb3c4132ab20d2dae52d826d8', '[\"*\"]', NULL, NULL, '2025-10-17 05:31:17', '2025-10-17 05:31:17'),
(26, 'App\\Models\\User', 1, 'api-token', '35ab9743e88c41e6a5a1d1e6fed0faac2dbec1e691f94ac39eca447aef2a7910', '[\"*\"]', NULL, NULL, '2025-10-17 05:33:02', '2025-10-17 05:33:02'),
(27, 'App\\Models\\User', 1, 'api-token', '07dbcc074b2c2846f942f5587e4955db92a684a6f0673ed327992181bf7ca70c', '[\"*\"]', NULL, NULL, '2025-10-17 05:33:10', '2025-10-17 05:33:10'),
(28, 'App\\Models\\User', 1, 'api-token', 'f7acd7a7988e06806a5d592f5577a455af47b1d8616d38e964e552379b9dd7ba', '[\"*\"]', NULL, NULL, '2025-10-17 05:33:21', '2025-10-17 05:33:21'),
(29, 'App\\Models\\User', 1, 'api-token', 'd214e470d32568896529b0c7288a9f6bf1b545488032c0031de20187dff5155c', '[\"*\"]', NULL, NULL, '2025-10-17 05:34:56', '2025-10-17 05:34:56'),
(30, 'App\\Models\\User', 1, 'api-token', 'e838273d0fd9a8061f56045aaeb3dc9e395d45fd2b3d770024c54620cd57866d', '[\"*\"]', NULL, NULL, '2025-10-17 05:35:38', '2025-10-17 05:35:38'),
(31, 'App\\Models\\User', 1, 'api-token', '0ec01e1f65fd823c2b87ca7d0a41f173300b8ddbfce9a540309290a900e0cda9', '[\"*\"]', NULL, NULL, '2025-10-17 05:40:44', '2025-10-17 05:40:44'),
(32, 'App\\Models\\User', 1, 'api-token', 'fdc5c365ddf908366f1b792a62b913f13ea20c6814d9851e39c46fbc2645496d', '[\"*\"]', NULL, NULL, '2025-10-17 05:45:13', '2025-10-17 05:45:13'),
(33, 'App\\Models\\User', 1, 'api-token', '536a0c8c751182ff8d16eec977b2d537dc6d71bdbe1e76c46234c79cebbfdc52', '[\"*\"]', NULL, NULL, '2025-10-17 05:49:54', '2025-10-17 05:49:54'),
(34, 'App\\Models\\User', 1, 'api-token', '3e31d67b31754b99891f301d6b99392c7dca3366cecea35fff177a7ffc2f70db', '[\"*\"]', NULL, NULL, '2025-10-17 05:52:42', '2025-10-17 05:52:42'),
(35, 'App\\Models\\User', 1, 'api-token', '2adeea041026d973ec7ea4b7376af7624f082f504ec0f65f6ac56b28de6c7f7f', '[\"*\"]', NULL, NULL, '2025-10-17 06:21:18', '2025-10-17 06:21:18'),
(36, 'App\\Models\\User', 1, 'api-token', '1e0225118e240168a985863958eaf304a4b4b9252db97b23ed91064f88845610', '[\"*\"]', NULL, NULL, '2025-10-17 06:21:35', '2025-10-17 06:21:35'),
(37, 'App\\Models\\User', 1, 'api-token', '716abf2e6d522c174895a317a32e422b3acd71d2afb8bf20df7bea3a659b5dfb', '[\"*\"]', NULL, NULL, '2025-10-17 06:22:20', '2025-10-17 06:22:20'),
(38, 'App\\Models\\User', 1, 'api-token', 'e73267844c56ac2e43e0e4a96fdc91efabefad66cefd26e99d9bee6d8b5600d1', '[\"*\"]', NULL, NULL, '2025-10-17 06:22:51', '2025-10-17 06:22:51'),
(39, 'App\\Models\\User', 1, 'api-token', '53ed99b35c77d21f8f22556fe2990bc16b1e335dbc82940ad1f02179784a9a89', '[\"*\"]', NULL, NULL, '2025-10-17 06:23:51', '2025-10-17 06:23:51'),
(40, 'App\\Models\\User', 1, 'api-token', 'df5edcce6cfeaa64c1db06c39601eae7aadd201e9016fddafa7a3f3383dc7d90', '[\"*\"]', NULL, NULL, '2025-10-17 06:26:17', '2025-10-17 06:26:17'),
(41, 'App\\Models\\User', 1, 'api-token', '4ee23b77a2c3b74757ca641e7c07c2bebb92f68a6cfa5837f03e62f33479964f', '[\"*\"]', NULL, NULL, '2025-10-17 06:27:22', '2025-10-17 06:27:22'),
(42, 'App\\Models\\User', 1, 'api-token', 'd8e54e297c00289d19ad60f124911cae21ac2bb613f1415b466598fe27c1a2e1', '[\"*\"]', NULL, NULL, '2025-10-17 06:28:02', '2025-10-17 06:28:02'),
(43, 'App\\Models\\User', 1, 'api-token', '3f391de2d452b22b0015200be805ac43b5d8073eec844054db6f8cb905cd176f', '[\"*\"]', NULL, NULL, '2025-10-17 06:51:47', '2025-10-17 06:51:47'),
(44, 'App\\Models\\User', 1, 'api-token', '5bc0002b91a6b2f4ff2f25baacfa2c7fa87bb703e6221cbe5f968e7900c046bd', '[\"*\"]', NULL, NULL, '2025-10-17 06:58:03', '2025-10-17 06:58:03'),
(45, 'App\\Models\\User', 1, 'api-token', '7600603ae1deb9d7c144b178acbb89a22b7d9d63042bdc302fe4516ce1599b16', '[\"*\"]', NULL, NULL, '2025-10-17 06:58:14', '2025-10-17 06:58:14'),
(46, 'App\\Models\\User', 1, 'api-token', '900cbc64d6c6dee65024cfad45629809e5f423fc45e87dd465324f4ae0cf84d9', '[\"*\"]', NULL, NULL, '2025-10-17 07:11:36', '2025-10-17 07:11:36'),
(47, 'App\\Models\\User', 1, 'api-token', 'fe81959c90427082badd13fe9b053257544b9a594a39ff024e519e0fe6a921d7', '[\"*\"]', NULL, NULL, '2025-10-17 07:11:48', '2025-10-17 07:11:48'),
(48, 'App\\Models\\User', 1, 'api-token', '059c3be6b6f9b86992f2e64295941b18c26093fb7b2a6e44f927e93ba92a9eff', '[\"*\"]', NULL, NULL, '2025-10-17 07:11:57', '2025-10-17 07:11:57'),
(49, 'App\\Models\\User', 1, 'api-token', 'a1d0a9d594c1b77b70b3d0529770247faed0903ab23284c442262de9d8cdbd56', '[\"*\"]', NULL, NULL, '2025-10-17 07:13:56', '2025-10-17 07:13:56'),
(50, 'App\\Models\\User', 1, 'api-token', '72613a265eedd974505cbe97ce424f6ee8eb679e0791ecfa5a00fd6aa683f871', '[\"*\"]', NULL, NULL, '2025-10-17 07:14:15', '2025-10-17 07:14:15'),
(51, 'App\\Models\\User', 1, 'api-token', '2354332f290ce638f99c6b7ec1c96691e26f2dbf4ba55df3ee376f9973d2bcaa', '[\"*\"]', NULL, NULL, '2025-10-17 07:29:42', '2025-10-17 07:29:42'),
(52, 'App\\Models\\User', 1, 'api-token', '7f1f49d1688519086b49d562075d2a0e8e97c6e093a9b94d1c79931b8891956c', '[\"*\"]', NULL, NULL, '2025-10-17 07:30:11', '2025-10-17 07:30:11'),
(53, 'App\\Models\\User', 1, 'api-token', '7a3fabd7eb8c812be5b64d878e73e93dc67dcea208aa4b84943fdd5de3da4bf2', '[\"*\"]', NULL, NULL, '2025-10-17 07:46:33', '2025-10-17 07:46:33'),
(54, 'App\\Models\\User', 1, 'api-token', '53a87db490b9438830cb1143228478ccc815bf0d92640c4b6432cd079f48283c', '[\"*\"]', NULL, NULL, '2025-10-17 23:47:10', '2025-10-17 23:47:10'),
(55, 'App\\Models\\User', 1, 'api-token', '0251ee1173826ad6e9861b2a42bcd0d7ea8e97609ecb1c4715372992b15e6a7b', '[\"*\"]', NULL, NULL, '2025-10-18 00:27:49', '2025-10-18 00:27:49'),
(56, 'App\\Models\\User', 1, 'api-token', '718e965cb5e0ccd808553ab0230a5c1a0fba58fc76e5fd0838ed7da9eca14897', '[\"*\"]', NULL, NULL, '2025-10-18 00:31:49', '2025-10-18 00:31:49'),
(57, 'App\\Models\\User', 1, 'api-token', '6cfe62b4a020e93fb0de183a503e901ee79d30ed6a1733c65e3c724f4ae192b1', '[\"*\"]', NULL, NULL, '2025-10-18 00:39:30', '2025-10-18 00:39:30'),
(58, 'App\\Models\\User', 1, 'api-token', '59c17fde04d647f3f32ec6896499ad068d66b3d9bd17841df135ebff27ea99a5', '[\"*\"]', NULL, NULL, '2025-10-18 00:39:47', '2025-10-18 00:39:47'),
(59, 'App\\Models\\User', 1, 'api-token', '8a52b51d97626606c94fa35c8368988276edf4466a87fbb66c36d4725aae9d2d', '[\"*\"]', NULL, NULL, '2025-10-18 00:48:12', '2025-10-18 00:48:12'),
(60, 'App\\Models\\User', 1, 'api-token', '3218c4f0aa6032b6e942d916c9861968f7e28a2ec7b8ff16ded7f7211b4c95cc', '[\"*\"]', NULL, NULL, '2025-10-18 00:49:36', '2025-10-18 00:49:36'),
(61, 'App\\Models\\User', 1, 'api-token', 'c650717127560c9e397f125f0e012970a5eb0600b79f83c04ca087b4c8f047bb', '[\"*\"]', NULL, NULL, '2025-10-18 01:01:35', '2025-10-18 01:01:35'),
(62, 'App\\Models\\User', 1, 'api-token', '3ee702a444b7089e2fa05df0f34b0f427f0d7074c2dbcfd9ab461ae377511b30', '[\"*\"]', NULL, NULL, '2025-10-18 01:01:49', '2025-10-18 01:01:49'),
(63, 'App\\Models\\User', 1, 'api-token', '9dbdd7fa6f5ab5b618d8ded2e3eb30177b98b18f24d7a3df9645090aea7be6e5', '[\"*\"]', NULL, NULL, '2025-10-18 01:03:13', '2025-10-18 01:03:13'),
(64, 'App\\Models\\User', 1, 'api-token', '86342e7566c60c771a4e53d9a5bfa01ab280d6cff165faf9e4ac744623eb2b52', '[\"*\"]', NULL, NULL, '2025-10-18 01:03:25', '2025-10-18 01:03:25'),
(65, 'App\\Models\\User', 1, 'api-token', '541a8cc4b297fbec63b33b885e6c7ef794bfa288fbdfc825acb90bdb58e820d5', '[\"*\"]', NULL, NULL, '2025-10-18 01:37:08', '2025-10-18 01:37:08'),
(66, 'App\\Models\\User', 1, 'api-token', 'da5aea5062730ab09706394823a7374637370aee3a62f14cde35b4c0f6ea48dc', '[\"*\"]', NULL, NULL, '2025-10-18 01:38:40', '2025-10-18 01:38:40'),
(67, 'App\\Models\\User', 1, 'api-token', 'eb7c11fec1ecb659e7f36eaf3a449ecbfe4930957af93b25baaf379451b59ca5', '[\"*\"]', NULL, NULL, '2025-10-18 01:41:13', '2025-10-18 01:41:13'),
(68, 'App\\Models\\User', 1, 'api-token', 'e9e24a8771e3fccf8ee658fe21f29d7e2136515831b4422e5c673a71172ba084', '[\"*\"]', NULL, NULL, '2025-10-18 01:42:09', '2025-10-18 01:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `possessions`
--

CREATE TABLE `possessions` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` bigint(20) UNSIGNED NOT NULL,
  `rera_no` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Residentials', 'active', '2025-11-06 17:13:34', '2025-11-06 17:13:45', '2025-11-06 10:13:34'),
(2, 'Comercial', 'inactive', '2025-11-06 17:14:16', '2025-11-06 17:16:14', '2025-11-06 10:14:16'),
(4, 'Ploting', 'active', '2025-11-06 17:15:47', '2025-11-06 17:15:47', '2025-11-06 10:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_tag` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role_tag`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', 'active', '2024-11-18 07:52:40', '2025-11-17 06:52:41', NULL),
(2, 'Client', 'client', 'active', '2024-11-18 07:52:50', '2024-11-18 07:52:50', NULL),
(3, 'User', 'user', 'active', '2024-11-18 07:53:23', '2024-11-18 07:53:23', NULL),
(4, 'Sales', 'sales', 'active', '2024-11-18 07:54:22', '2025-10-28 06:49:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('e2WcsQCBvVAyo3f2CTZIfmmfTdkUCeTVhTWGkSQ3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ3Jqb0VpQTdvUjlGQlJwQjVudkFnQnltZjZ1VGI4YWlaRUc3YnZ4biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdWJzY3JpcHRpb25zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1760510069);

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_dispositions`
--

CREATE TABLE `sub_dispositions` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `disposition_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_features`
--

CREATE TABLE `sub_features` (
  `id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive','deleted') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `route_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `menu_id`, `name`, `route_name`, `status`, `created_at`, `updated_at`) VALUES
(6, 4, 'Client', 'client', 'active', '2024-11-18 08:08:52', '2024-11-18 08:08:52'),
(9, 3, 'Subscription', 'master.subscription', 'active', '2024-11-19 04:39:51', '2024-11-19 04:39:51'),
(10, 3, 'User Limit', 'master.user.limit', 'active', '2024-11-19 04:39:51', '2024-11-19 04:39:51');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sources`
--

CREATE TABLE `sub_sources` (
  `id` int(11) NOT NULL,
  `client_id` bigint(11) UNSIGNED NOT NULL,
  `source_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `alt_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `project_type_id` int(11) DEFAULT NULL,
  `login_id` varchar(255) DEFAULT NULL,
  `remember_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `client_id`, `name`, `phone`, `alt_phone`, `email`, `company_name`, `company_logo`, `photo`, `address`, `project_type_id`, `login_id`, `remember_password`, `password`, `status`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Shamshera', '8454892110', NULL, 'alams0466@gmail.com', 'Abstract', NULL, NULL, NULL, NULL, 'admin', 'qwerty123', '$2y$12$T/gp64JLk1Q0WAUcXueHj.NVeMPDBHd39q82nofUTVwWcBXk6qM0m', 'active', 1, NULL, '2024-11-18 07:55:00', '2024-11-18 07:56:41'),
(3, NULL, 'Vikas kakwani', '9879879872', NULL, 'aas@vidyalaya.org.in', 'Aas Vidyalaya', '673b4cfc8b6f7_AAS-logo.png', NULL, 'mumbai', NULL, 'aasvidyalaya', 'qwerty123', '$2y$12$jT6FBBjGHcHLST50iWbLvO1L/WXUdoPx2ZgKXAo3fo/auEpzoJQ8i', 'active', 2, NULL, '2024-11-18 08:49:40', '2025-11-14 07:45:26'),
(4, NULL, 'saifs', '9876543210', NULL, 'saif@gmail.com', NULL, NULL, NULL, 'mumbai', NULL, NULL, 'qwerty123', '$2y$12$rg/lrQnPV2Ml1y41twATou/8ZSYQc9DBtktSO8pUAyLrikucH6F22', 'active', 3, NULL, '2025-11-04 12:21:08', '2025-11-04 12:42:26'),
(5, NULL, 'Shamsher Shaikh', '9819780340', NULL, 'yogeshpawar2402@gmail.com', 'soft IT', '691825bc891da_box (1).png', NULL, 'mumbai', 1, 'ADW0001', 'qwerty123', '$2y$12$qw4EeZ/ROuAYNMZbzvtJlOhV9p.EZYc4os9s/6.3dw.FmYIoZVUiC', 'active', 2, NULL, '2025-11-13 20:30:27', '2025-11-17 00:37:54'),
(7, NULL, 'Almas', '3216549870', NULL, 'tech@aasvidyalaya.com', 'Abstract digital world', '691abdae53416_adwlogoone.png', NULL, 'mumbai', 2, 'ADW765', 'Qwerty@123', '$2y$12$uViDPV94y6vXSa.jw048ZOhpiFF5.4IwOxMxeqkIO2HlhXfdC5a4e', 'active', 2, NULL, '2025-11-17 00:46:14', '2025-11-17 00:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_plan`
--

CREATE TABLE `user_plan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` text DEFAULT NULL,
  `no_months` int(11) DEFAULT NULL,
  `no_days` int(11) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_plan`
--

INSERT INTO `user_plan` (`id`, `name`, `price`, `no_months`, `no_days`, `status`, `created_at`, `updated_at`) VALUES
(5, '5', '5000', 12, NULL, 'active', '2024-11-18 08:12:17', '2024-11-18 08:12:17'),
(6, '10', '9000', 22, NULL, 'active', '2024-11-19 04:35:21', '2024-11-19 04:35:21'),
(7, '15', '13000', NULL, NULL, 'active', '2025-11-03 15:27:04', '2025-11-03 15:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `channel_partners`
--
ALTER TABLE `channel_partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispositions`
--
ALTER TABLE `dispositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_type`
--
ALTER TABLE `lead_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_role_id_foreign` (`role_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_subscription_id_foreign` (`user_plan_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `sub_dispositions`
--
ALTER TABLE `sub_dispositions`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `disposition_id` (`disposition_id`);

--
-- Indexes for table `sub_features`
--
ALTER TABLE `sub_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menus_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `sub_sources`
--
ALTER TABLE `sub_sources`
  ADD KEY `source_id` (`source_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_alt_phone_unique` (`alt_phone`),
  ADD KEY `users_client_id_foreign` (`client_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_ons`
--
ALTER TABLE `add_ons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `channel_partners`
--
ALTER TABLE `channel_partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dispositions`
--
ALTER TABLE `dispositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lead_type`
--
ALTER TABLE `lead_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_type`
--
ALTER TABLE `project_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_features`
--
ALTER TABLE `sub_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD CONSTRAINT `campaigns_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `campaigns_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `channel_partners`
--
ALTER TABLE `channel_partners`
  ADD CONSTRAINT `channel_partners_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `channel_partners_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lead_type`
--
ALTER TABLE `lead_type`
  ADD CONSTRAINT `lead_type_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_subscription_id_foreign` FOREIGN KEY (`user_plan_id`) REFERENCES `user_plan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sources`
--
ALTER TABLE `sources`
  ADD CONSTRAINT `sources_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_dispositions`
--
ALTER TABLE `sub_dispositions`
  ADD CONSTRAINT `sub_dispositions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sub_dispositions_ibfk_2` FOREIGN KEY (`disposition_id`) REFERENCES `dispositions` (`id`);

--
-- Constraints for table `sub_features`
--
ALTER TABLE `sub_features`
  ADD CONSTRAINT `sub_features_ibfk_1` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_sources`
--
ALTER TABLE `sub_sources`
  ADD CONSTRAINT `sub_sources_ibfk_1` FOREIGN KEY (`source_id`) REFERENCES `sources` (`id`),
  ADD CONSTRAINT `sub_sources_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
