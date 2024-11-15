<?php

class SanPham
{
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function __destruct()
  {
    $this->conn = null;
  }

  public function getAll($search)
  {
    try {

      $sql = "SELECT san_phams.id,san_phams.ten,san_phams.gia_ban,san_phams.hang_ton_kho,san_phams.luot_xem, MIN(hinh_anhs.hinh_anh) as `url` FROM hinh_anhs JOIN san_phams on hinh_anhs.id_san_pham = san_phams.id WHERE san_phams.ten LIKE '%$search%' GROUP by hinh_anhs.id_san_pham";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getOneById($id)
  {
    try {
      $sql = "SELECT * FROM san_phams WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getOneCategory($id)
  {
    try {
      $sql = "SELECT * FROM danh_mucs WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getCommentByid($id)
  {
    try {

      $sql = "SELECT *, binh_luans.id as id_binh_luan FROM binh_luans JOIN nguoi_dungs ON 
      binh_luans.id_nguoi_dung = nguoi_dungs.id WHERE binh_luans.id_san_pham= :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getReviewByid($id)
  {
    try {

      $sql = "SELECT *, danh_gias.id as id_danh_gia FROM danh_gias JOIN nguoi_dungs ON 
      danh_gias.id_nguoi_danh_gia = nguoi_dungs.id WHERE danh_gias.id_san_pham = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getImageById($idSanPham)
  {
    try {

      $sql = "SELECT * FROM hinh_anhs WHERE id_san_pham=:id_san_pham ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id_san_pham', $idSanPham);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function createProduct($ten, $moTa, $moTaChiTiet, $danhMuc, $giaNhap, $giaBan, $giaKhuyenMai, $ngayNhap, $soLuong, $trangThai)
  {
    try {

      $sql = "INSERT INTO san_phams (ten,mo_ta,mo_ta_chi_tiet,gia_nhap,gia_ban,gia_khuyen_mai,ngay_nhap,hang_ton_kho,trang_thai,danh_muc_id) 
      VALUES (:ten,:mo_ta,:mo_ta_chi_tiet,:gia_nhap,:gia_ban,:gia_khuyen_mai,:ngay_nhap,:so_luong,:trang_thai,:danh_muc_id)";
      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(':ten', $ten);
      $stmt->bindParam(':mo_ta', $moTa);
      $stmt->bindParam(':mo_ta_chi_tiet', $moTaChiTiet);
      $stmt->bindParam(':gia_nhap', $giaNhap);
      $stmt->bindParam(':gia_ban', $giaBan);
      $stmt->bindParam(':gia_khuyen_mai', $giaKhuyenMai);
      $stmt->bindParam(':ngay_nhap', $ngayNhap);
      $stmt->bindParam(':so_luong', $soLuong);
      $stmt->bindParam(':trang_thai', $trangThai);
      $stmt->bindParam(':danh_muc_id', $danhMuc);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getLastIdProduct()
  {
    try {
      return $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function createImageProduct($idProduct, $imagePath)
  {
    try {
      $sql = "INSERT INTO hinh_anhs (hinh_anh,id_san_pham)
       VALUES (:hinh_anh,:id_san_pham)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':hinh_anh', $imagePath);
      $stmt->bindParam(':id_san_pham', $idProduct);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteProduct($id)
  {
    try {
      $sql = "DELETE FROM san_phams WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function updateProduct($id, $ten, $moTa, $moTaChiTiet, $danhMuc, $giaNhap, $giaBan, $giaKhuyenMai, $ngayNhap, $soLuong, $trangThai)
  {
    try {
      $sql = "UPDATE san_phams SET ten = :ten_san_pham , mo_ta = :mo_ta, mo_ta_chi_tiet = :mo_ta_chi_tiet, gia_nhap = :gia_nhap,
      gia_ban = :gia_ban, gia_khuyen_mai = :gia_khuyen_mai, ngay_nhap = :ngay_nhap, hang_ton_kho = :so_luong, trang_thai = :trang_thai, danh_muc_id=:danh_muc
      WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':ten_san_pham', $ten);
      $stmt->bindParam(':mo_ta', $moTa);
      $stmt->bindParam(':mo_ta_chi_tiet', $moTaChiTiet);
      $stmt->bindParam(':gia_nhap', $giaNhap);
      $stmt->bindParam(':gia_ban', $giaBan);
      $stmt->bindParam(':gia_khuyen_mai', $giaKhuyenMai);
      $stmt->bindParam(':ngay_nhap', $ngayNhap);
      $stmt->bindParam(':so_luong', $soLuong);
      $stmt->bindParam(':trang_thai', $trangThai);
      $stmt->bindParam(':danh_muc', $danhMuc);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteImageProduct($idSanPham)
  {
    try {
      $sql = "DELETE FROM hinh_anhs WHERE id_san_pham =:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $idSanPham);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteReview($idDanhGia)
  {
    try {
      $sql = "DELETE FROM danh_gias WHERE id =:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $idDanhGia);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteComment($idBinhLuan)
  {
    try {
      $sql = "DELETE FROM binh_luans WHERE id =:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $idBinhLuan);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
