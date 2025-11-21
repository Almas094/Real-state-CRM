-- Adminer 4.8.1 MySQL 8.0.40-0ubuntu0.24.10.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `have_submenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting_index` int NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_role_id_foreign` (`role_id`),
  CONSTRAINT `menus_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `menus` (`id`, `role_id`, `name`, `have_submenu`, `route_name`, `icon_class_name`, `sorting_index`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	'Dashboard',	'No',	'dashboard',	'#custom-status-up',	1,	'active',	'2024-11-18 13:29:19',	'2024-11-22 05:57:37'),
(2,	1,	'Permission',	'No',	'permission.menu',	'#custom-shield',	4,	'active',	'2024-11-18 13:31:05',	'2024-11-18 13:38:59'),
(3,	1,	'Master',	'Yes',	NULL,	'#custom-text-align-justify-center',	2,	'active',	'2024-11-18 13:35:26',	'2024-11-18 13:38:44'),
(4,	1,	'Client Management',	'Yes',	NULL,	'#custom-fatrows',	3,	'active',	'2024-11-18 13:38:03',	'2024-11-18 13:38:52');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2024_10_11_000000_create_roles_table',	1),
(2,	'2014_10_12_000000_create_users_table',	2),
(3,	'2014_10_12_100000_create_password_reset_tokens_table',	2),
(4,	'2019_08_19_000000_create_failed_jobs_table',	2),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	2),
(6,	'2024_11_10_135550_create_menus_table',	3),
(7,	'2024_11_10_140124_create_sub_menus_table',	3),
(8,	'2024_11_13_112052_create_user_limits_table',	3),
(9,	'2024_11_13_170252_create_subscriptions_table',	3),
(10,	'2024_11_14_095748_create_orders_table',	3);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `subscription_id` bigint unsigned DEFAULT NULL,
  `start_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_subscription_id_foreign` (`subscription_id`),
  CONSTRAINT `orders_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `role_tag`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'admin',	'active',	'2024-11-18 13:22:40',	'2024-11-18 13:22:40'),
(2,	'Client',	'client',	'active',	'2024-11-18 13:22:50',	'2024-11-18 13:22:50'),
(3,	'Manager',	'manager',	'active',	'2024-11-18 13:23:23',	'2024-11-18 13:23:23'),
(4,	'Sales',	'sales',	'active',	'2024-11-18 13:24:22',	'2024-11-18 13:24:22');

DROP TABLE IF EXISTS `sub_menus`;
CREATE TABLE `sub_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_menus_menu_id_foreign` (`menu_id`),
  CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sub_menus` (`id`, `menu_id`, `name`, `route_name`, `status`, `created_at`, `updated_at`) VALUES
(6,	4,	'Client',	'client',	'active',	'2024-11-18 13:38:52',	'2024-11-18 13:38:52'),
(9,	3,	'Subscription',	'master.subscription',	'active',	'2024-11-19 10:09:51',	'2024-11-19 10:09:51'),
(10,	3,	'User Limit',	'master.user.limit',	'active',	'2024-11-19 10:09:51',	'2024-11-19 10:09:51');

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_months` int DEFAULT NULL,
  `no_days` int DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `subscriptions` (`id`, `name`, `no_months`, `no_days`, `status`, `created_at`, `updated_at`) VALUES
(1,	'7 Day Free Trial',	NULL,	7,	'active',	'2024-11-18 13:41:31',	'2024-11-22 10:03:05'),
(2,	'1 Month Plan',	1,	NULL,	'active',	'2024-11-18 13:41:44',	'2024-11-19 10:21:17'),
(3,	'3 Months Plan',	3,	NULL,	'active',	'2024-11-18 13:41:54',	'2024-11-18 13:41:54'),
(4,	'6 Months Plan',	6,	NULL,	'active',	'2024-11-18 13:42:05',	'2024-11-18 13:42:05'),
(5,	'Annual Plan',	12,	NULL,	'active',	'2024-11-18 13:42:17',	'2024-11-18 13:42:17'),
(6,	'22 Months',	22,	NULL,	'active',	'2024-11-19 10:05:21',	'2024-11-19 10:05:21');

DROP TABLE IF EXISTS `user_limits`;
CREATE TABLE `user_limits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `limit_number` int NOT NULL,
  `status` enum('active','inactive','delete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user_limits` (`id`, `limit_number`, `status`, `created_at`, `updated_at`) VALUES
(1,	3,	'active',	'2024-11-18 13:42:35',	'2024-11-18 13:42:35'),
(2,	4,	'active',	'2024-11-18 13:42:40',	'2024-11-18 13:42:40'),
(3,	10,	'delete',	'2024-11-18 13:42:47',	'2024-12-02 10:08:22'),
(4,	50,	'active',	'2024-11-19 10:06:04',	'2024-11-19 10:06:04');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `role_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_alt_phone_unique` (`alt_phone`),
  KEY `users_client_id_foreign` (`client_id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `client_id`, `name`, `phone`, `alt_phone`, `email`, `company_name`, `company_logo`, `login_id`, `remember_password`, `password`, `status`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	NULL,	'Shamshera',	'8454892110',	NULL,	'alams0466@gmail.com',	'Abstract',	NULL,	'admin',	'qwerty123',	'$2y$12$T/gp64JLk1Q0WAUcXueHj.NVeMPDBHd39q82nofUTVwWcBXk6qM0m',	'active',	1,	NULL,	'2024-11-18 13:25:00',	'2024-11-18 13:26:41'),
(3,	NULL,	'Vikas kakwani',	'9879879872',	NULL,	'aas@vidyalaya.org.in',	'Aas Vidyalaya',	'673b4cfc8b6f7_AAS-logo.png',	'aasvidyalaya',	'qwerty123',	'$2y$12$jT6FBBjGHcHLST50iWbLvO1L/WXUdoPx2ZgKXAo3fo/auEpzoJQ8i',	'active',	2,	NULL,	'2024-11-18 14:19:40',	'2024-11-18 14:19:40');

-- 2025-01-10 12:27:48
