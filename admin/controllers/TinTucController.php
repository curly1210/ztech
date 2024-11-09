<?php
class TinTucController
{
    public $modelTinTuc;
    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }
    public function index()
    {
        $tinTucs = $this->modelTinTuc->getAll();
        require_once('./views/tintuc/list-tin-tuc.php');
    }
    public function create()
    {
        require_once('./views/tintuc/create-tin-tuc.php');
    }
    public function detail()
    {
        $id = $_GET['id'];
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once('./views/tintuc/detail-tin-tuc.php');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $upFile = './uploads/' . basename($_FILES['hinh_anh']['name']);
            $hinhAnh = move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $upFile) ? $upFile : '';
            $tieuDe = $_POST['tieu_de'];
            $trangThai = $_POST['trang_thai'] ?? null;
            $noiDung = $_POST['noi_dung'];
            $moTa = $_POST['mo_ta'];
            $ngayTao = date("Y-m-d ");
            $errors = [];
            if (empty($tieuDe)) {
                $errors['tieu_de'] = 'Tiêu đề là bắt buộc';
            }
            if (empty($trangThai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($noiDung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }
            if (empty($moTa)) {
                $errors['mo_ta'] = 'Mô tả là bắt buộc';
            }
            if (empty($hinhAnh)) {
                $errors['hinh_anh'] = 'Ảnh bìa là bắt buộc';
            }

            if (empty($errors)) {
                $this->modelTinTuc->postData($tieuDe, $moTa, $hinhAnh, $ngayTao, $noiDung, $trangThai);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-tin-tuc');
                exit();
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'];
        $tinTuc = $this->modelTinTuc->getDetailData($id);
        require_once('./views/tintuc/edit-tin-tuc.php');
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
            $noiDung = $_POST['noi_dung'];
            $moTa = $_POST['mo_ta'];
            $id = $_POST['id'];
            $errors = [];
            if (empty($tieuDe)) {
                $errors['tieu_de'] = 'Tiêu đề là bắt buộc';
            }
            if (empty($trangThai)) {
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }
            if (empty($noiDung)) {
                $errors['noi_dung'] = 'Nội dung là bắt buộc';
            }
            if (empty($moTa)) {
                $errors['mo_ta'] = 'Mô tả là bắt buộc';
            }
            if (empty($hinhAnh)) {
                $errors['hinh_anh'] = 'Ảnh bìa là bắt buộc';
            }
            if (empty($errors)) {
                $this->modelTinTuc->updateData($id, $tieuDe, $moTa, $hinhAnh, $noiDung, $trangThai);
                unset($_SESSION['errors']);
                header('Location: ?act=tin-tucs');
                exit();
            } else {
                $_SESSION['errors'] = $errors;
                header("Location: ?act=form-sua-tin-tuc&id=$id");
                exit();
            }
        }
    }
    public function destroy()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_POST['tin_tuc_id'];
            $this->modelTinTuc->deleteData($id);
            header('Location: ?act=tin-tucs');
            exit();
        }
    }
}
