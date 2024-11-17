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
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }
    require_once './views/nguoidung/dang-nhap.php';
  }

  public function login()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

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
      $nguoiDung = $this->modelNguoiDung->checkLogin($email, $matKhau);
      if (count($nguoiDung) == 0) {
        $errors['matKhau'] = "Sai email hoặc mật khẩu";
      } else {
        if ($nguoiDung[0]['trang_thai'] == 1) {
          $errors['matKhau'] = "Tài khoản đã bị chặn";
        }
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

  public function formSignUp()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    require_once './views/nguoidung/dang-ky.php';
  }

  public function signUp()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $hoTen = $_POST['ho_ten'];
      $email = $_POST['email'];
      $matKhau = $_POST['mat_khau'];
      $reMatKhau = $_POST['re_mat_khau'];
      $dienThoai = $_POST['dien_thoai'];
      $gioiTinh = $_POST['gioi_tinh'] ?? null;
      $namSinh = $_POST['nam_sinh'];
      $diaChi = $_POST['dia_chi'];

      $errors = [];
      if (empty($hoTen)) {
        $errors['ho_ten'] = 'Vui lòng nhập họ tên';
      }

      if (empty($email)) {
        $errors['email'] = 'Vui lòng nhập địa chỉ email';
      } else {
        if (count($this->modelNguoiDung->checkUniqueEmail($email)) > 0) {
          $errors['email'] = 'Địa chỉ email đã tồn tại';
        }
      }

      if (empty($matKhau) || empty($reMatKhau)) {
        if (empty($matKhau)) {
          $errors['mat_khau'] = "Vui lòng nhập mật khẩu";
        }

        if (empty($reMatKhau)) {
          $errors['re_mat_khau'] = "Vui lòng xác nhận lại mật khẩu";
        }
      } else {
        if ($matKhau !== $reMatKhau) {
          $errors['re_mat_khau'] = "Mật khẩu không trùng nhau";
        }
      }


      if (empty($dienThoai)) {
        $errors['dien_thoai'] = 'Vui lòng nhập số điện thoại';
      }

      if (empty($gioiTinh)) {
        $errors['gioi_tinh'] = 'Vui lòng chọn giới tính';
      }

      if (empty($namSinh)) {
        $errors['nam_sinh'] = 'Vui lòng chọn sinh nhật';
      }

      if (empty($diaChi)) {
        $errors['dia_chi'] = 'Vui lòng nhập địa chỉ';
      }

      if (empty($errors)) {
        // $matKhau = md5($matKhau);
        $this->modelNguoiDung->create($hoTen, $email, $matKhau, $dienThoai, $gioiTinh, $namSinh, $diaChi);
        $errors['check'] = 0;
        echo json_encode($errors);
      } else {
        $errors['check'] = 1;
        echo json_encode($errors);
        // var_dump($errors);
      }
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header("Location: ?act=/");
    exit();
  }
}
