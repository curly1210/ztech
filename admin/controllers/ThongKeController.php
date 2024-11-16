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
        $donHang = $this->modelThongKe->getTotalOrder();
        $khachHang = $this->modelThongKe->getTotalCustomer();
        $doanhThu = $this->modelThongKe->getTotalRevenue();
        $donDaGiao = $this->modelThongKe->getOrderStatusDaGiao();
        $donDaHuy = $this->modelThongKe->getOrderStatusDaHuy();
        $donDangCho = $this->modelThongKe->getOrderStatusDangCho();
        $donDangGiao = $this->modelThongKe->getOrderStatusDangGiao();
        $donDaXacNhan = $this->modelThongKe->getOrderStatusDaXacNhan();
        $donThanhCong = $this->modelThongKe->getOrderStatusGiaoThanhCong();
        $donThatBai = $this->modelThongKe->getOrderStatusGiaoThatBai();
        //bieu do thong ke
        $data = $this->modelThongKe->getAllDonHangs();
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        require_once('./views/thongke/thong-ke.php');
    }
}
