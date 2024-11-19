<?php
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/NguoiDungController.php';

// Require toàn bộ file Models
require_once './models/Base.php';
require_once './models/NguoiDung.php';
require_once './models/Home.php';


// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new HomeController())->index(),
    'lien-he' => (new HomeController())->contactPage(),

    //Người dùng
    'form-dang-nhap' => (new NguoiDungController())->formLogin(),
    'dang-nhap'      => (new NguoiDungController())->login(),
    'dang-xuat'      => (new NguoiDungController())->logout(),
    'form-dang-ky'   => (new NguoiDungController())->formSignUp(),
    'dang-ky'        => (new NguoiDungController())->signUp(),
    'list-yeu-thich' => (new NguoiDungController())->listLike(),
};
