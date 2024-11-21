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
        $noiDungs = $this->modelMaKhuyenMai->getAdressShop();
        $danhMucs = $this->modelMaKhuyenMai->getAllDanhMuc();
        require_once './views/makhuyenmai/ma-khuyen-mai.php';
    }
}
