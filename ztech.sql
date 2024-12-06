-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2024 at 04:18 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update_ton_kho` (IN `ma_don_hang` VARCHAR(255))   BEGIN
    DECLARE done INT DEFAULT 0;
    DECLARE ma_san_pham INT;
    DECLARE so_luong INT;

    -- Con trỏ để duyệt bảng chi tiết đơn hàng
    DECLARE cur CURSOR FOR
        SELECT chi_tiet_don_hangs.id_san_pham, chi_tiet_don_hangs.so_luong
        FROM chi_tiet_don_hangs
        WHERE chi_tiet_don_hangs.id_don_hang = ma_don_hang;

    -- Xử lý khi hết dữ liệu trong con trỏ
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

    -- Mở con trỏ
    OPEN cur;

    -- Vòng lặp qua các bản ghi trong chi tiết đơn hàng
    read_loop: LOOP
        FETCH cur INTO ma_san_pham, so_luong;
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Cập nhật lại số lượng tồn kho
        UPDATE san_phams
        SET san_phams.hang_ton_kho = san_phams.hang_ton_kho + so_luong
        WHERE san_phams.id = ma_san_pham;
    END LOOP;

    -- Đóng con trỏ
    CLOSE cur;
END$$

DELIMITER ;

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
  `trang_thai` tinyint NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `noi_dung`, `ngay_binh_luan`, `id_nguoi_dung`, `id_san_pham`, `trang_thai`) VALUES
(5, 'Sản phẩm chất lượng', '2024-11-19 16:36:02', 30, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `id_don_hang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `so_luong`, `gia`, `id_san_pham`, `id_don_hang`) VALUES
(60, 1, 6500000, 9, 'ORD041132RE'),
(61, 2, 5000000, 12, 'ORD041132RE'),
(62, 2, 5500000, 1, 'ORD0413382U');

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
  `trang_thai` tinyint NOT NULL DEFAULT '2',
  `id_nguoi_danh_gia` int NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danh_gias`
--

INSERT INTO `danh_gias` (`id`, `sao`, `ngay_danh_gia`, `trang_thai`, `id_nguoi_danh_gia`, `id_san_pham`) VALUES
(25, 4, '2024-11-28 13:14:00', 2, 30, 9),
(26, 3, '2024-11-28 13:14:14', 2, 30, 1),
(27, 2, '2024-11-28 13:28:52', 2, 30, 2);

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
(6, 'Tablet', './uploads/71mdoicpqWL._AC_SL1500_.jpg', 2, 'Tablet');

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
  `email_nguoi_nhan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dia_chi_nhan_hangs`
--

INSERT INTO `dia_chi_nhan_hangs` (`id`, `tinh`, `quan`, `phuong`, `dia_chi`, `ten_nguoi_nhan`, `so_dien_thoai`, `email_nguoi_nhan`) VALUES
(64, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(65, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(66, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(67, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(68, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(69, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(70, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(71, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(72, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(73, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(74, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(75, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(76, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(77, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(78, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(79, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(80, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(81, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(82, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(83, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(84, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(85, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(86, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(87, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(88, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(89, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(90, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(91, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(92, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'đâsdsadas', '312312', 'cuongpxph48448@gmail.com'),
(93, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'phamcuong', '0898645514', 'cuongpxph48448@gmail.com'),
(94, NULL, NULL, NULL, 'Đông Sơn, Thanh Hóa', 'phamcuong', '0898645513', 'cuongpxph48448@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat_hang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tien_ship` int NOT NULL,
  `tong_tien` int DEFAULT '0',
  `thanh_toan` int DEFAULT '0',
  `trang_thai_thanh_toan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Chưa thanh toán',
  `phuong_thuc_thanh_toan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghi_chu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngay_cap_nhat_trang_thai_don_hang` datetime DEFAULT NULL,
  `id_dia_chi_nhan_hang` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_ma_khuyen_mai` int DEFAULT NULL,
  `id_trang_thai_don_hang` int NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ngay_dat_hang`, `tien_ship`, `tong_tien`, `thanh_toan`, `trang_thai_thanh_toan`, `phuong_thuc_thanh_toan`, `ghi_chu`, `ngay_cap_nhat_trang_thai_don_hang`, `id_dia_chi_nhan_hang`, `id_nguoi_dung`, `id_ma_khuyen_mai`, `id_trang_thai_don_hang`) VALUES
('ORD041132RE', '2024-12-06 11:11:32', 30000, 16500000, 16530000, 'Chưa thanh toán', 'COD', NULL, NULL, 93, 30, NULL, 6),
('ORD0413382U', '2024-12-06 11:13:38', 30000, 11000000, 10930000, 'Đã thanh toán', 'COD', NULL, '2024-12-06 11:14:58', 94, 30, 4, 12);

--
-- Triggers `don_hangs`
--
DELIMITER $$
CREATE TRIGGER `CapNhatNgayTrangThai` BEFORE UPDATE ON `don_hangs` FOR EACH ROW BEGIN
    IF NEW.id_trang_thai_don_hang = 10 THEN
        SET NEW.ngay_cap_nhat_trang_thai_don_hang = NOW();
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `cap_nhat_thanh_toan_insert` BEFORE INSERT ON `don_hangs` FOR EACH ROW BEGIN
DECLARE gia_tri_khuyen_mai INT DEFAULT 0;

    -- Lấy giá trị khuyến mãi từ bảng khuyen_mai
    SELECT  ma_khuyen_mais.gia
    INTO  gia_tri_khuyen_mai
    FROM ma_khuyen_mais
    WHERE id = NEW.id_ma_khuyen_mai;

    -- Tính toán trường thanh_toan
    SET NEW.thanh_toan = NEW.tong_tien + NEW.tien_ship - gia_tri_khuyen_mai;
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

    SET NEW.thanh_toan = NEW.tong_tien + NEW.tien_ship - gia_tri_khuyen_mai;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_Update_TrangThaiThanhToan` BEFORE UPDATE ON `don_hangs` FOR EACH ROW BEGIN
    -- Kiểm tra nếu trạng thái mới được cập nhật thành 10
    IF NEW.id_trang_thai_don_hang = 10 OR NEW.id_trang_thai_don_hang = 9 THEN
        SET NEW.trang_thai_thanh_toan = 'Đã thanh toán';
    ELSEIF NEW.id_trang_thai_don_hang = 11 THEN
   		SET NEW.trang_thai_thanh_toan = 'Chưa thanh toán';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_update_order_status` AFTER UPDATE ON `don_hangs` FOR EACH ROW BEGIN
    -- Kiểm tra nếu trạng thái đơn hàng là 'hủy'
    IF NEW.id_trang_thai_don_hang = 7 OR NEW.id_trang_thai_don_hang =  11 THEN
        CALL update_ton_kho(NEW.id);
    END IF;
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
(22, './uploads/product/Nokia ultra Pro phone.jpg', 12),
(23, './uploads/product/download (2).jpg', 13),
(24, './uploads/product/Tính năng PAI trên đồng hồ, vòng đeo tay Xiaomi là gì_ PAI bao nhiêu là tốt_.jpg', 14),
(25, './uploads/product/Samsung - Galaxy Tab S8+ Tablette Android 12,4 Pouces Wi-FI ram 8 Go 256 Go Tablette Andr___.jpg', 15),
(30, './uploads/product/smart-tivi-samsung-4k-43-inch-ua43au7002-6.webp', 1),
(31, './uploads/product/smart-tivi-samsung-4k-43-inch-ua43au7002-7.jpg', 1),
(42, './uploads/product/vi-vn-smart-tivi-samsung-4k-55-inch-ua55cu8000-1 (1).jpg', 16),
(43, './uploads/product/vi-vn-smart-tivi-samsung-4k-55-inch-ua55cu8000-8.png', 16),
(44, './uploads/product/google-tv-aqua-qled-4k-65-inch-aqt65s800ux-1-638645970371841104-700x467.jpg', 17),
(45, './uploads/product/google-tv-aqua-qled-4k-65-inch-aqt65s800ux-3-638645970392969071-700x467.jpg', 17),
(46, './uploads/product/google-tv-aqua-qled-4k-65-inch-aqt65s800ux-(5).jpg', 17),
(47, './uploads/product/smart-nanocell-lg-4k-55-inch-55nano76sqa-2-2-700x467.jpg', 18),
(48, './uploads/product/vi-vn-smart-nanocell-lg-4k-55-inch-55nano76sqa-001-1020x570.jpg', 18),
(49, './uploads/product/smart-samsung-4k-55-inch-ua55bu8000-11-638660090403234695-700x467.jpg', 19),
(50, './uploads/product/smart-samsung-4k-55-inch-ua55bu8000-thumb-638649317772756611-550x340.jpg', 19),
(51, './uploads/product/1-1020x570.jpg', 20),
(52, './uploads/product/smart-samsung-4k-55-inch-ua55bu8000-11-638660090403234695-700x467.jpg', 20),
(53, './uploads/product/vi-vn-asus-vivobook-go-15-e1504fa-r5-nj776w-slider-1.jpg', 21),
(54, './uploads/product/asus-vivobook-go-15-e1504fa-r5-nj776w-thumb-600x600.jpg', 21),
(55, './uploads/product/vi-vn-hp-15-fd0303tu-i3-a2nl4pa-slider-1.jpg', 22),
(56, './uploads/product/hp-15-fd0303tu-i3-a2nl4pa-thumb-1-600x600.jpg', 22),
(57, './uploads/product/vi-vn-lenovo-ideapad-5-14iah8-i5-83bf003wvn-slider-1.jpg', 23),
(58, './uploads/product/lenovo-ideapad-5-14iah8-i5-83bf003wvn-thumb-laptop-638632059812795496-600x600.jpg', 23),
(59, './uploads/product/vi-vn-acer-aspire-lite-14-51m-36mh-i3-nxktvsv001-slider-1.jpg', 24),
(60, './uploads/product/acer-aspire-lite-14-51m-36mh-i3-nxktvsv001-thumb-600x600.jpg', 24),
(61, './uploads/product/vi-vn-hp-245-g10-r5-a20tdpt-1.jpg', 25),
(62, './uploads/product/hp-245-g10-r5-a20tdpt-thumb-600x600.jpg', 25),
(63, './uploads/product/iphone-16-blue-600x600.png', 26),
(64, './uploads/product/iphone-16-xanh-luu-ly-1-638639088268837180-750x500.jpg', 26),
(65, './uploads/product/samsung-galaxy-s24-ultra-xam-6-750x500.jpg', 27),
(66, './uploads/product/samsung-galaxy-s24-ultra-grey-thumbnew-600x600.jpg', 27),
(67, './uploads/product/oppo-reno12-f-5g-cam-1-750x500.jpg', 28),
(68, './uploads/product/oppo-reno12-f-5g-orange-thumb-600x600.jpg', 28),
(69, './uploads/product/vi-vn-samsung-galaxy-fit3-slider-2.jpg', 29),
(70, './uploads/product/samsung-galaxy-fit3-hong-thumb-1-600x600.jpg', 29),
(71, './uploads/product/vi-vn-xiaomi-watch-s-3-slider-4.jpg', 30),
(72, './uploads/product/xiaomi-watch-s-3-bac-tn-600x600.jpg', 30),
(73, './uploads/product/dong-ho-dinh-vi-tre-em-imoo-z1-41-mm-xanh-duong638329652158134133.jpg', 31),
(74, './uploads/product/dong-ho-dinh-vi-tre-em-imoo-z1-41-mm-xanh-duong-tb-600x600.jpg', 31),
(75, './uploads/product/lenovo-tab-plus-4-750x500.jpg', 32),
(76, './uploads/product/lenovo-tab-plus-wifi-8gb-256gb-thumb-600x600.jpg', 32),
(77, './uploads/product/ipad-air-11-inch-m2-wifi-blue-1-750x500.jpg', 33),
(78, './uploads/product/ipad-air-11-inch-m2-wifi-blue-thumb-600x600.jpg', 33),
(79, './uploads/product/ipad-10-wifi-bac-2-750x500.jpg', 34),
(80, './uploads/product/iPad-Gen-10-sliver-thumb-600x600.jpg', 34);

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
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 'VN100', 100000, 19, '2024-12-05 00:00:00', '2024-12-28 00:00:00', 3);

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
  `trang_thai` tinyint DEFAULT '2',
  `dia_chi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoi_dungs`
--

INSERT INTO `nguoi_dungs` (`id`, `ho_ten`, `gioi_tinh`, `nam_sinh`, `email`, `mat_khau`, `dien_thoai`, `admin`, `trang_thai`, `dia_chi`, `code`) VALUES
(5, 'cuong', 1, '2024-11-08', 'cuong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0898645512', 1, 2, '', NULL),
(30, 'phamcuong', 1, '2024-11-25', 'cuongpxph48448@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0898645513', 0, 2, 'Đông Sơn, Thanh Hóa', '546010');

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
(1, 'Màn hình tivi', 'Màn hình tivi', '<p>Chi tiết dài lắm</p>', 5000000, 6000000, 5500000, '2024-11-11 00:00:00', 18, 0, 2, 2),
(2, 'Máy tính apple 2000', 'Máy tính nhanh nhất thế giới', '<p>Máy tính cấu hình cao, mạnh mẽ</p>', 5000000, 6000000, 5600000, '2024-11-11 00:00:00', 68, 0, 2, 6),
(9, 'Laptop Apple', 'Laptop cấu hình đẹp', '<p>Laptop cấu hình đẹp, giá rẻ</p>', 4500000, 7000000, 6500000, '2024-11-13 00:00:00', 19, 0, 2, 3),
(10, 'Đồng hồ thông minh', 'Đồng hồ thông minh ', '<p>Đồng hồ thông minh</p>', 1200000, 3000000, 2500000, '2024-11-07 00:00:00', 20, 0, 2, 5),
(11, 'Màn hình tivi sony', 'Màn hình ti vi', '<p>Màn hình siêu mỏng </p>', 12000000, 15000000, 14500000, '2024-11-08 00:00:00', 20, 0, 2, 2),
(12, 'Điện thoại nokia', 'Điện thoại nokia', '<p>Điện thoại thông minh nokia</p>', 4500000, 6000000, 5000000, '2024-11-19 00:00:00', 18, 0, 2, 4),
(13, 'Điện thoại nokia XS 2024', 'Điện thoại nokia XS 2024', '<p>Điện thoại nokia XS 2024</p>', 1200000, 3000000, 2500000, '2024-11-19 00:00:00', 20, 0, 2, 4),
(14, 'Đồng hồ thông minh xiaomi', 'Đồng hồ thông minh Xiaomi', '<p>Đồng hồ thông minh xiaomi</p>', 600000, 1200000, 1000000, '2024-11-19 00:00:00', 20, 0, 2, 5),
(15, 'tablet galaxy S8+', 'Tablet galaxy S8+', '<p>Tablet galaxy S8+</p>', 3500000, 5500000, 5000000, '2024-11-19 00:00:00', 20, 0, 2, 6),
(16, 'Smart Tivi Samsung 4K 55 inch', 'Smart Tivi Samsung 4K 55 inch UA55CU8000', '<p><i><strong>Smart Tivi Samsung 4K 55 inch UA55CU8000&nbsp;đem đến trải nghiệm tuyệt đỉnh nhờ màn hình 55 inch độ phân giải 4K với hơn 8 triệu điểm ảnh, khung hình sống động nhờ bộ vi xử lý Crystal 4K, âm thanh chuyển động theo hình ảnh OTS Lite, hệ điều hành Tizen™ đa nhiệm, dễ sử dụng cùng nhiều tiện ích thông minh khác.</strong></i></p>', 10000000, 13400000, 12400000, '2024-12-03 00:00:00', 50, 0, 2, 2),
(17, 'Google Tivi QLED Aqua', 'Google Tivi QLED Aqua 4K 65 inch AQT65S800UX', '<p><i>Google Tivi QLED Aqua 4K 65 inch AQT65S800UX <strong>sở hữu thiết kế tinh tế, tối giản nhưng đậm nét sang trọng, màn hình Quantum Dot 4K cho hình ảnh sắc nét và sống động, Dolby Atmos cung cấp trải nghiệm âm thanh vòm 360 độ, hệ điều hành Google TV tích hợp kho ứng dụng giải trí đa dạng và phong phú.</strong></i></p>', 12000000, 17990000, 14490000, '2024-12-05 00:00:00', 25, 0, 2, 2),
(18, 'Smart Tivi NanoCell LG 4K', 'Smart Tivi NanoCell LG 4K 55 inch 55NANO76SQA', '<p><i><strong>Smart Tivi NanoCell LG 4K 55 inch 55NANO76SQA, một tuyệt tác đến từ LG với thiết kế đơn giản, tinh tế, tái hiện sống động cuộc sống thực lên màn hình 4K trên dải màu Nano Color, tối ưu hiển thị và âm thanh nhờ bộ xử&nbsp;α5 Gen5 AI 4K, AI Sound Pro tinh chỉnh âm thanh lôi cuốn, cùng mang lại trải nghiệm nghe nhìn hoàn hảo trên các lựa chọn phong phú từ hệ điều hành WebOS 22.</strong></i></p>', 10000000, 20000000, 15000000, '2024-12-05 00:00:00', 30, 0, 2, 2),
(19, 'Smart Tivi Samsung 4K', 'Smart Tivi Samsung 4K Crystal UHD 55 inch UA55BU8000', '<p><i><strong>Smart Tivi Samsung 4K Crystal UHD 55 inch UA55BU8000&nbsp;sở hữu&nbsp;thiết kế tinh tế, màn hình&nbsp;LED viền (Edge LED), VA LCD&nbsp;siêu mỏng đi cùng chất lượng hình ảnh 4K cực nét, công nghệ OTS Lite điều chỉnh âm thanh theo chuyển động của vật thể, hệ điều hành Tizen™ trực quan, thân thiện và vô số các tiện ích giải trí đi kèm&nbsp;chắc chắn đáp ứng nhu cầu giải trí cơ bản của gia đình bạn.</strong></i></p>', 7000000, 12900000, 12000000, '2024-12-05 00:00:00', 45, 0, 2, 2),
(20, 'Smart Tivi Neo QLED 4K', 'Smart Tivi Neo QLED 4K 55 inch Samsung QA55QN85C', '<p><i><strong>Smart Tivi Neo QLED 4K 55 inch Samsung QA55QN85C&nbsp;có thiết kế siêu mỏng, sang trọng, tái hiện hình ảnh chuẩn 4K nổi bật nhờ bộ xử lý Neural Quantum 4K AI&nbsp;20 nơ-ron, tạo nên hình ảnh độ tương phản cao với công nghệ Quantum Matrix, hình ảnh giàu sắc thái, màu sắc sống động nhờ công nghệ&nbsp;Neo Quantum HDR, cho bạn tận hưởng âm thanh vòm như ở rạp hát với công nghệ Dolby Atmos, hệ điều hành Tizen™&nbsp;thao tác tiện lợi, điều khiển bằng giọng nói với Bixby có tiếng Việt tiết kiệm thời gian.</strong></i></p>', 15000000, 25000000, 22000000, '2024-12-05 00:00:00', 30, 0, 2, 2),
(21, 'Laptop Asus Vivobook Go', 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U/16GB/512GB/Chuột/Win11 (NJ776W)', '<p>Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W)&nbsp;được trang bị vi xử lý AMD Ryzen 7000 Series mới, giúp người dùng hoàn thành tác vụ một cách nhanh chóng và hiệu quả. Nhiều tính năng hiện đại giúp khẳng định cá tính riêng, sẵn sàng đồng hành để bạn luôn linh hoạt và chủ động trong công việc.</p>', 7000000, 14000000, 12000000, '2024-12-05 00:00:00', 25, 0, 2, 3),
(22, 'Laptop HP 15 fd0303TU i3', 'Laptop HP 15 fd0303TU i3 1315U/8GB/512GB/Win11 (A2NL4PA)', '<p>Laptop HP 15 fd0303TU i3 1315U (A2NL4PA) không chỉ đáp ứng nhu cầu học tập, văn phòng và thiết kế đồ họa cơ bản, mà còn là người bạn đồng hành lý tưởng cho mọi hành trình của bạn. Với thiết kế thanh lịch, hiệu năng ổn định, màn hình sắc nét, kết nối đa dạng và giá thành hợp lý, sản phẩm này xứng đáng là lựa chọn hàng đầu trong phân khúc laptop giá rẻ.</p>', 8000000, 12000000, 10000000, '2024-12-04 00:00:00', 60, 0, 2, 3),
(23, 'Laptop Lenovo Ideapad', 'Laptop Lenovo Ideapad Slim 5 14IAH8 i5 12450H/16GB/1TB/Win11 (83BF003WVN)', '<p>Nếu bạn muốn tìm kiếm cho mình một sản phẩm trong phân khúc giá hợp lý, cấu hình mạnh thì không thể nào bỏ qua với chiếc laptop Lenovo Ideapad Slim 5 14IAH8 i5 12450H (83BF003WVN). Sự kết hợp đặc sắc giữa hiệu năng ấn tượng cùng nhiều tính năng đáng chú ý, đây chắc chắn là một lựa chọn đáng cân nhắc cho mọi người dùng.</p>', 12000000, 16000000, 15500000, '2024-12-05 00:00:00', 30, 0, 2, 3),
(24, 'Laptop Acer Aspire', 'Laptop Acer Aspire Lite 14 51M 36MH i3 1215U/8GB/256GB/Win11 (NX.KTVSV.001)', '<p>Laptop Acer Aspire Lite 14 51M 36MH i3 1215U (NX.KTVSV.001) là cái tên đang \"làm mưa làm gió\" trong phân khúc laptop học tập - văn phòng bởi sự kết hợp hoàn hảo giữa hiệu năng ổn định, thiết kế thanh lịch và mức giá vô cùng hợp lý. Máy đáp ứng tốt các nhu cầu sử dụng và giải trí cơ bản của nhiều người dùng khi được trang bị chip Intel Core i3 thế hệ 12.</p>', 5000000, 9550000, 7000000, '2024-12-05 00:00:00', 50, 0, 2, 3),
(25, 'Laptop HP 245', 'Laptop HP 245 G10 R5 7530U/8GB/512GB/Win11 (A20TDPT)', '<p>Laptop HP 245 G10 R5 7530U (A20TDPT) sự lựa chọn hợp lý dành cho các bạn đang tìm kiếm một bộ máy có thể hoàn thành đa dạng các tác vụ trong học tập và công việc hằng ngày nhờ sở hữu chip AMD Ryzen 5 7000 series mới hiện nay.</p>', 8800000, 12500000, 10500000, '2024-12-05 00:00:00', 25, 0, 2, 3),
(26, ' IPhone 16 128GB', 'Điện thoại iPhone 16 128GB', '<p>Tháng 9 năm 2024, Apple đã chính thức trình làng iPhone 16, Bên cạnh thiết kế tinh tế và hiệu năng mạnh mẽ, chiếc điện thoại còn gây ấn tượng với những tính năng thông minh, hứa hẹn nâng cao chất lượng sử dụng smartphone của người dùng.</p>', 19900000, 23000000, 22500000, '2024-12-05 00:00:00', 25, 0, 2, 4),
(27, 'Điện thoại Samsung Galaxy S24', 'Điện thoại Samsung Galaxy S24 Ultra 5G 12GB/256GB', '<p>Samsung Galaxy S24 Ultra&nbsp;một bước tiến đáng kể trong thế giới di động năm 2024. Sản phẩm không chỉ là sự tiếp nối thành công từ thế hệ trước mà còn đem đến nhiều cải tiến đáng chú ý về thiết kế, hiệu suất, camera và thời lượng pin. Đặc biệt, với sự hỗ trợ đến từ AI thông qua các tính năng mới giúp máy trở nên đáng chú ý hơn bao giờ hết.</p>', 20000000, 25000000, 22500000, '2024-12-05 00:00:00', 35, 0, 2, 4),
(28, 'Điện thoại OPPO Reno12', 'Điện thoại OPPO Reno12 F 5G 12GB/256GB', '<p>OPPO Reno12 là chiếc điện thoại mới, thiết kế đẹp mắt, phù hợp cho những ai cần một chiếc máy vừa mạnh mẽ vừa dễ sử dụng. Với khả năng sạc nhanh, camera rõ nét và màn hình sống động, sản phẩm sẽ mang đến trải nghiệm tuyệt vời cho người dùng.</p>', 6000000, 9000000, 7500000, '2024-12-05 00:00:00', 25, 0, 2, 4),
(29, 'Vòng tay thông minh Samsung Galaxy Fit3', 'Vòng tay thông minh Samsung Galaxy Fit3', '<p>Samsung Galaxy Fit3&nbsp;mang đến một trải nghiệm hoàn toàn mới so với thế hệ tiền nhiệm với màn hình lớn 1.6 inch, đi cùng nhiều tính năng tiên tiến hỗ trợ theo dõi sức khỏe và luyện tập thể thao hiệu quả. Nổi bật nhất là thời lượng pin ấn tượng, đáp ứng nhu cầu sử dụng cơ bản trong nhiều ngày liền.</p>', 6000000, 1200000, 1000000, '2024-12-05 00:00:00', 25, 0, 2, 5),
(30, 'Đồng hồ thông minh Xiaomi Watch S3 47mm', 'Đồng hồ thông minh Xiaomi Watch S3 47mm', '<p>Với thiết kế sang trọng, hiện đại, tích hợp nhiều tính năng thông minh cùng một thời lượng pin dài. Xiaomi Watch S3 hứa hẹn sẽ là một lựa chọn tuyệt vời cho người dùng yêu thích công nghệ, mong muốn trải nghiệm một chiếc smartwatch đa năng.&nbsp;</p>', 2500000, 3500000, 3200000, '2024-12-05 00:00:00', 35, 0, 2, 5),
(31, 'Em imoo Z1 Xanh dương', 'Đồng Hồ Định Vị Trẻ Em imoo Z1 Xanh dương', '<p>Đồng Hồ Định Vị Trẻ Em imoo Z1 41mm dây TPU Xanh dương&nbsp;là thiết bị liên lạc tiện lợi dành cho các bé và phụ huynh mà không cần kết nối với điện thoại. Nhờ được trang bị Nano SIM, định vị độc lập, camera tích hợp,... cha mẹ có thể yên tâm hơn vào những lúc không ở cạnh trẻ.</p>', 1500000, 2500000, 1790000, '2024-12-05 00:00:00', 30, 0, 2, 5),
(32, 'Máy tính bảng Lenovo', 'Máy tính bảng Lenovo Tab Plus WiFi 8GB/256GB', '<p>Lenovo Tab Plus mang đến thiết kế thanh lịch, hiệu năng mạnh và trải nghiệm giải trí tuyệt vời. Với màn hình lớn, chân đế tiện dụng, âm thanh sống động và pin lâu dài, máy đáp ứng tốt nhu cầu từ công việc đến giải trí. Đây là lựa chọn phù hợp cho người dùng tìm kiếm một chiếc tablet tầm trung đến cao cấp.</p>', 5500000, 8000000, 7500000, '2024-12-05 00:00:00', 50, 0, 2, 6),
(33, 'Máy tính bảng iPad Air 6', 'Máy tính bảng iPad Air 6 M2 11 inch WiFi 128GB', '<p>Nâng cao trải nghiệm người dùng với hiệu suất ấn tượng và thiết kế tinh tế đến từ iPad Air M2 128GB, sở hữu chip Apple M2 8 nhân đầy mạnh mẽ. Hứa hẹn mang đến cho bạn không chỉ một công cụ giải trí lý tưởng mà còn là người bạn làm làm việc đầy hiệu quả.</p>', 14000000, 18000000, 16500000, '2024-12-05 00:00:00', 50, 0, 2, 6),
(34, 'Máy tính bảng iPad 10', 'Máy tính bảng iPad 10 WiFi 64GB', '<p>iPad 10 WiFi 64GB là mẫu máy tính bảng giá rẻ được nhà Apple giới thiệu trong khoảng thời gian gần đây với mức giá vô cùng hấp dẫn, đây được xem là sự lột xác hoàn toàn so với iPad 9 ở năm ngoái khi máy sở hữu ngoại hình khác biệt và thanh mảnh hơn. Bên cạnh đó thì hiệu năng cũng được xem là điểm nổi bật nhờ trang bị con chip Apple A14 Bionic.</p>', 6500000, 10000000, 8500000, '2024-12-04 00:00:00', 50, 0, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_yeu_thichs`
--

