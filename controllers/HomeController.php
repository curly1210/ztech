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
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : "";
        $danhMucs = $this->modalHome->getAllDanhMuc();
        $noiDungs = $this->modalHome->getAdressShop();
        $slides = $this->modalHome->getSlider();

        $sanPhams = $this->modalHome->getAllProducts($user);
        $sanPhamMois = $this->modalHome->getNewProducts();
        $sanPhamUaThichs = $this->modalHome->getFavouriteProducts();
        $tinTucs = $this->modalHome->getNewTinTuc();
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

        $user = isset($_SESSION['user']) ? $_SESSION['user'] : '';

        // echo $search;
        $products = $this->modalHome->getPaginationListProductFilter($category, $search, $min, $max, $calc_page, $num_results_on_page, $arrange, $user);

        // echo count($products);
        // print_r($products);
        require_once './views/trangchu/list-san-pham.php';
    }

    public function detailProduct()
    {
        $idSanPham = $_GET['id'];
        $danhMucs = $this->modalHome->getAllDanhMuc();
        $noiDungs = $this->modalHome->getAdressShop();

        $checkLike = false;
        if (isset($_SESSION['user'])) {
            $checkLike = $this->modalHome->checkLikeProduct($_SESSION['user']['id'], $idSanPham);
        }



        $sanPham = $this->modalHome->getProductById($idSanPham);
        $idDanhMuc = $sanPham['danh_muc_id'];

        $tenDanhMuc =  '';
        foreach ($danhMucs as $row) {
            if ($row['id'] == $idDanhMuc) {
                $tenDanhMuc = $row['ten'];
                break;
            }
        }

        // echo $danhMuc;

        $hinhAnhs = $this->modalHome->getImagesByProduct($idSanPham);
        $binhLuans = $this->modalHome->getCommentByProduct($idSanPham);
        $danhGias = $this->modalHome->getReviewByProduct($idSanPham);
        $listSanPham = $this->modalHome->getProductByCategory($idDanhMuc);

        // var_dump($listSanPham);
        require_once './views/trangchu/chi-tiet-san-pham.php';
    }
}
