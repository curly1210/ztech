<?php
class Base
{
  public $conn;
  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function updateViewTinTuc($id)
  {
    try {
      $sql = "UPDATE tin_tucs SET luot_xem=luot_xem+1 WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getTinTucById($id)
  {
    try {
      $sql = "SELECT * FROM tin_tucs WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function __destruct()
  {
    $this->conn = null;
  }

  public function getAllDanhMuc()
  {
    try {
      $sql = "SELECT * FROM danh_mucs WHERE danh_mucs.trang_thai = 2";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getCountBuyProduct()
  {
    try {
      $sql = "SELECT sp.ten AS ten_san_pham, SUM(ctdh.so_luong) AS tong_so_luong_ban
      FROM chi_tiet_don_hangs AS ctdh
      INNER JOIN san_phams AS sp
      ON ctdh.id_san_pham = sp.id
      INNER JOIN don_hangs AS dh
      ON ctdh.id_don_hang = dh.id
      INNER JOIN trang_thai_don_hangs on trang_thai_don_hangs.id = dh.id_trang_thai_don_hang
      WHERE trang_thai_don_hangs.ten = 'Giao hàng thành công' 
      GROUP BY sp.ten
      ORDER BY tong_so_luong_ban DESC";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getAdressShop()
  {
    try {
      $sql = "SELECT * FROM noi_dungs";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getProductById($id)
  {
    try {

      $sql = "SELECT * FROM san_phams WHERE id = :id  ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getLastIdCreate()
  {
    try {
      return $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
