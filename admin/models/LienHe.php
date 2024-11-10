<?php

class LienHe
{
  public $conn;

  public function __construct()
  {
    $this->conn = connectDB();
  }
  public function getAll($search)
  {
    try {

      $sql = "SELECT * FROM lien_hes WHERE ho_ten LIKE '%$search%' ";
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
      $sql = "SELECT * FROM lien_hes WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function update($id, $trangThai)
  {
    try {
      $sql = "UPDATE lien_hes SET trang_thai=:trang_thai WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':trang_thai', $trangThai);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function deleteData($id)
  {
    try {
      $sql = "DELETE FROM lien_hes WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function __destruct()
  {
    $this->conn = null;
  }
}
