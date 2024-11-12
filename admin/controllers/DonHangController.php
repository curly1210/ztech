<?php
class DonHangController
{
  public $modelDonHang;
  public function __construct()
  {
    $this->modelDonHang = new DonHang();
  }
}
