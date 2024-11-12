<?php
class MaKhuyenmaiController
{
    public $modelMaKhuyenMai;
    public function __construct()
    {
        $this->modelMaKhuyenMai = new MaKhuyenMai();
    }
    public function index()
    {
        $search = $_GET["ten_ma"] ??  '';
        $maKhuyenMais = $this->modelMaKhuyenMai->getAll($search);
        require_once('./views/makhuyenmai/list-ma-khuyen-mai.php');
    }
    public function create()
    {
        require_once('./views/makhuyenmai/create-ma-khuyen-mai.php');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $tenMa = $_POST['ten_ma'];
            $soLuong = $_POST['so_luong'];
            $giaMa = $_POST['gia_ma'];
            $ngayBatDau = !empty($_POST['ngay_bat_dau']) ? date("Y-m-d", strtotime($_POST['ngay_bat_dau'])) : null;
            $ngayKetThuc = !empty($_POST['ngay_ket_thuc']) ? date("Y-m-d", strtotime($_POST['ngay_ket_thuc'])) : null;
            $ngayHienTai = date("Y-m-d");
            if ($ngayHienTai > $ngayKetThuc) {
                $trangThai = 1;
            } else if ($ngayHienTai < $ngayBatDau) {
                $trangThai = 2;
            } else if ($ngayHienTai >= $ngayBatDau && $ngayHienTai <= $ngayKetThuc) {
                $trangThai = 3;
            } else {
                $trangThai = null;
            }

            $errors = [];
            if (empty($tenMa)) {
                $errors['ten_ma'] = 'Tên mã là bắt buộc';
            }
            if (empty($soLuong)) {
                $errors['so_luong'] = 'Số lượng mã là bắt buộc';
            } else if ($soLuong < 0) {
                $errors['so_luong'] = 'Số lượng phải là số dương ';
            }
            if (empty($giaMa)) {
                $errors['gia_ma'] = 'Giá mã là bắt buộc';
            } else if ($giaMa < 0) {
                $errors['gia_ma'] = 'Giá phải là số dương ';
            }
            if (empty($ngayBatDau)) {
                $errors['ngay_bat_dau'] = 'Ngày bắt đầu là bắt buộc';
            }
            if (empty($ngayKetThuc)) {
                $errors['ngay_ket_thuc'] = 'Ngày kết thúc là bắt buộc';
            }
            if (!empty($ngayBatDau) && !empty($ngayKetThuc)) {
                if ($ngayBatDau > $ngayKetThuc) {
                    $errors['message'] = "Ngày bắt đầu không được vượt quá ngày kết thúc";
                }
            }
            if (empty($errors)) {
                $this->modelMaKhuyenMai->postData($tenMa, $giaMa, $soLuong, $trangThai, $ngayBatDau, $ngayKetThuc);
                unset($_SESSION['errors']);
                header('Location: ?act=ma-khuyen-mais');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-ma-khuyen-mai');
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $maKhuyenMai = $this->modelMaKhuyenMai->getDetailData($id);
        require_once('./views/makhuyenmai/edit-ma-khuyen-mai.php');
    }
    public function detail()
    {
        $id = $_GET['id'];
        $maKhuyenMai = $this->modelMaKhuyenMai->getDetailData($id);
        require_once("./views/makhuyenmai/detail-ma-khuyen-mai.php");
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenMa = $_POST['ten_ma'];
            $soLuong = $_POST['so_luong'];
            $giaMa = $_POST['gia_ma'];
            $id = $_POST['id'];
            $errors = [];
            if (empty($tenMa)) {
                $errors['ten_ma'] = 'Tên mã là bắt buộc';
            }

            if (empty($soLuong)) {
                $errors['so_luong'] = 'Số lượng mã là bắt buộc';
            } else if ($soLuong < 0) {
                $errors['so_luong'] = 'Số lượng phải là số dương ';
            }
            if (empty($giaMa)) {
                $errors['gia_ma'] = 'Giá mã là bắt buộc';
            } else if ($giaMa < 0) {
                $errors['gia_ma'] = 'Giá phải là số dương ';
            }


            if (empty($errors)) {
                $this->modelMaKhuyenMai->updateData($id, $tenMa, $giaMa, $soLuong);
                unset($_SESSION['errors']);
                header('Location: ?act=ma-khuyen-mais');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-ma-khuyen-mai&id=$id");
                exit();
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['ma_khuyen_mai_id'];
            $this->modelMaKhuyenMai->deleteData($id);
            header('Location: ?act=ma-khuyen-mais');
            exit();
        }
    }
}
