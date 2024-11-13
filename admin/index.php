<?php
session_start();

if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}

if (isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
    header("Location: ../index.php");
}


// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/NguoiDungController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/TrangThaiDonHangController.php';
require_once 'controllers/BannerController.php';
require_once 'controllers/MaKhuyenMaiController.php';
require_once 'controllers/SanPhamController.php';
require_once 'controllers/DonHangController.php';

// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/TinTuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/LienHe.php';
require_once 'models/TrangThaiDonHang.php';
require_once 'models/Banner.php';
require_once 'models/MaKhuyenMai.php';
require_once 'models/SanPham.php';
require_once 'models/DonHang.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                     => (new DashboardController())->index(),

    //Quản lý danh mục
    'danh-mucs'             => (new DanhMucController())->index(),
    'xem-chi-tiet-danh-muc' => (new DanhMucController())->detail(),
    'form-them-danh-muc'    => (new DanhMucController())->create(),
    'them-danh-muc'         => (new DanhMucController())->store(),
    'form-sua-danh-muc'     => (new DanhMucController())->edit(),
    'sua-danh-muc'          => (new DanhMucController())->update(),
    'xoa-danh-muc'          => (new DanhMucController())->destroy(),

    //Quản lý liên hệ
    'lien-hes'               => (new LienHeController())->index(),
    'xoa-lien-he'            => (new LienHeController())->destroy(),
    'chi-tiet-lien-he'       => (new LienHeController())->detail(),
    'sua-trang-thai-lien-he' => (new LienHeController())->updateStatus(),

    //Quản lý người dùng
    'nguoi-dungs'           => (new NguoiDungController())->index(),
    'them-nguoi-dung'       => (new NguoiDungController())->create(),
    'xoa-nguoi-dung'        => (new NguoiDungController())->destroy(),
    'chi-tiet-nguoi-dung'   => (new NguoiDungController())->detail(),
    'trang-thai-nguoi-dung' => (new NguoiDungController())->changeStatus(),
    'dang-xuat'             => (new NguoiDungController())->logout(),


    //Quản lý tin tức
    'tin-tucs'             => (new TinTucController())->index(),
    'form-them-tin-tuc'    => (new TinTucController())->create(),
    'them-tin-tuc'         => (new TinTucController())->store(),
    'form-sua-tin-tuc'     => (new TinTucController())->edit(),
    'sua-tin-tuc'          => (new TinTucController())->update(),
    'xoa-tin-tuc'          => (new TinTucController())->destroy(),
    'xem-chi-tiet-tin-tuc' => (new TinTucController())->detail(),

    //Quản lý banner
    'banners'             => (new BannerController())->index(),
    'form-them-banner'    => (new BannerController())->create(),
    'them-banner'         => (new BannerController())->store(),
    'form-sua-banner'     => (new BannerController())->edit(),
    'sua-banner'          => (new BannerController())->update(),
    'xoa-banner'          => (new BannerController())->destroy(),
    'xem-chi-tiet-banner' => (new BannerController())->detail(),

    //Quản lý trạng thái đơn hàng
    'trang-thai-don-hangs'          => (new TrangThaiDonHangController())->index(),
    'xoa-trang-thai-don-hang'       => (new TrangThaiDonHangController())->destroy(),
    'form-sua-trang-thai-don-hang'  => (new TrangThaiDonHangController())->formEdit(),
    'sua-trang-thai-don-hang'       => (new TrangThaiDonHangController())->update(),
    'form-them-trang-thai-don-hang' => (new TrangThaiDonHangController())->formCreate(),
    'them-trang-thai-don-hang'      => (new TrangThaiDonHangController())->create(),

    //Quản lý mã khuyến mãi
    'ma-khuyen-mais'             => (new MaKhuyenMaiController())->index(),
    'form-them-ma-khuyen-mai'    => (new MaKhuyenMaiController())->create(),
    'them-ma-khuyen-mai'         => (new MaKhuyenMaiController())->store(),
    'form-sua-ma-khuyen-mai'     => (new MaKhuyenMaiController())->edit(),
    'sua-ma-khuyen-mai'          => (new MaKhuyenMaiController())->update(),
    'xoa-ma-khuyen-mai'          => (new MaKhuyenMaiController())->destroy(),
    'xem-chi-tiet-ma-khuyen-mai' => (new MaKhuyenMaiController())->detail(),

    //Quản lý sản phẩm
    'san-phams'             => (new SanPhamController())->index(),
    'chi-tiet-san-pham'     => (new SanPhamController())->detail(),
    'form-them-san-pham'    => (new SanPhamController())->formCreate(),
    'them-san-pham'         => (new SanPhamController())->create(),
    'xoa-san-pham'          => (new SanPhamController())->destroy(),
    'form-sua-san-pham'     => (new SanPhamController())->formUpdate(),
    'sua-san-pham'          => (new SanPhamController())->update(),
    'xoa-danh-gia'          => (new SanPhamController())->deleteReview(),
    'xoa-binh-luan'         => (new SanPhamController())->deleteComment(),

    //Quản lý đơn hàng
    'don-hangs'                        => (new DonHangController())->index(),
    'thay-doi-trang-thai-don-hang'     => (new DonHangController())->changeStatusOrder(),
    'cap-nhat-trang-thai-thanh-toan'   => (new DonHangController())->changeStatusPayment()
};
