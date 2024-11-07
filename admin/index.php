<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/NguoiDungController.php';

// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/LienHe.php';
require_once 'models/NguoiDung.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                     => (new DashboardController())->index(),
    //Quản lý danh mục
    'danh-mucs'             => (new DanhMucController())->index(),
    'form-them-danh-muc'    => (new DanhMucController())->create(),
    'them-danh-muc'         => (new DanhMucController())->store(),
    'form-sua-danh-muc'     => (new DanhMucController())->edit(),
    'sua-danh-muc'          => (new DanhMucController())->update(),
    'xoa-danh-muc'          => (new DanhMucController())->destroy(),

    //Quản lý liên hệ
    'lien-hes' => (new LienHeController())->index(),
    'xoa-lien-he' => (new LienHeController())->destroy(),

    //Quản lý người dùng
    'nguoi-dungs' => (new NguoiDungController())->index(),
    'xoa-nguoi-dung' => (new NguoiDungController())->destroy(),
};
