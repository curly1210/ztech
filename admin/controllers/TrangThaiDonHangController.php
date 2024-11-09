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
    $id = $_POST['id'];
    $trangThaiDonHang = $this->modelTrangThaiDonHang->getOne($id);

    require_once('./views/trangthaidonhang/edit-trang-thai-don-hang.php');
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
