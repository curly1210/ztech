<?php
class NguoiDungController
{
  public $modelNguoiDung;
  public function __construct()
  {
    $this->modelNguoiDung = new NguoiDung();
  }

  public function formLogin()
  {
    require_once './views/nguoidung/login.php';
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $email = $_POST['email'];
      $matKhau = $_POST['mat_khau'];
    }

    $errors = [];


    if (empty($email)) {
      $errors['email'] = "Vui lòng nhập email";
    }

    if (empty($matKhau)) {
      $errors['matKhau'] = "Vui lòng nhập mật khẩu";
    }

    if (!empty($email) && !empty($matKhau)) {
      if (count($this->modelNguoiDung->checkLogin($email, $matKhau)) == 0) {
        $errors['matKhau'] = "Sai email hoặc mật khẩu";
      }
    }

    if (empty($errors)) {
      $nguoiDung = $this->modelNguoiDung->checkLogin($email, $matKhau);
      $_SESSION['user'] = $nguoiDung[0];

      if ($nguoiDung[0]['admin'] == 0) {
        header("Location: ?act=/");
      } else {
        $_SESSION['admin'] = true;
        header("Location: admin/");
      }

      unset($_SESSION['errors']);
      exit();
    } else {
      $_SESSION['errors'] = $errors;
      header("Location: ?act=form-dang-nhap");
      exit();
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header("Location: ?act=form-dang-nhap");
    exit();
  }
}
