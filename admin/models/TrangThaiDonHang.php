<?php


class TrangThaiDonHang
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

      $sql = "SELECT * FROM trang_thai_don_hangs WHERE ten LIKE '%$search%' ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getOne($id)
  {
    try {

      $sql = "SELECT * FROM trang_thai_don_hangs WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function update($id, $ten, $mau)
  {
    try {
      $sql = "UPDATE trang_thai_don_hangs SET ten = :ten, ma_mau = :ma_mau WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':ten', $ten);
      $stmt->bindParam(':ma_mau', $mau);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function create($ten, $mau)
  {
    try {
      $sql = "INSERT INTO trang_thai_don_hangs (ten,ma_mau) 
      VALUES (:ten,:ma_mau)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':ten', $ten);
      $stmt->bindParam(':ma_mau', $mau);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteData($id)
  {
    try {
      $sql = "DELETE FROM trang_thai_don_hangs WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
