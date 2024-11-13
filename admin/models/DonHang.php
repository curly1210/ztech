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
