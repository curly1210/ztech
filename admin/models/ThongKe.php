<?php
class ThongKe
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

  public function getDoanhThu()
  {
    try {
      $sql = "SELECT SUM(don_hangs.thanh_toan) as doanh_thu FROM don_hangs";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
