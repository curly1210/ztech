-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2024 at 03:46 AM
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
  `hinh_anh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `noi_dung` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int NOT NULL,
  `so_luong` int NOT NULL,
  `gia` int NOT NULL,
  `id_san_pham` int NOT NULL,
  `id_don_hang` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dia_chi_nhan_hang`
--

CREATE TABLE `dia_chi_nhan_hang` (
  `id` int NOT NULL,
  `tinh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phuong` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nguoi_dung` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ngay_dat_hang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tong_tien_hoa_don` int NOT NULL,
  `trang_thai_don_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thang_thai_thanh_toan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phuong_thuc_thanh_toan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dia_chi_nhan_hang` int NOT NULL,
  `id_nguoi_dung` int NOT NULL,
  `id_ma_khuyen_mai` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `hinh_anh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lien_hes`
--

CREATE TABLE `lien_hes` (
  `id` int NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung` varchar(350) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ma_khuyen_mais`
--

CREATE TABLE `ma_khuyen_mais` (
  `id` int NOT NULL,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dungs`
--

CREATE TABLE `nguoi_dungs` (
  `id` int NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint NOT NULL,
  `nam_sinh` date NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dien_thoai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia_nhap` int NOT NULL,
  `gia_ban` int NOT NULL,
  `ngay_nhap` datetime NOT NULL,
  `hang_ton_kho` int NOT NULL,
  `luot_xem` int NOT NULL,
  `danh_muc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `tieu_de` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta_ngan` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `luot_xem` int NOT NULL DEFAULT '0',
  `noi_dung` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_in_order_detail` (`id_san_pham`),
  ADD KEY `fk_order_in_order_detail` (`id_don_hang`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dia_chi_nhan_hang`
--
ALTER TABLE `dia_chi_nhan_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_in_address` (`id_nguoi_dung`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_in_order` (`id_dia_chi_nhan_hang`),
  ADD KEY `fk_user_in_order` (`id_nguoi_dung`),
  ADD KEY `dk_code_sale_in_order` (`id_ma_khuyen_mai`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dia_chi_nhan_hang`
--
ALTER TABLE `dia_chi_nhan_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anhs`
--
ALTER TABLE `hinh_anhs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lien_hes`
--
ALTER TABLE `lien_hes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ma_khuyen_mais`
--
ALTER TABLE `ma_khuyen_mais`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoi_dungs`
--
ALTER TABLE `nguoi_dungs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham_yeu_thichs`
--
ALTER TABLE `san_pham_yeu_thichs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tin_tucs`
--
ALTER TABLE `tin_tucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_order_in_order_detail` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hangs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_product_in_order_detail` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dia_chi_nhan_hang`
--
ALTER TABLE `dia_chi_nhan_hang`
  ADD CONSTRAINT `fk_user_in_address` FOREIGN KEY (`id_nguoi_dung`) REFERENCES `nguoi_dungs` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `dk_code_sale_in_order` FOREIGN KEY (`id_ma_khuyen_mai`) REFERENCES `ma_khuyen_mais` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_address_in_order` FOREIGN KEY (`id_dia_chi_nhan_hang`) REFERENCES `dia_chi_nhan_hang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
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
  ADD CONSTRAINT `fk_product_in_image` FOREIGN KEY (`id_san_pham`) REFERENCES `san_phams` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
