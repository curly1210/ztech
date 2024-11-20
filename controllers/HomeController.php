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
        // print_r($sanPhams);
        // die();
        require_once './views/trangchu/trang-chu.php';
    }

    public function contactPage()
    {
        $danhMucs = $this->modalHome->getAllDanhMuc();
        $noiDungs = $this->modalHome->getAdressShop();

        require_once './views/trangchu/lien-he.php';
    }

    public function listProduct()
    {
        $danhMucs = $this->modalHome->getAllDanhMuc();
        $noiDungs = $this->modalHome->getAdressShop();

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $min = isset($_GET['min']) ? $_GET['min'] : 0;
        $max = isset($_GET['max']) ? $_GET['max'] : 0;
        $arrange = isset($_GET['arrange']) ? $_GET['arrange'] : 0;

        $page = isset($_GET["page"]) ? $_GET["page"] : 1;
        $num_results_on_page = 15;
        $calc_page = ($page - 1) * $num_results_on_page;
        $totalProduct = count($this->modalHome->getAllListProductFilter($category, $search, $min, $max));
        // print_r($totalProduct);

        // echo $search;
        $products = $this->modalHome->getPaginationListProductFilter($category, $search, $min, $max, $calc_page, $num_results_on_page, $arrange);


        // echo count($products);
        // print_r($products);
        require_once './views/trangchu/list-san-pham.php';
    }
}
