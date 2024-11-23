-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2024 at 05:07 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ztech`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `tieu_de` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint NOT NULL,
  `hinh_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `tieu_de`, `trang_thai`, `hinh_anh`) VALUES
(3, 'slide 1', 1, './uploads/may-tinh-bang-la-gi-8-cong-dung-loi-ich-vuot-tro.jpg'),
(4, 'slide 2', 2, './uploads/cach-su-dung-dong-ho-thong-minh-cho-nguoi-moi-thumbnail.jpg'),
(5, 'slide 3', 1, './uploads/Banner-Consumer_690x300.jpg'),
(6, 'slide 4', 2, './uploads/xiaomi20230614113218.png'),
(7, 'slide 5', 2, './uploads/b02b945985621ef056b04775bbf657b9.png');

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `noi_dung` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_binh_luan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_nguoi_dung` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `noi_dung`, `ngay_binh_luan`, `id_nguoi_dung`, `id_san_pham`, `trang_thai`) VALUES
(3, ' dsadsa', '2024-11-11 03:18:18', 29, 2, 1),
(5, 'Sản phẩm chất lượng', '2024-11-19 16:36:02', 30, 10, 2),
(6, 'dsfsdf', '2024-11-19 21:50:09', 29, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `id_don_hang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `so_luong`, `gia`, `id_san_pham`, `id_don_hang`) VALUES
(18, 1, 30000, 1, 9),
(19, 1, 45000, 2, 9),
(20, 3, 2000, 12, 9),
(21, 5, 4320000, 15, 9),
(22, 2, 2000, 14, 10),
(23, 5, 4320000, 1, 10),
(24, 1, 20000, 15, 12);

--
-- Triggers `chi_tiet_don_hangs`
--
DELIMITER $$
CREATE TRIGGER `cap_nhat_gia_insert` BEFORE INSERT ON `chi_tiet_don_hangs` FOR EACH ROW UPDATE don_hangs
    SET tong_tien = tong_tien + ( NEW.so_luong * NEW.gia)
    WHERE id = NEW.id_don_hang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `danh_gias`
--

CREATE TABLE `danh_gias` (
  `id` int NOT NULL,
  `sao` int NOT NULL,
  `ngay_danh_gia` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint NOT NULL DEFAULT '1',
  `id_nguoi_danh_gia` int NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `sao`, `ngay_danh_gia`, `trang_thai`, `id_nguoi_danh_gia`, `id_san_pham`) VALUES
(3, 4, '2024-11-18 16:18:34', 2, 30, 10),
(4, 2, '2024-11-19 16:37:50', 2, 29, 10),
(5, 4, '2024-11-19 21:48:50', 2, 29, 10);

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint NOT NULL,
  `mo_ta` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten`, `hinh_anh`, `trang_thai`, `mo_ta`) VALUES
(2, 'Ti vi', './uploads/tivi-xiaomi-a-l32m8p2sea.jpg', 2, 'Màn hình tivi , máy tính'),
(3, 'Laptop', './uploads/81N6HAWnb0L._AC_SL1500_.jpg', 2, 'gồm các loại máy tính'),
(4, 'Điện thoại', './uploads/danhmuc1.jpg', 2, 'Bao gồm các sản phẩm điện thoại thông minh'),
(5, 'Đồng hồ thông minh', './uploads/dong-ho-thong-minh-dinh-vi-y31-3-1.jpg', 2, 'Đồng hồ thông minh'),
(6, 'tablet', './uploads/71mdoicpqWL._AC_SL1500_.jpg', 2, 'tablet');

-- --------------------------------------------------------

--
-- Table structure for table `dia_chi_nhan_hangs`
--

CREATE TABLE `dia_chi_nhan_hangs` (
  `id` int NOT NULL,
  `tinh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phuong` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_chi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nguoi_nhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nguoi_nhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dia_chi_nhan_hangs`
--

