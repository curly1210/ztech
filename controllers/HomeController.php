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


        if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
            $hoTen = $_POST['ho_ten'];
            $email = $_POST['email'];
            $dienThoai = $_POST['so_dien_thoai'];
            $noiDung = $_POST['noi_dung'];
            $noiDungs = $this->modelLienHe->getAdressShop();

            $errors = [];
            if (empty($hoTen)) {
                $errors['ho_ten'] = "Vui lòng điền họ tên";
            }
            if (empty($email)) {
                $errors['email'] = "Vui lòng điền email";
            }
            if (empty($dienThoai)) {
                $errors['dien_thoai'] = "Vui lòng điền điện thoại";
            }
            if (empty($noiDung)) {
                $errors['noi_dung'] = "Vui lòng điền nội dung";
            }

            // var_dump($errors);
            if (empty($errors)) {
                unset($_SESSION['errors']);
                $this->modelLienHe->create($hoTen, $email, $dienThoai, $noiDung);
                echo '<script>';
                echo 'alert("Gửi thành công");';
                echo '</script>';
            } else {
                $_SESSION['errors'] = $errors;
            }
        }
        require_once './views/trangchu/lien-he.php';
    }
}
