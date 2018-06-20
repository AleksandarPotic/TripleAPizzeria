-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2018 at 10:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/profile/profile.jpg',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'John', 'public/NbNrXCMl.png', 'john@triplea.com', '$2y$10$Wg59onv.hiwZ/C.taSYqsuv3skqyxn0kM4Qq0LU6mfHI9DhpaNkwm', 1, 'Ptr1MZYtIq6AWkWqi9amFIjTMHIHZpHZO5pqX9D5yhKZbuFpY3vcOzWIxbsf', '2018-04-03 06:42:14', '2018-04-20 11:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Appetizers', 'appetizers', NULL, NULL),
(2, 'Pizza', 'pizza', NULL, NULL),
(3, 'Chicken', 'chicken', NULL, NULL),
(4, 'Subs', 'subs', NULL, NULL),
(5, 'Salads', 'salads', NULL, NULL),
(6, 'Chicken Wings', 'chicken_wings', NULL, NULL),
(7, 'Garlic Fingers', 'garlic_fingers', NULL, NULL),
(8, 'Nachos', 'nachos', NULL, NULL),
(9, 'Calzones', 'calzones', NULL, NULL),
(10, 'Sandwiches', 'sandwiches', NULL, NULL),
(11, 'Wraps', 'wraps', NULL, NULL),
(12, 'Donairs', 'donairs', NULL, NULL),
(13, 'Poutine', 'poutine', NULL, NULL),
(14, 'Seafood', 'seafood', NULL, NULL),
(15, 'Burgers', 'burgers', NULL, NULL),
(16, 'Desserts', 'desserts', NULL, NULL),
(17, 'Drinks', 'drinks', NULL, NULL),
(18, 'Munchies', 'munchies', NULL, NULL),
(19, 'Sauces', 'sauces', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', 'Cao druze moram da se pozalim na vas!', '2018-03-02 10:58:22', '2018-03-02 10:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `customizes`
--

CREATE TABLE `customizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customize_price` double NOT NULL,
  `medium_price` double DEFAULT NULL,
  `large_price` double DEFAULT NULL,
  `xlg_price` double DEFAULT NULL,
  `regular_premium` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customize_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customizes`
--

INSERT INTO `customizes` (`id`, `name`, `customize_price`, `medium_price`, `large_price`, `xlg_price`, `regular_premium`, `customize_category`, `created_at`, `updated_at`) VALUES
(10, 'Mozzarella-Cheese', 0.8, 1.25, 1.6, 1.95, 'regular', 'Cheeses', '2018-03-20 08:13:33', '2018-03-27 11:29:39'),
(13, 'Pepperoni', 0.8, 1.25, 1.6, 1.95, 'regular', 'Meats', '2018-03-20 08:14:29', '2018-03-20 08:14:29'),
(14, 'Salami', 0.8, 1.25, 1.6, 1.95, 'regular', 'Meats', '2018-03-20 08:14:55', '2018-03-20 08:14:55'),
(15, 'Bacon', 0.8, 1.25, 1.6, 1.95, 'regular', 'Meats', '2018-03-20 08:15:09', '2018-03-20 08:15:09'),
(16, 'Ham', 0.8, 1.25, 1.6, 1.95, 'regular', 'Meats', '2018-03-20 08:15:23', '2018-03-20 08:15:23'),
(17, 'Onions', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-20 08:15:56', '2018-03-20 08:15:56'),
(18, 'Tomato', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-20 08:16:16', '2018-03-20 08:16:16'),
(19, 'Hot-Peppers', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-20 08:16:53', '2018-03-20 08:58:04'),
(22, 'Sausage', 0.8, 1.25, 1.6, 1.95, 'regular', 'Meats', '2018-03-27 11:19:47', '2018-03-27 11:19:47'),
(23, 'Ground-Beef', 0.8, 1.25, 1.6, 1.95, 'regular', 'Meats', '2018-03-27 11:20:03', '2018-03-27 11:20:03'),
(24, 'Mushrooms', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-27 11:23:08', '2018-03-27 11:23:08'),
(25, 'Green-Peppers', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-27 11:23:22', '2018-03-27 11:23:22'),
(26, 'Pineapple', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-27 11:23:36', '2018-03-27 11:23:36'),
(27, 'Green-Olives', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-27 11:23:51', '2018-03-27 11:23:51'),
(28, 'Black-Olives', 0.8, 1.25, 1.6, 1.95, 'regular', 'Veggies', '2018-03-27 11:24:10', '2018-03-27 11:55:09'),
(29, 'Parmesan-Cheese', 1.75, 2.5, 3.25, 3.99, 'premium', 'Cheeses', '2018-03-27 11:24:59', '2018-03-27 11:24:59'),
(30, 'Feta-Cheese', 1.75, 2.5, 3.25, 3.99, 'premium', 'Cheeses', '2018-03-27 11:26:04', '2018-03-27 11:26:04'),
(31, 'Donair-Meat', 1.75, 2.5, 3.25, 3.99, 'premium', 'Meats', '2018-03-27 11:26:43', '2018-03-27 11:26:43'),
(32, 'Chicken', 1.75, 2.5, 3.25, 3.99, 'premium', 'Meats', '2018-03-27 11:27:28', '2018-03-27 11:27:28'),
(33, 'Extra-Cheese', 1.75, 2.5, 3.25, 3.99, 'premium', 'Cheeses', '2018-03-27 11:28:00', '2018-03-27 11:28:00');

-- --------------------------------------------------------

--
-- Table structure for table `customize_product`
--

CREATE TABLE `customize_product` (
  `product_id` int(11) NOT NULL,
  `customize_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customize_product`
--

INSERT INTO `customize_product` (`product_id`, `customize_id`, `created_at`, `updated_at`) VALUES
(333, 10, NULL, NULL),
(334, 10, NULL, NULL),
(335, 10, NULL, NULL),
(335, 17, NULL, NULL),
(335, 18, NULL, NULL),
(335, 24, NULL, NULL),
(335, 25, NULL, NULL),
(335, 27, NULL, NULL),
(335, 28, NULL, NULL),
(336, 10, NULL, NULL),
(336, 13, NULL, NULL),
(337, 10, NULL, NULL),
(337, 16, NULL, NULL),
(337, 26, NULL, NULL),
(338, 10, NULL, NULL),
(338, 17, NULL, NULL),
(338, 18, NULL, NULL),
(338, 27, NULL, NULL),
(338, 30, NULL, NULL),
(339, 10, NULL, NULL),
(339, 13, NULL, NULL),
(339, 15, NULL, NULL),
(339, 24, NULL, NULL),
(340, 10, NULL, NULL),
(340, 13, NULL, NULL),
(340, 14, NULL, NULL),
(340, 15, NULL, NULL),
(340, 17, NULL, NULL),
(340, 24, NULL, NULL),
(340, 25, NULL, NULL),
(341, 10, NULL, NULL),
(341, 17, NULL, NULL),
(341, 18, NULL, NULL),
(341, 31, NULL, NULL),
(342, 10, NULL, NULL),
(342, 29, NULL, NULL),
(342, 30, NULL, NULL),
(343, 10, NULL, NULL),
(343, 17, NULL, NULL),
(343, 18, NULL, NULL),
(343, 25, NULL, NULL),
(343, 32, NULL, NULL),
(344, 10, NULL, NULL),
(344, 13, NULL, NULL),
(344, 14, NULL, NULL),
(344, 15, NULL, NULL),
(344, 16, NULL, NULL),
(344, 22, NULL, NULL),
(344, 23, NULL, NULL),
(345, 10, NULL, NULL),
(346, 10, NULL, NULL),
(346, 17, NULL, NULL),
(346, 18, NULL, NULL),
(346, 25, NULL, NULL),
(346, 27, NULL, NULL),
(346, 28, NULL, NULL),
(346, 30, NULL, NULL),
(347, 10, NULL, NULL),
(347, 17, NULL, NULL),
(347, 18, NULL, NULL),
(348, 10, NULL, NULL),
(348, 17, NULL, NULL),
(348, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finished_orders`
--

CREATE TABLE `finished_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buzzer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `order_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minutes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_time_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specify_text_order` text COLLATE utf8mb4_unicode_ci,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2018_02_20_115945_create_products_table', 1),
(41, '2018_02_20_120028_create_categories_table', 1),
(42, '2018_02_20_122021_create_roles_table', 1),
(43, '2018_02_20_122038_create_permissions_table', 1),
(44, '2018_02_20_122330_create_permission_role_table', 1),
(45, '2018_02_20_155613_create_admins_table', 1),
(46, '2018_02_23_103152_create_orders_table', 2),
(47, '2018_02_23_103212_create_finished_orders_table', 2),
(48, '2018_02_27_175218_create_contacts_table', 3),
(49, '2018_02_28_101651_create_customizes_table', 4),
(50, '2018_02_28_143941_create_working_times_table', 5),
(51, '2018_03_05_152717_create_customize_product_table', 6),
(52, '2018_03_08_094407_create_coupons_table', 7),
(53, '2018_03_15_100220_create_shoppingcart_table', 8),
(54, '2018_03_16_113558_create_favorites_table', 9),
(55, '2018_03_18_105347_create_specials_table', 10),
(56, '2018_03_31_094915_create_postal_codes_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buzzer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `minutes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_time_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specify_text_order` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('gordanapotic76@gmail.com', '$2y$10$AL1iVNT1L2tFqz6BDdCeYeW925T7Gw4JRCfla7kmY8YMF230gxMmy', '2018-03-15 16:32:07'),
('aleksandar1995potic@gmail.com', '$2y$10$4zddltYOnK1t3i38moE3zOo7iNuzldmWQXxbhVfPt4plPSkQOEnYa', '2018-03-30 11:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `for`, `created_at`, `updated_at`) VALUES
(5, 'Admin-Index', 'admins', NULL, NULL),
(9, 'Product-Index', 'products', NULL, NULL),
(13, 'Role-Index', 'roles', NULL, NULL),
(17, 'Orders-All', 'other', NULL, NULL),
(18, 'MessageBox-all', 'other', NULL, NULL),
(19, 'Customize-Index', 'customize', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(2, 17),
(1, 18),
(1, 9),
(1, 17),
(1, 5),
(1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

CREATE TABLE `postal_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_free` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postal_codes`
--

INSERT INTO `postal_codes` (`id`, `postal_code`, `delivery_free`, `created_at`, `updated_at`) VALUES
(1, 'B3H', 4, NULL, NULL),
(2, 'B3K', 5, NULL, NULL),
(3, 'B3J', 4, NULL, NULL),
(4, 'B3L', 5, NULL, NULL),
(5, 'B3N', 5, NULL, NULL),
(6, 'B3P', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `small` double DEFAULT NULL,
  `medium` double DEFAULT NULL,
  `large` double DEFAULT NULL,
  `xlg` double DEFAULT NULL,
  `topping_num` int(11) DEFAULT NULL,
  `premium_num` int(11) DEFAULT NULL,
  `small_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_small` double DEFAULT NULL,
  `extra_large` double DEFAULT NULL,
  `extra_cheese` tinyint(1) DEFAULT NULL,
  `extra_meat` tinyint(1) DEFAULT NULL,
  `donair_small` double DEFAULT NULL,
  `donair_large` double DEFAULT NULL,
  `specialty` tinyint(1) DEFAULT NULL,
  `extra_piece` double DEFAULT NULL,
  `platter` double DEFAULT NULL,
  `homemade_garlic_souce` double DEFAULT NULL,
  `options_for_souce` tinyint(1) DEFAULT NULL,
  `drink_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_ctgy` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `small`, `medium`, `large`, `xlg`, `topping_num`, `premium_num`, `small_size`, `large_size`, `extra_small`, `extra_large`, `extra_cheese`, `extra_meat`, `donair_small`, `donair_large`, `specialty`, `extra_piece`, `platter`, `homemade_garlic_souce`, `options_for_souce`, `drink_size`, `product_ctgy`, `descriptions`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Double Layer Poutine', NULL, 7.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Crispy Fries, Mozzarella Cheese, Homemade Gravy', 13, '2018-03-29 07:32:31', '2018-03-29 07:33:50'),
(70, 'Caesar Salad', NULL, 5.99, NULL, 8.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fresh Romaine Lettuce tossed in our creamy Caesar Dressing, topped with Crunchy Croutons, Bacon Bits, and Freshly Grated Parmesan Cheese.', 5, '2018-03-08 19:50:29', '2018-04-06 06:00:40'),
(71, 'Garden Salad', NULL, 5.99, NULL, 8.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fresh Romaine Lettuce, Onions, Cucumbers, Tomatoes, Basil and Oregano tossed in our Italian', 5, '2018-03-09 09:45:17', '2018-04-06 05:59:57'),
(75, 'Nachos Supreme', NULL, 8.99, NULL, 12.99, NULL, 0, 0, NULL, NULL, 1.99, 2.99, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nacho Chips covered with melted Mozzarella and Cheddar Cheese topped with Onions, Green Peppers, Tomatoes, and Olives. Served with Salsa and Sour Cream.', 8, '2018-03-09 10:11:50', '2018-04-06 08:32:51'),
(77, 'BBQ Chicken Calzone', 11.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese, pizza sauce, bbq chicken, onions, tomatoes and green peppers. Served oven-baked or deep fried.', 9, '2018-03-09 13:10:13', '2018-04-06 08:33:40'),
(81, 'Donair Nachos Supreme', NULL, 9.99, NULL, 14.99, NULL, 0, 0, NULL, NULL, 1.99, 2.99, 1, 1, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nacho Chips covered with melted Mozzarella and Cheddar Cheese topped with Donair Meat, Onions, Green Peppers, Tomatoes, and Olives. Served with Salsa and Sour Cream.', 8, '2018-03-11 19:57:33', '2018-04-06 08:33:10'),
(82, 'Donair Calzone', 11.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, 1, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese, donair meat, donair sauce, onions and tomatoes. Served oven-baked or deep fried.', 9, '2018-03-11 20:28:17', '2018-04-06 08:33:49'),
(83, 'Garlic Fingers', NULL, 8.99, 11.99, 15.99, 19.99, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Smothered with mozzarella cheese and delicious garlic spread. Includes donair sauce.', 7, '2018-03-11 20:47:15', '2018-04-03 13:11:35'),
(85, 'Meat Lovers Calzone', 11.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese, pizza sauce, salami, pepperoni, ham, bacon and Italian sausage. Served oven-baked or deep fried.', 9, '2018-03-12 10:28:01', '2018-04-06 08:33:58'),
(86, '1 Pc Chicken & Chips', 6.29, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-12 10:40:58', '2018-04-07 04:17:26'),
(88, 'Clubhouse & Fries', 9.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Toasted bread filled with chicken strips, mayo, lettuce, tomatoes, crispy bacon and cheddar cheese.', 10, '2018-03-12 10:53:35', '2018-03-12 10:53:35'),
(89, 'Pizza Sub (Oven Toasted)', NULL, 6.99, NULL, 8.99, NULL, NULL, NULL, '9\"', '12\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oven toasted sub stuffed with pizza sauce, mozzarella cheese, salami, pepperoni, bacon, grilled onions, grilled mushrooms, and grilled green peppers.', 4, '2018-03-12 10:58:21', '2018-03-12 10:58:21'),
(90, 'Donair Sub (Oven Toasted)', NULL, 7.49, NULL, 9.49, NULL, 0, 0, '9\"', '12\"', NULL, NULL, NULL, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oven toasted sub stuffed with donair meat, mozzarella cheese, onions and tomatoes.', 4, '2018-03-12 11:01:09', '2018-04-03 13:13:45'),
(92, 'T-Wrap', NULL, 7.99, NULL, 9.99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'Our Famous T-Wrap! Grilled chicken marinated in our very own Triple A special seasoning, lettuce, onions, tomatoes, pickles, crispy fries and our homemade garlic sauce wrapped in fresh pita bread.', 11, '2018-03-12 11:16:05', '2018-03-12 11:21:06'),
(96, 'Hamburger', 5.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7.99, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Single Beef Patty, Mayo, Mustard, Ketchup, Lettuce, Onions, Tomatoes, Pickles', 15, '2018-03-12 13:13:56', '2018-03-12 13:19:54'),
(97, 'Deluxe Combo + Fries', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12.99, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Two Beef Patties, Double Cheese, Double Bacon, Lettuce, Tomatoes, Onions, Pickles, Mayo, Mustard, Ketchup', 15, '2018-03-12 13:14:59', '2018-04-02 08:16:02'),
(98, '10 Pc Chicken Wings', 9.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with chips, ranch and your choice of sauce', 6, '2018-03-13 16:50:23', '2018-04-03 13:13:01'),
(99, 'Small Donair', 6.29, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.49, NULL, 1, 1, 1.49, 3.49, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Donair meat, tomatoes, and onions covered in donair sauce.', 12, '2018-03-14 16:00:20', '2018-04-06 06:32:17'),
(101, 'Medium Donair', 7.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.49, NULL, 1, 1, 1.49, 3.49, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Donair meat, tomatoes, and onions covered in donair sauce.', 12, '2018-03-14 16:15:58', '2018-04-03 13:17:06'),
(110, 'Ice Cream Sandwich', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-22 12:54:46', '2018-03-22 12:54:46'),
(111, 'Brownies on the Moon', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-22 12:56:33', '2018-03-22 12:58:26'),
(119, 'Coke Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-26 13:46:16', '2018-03-28 11:42:40'),
(120, 'Coke 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-26 13:46:53', '2018-03-28 11:43:02'),
(121, 'Coke 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-26 13:47:11', '2018-03-29 05:36:43'),
(122, 'Homemade Garlic Sauce', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-26 13:52:34', '2018-04-06 06:17:00'),
(123, 'Ranch', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-26 13:52:54', '2018-04-03 13:20:03'),
(124, 'Fries', NULL, 3.99, NULL, 5.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-27 08:55:54', '2018-03-30 10:47:02'),
(125, 'Spicy Fries', NULL, 4.99, NULL, 5.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-27 08:56:20', '2018-03-30 10:46:51'),
(126, 'Sweet Potato Fries', NULL, 5.99, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-27 08:56:44', '2018-03-30 10:46:42'),
(127, 'Onion Rings', NULL, 4.49, NULL, 5.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-27 08:57:10', '2018-03-30 10:46:32'),
(128, 'Deep Fried Zucchini', NULL, 4.99, NULL, 6.99, NULL, 0, 0, '10Pc', '18Pc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-27 08:57:43', '2018-04-03 13:23:21'),
(129, 'Mozza Sticks', NULL, 5.99, NULL, 8.99, NULL, 0, 0, '6Pc', '10Pc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Served with Sour Cream.', 1, '2018-03-27 08:58:17', '2018-04-03 13:23:32'),
(130, 'Garlic Bread with Cheese', NULL, 3.99, NULL, 5.99, NULL, 0, 0, '2Pc', '4Pc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-03-27 08:58:57', '2018-04-03 13:23:43'),
(131, 'Deep Fried Brothers Pepperoni', NULL, 4.99, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Served with Honey Mustard.', 1, '2018-03-27 08:59:32', '2018-03-27 08:59:32'),
(132, 'Triple A Appetizer Combo', NULL, 13.99, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Perfect for sharing! Onion rings, mozza sticks, fries, and Brothers pepperoni served with dipping sauce.', 1, '2018-03-27 09:00:02', '2018-03-27 09:00:02'),
(133, 'Greek Salad', NULL, 6.29, NULL, 8.79, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fresh Romaine Lettuce, Tomatoes, Cucumbers, Onions, Black Olives, Basil, and Oregano tossed in our Greek Dressing and topped with Feta Cheese.', 5, '2018-03-27 09:04:21', '2018-04-06 06:01:26'),
(134, 'Chicken Caesar Salad', NULL, 7.29, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fresh Romaine Lettuce tossed in our creamy Caesar Dressing, topped with Crunchy Croutons, Bacon Bits, Freshly Grated Parmesan Cheese and Tender Pieces of Chicken.', 5, '2018-03-27 09:04:55', '2018-04-06 06:02:04'),
(135, 'Chicken Greek Salad', NULL, 7.29, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fresh Romaine Lettuce, Tomatoes, Cucumbers, Onions, Black Olives, Basil, and Oregano tossed in our Greek Dressing and Topped with Feta Cheese and Tender Pieces of Chicken.', 5, '2018-03-27 09:05:31', '2018-04-06 06:03:35'),
(136, 'Bacon Garlic Fingers', NULL, 9.99, 12.99, 17.49, 21.99, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Smothered with mozzarella cheese and delicious garlic spread and topped with crispy bacon. Includes donair sauce.', 7, '2018-03-27 09:08:11', '2018-04-03 13:11:45'),
(137, 'Donair Garlic Fingers', NULL, 9.99, 14.49, 19.49, 23.99, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Smothered in mozzarella cheese and delicious garlic spread and topped with donair meat. Includes donair sauce.', 7, '2018-03-27 09:08:58', '2018-04-03 13:12:44'),
(138, 'Large Donair', 9.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, 1, 1.49, 3.49, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Donair meat, tomatoes, and onions covered in donair sauce.', 12, '2018-03-27 09:12:41', '2018-04-03 13:16:47'),
(139, '2 Pounder Donair', 15.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Donair meat, tomatoes, onions and mozzarella cheese covered in donair sauce.', 12, '2018-03-27 09:13:46', '2018-04-06 05:55:21'),
(140, 'Donair Plate', 9.29, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Donair meat, mozzarella cheese, tomatoes, onions, and fries covered donair sauce.', 12, '2018-03-27 09:15:22', '2018-04-06 08:44:01'),
(141, 'Donair Egg Rolls', NULL, 3.99, NULL, 9.99, NULL, 0, 0, '2Pc', '6Pc', NULL, NULL, NULL, NULL, 1.49, 3.49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, '2018-03-27 09:17:12', '2018-04-03 13:14:55'),
(142, 'Cold Cut Sub (Oven Toasted)', NULL, 6.99, NULL, 8.99, NULL, 0, 0, '9\"', '12\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oven toasted sub stuffed with mozzarella cheese, mayo, salami, pepperoni, ham, lettuce, onions, tomatoes, green peppers and mushrooms.', 4, '2018-03-27 09:19:08', '2018-03-27 09:19:08'),
(143, 'Steak Sub (Oven Toasted)', NULL, 7.49, NULL, 9.49, NULL, 0, 0, '9\"', '12\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oven toasted sub stuffed with steak, mayo, bbq sauce, mozzarella cheese, grilled onions, grilled mushrooms and grilled green peppers.', 4, '2018-03-27 09:19:44', '2018-03-27 09:19:44'),
(144, 'BBQ Chicken Sub (Oven Toasted)', NULL, 7.49, NULL, 9.49, NULL, 0, 0, '9\"', '12\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oven toasted sub stuffed with bbq chicken, mayo, mozzarella cheese, grilled onions, grilled green peppers and tomatoes.', 4, '2018-03-27 09:20:19', '2018-03-27 09:20:19'),
(145, 'Grilled Chicken Breast Sub (Oven Toasted)', NULL, 7.49, NULL, 9.49, NULL, 0, 0, '9\"', '12\"', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Oven toasted sub, grilled chicken, mayo, mozzarella cheese, grilled onions, grilled green peppers and tomatoes.', 4, '2018-03-27 09:20:49', '2018-03-27 09:20:49'),
(146, 'Shawarma Wrap', NULL, 7.99, NULL, 9.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'A Customer Favorite! Marinated chicken, lettuce, tomatoes, onions, pickled turnips, crispy fries and homemade garlic sauce wrapped in fresh pita bread.', 11, '2018-03-27 09:22:11', '2018-03-27 09:22:11'),
(147, 'Chicken Caesar Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A Classic! Tender chicken pieces, lettuce and bacon bits drizzled with caesar dressing and wrapped in fresh pita bread.', 11, '2018-03-27 09:23:13', '2018-03-27 09:23:13'),
(148, 'Pizza Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pizza sauce, mozzarella cheese, salami, pepperoni, bacon, grilled onions, grilled mushrooms, and grilled green peppers wrapped in fresh pita bread.', 11, '2018-03-27 09:23:53', '2018-03-27 09:23:53'),
(149, 'Cold Cut Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mozzarella cheese, mayo, salami, pepperoni, ham, lettuce, onions, tomatoes, green peppers and mushrooms wrapped in fresh pita bread.', 11, '2018-03-27 09:24:23', '2018-03-27 09:24:23'),
(150, 'Steak Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Tender steak, mayo, bbq sauce, mozzarella cheese, grilled onions, grilled mushrooms and grilled green peppers wrapped in fresh pita bread.', 11, '2018-03-27 09:24:51', '2018-03-27 09:24:51'),
(151, 'Donair Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1.5, 3.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Donair meat, mozzarella cheese, onions and tomatoes wrapped in fresh pita bread.', 11, '2018-03-27 09:27:07', '2018-03-27 09:27:07'),
(152, 'BBQ Chicken Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BBQ chicken, mayo, mozzarella cheese, grilled onions, grilled green peppers and tomatoes wrapped in fresh pita bread.', 11, '2018-03-27 09:27:32', '2018-03-27 09:27:32'),
(153, 'Grilled Chicken Breast Wrap', NULL, 7.49, NULL, 9.49, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Grilled chicken, mayo, mozzarella cheese, grilled onions, grilled green peppers and tomatoes wrapped in fresh pita bread.', 11, '2018-03-27 09:28:01', '2018-03-27 09:28:01'),
(154, 'Diet Coke Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:29:29', '2018-03-28 11:43:23'),
(155, 'Diet Coke 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:29:47', '2018-03-28 11:43:34'),
(156, 'Diet Coke 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:30:01', '2018-03-29 05:36:59'),
(157, 'Coke Zero Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:30:17', '2018-03-28 11:44:02'),
(158, 'Coke Zero 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:30:33', '2018-03-28 11:44:14'),
(159, 'Coke Zero 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:30:47', '2018-03-29 05:37:13'),
(160, 'Sprite Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:31:00', '2018-03-28 11:44:38'),
(161, 'Sprite 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:31:13', '2018-03-28 11:45:00'),
(162, 'Sprite 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:31:26', '2018-03-29 05:37:27'),
(163, 'Ginger Ale Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:31:48', '2018-03-28 11:45:35'),
(164, 'Ginger Ale 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:32:21', '2018-03-28 11:46:04'),
(165, 'Ginger Ale 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:32:38', '2018-03-29 05:37:40'),
(166, 'Orange Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:32:51', '2018-03-28 11:46:31'),
(167, 'Orange 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:33:07', '2018-03-28 11:46:47'),
(168, 'Orange 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:33:19', '2018-03-29 05:37:57'),
(169, 'Grape Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:33:31', '2018-03-28 11:47:37'),
(170, 'Grape 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:33:44', '2018-03-28 11:47:24'),
(171, 'Grape 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:33:55', '2018-03-29 05:38:10'),
(172, 'Cream Soda Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:34:10', '2018-03-28 11:48:13'),
(173, 'Cream Soda 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:34:24', '2018-03-28 11:48:27'),
(174, 'Cream Soda 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:34:39', '2018-03-29 05:38:25'),
(175, 'Root Beer Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:35:14', '2018-03-28 11:48:59'),
(176, 'Root Beer 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:35:29', '2018-03-28 11:49:15'),
(177, 'Root Beer 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:35:41', '2018-03-29 05:38:38'),
(178, 'Pepsi Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:35:56', '2018-03-28 11:49:54'),
(179, 'Pepsi 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:36:10', '2018-03-28 11:50:07'),
(180, 'Pepsi 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:36:21', '2018-03-29 05:38:51'),
(181, 'Diet Pepsi Can', 1.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Can', NULL, NULL, 17, '2018-03-27 09:37:13', '2018-03-28 11:50:35'),
(182, 'Diet Pepsi 500ml', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-03-27 09:37:33', '2018-03-28 11:50:48'),
(183, 'Diet Pepsi 2L', 3.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2l', NULL, NULL, 17, '2018-03-27 09:37:50', '2018-03-29 05:39:04'),
(186, 'Gatorade (710ml) Fruit Punch', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:39:08', '2018-03-28 11:39:10'),
(187, 'Gatorade (710ml) Lemon', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:39:22', '2018-03-27 09:39:22'),
(188, 'Gatorade (710ml) Orange', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:39:38', '2018-03-27 09:39:38'),
(189, 'Gatorade (710ml) Blue', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:39:55', '2018-03-27 09:39:55'),
(190, 'Gatorade (710ml) G2 Orange', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:40:09', '2018-03-27 09:40:09'),
(191, 'Gatorade (710ml) G2 Fruit Punch', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:40:27', '2018-03-27 09:40:27'),
(192, 'Gatorade (710ml) G2 Grape', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:40:45', '2018-03-27 09:40:45'),
(193, 'Milk 500ml', 2.29, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:40:58', '2018-03-27 09:42:32'),
(194, 'Chocolate Milk 500ml', 2.69, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:41:23', '2018-03-27 09:41:23'),
(195, 'Chocolate Milk 1L', 3.79, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:41:49', '2018-03-29 05:39:29'),
(196, 'Water 500ml', 2.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:42:02', '2018-03-27 09:42:02'),
(197, 'Water 1L', 3.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2018-03-27 09:42:17', '2018-03-29 05:39:46'),
(198, 'Chocolate Chip Cookie Dough', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:44:11', '2018-03-27 09:44:11'),
(199, 'Cotton Candy', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:44:21', '2018-03-27 09:44:21'),
(200, 'Grizzly Tracks', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:44:30', '2018-03-27 09:44:30'),
(201, 'Mint Chocolate Chip', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:44:42', '2018-03-27 09:44:42'),
(202, 'Mariner\'s Sea Salt Caramel', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:44:51', '2018-03-27 09:44:51'),
(203, 'Moon Mist', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:45:00', '2018-03-27 09:45:00'),
(204, 'Peanut Budder Bliss', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:45:11', '2018-03-27 09:45:11'),
(205, 'Peanut Butter Mudslide', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Ice Cream Sandwiches', NULL, 16, '2018-03-27 09:45:21', '2018-03-27 09:45:21'),
(206, 'Haagen Dazs Cookie Dough', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:48:15', '2018-04-03 13:24:21'),
(207, 'Haagen Dazs Strawberry', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:48:32', '2018-04-03 13:24:29'),
(208, 'Haagen Dazs Vanilla', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:48:50', '2018-04-03 13:24:37'),
(209, 'Haagen Dazs Chocolate', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:49:05', '2018-04-03 13:24:45'),
(210, 'Haagen Dazs Praline & Cream', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:49:20', '2018-04-03 13:24:55'),
(211, 'Haagen Dazs Caramel Cone Explosion', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:49:33', '2018-04-03 13:25:03'),
(212, 'Haagen Dazs Coffee', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:49:47', '2018-04-03 13:25:13'),
(213, 'Haagen Dazs Chocolate Peanut Butter', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Haagen Dazs (500 ml)', NULL, 16, '2018-03-27 09:50:08', '2018-04-03 13:25:26'),
(214, 'Ben & Jerry\'s Half Baked', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:50:43', '2018-04-06 06:18:08'),
(215, 'Ben & Jerry\'s Cherry Garcia', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:50:55', '2018-04-06 06:18:17'),
(216, 'Ben & Jerry\'s If I had 1,000,000 Flavors', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:51:08', '2018-04-06 06:19:00'),
(217, 'Ben & Jerry\'s Chocolate Fudge Brownie', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:51:21', '2018-04-06 06:19:09'),
(218, 'Ben & Jerry\'s Cookie Dough', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:51:32', '2018-04-06 06:19:18'),
(219, 'Ben & Jerry\'s Peanut Butter Half Baked', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:51:46', '2018-04-06 06:19:26'),
(220, 'Ben & Jerry\'s Chocolate Therapy', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 09:52:02', '2018-04-06 06:20:07'),
(222, 'Ben & Jerry\'s Chocolate Chip Cookie Dough', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 10:01:16', '2018-04-06 06:19:59'),
(223, 'Ben & Jerry\'s The Tonight Dough', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 10:02:00', '2018-04-06 06:19:51'),
(224, 'Ben & Jerry\'s P.B. & Cookies Non-Dairy', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 10:02:13', '2018-04-06 06:19:42'),
(225, 'Ben & Jerry\'s Coffee Caramel Fudge Non-Dairy', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ben & Jerry\'s (500 ml)', NULL, 16, '2018-03-27 10:02:27', '2018-04-06 06:19:34'),
(226, 'Ice Cream Sandwich MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:03:37', '2018-04-03 13:28:13'),
(227, 'Brownies on the Moon MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:03:47', '2018-04-03 13:28:32'),
(228, 'Chocolate Chip Cookie Dough MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:03:58', '2018-04-03 13:28:42'),
(229, 'Cotton Candy MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:04:09', '2018-04-03 13:28:50'),
(230, 'Grizzly Tracks MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:04:20', '2018-04-03 13:28:58'),
(231, 'Mint Chocolate Chip MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:04:30', '2018-04-03 13:28:23'),
(232, 'Mariner\'s Sea Salt Caramel MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:04:40', '2018-04-03 13:28:05'),
(233, 'Moon Mist MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:04:50', '2018-04-03 13:27:55'),
(234, 'Peanut Budder Bliss MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:05:00', '2018-04-03 13:27:44'),
(235, 'Peanut Butter Mudslide MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:05:11', '2018-04-03 13:27:37'),
(236, 'Strawberry MilkShake', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MilkShakes', NULL, 16, '2018-03-27 10:05:23', '2018-04-03 13:27:27'),
(237, 'Chicken Nachos Supreme', NULL, 9.99, NULL, 14.99, NULL, 0, 0, NULL, NULL, 1.99, 2.99, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Nacho Chips covered with melted Mozzarella and Cheddar Cheese topped with Chicken, Onions, Green Peppers, Tomatoes, and Olives. Served with Salsa and Sour Cream.', 8, '2018-03-27 10:07:48', '2018-04-06 08:33:23'),
(238, 'Cheese Calzone', 9.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese and pizza sauce. Served oven-baked or deep fried.', 9, '2018-03-27 10:13:49', '2018-04-09 06:29:27'),
(239, 'Vegetarian Calzone', 10.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese, pizza sauce, mushrooms, onions, tomatoes, green peppers, green and black olives. Served oven-baked or deep fried.', 9, '2018-03-27 10:14:16', '2018-04-09 06:29:38'),
(240, 'Hawaiian Calzone', 10.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese, pizza sauce, ham and pineapple. Served oven-baked or deep fried.', 9, '2018-03-27 10:14:40', '2018-04-06 08:35:31'),
(241, 'Pizza Calzone', 10.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, 1.99, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Folded pizza, lightly brushed with garlic butter and stuffed with mozzarella cheese, pizza sauce, salami, pepperoni, mushrooms, onions, green peppers and bacon. Served oven-baked or deep fried.', 9, '2018-03-27 10:15:07', '2018-04-06 08:35:41'),
(242, '2 Pc Chicken & Chips', 8.79, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-27 10:17:04', '2018-04-07 04:17:47'),
(243, '3 Pc Chicken & Chips', 10.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-27 10:17:15', '2018-04-07 04:18:02'),
(244, '10 Pc Chicken & Chips', 27.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-27 10:17:27', '2018-04-07 04:18:14'),
(245, '4 Chicken Strips & Chips', 8.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-27 10:17:41', '2018-04-07 04:18:26'),
(246, '6 Chicken Strips & Chips', 11.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-27 10:17:50', '2018-04-07 04:18:42'),
(247, '10 Chicken Strips & Chips', 19.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with your choice of sauce.', 3, '2018-03-27 10:18:01', '2018-04-07 04:18:55'),
(248, '20 Pc Chicken Wings', 19.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with chips, ranch and your choice of sauce.', 6, '2018-03-27 10:26:19', '2018-04-03 13:13:10'),
(249, '30 Pc Chicken Wings', 28.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with chips, ranch and your choice of sauce.', 6, '2018-03-27 10:26:48', '2018-04-03 13:13:19'),
(250, '40 Pc Chicken Wings', 35.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1.49, NULL, NULL, NULL, 'Served with chips, ranch and your choice of sauce.', 6, '2018-03-27 10:27:18', '2018-04-03 13:13:26'),
(251, 'BLT & Fries', 7.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Toasted bread filled with crispy bacon, lettuce, tomato and mayo.', 10, '2018-03-27 10:30:13', '2018-03-27 10:30:13'),
(252, 'Cheeseburger', 5.79, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8.49, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Single Beef Patty, Cheese, Mayo, Mustard, Ketchup, Lettuce, Onions, Tomatoes, Pickles', 15, '2018-03-27 10:31:57', '2018-03-27 10:31:57'),
(253, 'Bacon Cheeseburger', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8.99, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Single Beef Patty, Bacon, Cheese, Mayo, Mustard, Ketchup, Lettuce, Onions, Tomatoes, Pickles', 15, '2018-03-27 10:32:20', '2018-03-27 10:32:20'),
(254, 'Veggie Burger', 5.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8.49, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Veggie Patty, Mayo, Mustard, Ketchup, Lettuce, Onions, Tomatoes, Pickles', 15, '2018-03-27 10:32:49', '2018-03-27 10:32:49'),
(255, 'Chicken Burger', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8.49, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Chicken Strips, Mayo, Lettuce, Tomatoes', 15, '2018-03-27 10:33:16', '2018-03-27 10:33:16'),
(256, 'Donair Burger', 5.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8.99, NULL, NULL, NULL, NULL, 'Toasted Hamburger Buns, Donair Meat, Tomatoes, Onions, Donair Sauce', 15, '2018-03-27 10:33:43', '2018-03-27 10:33:43'),
(257, 'Salsa', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:37:40', '2018-04-03 13:18:14'),
(258, 'Honey Garlic', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:37:53', '2018-04-03 13:18:21'),
(259, 'Honey Mustard', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:38:09', '2018-04-03 13:18:28'),
(260, 'BBQ', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:38:23', '2018-04-03 13:18:35'),
(261, 'Sweet & Sour', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:38:37', '2018-04-03 13:18:42'),
(262, 'Mild', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:38:58', '2018-04-03 13:18:47'),
(263, 'Medium', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:39:25', '2018-04-03 13:18:54'),
(264, 'Daves Hot Sauce', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:39:47', '2018-04-03 13:19:01'),
(265, 'Sour Cream', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-03-27 10:40:01', '2018-04-06 06:16:47'),
(266, 'Poutine', NULL, 6.99, NULL, 9.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Crispy Fries, Mozzarella Cheese, Homemade Gravy', 13, '2018-03-27 10:42:12', '2018-03-27 10:42:12'),
(267, 'Donair Poutine', NULL, 7.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Donair Meat, Crispy Fries, Mozzarella Cheese, Homemade Gravy', 13, '2018-03-27 10:42:41', '2018-03-27 10:42:41'),
(268, 'Chicken Poutine', NULL, 7.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chicken, Crispy Fries, Mozzarella Cheese, Homemade Gravy', 13, '2018-03-27 10:43:02', '2018-03-27 10:43:02'),
(269, 'Shawarma Poutine', NULL, 7.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chicken Shawarma, Crispy Fries, Mozzarella Cheese, Homemade Gravy, Homemade Garlic Sauce', 13, '2018-03-27 10:43:27', '2018-04-09 06:28:15'),
(270, 'Works Poutine', NULL, 7.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Salami, Pepperoni, Bacon, Grilled Onions, Grilled Mushrooms, Grilled Green Peppers, Crispy Fries, Mozzarella Cheese, Homemade Gravy', 13, '2018-03-27 10:43:51', '2018-03-27 10:43:51'),
(271, 'Montreal Poutine', NULL, 8.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Crispy Fries, Cheese Curds, Homemade Gravy', 13, '2018-03-27 10:44:10', '2018-03-27 10:44:10'),
(272, 'Triple A Poutine', NULL, 8.99, NULL, 11.99, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Crispy Fries, Mozzarella Cheese, Cheese Curds, Homemade Gravy', 13, '2018-03-27 10:44:29', '2018-03-27 10:44:29'),
(273, '1 Pc Fish & Chips', 6.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Served with tartar sauce.', 14, '2018-03-27 10:46:14', '2018-04-06 06:11:14'),
(274, '2 Pc Fish & Chips', 8.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Served with tartar sauce.', 14, '2018-03-27 10:46:40', '2018-04-06 06:11:23'),
(275, '3 Pc Fish & Chips', 10.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2.99, NULL, NULL, NULL, NULL, NULL, 'Served with tartar sauce.', 14, '2018-03-27 10:47:00', '2018-04-06 06:14:52'),
(276, 'Clam Strips & Fries', 9.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Served with tartar sauce.', 14, '2018-03-27 10:47:29', '2018-03-27 10:47:29'),
(277, 'Seafood Platter', 14.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Clam Strips, 2 Pcs Fish, 4 Scallops, Fries', 14, '2018-03-27 10:47:52', '2018-04-06 06:14:25'),
(278, 'Doritos Nacho Cheese', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:05:09', '2018-03-27 11:05:09'),
(279, 'Doritos Sweet Chili', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:05:18', '2018-03-27 11:05:18'),
(280, 'Doritos Spicy Heat', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:05:27', '2018-03-27 11:05:27'),
(281, 'Doritos Jalapeno Cheddar', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:05:35', '2018-03-27 11:05:35'),
(282, 'Doritos Zesty Cheese', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:05:42', '2018-03-27 11:05:56'),
(283, 'Doritos Cool Ranch', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:06:21', '2018-03-27 11:06:21'),
(284, 'Doritos BBQ', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:06:30', '2018-03-27 11:06:30'),
(285, 'Smart Food White Cheddar', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:06:39', '2018-03-27 11:06:39'),
(286, 'Smart Food Sweet & Salty', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:06:48', '2018-03-27 11:06:48'),
(287, 'Lays Classic', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:06:56', '2018-03-27 11:06:56'),
(288, 'Lays Wavy', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:03', '2018-03-27 11:07:03'),
(289, 'Lays Ketchup', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:12', '2018-03-27 11:07:12'),
(290, 'Lays Sour Cream & Onion', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:20', '2018-03-27 11:07:20'),
(291, 'Lays BBQ', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:29', '2018-03-27 11:07:29'),
(292, 'Lays Salt & Vinegar', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:39', '2018-03-27 11:07:39'),
(293, 'Lays Dill Pickle', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:51', '2018-03-27 11:07:51'),
(294, 'Ruffles Regular', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:07:59', '2018-03-27 11:07:59'),
(295, 'Ruffles All Dressed', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:07', '2018-03-27 11:08:07'),
(296, 'Ruffles BBQ', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:15', '2018-03-27 11:08:15'),
(297, 'Ruffles Sour Cream & Onion', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:25', '2018-03-27 11:08:25'),
(298, 'Miss Vickies Original', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:33', '2018-03-27 11:08:33'),
(299, 'Miss Vickies Salt & Vinegar', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:41', '2018-03-27 11:08:41'),
(300, 'Miss Vickies Sweet Sweet Chili & Sour Cream', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:48', '2018-03-27 11:08:48');
INSERT INTO `products` (`id`, `name`, `price`, `small`, `medium`, `large`, `xlg`, `topping_num`, `premium_num`, `small_size`, `large_size`, `extra_small`, `extra_large`, `extra_cheese`, `extra_meat`, `donair_small`, `donair_large`, `specialty`, `extra_piece`, `platter`, `homemade_garlic_souce`, `options_for_souce`, `drink_size`, `product_ctgy`, `descriptions`, `category_id`, `created_at`, `updated_at`) VALUES
(301, 'Miss Vickies Balsamic Vinegar & Sweet Onion', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:08:56', '2018-03-27 11:08:56'),
(302, 'Sun Chips Harvest Cheddar', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:07', '2018-03-27 11:09:07'),
(303, 'Sun Chips French Onion', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:15', '2018-03-27 11:09:15'),
(304, 'Cheetos Puffs', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:23', '2018-03-27 11:09:23'),
(305, 'Cheetos Crunchy', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:31', '2018-03-27 11:09:31'),
(306, 'Cheetos Cheddar Jalapeno', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:39', '2018-03-27 11:09:39'),
(307, 'Hickory Sticks', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:48', '2018-03-27 11:09:48'),
(308, 'Rold Gold', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chips', NULL, 18, '2018-03-27 11:09:56', '2018-03-27 11:09:56'),
(309, 'Bounty', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:10:36', '2018-03-27 11:10:36'),
(310, 'Crunchy', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:10:48', '2018-03-27 11:10:48'),
(311, 'Crispy Crunch', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:10:58', '2018-03-27 11:10:58'),
(312, 'Caramilk', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:11:08', '2018-03-27 11:11:08'),
(313, 'Aero', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:11:17', '2018-03-27 11:11:17'),
(314, 'Mr. Big', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:11:27', '2018-03-27 11:11:27'),
(315, 'Glosette Peanut', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:11:42', '2018-03-27 11:11:42'),
(316, 'Glosette Almond', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:11:53', '2018-03-27 11:11:53'),
(317, 'Glosette Raisins', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:12:05', '2018-03-27 11:12:05'),
(318, 'Twix', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:12:15', '2018-03-27 11:12:15'),
(319, 'Snickers', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:12:26', '2018-03-27 11:12:26'),
(320, 'Mars', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:12:37', '2018-03-27 11:12:37'),
(321, 'M&Ms', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:12:48', '2018-03-27 11:12:48'),
(322, 'Smarties', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:13:00', '2018-03-27 11:13:00'),
(323, 'Reese\'s Pieces', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:13:09', '2018-03-27 11:13:09'),
(324, 'Reese\'s Peanut Butter Cups', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:13:20', '2018-03-27 11:13:20'),
(325, 'Reese\'s Big Cup', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:13:32', '2018-03-27 11:13:32'),
(326, 'Reese\'s Pieces Big Cup', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:13:42', '2018-03-27 11:13:42'),
(327, 'KitKat', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:13:52', '2018-03-27 11:13:52'),
(328, 'KitKat Chunky', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:14:03', '2018-03-27 11:14:03'),
(329, 'OH Henry', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:14:13', '2018-03-27 11:14:13'),
(330, 'Hershey\'s Cookies n Cream', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:14:23', '2018-03-27 11:14:23'),
(331, 'Skor', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:14:33', '2018-03-27 11:14:33'),
(332, 'Eat-More', 2.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chocolate Bars', NULL, 18, '2018-03-27 11:14:48', '2018-03-27 11:14:48'),
(333, 'Create Your Own Pizza', NULL, 8.99, 10.99, 13.99, 16.99, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Express Yourself! Customize your pizza the way you like it.', 2, '2018-03-27 11:33:38', '2018-04-03 13:01:21'),
(334, 'Cheese Pizza', NULL, 8.99, 10.99, 13.99, 16.99, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese', 2, '2018-03-27 11:37:29', '2018-04-03 13:06:20'),
(335, 'Vegetarian Pizza', NULL, 10.99, 14.99, 18.99, 21.99, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Mushrooms, Onions, Green Peppers, Tomatoes, Green Olives, Black Olives, Oregano, Basil, Olive Oil', 2, '2018-03-27 11:39:54', '2018-04-03 13:03:19'),
(336, 'Pepperoni Pizza', NULL, 10.99, 13.99, 15.99, 18.99, 2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Pepperoni', 2, '2018-03-27 11:40:41', '2018-04-03 13:03:31'),
(337, 'Hawaiian Pizza', NULL, 10.99, 14.99, 18.99, 22.99, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Ham, Pineapple', 2, '2018-03-27 11:41:31', '2018-04-03 13:03:38'),
(338, 'Greek Pizza', NULL, 10.99, 14.99, 18.99, 22.99, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Onions, Tomatoes, Feta Cheese, Black Olives, Olive Oil, Basil, Oregano', 2, '2018-03-27 11:42:47', '2018-04-03 13:03:45'),
(339, 'Canadian Classic Pizza', NULL, 10.99, 14.99, 18.99, 22.99, 4, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Sweet Pizza Sauce, Mozzarella Cheese, Pepperoni, Mushrooms, Bacon', 2, '2018-03-27 11:43:33', '2018-04-03 13:03:59'),
(340, 'Works Pizza', NULL, 10.99, 15.99, 19.99, 23.99, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Pepperoni, Salami, Bacon, Mushrooms, Onions, Green Peppers', 2, '2018-03-27 11:44:30', '2018-04-03 13:04:09'),
(341, 'Donair Pizza', NULL, 11.49, 16.99, 20.99, 24.99, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Donair Meat, Onions, Tomatoes', 2, '2018-03-27 11:45:24', '2018-04-04 12:03:25'),
(342, 'Cheese Lovers Pizza', NULL, 11.49, 16.99, 20.99, 24.99, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Cheddar Cheese, Parmesan Cheese, Feta Cheese', 2, '2018-03-27 11:46:23', '2018-04-03 13:04:27'),
(343, 'BBQ Chicken Pizza', NULL, 11.49, 16.99, 20.99, 24.99, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Chicken, BBQ Sauce, Onions, Tomates, Green Peppers', 2, '2018-03-27 11:47:21', '2018-04-03 13:05:26'),
(344, 'Meat Lovers Pizza', NULL, 11.49, 16.99, 20.99, 24.99, 7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Pepperoni, Salami, Bacon, Italian Sausage, Ham, Ground Beef', 2, '2018-03-27 11:48:32', '2018-04-03 13:05:42'),
(345, 'Poutine Pizza', NULL, 10.99, 14.99, 18.99, 22.99, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Crispy Fries, Homemade Gravy', 2, '2018-03-27 11:50:57', '2018-03-27 11:50:57'),
(346, 'Mediterranean Pizza', NULL, 11.99, 14.99, 21.99, 24.99, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Homemade Pizza Sauce, Mozzarella Cheese, Green Peppers, Red Peppers, Onions, Tomatoes, Black Olives, Green Olives, Artichokes, Feta Cheese, Oregano, Basil', 2, '2018-03-27 11:52:25', '2018-04-03 13:05:54'),
(347, 'Shawarma Pizza', NULL, 11.99, 16.99, 21.99, 24.99, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chicken Shawarma, Mozzarella Cheese, Onions, Tomatoes, Crispy Fries, Homemade Garlic Sauce', 2, '2018-03-27 11:53:21', '2018-03-27 11:53:21'),
(348, 'Shish Taouk Pizza', NULL, 11.99, 16.99, 21.99, 24.99, 3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Chicken Marinated in Triple A\'s Special Seasoning, Mozzarella Cheese, Onions, Tomatoes, Crispy Fries, Homemade Garlic Sauce', 2, '2018-03-27 11:54:10', '2018-03-27 11:54:10'),
(349, 'Small Donair Sauce', 1.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-04-03 13:20:35', '2018-04-03 13:20:35'),
(350, 'Large Donair Sauce', 3.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2018-04-03 13:20:46', '2018-04-03 13:20:46'),
(351, 'Red Bull Small', 3.49, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-04-06 06:25:45', '2018-04-07 04:11:40'),
(352, 'Red Bull Medium', 4.29, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-04-09 06:48:53', '2018-04-09 06:48:53'),
(353, 'Red Bull Large', 4.99, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500ml', NULL, NULL, 17, '2018-04-09 06:49:07', '2018-04-09 06:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL),
(2, 'workman', 'Workman', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `product1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pizza1size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pizza1toppings` int(11) DEFAULT NULL,
  `product2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pizza2size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pizza2toppings` int(11) DEFAULT NULL,
  `product3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product3category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product3size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product4category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product4size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product5size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product6size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `name`, `descriptions`, `price`, `product1`, `pizza1size`, `pizza1toppings`, `product2`, `pizza2size`, `pizza2toppings`, `product3`, `product3category`, `product3size`, `product4`, `product4category`, `product4size`, `product5`, `product5size`, `product6`, `product6size`, `created_at`, `updated_at`) VALUES
(1, 'Special #1', '2 Large 16” Pepperoni Pizzas', 27.99, 'Pepperoni Pizza', 'Large (16\")', NULL, 'Pepperoni Pizza', 'Large (16\")', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-28 10:11:17', '2018-04-20 09:00:01'),
(2, 'Special #2', '2 Regular Poutines + 2 Cans of Pop', 13.99, NULL, NULL, NULL, NULL, NULL, NULL, 'Poutine', 'Poutine', 'Regular', 'Poutine', 'Poutine', 'Regular', 'Drinks', 'Can', 'Drinks', 'Can', '2018-03-28 10:51:27', '2018-04-06 06:28:55'),
(3, 'Special #3', '2 Medium 12” Pizzas (4 Toppings)', 26.99, 'Cheese', 'Medium (12\")', 4, 'Cheese', 'Medium (12\")', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-28 12:23:16', '2018-04-03 12:47:15'),
(4, 'Special #4', 'Large 16” Pizza (4 Toppings) + Medium 12” Garlic Fingers + 2L Pop', 29.99, 'Cheese', 'Large (16\")', 4, NULL, NULL, NULL, 'Garlic Fingers', NULL, 'Medium (12\")', NULL, NULL, NULL, 'Drinks', '2l', NULL, NULL, '2018-03-28 12:09:16', '2018-03-29 09:51:53'),
(5, 'Special #5', 'Medium 12” Pizza (4 Toppings) + Medium 12” Garlic Fingers', 25.99, 'Cheese', 'Medium (12\")', 4, NULL, NULL, NULL, 'Garlic Fingers', NULL, 'Medium (12\")', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-28 10:36:06', '2018-04-02 08:34:07'),
(6, 'Special #6', 'Large 16” Pizza (4 Toppings) + 10 Chicken Wings + 2L Pop', 29.99, 'Cheese', 'Large (16\")', 4, NULL, NULL, NULL, NULL, NULL, NULL, '10 Pc Chicken Wings', 'Chicken Wings', NULL, 'Drinks', '2l', NULL, NULL, '2018-03-28 11:53:24', '2018-04-02 08:51:08'),
(7, 'Special #7', 'Large 16” Pepperoni Pizza + Medium 12” Garlic Fingers', 23.99, 'Pepperoni', 'Large (16\")', NULL, NULL, NULL, NULL, 'Garlic Fingers', NULL, 'Medium (12\")', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-28 10:44:29', '2018-04-03 10:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buzzer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_card_number` text COLLATE utf8mb4_unicode_ci,
  `expiry_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expiry_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` text COLLATE utf8mb4_unicode_ci,
  `points` int(11) DEFAULT NULL,
  `used_points` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `email_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifyToken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `birthday`, `address`, `street_number`, `buzzer`, `apartment_number`, `postal_code`, `credit_card_number`, `expiry_month`, `expiry_year`, `cvv`, `points`, `used_points`, `status`, `email_status`, `verifyToken`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Aleksandar', 'Potic', 'aleksandar1995potic@gmail.com', '0665064004', '$2y$10$OPTOQmfmIgOZYqldIta6J.EVM/vLTntGvxgFPM3NQsre3WLGB3qYK', '1995-09-29', 'Adresa1', '12', NULL, NULL, '121212', 'eyJpdiI6IkhuUzFzQ284VUJ0dkVNc3pDSVVkVXc9PSIsInZhbHVlIjoidTh3VUtHdzZ6MnZUbFwvSFFqWHNwZ1E9PSIsIm1hYyI6IjY5MGExZjc1Y2IzYjMzNWFmMjA4NjQ2ZDA4MTViN2E5ZjBjZjFiN2M3MDgxZTE2MTFlOWYxMWRkYTE5ZjI3NjEifQ==', '01', '18', 'eyJpdiI6Im9GRnhTWVwvWERwMkU2ek9rTUVSRk9nPT0iLCJ2YWx1ZSI6IkY2YjA2Y2tSbFlRdGRDd2s3MXBiUWc9PSIsIm1hYyI6Ijk3MDg0NGQzN2QzNTY2NDFiM2VkZjA4ZTllZWQzOWQ1Y2U2Y2M5Y2I1MWQ3ZWY5MWIxMjY3YjBiMmY5NTMzYTYifQ==', 3, 0, 1, 'Yes', NULL, 'egZWEiBD1QpTU5zzthniLuHNv0BtQmqlAql5jiQTpNQ9PX3dsU4piKCNRRHH', '2018-06-01 11:47:20', '2018-06-14 14:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `working_times`
--

CREATE TABLE `working_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_times`
--

INSERT INTO `working_times` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'on_off', 1, NULL, '2018-04-09 08:48:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customizes`
--
ALTER TABLE `customizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `finished_orders`
--
ALTER TABLE `finished_orders`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `postal_codes_postal_code_unique` (`postal_code`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specials_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `working_times`
--
ALTER TABLE `working_times`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customizes`
--
ALTER TABLE `customizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `finished_orders`
--
ALTER TABLE `finished_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `working_times`
--
ALTER TABLE `working_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
