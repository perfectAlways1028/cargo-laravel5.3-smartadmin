-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2017 at 06:47 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roopcom_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permalink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `screetkey` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-03-06 22:08:00', NULL),
(2, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-07-06 02:33:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `created_at`, `updated_at`, `ipaddress`, `useragent`, `url`, `description`, `id_cms_users`) VALUES
(879, '2017-07-05 18:55:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Viraj@roopcom.com login with IP Address ::1', 4),
(880, '2017-07-05 18:55:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Viraj@roopcom.com logout', 4),
(881, '2017-07-05 18:55:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(882, '2017-07-05 18:56:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(883, '2017-07-05 18:56:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(884, '2017-07-05 19:19:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(885, '2017-07-05 19:19:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(886, '2017-07-05 19:23:34', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages/add', 'Try add data at Packages', 1),
(887, '2017-07-05 19:23:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages/add', 'Try add data at Packages', 1),
(888, '2017-07-05 19:24:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages19/add', 'Try add data at packages', 1),
(889, '2017-07-06 01:21:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(890, '2017-07-06 01:22:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(891, '2017-07-06 01:23:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(892, '2017-07-06 01:24:01', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(893, '2017-07-06 01:24:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(894, '2017-07-06 01:24:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(895, '2017-07-06 01:24:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/module_generator/delete/19', 'Delete data packages at Module Generator', 1),
(896, '2017-07-06 01:30:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages/add', 'Try add data at Packages', 1),
(897, '2017-07-06 01:30:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(898, '2017-07-06 01:31:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(899, '2017-07-06 01:31:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(900, '2017-07-06 01:31:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(901, '2017-07-06 01:31:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages/add', 'Try add data at Packages', 1),
(902, '2017-07-06 01:31:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages/add', 'Try add data at Packages', 1),
(903, '2017-07-06 01:58:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/roopcom_cms_packages/add', 'Try add data at Packages', 1),
(904, '2017-07-06 02:12:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(905, '2017-07-06 02:12:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(906, '2017-07-06 02:12:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(907, '2017-07-06 02:12:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(908, '2017-07-06 02:15:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(909, '2017-07-06 02:15:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(910, '2017-07-06 02:16:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(911, '2017-07-06 02:16:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(912, '2017-07-06 02:20:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/menu_management/edit-save/40', 'Update data Beheren at Menu Management', 1),
(913, '2017-07-06 02:20:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/menu_management/edit-save/14', 'Update data Add New Packages at Menu Management', 1),
(914, '2017-07-06 02:21:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(915, '2017-07-06 02:21:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(916, '2017-07-06 02:21:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(917, '2017-07-06 02:21:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(918, '2017-07-06 02:38:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Roopramvijay@gmail.com logout', 8),
(919, '2017-07-06 02:39:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'droopram@gmail.com login with IP Address ::1', 1),
(920, '2017-07-06 05:05:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'droopram@gmail.com logout', 1),
(921, '2017-07-06 05:05:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Viraj@roopcom.com login with IP Address ::1', 4),
(922, '2017-07-06 05:05:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/logout', 'Viraj@roopcom.com logout', 4),
(923, '2017-07-06 05:06:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/login', 'Roopramvijay@gmail.com login with IP Address ::1', 8),
(924, '2017-07-06 08:39:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/shipments/delete/5', 'Delete data 5 at Shipments', 8),
(925, '2017-07-06 08:39:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'http://localhost:88/admin/shipments/delete/4', 'Delete data 4 at Shipments', 8);

-- --------------------------------------------------------

--
-- Table structure for table `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Products', 'URL External', '#', NULL, 'fa fa-shopping-cart', 0, 1, 0, 1, 1, '2017-03-06 22:09:11', NULL),
(2, 'Add New Products', 'Route', 'AdminProductsControllerGetAdd', NULL, 'fa fa-plus', 1, 1, 0, 1, 1, '2017-03-06 22:09:11', NULL),
(3, 'List Products', 'Route', 'AdminProductsControllerGetIndex', NULL, 'fa fa-bars', 1, 1, 0, 1, 2, '2017-03-06 22:09:11', NULL),
(4, 'Giftcards', 'URL External', '#', NULL, 'fa fa-credit-card', 0, 1, 0, 1, 2, '2017-03-06 22:20:04', NULL),
(5, 'Add New Giftcards', 'Route', 'AdminGiftcardsControllerGetAdd', NULL, 'fa fa-plus', 4, 1, 0, 1, 1, '2017-03-06 22:20:04', NULL),
(6, 'List Giftcards', 'Route', 'AdminGiftcardsControllerGetIndex', NULL, 'fa fa-bars', 4, 1, 0, 1, 2, '2017-03-06 22:20:04', NULL),
(7, 'Warehouses', 'URL External', '#', NULL, 'fa fa-building', 0, 1, 0, 1, 3, '2017-03-06 22:28:00', NULL),
(8, 'Add New Warehouses', 'Route', 'AdminWarehousesControllerGetAdd', NULL, 'fa fa-plus', 7, 1, 0, 1, 1, '2017-03-06 22:28:00', NULL),
(9, 'List Warehouses', 'Route', 'AdminWarehousesControllerGetIndex', NULL, 'fa fa-bars', 7, 1, 0, 1, 2, '2017-03-06 22:28:00', NULL),
(10, 'Customers', 'URL External', '#', NULL, 'fa fa-users', 0, 1, 0, 1, 4, '2017-03-06 23:03:45', NULL),
(11, 'Add New Customers', 'Route', 'AdminRoopcomNewCustomersControllerGetAdd', NULL, 'fa fa-plus', 10, 1, 0, 1, 1, '2017-03-06 23:03:45', NULL),
(12, 'List Customers', 'Route', 'AdminRoopcomNewCustomersControllerGetIndex', NULL, 'fa fa-bars', 10, 1, 0, 1, 2, '2017-03-06 23:03:45', NULL),
(13, 'Packages', 'URL External', '#', NULL, 'fa fa-archive', 0, 1, 0, 1, 5, '2017-03-06 23:06:50', NULL),
(14, 'Add New Packages', 'Route', 'AdminPackagesControllerGetAdd', 'normal', 'fa fa-th-list', 13, 1, 0, 1, 1, '2017-03-06 23:06:50', '2017-07-06 02:20:48'),
(15, 'List Packages', 'Route', 'AdminPackagesControllerGetIndex', NULL, 'fa fa-bars', 13, 1, 0, 1, 2, '2017-03-06 23:06:50', NULL),
(16, 'Orders', 'URL External', '#', NULL, 'fa fa-shopping-bag', 0, 1, 0, 1, 6, '2017-03-06 23:22:26', NULL),
(17, 'Add New Orders', 'Route', 'AdminOrdersControllerGetAdd', NULL, 'fa fa-plus', 16, 1, 0, 1, 1, '2017-03-06 23:22:26', NULL),
(18, 'List Orders', 'Route', 'AdminOrdersControllerGetIndex', NULL, 'fa fa-bars', 16, 1, 0, 1, 2, '2017-03-06 23:22:26', NULL),
(19, 'Instellingen', 'Route', 'admin-settings', 'normal', 'fa fa-cogs', 0, 1, 0, 2, 10, '2017-03-07 06:48:40', '2017-03-07 08:22:13'),
(20, 'Settings', 'URL External', '#', NULL, 'fa fa-cogs', 0, 1, 0, 1, 7, '2017-03-07 08:32:45', NULL),
(21, 'Producten', 'Module', 'products', 'normal', 'fa fa-shopping-cart', 0, 1, 0, 2, 4, '2017-03-07 08:51:16', NULL),
(22, 'Giftcards', 'Module', 'giftcards', 'normal', 'fa fa-credit-card-alt', 0, 1, 0, 2, 6, '2017-03-07 08:51:44', NULL),
(23, 'Bestellingen', 'Module', 'orders', 'normal', 'fa fa-shopping-bag', 0, 1, 0, 2, 5, '2017-03-07 08:52:08', NULL),
(24, 'Dashboard', 'Statistic', 'statistic_builder/show/dashboard', 'normal', 'fa fa-dashboard', 0, 1, 1, 2, 1, '2017-03-07 08:52:41', NULL),
(25, 'Medewerkers', 'Module', 'users', 'normal', 'fa fa-user', 0, 1, 0, 2, 8, '2017-03-07 08:54:10', NULL),
(26, 'Klanten', 'Module', 'roopcom_new_customers', 'normal', 'fa fa-users', 0, 1, 0, 2, 7, '2017-03-07 08:54:24', NULL),
(27, 'Magazijnlocaties', 'Module', 'warehouses', 'normal', 'fa fa-building', 0, 1, 0, 2, 9, '2017-03-07 08:54:54', NULL),
(28, 'Paketten', 'Module', 'packages', 'normal', 'fa fa-inbox', 0, 1, 0, 2, 2, '2017-03-07 08:55:19', NULL),
(29, 'Klanten', 'Module', 'roopcom_new_customers', 'normal', 'fa fa-users', 0, 1, 0, 3, 2, '2017-03-07 08:59:24', NULL),
(30, 'Shipments', 'URL External', '#', NULL, 'fa fa-ship', 0, 1, 0, 1, 8, '2017-03-07 09:00:44', NULL),
(31, 'Add New Shipments', 'Route', 'AdminShipmentsControllerGetAdd', NULL, 'fa fa-plus', 30, 1, 0, 1, 1, '2017-03-07 09:00:44', NULL),
(32, 'List Shipments', 'Route', 'AdminShipmentsControllerGetIndex', NULL, 'fa fa-bars', 30, 1, 0, 1, 2, '2017-03-07 09:00:44', NULL),
(33, 'Shipments', 'Module', 'shipments', 'normal', 'fa fa-ship', 0, 1, 0, 2, 3, '2017-03-07 09:08:42', NULL),
(34, 'Giftcards', 'Module', 'giftcards', 'normal', 'fa fa-credit-card-alt', 0, 1, 0, 3, 3, '2017-03-07 09:09:52', NULL),
(35, 'Shipments', 'Module', 'shipments', 'red', 'fa fa-ship', 0, 1, 1, 3, 1, '2017-03-07 09:10:14', NULL),
(39, 'Scannen', 'Route', 'admin-scan-packages', 'normal', 'fa fa-barcode', 28, 1, 0, 2, 1, '2017-03-07 11:50:32', '2017-03-07 12:54:35'),
(40, 'Beheren', 'Module', 'roopcom_cms_packages', 'normal', 'fa fa-th-list', 28, 1, 0, 2, 2, '2017-03-07 11:51:42', '2017-07-06 02:20:07'),
(41, 'Beheren', 'Module', 'shipments', 'normal', 'fa fa-th-list', 33, 1, 0, 2, 2, '2017-03-07 12:51:36', '2017-03-07 12:52:01'),
(42, 'Repack', 'Route', 'admin-repack', 'normal', 'fa fa-archive', 33, 1, 0, 2, 1, '2017-03-07 12:52:47', NULL),
(43, 'Scannen', 'Route', 'admin-scan-packages', 'normal', 'fa fa-barcode', 0, 1, 0, 4, 2, '2017-04-12 10:18:49', NULL),
(45, 'Repack', 'Route', 'admin-repack', 'normal', 'fa fa-archive', 0, 1, 0, 4, 3, '2017-04-12 10:21:17', NULL),
(51, 'Scannen', 'Route', 'admin-scan-packages', 'normal', 'fa fa-barcode', 0, 1, 1, 4, 1, '2017-04-24 12:33:04', '2017-04-24 12:33:25'),
(52, 'Bestellingen', 'Module', 'orders', 'normal', 'fa fa-shopping-cart', 0, 1, 0, 3, 4, '2017-04-24 13:08:20', NULL),
(53, 'Producten', 'Module', 'products', 'normal', 'fa fa-shopping-bag', 0, 1, 0, 3, 5, '2017-04-24 13:10:45', NULL),
(54, 'Bestellingen', 'Module', 'orders', 'normal', 'fa fa-shopping-cart', 0, 1, 1, 5, NULL, '2017-04-24 13:27:36', NULL),
(55, 'Klanten', 'Module', 'roopcom_new_customers', 'normal', 'fa fa-group', 0, 1, 0, 5, NULL, '2017-04-24 13:27:57', NULL),
(56, 'Giftcards', 'Module', 'giftcards', 'normal', 'fa fa-credit-card-alt', 0, 1, 0, 5, NULL, '2017-04-24 13:28:15', NULL),
(57, 'Bestellingen', 'Module', 'orders', 'normal', 'fa fa-shopping-cart', 0, 1, 0, 5, NULL, '2017-04-24 13:28:56', NULL),
(58, 'Producten', 'Module', 'products', 'normal', 'fa fa-shopping-bag', 0, 1, 0, 5, NULL, '2017-04-24 13:29:15', NULL),
(59, 'packages', 'URL External', '#', NULL, 'fa fa-archive', 0, 1, 0, 1, 11, '2017-07-05 19:22:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `created_at`, `updated_at`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`) VALUES
(1, '2017-03-06 22:08:00', NULL, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1),
(2, '2017-03-06 22:08:00', NULL, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1),
(3, '2017-03-06 22:08:00', NULL, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1),
(4, '2017-03-06 22:08:00', NULL, 'Users', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1),
(5, '2017-03-06 22:08:00', NULL, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1),
(6, '2017-03-06 22:08:00', NULL, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1),
(7, '2017-03-06 22:08:00', NULL, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1),
(8, '2017-03-06 22:08:00', NULL, 'Email Template', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1),
(9, '2017-03-06 22:08:00', NULL, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1),
(10, '2017-03-06 22:08:00', NULL, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1),
(11, '2017-03-06 22:08:00', NULL, 'Logs', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1),
(12, '2017-03-06 22:09:11', NULL, 'Products', 'fa fa-shopping-cart', 'products', 'roopcom_new.products', 'AdminProductsController', 0, 0),
(13, '2017-03-06 22:20:04', NULL, 'Giftcards', 'fa fa-credit-card', 'giftcards', 'roopcom_new.giftcards', 'AdminGiftcardsController', 0, 0),
(14, '2017-03-06 22:28:00', NULL, 'Warehouses', 'fa fa-building', 'warehouses', 'roopcom_new.warehouses', 'AdminWarehousesController', 0, 0),
(15, '2017-03-06 23:03:45', NULL, 'Customers', 'fa fa-users', 'roopcom_new_customers', 'roopcom_new.customers', 'AdminRoopcomNewCustomersController', 0, 0),
(16, '2017-03-06 23:06:50', NULL, 'Packages', 'fa fa-archive', 'roopcom_cms_packages', 'roopcom_cms.packages', 'AdminPackagesController', 0, 0),
(17, '2017-03-06 23:22:25', NULL, 'Orders', 'fa fa-shopping-bag', 'orders', 'roopcom_new.orders', 'AdminOrdersController', 0, 0),
(18, '2017-03-07 09:00:43', NULL, 'Shipments', 'fa fa-ship', 'shipments', 'roopcom_new.shipments', 'AdminShipmentsController', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `created_at`, `updated_at`, `name`, `is_superadmin`, `theme_color`) VALUES
(1, '2017-03-06 22:08:00', NULL, 'Super Administrator', 1, 'skin-red'),
(2, NULL, NULL, 'Admin', 0, 'skin-red-light'),
(3, NULL, NULL, 'Personeel', 0, 'skin-green'),
(4, NULL, NULL, 'Magazijn', 0, 'skin-blue-light'),
(5, NULL, NULL, 'Manager', 0, 'skin-yellow');

-- --------------------------------------------------------

--
-- Table structure for table `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `created_at`, `updated_at`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`) VALUES
(1, '2017-03-06 22:08:00', NULL, 1, 0, 0, 0, 0, 1, 1),
(2, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 2),
(3, '2017-03-06 22:08:00', NULL, 0, 1, 1, 1, 1, 1, 3),
(4, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 4),
(5, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 5),
(6, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 6),
(7, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 7),
(8, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 8),
(9, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 9),
(10, '2017-03-06 22:08:00', NULL, 1, 1, 1, 1, 1, 1, 10),
(11, '2017-03-06 22:08:00', NULL, 1, 0, 1, 0, 1, 1, 11),
(12, NULL, NULL, 1, 1, 1, 1, 1, 1, 12),
(13, NULL, NULL, 1, 1, 1, 1, 1, 1, 13),
(14, NULL, NULL, 1, 1, 1, 1, 1, 1, 14),
(15, NULL, NULL, 1, 1, 1, 1, 1, 1, 15),
(16, NULL, NULL, 1, 1, 1, 1, 1, 1, 16),
(17, NULL, NULL, 1, 1, 1, 1, 1, 1, 17),
(18, NULL, NULL, 1, 1, 1, 1, 1, 1, 17),
(32, NULL, NULL, 1, 1, 1, 1, 1, 1, 18),
(33, NULL, NULL, 1, 1, 1, 1, 1, 1, 18),
(40, NULL, NULL, 1, 1, 1, 1, 1, 2, 15),
(41, NULL, NULL, 1, 1, 1, 1, 1, 2, 13),
(42, NULL, NULL, 1, 1, 1, 1, 1, 2, 17),
(43, NULL, NULL, 1, 1, 1, 1, 1, 2, 16),
(44, NULL, NULL, 1, 1, 1, 1, 1, 2, 12),
(45, NULL, NULL, 1, 1, 1, 1, 1, 2, 18),
(46, NULL, NULL, 1, 1, 1, 1, 1, 2, 4),
(47, NULL, NULL, 1, 1, 1, 1, 1, 2, 14),
(65, NULL, NULL, 1, 1, 1, 1, 0, 3, 15),
(66, NULL, NULL, 1, 1, 0, 0, 0, 3, 13),
(67, NULL, NULL, 1, 1, 0, 0, 0, 3, 17),
(68, NULL, NULL, 1, 1, 1, 1, 0, 3, 16),
(69, NULL, NULL, 1, 0, 1, 0, 0, 3, 12),
(70, NULL, NULL, 1, 0, 0, 0, 0, 3, 18),
(71, NULL, NULL, 1, 1, 1, 1, 0, 5, 15),
(72, NULL, NULL, 1, 1, 0, 0, 0, 5, 13),
(73, NULL, NULL, 1, 1, 0, 0, 0, 5, 17),
(74, NULL, NULL, 1, 1, 1, 1, 0, 5, 16),
(75, NULL, NULL, 1, 1, 1, 1, 0, 5, 12),
(76, NULL, NULL, 1, 0, 0, 0, 0, 5, 18),
(77, NULL, NULL, 1, 1, 1, 1, 1, 4, 16),
(78, NULL, NULL, 1, 1, 1, 1, 1, 4, 18),
(79, NULL, NULL, 1, 1, 1, 1, 1, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_setting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `created_at`, `updated_at`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `group_setting`, `label`) VALUES
(1, '2017-03-06 22:08:00', NULL, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Background Color'),
(2, '2017-03-06 22:08:00', NULL, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Font Color'),
(3, '2017-03-06 22:08:00', NULL, 'login_background_image', NULL, 'upload_image', NULL, NULL, 'Login Register Style', 'Login Background Image'),
(4, '2017-03-06 22:08:00', NULL, 'email_sender', 'support@roopcom.com', 'text', NULL, NULL, 'Email Setting', 'Email Sender'),
(5, '2017-03-06 22:08:00', NULL, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, 'Email Setting', 'Mail Driver'),
(6, '2017-03-06 22:08:00', NULL, 'smtp_host', NULL, 'text', NULL, NULL, 'Email Setting', 'SMTP Host'),
(7, '2017-03-06 22:08:00', NULL, 'smtp_port', '25', 'text', NULL, 'default 25', 'Email Setting', 'SMTP Port'),
(8, '2017-03-06 22:08:00', NULL, 'smtp_username', NULL, 'text', NULL, NULL, 'Email Setting', 'SMTP Username'),
(9, '2017-03-06 22:08:00', NULL, 'smtp_password', NULL, 'text', NULL, NULL, 'Email Setting', 'SMTP Password'),
(10, '2017-03-06 22:08:00', NULL, 'appname', 'Roopcom', 'text', NULL, NULL, 'Application Setting', 'Application Name'),
(11, '2017-03-06 22:08:00', NULL, 'default_paper_size', 'A4', 'text', NULL, 'Paper size, ex : A4, Legal, etc', 'Application Setting', 'Default Paper Print Size'),
(12, '2017-03-06 22:08:00', NULL, 'logo', 'uploads/2017-03/fb585b7894cd19664194eea5591d608f.png', 'upload_image', NULL, NULL, 'Application Setting', 'Logo'),
(13, '2017-03-06 22:08:00', NULL, 'favicon', NULL, 'upload_image', NULL, NULL, 'Application Setting', 'Favicon'),
(14, '2017-03-06 22:08:00', NULL, 'api_debug_mode', 'false', 'select', 'true,false', NULL, 'Application Setting', 'API Debug Mode'),
(15, '2017-03-06 22:08:00', NULL, 'google_api_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google API Key'),
(16, '2017-03-06 22:08:00', NULL, 'google_fcm_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google FCM Key'),
(17, '2017-03-06 23:17:55', '2017-03-28 07:43:25', 'us_su_rate', '7.9', 'number', '', '', 'Shipping settings', '1 USD = ? SRD'),
(18, '2017-03-06 23:18:18', '2017-03-28 07:43:37', 'us_nl_rate', '1.06', 'number', '', '', 'Shipping settings', '1 USD = ? EUR'),
(19, '2017-03-07 16:55:39', NULL, 'general_settings', NULL, '', '', '', 'General Settings', 'General Settings'),
(20, '2017-03-28 07:15:05', '2017-03-28 07:15:31', 'usd_per_lbs_sea', '2', 'number', '', '', 'Shipping settings', 'USD Per LBS (Air)'),
(21, '2017-03-28 07:15:22', NULL, 'usd_per_inch_sea', '9.95', 'number', '', '', 'Shipping settings', 'USD per inch (Sea)'),
(22, '2017-03-28 07:15:48', NULL, 'usd_per_inch_eco', '3', 'number', '', '', 'Shipping settings', 'USD per inch (Eco)'),
(23, NULL, NULL, 'inhoud_content', 'Content1,content2,conten3,content4', 'textarea', NULL, NULL, 'Shipping Settings', 'Inhoud Content');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_statistics`
--

INSERT INTO `cms_statistics` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard Admin', 'dashboard', '2017-03-06 23:25:15', '2017-03-07 12:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_statistic_components`
--

INSERT INTO `cms_statistic_components` (`id`, `id_cms_statistics`, `componentID`, `component_name`, `area_name`, `sorting`, `name`, `config`, `created_at`, `updated_at`) VALUES
(2, 1, '2e0e9fb105beaead3ceda8020e94ca9f', 'table', 'area5', 0, NULL, '{\"name\":\"Meest recente scans\",\"sql\":\"select top 25\\r\\ntracking_number as [tracking code]\\r\\n, customer_id as klantcode\\r\\n,*\\r\\nfrom packages\"}', '2017-04-11 09:34:48', NULL),
(3, 1, 'd07f5ea39068a9ad10f8b225dac19d87', 'table', 'area5', 0, NULL, '{\"name\":\"Recent Packages\",\"sql\":\"SELECT `customer_id` as klantcode, concat(`first_name`,\' \', `last_name`) as Klant,`tracking_number` as `tracking code`,  case when IFNULL(`shipment_id`,0) = 0 then \'No\' else \'Yes\' end as `packed`, `created_at`, `updated_at` FROM `packages`\\r\\nWHERE WEEKOFYEAR(created_at) = WEEKOFYEAR(NOW())\"}', '2017-04-11 09:38:43', NULL),
(7, 1, '264ce1fddbeaa58e7b79b36e87f78300', 'smallbox', 'area4', 1, NULL, '{\"name\":\"Revenue (Monthly)\",\"icon\":\"ion-social-usd\",\"color\":\"bg-green\",\"link\":\"#\",\"sql\":\"SELECT SUM(total) as rev FROM `transactions` where created_at > DATE_FORMAT(NOW() ,\'%Y-%m-01\')\"}', '2017-04-20 14:17:24', NULL),
(8, 1, '1454a0af03ed9bb3a1b95c31d7c042a4', 'smallbox', 'area3', 0, NULL, '{\"name\":\"Revenue (current week)\",\"icon\":\"ion-social-usd\",\"color\":\"bg-green\",\"link\":\"#\",\"sql\":\"SELECT IFNULL(SUM(`total`),0) as rev\\r\\nFROM `transactions`\\r\\nWHERE WEEKOFYEAR(created_at) = WEEKOFYEAR(NOW())\"}', '2017-04-24 07:42:34', NULL),
(9, 1, '9722db1782e21ea618abb8f162895a62', 'smallbox', 'area1', 0, NULL, '{\"name\":\"Customers\",\"icon\":\"ion-person\",\"color\":\"bg-yellow\",\"link\":\"#\",\"sql\":\"select count(*) from customers\"}', '2017-04-24 07:52:13', NULL),
(10, 1, '1e771b39385f7f343d906ba4c213d7ad', 'smallbox', 'area2', 0, NULL, '{\"name\":\"Packages (weekly)\",\"icon\":\"ion-archive\",\"color\":\"bg-aqua\",\"link\":\"#\",\"sql\":\"select count(*) from `packages` where weekofyear(created_at) = weekofyear(now())\"}', '2017-04-24 07:53:29', NULL),
(12, 1, '988fa54ae255fa1f966b886dd732d30d', 'chartline', 'area5', 1, NULL, '{\"name\":\"Packages\",\"sql\":\"select count(*) as `value`, weekofyear(created_at) as `label` \\r\\nfrom `packages`\\r\\ngroup by weekofyear(created_at)\",\"area_name\":\"Packages\",\"goals\":null}', '2017-04-24 07:55:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`id`, `created_at`, `updated_at`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `status`) VALUES
(1, '2017-03-06 22:08:00', NULL, 'Super Admin', NULL, 'droopram@gmail.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 1, 'Active'),
(2, '2017-03-06 22:23:22', '2017-04-26 07:08:16', 'Admin', 'uploads/2017-03/a503fbbbbc1502fb5dd17933418939a5.jpg', 'admin@roopcom.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 1, NULL),
(3, '2017-03-06 23:41:46', '2017-06-04 13:29:41', 'Employee', '', 'employee@roopcom.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 3, NULL),
(4, '2017-03-29 17:12:03', '2017-04-26 07:07:52', 'Viraj', 'uploads/2017-03/fd3ff10e1fd3ddd5d3567cb7e8092deb.jpg', 'Viraj@roopcom.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 3, NULL),
(7, '2017-04-18 18:11:34', '2017-04-29 00:39:19', 'Vikash Roopram', 'uploads/2017-04/8a7864032031b2fb1cb5c1105795a5ae.png', 'vikash@laxani.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 2, NULL),
(8, '2017-04-26 07:09:08', '2017-04-30 09:48:33', 'Vijay Roopram', 'uploads/2017-04/df14f48194f75d5b891910940b20f13b.jpg', 'Roopramvijay@gmail.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 2, NULL),
(9, '2017-04-26 07:12:26', '2017-05-01 21:03:25', 'Kelly Wong', 'uploads/2017-04/b79bcb3490d549c368e7cfdbc47a0d9f.jpg', 'wongbegonia77@gmail.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 3, NULL),
(10, '2017-05-12 00:15:39', NULL, 'magazijn', 'uploads/2017-05/bc988032b0c2994fbc22bd4819a6bb06.jpg', 'magazijn@roopcom.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 4, NULL),
(11, '2017-05-12 00:16:01', NULL, 'magazijn', 'uploads/2017-05/362d4e11004c89e4179b9ac909d93ba5.jpg', 'magazijn1@roopcom.com', '$2y$10$DIfmF6I8KSCA1HK.kjAegOAn01TjauW/Abx2sc3tkgafwXTTwmbSm', 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `photo`, `email`, `first_name`, `last_name`, `address`, `city`, `phone`, `country`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(132, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 19:12:47', '2017-07-05 19:12:47'),
(133, 'Jong', 'sample.png', 'jong@mail.com', 'jong', 'JinJin', 'A', 'B', '12123123', 'China', 'qqq', 'qqq', NULL, NULL),
(134, 'Jack', 'ajac.png', 'Jack@mail.com', 'Jack', 'Jack', 'B', 'B', '12121312', 'cHINA', 'qqq', 'qqq', NULL, NULL),
(135, NULL, NULL, NULL, 'Smooth', 'yang', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 23:38:38', '2017-07-05 23:38:38'),
(136, NULL, NULL, NULL, 'Jong', 'Jock', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 23:42:52', '2017-07-05 23:42:52'),
(137, NULL, NULL, NULL, 'Jhone', 'Jhone', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 23:47:14', '2017-07-05 23:47:14'),
(138, NULL, NULL, NULL, 'jinjin', 'dkdkd', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 23:48:44', '2017-07-05 23:48:44'),
(139, NULL, NULL, NULL, 'fdjskdf', 'sdfsd', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 23:48:57', '2017-07-05 23:48:57'),
(140, NULL, NULL, NULL, 'jin', 'jin', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-05 23:49:11', '2017-07-05 23:49:11'),
(141, NULL, NULL, NULL, 'Kim', 'Jin', NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-06 02:23:08', '2017-07-06 02:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `giftcards`
--

CREATE TABLE `giftcards` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double(10,2) NOT NULL,
  `cost` double(10,2) NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','ordered','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(83, '2016_08_07_145904_add_table_cms_apicustom', 1),
(84, '2016_08_07_150834_add_table_cms_dashboard', 1),
(85, '2016_08_07_151210_add_table_cms_logs', 1),
(86, '2016_08_07_152014_add_table_cms_privileges', 1),
(87, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(88, '2016_08_07_152320_add_table_cms_settings', 1),
(89, '2016_08_07_152421_add_table_cms_users', 1),
(90, '2016_08_07_154624_add_table_cms_moduls', 1),
(91, '2016_08_17_225409_add_status_cms_users', 1),
(92, '2016_08_20_125418_add_table_cms_notifications', 1),
(93, '2016_09_04_033706_add_table_cms_email_queues', 1),
(94, '2016_09_16_035347_add_group_setting', 1),
(95, '2016_09_16_045425_add_label_setting', 1),
(96, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(97, '2016_10_01_141740_add_method_type_apicustom', 1),
(98, '2016_10_01_141846_add_parameters_apicustom', 1),
(99, '2016_10_01_141934_add_responses_apicustom', 1),
(100, '2016_10_01_144826_add_table_apikey', 1),
(101, '2016_11_14_141657_create_cms_menus', 1),
(102, '2016_11_15_132350_create_cms_email_templates', 1),
(103, '2016_11_15_190410_create_cms_statistics', 1),
(104, '2016_11_17_102740_create_cms_statistic_components', 1),
(105, '2017_02_17_175518_create_packages_table', 1),
(106, '2017_02_17_175525_create_shipments_table', 1),
(107, '2017_02_17_175601_create_products_table', 1),
(108, '2017_02_17_175751_create_giftcards_table', 1),
(109, '2017_02_19_191828_create_warehouses_table', 2),
(112, '2017_03_06_233229_create_customers_table', 3),
(113, '2017_03_06_233244_create_orders_table', 3),
(114, '2017_03_27_105142_add_to_shipment', 4),
(115, '2017_03_27_105345_add_to_shipment_2', 5),
(116, '2017_03_27_113755_add_to_shipments_table', 6),
(117, '2017_03_28_090303_create_transactions_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','accepted','ordered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `link`, `status`, `notes`, `tracking_number`, `package_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'http://www.google.com', 'pending', 'Test Bericht', '1234567', 10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `tracking_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `status` enum('accepted','progress','shipped','delivered','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'accepted',
  `warehouse_id` int(11) NOT NULL,
  `week` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipment_type` enum('eco','air','sea') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'eco',
  `weight` double NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `tracking_number`, `barcode`, `content`, `customer_id`, `first_name`, `last_name`, `shipment_id`, `employee_id`, `status`, `warehouse_id`, `week`, `created_at`, `updated_at`, `shipment_type`, `weight`, `location`) VALUES
(836, '1231', '1231', NULL, 138, 'jinjin', 'dkdkd', 2, 1, 'accepted', 1, 27, '2017-07-05 23:48:44', '2017-07-05 23:48:44', 'air', 12, '21'),
(838, 'sdfsj', 'sdfsj', NULL, 140, 'jin', 'jin', 3, 1, 'accepted', 1, 27, '2017-07-05 23:49:11', '2017-07-05 23:49:11', 'air', 123, '12'),
(839, 'qqq', 'qqq', 'content4', 141, 'Kim', 'Jin', 6, 8, 'accepted', 1, 27, '2017-07-06 02:23:08', '2017-07-06 02:23:08', 'sea', 12, '22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `stock` int(11) NOT NULL,
  `webshop` tinyint(1) NOT NULL DEFAULT '1',
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `price`, `description`, `stock`, `webshop`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/2017-04/883d63a4752757c6c8c72284c458ec76.jpg', 'Hometrainer', 299.95, '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel malesuada sapien, nec vestibulum sapien. Curabitur convallis nulla quis velit iaculis varius faucibus eu turpis. Nullam a augue pulvinar, congue eros in, tincidunt felis. Donec et dolor ac ex dictum hendrerit. <b>Donec a accumsan quam</b>. Quisque maximus mauris sit amet eleifend mollis. In hac habitasse platea dictumst. Nam sollicitudin mollis ullamcorper. Etiam fermentum quam erat. Integer magna arcu, sodales non nulla varius, lobortis dignissim est. Sed eleifend tellus nec ipsum vestibulum, non auctor nunc tempus. Aenean efficitur congue viverra. Ut dictum aliquet mi, vel eleifend risus ultricies eget. Duis cursus turpis et tincidunt tristique.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\">Integer lobortis elementum nisi nec pellentesque. In ornare velit vel finibus hendrerit. Duis commodo felis urna, eu dictum justo suscipit non. Aenean dui orci, ultrices non elit eget, porta interdum justo. Vestibulum eget finibus sem. Etiam laoreet, mi at condimentum volutpat, neque justo condimentum lorem, finibus ornare sem dui sed ligula. Aliquam erat volutpat. Pellentesque tempus justo in velit ultrices, in ultrices lectus ornare.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\"><br></p><table class=\"table table-bordered\"><tbody><tr><td>Type</td><td>3000</td></tr><tr><td>Max Speed</td><td>50 km/h</td></tr><tr><td>Max Rotation</td><td>2300RPM</td></tr></tbody></table><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif;\"><br></p>', 4, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `height` double(10,2) DEFAULT NULL,
  `width` double(10,2) DEFAULT NULL,
  `depth` double(10,2) DEFAULT NULL,
  `weight` double(10,2) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `destination_warehouse_id` int(11) NOT NULL,
  `shipment_type` enum('sea','air','eco') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sea',
  `week` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_per_inch` double(10,2) DEFAULT NULL,
  `price_per_lbs` double(10,2) DEFAULT NULL,
  `parts` int(11) NOT NULL,
  `extrafee` double(10,2) DEFAULT NULL,
  `status` enum('packed','transit','delivered','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'packed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `barcode`, `tracking_number`, `customer_id`, `employee_id`, `height`, `width`, `depth`, `weight`, `currency`, `price`, `warehouse_id`, `destination_warehouse_id`, `shipment_type`, `week`, `created_at`, `updated_at`, `price_per_inch`, `price_per_lbs`, `parts`, `extrafee`, `status`) VALUES
(1, '1212', '12', 133, 1, 22.00, 22.00, 2.00, 22.00, '22', 2.00, 2, 1, 'sea', 2, '2017-07-04 16:00:00', '2017-07-10 16:00:00', 2.00, 2.00, 2, 2.00, 'packed'),
(2, 'RPCM-2017-0000-0002', 'RPCM-2017-0000-0002', 138, 1, 0.00, 0.00, 0.00, 0.00, 'USD', 0.00, 1, 1, 'air', 27, '2017-07-06 00:25:02', '2017-07-06 00:25:02', NULL, 3.49, 1, 0.00, 'packed'),
(3, 'RPCM-2017-0000-0003', 'RPCM-2017-0000-0003', 140, 8, 0.00, 0.00, 0.00, 22.00, 'USD', 44.00, 1, 1, 'air', 27, '2017-07-06 07:30:38', '2017-07-06 07:30:38', NULL, 2.00, 1, 0.00, 'packed'),
(6, 'RPCM-2017-0000-0004', 'RPCM-2017-0000-0004', 141, 0, 0.00, 0.00, 0.00, 0.00, 'USD', 0.00, 1, 1, 'sea', 27, '2017-07-06 08:41:29', '2017-07-06 08:41:29', 9.95, NULL, 0, 0.00, 'packed');

-- --------------------------------------------------------

--
-- Table structure for table `shipment_types`
--

CREATE TABLE `shipment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` double(10,2) NOT NULL,
  `paid` double(10,2) NOT NULL,
  `change` double(10,2) NOT NULL,
  `usd` double(10,2) NOT NULL,
  `eur` double(10,2) NOT NULL,
  `srd` double(10,2) NOT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci,
  `shipment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `address`, `zipcode`, `city`, `country`, `phonenumber`, `created_at`, `updated_at`) VALUES
(1, 'Highway', 'Martin Lutherkingweg 176', '1234', 'Paramaribo', 'Suriname', '8771771', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giftcards`
--
ALTER TABLE `giftcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipment_types`
--
ALTER TABLE `shipment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=926;
--
-- AUTO_INCREMENT for table `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `giftcards`
--
ALTER TABLE `giftcards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=840;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shipment_types`
--
ALTER TABLE `shipment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
