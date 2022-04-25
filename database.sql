-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2022 at 02:47 PM
-- Server version: 10.1.40-MariaDB-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthrt_edialogue_systems`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2022_02_07_153018_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `user_id` int(11) NOT NULL,
  `event` varchar(250) DEFAULT NULL,
  `notify_to` varchar(500) NOT NULL,
  `read_by` varchar(500) DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `description`, `user_id`, `event`, `notify_to`, `read_by`, `created_by`, `created_at`) VALUES
(1, 'طلب صلاحية الوصول الى  نظام شؤون الموظفين', NULL, 39, 'active_hr', '1', '0,1', 39, '2022-03-10 20:03:30'),
(2, 'System access request Task Managment', NULL, 39, 'active_task', '1', '0', 39, '2022-03-10 20:24:22'),
(3, 'System access request Smart Tickets', NULL, 39, 'active_ticket', '1', '0,1', 39, '2022-03-10 20:24:31'),
(4, 'طلب صلاحية الوصول الى  نظام التذاكر', NULL, 23, 'active_ticket', '1', '0,1', 23, '2022-03-13 06:21:42'),
(5, 'طلب صلاحية الوصول الى  النظام المالي ', NULL, 41, 'active_erp', '1', '0,1', 41, '2022-04-11 17:13:23'),
(6, 'طلب صلاحية الوصول الى  النظام المالي ', NULL, 41, 'active_erp', '1', '0', 41, '2022-04-11 18:09:38'),
(7, 'طلب صلاحية الوصول الى  نظام شؤون الموظفين', NULL, 41, 'active_hr', '1', '0', 41, '2022-04-11 20:04:10'),
(8, 'طلب صلاحية الوصول الى  نظام المهام', NULL, 41, 'active_task', '1', '0,1', 41, '2022-04-11 22:17:55'),
(9, 'طلب صلاحية الوصول الى  نظام التذاكر', NULL, 41, 'active_ticket', '1', '0', 41, '2022-04-11 22:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arafat.733011506@gmail.com', '$2y$10$UM.VtGvJnTmWZRZtjkgoMOsJF422q2xLKh9HUcmRNYDc4tuYyOHru', '2022-02-16 18:55:51'),
('h.shaban@edialoguec.com', '$2y$10$zLuoCOI2GjcmxY4YVms98eR.m447iJKus5FRzt7sFDEGo3JrDb8gy', '2022-04-12 04:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GFZHianmlrIW8kXzi4b9gpWMq4O8Xex8sXq03ONp', 1, '93.169.24.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUmZKYWpUR0c1WHhDMlBVZHo5QWtQM1d5OFZINjl6eHJ4UERnWVRvUCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwczovL2VkaWFsb2d1ZS5zbWFydC1oci50b3AvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJHBPc0tRenFORGp3UHhkLkMwOE5zNS5peldBQ3YydTUyaUMxZDBRak1WU1hXejQ5ajhTZ3oyIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRwT3NLUXpxTkRqd1B4ZC5DMDhOczUuaXpXQUN2MnU1MmlDMWQwUWpNVlNYV3o0OWo4U2d6MiI7fQ==', 1650905647);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `hr_user_id` int(11) DEFAULT NULL,
  `task_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `hr_user_id`, `task_user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'system\'s Team', 1, NULL, NULL, '2022-02-07 12:44:45', '2022-02-07 12:44:45'),
(2, 1, 'Arafat Mutahar Mohammed Sharaf Thabet', 0, NULL, NULL, '2022-02-07 13:23:51', '2022-02-07 13:23:51'),
(3, 2, 'Arafat\'s Team', 1, NULL, NULL, '2022-02-13 19:12:53', '2022-02-13 19:12:53'),
(4, 3, 'Giselle\'s Team', 1, NULL, NULL, '2022-02-14 20:21:12', '2022-02-14 20:21:12'),
(5, 4, 'Dylan\'s Team', 1, NULL, NULL, '2022-02-15 15:29:20', '2022-02-15 15:29:20'),
(6, 5, 'Lucius\'s Team', 1, NULL, NULL, '2022-02-15 16:35:47', '2022-02-15 16:35:47'),
(7, 6, 'Amira\'s Team', 1, NULL, NULL, '2022-02-16 20:28:39', '2022-02-16 20:28:39'),
(8, 7, 'Client_a123\'s Team', 1, NULL, NULL, '2022-02-17 14:56:02', '2022-02-17 14:56:02'),
(9, 8, 'Kalia\'s Team', 1, NULL, NULL, '2022-02-17 16:26:00', '2022-02-17 16:26:00'),
(10, 9, 'leena\'s Team', 1, NULL, NULL, '2022-02-19 06:31:00', '2022-02-19 06:31:00'),
(11, 10, 'ahmed\'s Team', 1, NULL, NULL, '2022-02-19 06:38:17', '2022-02-19 06:38:17'),
(12, 11, 'Ira\'s Team', 1, NULL, NULL, '2022-02-19 12:47:30', '2022-02-19 12:47:30'),
(13, 12, 'Cruz\'s Team', 1, NULL, NULL, '2022-02-19 12:59:45', '2022-02-19 12:59:45'),
(14, 13, 'Kasper\'s Team', 1, NULL, NULL, '2022-02-20 12:48:11', '2022-02-20 12:48:11'),
(15, 14, 'Grant\'s Team', 1, NULL, NULL, '2022-02-20 14:00:35', '2022-02-20 14:00:35'),
(16, 15, 'Amity\'s Team', 1, NULL, NULL, '2022-02-20 14:06:39', '2022-02-20 14:06:39'),
(17, 16, 'Simon\'s Team', 1, NULL, NULL, '2022-02-20 14:10:29', '2022-02-20 14:10:29'),
(18, 38, 'bijise\'s Team', 1, NULL, NULL, '2022-03-10 15:21:27', '2022-03-10 15:21:27'),
(19, 39, 'Amira\'s Team', 1, NULL, NULL, '2022-03-10 19:02:53', '2022-03-10 19:02:53'),
(20, 40, 'محمد\'s Team', 1, NULL, NULL, '2022-03-21 08:58:57', '2022-03-21 08:58:57'),
(21, 41, 'حسين\'s Team', 1, NULL, NULL, '2022-04-11 15:07:28', '2022-04-11 15:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hr_user_id` int(11) DEFAULT NULL,
  `task_user_id` int(11) DEFAULT NULL,
  `erp_user_id` int(11) DEFAULT NULL,
  `ticket_user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT '2',
  `google_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'ar',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `hr_user_id`, `task_user_id`, `erp_user_id`, `ticket_user_id`, `role_id`, `google_id`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'الادمن', 'admin@admin.com', NULL, '$2y$10$pOsKQzqNDjwPxd.C08Ns5.izWACv2u52iC1d0QjMVSXWz49j8Sgz2', NULL, NULL, 'CDTafuyZ6LhmzPYEAIKSwxSYzcIRnzJpqrHM4z2Um3LuwVNZhOvCIWK6aHPX', 2, NULL, 39, 35, 1, 1, 1, NULL, 'ar', '2022-02-07 12:44:45', '2022-03-10 20:39:33'),
