<?php

class TinTucController
{
    public $modelTinTuc;
    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }
    public function index()
    {
        $tinTucs = $this->modelTinTuc->getAllTinTucs();
        $noiDungs = $this->modelTinTuc->getAdressShop();
        $danhMucs = $this->modelTinTuc->getAllDanhMuc();
        // print_r($countBuyProducts);
        // die();
        require_once './views/tintuc/tin-tuc.php';
    }
    public function viewDetail()
    {
        $id = $_GET['id'];
        $noiDungs = $this->modelTinTuc->getAdressShop();
        $danhMucs = $this->modelTinTuc->getAllDanhMuc();
        $tinTuc = $this->modelTinTuc->getTinTucById($id);
        require_once './views/tintuc/detail-tin-tuc.php';
    }
}
