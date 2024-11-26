-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2023 lúc 04:24 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tsl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(5, 'Kính râm'),
(6, 'Kính cận'),
(7, 'Kính mát nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_status` varchar(250) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_status`, `order_date`, `total_amount`, `user_id`) VALUES
(8, 'Hoàn tất đơn hàng', '2023-12-08 19:50:56', 3500000, 1),
(9, 'Chờ xác nhận', '2023-12-08 22:09:28', 13000000, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `quantity`, `unit_price`, `product_id`, `order_id`) VALUES
(1, 1, 3500000, 8, 8),
(2, 4, 3250000, 10, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `product_image` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `create_date` date NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `discount`, `description`, `product_image`, `category_id`, `create_date`, `view`) VALUES
(8, 'THE SNORKEL 03 SUNGLASSES', 3500000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheSnorkel03-Purple-MirrorIron1.webp', 5, '2023-12-08', 1),
(9, 'THE CUT 16 SUNGLASSES', 3250000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheCut16SunglassesBlack-Black-1.webp', 5, '2023-12-08', 4),
(10, 'THE CUT 19 SUNGLASSES', 3250000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheCut19SunglassesTeal-Teal-1.webp', 5, '2023-12-08', 2),
(11, 'THE CUT 20 SUNGLASSES', 3250000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheCut20SunglassesLightGrey-Black-1.webp', 5, '2023-12-08', 0),
(12, 'THE CUT EDGE 01 SUNGLASSES', 3250000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheCutEdge01-MatteDenim-Black-1.webp', 5, '2023-12-08', 0),
(13, 'THE OBSIDIAN 02', 2350000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/Obsidian02Optical-Havana-1.webp', 6, '2023-12-08', 0),
(14, 'THE ASSEMBLED 08', 2250000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TA08FadedAsh-1.webp', 6, '2023-12-08', 0),
(15, 'THE ASSEMBLED 09', 2250000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheAssembled09Black-1.webp', 5, '2023-12-08', 1),
(16, 'THE ASSEMBLED 11', 3400000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheAssembled11Black-Rhino1_122f0454-020d-4365-b475-0d5fb2869e37.webp', 6, '2023-12-08', 0),
(17, 'THE SNORKEL 02', 3000000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheSnorkel02-Crystal1.webp', 5, '2023-12-08', 0),
(18, 'THE SNORKEL 01', 3000000, 0, '<p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p encode=\"\" sans\",=\"\" arial,=\"\" helvetica,=\"\" sans-serif;\"=\"\" style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22);\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/TheSnorkel01-BlackMatte1.webp', 6, '2023-12-08', 0),
(19, 'Kính mát Jill Stuart JS10057_59_C02B', 3000000, 0, '<p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Phù hợp hoạt động ngoài trời như: Chơi Golf, du lịch, câu cá, lái xe,… bởi nó mang lại hình ảnh rõ nét và trung thực.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Tròng kính chống chói, chống tia UV</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p>', './upload_img/21-088897-768x768.jpg.webp', 7, '2023-12-08', 3),
(20, 'Kính mát Molsion MS3021_C10.CS', 2980000, 0, '<p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Thích hợp với số độ từ 0 đến -3. Trên -3 độ nên lắp tròng chiết suất cao để kính mỏng đẹp</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Gọng kính mỏng nhẹ, đem lại trải nghiệm thoải mái nhất cho người đeo.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Phù hợp cho cả nam và nữ.</p>', './upload_img/21-088879-768x768.jpg.webp', 7, '2023-12-08', 0),
(21, 'Kính Mát Hangten HT94285US', 1475000, 0, '<p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Phù hợp hoạt động ngoài trời như: Chơi Golf, du lịch, câu cá, lái xe,… bởi nó mang lại hình ảnh rõ nét và trung thực.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Tròng kính chống chói, chống tia UV</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Gọng kính làm từ chất liệu cao cấp, mang vẻ đẹp sang trọng.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Độ bền cao vì khó trầy xước, không bị ăn mòn.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Không bị hoen gỉ, xỉn màu, không gây kích ứng da. An toàn cho sức khỏe người dùng.</p><p style=\"margin-top: 1em; padding: 0px; overflow-wrap: anywhere; color: rgb(22, 22, 22); font-family: &quot;Encode Sans&quot;, Arial, Helvetica, sans-serif;\">➡️ Dễ phối đồ với nhiều phong cách khác nhau</p>', './upload_img/kiotviet_7cabc21f2f5290321132c99622d0575d.jpg', 7, '2023-12-08', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `phone` int(10) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `phone`, `address`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 1, '2023-10-26 21:30:35', 815416056, 'Quảng nam, huyện điện bàn, xã Điện Phong'),
(11, 'Tình Nguyễn', 'tinhabc3009@gmail.com', 'tinh3092004', 2, '2023-12-08 22:06:08', 815416086, 'Quảng nam, huyện điện bàn, xã Điện Phong');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`),
  ADD KEY `order_detail_ibfk` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
