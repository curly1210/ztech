<?php
class MaKhuyenMaiController
{
    public $modelMaKhuyenMai;
    public function __construct()
    {
        $this->modelMaKhuyenMai = new MaKhuyenMai();
    }
    public function index()
    {
        $maKhuyenMais = $this->modelMaKhuyenMai->getAllMaKhuyenMai();
        $currentTime = date("Y-m-d");

        foreach ($maKhuyenMais as $maKhuyenMai) {
            $ngayBatDau = $maKhuyenMai['ngay_bat_dau'];
            $ngayKetThuc = $maKhuyenMai['ngay_ket_thuc'];

            if (date("Y-m-d", strtotime($currentTime)) > date("Y-m-d", strtotime($ngayKetThuc))) {

                $this->modelMaKhuyenMai->updateStatus($maKhuyenMai['id'], 1);
            } else if (date("Y-m-d", strtotime($currentTime)) < date("Y-m-d", strtotime($ngayBatDau))) {

                $this->modelMaKhuyenMai->updateStatus($maKhuyenMai['id'], 2);
            } else if (date("Y-m-d", strtotime($currentTime)) >= date("Y-m-d", strtotime($ngayBatDau)) && date("Y-m-d", strtotime($currentTime)) <= date("Y-m-d", strtotime($ngayKetThuc))) {

                $this->modelMaKhuyenMai->updateStatus($maKhuyenMai['id'], 3);
            }
        }

        $maKhuyenMais = $this->modelMaKhuyenMai->getMaKhuyenMaiCurrent();
        $noiDungs = $this->modelMaKhuyenMai->getAdressShop();
        $danhMucs = $this->modelMaKhuyenMai->getAllDanhMuc();
        require_once './views/makhuyenmai/ma-khuyen-mai.php';
    }
}
