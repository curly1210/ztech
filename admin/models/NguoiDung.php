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

  public function getOneById($id)
  {
    try {
      $sql = "SELECT * FROM nguoi_dungs WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();

      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function changeStatus($id)
  {
    $status = $this->getOneById($id)['trang_thai'];
    if ($status == 1) {
      $status = 2;
    } else {
      $status = 1;
    }

    try {
      $sql = "UPDATE nguoi_dungs SET trang_thai=:userStatus WHERE id=:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':userStatus', $status);
      $stmt->bindParam(':id', $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function delete($delete_id)
  {
    try {
      $sql = "DELETE FROM `nguoi_dungs` WHERE id IN ($delete_id) and id NOT IN(5)";
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


}