(2, 'مصعب خالد عبدالعزيز الهدلق', 'malhadlaq@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-02-21 12:56:59'),
(3, 'عبدالعزيز عبدالرحمن آل فريان', 'Aalfrayan@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(4, 'علي بن محمد الشهري', 'ali.2.ali@hotmail.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(5, 'سامي رفاعي', 'sami@edialogue.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(6, 'يوسف جعفر شيخ ادريس​', 'Yousuf@newmuslimacademy.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(7, 'نوره بنت سمير حمد الرشيد', 'n.alrasheed@islamvolunteers.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(8, 'عدنان علي حمد الثقفي', 'a.thaqafi@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-02 14:11:48'),
(9, 'أحمد عمر سعيد آل مديحج', 'ahmed@edialogue.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-03 14:31:23'),
(10, 'حمد صالح الوابل', 'i@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-10 15:17:52'),
(11, 'عمار عبدالله احمد الروحاني', 'ammar@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(12, 'محمد خالد نجم البحري', 'PR@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(13, 'ياقوت حسن ياقوت محمد', 'yalyaqoot@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(14, 'محمد ناصر عبدالعزيز الشارخ', 'm.alsharekh@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(15, 'سميه فهد عبدالرزاق الهندي', 'hr@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(16, 'أنور محمد علي العميسي', 'a.omaesi@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(17, 'جواهر محمد هزاع العامري', 'm.alshamrani@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(18, 'أحمد عماد الدين عبدالخالق محمود', 'a.ajjaj@edialoguec.com', NULL, '$2y$10$xI7JCNOGjrhN3C5I.nlGpeJ4AKorA9Rb3PfBL7gkjcBx6H9d7BXXO', NULL, NULL, 'ZKnidRFyLdSHGUq0TuNRkId46QI4M507db1qR59iZi0WkAUx0B8VbEx2Bt7F', NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-09 09:42:21'),
(19, 'أحمد محمد ناصر القريحي', 'a.alquraihi@edialogue.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(20, 'منال سليمان دريس الزامل', 'M.zamel@edialoguec.com', NULL, '$2y$10$QrkFRPhixCyBvaHjQ75lm.8tDOGAuu.rcHfsMK3hD02UvVZGyDCDC', NULL, NULL, 'RgumWQVogcA4lCjDQR800OIR1BVWZJCVSkhIcCFyzJ8NX5SWwc9P1relAY0v', NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-11 07:35:33'),
(21, 'أمل أحمد غرم الله الحمراني', 'a.hamrani@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(22, 'أروى أحمد  صالح السديس', 'a.sudais@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(23, 'عبدالرحمن مصطفى أحمد عطيه', 'a.ateiah@edialogue.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(24, 'سميا سعود محمد السويلم', 's.alswailem@edialogue.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(25, 'نبيلة رشيد أحمد محمد إسماعيل', 'n.ismail@mopacademy.org', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(26, 'دعاء نواف ضامن سليمان', 'preteyflowers2000@hotmail.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(27, 'مروان محمد سالم الشبحي', 'm.yafei@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(28, 'عفاف بنت سعد العتيبي', 'a.alotaibi@edialoguec.com', NULL, '$2y$10$zuhu4c1MTdw56M8WzUQlx.EAWoKRie4YBssbcE3lts7VTFxW5UdvS', NULL, NULL, 'yo1iXdKDa6NwxPIzK5Mk46H0Bx6AYmMPpnuCat1d1W2BDFUxdZQ5cNSvYB1K', NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-02 09:47:51'),
(29, 'سامي محمد العتيبي', 's.otaibi@edialoguec.com', NULL, '$2y$10$nPLHunNWLFyTkGhHZ20NouaozVlOaNUeJ9k0TwV0og8FNd.L3Uy3G', NULL, NULL, 'k2dAXL53yl2nic11KPgZerTbAJuSfj5GnQqHikgEtiOezZs2ToE4MjMq7fq3', NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-21 08:59:27'),
(31, 'مشاعل بنت محمد العتيبي', 'm.otaibi@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(32, 'لينا بنت محمد الحربي', 'l.harbi@edialoguec.com', NULL, '$2y$10$lkWdolvfLIC94J6t4vuwseUWXgsmf.ojD3vhP6S9pYzqPkpxfgM2i', NULL, NULL, 'cRAbcnh0qOMAv7DWWmwg1wg2gIl4Tq5x6gYRFN7Ttq2zbF23TXhhGQOInabx', NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-02-23 16:11:40'),
(33, 'محمد يوسف مساعد التيسان', 'mohammed.tisan@gmail.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(34, 'خالد إبراهيم ناجي الصبحي', 'K.alsobhi@edialoguec.com', NULL, '$2y$10$bp7HXmPBx.PeziGhMD2xGufpYI5ArF8E9lhOnQj.OoKJbTBg/u3IC', NULL, NULL, 'MAjH3MPuZKPUdOUdW9c58nyRgieKtoiufXEeh0RGYmXAzuyEuCuRDHOvF7TV', NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, '2022-03-30 04:39:33'),
(35, 'ميثاق عبدالله علي السلطان', 'M.Alsultan@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(36, 'أحمد ناصر محمد البرادي', 'A.Albradi@edialoguec.com', NULL, '$2y$10$Yw1jEGMboNHsfuAuEKA0m.ZY7H6sLHnssCngbUM64/vZfuS7EqJZe', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', NULL, NULL),
(40, 'محمد بن عبدالله التميمي', 'm.tamimi@edialoguec.com', NULL, '$2y$10$V7OfavIeaHYUL2qeOarw8ezWFNrZ59KiR31A.fpc6KclUpwAEAEIq', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', '2022-03-21 08:58:57', '2022-03-21 08:58:57'),
(41, 'حسين شعبان حماد أحمد', 'h.shaban@edialoguec.com', NULL, '$2y$10$U/l/ZxrdNPP8WGNYbHHQD.7cIw.R.04glZpxZXtPyno.omCVa2L42', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 2, NULL, 'ar', '2022-04-11 15:07:28', '2022-04-11 15:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
