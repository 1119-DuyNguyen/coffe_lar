-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 26, 2023 lúc 05:36 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_ban_nuoc_modified`
--

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupons` (`id`, `name`, `thumb_image`, `code`, `description`, `start_date`, `end_date`, `discount`,
                      `condition`, `discount_type`, `total`, `status`, `created_at`, `updated_at`)
VALUES (1, 'Khuyen mai thang 6', '7831320.jpg', NULL, 'KMT6', '2022-06-05', '2022-07-30', 60, '1', 1, 1, 2,
        '2022-05-19 07:24:17', '2022-08-24 00:57:48'),
       (2, 'Giảm giá tháng 7.1', '4747366.jpg', 'KMT7.1', 'Giảm giá 10000 cho mỗi đơn hàng.', '2022-07-01',
        '2022-07-30', 10000, '2', 2, 1, 2, '2022-06-30 20:09:07', '2022-08-24 00:57:48'),
       (3, 'Khuyến mãi tháng 7 cho từng sản phẩm', '9742219.jpg', 'KMT7-1SP',
        'Khuyến mãi với các sản phẩm và phê và nước trái cây.', '2022-07-01', '2022-07-30', 2000, '1', 2, 1, 2,
        '2022-06-30 20:11:04', '2022-08-24 00:57:48'),
       (4, 'Khuyễn mãi giảm 10%', '4114106.jpg', 'KM-10', 'khuyen mai', '2022-07-01', '2022-07-30', 10, '2', 1,
        1, 2, '2022-06-30 20:43:39', '2022-08-24 00:57:48'),
       (5, 'Khuyễn mãi cho toàn bộ khách hàng', '7012063.jpg', 'KM-ALL',
        'Đây là khuyễn mãi cho toàn bộ khách hàng.', '2022-07-05', '2022-07-30', 2000, '2', 2, 1, 2,
        '2022-07-04 21:08:12', '2022-08-24 00:57:48'),
       (6, 'Khuyễn mãi cho khách hàng thành viên 2', '7437879.jpeg', 'KM2',
        'Đây là khuyễn mãi mới cho khách hàng thành viên.', '2022-07-05', '2022-07-26', 10000, '2', 2, 0, 2,
        '2022-07-04 21:09:01', '2022-08-24 00:57:48');
    INSERT
INTO `coupon_product` (`coupon_id`, `product_id`)
VALUES
    ( 3, 1), ( 3, 2), ( 3, 14), ( 1, 7), ( 1, 3), ( 1, 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
