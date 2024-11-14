<?php
class DonHangController
{
  public $modelDonHang;
  public function __construct()
  {
    $this->modelDonHang = new DonHang();
  }

  public function index()
  {

    $search = $_GET['search'] ?? '';
    $donhangs = $this->modelDonHang->getAll($search);
    $trangThaiDonHangs = $this->modelDonHang->getAllStatusOrder();
    $json_trangThaiDonHangs = json_encode($trangThaiDonHangs);
    require_once('./views/donhang/list-don-hang.php');
  }

  public function changeStatusOrder()
  {
    if (isset($_POST['order_id']) && isset($_POST['status'])) {
      $ma_don_hang = $_POST['order_id'];
      $id_trang_thai_don_hang = $_POST['status'];

      // $trangThaiDonHangs = $this->modelDonHang->getAllStatusOrder();
      // $idsStatus = [];
      // foreach ($trangThaiDonHangs as $trangThaiDonHang) {
      //   $idsStatus[] = $trangThaiDonHang->id;
      // }

      // var_dump($idsStatus);
      $this->modelDonHang->changeStatusOrder($ma_don_hang, $id_trang_thai_don_hang);
      echo "Cập nhật trạng thái đơn hàng thành công!";
    }
  }
  public function showDetail()
  {
    $id = $_GET['id'];

    $donHang = $this->modelDonHang->getDetail($id);

    $sanPhamDonHang  = $this->modelDonHang->getListProducts($id);
    // print_r($sanPhamDonHang);
    $tongTien = 0;
    foreach ($sanPhamDonHang as $sanPham) {
      $total = $sanPham['so_luong'] * $sanPham['gia_ban'];
      $tongTien += $total;
      $this->modelDonHang->updateTotal($sanPham['id_chi_tiet_don_hang'], $total);
    }
    $thanhToan = $tongTien + $donHang['tien_ship'] - $donHang['giam_gia'];
    $this->modelDonHang->updateThanhToan($id, $tongTien, $thanhToan);
    $donHang = $this->modelDonHang->getDetail($id);

    $sanPhamDonHang  = $this->modelDonHang->getListProducts($id);
    // die();
    require_once './views/donhang/detail-don-hang.php';
  }

  public function changeStatusPayment()
  {
    if (isset($_POST['order_id']) && isset($_POST['payment_status'])) {
      $ma_don_hang = $_POST['order_id'];
      $trang_thai_thanh_toan = $_POST['payment_status'];

      $this->modelDonHang->changeStatusPayment($ma_don_hang, $trang_thai_thanh_toan);
      echo "Cập nhật trạng thái thanh toán thành công";
    }
  }
}
