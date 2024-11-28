<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class NguoiDungController
{



  public $modelNguoiDung;
  public $modelMail;
  public function __construct()
  {
    $this->modelNguoiDung = new NguoiDung();
    // $this->modelMail = new PHPMailer();
  }

  public function formLogin()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
    $noiDungs = $this->modelNguoiDung->getAdressShop();

    require_once './views/nguoidung/dang-nhap.php';
  }

  public function login()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $email = $_POST['email'];
      $matKhau = $_POST['mat_khau'];
    }

    $errors = [];


    if (empty($email)) {
      $errors['email'] = "Vui lòng nhập email";
    }

    if (empty($matKhau)) {
      $errors['matKhau'] = "Vui lòng nhập mật khẩu";
    }

    if (!empty($email) && !empty($matKhau)) {
      $nguoiDung = $this->modelNguoiDung->checkLogin($email, $matKhau);
      if (count($nguoiDung) == 0) {
        $errors['matKhau'] = "Sai email hoặc mật khẩu";
      } else {
        if ($nguoiDung[0]['trang_thai'] == 1) {
          $errors['matKhau'] = "Tài khoản đã bị chặn";
        }
      }
    }

    if (empty($errors)) {
      $nguoiDung = $this->modelNguoiDung->checkLogin($email, $matKhau);
      $_SESSION['user'] = $nguoiDung[0];
      $_SESSION['count_cart'] =  count($this->modelNguoiDung->getAllCart($_SESSION['user']['id']));
      // $_SESSION['count_cart'] =  3;
      $_SESSION["message"] = "Đăng nhập thành công.";

      if ($nguoiDung[0]['admin'] == 0) {
        header("Location: ?act=/");
      } else {
        $_SESSION['admin'] = true;
        header("Location: admin/");
      }

      unset($_SESSION['errors']);
      exit();
    } else {
      $_SESSION['errors'] = $errors;
      header("Location: ?act=form-dang-nhap");
      exit();
    }
  }

  public function formSignUp()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
    $noiDungs = $this->modelNguoiDung->getAdressShop();

    require_once './views/nguoidung/dang-ky.php';
  }

  public function signUp()
  {
    if (isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $hoTen = $_POST['ho_ten'];
      $email = $_POST['email'];
      $matKhau = $_POST['mat_khau'];
      $reMatKhau = $_POST['re_mat_khau'];
      $dienThoai = $_POST['dien_thoai'];
      $gioiTinh = $_POST['gioi_tinh'] ?? null;
      $namSinh = $_POST['nam_sinh'];
      $diaChi = $_POST['dia_chi'];

      $errors = [];
      if (empty($hoTen)) {
        $errors['ho_ten'] = 'Vui lòng nhập họ tên';
      }

      if (empty($email)) {
        $errors['email'] = 'Vui lòng nhập địa chỉ email';
      } else {
        if (count($this->modelNguoiDung->checkUniqueEmail($email)) > 0) {
          $errors['email'] = 'Địa chỉ email đã tồn tại';
        }
      }

      if (empty($matKhau) || empty($reMatKhau)) {
        if (empty($matKhau)) {
          $errors['mat_khau'] = "Vui lòng nhập mật khẩu";
        }

        if (empty($reMatKhau)) {
          $errors['re_mat_khau'] = "Vui lòng xác nhận lại mật khẩu";
        }
      } else {
        if ($matKhau !== $reMatKhau) {
          $errors['re_mat_khau'] = "Mật khẩu không trùng nhau";
        }
      }


      if (empty($dienThoai)) {
        $errors['dien_thoai'] = 'Vui lòng nhập số điện thoại';
      }

      if (empty($gioiTinh)) {
        $errors['gioi_tinh'] = 'Vui lòng chọn giới tính';
      }

      if (empty($namSinh)) {
        $errors['nam_sinh'] = 'Vui lòng chọn sinh nhật';
      }

      if (empty($diaChi)) {
        $errors['dia_chi'] = 'Vui lòng nhập địa chỉ';
      }

      if (empty($errors)) {
        // $matKhau = md5($matKhau);
        $this->modelNguoiDung->create($hoTen, $email, $matKhau, $dienThoai, $gioiTinh, $namSinh, $diaChi);
        $errors['check'] = 0;
        echo json_encode($errors);
      } else {
        $errors['check'] = 1;
        echo json_encode($errors);
        // var_dump($errors);
      }
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header("Location: ?act=/");
    exit();
  }

  public function listLike()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
    $noiDungs = $this->modelNguoiDung->getAdressShop();
    $listLikeProduct = $this->modelNguoiDung->getListLikeProduct($_SESSION['user']['id']);
    require_once './views/nguoidung/yeu-thich.php';
  }

  public function sendContact()
  {
    if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
      $hoTen = $_POST['ten'];
      $email = $_POST['email'];
      $dienThoai = $_POST['dienThoai'];
      $noiDung = $_POST['noiDung'];

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

      if (empty($errors)) {
        // $matKhau = md5($matKhau);
        $this->modelNguoiDung->sendContact($hoTen, $email, $dienThoai, $noiDung);
        $errors['check'] = 0;
        echo json_encode($errors);
      } else {
        $errors['check'] = 1;
        echo json_encode($errors);
        // var_dump($errors);
      }

      // var_dump($errors);
      // if (empty($errors)) {
      //   unset($_SESSION['errors']);
      //   $this->modelLienHe->create($hoTen, $email, $dienThoai, $noiDung);
      //   echo '<script>';
      //   echo 'alert("Gửi thành công");';
      //   echo '</script>';
      // } else {
      //   $_SESSION['errors'] = $errors;
      // }
    }
  }

  public function sendComment()
  {
    if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
      $binhLuan = $_POST['binh_luan'];
      $idNguoiDung = $_POST['id_nguoi_dung'];
      $idSanPham = $_POST['id_san_pham'];

      $errors = [];
      if (empty($binhLuan)) {
        $errors['binh_luan'] = "Vui lòng điền bình luận";
      }

      if (empty($errors)) {

        $this->modelNguoiDung->sendComment($binhLuan, $idNguoiDung, $idSanPham);
      }
      // echo "<script>
      // alert('Thông báo trước khi chuyển trang');
      // window.location.href = '?act=chi-tiet-san-pham&id=$idSanPham';  // Chuyển trang sau khi alert
      //  </script>";

      $_SESSION["message"] = "Bình luận thành công!";
      header("Location: ?act=chi-tiet-san-pham&id=$idSanPham");
      exit();
    }
  }
  public function viewAccount()
  {
    if (isset($_POST['id'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['id'] = $_POST['id'];
        $nguoiDung = $this->modelNguoiDung->getProfile($_SESSION['id']);
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $noiDungs = $this->modelNguoiDung->getAdressShop();

        require_once './views/nguoidung/tai-khoan.php';
        exit();
      } else {

        $nguoiDung = $this->modelNguoiDung->getProfile($_SESSION['id']);
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once './views/nguoidung/tai-khoan.php';
        exit();
      }
    } else {
      header("location: ?act=/");
    }
  }
  public function editAccount()
  {
    if ($_POST['id']) {
      if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
        $_SESSION['id'] = $_POST['id'];
        $nguoiDung = $this->modelNguoiDung->getProfile($_SESSION['id']);
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once './views/nguoidung/edit-tai-khoan.php';
        exit();
      } else {
        $nguoiDung = $this->modelNguoiDung->getProfile($_SESSION['id']);
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once './views/nguoidung/edit-tai-khoan.php';
        exit();
      }
    } else {
      header("location: ?act=/");
    }
  }
  public function updateAccount()
  {
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
      $hoTen = $_POST['ho_ten'];
      $email = $_POST['email'];
      $diaChi = $_POST['dia_chi'];
      $dienThoai = $_POST['so_dien_thoai'];
      $gioiTinh = $_POST['gioi_tinh'];
      $ngaySinh = $_POST['ngay_sinh'] == ""  ? $_POST['ngay_sinh_not_update'] : $_POST['ngay_sinh'];
      $nguoiDungs = $this->modelNguoiDung->getAllUsers();
      $profile = $this->modelNguoiDung->getProfile($id);

      $error = [];
      if (empty($hoTen)) {
        $error['ho_ten'] = "Họ tên không được để trống";
      }
      if (empty($email)) {
        $error['email'] = "Email không được để trống";
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Email không đúng định dạng";
      } else {
        foreach ($nguoiDungs as $nguoiDung) {
          if ($nguoiDung['email'] == $email && $nguoiDung['email'] != $profile['email']) {
            $error['email'] = "Email đã tồn tại";
          }
        }
      }
      if (empty($diaChi)) {
        $error['dia_chi'] = "Địa chỉ không được để trống";
      }
      if (empty($dienThoai)) {
        $error['dien_thoai'] = "Số điện thoại không được để trống";
      } else if (strlen($dienThoai) > 10) {
        $error['dien_thoai'] = "Số điện thoại chỉ gồm 10 số";
      } else {
        foreach ($nguoiDungs as $nguoiDung) {
          if ($nguoiDung['dien_thoai'] == $dienThoai && $nguoiDung['dien_thoai'] != $profile['dien_thoai']) {
            $error['dien_thoai'] = "Số điện thoại đã tồn tại";
          }
        }
      }

      if (empty($error)) {
        $this->modelNguoiDung->updateProfile($id, $hoTen, $email, $diaChi, $dienThoai, $gioiTinh, $ngaySinh);
        $_SESSION['id'] = $id;

        unset($_SESSION['error']);
        header("Location: ?act=tai-khoan");
        exit();
      } else {
        $_SESSION['error'] = $error;
        $_SESSION['id'] = $id;
        header("Location: ?act=cap-nhat-tai-khoan");
        exit();
      }
    } else {
      header("location: ?act=/");
    }
  }
  public function getFormChangePassword()
  {
    if (isset($_POST['id'])) {
      if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
        $_SESSION['id']  = $_POST['id'];
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once('./views/nguoidung/doi-mat-khau.php');
        exit();
      } else {
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once('./views/nguoidung/doi-mat-khau.php');
        exit();
      }
    } else {
      header("Location: ?act=/");
    }
  }
  public function updatePassword()
  {
    if (isset($_POST['id'])) {
      $id = $_POST['id'];
      $nguoiDungs = $this->modelNguoiDung->getAllUsers();
      $profile = $this->modelNguoiDung->getProfile($id);

      $matKhauHienTai = $_POST['mat_khau_hien_tai'];
      $matKhauMoi = $_POST['mat_khau_moi'];
      $matKhauXacNhan = $_POST['mat_khau_xac_nhan'];

      $error = [];
      if (empty($matKhauHienTai)) {
        $error['mat_khau_hien_tai'] = "Chưa nhập mật khẩu hiện tại";
      } else if ($matKhauHienTai != $profile['mat_khau']) {
        $error['mat_khau_hien_tai'] = "Nhập sai mật khẩu";
      }
      if (empty($matKhauXacNhan)) {
        $error['mat_khau_xac_nhan'] = "Chưa nhập mật khẩu xác nhận";
      } else if ($matKhauHienTai != $matKhauXacNhan) {
        $error['mat_khau_xac_nhan'] = "Mật khẩu xác nhận không trùng khớp";
      }
      if (empty($matKhauMoi)) {
        $error['mat_khau_moi'] = "Chưa nhập mật khẩu mới";
      } else {
        foreach ($nguoiDungs as $nguoiDung) {
          if ($matKhauMoi == $nguoiDung['mat_khau']) {
            $error['mat_khau_moi'] = "Mật khẩu mới đã tồn tại";
          }
        }
      }
      if (empty($error)) {
        $this->modelNguoiDung->updatePassword($id, $matKhauMoi);
        $_SESSION['id'] = $id;

        unset($_SESSION['error']);
        header("Location: ?act=dang-xuat");
        exit();
      } else {
        $_SESSION['error'] = $error;
        $_SESSION['id'] = $id;
        header("Location: ?act=doi-mat-khau");
        exit();
      }
    } else {
      header('location: ?act=/');
    }
  }

  public function addToCart()
  {
    if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
      $json = [];


      if (isset($_SESSION['user'])) {
        $json['check_login'] = true;
        $user = $_SESSION['user'];
        $idProduct = $_POST['id'];
        $so_luong = $_POST['quantity'] ?? 1;
        $sanPham = $this->modelNguoiDung->getProductById($idProduct);
        $sanPhamTrongGioHang =  $this->modelNguoiDung->checkProductInCart($user['id'], $idProduct);

        $so_luong_trong_gio = $sanPhamTrongGioHang ? $sanPhamTrongGioHang['so_luong'] : 0;
        // $json['message'] = $idProduct;

        if ($so_luong + $so_luong_trong_gio - $sanPham['hang_ton_kho'] <= 0) {
          if ($sanPhamTrongGioHang) {
            $this->modelNguoiDung->updateQuantityInCart($user['id'], $idProduct, $so_luong + $so_luong_trong_gio);
          } else {
            $this->modelNguoiDung->insertQuantityInCart($user['id'], $idProduct, $so_luong);
            $_SESSION['count_cart']++;
          }
          $json['message'] = "Thêm vào giỏ hàng thành công!";
        } else {
          if (!$sanPhamTrongGioHang && $sanPham['hang_ton_kho'] == 0) {
            $json['message'] = "Sản phẩm đã hết hàng!";
          } else if ($sanPhamTrongGioHang) {
            $json['message'] = "Sản phẩm đã có trong giỏ hàng.\nSố lượng đặt vượt quá hàng trong kho.";
          } else {
            $json['message'] = "Số lượng đặt vượt quá hàng trong kho.";
          }
        }

        echo json_encode($json);
      } else {
        $json['check_login'] = false;
        echo json_encode($json);
      }
    }
  }

  public function checkQuantity()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $user = $_SESSION['user'];
    $idProduct = $_POST['idProduct'];
    $so_luong = $_POST['quantity'];

    $sanPham = $this->modelNguoiDung->getProductById($idProduct);

    if ($so_luong <= $sanPham['hang_ton_kho']) {
      $this->modelNguoiDung->updateQuantityInCart($user['id'], $idProduct, $so_luong);
      echo true;
    } else {
      echo false;
    }
  }


  public function listCart()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }
    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
    $noiDungs = $this->modelNguoiDung->getAdressShop();
    $nguoiDung = $_SESSION['user'];

    $gioHangs = $this->modelNguoiDung->getAllCart($nguoiDung['id']);

    $tongTien = 0;

    if (count($gioHangs) != 0) {
      foreach ($gioHangs as $product) {
        $tongTien += ($product['gia'] * $product['so_luong']);
      }
    }
    // var_dump($tongTien);

    // var_dump($gioHangs);

    require_once './views/nguoidung/gio-hang.php';
  }

  public function deleteCart()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $idSanPham =  $_GET['id'];
    $this->modelNguoiDung->deleteCart($idSanPham, $_SESSION['user']['id']);
    $_SESSION['count_cart']--;
    header("Location: ?act=gio-hangs");
  }

  public function formCheckOut()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
    $noiDungs = $this->modelNguoiDung->getAdressShop();
    $nguoiDung = $_SESSION['user'];

    $gioHangs = $this->modelNguoiDung->getAllCart($nguoiDung['id']);

    $tongTien = 0;

    if (count($gioHangs) != 0) {
      foreach ($gioHangs as $product) {
        $tongTien += ($product['gia'] * $product['so_luong']);
      }
    }

    require_once './views/nguoidung/thanh-toan.php';
  }

  public function checkCoupon()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $idKhuyenMai = $_POST['id'];
    // echo $idKhuyenMai;
    $json = [];
    if (empty($idKhuyenMai)) {
      $json['check'] = 0;
      $json['message'] = "Vui lòng nhập mã khuyến mãi";
    } else {
      $checkCoupon = $this->modelNguoiDung->getCoupon($idKhuyenMai);
      if (!$checkCoupon) {
        $json['check'] = 1;
        $json['message'] = "Mã khuyến mãi không hợp lệ";
      } else {
        $json['check'] = 2;
        $json['message'] = "Áp dụng mã thành công";
        $json['gia'] = $checkCoupon['gia'];
      }
    }

    echo json_encode($json);
  }

  public function checkOut()
  {

    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    if ($_SERVER["REQUEST_METHOD"] ==  'POST') {
      $errors = [];

      $ho_ten = $_POST['ho_ten'];
      $email = $_POST['email'];
      $so_dien_thoai = $_POST['so_dien_thoai'];
      $dia_chi = $_POST['dia_chi'];
      $ghi_chu = $_POST['ghi_chu'] ?? '';
      $ma_khuyen_mai = $_POST['ma_khuyen_mai'] ?? '';
      $phuong_thuc = $_POST['phuong_thuc'] ?? '';

      // echo $phuong_thuc;
      if (empty($ho_ten)) {
        $errors['ho_ten'] = "Vui lòng nhập họ tên";
      }
      if (empty($email)) {
        $errors['email'] = "Vui lòng nhập email";
      }
      if (empty($so_dien_thoai)) {
        $errors['so_dien_thoai'] = "Vui lòng nhập số điện thoại";
      }
      if (empty($dia_chi)) {
        $errors['dia_chi'] = "Vui lòng nhập địa chỉ";
      }
      if (empty($phuong_thuc)) {
        $errors['phuong_thuc'] = "Vui lòng chọn phương thức";
      }

      if (empty($errors)) {
        $errors['check'] = 0;

        // Check mã khuyến mãi
        if (!empty($ma_khuyen_mai)) {
          $ma_khuyen_mai = $this->modelNguoiDung->getCoupon($ma_khuyen_mai);
          if ($ma_khuyen_mai) {
            $this->modelNguoiDung->updateCoupon($ma_khuyen_mai['id'], $ma_khuyen_mai['so_luong'] - 1);
            $ma_khuyen_mai = $ma_khuyen_mai ? $ma_khuyen_mai['id'] : '';
          }
        }

        // Giỏ hàng
        $gioHangs = $this->modelNguoiDung->getAllCart($_SESSION['user']['id']);

        // Kiểm tra số lượng mua có hợp lệ không
        foreach ($gioHangs as $product) {
          $checkSanPham = $this->modelNguoiDung->getProductById($product['id_san_pham']);
          if ($product['so_luong'] > $checkSanPham['hang_ton_kho']) {
            $errors['check_quantity'] = 1;
            echo json_encode($errors);
            exit();
          }
        }

        // Update hàng tồn kho của sản phẩm
        foreach ($gioHangs as $product) {
          $sanPham = $this->modelNguoiDung->getProductById($product['id_san_pham']);
          $so_luong_moi = $sanPham['hang_ton_kho'] - $product['so_luong'];
          $this->modelNguoiDung->updateQuantityProduct($product['id_san_pham'], $so_luong_moi);
        }

        // Tạo địa chỉ nhận hàng
        $this->modelNguoiDung->createAddressDelivery($ho_ten, $so_dien_thoai, $email, $dia_chi);
        $idDiaChiNhanHang = $this->modelNguoiDung->getLastIdCreate();

        // Tạo đơn hàng
        $prefix = "ORD"; // Tiền tố
        $timestamp = date("His"); // Lấy thời gian hiện tại (Giờ, Phút, Giây)
        $randomString = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 2)); // Tạo 2 ký tự ngẫu nhiên
        $idDonHang = $prefix . $timestamp . $randomString;

        $this->modelNguoiDung->createOrder($idDonHang, $_SESSION['user']['id'], $idDiaChiNhanHang, $phuong_thuc, $ma_khuyen_mai, $ghi_chu);
        // $idDonHang = $this->modelNguoiDung->getLastIdCreate();
        // $errors['test'] = $idDonHang;

        // Tạo chi tiết đơn hàng
        foreach ($gioHangs as $product) {
          $this->modelNguoiDung->createOrderDetail($product['so_luong'], $product['gia'], $product['id_san_pham'], $idDonHang);
        }

        // Xóa giỏ hàng, sau khi đặt hàng thành công
        $this->modelNguoiDung->deleteAllCart($_SESSION['user']['id']);

        $_SESSION['count_cart'] = 0;

        //Gửi mail


        $to = $_SESSION['user']['email'];
        $subject = 'XÁC NHẬN ĐẶT HÀNG THÀNH CÔNG';
        $message = "Bạn đã đặt hàng thành công\nChúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất.";
        // $headers = 'From : 1210.curly@gmail.com';
        $mail = new PHPMailer(true);


        try {
          // $mail->SMTPDebug = 2;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = '1210.curly@gmail.com';                     //SMTP username
          $mail->Password   = 'vkzcosgjfbyoyxvd';                               //SMTP password
          $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
          $mail->Port       = 465;

          $mail->setFrom('1210.curly@gmail.com', 'TechZ');
          $mail->addAddress($to);

          $mail->CharSet = 'UTF-8';


          $mail->isHTML(true);
          $mail->Subject = $subject;
          $mail->Body = $message;
          $mail->send();
          // echo "Mail has been sent successfully!";
        } catch (Exception $e) {
          // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        echo json_encode($errors);
      } else {
        $errors['check'] = 1;
        echo json_encode($errors);
      }
    }
  }

  public function orderSuccess()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
    $noiDungs = $this->modelNguoiDung->getAdressShop();

    require_once './views/nguoidung/dat-hang-thanh-cong.php';
  }
  public function viewMyOrder()
  {
    if (isset($_POST['id']) || isset($_SESSION['id'])) {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['id'] = $_POST['id'];
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $donHangs = $this->modelNguoiDung->getMyOrder($_SESSION['id']);
        // print_r($donHangs);
        // die();
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once('./views/nguoidung/don-hang.php');
        exit();
      } else {
        $danhMucs = $this->modelNguoiDung->getAllDanhMuc();
        $donHangs = $this->modelNguoiDung->getMyOrder($_SESSION['id']);
        $noiDungs = $this->modelNguoiDung->getAdressShop();
        require_once('./views/nguoidung/don-hang.php');
        exit();
      }
    } else {
      header("Location: ?act=/");
    }
  }

  public function viewManageOrder()
  {
    $id = $_GET['id'];
    $donHang = $this->modelNguoiDung->getOrderDetail($id);

    $user = isset($_SESSION['user']) ? $_SESSION['user'] : '';
    $products = $this->modelNguoiDung->getProductsOrder($id, $user);
    // print_r($donHang);
    // die();
    $danhMucs = $this->modelNguoiDung->getAllDanhMuc();

    $noiDungs = $this->modelNguoiDung->getAdressShop();
    require_once('./views/nguoidung/manage-don-hang.php');
  }

  public function cancelOrder()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $id = $_POST['id'];
      $this->modelNguoiDung->changeStatusOrder($id);
      $_SESSION['id'] = $_POST['id_nguoi_dung'];
      header('Location: ?act=don-hang');
      exit();
    }
  }

  public function likeProduct()
  {
    if (isset($_SESSION['user'])) {
      $json = [];
      $idProduct = $_POST['idProduct'];
      $json['check_login'] = true;
      $user = $_SESSION['user'];
      $checkYeuThich = $this->modelNguoiDung->checkLikeProduct($user['id'], $idProduct);

      if ($checkYeuThich) {
        $this->modelNguoiDung->unlikeProduct($user['id'], $idProduct);
        $json['status_like'] = 0;
      } else {
        $this->modelNguoiDung->likeProduct($user['id'], $idProduct);
        $json['status_like'] = 1;
      }
      // $json['message'] = "test";
      echo json_encode($json);
    } else {
      $json['check_login'] = false;
      // $json['message'] = "test";
      echo json_encode($json);
    }
  }

  public function deleteLike()
  {
    if (isset($_SESSION['user'])) {
      $idProduct = $_GET['id'];
      $idUser = $_SESSION['user']['id'];

      $this->modelNguoiDung->unlikeProduct($idUser, $idProduct);
      header('Location: ?act=list-yeu-thich');
    }
  }

  public function deleteAllLike()
  {
    if (isset($_SESSION['user'])) {
      $idUser = $_SESSION['user']['id'];

      $this->modelNguoiDung->deleteListLike($idUser);
      header('Location: ?act=list-yeu-thich');
    }
  }

  public function reviewProduct()
  {
    if (!isset($_SESSION['user'])) {
      header("Location: index.php");
    }

    $idProduct = $_POST['idProduct'];
    $rating = $_POST['rating'];

    $this->modelNguoiDung->reviewProduct($idProduct, $_SESSION['user']['id'], $rating);
  }
}
