<?php

class NguoiDungController
{
  public $modelNguoiDung;

  public function __construct()
  {
    $this->modelNguoiDung = new NguoiDung();
  }

  public function index()
  {


    $search = $_GET["ho_ten"] ??  '';
    $nguoiDungs = $this->modelNguoiDung->getAll($search);

    require_once('./views/nguoidung/list-nguoi-dung.php');
  }

  public function detail()
  {
    $id = $_GET["id"];
    $nguoiDung = $this->modelNguoiDung->getOneById($id);
    require_once('./views/nguoidung/chi-tiet-nguoi-dung.php');
  }

  public function changeStatus()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $this->modelNguoiDung->changeStatus($id);
      echo $this->modelNguoiDung->getOneById($id)['trang_thai'];
    }
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $hoTen = $_POST['ho_ten'];
      $email = $_POST['email'];
      $matKhau = $_POST['mat_khau'];
      $reMatKhau = $_POST['re_mat_khau'];
      $dienThoai = $_POST['dien_thoai'];
      $diaChi = $_POST['dia_chi'];
      $gioiTinh = $_POST['gioi_tinh'] ?? null;
      $namSinh = $_POST['nam_sinh'];

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

      if (empty($diaChi)) {
        $errors['dia_chi'] = 'Vui lòng nhập địa chỉ';
      }

      if (empty($gioiTinh)) {
        $errors['gioi_tinh'] = 'Vui lòng chọn giới tính';
      }

      if (empty($namSinh)) {
        $errors['nam_sinh'] = 'Vui lòng chọn sinh nhật';
      }

      if (empty($errors)) {
        $matKhau = md5($matKhau);
        $this->modelNguoiDung->create($hoTen, $email, $matKhau, $dienThoai, $gioiTinh, $namSinh);
        $errors['check'] = 0;
        echo json_encode($errors);
      } else {
        $errors['check'] = 1;
        echo json_encode($errors);
        // var_dump($errors);
      }
    }
  }

  public function destroy()
  {
    $delete_id = $_POST["list_id"];
    $delete_id = implode(",", $delete_id);

    $this->modelNguoiDung->delete($delete_id);
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header("Location: ?act=/");
  }
}
