-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 10, 2021 lúc 01:05 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project-2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_encode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `password_encode`, `date_birth`, `gender`, `phone`, `address`, `role_id`, `area_id`, `del_flag`, `created_at`, `updated_at`) VALUES
(3, 'Sown', 'abc@gmail.com', '12345Aa', '12345Aa', '2021-06-29', 1, '0963027911', 'Lào Cai', 2, 1, 1, '2021-07-27 22:03:40', '2021-07-27 22:03:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `area`
--

CREATE TABLE `area` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `area`
--

INSERT INTO `area` (`id`, `area_name`, `area_address`, `image_path`, `del_flag`, `created_at`, `updated_at`) VALUES
(1, 'Đông Anh', 'Hà Nội', '1627448445.jpg', 1, '2021-07-27 22:00:45', '2021-07-27 22:00:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `pitch_id` int(10) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` double(8,2) NOT NULL,
  `missing` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `pitch_id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` date NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_encode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `listadmin`
-- (See below for the actual view)
--
CREATE TABLE `listadmin` (
`id` int(10) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
,`password_encode` varchar(255)
,`date_birth` date
,`gender` tinyint(1)
,`phone` varchar(255)
,`address` varchar(255)
,`role_id` int(10) unsigned
,`area_id` int(10) unsigned
,`del_flag` tinyint(1)
,`created_at` timestamp
,`updated_at` timestamp
,`area_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `listpitch`
-- (See below for the actual view)
--
CREATE TABLE `listpitch` (
`id` int(10) unsigned
,`area_id` int(10) unsigned
,`pitch_type_id` int(10) unsigned
,`pitch_name` varchar(255)
,`image_path` varchar(255)
,`price` double(8,2)
,`del_flag` tinyint(1)
,`created_at` timestamp
,`updated_at` timestamp
,`area_name` varchar(255)
,`area_address` varchar(255)
,`pitch_type_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_06_20_053422_role', 1),
(2, '2021_06_20_054529_time', 1),
(3, '2021_06_21_032339_area', 1),
(4, '2021_06_21_042257_admin', 1),
(5, '2021_06_21_042328_customer', 1),
(6, '2021_06_21_042329_pitch_type', 1),
(7, '2021_06_21_042351_pitch', 1),
(8, '2021_06_21_042403_bill', 1),
(9, '2021_06_21_042507_comment', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pitch`
--

CREATE TABLE `pitch` (
  `id` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `pitch_type_id` int(10) UNSIGNED NOT NULL,
  `pitch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pitch`
--

INSERT INTO `pitch` (`id`, `area_id`, `pitch_type_id`, `pitch_name`, `image_path`, `price`, `del_flag`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sân 1', '1627448813.jpg', 500000.00, 1, '2021-07-27 22:06:53', '2021-07-27 22:06:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pitch_type`
--

CREATE TABLE `pitch_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `pitch_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pitch_type`
--

INSERT INTO `pitch_type` (`id`, `pitch_type_name`, `del_flag`, `created_at`, `updated_at`) VALUES
(1, 'Sân 7', 1, '2021-07-27 22:05:48', '2021-07-27 22:06:38'),
(2, 'Sân 11', 1, '2021-07-27 22:05:51', '2021-07-27 22:05:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `role_name`, `del_flag`, `created_at`, `updated_at`) VALUES
(1, 'Quản lý', 1, NULL, NULL),
(2, 'Nhân viên', 1, NULL, NULL),
(3, 'Khách hàng', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `time`
--

CREATE TABLE `time` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `del_flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `listadmin`
--
DROP TABLE IF EXISTS `listadmin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listadmin`  AS SELECT `admin`.`id` AS `id`, `admin`.`name` AS `name`, `admin`.`email` AS `email`, `admin`.`password` AS `password`, `admin`.`password_encode` AS `password_encode`, `admin`.`date_birth` AS `date_birth`, `admin`.`gender` AS `gender`, `admin`.`phone` AS `phone`, `admin`.`address` AS `address`, `admin`.`role_id` AS `role_id`, `admin`.`area_id` AS `area_id`, `admin`.`del_flag` AS `del_flag`, `admin`.`created_at` AS `created_at`, `admin`.`updated_at` AS `updated_at`, `area`.`area_name` AS `area_name` FROM (`admin` join `area` on(`admin`.`area_id` = `area`.`id`)) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `listpitch`
--
DROP TABLE IF EXISTS `listpitch`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listpitch`  AS SELECT `pitch`.`id` AS `id`, `pitch`.`area_id` AS `area_id`, `pitch`.`pitch_type_id` AS `pitch_type_id`, `pitch`.`pitch_name` AS `pitch_name`, `pitch`.`image_path` AS `image_path`, `pitch`.`price` AS `price`, `pitch`.`del_flag` AS `del_flag`, `pitch`.`created_at` AS `created_at`, `pitch`.`updated_at` AS `updated_at`, `area`.`area_name` AS `area_name`, `area`.`area_address` AS `area_address`, `pitch_type`.`pitch_type_name` AS `pitch_type_name` FROM ((`pitch` join `area` on(`pitch`.`area_id` = `area`.`id`)) join `pitch_type` on(`pitch`.`pitch_type_id` = `pitch_type`.`id`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_area_id_foreign` (`area_id`),
  ADD KEY `admin_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_customer_id_foreign` (`customer_id`),
  ADD KEY `bill_area_id_foreign` (`area_id`),
  ADD KEY `bill_pitch_id_foreign` (`pitch_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_customer_id_foreign` (`customer_id`),
  ADD KEY `comment_pitch_id_foreign` (`pitch_id`),
  ADD KEY `comment_area_id_foreign` (`area_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pitch`
--
ALTER TABLE `pitch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pitch_area_id_foreign` (`area_id`),
  ADD KEY `pitch_pitch_type_id_foreign` (`pitch_type_id`);

--
-- Chỉ mục cho bảng `pitch_type`
--
ALTER TABLE `pitch_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `area`
--
ALTER TABLE `area`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `pitch`
--
ALTER TABLE `pitch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `pitch_type`
--
ALTER TABLE `pitch_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `time`
--
ALTER TABLE `time`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `admin_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `bill_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `bill_pitch_id_foreign` FOREIGN KEY (`pitch_id`) REFERENCES `pitch` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `comment_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `comment_pitch_id_foreign` FOREIGN KEY (`pitch_id`) REFERENCES `pitch` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `pitch`
--
ALTER TABLE `pitch`
  ADD CONSTRAINT `pitch_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `pitch_pitch_type_id_foreign` FOREIGN KEY (`pitch_type_id`) REFERENCES `pitch_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
