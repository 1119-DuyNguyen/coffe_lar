-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 23, 2023 lúc 10:37 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecom_lar`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `logo`, `name`, `slug`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(4, 'uploads/media_644897a747a6e.jpg', 'Canon', 'canon', 0, 1, '2023-04-24 09:52:19', '2023-05-07 22:52:54'),
(5, 'uploads/media_644897a20c397.png', 'DJI', 'dji', 0, 1, '2023-04-24 09:53:14', '2023-04-25 21:18:05'),
(6, 'uploads/media_6448979d64984.jpg', 'gopro', 'gopro', 0, 1, '2023-04-24 09:53:46', '2023-05-07 22:51:33'),
(7, 'uploads/media_644897980f6ba.png', 'Pantax', 'pantax', 0, 1, '2023-04-24 09:54:51', '2023-04-25 21:18:08'),
(8, 'uploads/media_64489792ba531.jpg', 'MSI', 'msi', 1, 0, '2023-04-25 03:18:02', '2023-05-07 22:52:00'),
(9, 'uploads/media_64587fc52e0e8.jpg', 'ASUS', 'asus', 1, 1, '2023-04-25 03:18:18', '2023-05-07 22:51:17'),
(10, 'uploads/media_64587fa3a492b.jpg', 'LENOVO', 'lenovo', 1, 1, '2023-04-25 03:18:32', '2023-05-07 22:50:57'),
(11, 'uploads/media_64587f97097b1.jpg', 'Acer', 'acer', 1, 1, '2023-04-25 03:23:59', '2023-05-07 22:50:31'),
(12, 'uploads/media_64578dd29ae43.jpg', 'Apolo fashion', 'apolo-fashion', 1, 1, '2023-05-07 05:38:58', '2023-05-07 05:38:58'),
(13, 'uploads/media_64578e3ab91dc.jpg', 'women fashion', 'women-fashion', 1, 1, '2023-05-07 05:39:27', '2023-05-07 05:40:42'),
(14, 'uploads/media_64578e00ce00f.jpg', 'Indiana', 'indiana', 1, 1, '2023-05-07 05:39:44', '2023-05-07 05:39:44'),
(15, 'uploads/media_64586c94c48c3.jpg', 'Womens Fashion', 'womens-fashion', 1, 1, '2023-05-07 21:29:24', '2023-05-07 21:29:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Electronics', 'electronics', 'fas fa-mobile-alt', 1, '2023-04-24 09:43:07', '2023-04-24 09:43:07'),
(11, 'Mens Fashion', 'mens-fashion', 'fas fa-tshirt', 1, '2023-05-07 05:31:57', '2023-05-07 05:31:57'),
(12, 'Womens Fashion', 'womens-fashion', 'fas fa-star', 1, '2023-05-07 21:30:18', '2023-05-07 21:30:18'),
(13, 'Shoes', 'shoes', 'fas fa-shoe-prints', 1, '2023-05-07 21:32:22', '2023-05-07 21:32:22'),
(14, 'Health and Beauty', 'health-and-beauty', 'fas fa-hands-helping', 1, '2023-05-07 22:26:57', '2023-05-07 22:26:57'),
(15, 'Groceries', 'groceries', 'fas fa-layer-group', 1, '2023-05-07 22:27:21', '2023-05-07 22:27:21'),
(16, 'Home and Life', 'home-and-life', 'fas fa-home', 1, '2023-05-07 22:27:49', '2023-05-07 22:27:49'),
(17, 'Sports and Outdoors', 'sports-and-outdoors', 'fab fa-hubspot', 1, '2023-05-07 22:28:39', '2023-05-07 22:28:39'),
(18, 'Automotive', 'automotive', 'fas fa-car-alt', 1, '2023-05-07 22:28:55', '2023-05-07 22:28:55'),
(19, 'Babies and Toys', 'babies-and-toys', 'fas fa-atom', 1, '2023-05-07 22:29:22', '2023-05-08 04:45:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `child_categories`
--

DROP TABLE IF EXISTS `child_categories`;
CREATE TABLE `child_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `child_categories`
--

