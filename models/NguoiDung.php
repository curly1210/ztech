<?php


class NguoiDung
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

  public function checkLogin($email, $matKhau)
  {
    try {

      $sql = "SELECT * FROM nguoi_dungs WHERE email = :email AND mat_khau = :mat_khau";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':mat_khau', $matKhau);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function checkUniqueEmail($email)
  {
    try {

      $sql = "SELECT * FROM nguoi_dungs WHERE email = :email  ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function create($hoTen, $email, $matKhau, $dienThoai, $gioiTinh, $namSinh, $diaChi)
  {
    try {

      $sql = "INSERT INTO nguoi_dungs (ho_ten,gioi_tinh,nam_sinh,email,mat_khau,dien_thoai,dia_chi_nguoi_dung) 
      VALUES (:hoTen,:gioiTinh,:namSinh,:email,:matKhau,:dienThoai,:diaChi)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':hoTen', $hoTen);
      $stmt->bindParam(':gioiTinh', $gioiTinh);
      $stmt->bindParam(':namSinh', $namSinh);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':matKhau', $matKhau);
      $stmt->bindParam(':dienThoai', $dienThoai);
      $stmt->bindParam(':diaChi', $diaChi);
      $stmt->execute();
      return true;
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
