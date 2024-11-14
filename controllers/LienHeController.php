<?php


class LienHeController
{
  public $modelLienHe;

  public function __construct()
  {
    $this->modelLienHe = new LienHe();
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
      $hoTen = $_POST['ho_ten'];
      $email = $_POST['email'];
      $dienThoai = $_POST['so_dien_thoai'];
      $noiDung = $_POST['noi_dung'];

      $errors = [];
      if (empty($hoTen)) {
        $errors['ho_ten'] = "Vui lòng điền họ tên";
      }
      if (empty($email)) {
        $errors['email'] = "Vui lòng điền email";
      }
      if (empty($dienThoai)) {
        $errors['dien_thoai'] = "Vui lòng điền điện thoại";
      }
      if (empty($noiDung)) {
        $errors['noi_dung'] = "Vui lòng điền nội dung";
      }

      // var_dump($errors);
      if (empty($errors)) {
        unset($_SESSION['errors']);
        $this->modelLienHe->create($hoTen, $email, $dienThoai, $noiDung);
        echo '<script>';
        echo 'alert("Gửi thành công");';
        echo '</script>';
      } else {
        $_SESSION['errors'] = $errors;
      }
    }
    require_once './views/trangchu/lien-he.php';
  }
}
