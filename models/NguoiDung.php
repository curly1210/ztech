<?php


class NguoiDung extends Base
{


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

      $sql = "INSERT INTO nguoi_dungs (ho_ten,gioi_tinh,nam_sinh,email,mat_khau,dien_thoai,dia_chi) 
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


  public function sendContact($hoTen, $email, $dienThoai, $noiDung)
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

  public function sendComment($binhLuan, $idNguoiDung, $idSanPham)
  {
    try {
      $sql = "INSERT INTO binh_luans (noi_dung,id_nguoi_dung,id_san_pham) 
      VALUES (:binh_luan,:id_nguoi_dung,:id_san_pham)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':binh_luan', $binhLuan);
      $stmt->bindParam(':id_nguoi_dung', $idNguoiDung);
      $stmt->bindParam(':id_san_pham', $idSanPham);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getProfile($id)
  {
    try {
      $sql = "SELECT * FROM nguoi_dungs WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function updateProfile($id, $hoTen, $email, $diaChi, $dienThoai, $gioiTinh, $ngaySinh)
  {
    try {
      $sql = "UPDATE nguoi_dungs SET ho_ten=:ho_ten, email=:email, dia_chi=:dia_chi, dien_thoai=:dien_thoai , gioi_tinh=:gioi_tinh, nam_sinh=:nam_sinh  WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":ho_ten", $hoTen);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":dia_chi", $diaChi);
      $stmt->bindParam(":dien_thoai", $dienThoai);
      $stmt->bindParam(":gioi_tinh", $gioiTinh);
      $stmt->bindParam(":nam_sinh", $ngaySinh);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function updatePassword($id, $matKhau)
  {
    try {
      $sql = "UPDATE nguoi_dungs SET mat_khau=:mat_khau  WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":mat_khau", $matKhau);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getAllUsers()
  {
    try {
      $sql = "SELECT * FROM nguoi_dungs ";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