INSERT INTO `dia_chi_nhan_hangs` (`id`, `tinh`, `quan`, `phuong`, `dia_chi`, `ten_nguoi_nhan`, `so_dien_thoai`, `email_nguoi_nhan`) VALUES
(2, NULL, NULL, NULL, 'Hoàn Kiếm - Hà Nội', 'Đinh thị Loan', '232424', 'dinhLoan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ngay_dat_hang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tien_ship` int NOT NULL,
  `tong_tien` int NOT NULL DEFAULT '0',
  `thanh_toan` int NOT NULL DEFAULT '0',
  `trang_thai_thanh_toan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phuong_thuc_thanh_toan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dia_chi_nhan_hang` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_ma_khuyen_mai` int DEFAULT NULL,
  `id_trang_thai_don_hang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ngay_dat_hang`, `tien_ship`, `tong_tien`, `thanh_toan`, `trang_thai_thanh_toan`, `phuong_thuc_thanh_toan`, `ghi_chu`, `id_dia_chi_nhan_hang`, `id_nguoi_dung`, `id_ma_khuyen_mai`, `id_trang_thai_don_hang`) VALUES
(9, '2024-11-17 15:09:17', 23, 175000, 124977, 'Chưa thanh toán', 'Thanh toán khi nhận hàng', 'adasd', 2, 30, 1, 10),
(10, '2024-11-20 12:57:42', 12000, 3000, 2323, 'Chưa thanh toán', 'Tiền mặt', 'sdasd', 2, 5, 2, 10),
(11, '2024-11-21 17:15:28', 12, 24, 10, 'Chưa thanh toán', 'Thanh toán khi nhận hàng', 'ádad', 2, 30, 2, 10),
(12, '2024-11-21 17:20:22', 12000, 50000, 25679, 'Chưa thanh toán', 'Thanh toán khi nhận hàng', 'áda', 2, 29, 2, 8);

--
-- Triggers `don_hangs`
--
DELIMITER $$
CREATE TRIGGER `cap_nhat_thanh_toan_insert` BEFORE INSERT ON `don_hangs` FOR EACH ROW BEGIN
DECLARE gia_tri_khuyen_mai INT DEFAULT 0;

    -- Lấy giá trị khuyến mãi từ bảng khuyen_mai
    SELECT  ma_khuyen_mais.gia
    INTO  gia_tri_khuyen_mai
    FROM ma_khuyen_mais
    WHERE id = NEW.id_ma_khuyen_mai;

    -- Tính toán trường thanh_toan
    SET NEW.thanh_toan = NEW.tong_tien - NEW.tien_ship - gia_tri_khuyen_mai;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cap_nhat_thanh_toan_update` BEFORE UPDATE ON `don_hangs` FOR EACH ROW BEGIN
    DECLARE gia_tri_khuyen_mai INT DEFAULT 0;

    SELECT ma_khuyen_mais.gia
    INTO gia_tri_khuyen_mai
    FROM ma_khuyen_mais
    WHERE ma_khuyen_mais.id = NEW.id_ma_khuyen_mai;

    SET NEW.thanh_toan = NEW.tong_tien - NEW.tien_ship - gia_tri_khuyen_mai;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `so_luong` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anhs`
--

CREATE TABLE `hinh_anhs` (
  `id` int NOT NULL,
  `hinh_anh` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hinh_anhs`
--

INSERT INTO `hinh_anhs` (`id`, `hinh_anh`, `id_san_pham`) VALUES
(17, './uploads/product/th.jpg', 9),
(18, './uploads/product/dong-ho-thong-minh-dinh-vi-y31-3-1.jpg', 10),
(19, './uploads/product/71mdoicpqWL._AC_SL1500_.jpg', 2),
(20, './uploads/product/tivi-xiaomi-a-l32m8p2sea.jpg', 11),
(21, './uploads/product/LG QNED 86QNED996PB 86\'\' Smart TV 8K NOVITÀ 2021 Wi-Fi Processore α9 Ge.jpg', 1),
(22, './uploads/product/Nokia ultra Pro phone.jpg', 12),
(23, './uploads/product/download (2).jpg', 13),
(24, './uploads/product/Tính năng PAI trên đồng hồ, vòng đeo tay Xiaomi là gì_ PAI bao nhiêu là tốt_.jpg', 14),
(25, './uploads/product/Samsung - Galaxy Tab S8+ Tablette Android 12,4 Pouces Wi-FI ram 8 Go 256 Go Tablette Andr___.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `ho_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trang_thai` tinyint NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lien_hes`
--

INSERT INTO `lien_hes` (`id`, `ho_ten`, `so_dien_thoai`, `email`, `noi_dung`, `ngay_tao`, `trang_thai`) VALUES
(2, 'Pham Cuong', '0898645512', 'cuong@gmail.com', 'Đây là liên hệ', '2024-11-07 20:29:00', 0),
(3, 'đá', 'sad', 'ádas', 'sda', '2024-11-09 13:23:30', 0),
(4, 'sadas', 'ádas', 'đá', 'sad', '2024-11-09 13:23:34', 0),
(5, 'dsad', 'ád', 'sada', 'ád', '2024-11-09 13:23:53', 0),
(6, 'đá', 'sadas', 'sadas', 'sad', '2024-11-09 13:24:50', 0),
(7, 'đâs', 'âsdsa', 'đas', 'đá', '2024-11-09 13:25:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ma_khuyen_mais`
--

CREATE TABLE `ma_khuyen_mais` (
  `id` int NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `so_luong` int NOT NULL,
  `ngay_bat_dau` datetime NOT NULL,
  `ngay_ket_thuc` datetime NOT NULL,
  `trang_thai` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ma_khuyen_mais`
--

INSERT INTO `ma_khuyen_mais` (`id`, `ten`, `gia`, `so_luong`, `ngay_bat_dau`, `ngay_ket_thuc`, `trang_thai`) VALUES
(1, 'vn50', 50000, 23, '2024-11-12 00:00:00', '2024-11-22 00:00:00', 3),
(2, 'vn23', 12321, 12, '2024-11-07 00:00:00', '2024-11-22 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ho_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint NOT NULL,
  `nam_sinh` date NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint NOT NULL DEFAULT '0',
  `trang_thai` tinyint DEFAULT '1',
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ho_ten`, `gioi_tinh`, `nam_sinh`, `email`, `mat_khau`, `dien_thoai`, `admin`, `trang_thai`, `dia_chi`) VALUES
(5, 'cuong', 1, '2024-11-08', 'cuong@gmail.com', '123456', '0898645513', 1, 2, ''),
(29, 'easdas', 2, '2024-11-28', 'sdsda@gmail.cdsad', '12312', '123', 0, 1, ''),
(30, 'đâsdsadas', 1, '2024-11-25', 'cuong123@gmai.com', '123', '312312', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `noi_dungs`
--

CREATE TABLE `noi_dungs` (
  `id` int NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `noi_dungs`
--

INSERT INTO `noi_dungs` (`id`, `logo`, `email`, `link_facebook`, `link_instagram`, `dia_chi`, `so_dien_thoai`) VALUES
(1, 'images/logo/logo.png', 'cuong123@gmail.com', 'https://www.facebook.com/profile.php?id=100065686291351&locale=vi_VN', 'https://www.instagram.com/', '18A-Phương Canh-Nam Từ Liêm-Hà Nội ', '0398475323');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_chi_tiet` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_nhap` int NOT NULL,
  `gia_ban` int NOT NULL,
  `gia_khuyen_mai` int NOT NULL,
  `ngay_nhap` datetime NOT NULL,
  `hang_ton_kho` int NOT NULL,
  `luot_xem` int NOT NULL DEFAULT '0',
  `trang_thai` tinyint NOT NULL,
  `danh_muc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten`, `mo_ta`, `mo_ta_chi_tiet`, `gia_nhap`, `gia_ban`, `gia_khuyen_mai`, `ngay_nhap`, `hang_ton_kho`, `luot_xem`, `trang_thai`, `danh_muc_id`) VALUES
(1, 'Màn hình tivi', 'Đây màn hình tivi', '<p>Chi tiết dài lắm</p>', 20000, 30000, 25000, '2024-11-11 00:00:00', 100, 0, 2, 2),
(2, 'Máy tính apple 2000', 'Máy tính nhanh nhất thế giới', '<p>àng chính hãng - Bảo Hành &nbsp;- Mới 100% nguyên đai nguyên kiện - Không hàng trưng bày</p>', 36000, 45000, 41000, '2024-11-11 00:00:00', 100, 0, 2, 6),
(3, 'dasd', '2321', '<p>sadasdsadsa</p>', 232132, 2312, 12321, '2024-10-31 00:00:00', 12321, 0, 1, 2),
(4, '312321', '321312', '<p>dasdas</p>', 321, 312, 2321, '2024-12-06 00:00:00', 12321, 0, 2, 2),
(9, 'Laptop Apple', 'laptop cấu hình xẹp', '<p>laptop cấu hình xẹp</p>', 1000000, 12000000, 2100000, '2024-11-13 00:00:00', 3, 0, 2, 3),
(10, 'Đồng hồ thông minh', 'Đồng hồ thông minh ', '<p>sadasdasd</p>', 5000000, 6000000, 5500000, '2024-11-07 00:00:00', 4, 0, 2, 5),
(11, 'Màn hình tivi sony', 'màn hình ti vi', '<p>sadasd</p>', 12000000, 13000000, 12500000, '2024-11-08 00:00:00', 3, 0, 2, 2),
(12, 'Điện thoại thông minh nokia', 'Điện thoại thông minh nokia', '<p>Điện thoại thông minh nokia</p>', 3900000, 4000000, 4200000, '2024-11-19 00:00:00', 2, 0, 2, 4),
(13, 'Điện thoại nokia XS 2024', 'Điện thoại nokia XS 2024', '<p>Điện thoại nokia XS 2024</p>', 5500000, 6000000, 5600000, '2024-11-19 00:00:00', 3, 0, 2, 4),
(14, 'Đồng hồ thông minh xiaomi', 'Đồng hồ thông minh xiaomi', '<p>Đồng hồ thông minh xiaomi</p>', 1800000, 2300000, 2000000, '2024-11-19 00:00:00', 3, 0, 2, 5),
(15, 'tablet galaxy S8+', 'tablet galaxy S8+', '<p>tablet galaxy S8+</p>', 4000000, 4800000, 4700000, '2024-11-19 00:00:00', 4, 0, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_yeu_thichs`
--

CREATE TABLE `san_pham_yeu_thichs` (
  `id` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tin_tucs`
--

CREATE TABLE `tin_tucs` (
  `id` int NOT NULL,
  `tieu_de` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_ngan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `luot_xem` int NOT NULL DEFAULT '0',
  `noi_dung` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_thai` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tin_tucs`
--

INSERT INTO `tin_tucs` (`id`, `tieu_de`, `mo_ta_ngan`, `hinh_anh`, `ngay_tao`, `luot_xem`, `noi_dung`, `trang_thai`) VALUES
(2, ' Công Nghệ: Cuộc Cách Mạng Thay Đổi Thế Giới', 'Trong thời đại ngày nay, công nghệ đã trở thành một phần không thể thiếu trong cuộc sống của con người.', './uploads/pngtree-cool-new-mobile-phone-promotion-purple-banner-image_183067.jpg', '2024-11-18 00:00:00', 0, '<p><span class=\"text-big\"><strong>1. Công Nghệ Đang Làm Gì Cho Chúng Ta?</strong></span></p><p>- Công nghệ không chỉ giúp tiết kiệm thời gian mà còn tạo ra những giá trị không thể đo đếm được trong nhiều lĩnh vực:</p><p><strong>+ Y tế</strong>: Các thiết bị thông minh giúp theo dõi sức khỏe cá nhân, máy móc hiện đại hỗ trợ phẫu thuật chính xác, và AI được sử dụng để phân tích bệnh lý và nghiên cứu thuốc chữa bệnh.</p><p><strong>+ Giáo dục</strong>: Các nền tảng học trực tuyến như Coursera, Udemy, hay Khan Academy đã mở ra cơ hội học tập cho hàng triệu người trên khắp thế giới, vượt qua mọi rào cản địa lý.</p><p><strong>+ Kinh doanh</strong>: Công nghệ điện toán đám mây, blockchain, và tự động hóa đã giúp doanh nghiệp tối ưu hóa vận hành, cải thiện bảo mật và nâng cao trải nghiệm khách hàng.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>2. Trí Tuệ Nhân Tạo (AI): Người Bạn Đồng Hành Hay Thách Thức?</strong></span></p><p>- Trí tuệ nhân tạo là một trong những bước tiến lớn nhất của công nghệ hiện đại. AI đã có mặt trong mọi ngóc ngách của cuộc sống, từ chatbot trả lời tự động, trợ lý ảo như Siri và Alexa, đến các ứng dụng nhận diện khuôn mặt, dịch thuật và phân tích dữ liệu.</p><p>- Tuy nhiên, AI cũng đặt ra nhiều thách thức, bao gồm vấn đề quyền riêng tư, an ninh mạng và mất việc làm trong một số ngành nghề. Vì vậy, việc ứng dụng AI đòi hỏi sự cân bằng giữa lợi ích và những rủi ro tiềm ẩn.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>3. Công Nghệ Xanh: Xu Hướng Của Tương Lai</strong></span></p><p>- Trong bối cảnh biến đổi khí hậu đang là mối lo ngại toàn cầu, công nghệ xanh đang nổi lên như một giải pháp hiệu quả. Các công nghệ như năng lượng mặt trời, năng lượng gió, và xe điện đã giúp giảm phát thải carbon và bảo vệ môi trường.</p><p>- Ngoài ra, việc phát triển các vật liệu tái chế, công nghệ xử lý rác thải thông minh và nông nghiệp công nghệ cao cũng đóng vai trò quan trọng trong việc xây dựng một tương lai bền vững.</p><p>&nbsp;</p><p>&nbsp;</p><p>Công nghệ không ngừng phát triển, mang lại cơ hội và thách thức mới. Điều quan trọng là chúng ta cần học cách sử dụng công nghệ một cách thông minh, có trách nhiệm để tạo ra những giá trị tích cực cho xã hội. Trong một thế giới đang thay đổi nhanh chóng, việc thích nghi và tận dụng công nghệ là chìa khóa giúp con người vươn xa hơn và đạt được những thành tựu vĩ đại.</p>', 2),
(3, 'Xu Hướng Công Nghệ Điện Thoại Năm 2024: Tương Lai Trong Tầm Tay', 'Năm 2024, ngành công nghiệp điện thoại di động tiếp tục chứng kiến những bước tiến lớn về công nghệ, mang lại cho người dùng những trải nghiệm vượt trội. Các thương hiệu lớn không ngừng cạnh tranh, đổi mới', './uploads/Free Photo _ Over .jpg', '2024-11-18 00:00:00', 0, '<p><span class=\"text-big\"><strong>1. Thiết Kế Gấp Gọn Và Màn Hình Gập</strong></span></p><p>- Xu hướng điện thoại màn hình gập đã không còn là điều xa lạ, nhưng năm 2024, công nghệ này đang ở một tầm cao mới. Các thiết bị như <strong>Samsung Galaxy Z Fold6</strong> hay <strong>Google Pixel Fold 2</strong> cung cấp màn hình gập không viền, chống nếp nhăn, và độ bền cao hơn.</p><p>- Đặc biệt, các mẫu điện thoại gập gọn kiểu <strong>clamshell</strong> (như Galaxy Z Flip6) tiếp tục được yêu thích nhờ sự nhỏ gọn, tiện lợi, nhưng vẫn đầy phong cách.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>2. Camera AI Đỉnh Cao</strong></span></p><p>- Camera trên điện thoại năm 2024 không chỉ mạnh mẽ mà còn \"thông minh hơn\". Các thiết bị như <strong>iPhone 16 Pro Max</strong> và <strong>Xiaomi 14 Ultra</strong> sử dụng cảm biến AI tiên tiến, cho phép:</p><p>+ Chụp ảnh siêu chi tiết ngay cả trong điều kiện ánh sáng yếu.</p><p>+ Nhận diện ngữ cảnh để tự động điều chỉnh các thông số chụp ảnh.</p><p>+ Quay video 8K với khả năng ổn định khung hình vượt trội.</p><p>&nbsp;</p><p>- Công nghệ zoom quang học đạt tới <strong>200x</strong> trên các flagship mới, khiến việc chụp ảnh xa trở nên dễ dàng hơn bao giờ hết.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>3. Hiệu Năng Vượt Trội Với Chip 3nm</strong></span></p><p>- Chip xử lý 3nm mới như <strong>Snapdragon 8 Gen 3</strong> hay <strong>Apple A18 Bionic</strong> đang dẫn đầu về sức mạnh và hiệu quả năng lượng. Những con chip này không chỉ mang lại khả năng xử lý cực nhanh mà còn giúp tiết kiệm pin, cải thiện hiệu suất đồ họa, hỗ trợ các ứng dụng AI và AR phức tạp.</p><p>- Người dùng có thể chơi game đồ họa nặng, làm video, hoặc sử dụng các ứng dụng đa nhiệm mà không gặp vấn đề về giật lag.</p><p>&nbsp;</p><p>Năm 2024 đánh dấu một bước tiến mới trong ngành công nghiệp điện thoại. Với các công nghệ như màn hình gập, camera AI, và hiệu năng vượt trội, điện thoại không chỉ là thiết bị liên lạc mà đã trở thành một \"người bạn đồng hành thông minh\", hỗ trợ mọi khía cạnh của cuộc sống.</p><p>Bạn đang mong chờ điều gì nhất từ các mẫu điện thoại năm nay? Hãy chia sẻ để cùng nhau thảo luận! 😊</p>', 2),
(4, ' Đồng Hồ Thông Minh 2024: Người Bạn Đồng Hành Hoàn Hảo Cho Cuộc Sống Hiện Đại', 'Trong năm 2024, đồng hồ thông minh tiếp tục chứng minh vai trò không thể thiếu trong cuộc sống hiện đại. Không chỉ là một thiết bị theo dõi sức khỏe, đồng hồ thông minh còn trở thành một \"trợ lý cá nhân\" mạnh mẽ .', './uploads/Smartwatch Prototype.jpg', '2024-11-18 00:00:00', 0, '<p><span class=\"text-big\"><strong>1. Thiết Kế Tinh Tế Và Đa Dạng</strong></span></p><p>- Các dòng đồng hồ thông minh năm 2024 mang lại nhiều cải tiến về thiết kế. Từ phong cách thể thao năng động đến kiểu dáng sang trọng, thanh lịch, người dùng có thể dễ dàng chọn một chiếc đồng hồ phù hợp với phong cách cá nhân:</p><p><strong>+ Màn hình AMOLED và MicroLED:</strong> Hiển thị hình ảnh sắc nét hơn, tiết kiệm năng lượng hơn.</p><p><strong>+ Chất liệu cao cấp:</strong> Vỏ làm từ titanium, thép không gỉ, hoặc gốm, với dây đeo từ silicon hoặc da tự nhiên, đem lại cảm giác thoải mái khi đeo.</p><p><strong>+ Thiết kế module:</strong> Người dùng có thể thay đổi mặt đồng hồ và dây đeo dễ dàng, tạo sự mới mẻ mỗi ngày.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>2. Theo Dõi Sức Khỏe Chính Xác Hơn</strong></span></p><p>- Đồng hồ thông minh 2024 tích hợp các cảm biến tiên tiến, giúp người dùng theo dõi sức khỏe một cách toàn diện:</p><p><strong>+ Đo nhịp tim liên tục</strong> và cảnh báo khi nhịp tim bất thường.</p><p><strong>+ Cảm biến đo oxy trong máu (SpO2):</strong> Đặc biệt hữu ích với những người luyện tập thể thao hoặc sống ở vùng cao.</p><p><strong>+ Phân tích giấc ngủ:</strong> Theo dõi chu kỳ giấc ngủ, đưa ra lời khuyên cải thiện chất lượng nghỉ ngơi.</p><p><strong>+ Theo dõi sức khỏe nữ giới:</strong> Hỗ trợ dự đoán chu kỳ kinh nguyệt và các chỉ số liên quan.</p><p>&nbsp;</p><p>- Ngoài ra, một số dòng cao cấp còn hỗ trợ <strong>phát hiện sớm các dấu hiệu bệnh lý</strong>, như tăng huyết áp hoặc rối loạn hô hấp.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>3. Trợ Lý Cá Nhân Thông Minh</strong></span></p><p>- Đồng hồ thông minh hiện nay không chỉ giúp xem giờ mà còn là một trợ lý đắc lực:</p><p><strong>+ Kết nối và nhận thông báo:</strong> Hiển thị cuộc gọi, tin nhắn, email và thông báo ứng dụng trực tiếp trên cổ tay.</p><p><strong>+ Điều khiển giọng nói:</strong> Tích hợp các trợ lý ảo như Siri, Google Assistant, và Alexa, cho phép người dùng thực hiện các tác vụ nhanh chóng.</p><p><strong>+ Thanh toán không chạm:</strong> Hỗ trợ ví điện tử như Google Pay, Apple Pay, giúp thanh toán tiện lợi mà không cần mang theo ví.</p><p>&nbsp;</p><p>&nbsp;</p><p>Đồng hồ thông minh năm 2024 không chỉ là một thiết bị công nghệ mà còn là một người bạn đồng hành giúp bạn sống khỏe, sống hiệu quả và kết nối tốt hơn. Với những cải tiến vượt bậc cả về tính năng và thiết kế, đồng hồ thông minh ngày càng trở thành một phần quan trọng trong cuộc sống hiện đại.</p>', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_mau` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten`, `ma_mau`) VALUES
(6, 'Chờ xác nhận', '#2ab850'),
(7, 'Đã xác nhận ', '#496e12'),
(8, 'Đang giao', '#fcba03'),
(9, 'Đã giao', '#03e3fc'),
(10, 'Giao hàng thành công', '#03fcf8'),
(11, 'Giao hàng thất bại', '#fcad03'),
(12, 'Đã hủy', '#fc5a03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_in_comment` (`id_nguoi_dung`),
  ADD KEY `fk_product_in_comment` (`id_san_pham`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_in_order_detail` (`id_san_pham`),
  ADD KEY `fk_order_in_order_detail` (`id_don_hang`);

--
-- Indexes for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_in_review` (`id_san_pham`),
  ADD KEY `fk_user_in_review` (`id_nguoi_danh_gia`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dia_chi_nhan_hangs`
--
ALTER TABLE `dia_chi_nhan_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_in_order` (`id_dia_chi_nhan_hang`),
  ADD KEY `fk_user_in_order` (`id_nguoi_dung`),
  ADD KEY `dk_code_sale_in_order` (`id_ma_khuyen_mai`),
  ADD KEY `fk_status_order_in_order` (`id_trang_thai_don_hang`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_in_cart` (`id_nguoi_dung`),
  ADD KEY `fk_product_in_cart` (`id_san_pham`);

--
-- Indexes for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_in_image` (`id_san_pham`);

--
-- Indexes for table `lien_hes`
--
ALTER TABLE `lien_hes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ma_khuyen_mais`
--
ALTER TABLE `ma_khuyen_mais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`) USING BTREE;

--
-- Indexes for table `noi_dungs`
--
ALTER TABLE `noi_dungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_in_product` (`danh_muc_id`);

--
-- Indexes for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_in_favourite` (`id_nguoi_dung`),
  ADD KEY `fk_product_in_favourite` (`id_san_pham`);

--
-- Indexes for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dia_chi_nhan_hangs`
--
ALTER TABLE `dia_chi_nhan_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ma_khuyen_mais`
--
ALTER TABLE `ma_khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `noi_dungs`
--
ALTER TABLE `noi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `fk_product_in_comment` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_in_comment` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `fk_order_in_order_detail` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hangs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product_in_order_detail` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `danh_gias`
--
ALTER TABLE `danh_gias`
  ADD CONSTRAINT `fk_product_in_review` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_in_review` FOREIGN KEY (`id_nguoi_danh_gia`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `dk_code_sale_in_order` FOREIGN KEY (`id_ma_khuyen_mai`) REFERENCES `ma_khuyen_mais` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_address_in_order` FOREIGN KEY (`id_dia_chi_nhan_hang`) REFERENCES `dia_chi_nhan_hangs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_status_order_in_order` FOREIGN KEY (`id_trang_thai_don_hang`) REFERENCES `trang_thai_don_hangs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_in_order` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `fk_product_in_cart` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_in_cart` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  ADD CONSTRAINT `fk_product_in_image` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `fk_category_in_product` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  ADD CONSTRAINT `fk_product_in_favourite` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_in_favourite` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
