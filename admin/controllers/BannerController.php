<?php
class BannerController
{
    public $modelBanner;
    public function __construct()
    {
        $this->modelBanner = new Banner();
    }
    public function index()
    {
        $banners = $this->modelBanner->getAll();
        require_once('./views/banner/list-banner.php');
    }
    public function create()
    {
        require_once('./views/banner/create-banner.php');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $upFile = './uploads/' . basename($_FILES['hinh_anh']['name']);
            $hinhAnh = move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $upFile) ? $upFile : '';
            $tieuDe = $_POST['tieu_de'];
            $trangThai = $_POST['trang_thai'] ?? null;
            $errors = [];
            if (empty($tieuDe)) {
                $errors['tieu_de'] = 'Tiêu đề banner là bắt buộc';
            }
            if (empty($trangThai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($hinhAnh)) {
                $errors['hinh_anh'] = 'Ảnh banner là bắt buộc';
            }

            if (empty($errors)) {
                $this->modelBanner->postData($tieuDe, $hinhAnh, $trangThai);
                unset($_SESSION['errors']);
                header('Location: ?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-banner');
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $banner = $this->modelBanner->getDetailData($id);
        require_once('./views/banner/edit-banner.php');
    }
    public function detail()
    {
        $id = $_GET['id'];
        $banner = $this->modelBanner->getDetailData($id);
        require_once("./views/banner/detail-banner.php");
    }
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_FILES)) {
                $upFile = './uploads/' . basename($_FILES['hinh_anh']['name']);
                if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $upFile)) {
                    $hinhAnh = $upFile;
                } else {
                    $hinhAnh = $_POST['hinh_anh_truoc'];
                };
            }
            $tieuDe = $_POST['tieu_de'];
            $trangThai = $_POST['trang_thai'] ?? null;
            $id = $_POST['id'];
            $errors = [];
            if (empty($tieuDe)) {
                $errors['tieu_de'] = 'Tiêu đề banner là bắt buộc';
            }
            if (empty($trangThai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($hinhAnh)) {
                $errors['hinh_anh'] = 'Ảnh banner là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelBanner->updateData($id, $tieuDe, $hinhAnh, $trangThai);
                unset($_SESSION['errors']);
                header('Location: ?act=banners');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-banner&id=$id");
                exit();
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['banner_id'];
            $this->modelBanner->deleteData($id);
            header('Location: ?act=banners');
            exit();
        }
    }
}
