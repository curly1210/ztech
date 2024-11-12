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
    $search = $_GET["ho_ten"] ??  '';

    $lienHes = $this->modelLienHe->getAll($search);
    // var_dump($lienHes);
    require_once('./views/lienhe/list_lien_he.php');
  }
  public function updateStatus()
  {
    $id = $_POST['id'];
    $trangThai = $_POST['trang_thai'];
    $this->modelLienHe->update($id, $trangThai);
    header("Location: ?act=lien-hes");
    exit();
  }
  public function detail()
  {
    $id = $_GET['id'];
    $lienHe = $this->modelLienHe->getOneById($id);
    // var_dump($lienHe);
    require_once('./views/lienhe/chi-tiet-lien-he.php');
  }

  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = $_POST['id_lien_he'];
      $lienHe = $this->modelLienHe->getOneById($id);
      if ($lienHe["trang_thai"] == 1) {
        $_SESSION['error'] = "Không thể xóa liên hệ đang xử lý";
        header('Location: ?act=lien-hes');
      } else {
        $this->modelLienHe->deleteData($id);
        unset($_SESSION['error']);
        header('Location: ?act=lien-hes');
        exit();
      }
    }
  }
}
