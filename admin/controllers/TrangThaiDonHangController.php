<?php


class TrangThaiDonHangController
{
  public $modelTrangThaiDonHang;

  public function __construct()
  {
    $this->modelTrangThaiDonHang = new TrangThaiDonHang();
  }

  public function index()
  {
    $search = $_POST["ten"] ??  '';
    $trangThaiDonHangs = $this->modelTrangThaiDonHang->getAll($search);


    require_once('./views/trangthaidonhang/list-trang-thai-don-hang.php');
  }

  public function formEdit()
  {
    $id = $_GET['id'];
    $trangThaiDonHang = $this->modelTrangThaiDonHang->getOne($id);

    require_once('./views/trangthaidonhang/edit-trang-thai-don-hang.php');
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = $_POST['id'];
      $ten = $_POST['ten'];

      $errors = [];

      if (empty($ten)) {
        $errors['ten'] = "Vui lòng nhập tên trạng thái";
      }

      if (empty($errors)) {
        $this->modelTrangThaiDonHang->update($id, $ten);
        unset($_SESSION['errors']);
        header('Location: ?act=trang-thai-don-hangs');
        exit();
      } else {
        $_SESSION['errors'] = $errors;
        header("Location: ?act=form-sua-trang-thai-don-hang&id=$id");
        exit();
      }
    }
  }

  public function formCreate()
  {
    require_once('./views/trangthaidonhang/create-trang-thai-don-hang.php');
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $ten = $_POST['ten'];

      $errors = [];

      if (empty($ten)) {
        $errors['ten'] = "Vui lòng nhập tên trạng thái";
      }

      if (empty($errors)) {
        $this->modelTrangThaiDonHang->create($ten);
        unset($_SESSION['errors']);
        header('Location: ?act=trang-thai-don-hangs');
        exit();
      } else {
        $_SESSION['errors'] = $errors;
        header("Location: ?act=form-them-trang-thai-don-hang");
        exit();
      }
    }
  }

  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = $_POST['id'];
      $this->modelTrangThaiDonHang->deleteData($id);
      header('Location: ?act=trang-thai-don-hangs');
      exit();
    }
  }
}
