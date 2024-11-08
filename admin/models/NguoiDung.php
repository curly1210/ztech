<?php


class NguoiDung
{
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }

  public function getAll($search)
  {
    try {

      $sql = "SELECT * FROM nguoi_dungs WHERE ho_ten LIKE '%$search%' ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function delete($delete_id)
  {
    try {
      $sql = "DELETE FROM `nguoi_dungs` WHERE id IN ($delete_id)";
      $stmt = $this->conn->prepare($sql);
      // $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function create($hoTen, $email, $matKhau, $dienThoai, $gioiTinh, $namSinh)
  {
    try {

      $sql = "INSERT INTO nguoi_dungs (ho_ten,gioi_tinh,nam_sinh,email,mat_khau,dien_thoai) 
      VALUES (:hoTen,:gioiTinh,:namSinh,:email,:matKhau,:dienThoai)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':hoTen', $hoTen);
      $stmt->bindParam(':gioiTinh', $gioiTinh);
      $stmt->bindParam(':namSinh', $namSinh);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':matKhau', $matKhau);
      $stmt->bindParam(':dienThoai', $dienThoai);
      $stmt->execute();
      return true;
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

  // public function deleteData($id)
  // {
  //   try {
  //     $sql = "DELETE FROM lien_hes WHERE id=:id";
  //     $stmt = $this->conn->prepare($sql);
  //     $stmt->bindParam(':id', $id);

  //     $stmt->execute();
  //     return true;
  //   } catch (PDOException $e) {
  //     echo "Lỗi : " . $e->getMessage();
  //   }
  // }

  // public function __destruct()
  // {
  //   $this->conn = null;
  // }
}
