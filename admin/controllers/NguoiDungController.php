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


    $search = $_POST["ho_ten"] ??  '';
    $nguoiDungs = $this->modelNguoiDung->getAll($search);

    require_once('./views/nguoidung/list-nguoi-dung.php');
  }

  public function destroy()
  {
    $delete_id = $_POST["list_id"];
    $delete_id = implode(",", $delete_id);

    $this->modelNguoiDung->delete($delete_id);
  }
}
