<?php
class DonHang
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
      $sql = "SELECT *,don_hangs.id as id_don_hang FROM don_hangs JOIN nguoi_dungs 
      on don_hangs.id_nguoi_dung = nguoi_dungs.id JOIN trang_thai_don_hangs
      on don_hangs.id_trang_thai_don_hang = trang_thai_don_hangs.id  WHERE don_hangs.id LIKE '%$search%' OR ho_ten LIKE '%$search%' ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getAllStatusOrder()
  {
    try {
      $sql = "SELECT * FROM trang_thai_don_hangs";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function changeStatusOrder($ma_don_hang, $id_trang_thai_don_hang)
  {
    try {
      $sql = "UPDATE don_hangs SET id_trang_thai_don_hang =:id_trang_thai_don_hang 
                                     WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id_trang_thai_don_hang', $id_trang_thai_don_hang);
      $stmt->bindParam(':id', $ma_don_hang);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getDetail($id)
  {
    try {
      $sql = "SELECT * , trang_thai_don_hangs.ten as ten_trang_thai_don_hang , ma_khuyen_mais.gia as giam_gia, ma_khuyen_mais.ten as ten_ma_khuyen_mai , chi_tiet_don_hangs.id as id_chi_tiet_don_hang,
      chi_tiet_don_hangs.gia as gia_chi_tiet_don_hang
      FROM don_hangs 
      JOIN nguoi_dungs on nguoi_dungs.id = don_hangs.id_nguoi_dung
      JOIN dia_chi_nhan_hangs on dia_chi_nhan_hangs.id = don_hangs.id_dia_chi_nhan_hang
      JOIN chi_tiet_don_hangs on chi_tiet_don_hangs.id_don_hang=don_hangs.id
      JOIN trang_thai_don_hangs on trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang 
      JOIN ma_khuyen_mais on ma_khuyen_mais.id = don_hangs.id_ma_khuyen_mai
      WHERE don_hangs.id  = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
  public function getListProducts($id)
  {
    try {
      $sql = "SELECT 
          chi_tiet_don_hangs.*, san_phams.*,
          MIN(hinh_anhs.hinh_anh) AS `image_url` , chi_tiet_don_hangs.id as id_chi_tiet_don_hang
        FROM chi_tiet_don_hangs
        JOIN san_phams ON san_phams.id = chi_tiet_don_hangs.id_san_pham
        JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang
        JOIN hinh_anhs ON hinh_anhs.id_san_pham = san_phams.id
        WHERE chi_tiet_don_hangs.id_don_hang = :id
        GROUP BY chi_tiet_don_hangs.id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
  public function updateTotal($id, $total)
  {
    try {
      $sql = "UPDATE chi_tiet_don_hangs SET gia=:gia WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':gia', $total);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function updateThanhToan($id, $tongTien, $thanhToan)
  {
    try {
      $sql = "UPDATE don_hangs SET tong_tien=:tong_tien , thanh_toan=:thanh_toan WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':tong_tien', $tongTien);
      $stmt->bindParam(':thanh_toan', $thanhToan);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getImgProductList($id)
  {
    try {
      $sql = "SELECT * FROM `hinh_anhs` 
      WHERE id_san_pham  = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }

  public function changeStatusPayment($ma_don_hang, $trang_thai_thanh_toan)
  {
    try {
      $sql = "UPDATE don_hangs SET trang_thai_thanh_toan =:trang_thai_thanh_toan 
                                     WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':trang_thai_thanh_toan', $trang_thai_thanh_toan);
      $stmt->bindParam(':id', $ma_don_hang);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
