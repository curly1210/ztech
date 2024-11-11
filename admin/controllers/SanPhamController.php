<?php

class SanPhamController
{
  public $modelSanPham;
  public $modelDanhMuc;

  public function __construct()
  {
    $this->modelSanPham = new SanPham();
    $this->modelDanhMuc = new DanhMuc();
  }

  public function index()
  {

    $search = $_GET["ten"] ??  '';
    $sanPhams = $this->modelSanPham->getAll($search);

    require_once('./views/sanpham/list-san-pham.php');
  }

  public function detail()
  {
    $id = $_GET['id'];
    $sanPham = $this->modelSanPham->getOneById($id);
    $danhMuc = $this->modelSanPham->getOneCategory($sanPham['danh_muc_id']);
    $hinh_anhs = $this->modelSanPham->getImageById($sanPham['id']);
    $binh_luans = $this->modelSanPham->getCommentByid($id);
    $danhGias = $this->modelSanPham->getReviewByid($id);

    require_once('./views/sanpham/chi-tiet-san-pham.php');
  }

  public function formCreate()
  {
    $danhMucs = $this->modelDanhMuc->getAll();
    require_once('./views/sanpham/create-san-pham.php');
  }

  public function create()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $ten = $_POST['ten'];
      $moTa = $_POST['mo_ta'];
      $moTaChiTiet = $_POST['mo_ta_chi_tiet'];
      $danhMuc = $_POST['danh_muc'] ?? '';
      $giaNhap = $_POST['gia_nhap'];
      $giaBan = $_POST['gia_ban'];
      $giaKhuyenMai = $_POST['gia_khuyen_mai'];
      $ngayNhap = $_POST['ngay_nhap'];
      $soLuong = $_POST['so_luong'];
      $trangThai = $_POST['trang_thai'] ?? '';
      $checkHinhAnh = $_FILES['hinh_anh']['name'][0] ?? '';

      $errors = [];

      if (empty($ten)) {
        $errors['ten'] = "Vui lòng nhập tên sản phẩm";
      }
      if (empty($moTa)) {
        $errors['mo_ta'] = "Vui lòng nhập mô tả";
      }
      if (empty($moTaChiTiet)) {
        $errors['mo_ta_chi_tiet'] = "Vui lòng nhập mô tả chi tiết";
      }
      if (empty($danhMuc)) {
        $errors['danh_muc'] = "Vui lòng chọn danh mục";
      }
      if (empty($giaNhap)) {
        $errors['gia_nhap'] = "Vui lòng nhập giá nhập";
      }
      if (empty($giaBan)) {
        $errors['gia_ban'] = "Vui lòng nhập giá bán";
      }
      if (empty($giaKhuyenMai)) {
        $errors['gia_khuyen_mai'] = "Vui lòng nhập giá khuyến mãi";
      }
      if (empty($ngayNhap)) {
        $errors['ngay_nhap'] = "Vui lòng chọn ngày nhập";
      }
      if (empty($soLuong)) {
        $errors['so_luong'] = "Vui lòng nhập số lượng";
      }
      if (empty($trangThai)) {
        $errors['trang_thai'] = "Vui lòng chọn trạng thái";
      }
      if (empty($checkHinhAnh)) {
        $errors['hinh_anh_product'] = "Vui lòng chọn hình ảnh";
      }

