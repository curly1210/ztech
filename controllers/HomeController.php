<?php

class HomeController
{
    public $modalHome;
    public function __construct()
    {
        $this->modalHome = new Home();
    }
    public function index()
    {
        $danhMucs = $this->modalHome->getAllDanhMuc();
        $slides = $this->modalHome->getSlider();
        $sanPhams = $this->modalHome->getAllProducts();
        $sanPhamMois = $this->modalHome->getNewProducts();
        $sanPhamUaThichs = $this->modalHome->getFavouriteProducts();
        $tinTucs = $this->modalHome->getNewTinTuc();
        $noiDungs = $this->modalHome->getAdressShop();
        $countBuyProducts = $this->modalHome->getCountBuyProduct();
        // print_r($countBuyProducts);
        // die();
        require_once './views/trangchu/trang-chu.php';
    }

    public function contactPage()
    {
        $danhMucs = $this->modalHome->getAllDanhMuc();
        $noiDungs = $this->modalHome->getAdressShop();



        require_once './views/trangchu/lien-he.php';
    }
}
