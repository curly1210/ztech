<?php

class ThongKeController
{
  public $modelThongKe;

  public function __construct()
  {
    $this->modelThongKe = new ThongKe();
  }

  public function index()
  {
    $doanhThu = $this->modelThongKe->getDoanhThu();

    require_once('./views/thongke/list-thong-ke.php');
  }
}