CREATE TABLE `san_pham_yeu_thichs` (
  `id` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `san_pham_yeu_thichs`
--

INSERT INTO `san_pham_yeu_thichs` (`id`, `id_nguoi_dung`, `id_san_pham`) VALUES
(29, 30, 11),
(30, 30, 9),
(31, 30, 1);

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
(2, ' Công Nghệ: Cuộc Cách Mạng Thay Đổi Thế Giới', 'Trong thời đại ngày nay, công nghệ đã trở thành một phần không thể thiếu trong cuộc sống của con người. Từ việc đơn giản như kết nối mọi người qua mạng xã hội, đến những tiến bộ đột phá trong trí tuệ nhân tạo (AI), công nghệ đang định hình tương lai', './uploads/pngtree-cool-new-mobile-phone-promotion-purple-banner-image_183067.jpg', '2024-11-18 00:00:00', 0, '<p><span class=\"text-big\"><strong>1. Công Nghệ Đang Làm Gì Cho Chúng Ta?</strong></span></p><p>- Công nghệ không chỉ giúp tiết kiệm thời gian mà còn tạo ra những giá trị không thể đo đếm được trong nhiều lĩnh vực:</p><p><strong>+ Y tế</strong>: Các thiết bị thông minh giúp theo dõi sức khỏe cá nhân, máy móc hiện đại hỗ trợ phẫu thuật chính xác, và AI được sử dụng để phân tích bệnh lý và nghiên cứu thuốc chữa bệnh.</p><p><strong>+ Giáo dục</strong>: Các nền tảng học trực tuyến như Coursera, Udemy, hay Khan Academy đã mở ra cơ hội học tập cho hàng triệu người trên khắp thế giới, vượt qua mọi rào cản địa lý.</p><p><strong>+ Kinh doanh</strong>: Công nghệ điện toán đám mây, blockchain, và tự động hóa đã giúp doanh nghiệp tối ưu hóa vận hành, cải thiện bảo mật và nâng cao trải nghiệm khách hàng.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>2. Trí Tuệ Nhân Tạo (AI): Người Bạn Đồng Hành Hay Thách Thức?</strong></span></p><p>- Trí tuệ nhân tạo là một trong những bước tiến lớn nhất của công nghệ hiện đại. AI đã có mặt trong mọi ngóc ngách của cuộc sống, từ chatbot trả lời tự động, trợ lý ảo như Siri và Alexa, đến các ứng dụng nhận diện khuôn mặt, dịch thuật và phân tích dữ liệu.</p><p>- Tuy nhiên, AI cũng đặt ra nhiều thách thức, bao gồm vấn đề quyền riêng tư, an ninh mạng và mất việc làm trong một số ngành nghề. Vì vậy, việc ứng dụng AI đòi hỏi sự cân bằng giữa lợi ích và những rủi ro tiềm ẩn.</p><p>&nbsp;</p><p><span class=\"text-big\"><strong>3. Công Nghệ Xanh: Xu Hướng Của Tương Lai</strong></span></p><p>- Trong bối cảnh biến đổi khí hậu đang là mối lo ngại toàn cầu, công nghệ xanh đang nổi lên như một giải pháp hiệu quả. Các công nghệ như năng lượng mặt trời, năng lượng gió, và xe điện đã giúp giảm phát thải carbon và bảo vệ môi trường.</p><p>- Ngoài ra, việc phát triển các vật liệu tái chế, công nghệ xử lý rác thải thông minh và nông nghiệp công nghệ cao cũng đóng vai trò quan trọng trong việc xây dựng một tương lai bền vững.</p><p>&nbsp;</p><p>&nbsp;</p><p>Công nghệ không ngừng phát triển, mang lại cơ hội và thách thức mới. Điều quan trọng là chúng ta cần học cách sử dụng công nghệ một cách thông minh, có trách nhiệm để tạo ra những giá trị tích cực cho xã hội. Trong một thế giới đang thay đổi nhanh chóng, việc thích nghi và tận dụng công nghệ là chìa khóa giúp con người vươn xa hơn và đạt được những thành tựu vĩ đại.</p>', 2),
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
(7, 'Đã hủy', '#496e12'),
(8, 'Đã xác nhận', '#fcba03'),
(9, 'Đang giao', '#03e3fc'),
(10, 'Đã giao', '#03fcf8'),
(11, 'Thất bại', '#fcad03'),
(12, 'Thành công', '#fc5a03');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `danh_gias`
--
ALTER TABLE `danh_gias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dia_chi_nhan_hangs`
--
ALTER TABLE `dia_chi_nhan_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ma_khuyen_mais`
--
ALTER TABLE `ma_khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `CapNhatTrangThaiMoi2Phut` ON SCHEDULE EVERY 1 DAY STARTS '2024-12-04 10:28:48' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN
    UPDATE don_hangs
    SET id_trang_thai_don_hang = 12,
        ngay_cap_nhat_trang_thai_don_hang = NOW()
    WHERE id_trang_thai_don_hang = 10
      AND TIMESTAMPDIFF(DAY, ngay_cap_nhat_trang_thai_don_hang, NOW()) >= 3;
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
