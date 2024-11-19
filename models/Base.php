<?php
class Base
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
}