INSERT INTO `child_categories` (`id`, `sub_category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(11, 13, 'Canon', 'canon', 1, '2023-04-24 09:44:29', '2023-04-24 09:44:29'),
(12, 13, 'DJI', 'dji', 1, '2023-04-24 09:44:44', '2023-04-24 09:44:44'),
(13, 13, 'GoPro', 'gopro', 1, '2023-04-24 09:45:05', '2023-04-24 09:45:05'),
(14, 13, 'Pentax', 'pentax', 1, '2023-04-24 09:45:48', '2023-04-24 09:45:48'),
(15, 14, 'Acer', 'acer', 1, '2023-04-24 09:46:16', '2023-04-24 09:46:16'),
(16, 14, 'ASUS', 'asus', 1, '2023-04-24 09:46:31', '2023-04-24 09:46:31'),
(17, 14, 'Lenovo', 'lenovo', 1, '2023-04-24 09:46:55', '2023-04-24 09:46:55'),
(18, 14, 'MSI', 'msi', 1, '2023-04-24 09:47:15', '2023-04-24 09:47:15'),
(19, 15, 'Google Pixel', 'google-pixel', 1, '2023-04-24 09:49:06', '2023-04-24 09:49:06'),
(20, 15, 'One Plus', 'one-plus', 1, '2023-04-24 09:49:29', '2023-04-24 09:49:29'),
(21, 15, 'SAMSUNG', 'samsung', 1, '2023-04-24 09:49:46', '2023-04-24 09:49:46'),
(22, 15, 'Sony Xperia', 'sony-xperia', 1, '2023-04-24 09:50:05', '2023-05-07 04:39:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `total_used` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `quantity`, `start_date`, `end_date`, `discount_type`, `discount`, `status`, `total_used`, `created_at`, `updated_at`) VALUES
(2, '50% discount', 'OFFER30', 1000, '2023-04-05', '2023-04-29', 'percent', 50, 1, 0, '2023-04-04 04:33:04', '2023-04-10 02:00:58'),
(3, 'Flat 100 discount', 'Flat100', 1000, '2023-04-09', '2023-05-31', 'amount', 100, 1, 0, '2023-04-10 04:57:00', '2023-05-04 05:17:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `featured_products`
--

DROP TABLE IF EXISTS `featured_products`;
CREATE TABLE `featured_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `show_at_home` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `featured_products`
--

INSERT INTO `featured_products` (`id`, `product_id`, `show_at_home`, `status`, `created_at`, `updated_at`) VALUES
(6, 23, 1, 1, '2023-04-25 21:19:41', '2023-04-25 21:19:41'),
(7, 12, 1, 1, '2023-04-25 21:20:00', '2023-04-25 21:20:00'),
(8, 13, 1, 1, '2023-04-25 21:20:13', '2023-04-25 21:20:13'),
(9, 20, 1, 1, '2023-04-25 21:20:21', '2023-04-25 21:20:21'),
(10, 15, 1, 1, '2023-04-25 21:20:46', '2023-04-25 21:20:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sub_total` double NOT NULL,
  `amount` double NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int NOT NULL,
  `order_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shpping_method` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `sub_total`, `amount`, `currency_name`, `currency_icon`, `product_qty`, `payment_method`, `payment_status`, `order_address`, `shpping_method`, `coupon`, `order_status`, `created_at`, `updated_at`) VALUES
(7, 3, 3000, 3000, 'USD', '$', 1, 'paypal', 1, '{\"id\":3,\"user_id\":3,\"name\":\"Jhon Deo\",\"email\":\"test@gmail.com\",\"phone\":\"+8801960000000\",\"country\":\"United States\",\"state\":\"test\",\"city\":\"California\",\"zip\":\"423432\",\"address\":\"1731 Arbor Court Rawlins, WY 82301\",\"created_at\":\"2023-04-11T05:28:49.000000Z\",\"updated_at\":\"2023-04-11T05:28:49.000000Z\"}', '{\"id\":3,\"name\":\"Free Shipping\",\"type\":\"min_cost\",\"cost\":0}', 'null', 'delivered', '2023-04-29 23:00:06', '2023-05-02 05:41:14'),
(8, 3, 250, 200, 'USD', '$', 1, 'stripe', 1, '{\"id\":3,\"user_id\":3,\"name\":\"Jhon Deo\",\"email\":\"test@gmail.com\",\"phone\":\"+8801960000000\",\"country\":\"United States\",\"state\":\"test\",\"city\":\"California\",\"zip\":\"423432\",\"address\":\"1731 Arbor Court Rawlins, WY 82301\",\"created_at\":\"2023-04-11T05:28:49.000000Z\",\"updated_at\":\"2023-04-11T05:28:49.000000Z\"}', '{\"id\":1,\"name\":\"Express\\u00a0Delivery\",\"type\":\"flat_cost\",\"cost\":50}', '{\"coupon_name\":\"Flat 100 discount\",\"coupon_code\":\"Flat100\",\"discount_type\":\"amount\",\"discount\":100}', 'delivered', '2023-05-04 05:20:12', '2023-05-04 05:25:43'),
(9, 3, 3000, 3000, 'USD', '$', 1, 'COD', 1, '{\"id\":3,\"user_id\":3,\"name\":\"Jhon Deo\",\"email\":\"test@gmail.com\",\"phone\":\"+8801960000000\",\"country\":\"United States\",\"state\":\"test\",\"city\":\"California\",\"zip\":\"423432\",\"address\":\"1731 Arbor Court Rawlins, WY 82301\",\"created_at\":\"2023-04-11T05:28:49.000000Z\",\"updated_at\":\"2023-04-11T05:28:49.000000Z\"}', '{\"id\":3,\"name\":\"Free Shipping\",\"type\":\"min_cost\",\"cost\":0}', 'null', 'delivered', '2023-05-06 00:57:16', '2023-05-08 05:00:24'),
(11, 3, 560, 510, 'USD', '$', 1, 'paypal', 1, '{\"id\":2,\"user_id\":3,\"name\":\"Erasmus Hutchinson\",\"email\":\"user@gmail.com\",\"phone\":\"+1 (448) 117-4101\",\"country\":\"United States\",\"state\":\"California\",\"city\":\"California\",\"zip\":\"64842\",\"address\":\"Ipsum ad in accusamu\",\"created_at\":\"2023-04-05T10:45:24.000000Z\",\"updated_at\":\"2023-04-05T10:45:24.000000Z\"}', '{\"id\":1,\"name\":\"Express\\u00a0Delivery\",\"type\":\"flat_cost\",\"cost\":50}', '{\"coupon_name\":\"Flat 100 discount\",\"coupon_code\":\"Flat100\",\"discount_type\":\"amount\",\"discount\":100}', 'pending', '2023-05-08 04:33:54', '2023-05-08 04:33:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variants` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `variant_total` int DEFAULT NULL,
  `unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `variants`, `variant_total`, `unit_price`, `qty`, `created_at`, `updated_at`) VALUES
(12, 7, 23, 'ASUS TUF Gaming F15 (2022) Gaming Laptop, 15.6” FHD 144Hz Display, GeForce RTX', '[]', 0, '3000', 1, '2023-04-29 23:00:06', '2023-04-29 23:00:06'),
(13, 8, 24, 'Wrangler Men\'s Iconic Denim Regular Fit Snap Shirt', '[]', 0, '250', 1, '2023-05-04 05:20:13', '2023-05-04 05:20:13'),
(14, 9, 23, 'ASUS TUF Gaming F15 (2022) Gaming Laptop, 15.6” FHD 144Hz Display, GeForce RTX', '[]', 0, '3000', 1, '2023-05-06 00:57:16', '2023-05-06 00:57:16'),
(16, 11, 12, 'DJI Osmo Action 3 Standard Combo, Waterproof Action Camera with 4K HDR', '[]', 0, '280', 2, '2023-05-08 04:33:54', '2023-05-08 04:33:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin.user.index', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(2, 'admin.user.store', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(3, 'admin.user.show', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(4, 'admin.user.update', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(5, 'admin.user.destroy', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(6, 'admin.brand.index', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(7, 'admin.brand.store', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(8, 'admin.brand.show', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(9, 'admin.brand.update', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(10, 'admin.brand.destroy', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(11, 'admin.category.index', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(12, 'admin.category.store', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(13, 'admin.category.show', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(14, 'admin.category.update', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(15, 'admin.category.destroy', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(16, 'admin.sub-category.index', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(17, 'admin.sub-category.store', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(18, 'admin.sub-category.show', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(19, 'admin.sub-category.update', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(20, 'admin.sub-category.destroy', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(21, 'admin.child-category.index', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(22, 'admin.child-category.store', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(23, 'admin.child-category.show', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(24, 'admin.child-category.update', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(25, 'admin.child-category.destroy', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(26, 'admin.product.index', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(27, 'admin.product.store', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(28, 'admin.product.show', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(29, 'admin.product.update', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(30, 'admin.product.destroy', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(31, 'admin.slider.index', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(32, 'admin.slider.store', NULL, '2023-08-22 19:34:47', '2023-08-22 19:34:47'),
(33, 'admin.slider.show', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(34, 'admin.slider.update', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(35, 'admin.slider.destroy', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(36, 'admin.coupon.index', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(37, 'admin.coupon.store', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(38, 'admin.coupon.show', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(39, 'admin.coupon.update', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(40, 'admin.coupon.destroy', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(41, 'admin.order.index', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(42, 'admin.order.store', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(43, 'admin.order.show', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(44, 'admin.order.update', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(45, 'admin.order.destroy', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(46, 'admin.featured-product.index', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(47, 'admin.featured-product.store', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(48, 'admin.featured-product.show', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(49, 'admin.featured-product.update', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(50, 'admin.featured-product.destroy', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(51, 'admin.role.index', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(52, 'admin.role.store', NULL, '2023-08-22 19:34:48', '2023-08-22 19:34:48'),
(53, 'admin.role.show', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(54, 'admin.role.update', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(55, 'admin.role.destroy', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(56, 'admin.setting.index', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(57, 'admin.general-setting.update', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(58, 'admin.logo-setting.update', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(59, 'admin.dashboard.index', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(60, 'user.dashboard.index', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(61, 'user.order.index', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(62, 'user.order.show', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49'),
(63, 'user.cod.payment', NULL, '2023-08-22 19:34:49', '2023-08-22 19:34:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 2, NULL, NULL),
(1, 3, NULL, NULL),
(1, 4, NULL, NULL),
(1, 5, NULL, NULL),
(1, 6, NULL, NULL),
(1, 7, NULL, NULL),
(1, 8, NULL, NULL),
(1, 9, NULL, NULL),
(1, 10, NULL, NULL),
(1, 11, NULL, NULL),
(1, 12, NULL, NULL),
(1, 13, NULL, NULL),
(1, 14, NULL, NULL),
(1, 15, NULL, NULL),
(1, 16, NULL, NULL),
(1, 17, NULL, NULL),
(1, 18, NULL, NULL),
(1, 19, NULL, NULL),
(1, 20, NULL, NULL),
(1, 21, NULL, NULL),
(1, 22, NULL, NULL),
(1, 23, NULL, NULL),
(1, 24, NULL, NULL),
(1, 25, NULL, NULL),
(1, 26, NULL, NULL),
(1, 27, NULL, NULL),
(1, 28, NULL, NULL),
(1, 29, NULL, NULL),
(1, 30, NULL, NULL),
(1, 31, NULL, NULL),
(1, 32, NULL, NULL),
(1, 33, NULL, NULL),
(1, 34, NULL, NULL),
(1, 35, NULL, NULL),
(1, 36, NULL, NULL),
(1, 37, NULL, NULL),
(1, 38, NULL, NULL),
(1, 39, NULL, NULL),
(1, 40, NULL, NULL),
(1, 41, NULL, NULL),
(1, 42, NULL, NULL),
(1, 43, NULL, NULL),
(1, 44, NULL, NULL),
(1, 45, NULL, NULL),
(1, 46, NULL, NULL),
(1, 47, NULL, NULL),
(1, 48, NULL, NULL),
(1, 49, NULL, NULL),
(1, 50, NULL, NULL),
(1, 51, NULL, NULL),
(1, 52, NULL, NULL),
(1, 53, NULL, NULL),
(1, 54, NULL, NULL),
(1, 55, NULL, NULL),
(1, 56, NULL, NULL),
(1, 57, NULL, NULL),
(1, 58, NULL, NULL),
(1, 59, NULL, NULL),
(1, 60, NULL, NULL),
(1, 61, NULL, NULL),
(1, 62, NULL, NULL),
(1, 63, NULL, NULL),
(2, 60, NULL, NULL),
(2, 61, NULL, NULL),
(2, 62, NULL, NULL),
(2, 63, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `sub_category_id` bigint UNSIGNED DEFAULT NULL,
  `child_category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED NOT NULL,
  `qty` int UNSIGNED NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `offer_price` double DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_end_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `vendor_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `qty`, `short_description`, `long_description`, `price`, `offer_price`, `offer_start_date`, `offer_end_date`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Canon EOS Rebel SL3 Digital SLR Camera with EF-S 18-55mm Lens kit', 'canon-eos-rebel-sl3-digital-slr-camera-with-ef-s-18-55mm-lens-kit', 'uploads/media_6446a86d168e0.JPG', 1, 10, 13, 11, 4, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and lightweight camera that is perfect for capturing high-quality photos and videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image Processor, this camera delivers stunning image quality with excellent detail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel CMOS AF, which provides fast and accurate autofocus during both photo and video shooting. This makes it easy to capture the perfect shot, even when your subject is moving.</p><p>This camera is also equipped with a Vari-angle Touchscreen LCD that can be rotated to various angles for easy framing and shooting at different angles. The touchscreen interface is intuitive and user-friendly, making it easy to access the camera\'s many features and settings.</p><p>In addition, the EOS Rebel SL3 offers built-in Wi-Fi and Bluetooth connectivity, allowing you to easily transfer photos and videos to your smart devices or share them on social media. The camera also includes a built-in feature guide to help you learn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 300, 290, '2023-04-24', '2023-08-12', 1, '2023-04-24 10:03:57', '2023-04-25 23:05:19'),
(10, 'Canon EOS Rebel T7 DSLR Camera with 18-55mm Lens _ Built-in Wi-Fi _ 24.1 MP CMOSProduct', 'canon-eos-rebel-t7-dslr-camera-with-18-55mm-lens-built-in-wi-fi-241-mp-cmosproduct', 'uploads/media_6446bb298f833.JPG', 1, 10, 13, 11, 4, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 600, 560, '2023-04-24', '2023-07-29', 1, '2023-04-24 11:23:53', '2023-04-24 11:23:53'),
(11, 'DJI Action 2 Dual-Screen Combo & Magnetic Protective Case - 4K Action Camera witProduct', 'dji-action-2-dual-screen-combo-magnetic-protective-case-4k-action-camera-witproduct', 'uploads/media_6446bbaec2455.JPG', 1, 10, 13, 12, 4, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 200, NULL, '2023-04-24', '2023-04-24', 1, '2023-04-24 11:26:06', '2023-04-24 11:28:05'),
(12, 'DJI Osmo Action 3 Standard Combo, Waterproof Action Camera with 4K HDR', 'dji-osmo-action-3-standard-combo-waterproof-action-camera-with-4k-hdr', 'uploads/media_6446beb223eaa.JPG', 1, 10, 13, 12, 5, 998, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 300, 280, '2023-04-24', '2023-10-28', 1, '2023-04-24 11:38:58', '2023-05-08 04:33:54'),
(13, 'GoPro HERO11 Black - Waterproof Action Camera with 5.3K60 Ultra HD Video, 27MP', 'gopro-hero11-black-waterproof-action-camera-with-53k60-ultra-hd-video-27mp', 'uploads/media_6446bff6ec3ba.JPG', 1, 10, 13, 13, 6, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 219, 200, '2023-04-24', '2024-08-30', 1, '2023-04-24 11:44:22', '2023-05-07 22:24:04'),
(14, 'GoPro HERO11 Black Mini - Compact Waterproof Action Camera with 5.3K60 Ultra HD Video, 24.7MP', 'gopro-hero11-black-mini-compact-waterproof-action-camera-with-53k60-ultra-hd-video-247mp', 'uploads/media_6446c05641ef8.JPG', 1, 10, 13, 13, 6, 399, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 170, 160, '2023-04-24', '2023-11-18', 1, '2023-04-24 11:45:58', '2023-04-24 11:45:58'),
(15, 'Insta360 ONE RS 4K Edition – Waterproof 4K 60fps Action Camera with FlowSate Stabilization', 'insta360-one-rs-4k-edition-waterproof-4k-60fps-action-camera-with-flowsate-stabilization', 'uploads/media_6446c23ea57d0.JPG', 1, 10, 13, 13, 6, 399, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 500, 400, '2023-04-24', '2024-12-28', 1, '2023-04-24 11:54:06', '2023-05-07 22:24:51'),
(16, 'Insta360 X3 - Waterproof 360 Action Camera with 1 2_ 48MP Sensors, 5.7K 360 Active HDR Video', 'insta360-x3-waterproof-360-action-camera-with-1-2-48mp-sensors-57k-360-active-hdr-video', 'uploads/media_6446c394b5341.JPG', 1, 10, 13, 13, 6, 200, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 176, NULL, '2023-04-24', '2023-04-24', 1, '2023-04-24 11:59:48', '2023-04-24 11:59:48'),
(17, 'Panasonic LUMIX G7KS 4K Mirrorless Camera, 16 Megapixel Digital Camera', 'panasonic-lumix-g7ks-4k-mirrorless-camera-16-megapixel-digital-camera', 'uploads/media_644798c5250ca.JPG', 1, 10, 13, 14, 7, 299, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 500, NULL, '2023-04-25', '2023-04-25', 1, '2023-04-25 03:09:25', '2023-04-25 03:09:25'),
(18, 'Pentax K-70 Weather-Sealed DSLR Camera with 18-135mm Lens (Black)', 'pentax-k-70-weather-sealed-dslr-camera-with-18-135mm-lens-black', 'uploads/media_64479966b56df.jpg', 1, 10, 13, 14, 7, 50, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 1200, NULL, '2023-04-25', '2023-04-25', 1, '2023-04-25 03:12:06', '2023-04-25 03:12:06'),
(19, 'Acer Nitro 5 AN515-57-79TD Gaming Laptop _ Intel Core i7-11800H _ NVIDIA GeForceProduct', 'acer-nitro-5-an515-57-79td-gaming-laptop-intel-core-i7-11800h-nvidia-geforceproduct', 'uploads/media_64479bb095490.JPG', 1, 10, 14, 15, 9, 400, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 2000, 1900, '2023-04-25', '2024-01-27', 1, '2023-04-25 03:21:52', '2023-04-25 03:21:52'),
(20, 'ASUS ROG Strix G16 (2023) Gaming Laptop, 16” 16_10 FHD 165Hz, GeForce RTX 4070, Intel Core i9-13980H', 'asus-rog-strix-g16-2023-gaming-laptop-16-16-10-fhd-165hz-geforce-rtx-4070-intel-core-i9-13980h', 'uploads/media_64479c79b7dba.JPG', 1, 10, 14, 16, 9, 398, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 3000, 2000, '2023-04-25', '2024-08-30', 1, '2023-04-25 03:25:13', '2023-05-07 22:24:25'),
(21, 'ASUS TUF Dash 15 (2021) Ultra Slim Gaming Laptop, 15.6_ 144Hz FHD, GeForce RTX', 'asus-tuf-dash-15-2021-ultra-slim-gaming-laptop-156-144hz-fhd-geforce-rtx', 'uploads/media_64479d709df25.JPG', 1, 10, 14, 16, 9, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 2000, NULL, '2023-04-25', '2023-04-25', 1, '2023-04-25 03:29:20', '2023-04-25 03:29:20'),
(22, 'ASUS TUF Dash 15 (2022) Gaming Laptop, 15.6_ 144Hz FHD Display, Intel Core i7-12Product', 'asus-tuf-dash-15-2022-gaming-laptop-156-144hz-fhd-display-intel-core-i7-12product', 'uploads/media_64479defd896b.JPG', 1, 10, 14, 16, 9, 297, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 1400, NULL, '2023-04-25', '2023-04-25', 1, '2023-04-25 03:31:27', '2023-04-25 03:31:27'),
(23, 'ASUS TUF Gaming F15 (2022) Gaming Laptop, 15.6” FHD 144Hz Display, GeForce RTX', 'asus-tuf-gaming-f15-2022-gaming-laptop-156-fhd-144hz-display-geforce-rtx', 'uploads/media_64479e22341ff.JPG', 1, 10, 14, 16, 9, 3090, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p></p>', 3000, 2000, '2023-04-25', '2024-05-31', 1, '2023-04-25 03:32:18', '2023-05-07 22:23:33'),
(24, 'Wrangler Men\'s Iconic Denim Regular Fit Snap Shirt', 'wrangler-mens-iconic-denim-regular-fit-snap-shirt', 'uploads/media_645392335b97e.jpg', 2, 10, 15, NULL, 8, 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 300, 250, '2023-05-04', '2023-08-31', 1, '2023-05-04 05:08:35', '2023-05-04 05:10:27'),
(25, 'Amazon Essentials Men\'s Short-Sleeve Chambray ShirtProduct Image', 'amazon-essentials-mens-short-sleeve-chambray-shirtproduct-image', 'uploads/media_64578eb36515a.jpg', 2, 11, NULL, NULL, 12, 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing \r\nand typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy \r\ntext of the printing and typesetting industry. Lorem Ipsum has been the \r\nindustry\'s standard dummy text ever since the 1500s, when an unknown \r\nprinter took a galley of type and scrambled it to make a type specimen \r\nbook. It has survived not only five centuries, but also the leap into \r\nelectronic typesetting, remaining essentially unchanged. It was \r\npopularised in the 1960s with the release of Letraset sheets containing \r\nLorem Ipsum passages, and more recently with desktop publishing software\r\n like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem \r\nIpsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the \r\n1500s, when an unknown printer took a galley of type and scrambled it to\r\n make a type specimen book. It has survived not only five centuries, but\r\n also the leap into electronic typesetting, remaining essentially \r\nunchanged. It was popularised in the 1960s with the release of Letraset \r\nsheets containing Lorem Ipsum passages, and more recently with desktop \r\npublishing software like Aldus PageMaker including versions of Lorem \r\nIpsum.</p><p>Lorem Ipsum is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.<br></p><p></p>', 90, 50, '2023-05-07', '2024-05-25', 1, '2023-05-07 05:42:43', '2023-05-07 05:48:34');
INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `vendor_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `qty`, `short_description`, `long_description`, `price`, `offer_price`, `offer_start_date`, `offer_end_date`, `status`, `created_at`, `updated_at`) VALUES
(26, '.Amazon Essentials Men\'s Slim-Fit Short-Sleeve Pocket Oxford Shirt', 'amazon-essentials-mens-slim-fit-short-sleeve-pocket-oxford-shirt', 'uploads/media_64578f4074403.jpg', 2, 11, NULL, NULL, 12, 500, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing \r\nand typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy \r\ntext of the printing and typesetting industry. Lorem Ipsum has been the \r\nindustry\'s standard dummy text ever since the 1500s, when an unknown \r\nprinter took a galley of type and scrambled it to make a type specimen \r\nbook. It has survived not only five centuries, but also the leap into \r\nelectronic typesetting, remaining essentially unchanged. It was \r\npopularised in the 1960s with the release of Letraset sheets containing \r\nLorem Ipsum passages, and more recently with desktop publishing software\r\n like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem \r\nIpsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the \r\n1500s, when an unknown printer took a galley of type and scrambled it to\r\n make a type specimen book. It has survived not only five centuries, but\r\n also the leap into electronic typesetting, remaining essentially \r\nunchanged. It was popularised in the 1960s with the release of Letraset \r\nsheets containing Lorem Ipsum passages, and more recently with desktop \r\npublishing software like Aldus PageMaker including versions of Lorem \r\nIpsum.</p><p>Lorem Ipsum is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.<br></p><p></p>', 30, NULL, '2023-05-07', '2023-05-07', 1, '2023-05-07 05:45:04', '2023-05-07 05:48:37'),
(27, 'Amazon Essentials Men\'s Slim-Fit Short-Sleeve Print Shirt', 'amazon-essentials-mens-slim-fit-short-sleeve-print-shirt', 'uploads/media_64578fd279656.jpg', 2, 11, NULL, NULL, 12, 100, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing \r\nand typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy \r\ntext of the printing and typesetting industry. Lorem Ipsum has been the \r\nindustry\'s standard dummy text ever since the 1500s, when an unknown \r\nprinter took a galley of type and scrambled it to make a type specimen \r\nbook. It has survived not only five centuries, but also the leap into \r\nelectronic typesetting, remaining essentially unchanged. It was \r\npopularised in the 1960s with the release of Letraset sheets containing \r\nLorem Ipsum passages, and more recently with desktop publishing software\r\n like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem \r\nIpsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the \r\n1500s, when an unknown printer took a galley of type and scrambled it to\r\n make a type specimen book. It has survived not only five centuries, but\r\n also the leap into electronic typesetting, remaining essentially \r\nunchanged. It was popularised in the 1960s with the release of Letraset \r\nsheets containing Lorem Ipsum passages, and more recently with desktop \r\npublishing software like Aldus PageMaker including versions of Lorem \r\nIpsum.</p><p>Lorem Ipsum is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.<br></p><p></p>', 100, 90, '2023-05-07', '2024-02-24', 1, '2023-05-07 05:47:30', '2023-05-07 21:08:55'),
(28, 'Gildan Men\'s Classic', 'gildan-mens-classic', 'uploads/media_6457921b909a7.jpg', 2, 11, NULL, NULL, 12, 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing \r\nand typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy \r\ntext of the printing and typesetting industry. Lorem Ipsum has been the \r\nindustry\'s standard dummy text ever since the 1500s, when an unknown \r\nprinter took a galley of type and scrambled it to make a type specimen \r\nbook. It has survived not only five centuries, but also the leap into \r\nelectronic typesetting, remaining essentially unchanged. It was \r\npopularised in the 1960s with the release of Letraset sheets containing \r\nLorem Ipsum passages, and more recently with desktop publishing software\r\n like Aldus PageMaker including versions of Lorem Ipsum.</p><p>Lorem \r\nIpsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industry\'s standard dummy text ever since the \r\n1500s, when an unknown printer took a galley of type and scrambled it to\r\n make a type specimen book. It has survived not only five centuries, but\r\n also the leap into electronic typesetting, remaining essentially \r\nunchanged. It was popularised in the 1960s with the release of Letraset \r\nsheets containing Lorem Ipsum passages, and more recently with desktop \r\npublishing software like Aldus PageMaker including versions of Lorem \r\nIpsum.</p><p>Lorem Ipsum is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.<br></p><p></p>', 50, NULL, '2023-05-07', '2023-05-07', 1, '2023-05-07 05:57:15', '2023-05-07 05:58:06'),
(29, 'Hanes Sport Men\'s Polo Shirt, Men\'s Cool DRI Moisture-Wicking Performance Polo Shirt, Jersey Knit Pe', 'hanes-sport-mens-polo-shirt-mens-cool-dri-moisture-wicking-performance-polo-shirt-jersey-knit-pe', 'uploads/media_64586910aecb8.JPG', 2, 11, NULL, NULL, 12, 99, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p>', 90, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:14:24', '2023-05-07 21:21:48'),
(30, 'Lucky Brand Men\'s Venice Burnout Notch Neck Tee Shirt', 'lucky-brand-mens-venice-burnout-notch-neck-tee-shirt', 'uploads/media_6458697a7c32d.jpg', 2, 11, NULL, NULL, 12, 900, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 200, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:16:10', '2023-05-07 21:21:52'),
(32, 'Nike Men\'s Sportswear Americana Statement Tank Top', 'nike-mens-sportswear-americana-statement-tank-top', 'uploads/media_64586b834d253.jpg', 1, 11, NULL, NULL, 12, 899, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 90, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:24:51', '2023-05-07 21:24:51'),
(33, 'Alex Evenings Women\'s 3 4 Sleeve Stretch Lace Bodice Mock One Piece Gown', 'alex-evenings-womens-3-4-sleeve-stretch-lace-bodice-mock-one-piece-gown', 'uploads/media_64586d9ae3ced.jpg', 1, 12, NULL, NULL, 13, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 200, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:33:46', '2023-05-07 21:33:46'),
(34, 'Alex Evenings Women\'s Long Ballgown Skirt', 'alex-evenings-womens-long-ballgown-skirt', 'uploads/media_64586e03567bd.jpg', 1, 12, NULL, NULL, 13, 998, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 2000, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:35:31', '2023-05-07 21:35:31'),
(35, 'Amazon Essentials Women\'s Sleeveless Woven Shirt Dress', 'amazon-essentials-womens-sleeveless-woven-shirt-dress', 'uploads/media_64586e82bee01.jpg', 1, 12, NULL, NULL, 14, 888, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 2000, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:37:38', '2023-05-07 21:37:38'),
(36, 'Amoretu Women Summer Tunic Dress V Neck Casual Loose Flowy Swing Shift Dresses', 'amoretu-women-summer-tunic-dress-v-neck-casual-loose-flowy-swing-shift-dresses', 'uploads/media_64586f034b020.JPG', 1, 12, NULL, NULL, 14, 8000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 300, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:39:47', '2023-05-07 21:39:47'),
(37, 'BTFBM Women Summer Bohemian Floral Casual Wrap V Neck Ruffle Cap Sleeveless Belt A-Line Pleated Hem', 'btfbm-women-summer-bohemian-floral-casual-wrap-v-neck-ruffle-cap-sleeveless-belt-a-line-pleated-hem', 'uploads/media_64586f667de7d.JPG', 1, 12, NULL, NULL, 15, 177, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 1200, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:41:26', '2023-05-07 21:41:26'),
(38, 'Calvin Klein Sleeveless V-Neck Gown with High-Low Design – Women’s Formal Dresses for Special Occasions', 'calvin-klein-sleeveless-v-neck-gown-with-high-low-design-womens-formal-dresses-for-special-occasions', 'uploads/media_64586ff9ef3d0.JPG', 1, 12, NULL, NULL, 14, 800, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 90, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:43:54', '2023-05-07 21:43:54'),
(39, 'Dress the Population womens Elisa Sleeveless Plunge Neckline Fit and Flare Midi Dress', 'dress-the-population-womens-elisa-sleeveless-plunge-neckline-fit-and-flare-midi-dress', 'uploads/media_64587078a2da0.JPG', 1, 12, NULL, NULL, 15, 800, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 99, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:46:00', '2023-05-07 21:46:00'),
(40, 'The Drop Women\'s Britt Tiered Maxi Tent Dress', 'the-drop-womens-britt-tiered-maxi-tent-dress', 'uploads/media_645870b816f94.jpg', 1, 12, NULL, NULL, 14, 788, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 900, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:47:04', '2023-05-07 21:47:04'),
(41, 'Amazon Collection Diamond 3 Stone Pendant Necklace', 'amazon-collection-diamond-3-stone-pendant-necklace', 'uploads/media_64587137806d0.jpg', 1, 12, NULL, NULL, 14, 1000, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 800, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:49:11', '2023-05-07 21:49:11'),
(42, 'Betsey Johnson Woven Mixed Multi-Colored Bead Flower Heart Illusion Necklace', 'betsey-johnson-woven-mixed-multi-colored-bead-flower-heart-illusion-necklace', 'uploads/media_645871721a698.JPG', 1, 12, NULL, NULL, 14, 89, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 99, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:50:10', '2023-05-07 21:50:10'),
(43, 'Hey Dude Women\'s Wendy Lace-Up Loafers Comfortable & Lightweight Ladies Shoes Multiple Sizes & Colors', 'hey-dude-womens-wendy-lace-up-loafers-comfortable-lightweight-ladies-shoes-multiple-sizes-colors', 'uploads/media_645871c389e55.JPG', 1, 13, NULL, NULL, 14, 700, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 99, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:51:31', '2023-05-07 21:51:31');
INSERT INTO `products` (`id`, `name`, `slug`, `thumb_image`, `vendor_id`, `category_id`, `sub_category_id`, `child_category_id`, `brand_id`, `qty`, `short_description`, `long_description`, `price`, `offer_price`, `offer_start_date`, `offer_end_date`, `status`, `created_at`, `updated_at`) VALUES
(44, 'UGG Women\'s Tasman Slipper UGG Women\'s Tasman Slipper', 'ugg-womens-tasman-slipper-ugg-womens-tasman-slipper', 'uploads/media_645872c551cc2.jpg', 1, 12, NULL, NULL, 14, 800, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 79, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:55:49', '2023-05-07 22:20:36'),
(45, 'Skechers Women\'s 33492 Sneaker Skechers Women\'s 33492 Sneaker', 'skechers-womens-33492-sneaker-skechers-womens-33492-sneaker', 'uploads/media_645873159a94a.jpg', 1, 12, NULL, NULL, 14, 8798, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 97, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 21:57:09', '2023-05-07 22:20:31'),
(46, 'GoPro HERO11 Black Mini - Compact Waterproof Action Camera with 5.3K60 Ultra HD Video', 'gopro-hero11-black-mini-compact-waterproof-action-camera-with-53k60-ultra-hd-video', 'uploads/media_645874602388a.JPG', 1, 10, 13, NULL, 6, 800, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 2000, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 22:02:40', '2023-05-07 22:02:40'),
(47, 'GoPro HERO11 Black - Waterproof Action Camera with 5.3K60 Ultra HD Video, 27MP Photosr', 'gopro-hero11-black-waterproof-action-camera-with-53k60-ultra-hd-video-27mp-photosr', 'uploads/media_645874c9c6568.JPG', 1, 10, 13, 13, 6, 800, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 800, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 22:04:25', '2023-05-07 22:04:25'),
(48, 'Wrangler Authentics Men\'s Long Sleeve Classic Woven Shirt', 'wrangler-authentics-mens-long-sleeve-classic-woven-shirt', 'uploads/media_645875ee662b5.jpg', 1, 11, NULL, NULL, 12, 800, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 799, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 22:09:18', '2023-05-07 22:09:18'),
(49, 'Nautica Men\'s Performance Pique Polo Shirt', 'nautica-mens-performance-pique-polo-shirt', 'uploads/media_6458762fef383.jpg', 1, 11, NULL, NULL, 12, 799, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 99, NULL, '2023-05-08', '2023-05-08', 1, '2023-05-07 22:10:23', '2023-05-07 22:10:23'),
(51, 'Hanes Sport Men\'s Polo Shirt, Men\'s Cool DRI Moisture-Wicking Performance Polo Shirt', 'hanes-sport-mens-polo-shirt-mens-cool-dri-moisture-wicking-performance-polo-shirt', 'uploads/media_64587721f3057.JPG', 1, 11, NULL, NULL, 12, 876, 'Perfect for beginners, this camera bundle offers the essential tools needed to take your SLR skills to new heights, all in one convenient package. No matter where your next adventure takes you, count on the EOS Rebel t7\'s impressive 24.1 Megapixel', '<p>The Canon EOS Rebel SL3 Digital SLR Camera is a versatile and \r\nlightweight camera that is perfect for capturing high-quality photos and\r\n videos. With its 24.1 Megapixel CMOS (APS-C) sensor and DIGIC 8 Image \r\nProcessor, this camera delivers stunning image quality with excellent \r\ndetail and clarity.</p><p>The EOS Rebel SL3 also features Dual Pixel \r\nCMOS AF, which provides fast and accurate autofocus during both photo \r\nand video shooting. This makes it easy to capture the perfect shot, even\r\n when your subject is moving.</p><p>This camera is also equipped with a \r\nVari-angle Touchscreen LCD that can be rotated to various angles for \r\neasy framing and shooting at different angles. The touchscreen interface\r\n is intuitive and user-friendly, making it easy to access the camera\'s \r\nmany features and settings.</p><p>In addition, the EOS Rebel SL3 offers \r\nbuilt-in Wi-Fi and Bluetooth connectivity, allowing you to easily \r\ntransfer photos and videos to your smart devices or share them on social\r\n media. The camera also includes a built-in feature guide to help you \r\nlearn how to use its various functions and settings.</p><p>Other key features of the Canon EOS Rebel SL3 Digital SLR Camera include:</p><ul><li>9-point AF system</li><li>ISO range of 100-25600 (expandable to 51200)</li><li>5 fps continuous shooting</li><li>Full HD 1080p video recording at up to 60 fps</li><li>Creative Assist mode for easy customization of settings</li><li>EF-S 18-55mm f/4-5.6 IS STM lens included</li></ul><p>Here is a specification table for the Canon EOS Rebel SL3 Digital SLR Camera:<br><br></p><table class=\"table table-bordered\"><tbody><tr><td><h5><b>Specification</b></h5></td><td><h5>Description</h5></td></tr><tr><td>Image sensor</td><td>24.1 Megapixel APS-C CMOS sensor</td></tr><tr><td>Image processor</td><td>DIGIC 8</td></tr><tr><td>Autofocus</td><td>Dual Pixel CMOS AF</td></tr><tr><td>AF points</td><td>9-point AF system</td></tr><tr><td>ISO range</td><td>100-25600 (expandable to 51200)</td></tr><tr><td>Continuous shooting</td><td>Up to 5 fps</td></tr><tr><td>Video recording</td><td>Full HD 1080p at up to 60 fps</td></tr></tbody></table><p><br></p><p></p>', 90, 1000, '2023-05-08', '2023-05-08', 1, '2023-05-07 22:14:26', '2023-05-07 22:14:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image_galleries`
--

DROP TABLE IF EXISTS `product_image_galleries`;
CREATE TABLE `product_image_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image_galleries`
--

INSERT INTO `product_image_galleries` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(24, 'uploads/media_6446aaa52bbd3.JPG', 9, '2023-04-24 10:13:25', '2023-04-24 10:13:25'),
(25, 'uploads/media_6446aaa52c043.JPG', 9, '2023-04-24 10:13:25', '2023-04-24 10:13:25'),
(26, 'uploads/media_6446aaa52c36c.JPG', 9, '2023-04-24 10:13:25', '2023-04-24 10:13:25'),
(27, 'uploads/media_6446aaa52c794.JPG', 9, '2023-04-24 10:13:25', '2023-04-24 10:13:25'),
(28, 'uploads/media_6446aaa52cac0.JPG', 9, '2023-04-24 10:13:25', '2023-04-24 10:13:25'),
(29, 'uploads/media_6446aaa52cdd9.JPG', 9, '2023-04-24 10:13:25', '2023-04-24 10:13:25'),
(30, 'uploads/media_6446bc86746a3.JPG', 10, '2023-04-24 11:29:42', '2023-04-24 11:29:42'),
(31, 'uploads/media_6446bc8674b3d.JPG', 10, '2023-04-24 11:29:42', '2023-04-24 11:29:42'),
(32, 'uploads/media_6446bc8674e70.JPG', 10, '2023-04-24 11:29:42', '2023-04-24 11:29:42'),
(33, 'uploads/media_6446bc8675197.JPG', 10, '2023-04-24 11:29:42', '2023-04-24 11:29:42'),
(34, 'uploads/media_6446bc86757b3.JPG', 10, '2023-04-24 11:29:42', '2023-04-24 11:29:42'),
(35, 'uploads/media_6446bc8675d42.JPG', 10, '2023-04-24 11:29:42', '2023-04-24 11:29:42'),
(36, 'uploads/media_6446bca9dba82.JPG', 11, '2023-04-24 11:30:17', '2023-04-24 11:30:17'),
(37, 'uploads/media_6446bca9dc0d3.JPG', 11, '2023-04-24 11:30:17', '2023-04-24 11:30:17'),
(38, 'uploads/media_6446bca9dc47e.JPG', 11, '2023-04-24 11:30:17', '2023-04-24 11:30:17'),
(39, 'uploads/media_6446bca9dc7c2.JPG', 11, '2023-04-24 11:30:17', '2023-04-24 11:30:17'),
(40, 'uploads/media_6446bca9dcae9.JPG', 11, '2023-04-24 11:30:17', '2023-04-24 11:30:17'),
(41, 'uploads/media_6446bef95fcaa.JPG', 12, '2023-04-24 11:40:09', '2023-04-24 11:40:09'),
(42, 'uploads/media_6446bef96014e.JPG', 12, '2023-04-24 11:40:09', '2023-04-24 11:40:09'),
(43, 'uploads/media_6446bef9604a6.JPG', 12, '2023-04-24 11:40:09', '2023-04-24 11:40:09'),
(44, 'uploads/media_6446bef9607ec.JPG', 12, '2023-04-24 11:40:09', '2023-04-24 11:40:09'),
(45, 'uploads/media_6446c0094d81d.JPG', 13, '2023-04-24 11:44:41', '2023-04-24 11:44:41'),
(46, 'uploads/media_6446c0094dc8c.JPG', 13, '2023-04-24 11:44:41', '2023-04-24 11:44:41'),
(47, 'uploads/media_6446c0094dfa7.JPG', 13, '2023-04-24 11:44:41', '2023-04-24 11:44:41'),
(48, 'uploads/media_6446c0094e556.JPG', 13, '2023-04-24 11:44:41', '2023-04-24 11:44:41'),
(49, 'uploads/media_6446c0094e8b3.JPG', 13, '2023-04-24 11:44:41', '2023-04-24 11:44:41'),
(50, 'uploads/media_6446c0094eed4.JPG', 13, '2023-04-24 11:44:41', '2023-04-24 11:44:41'),
(51, 'uploads/media_6446c0d2bf8cf.JPG', 14, '2023-04-24 11:48:02', '2023-04-24 11:48:02'),
(52, 'uploads/media_6446c0d2bff82.JPG', 14, '2023-04-24 11:48:02', '2023-04-24 11:48:02'),
(53, 'uploads/media_6446c0d2c06f2.JPG', 14, '2023-04-24 11:48:02', '2023-04-24 11:48:02'),
(54, 'uploads/media_6446c0d2c0a5f.JPG', 14, '2023-04-24 11:48:02', '2023-04-24 11:48:02'),
(55, 'uploads/media_6446c0d2c0d83.JPG', 14, '2023-04-24 11:48:02', '2023-04-24 11:48:02'),
(56, 'uploads/media_6446c0d2c109f.JPG', 14, '2023-04-24 11:48:02', '2023-04-24 11:48:02'),
(57, 'uploads/media_6446c252735a2.JPG', 15, '2023-04-24 11:54:26', '2023-04-24 11:54:26'),
(58, 'uploads/media_6446c25273b39.JPG', 15, '2023-04-24 11:54:26', '2023-04-24 11:54:26'),
(59, 'uploads/media_6446c25273e8a.JPG', 15, '2023-04-24 11:54:26', '2023-04-24 11:54:26'),
(60, 'uploads/media_6446c252742d5.JPG', 15, '2023-04-24 11:54:26', '2023-04-24 11:54:26'),
(61, 'uploads/media_6446c25274640.JPG', 15, '2023-04-24 11:54:26', '2023-04-24 11:54:26'),
(62, 'uploads/media_6446c3a525306.JPG', 16, '2023-04-24 12:00:05', '2023-04-24 12:00:05'),
(63, 'uploads/media_6446c3a525788.JPG', 16, '2023-04-24 12:00:05', '2023-04-24 12:00:05'),
(64, 'uploads/media_6446c3a525ac9.JPG', 16, '2023-04-24 12:00:05', '2023-04-24 12:00:05'),
(65, 'uploads/media_6446c3a525df9.JPG', 16, '2023-04-24 12:00:05', '2023-04-24 12:00:05'),
(66, 'uploads/media_6446c3a52614a.JPG', 16, '2023-04-24 12:00:05', '2023-04-24 12:00:05'),
(67, 'uploads/media_6446c3a526466.JPG', 16, '2023-04-24 12:00:05', '2023-04-24 12:00:05'),
(68, 'uploads/media_64479bc3dd6fb.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(69, 'uploads/media_64479bc3ddb88.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(70, 'uploads/media_64479bc3ddeb3.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(71, 'uploads/media_64479bc3de1fd.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(72, 'uploads/media_64479bc3de515.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(73, 'uploads/media_64479bc3de846.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(74, 'uploads/media_64479bc3deb7a.JPG', 19, '2023-04-25 03:22:11', '2023-04-25 03:22:11'),
(75, 'uploads/media_64479c87a16d7.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(76, 'uploads/media_64479c87a1ae3.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(77, 'uploads/media_64479c87a1e22.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(78, 'uploads/media_64479c87a2148.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(79, 'uploads/media_64479c87a2658.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(80, 'uploads/media_64479c87a2d8c.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(81, 'uploads/media_64479c87a3122.JPG', 20, '2023-04-25 03:25:27', '2023-04-25 03:25:27'),
(82, 'uploads/media_64479d904aebd.JPG', 21, '2023-04-25 03:29:52', '2023-04-25 03:29:52'),
(83, 'uploads/media_64479d904b5c5.JPG', 21, '2023-04-25 03:29:52', '2023-04-25 03:29:52'),
(84, 'uploads/media_64479d904b97c.JPG', 21, '2023-04-25 03:29:52', '2023-04-25 03:29:52'),
(85, 'uploads/media_64479d904bce5.JPG', 21, '2023-04-25 03:29:52', '2023-04-25 03:29:52'),
(86, 'uploads/media_64479d904c061.JPG', 21, '2023-04-25 03:29:52', '2023-04-25 03:29:52'),
(87, 'uploads/media_64479d904c3b7.JPG', 21, '2023-04-25 03:29:52', '2023-04-25 03:29:52'),
(88, 'uploads/media_64578eee9f3b4.jpg', 25, '2023-05-07 05:43:42', '2023-05-07 05:43:42'),
(89, 'uploads/media_64578eee9f872.jpg', 25, '2023-05-07 05:43:42', '2023-05-07 05:43:42'),
(90, 'uploads/media_64578eee9fc47.jpg', 25, '2023-05-07 05:43:42', '2023-05-07 05:43:42'),
(91, 'uploads/media_64578eee9ffb3.jpg', 25, '2023-05-07 05:43:42', '2023-05-07 05:43:42'),
(92, 'uploads/media_6458693aae7f9.JPG', 29, '2023-05-07 21:15:06', '2023-05-07 21:15:06'),
(93, 'uploads/media_6458693aaedaf.JPG', 29, '2023-05-07 21:15:06', '2023-05-07 21:15:06'),
(94, 'uploads/media_6458693aaf22c.JPG', 29, '2023-05-07 21:15:06', '2023-05-07 21:15:06'),
(95, 'uploads/media_6458693aaf5e8.JPG', 29, '2023-05-07 21:15:06', '2023-05-07 21:15:06'),
(96, 'uploads/media_6458693aaf9b0.JPG', 29, '2023-05-07 21:15:06', '2023-05-07 21:15:06'),
(97, 'uploads/media_64586db840422.jpg', 33, '2023-05-07 21:34:16', '2023-05-07 21:34:16'),
(98, 'uploads/media_64586db840a25.jpg', 33, '2023-05-07 21:34:16', '2023-05-07 21:34:16'),
(99, 'uploads/media_64586db840e1e.jpg', 33, '2023-05-07 21:34:16', '2023-05-07 21:34:16'),
(100, 'uploads/media_64586db8411ae.jpg', 33, '2023-05-07 21:34:16', '2023-05-07 21:34:16'),
(101, 'uploads/media_64586e2f19e09.jpg', 34, '2023-05-07 21:36:15', '2023-05-07 21:36:15'),
(102, 'uploads/media_64586e2f1a370.jpg', 34, '2023-05-07 21:36:15', '2023-05-07 21:36:15'),
(103, 'uploads/media_64586e2f1a71b.jpg', 34, '2023-05-07 21:36:15', '2023-05-07 21:36:15'),
(104, 'uploads/media_64586e2f1aa9a.jpg', 34, '2023-05-07 21:36:15', '2023-05-07 21:36:15'),
(105, 'uploads/media_64586e2f1aed7.jpg', 34, '2023-05-07 21:36:15', '2023-05-07 21:36:15'),
(106, 'uploads/media_64586ec857382.jpg', 35, '2023-05-07 21:38:48', '2023-05-07 21:38:48'),
(107, 'uploads/media_64586ec857867.jpg', 35, '2023-05-07 21:38:48', '2023-05-07 21:38:48'),
(108, 'uploads/media_64586ec857d1f.jpg', 35, '2023-05-07 21:38:48', '2023-05-07 21:38:48'),
(109, 'uploads/media_64586ec858132.jpg', 35, '2023-05-07 21:38:48', '2023-05-07 21:38:48'),
(110, 'uploads/media_64586ec858544.jpg', 35, '2023-05-07 21:38:48', '2023-05-07 21:38:48'),
(111, 'uploads/media_64586ec858951.jpg', 35, '2023-05-07 21:38:48', '2023-05-07 21:38:48'),
(112, 'uploads/media_64586f31666d2.JPG', 36, '2023-05-07 21:40:33', '2023-05-07 21:40:33'),
(113, 'uploads/media_64586f3166b43.JPG', 36, '2023-05-07 21:40:33', '2023-05-07 21:40:33'),
(114, 'uploads/media_64586f3167003.JPG', 36, '2023-05-07 21:40:33', '2023-05-07 21:40:33'),
(115, 'uploads/media_64586f31673d1.JPG', 36, '2023-05-07 21:40:33', '2023-05-07 21:40:33'),
(116, 'uploads/media_64586f31677be.JPG', 36, '2023-05-07 21:40:33', '2023-05-07 21:40:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(11, 11, 'Color', 1, '2023-05-08 04:53:28', '2023-05-08 04:53:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variant_items`
--

DROP TABLE IF EXISTS `product_variant_items`;
CREATE TABLE `product_variant_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_variant_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variant_items`
--

INSERT INTO `product_variant_items` (`id`, `product_variant_id`, `name`, `price`, `is_default`, `status`, `created_at`, `updated_at`) VALUES
(14, 11, 'Red', 0, 1, 1, '2023-05-08 04:53:52', '2023-05-08 04:53:52'),
(15, 11, 'Black', 30, 0, 1, '2023-05-08 04:54:07', '2023-05-08 04:54:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46'),
(2, 'User', NULL, '2023-08-22 19:34:46', '2023-08-22 19:34:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `banner` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `banner`, `type`, `title`, `starting_price`, `btn_url`, `serial`, `status`, `created_at`, `updated_at`) VALUES
(6, 'uploads/media_6413063a005c8.jpg', 'new arrivals', 'men\'s fashion', '99', 'http://ecommerce.test/admin/slider/create', '1', 1, '2023-03-16 06:06:18', '2023-03-16 07:02:37'),
(7, 'uploads/media_6413066df3a6a.jpg', 'new arrivals', 'kid\'s fashion', '69', 'http://ecommerce.test/admin/slider/create', '2', 1, '2023-03-16 06:07:09', '2023-03-16 06:07:09'),
(8, 'uploads/media_6413069181b0f.jpg', 'Hot Deals', 'winter collection', '40', 'http://ecommerce.test/admin/slider/create', '3', 1, '2023-03-16 06:07:45', '2023-03-16 06:07:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(13, 10, 'Camera', 'camera', 1, '2023-04-24 09:43:34', '2023-04-24 09:43:34'),
(14, 10, 'Laptops', 'laptops', 1, '2023-04-24 09:43:46', '2023-05-07 04:38:57'),
(15, 10, 'Smart Phones', 'smart-phones', 1, '2023-04-24 09:44:03', '2023-05-07 04:38:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default/no_image.jpg',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$wsjHZuOuwoSJHYgA.kpXzeziscrJyTzCUjoFbuPXhvUNmwhlXrQY.',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `image`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Admin user', 'admin', 'default/no_image.jpg', 'admin@gmail.com', 1, NULL, '$2y$10$M2IAG2RG2UgpT5FNANP7XuILMOeYnV9HjdUw7nUDW5VSq2wnd4QXW', NULL, NULL, NULL, 1),
(2, 'Vendor user', 'vendor', 'default/no_image.jpg', 'vendor@gmail.com', 1, NULL, '$2y$10$BU4RUzKwYH11Aw0wJMhyO.lmpbrhKmWGLFTI07adpQNF/ImEhSuuG', NULL, NULL, NULL, 2),
(3, 'user', 'user', 'default/no_image.jpg', 'user@gmail.com', 1, NULL, '$2y$10$LrGJX1FdRUkUJBkXHMR3Vuan6p7VEVKQ8A68sIWMDFCbz6UtdWZNC', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 12, 1, '2023-04-26 00:59:21', '2023-04-26 00:59:21'),
(3, 15, 1, '2023-04-26 03:01:20', '2023-04-26 03:01:20'),
(4, 11, 1, '2023-04-26 03:12:40', '2023-04-26 03:12:40'),
(5, 23, 1, '2023-04-26 03:17:17', '2023-04-26 03:17:17'),
(6, 22, 1, '2023-04-26 03:17:24', '2023-04-26 03:17:24'),
(7, 9, 1, '2023-04-26 03:22:42', '2023-04-26 03:22:42'),
(8, 20, 1, '2023-04-26 04:04:37', '2023-04-26 04:04:37'),
(10, 12, 3, '2023-04-26 21:16:42', '2023-04-26 21:16:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_categories_slug_unique` (`slug`),
  ADD KEY `child_categories_sub_category_id_foreign` (`sub_category_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_products_order_id_product_id_unique` (`order_id`,`product_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_child_category_id_foreign` (`child_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_galleries_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_items_product_variant_id_foreign` (`product_variant_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_slug_unique` (`slug`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_variant_items`
--
ALTER TABLE `product_variant_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Các ràng buộc cho bảng `featured_products`
--
ALTER TABLE `featured_products`
  ADD CONSTRAINT `featured_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_child_category_id_foreign` FOREIGN KEY (`child_category_id`) REFERENCES `child_categories` (`id`),
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_image_galleries`
--
ALTER TABLE `product_image_galleries`
  ADD CONSTRAINT `product_image_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `product_variant_items`
--
ALTER TABLE `product_variant_items`
  ADD CONSTRAINT `product_variant_items_product_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);

--
-- Các ràng buộc cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
