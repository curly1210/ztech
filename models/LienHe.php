<?php
class LienHe
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
  public function create($hoTen, $email, $dienThoai, $noiDung)
  {
    try {
      $sql = "INSERT INTO lien_hes (ho_ten,so_dien_thoai,email,noi_dung) 
      VALUES (:ho_ten,:so_dien_thoai,:email,:noi_dung)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':ho_ten', $hoTen);
      $stmt->bindParam(':so_dien_thoai', $dienThoai);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':noi_dung', $noiDung);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