      if (empty($errors)) {
        $this->modelSanPham->createProduct($ten, $moTa, $moTaChiTiet, $danhMuc, $giaNhap, $giaBan, $giaKhuyenMai, $ngayNhap, $soLuong, $trangThai);
        $idProduct =  $this->modelSanPham->getLastIdProduct();
        foreach ($_FILES['hinh_anh']['tmp_name'] as $key => $tmpName) {
          $imagePath = './uploads/product/' . basename(($_FILES['hinh_anh']['name'][$key]));
          move_uploaded_file($tmpName, $imagePath);
          $this->modelSanPham->createImageProduct($idProduct, $imagePath);
        }
        unset($_SESSION['errors']);
        header('Location: ?act=san-phams');
        exit();
      } else {
        $_SESSION['errors'] = $errors;
        header("Location: ?act=form-them-san-pham");
        exit();
      }
    }
  }

  public function destroy()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $this->modelSanPham->deleteProduct($id);
      header("Location: ?act=san-phams");
    }
  }

  public function formUpdate()
  {
    $id = $_GET['id'];
    $sanPham = $this->modelSanPham->getOneById($id);
    $danhMucs = $this->modelDanhMuc->getAll();
    require_once('./views/sanpham/update-san-pham.php');
  }

  public function update()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $id = $_POST['id'];
      $ten = $_POST['ten'];
      $moTa = $_POST['mo_ta'];
      $moTaChiTiet = $_POST['mo_ta_chi_tiet'];
      $danhMuc = $_POST['danh_muc'] ?? '';
      $giaNhap = $_POST['gia_nhap'];
      $giaBan = $_POST['gia_ban'];
      $giaKhuyenMai = $_POST['gia_khuyen_mai'];
      $ngayNhap = $_POST['ngay_nhap'];
      $soLuong = $_POST['so_luong'];
      $trangThai = $_POST['trang_thai'] ?? '';
      $checkHinhAnh = $_FILES['hinh_anh']['name'][0] ?? '';

      $errors = [];

      if (empty($ten)) {
        $errors['ten'] = "Vui lòng nhập tên sản phẩm";
      }
      if (empty($moTa)) {
        $errors['mo_ta'] = "Vui lòng nhập mô tả";
      }
      if (empty($moTaChiTiet)) {
        $errors['mo_ta_chi_tiet'] = "Vui lòng nhập mô tả chi tiết";
      }
      if (empty($danhMuc)) {
        $errors['danh_muc'] = "Vui lòng chọn danh mục";
      }
      if (empty($giaNhap)) {
        $errors['gia_nhap'] = "Vui lòng nhập giá nhập";
      }
      if (empty($giaBan)) {
        $errors['gia_ban'] = "Vui lòng nhập giá bán";
      }
      if (empty($giaKhuyenMai)) {
        $errors['gia_khuyen_mai'] = "Vui lòng nhập giá khuyến mãi";
      }
      if (empty($ngayNhap)) {
        $errors['ngay_nhap'] = "Vui lòng chọn ngày nhập";
      }
      if (empty($soLuong)) {
        $errors['so_luong'] = "Vui lòng nhập số lượng";
      }
      if (empty($trangThai)) {
        $errors['trang_thai'] = "Vui lòng chọn trạng thái";
      }
      // if (empty($checkHinhAnh)) {
      //   $errors['hinh_anh_product'] = "Vui lòng chọn hình ảnh";
      // }

      if (empty($errors)) {
        $this->modelSanPham->updateProduct($id, $ten, $moTa, $moTaChiTiet, $danhMuc, $giaNhap, $giaBan, $giaKhuyenMai, $ngayNhap, $soLuong, $trangThai);

        if (!empty($checkHinhAnh)) {
          $this->modelSanPham->deleteImageProduct($id);
          foreach ($_FILES['hinh_anh']['tmp_name'] as $key => $tmpName) {
            $imagePath = './uploads/product/' . basename(($_FILES['hinh_anh']['name'][$key]));
            move_uploaded_file($tmpName, $imagePath);
            $this->modelSanPham->createImageProduct($id, $imagePath);
          }
        }

        unset($_SESSION['errors']);
        header('Location: ?act=san-phams');
        exit();
      } else {
        $_SESSION['errors'] = $errors;
        header("Location: ?act=form-sua-san-pham&id=$id");
        exit();
      }
    }
  }

  public function deleteReview()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $idDanhGia = $_POST['id_danh_gia'];
      $idSanPham = $_POST['id_san_pham'];
      $this->modelSanPham->deleteReview($idDanhGia);
      header("Location: ?act=chi-tiet-san-pham&id=$idSanPham");
    }
  }

  public function deleteComment()
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $idBinhLuan = $_POST['id_binh_luan'];
      $idSanPham = $_POST['id_san_pham'];
      $this->modelSanPham->deleteComment($idBinhLuan);
      header("Location: ?act=chi-tiet-san-pham&id=$idSanPham");
    }
  }
}
