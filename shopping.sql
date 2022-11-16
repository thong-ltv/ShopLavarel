-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 05:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Quần áo', 0, 'quan-ao', NULL, NULL, NULL),
(2, 'Giày dép', 0, 'giay-dep', '2022-09-28 05:45:31', '2022-11-15 09:32:05', '2022-11-15 09:32:05'),
(3, 'Quần áo nam', 1, 'quan-ao-nam', '2022-09-28 05:45:57', '2022-09-28 05:45:57', NULL),
(4, 'Quần áo nữ', 1, 'quan-ao-nu', '2022-09-28 05:46:11', '2022-09-28 05:46:11', NULL),
(5, 'Giày nam', 2, 'giay-nam', '2022-09-28 05:46:28', '2022-11-15 09:32:01', '2022-11-15 09:32:01'),
(6, 'Giày nữ', 2, 'giay-nu', '2022-09-28 05:46:40', '2022-09-28 18:35:45', '2022-09-28 18:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(1, 'Menu 1', 0, NULL, NULL, '', NULL),
(2, 'Menu 2', 0, NULL, NULL, '', NULL),
(3, 'Menu 3', 0, NULL, NULL, '', NULL),
(4, 'Menu 1.1', 1, NULL, NULL, '', NULL),
(5, 'Menu 2.1', 2, NULL, NULL, '', NULL),
(6, 'Menu 3.1', 3, NULL, NULL, '', NULL),
(7, 'Menu 4', 0, '2022-09-29 06:31:00', '2022-09-29 06:31:00', '', NULL),
(8, 'Menu 4.1', 7, '2022-09-29 06:32:33', '2022-09-29 06:32:33', '', NULL),
(9, 'Menu 5', 0, '2022-09-29 19:31:04', '2022-09-29 19:31:04', '', NULL),
(10, 'Menu 4.2', 7, '2022-09-29 20:03:37', '2022-09-29 20:03:37', 'menu-42', NULL),
(11, 'Menu 5.1', 9, '2022-09-29 21:24:49', '2022-09-30 00:24:01', 'menu-51', '2022-09-30 00:24:01');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_20_092701_create_categories_table', 1),
(6, '2022_09_29_012829_add_column_deleted_at_table_categpries', 2),
(7, '2022_09_29_113033_create_menus_table', 3),
(8, '2022_09_30_025725_add_column_slug_to_menus_table', 4),
(9, '2022_09_30_071712_add_column_soft_delete_to_menus_table', 5),
(10, '2022_09_30_084040_create_products_table', 6),
(11, '2022_09_30_084642_create_product_images_table', 6),
(12, '2022_09_30_084932_create_tags_table', 6),
(13, '2022_09_30_085105_create_product_tags_table', 6),
(14, '2022_10_04_070831_add_column_feature_image_name', 7),
(15, '2022_10_05_161716_add_column_image_name_to_table_product_image', 8),
(16, '2022_10_13_144732_add_column_delected_at_to_product_table', 9),
(17, '2022_10_14_151911_create_sliders_table', 10),
(18, '2022_10_21_154931_add_column_delected_at_table_sliders', 11),
(19, '2022_10_21_165357_create_settings_table', 12),
(20, '2022_10_23_100603_add_column_type_settings_table', 13),
(21, '2022_10_23_152751_add_column_delected_at_to_settings', 14),
(22, '2022_10_24_024304_create_roles_table', 15),
(23, '2022_10_24_024350_create_permissions_table', 15),
(24, '2022_10_24_025940_create_table_role_user', 16),
(25, '2022_10_24_030040_create_table_permission_role', 16),
(26, '2022_10_24_154848_add_column_delected_add_table_users', 17),
(27, '2022_11_03_032036_add_column_parent_id_permission', 18),
(28, '2022_11_11_164130_add_column_key_table_permissions', 19),
(29, '2022_11_15_035359_add_column_color_and_size_to_product', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'Danh mục sản phẩm', 'Danh mục sản phẩm', NULL, NULL, 0, ''),
(2, 'Danh mục sản phẩm', 'Danh mục sản phẩm', NULL, NULL, 1, 'list_category'),
(3, 'Thêm danh mục sản phẩm', 'Thêm danh mục sản phẩm', NULL, NULL, 1, 'add_category'),
(4, 'Sửa danh mục sản phẩm', 'Sửa danh mục sản phẩm', NULL, NULL, 1, 'edit_category'),
(5, 'Xóa danh mục sản phẩm', 'Xóa danh mục sản phẩm', NULL, NULL, 1, 'delete_category'),
(6, 'Menu', 'Menu', NULL, NULL, 0, ''),
(7, 'Danh sách menu', 'Danh sách menu', NULL, NULL, 6, 'list_menu'),
(8, 'Thêm menu', 'Thêm menu', NULL, NULL, 6, 'add_menu'),
(9, 'Sửa menu', 'Sửa menu', NULL, NULL, 6, 'edit_menu'),
(10, 'Xóa menu', 'Xóa menu', NULL, NULL, 6, 'delete_menu'),
(11, 'Sản phẩm', 'Sản phẩm', NULL, NULL, 0, ''),
(12, 'Danh sách sản phẩm', 'Danh sách sản phẩm', NULL, NULL, 11, 'list_product'),
(13, 'Thêm sản phẩm', 'Thêm sản phẩm', NULL, NULL, 11, 'add_product'),
(14, 'Sửa sản phẩm', 'Sửa sản phẩm', NULL, NULL, 11, 'edit_product'),
(15, 'Xóa sản phẩm', 'Xóa sản phẩm', NULL, NULL, 11, 'delete_product'),
(16, 'Setting', 'Setting', NULL, NULL, 0, ''),
(17, 'Danh sách setting', 'Danh sách setting', NULL, NULL, 16, 'list_setting'),
(18, 'Thêm setting', 'Thêm setting', NULL, NULL, 16, 'add_setting'),
(19, 'Sửa setting', 'Sửa setting', NULL, NULL, 16, 'edit_setting'),
(20, 'Xóa setting', 'Xóa setting', NULL, NULL, 16, 'delete_setting'),
(21, 'Nhân viên', 'Nhân viên', NULL, NULL, 0, ''),
(22, 'Danh sách nhân viên', 'Danh sách nhân viên', NULL, NULL, 21, 'list_user'),
(23, 'Thêm nhân viên', 'Thêm nhân viên', NULL, NULL, 21, 'add_user\r\n'),
(24, 'Sửa nhân viên', 'Sửa nhân viên', NULL, NULL, 21, 'edit_user'),
(25, 'Xóa nhân viên', 'Xóa nhân viên', NULL, NULL, 21, 'delete_user'),
(26, 'Vai trò', 'Vai trò', NULL, NULL, 0, ''),
(27, 'Danh sách vai trò', 'Danh sách vai trò', NULL, NULL, 26, 'list_role'),
(28, 'Thêm vai trò', 'Thêm vai trò', NULL, NULL, 26, 'add_role'),
(29, 'Sửa vai trò', 'Sửa vai trò', NULL, NULL, 26, 'edit_role'),
(30, 'Xóa vai trò', 'Xóa vai trò', NULL, NULL, 26, 'delete_role'),
(31, 'Slider', 'Slider', NULL, NULL, 0, ''),
(32, 'Danh sách slider', 'Danh sách slider', NULL, NULL, 31, 'list_slider'),
(33, 'Thêm slider', 'Thêm slider', NULL, NULL, 31, 'add_slider'),
(34, 'Sửa slider', 'Sửa slider', NULL, NULL, 31, 'edit_slider'),
(35, 'Xóa slider', 'Xóa slider', NULL, NULL, 31, 'delete_slider');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `feature_image_name`, `deleted_at`, `color`, `size`) VALUES
(1, 'Iphone 13 Pro Max', '43000000', '/storage/product/1/DSEBezVM5OvjgK3V0zvq.jpg', '<p>Iphone 13 Pro Max co cum camera duoc bao ve moi lop nhua, giup bao ve camera tot hon!!!</p>', 1, 1, '2022-10-05 07:57:20', '2022-11-15 10:39:09', 'Iphone 13 Pro Max.jpg', '2022-11-15 10:39:09', '', ''),
(3, 'Iphone 14 Pro Max', '999999', '/storage/product/1/7jYZji4bVq5VFUOc5CXq.jpg', '<p>Iphone 14</p>', 1, 2, '2022-10-05 17:19:15', '2022-11-15 10:39:05', 'background.jpg', '2022-11-15 10:39:05', '', ''),
(4, 'Iphone 14 Pro Max', '999999', '/storage/product/1/Xw8GS26wVEY7O8gEpjRB.jpg', '<p>Iphone 14</p>', 1, 2, '2022-10-05 17:19:29', '2022-11-15 10:39:01', 'background.jpg', '2022-11-15 10:39:01', '', ''),
(5, 'Iphone 14 Pro Max', '999999', '/storage/product/1/5BBhVoGVoPikbfMXiSD5.jpg', '<p>Iphone 14</p>', 1, 2, '2022-10-05 17:20:43', '2022-11-15 10:38:57', 'background.jpg', '2022-11-15 10:38:57', '', ''),
(6, 'Iphone 14 Pro Max', '999999', '/storage/product/1/rypmDDaTvFDXXU9tniPB.jpg', '<p>Iphone 14</p>', 1, 2, '2022-10-05 17:21:26', '2022-11-15 10:38:53', 'background.jpg', '2022-11-15 10:38:53', '', ''),
(7, 'Iphone 14 Pro Max', '999999', '/storage/product/1/CJ90qAqFj9ZvIkXgMlQ9.jpg', '<p>Iphone 14</p>', 1, 2, '2022-10-05 17:21:48', '2022-10-13 07:53:30', 'background.jpg', '2022-10-13 07:53:30', '', ''),
(10, 'Balo 4 pro', '999999900000', '/storage/product/1/p1pwmZg3Dx1g7lPAUKwu.jpg', '<p>balo moi ra mat trong nam nay</p>', 1, 2, '2022-10-06 02:12:51', '2022-11-15 10:38:49', 'balo_mini_bac.jpg', '2022-11-15 10:38:49', '', ''),
(11, 'Bộ Quần Áo Nam Kích Cỡ Lớn Trơn', '1999999', '/storage/product/1/dJvo49pVMqk3Ez48Vgbg.webp', '<p><strong>- Chất Cotton l&agrave; nguy&ecirc;n liệu ch&iacute;nh yếu tạo n&ecirc;n sự mềm mại v&agrave; tho&aacute;ng m&aacute;t.</strong></p>\r\n<p><strong>- Cotton c&oacute; khả năng co gi&atilde;n cực tốt, tăng độ đ&agrave;n hồi gi&uacute;p sản phẩm &iacute;t bị hư d&aacute;ng v&agrave; bền chắc hơn.</strong></p>\r\n<p><strong>- Chất cotton tốt n&ecirc;n c&aacute;c bạn cứ giặc thoải m&aacute;i kh&ocirc;ng sợ sờn v&atilde;i hư hỏng.</strong></p>', 1, 3, '2022-10-06 02:16:10', '2022-11-15 10:34:21', '55.png', NULL, 'Đỏ', 'XL'),
(14, 'Bộ Quần Áo Nam Áo Hoodie Quần Jogger Bo Gấu Phong Cách Thể Thao Thời Trang Zenkonu', '109000', '/storage/product/1/APE2nsFOS2CjJRkF27iE.jpg', '<p>Chất vải: Vải tổng hợp trơn mềm mại c&oacute; co gi&atilde;n</p>\r\n<p>Thiết kế : Ph&ugrave; hợp phong c&aacute;ch giới trẻ hiện đại</p>\r\n<p>Kiểu d&aacute;ng gọn nhẹ, năng động</p>\r\n<p>Ph&ugrave; hợp nhiều ho&agrave;n cảnh: mặc nh&agrave;, đi học, đi chơi, du lịch</p>', 1, 3, '2022-11-12 07:22:16', '2022-11-15 10:26:30', '33.png', NULL, 'Đen trắng', 'L'),
(15, 'thong 123456', '999000', '/storage/product/1/hieWnHGuzfLErvd60jXl.jpg', '<p>&aacute;o rất đẹp</p>', 1, 3, '2022-11-15 09:15:23', '2022-11-15 10:22:27', 'background.jpg', '2022-11-15 10:22:27', 'vàng', 'XL'),
(16, 'Bộ quần áo mặc nhà nam mùa hè chất vải sợi polysster mềm mịn', '139000', '/storage/product/1/spa3Oo6Bec7B8JKy7OxX.webp', '<p>Bộ quần &aacute;o mặc nh&agrave; nam m&ugrave;a h&egrave; chất vải sợi polysster mềm mịn, tho&aacute;ng m&aacute;t Astoryo</p>\r\n<p>TH&Ocirc;NG TIN SẢN PHẨM</p>\r\n<p>- Kiểu d&aacute;ng trẻ trung, năng động m&agrave;u sắc đẹp dễ mix đồ gi&agrave;y, d&eacute;p, mũ lưỡi trai</p>\r\n<p>- Chất sợi polysster mềm mịn, co d&atilde;n, thấm h&uacute;t mồ h&ocirc;i tốt tạo cảm gi&aacute;c thoải m&aacute;i dễ chịu khi mặc</p>\r\n<p>- Đường chỉ may tỉ mỉ, chắc chắn, kh&ocirc;ng bai, kh&ocirc;ng x&ugrave;, kh&ocirc;ng b&aacute;m d&iacute;nh</p>\r\n<p>- Bền m&agrave;u vĩnh viễn ngay cả khi giặt m&aacute;y, an to&agrave;n tuyệt đối với người mặc</p>\r\n<p>- Ph&ugrave; hợp mặc đi chơi, đi l&agrave;m, đi dạo, chơi thể thao, tập thể dục,</p>', 1, 3, '2022-11-15 10:21:22', '2022-11-15 10:22:38', 'product1.webp', NULL, 'Đen', 'M'),
(17, 'Sét đồ bộ mặc nhà nam- đồ thể thao nam in hình GẤU', '83000', '/storage/product/1/LyvLjlWE9rIcdGoQO1lC.jpg', '<p>- S&eacute;t bộ thể thao nam, mặc nh&agrave;, hoạt động thể thao</p>\r\n<p>- Chất thun cotton mặc m&aacute;t , co d&atilde;n v&agrave; tho&aacute;t mồ h&ocirc;i tốt</p>\r\n<p>- Th&iacute;ch hợp mặc đi chơi m&ugrave;a h&egrave;, mặc nh&oacute;m, &aacute;o lớp</p>', 1, 3, '2022-11-15 10:38:19', '2022-11-15 10:38:19', 'product4.jpg', NULL, 'Xanh', 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`, `image_name`) VALUES
(7, '/storage/product/1/fUr6jooRLLAZLnKka5dm.png', 9, '2022-10-05 17:27:40', '2022-10-05 17:27:40', '22.png'),
(8, '/storage/product/1/agWRPnEo3vgvPj01DNCg.png', 9, '2022-10-05 17:27:40', '2022-10-05 17:27:40', '33.png'),
(9, '/storage/product/1/vLk8oNJNCclsJ9NBbNQX.png', 9, '2022-10-05 17:27:40', '2022-10-05 17:27:40', '44.png'),
(17, '/storage/product/1/jx1hcH8uzTILenkj4pCZ.png', 12, '2022-10-06 02:36:12', '2022-10-06 02:36:12', '44.png'),
(18, '/storage/product/1/7idcBTu8rvn7KN83hoSR.png', 12, '2022-10-06 02:36:12', '2022-10-06 02:36:12', '55.png'),
(26, '/storage/product/1/M6cWBHtVUbWbOp3uJEIK.jpg', 16, '2022-11-15 10:21:22', '2022-11-15 10:21:22', 'product1.1.jpg'),
(27, '/storage/product/1/easQH2zXKpR2fUd1Bs6d.jpg', 16, '2022-11-15 10:21:22', '2022-11-15 10:21:22', 'product1.2.jpg'),
(28, '/storage/product/1/0mqhaDyRMOaWt7GqAO9q.webp', 16, '2022-11-15 10:21:22', '2022-11-15 10:21:22', 'product1.webp'),
(29, '/storage/product/1/7Y6dWfR6Mh9hQcqehURh.jpg', 14, '2022-11-15 10:26:30', '2022-11-15 10:26:30', 'product2.1.jpg'),
(30, '/storage/product/1/APE2nsFOS2CjJRkF27iE.jpg', 14, '2022-11-15 10:26:30', '2022-11-15 10:26:30', 'product2.jpg'),
(31, '/storage/product/1/dJvo49pVMqk3Ez48Vgbg.webp', 11, '2022-11-15 10:34:21', '2022-11-15 10:34:21', 'product3.webp'),
(32, '/storage/product/1/IG3GW1vXysZ7PsqBz3Cv.jpg', 17, '2022-11-15 10:38:19', '2022-11-15 10:38:19', 'product4.1.jpg'),
(33, '/storage/product/1/RyEvu37EZh2U6wzgRVu7.jpg', 17, '2022-11-15 10:38:19', '2022-11-15 10:38:19', 'product4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2022-10-06 02:12:51', '2022-10-06 02:12:51'),
(2, 10, 2, '2022-10-06 02:12:51', '2022-10-06 02:12:51'),
(3, 10, 3, '2022-10-06 02:12:51', '2022-10-06 02:12:51'),
(5, 12, 4, '2022-10-06 02:36:12', '2022-10-06 02:36:12'),
(6, 12, 5, '2022-10-06 02:36:12', '2022-10-06 02:36:12'),
(7, 13, 6, '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(8, 13, 7, '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(9, 13, 8, '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(12, 13, 11, '2022-10-11 05:38:40', '2022-10-11 05:38:40'),
(14, 15, 13, '2022-11-15 09:15:23', '2022-11-15 09:15:23'),
(15, 16, 14, '2022-11-15 10:21:22', '2022-11-15 10:21:22'),
(17, 14, 16, '2022-11-15 10:26:30', '2022-11-15 10:26:30'),
(18, 11, 17, '2022-11-15 10:34:21', '2022-11-15 10:34:21'),
(19, 11, 18, '2022-11-15 10:34:21', '2022-11-15 10:34:21'),
(20, 17, 19, '2022-11-15 10:38:19', '2022-11-15 10:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị hệ thống', NULL, NULL),
(2, 'guest', 'Khách hàng', NULL, NULL),
(3, 'developer', 'Phát triển hệ thống', NULL, NULL),
(4, 'content', 'Chỉnh sửa nội dung', NULL, NULL),
(9, 'Editor 2', 'Nguoi soan thao 2', '2022-11-11 10:27:47', '2022-11-12 04:38:41'),
(10, 'Editor 1', 'Nguoi soan thao 1', '2022-11-12 04:39:54', '2022-11-12 04:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 9, 2, NULL, NULL),
(2, 9, 3, NULL, NULL),
(3, 9, 4, NULL, NULL),
(4, 9, 5, NULL, NULL),
(7, 9, 22, NULL, NULL),
(8, 9, 23, NULL, NULL),
(9, 9, 24, NULL, NULL),
(10, 10, 7, NULL, NULL),
(11, 10, 8, NULL, NULL),
(12, 10, 9, NULL, NULL),
(13, 10, 10, NULL, NULL),
(14, 10, 22, NULL, NULL),
(15, 10, 23, NULL, NULL),
(16, 10, 24, NULL, NULL),
(17, 10, 25, NULL, NULL),
(31, 2, 2, NULL, NULL),
(32, 2, 3, NULL, NULL),
(33, 2, 4, NULL, NULL),
(34, 2, 5, NULL, NULL),
(35, 2, 7, NULL, NULL),
(36, 2, 8, NULL, NULL),
(37, 2, 9, NULL, NULL),
(38, 2, 10, NULL, NULL),
(39, 2, 12, NULL, NULL),
(40, 2, 13, NULL, NULL),
(41, 2, 14, NULL, NULL),
(42, 2, 15, NULL, NULL),
(43, 2, 17, NULL, NULL),
(44, 2, 18, NULL, NULL),
(45, 2, 19, NULL, NULL),
(46, 2, 20, NULL, NULL),
(47, 2, 22, NULL, NULL),
(48, 2, 23, NULL, NULL),
(49, 2, 24, NULL, NULL),
(50, 2, 25, NULL, NULL),
(51, 2, 27, NULL, NULL),
(52, 2, 28, NULL, NULL),
(53, 2, 29, NULL, NULL),
(54, 2, 30, NULL, NULL),
(55, 2, 32, NULL, NULL),
(56, 2, 33, NULL, NULL),
(57, 2, 34, NULL, NULL),
(58, 2, 35, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, 5, NULL, NULL),
(5, 4, 5, NULL, NULL),
(7, 2, 3, NULL, NULL),
(8, 3, 3, NULL, NULL),
(12, 2, 1, NULL, NULL),
(13, 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `type`, `deleted_at`) VALUES
(1, 'phone', '0383785124', '2022-10-23 02:27:42', '2022-10-23 02:27:42', 'Textarea', NULL),
(2, 'phone_number', '0383785124', '2022-10-23 02:29:00', '2022-10-23 02:29:00', 'Text', NULL),
(3, 'zalo', 'thongnguyen', '2022-10-23 03:12:24', '2022-10-23 08:36:03', 'Text', '2022-10-23 08:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `description`, `image_path`, `image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'slider 3 pro max', 'ggggggg', '/storage/slider//Uyv8fP5hbkdAXSwkVrqp.png', '55.png', '2022-10-21 06:22:24', '2022-10-21 06:22:24', NULL),
(2, 'slider 3 pro gau bi doi', 'ggggggghhhhhh', '/storage/slider//zjocDnRVmbYOCtSfKZ4m.jpg', 'background.jpg', '2022-10-21 06:23:14', '2022-10-21 08:50:49', '2022-10-21 08:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'balo ddep', '2022-10-06 02:12:51', '2022-10-06 02:12:51'),
(2, 'balo vip', '2022-10-06 02:12:51', '2022-10-06 02:12:51'),
(3, 'balo xin', '2022-10-06 02:12:51', '2022-10-06 02:12:51'),
(4, 'dien thoai', '2022-10-06 02:36:12', '2022-10-06 02:36:12'),
(5, 'may tinh', '2022-10-06 02:36:12', '2022-10-06 02:36:12'),
(6, 'hhh', '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(7, 'ggggggggggggggggggg', '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(8, 'ggggggggggggggggggggg', '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(9, 'fffffffffffffffffffffff', '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(10, 'jjjjjjjjjjjjj', '2022-10-06 02:56:39', '2022-10-06 02:56:39'),
(11, 'thong', '2022-10-11 05:38:40', '2022-10-11 05:38:40'),
(12, 'fffff', '2022-11-12 07:22:16', '2022-11-12 07:22:16'),
(13, 'anh dep', '2022-11-15 09:15:23', '2022-11-15 09:15:23'),
(14, 'áo mùa he', '2022-11-15 10:21:22', '2022-11-15 10:21:22'),
(15, 'thoáng mát', '2022-11-15 10:21:22', '2022-11-15 10:21:22'),
(16, 'Vải tổng hợp trơn mềm mại', '2022-11-15 10:26:30', '2022-11-15 10:26:30'),
(17, 'Chất Cotton', '2022-11-15 10:34:21', '2022-11-15 10:34:21'),
(18, 'mềm mại và thoáng mát.', '2022-11-15 10:34:21', '2022-11-15 10:34:21'),
(19, 'Sét bộ thể thao nam', '2022-11-15 10:38:19', '2022-11-15 10:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thong 1 dep trai', 'thonglaptrinhvien123@gmail.com', NULL, '$2y$10$2KQ1PU8q0.qF0jBSbqen3exYuSDVLF9m7Wk8cWmqK8c0onQHP97lC', 'zNEWqRl93RbDXeI3Pxztawjb9ZuyrDI6K2PKvuCThtl3VwOPwj6xSGtU2TDM', NULL, '2022-11-13 06:17:16', NULL),
(2, 'thuong', 'thuong@gmail.com', NULL, '123', NULL, '2022-10-24 05:51:20', '2022-10-24 05:51:20', NULL),
(3, 'ngoc y', 'y@gmail.com', NULL, '$2y$10$.pe.2wYnlg2sqtejkUQo5.ty6t50CWwrKdh0KiQlybBpus5GjPB2y', NULL, '2022-10-24 05:52:24', '2022-10-24 21:25:55', NULL),
(5, 'ngoc thuc  nguyen', 'thuc123@gmail.com', NULL, '$2y$10$/OlxHk/72TXC5HH49khKhu5GauabWMTMeK2vcWWIpaHwUyAPsM6GO', NULL, '2022-10-24 06:30:08', '2022-10-24 21:10:54', '2022-10-24 21:10:54'),
(6, 'thonghoaixuan123456', 'thonglaptrinhvien123345@gmail.com', NULL, '$2y$10$vfCO8Eqnx9GrAHIB9eg.8OSRLrfOlvwX.uL02QHlLGHrzvLYLd8dy', NULL, '2022-11-02 01:38:34', '2022-11-02 02:22:39', '2022-11-02 02:22:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
