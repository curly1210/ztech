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

  public function checkProductInCart($idNguoiDung, $idSanPham)
  {
    try {
      $sql = "SELECT * FROM gio_hangs WHERE id_nguoi_dung=:id_nguoi_dung 
                                      AND id_san_pham=:id_san_pham ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function updateQuantityInCart($idNguoiDung, $idSanPham, $soLuong)
  {
    try {
      $sql = "UPDATE gio_hangs SET so_luong=:so_luong WHERE id_nguoi_dung =:id_nguoi_dung AND id_san_pham =:id_san_pham";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":so_luong", $soLuong);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function insertQuantityInCart($idNguoiDung, $idSanPham, $soLuong)
  {
    try {
      $sql = "INSERT INTO gio_hangs(so_luong, id_nguoi_dung, id_san_pham) 
      VALUES (:so_luong,:id_nguoi_dung,:id_san_pham)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":so_luong", $soLuong);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getAllCart($idNguoiDung)
  {
    try {

      $sql = "SELECT min(hinh_anhs.hinh_anh) as url_anh, san_phams.gia_khuyen_mai as gia 
              ,san_phams.ten as ten_san_pham, danh_mucs.ten as ten_danh_muc, gio_hangs.so_luong as so_luong, san_phams.id as id_san_pham
              FROM gio_hangs JOIN san_phams ON gio_hangs.id_san_pham = san_phams.id 
              JOIN hinh_anhs on san_phams.id = hinh_anhs.id_san_pham 
              JOIN danh_mucs on san_phams.danh_muc_id =danh_mucs.id
              WHERE gio_hangs.id_nguoi_dung = :id_nguoi_dung
              GROUP BY hinh_anhs.id_san_pham, gio_hangs.id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id_nguoi_dung', $idNguoiDung);
      $stmt->execute();

      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteCart($idSanPham, $idNguoiDung)
  {
    try {
      $sql = "DELETE FROM gio_hangs WHERE gio_hangs.id_nguoi_dung = :id_nguoi_dung and gio_hangs.id_san_pham = :id_san_pham";
      $stmt = $this->conn->prepare($sql);

      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getCoupon($id)
  {
    try {
      $sql = "SELECT * FROM ma_khuyen_mais WHERE ma_khuyen_mais.ten = :id and ma_khuyen_mais.trang_thai = 3 and  ma_khuyen_mais.so_luong >0";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);

      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function updateCoupon($id, $soLuong)
  {
    try {
      $sql = "UPDATE ma_khuyen_mais SET so_luong=:so_luong WHERE  ma_khuyen_mais.id =:id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":so_luong", $soLuong);
      $stmt->bindParam(":id", $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function createAddressDelivery($hoTen, $dienThoai, $email, $diaChi)
  {
    try {
      $sql = "INSERT INTO dia_chi_nhan_hangs(dia_chi, ten_nguoi_nhan, so_dien_thoai, email_nguoi_nhan) 
      VALUES (:dia_chi, :ho_ten, :dien_thoai, :email)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":dia_chi", $diaChi);
      $stmt->bindParam(":ho_ten", $hoTen);
      $stmt->bindParam(":dien_thoai", $dienThoai);
      $stmt->bindParam(":email", $email);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function createOrder($idNguoiDung, $idDiaChiNhanHang, $phuongThucThanhToan, $maKhuyenMai)
  {
    try {
      $tienShip = 30000;
      $maKhuyenMai = empty($maKhuyenMai) ? NULL : $maKhuyenMai;
      // $maKhuyenMai = 3;

      $sql = "INSERT INTO don_hangs(tien_ship, phuong_thuc_thanh_toan, ghi_chu, id_dia_chi_nhan_hang, id_nguoi_dung, id_ma_khuyen_mai) 
      VALUES (:tien_ship, :phuong_thuc, :ghi_chu, :id_dia_chi, :id_nguoi_dung, :id_ma_khuyen_mai)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":tien_ship", $tienShip);
      $stmt->bindParam(":phuong_thuc", $phuongThucThanhToan);
      $stmt->bindParam(":ghi_chu", $ghi_chu);
      $stmt->bindParam(":id_dia_chi", $idDiaChiNhanHang);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_ma_khuyen_mai", $maKhuyenMai);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function createOrderDetail($soLuong, $donGia, $idSanPham, $idDonHang)
  {
    try {

      $sql = "INSERT INTO chi_tiet_don_hangs(so_luong, gia, id_san_pham, id_don_hang) 
      VALUES (:so_luong, :gia, :id_san_pham, :id_don_hang)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":so_luong", $soLuong);
      $stmt->bindParam(":gia", $donGia);
      $stmt->bindParam(":id_san_pham", $idSanPham);
      $stmt->bindParam(":id_don_hang", $idDonHang);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteAllCart($idNguoiDung)
  {
    try {

      $sql = "DELETE FROM gio_hangs WHERE gio_hangs.id_nguoi_dung = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $idNguoiDung);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function updateQuantityProduct($id, $so_luong)
  {
    try {
      $sql = "UPDATE san_phams SET hang_ton_kho= :so_luong WHERE san_phams.id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":so_luong", $so_luong);
      $stmt->bindParam(":id", $id);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
  public function getMyOrder($id)
  {
    try {
      $sql = "SELECT don_hangs.*,nguoi_dungs.id FROM don_hangs JOIN nguoi_dungs ON nguoi_dungs.id = don_hangs.id_nguoi_dung WHERE nguoi_dungs.id= :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi:" . $e->getMessage();
    }
  }
}
