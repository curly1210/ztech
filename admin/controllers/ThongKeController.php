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
        // $search = $_GET["ho_ten"] ??  '';
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

        $thongKeList = $this->modelThongKe->getAllThongKe();


        $thongKeMap = [];

        // Tạo một map [ngay_thong_ke => dữ liệu thong_ke] để tra cứu nhanh
        foreach ($thongKeList as $thongKe) {
            $thongKeMap[date('Y-m-d', strtotime($thongKe['ngay_thong_ke']))]  = $thongKe;
        }
        // var_dump($thongKeMap);
        // Lấy danh sách các đơn hàng
        $donHangs = $this->modelThongKe->getAllDonHangs(); // Giả sử đây là danh sách đơn hàng cần duyệt

        foreach ($donHangs as $donHang) {
            $ngayDatHang = date('Y-m-d', strtotime($donHang['ngay_dat_hang'])); // Ngày đặt hàng
            $tongTien = $donHang['thanh_toan']; // Tổng tiền của đơn hàng
            // var_dump($ngayDatHang);
            // die();
            // Kiểm tra nếu ngày đặt hàng đã có trong thong_ke
            if (isset($thongKeMap[$ngayDatHang])) {
                // Ngày đã tồn tại, cập nhật tổng doanh thu và số đơn hàng
                $thongKe = $thongKeMap[$ngayDatHang];
                $tongDoanhThu = $thongKe['tong_doanh_thu'] + $tongTien;
                $soDonHang = $thongKe['so_don_hang'] + 1;


                // Cập nhật vào bảng thong_ke
                $this->modelThongKe->updateThongKe($thongKe['id'], $tongDoanhThu, $soDonHang);
                // die();
            } else {
                // Ngày chưa tồn tại, thêm mới bản ghi
                $soDonHang = 1; // Đơn hàng đầu tiên của ngày đó
                $tongDoanhThu = $tongTien;

                // Thêm bản ghi mới vào thong_ke
                $this->modelThongKe->insertThongKe($ngayDatHang, $tongDoanhThu, $soDonHang);
            }
        }

        $data = $this->modelThongKe->getAllThongKe();
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        // var_dump($json);
        require_once('./views/thongke/thong-ke.php');
    }
}
