<?php
class DanhMucController
{
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }
    public function index()
    {
        $danhMucs = $this->modelDanhMuc->getAll();
        require_once('./views/danhmuc/list-danh-muc.php');
    }
    public function create()
    {
        require_once('./views/danhmuc/create-danh-muc.php');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $upFile = './uploads/' . basename($_FILES['hinh_anh']['name']);
            $hinhAnh = move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $upFile) ? $upFile : '';
            $tenDanhMuc = $_POST['ten_danh_muc'];
            $trangThai = $_POST['trang_thai'] ?? null;

            $errors = [];
            if (empty($tenDanhMuc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($trangThai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($hinhAnh)) {
                $errors['hinh_anh'] = 'Icon là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->postData($tenDanhMuc, $trangThai, $hinhAnh);
                unset($_SESSION['errors']);
                header('Location: ?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-danh-muc');
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $danhMuc = $this->modelDanhMuc->getDetailData($id);
        require_once('./views/danhmuc/edit-danh-muc.php');
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES)) {
                $upFile = './uploads/' . basename($_FILES['hinh_anh']['name']);
                if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $upFile)) {
                    $hinhAnh = $upFile;
                } else {
                    $hinhAnh = $_POST['hinh-anh-truoc'];
                };
            }

            $tenDanhMuc = $_POST['ten_danh_muc'];
            $trangThai = $_POST['trang_thai'] ?? null;
            $id = $_POST['id'];
            $errors = [];
            if (empty($tenDanhMuc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }
            if (empty($errors)) {
                echo $hinhAnh;
                $this->modelDanhMuc->updateData($id, $tenDanhMuc, $trangThai, $hinhAnh);


                print_r($_POST['hinh-anh-truoc']);
                unset($_SESSION['errors']);
                header('Location: ?act=danh-mucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-danh-muc');
                exit();
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['danh_muc_id'];
            $this->modelDanhMuc->deleteData($id);
            header('Location: ?act=danh-mucs');
            exit();
        }
    }
}
