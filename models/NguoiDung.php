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

  public function createOrder($idDonHang, $idNguoiDung, $idDiaChiNhanHang, $phuongThucThanhToan, $maKhuyenMai, $ghi_chu)
  {
    try {
      $tienShip = 30000;
      $maKhuyenMai = empty($maKhuyenMai) ? NULL : $maKhuyenMai;
      $ghi_chu = empty($ghi_chu) ? NULL : $ghi_chu;
      // $maKhuyenMai = 3;

      $sql = "INSERT INTO don_hangs(id,tien_ship, phuong_thuc_thanh_toan, ghi_chu, id_dia_chi_nhan_hang, id_nguoi_dung, id_ma_khuyen_mai) 
      VALUES (:id,:tien_ship, :phuong_thuc, :ghi_chu, :id_dia_chi, :id_nguoi_dung, :id_ma_khuyen_mai)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":tien_ship", $tienShip);
      $stmt->bindParam(":phuong_thuc", $phuongThucThanhToan);
      $stmt->bindParam(":ghi_chu", $ghi_chu);
      $stmt->bindParam(":id_dia_chi", $idDiaChiNhanHang);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_ma_khuyen_mai", $maKhuyenMai);
      $stmt->bindParam(":id", $idDonHang);

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
      $sql = "WITH san_pham_dau_tien AS (
    SELECT
        don_hangs.id AS id_don_hang,
        san_phams.ten AS ten_san_pham,
        hinh_anhs.hinh_anh AS hinh_anh,
        ROW_NUMBER() OVER (PARTITION BY don_hangs.id ORDER BY san_phams.id ASC) AS row_num
    FROM
        don_hangs
    JOIN chi_tiet_don_hangs ON chi_tiet_don_hangs.id_don_hang = don_hangs.id
    JOIN san_phams ON san_phams.id = chi_tiet_don_hangs.id_san_pham
    JOIN hinh_anhs ON hinh_anhs.id_san_pham = san_phams.id
)
SELECT
    don_hangs.*,
    COALESCE((SELECT COUNT(*)
              FROM don_hangs
              WHERE don_hangs.id_trang_thai_don_hang = 7), 0) AS don_hang_huy,
    COALESCE((SELECT COUNT(*)
              FROM don_hangs
              WHERE don_hangs.id_trang_thai_don_hang IN (6, 8, 9, 10, 11, 12)), 0) AS don_hang_dat,
    nguoi_dungs.id AS id_nguoi_dung,
    trang_thai_don_hangs.ten AS ten_trang_thai,
    trang_thai_don_hangs.ma_mau AS ma_mau,
    san_pham_dau_tien.ten_san_pham AS ten_san_pham_dau_tien,
    san_pham_dau_tien.hinh_anh AS hinh_anh_dau_tien
FROM
    don_hangs
JOIN nguoi_dungs ON nguoi_dungs.id = don_hangs.id_nguoi_dung
JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang
JOIN san_pham_dau_tien ON san_pham_dau_tien.id_don_hang = don_hangs.id
WHERE
    san_pham_dau_tien.row_num = 1 AND nguoi_dungs.id= :id ORDER BY don_hangs.ngay_dat_hang DESC;";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi:" . $e->getMessage();
    }
  }
  public function getOrderDetail($id)
  {
    // var_dump($id);
    try {
      $sql = "SELECT * ,trang_thai_don_hangs.ma_mau ,trang_thai_don_hangs.ten as ten_trang_thai_don_hang , ma_khuyen_mais.gia as giam_gia, ma_khuyen_mais.ten as ten_ma_khuyen_mai , chi_tiet_don_hangs.id as id_chi_tiet_don_hang,
      chi_tiet_don_hangs.gia as gia_chi_tiet_don_hang , nguoi_dungs.dia_chi as dia_chi_nguoi_dat , dia_chi_nhan_hangs.dia_chi as dia_chi_nguoi_nhan
      FROM don_hangs 
      JOIN nguoi_dungs on nguoi_dungs.id = don_hangs.id_nguoi_dung
      JOIN dia_chi_nhan_hangs on dia_chi_nhan_hangs.id = don_hangs.id_dia_chi_nhan_hang
      JOIN chi_tiet_don_hangs on chi_tiet_don_hangs.id_don_hang=don_hangs.id
      JOIN trang_thai_don_hangs on trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang 
      LEFT JOIN ma_khuyen_mais on ma_khuyen_mais.id = don_hangs.id_ma_khuyen_mai
      WHERE don_hangs.id  LIKE :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }
  public function getProductsOrder($id, $user)
  {
    try {

      $idNguoiDung = empty($user) ? NULL : $user['id'];
      $sql = "SELECT 
          chi_tiet_don_hangs.*, san_phams.*,
          MIN(hinh_anhs.hinh_anh) AS `image_url` , chi_tiet_don_hangs.id as id_chi_tiet_don_hang,
           CASE 
                WHEN danh_gias.id_nguoi_danh_gia IS NOT NULL THEN 1 
                ELSE 0 
            END AS is_review,
            CASE 
                WHEN danh_gias.id_nguoi_danh_gia IS NOT NULL THEN danh_gias.sao 
                ELSE 0 
            END AS sao_review
        FROM chi_tiet_don_hangs
        JOIN san_phams ON san_phams.id = chi_tiet_don_hangs.id_san_pham
        JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang
        JOIN hinh_anhs ON hinh_anhs.id_san_pham = san_phams.id
        LEFT JOIN danh_gias ON san_phams.id = danh_gias.id_san_pham and danh_gias.id_nguoi_danh_gia = :id_nguoi_dung
        WHERE chi_tiet_don_hangs.id_don_hang = :id
        GROUP BY chi_tiet_don_hangs.id,danh_gias.sao";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }


  public function changeStatusOrder($id, $idTrangThai)
  {
    try {
      $sql = "UPDATE don_hangs SET don_hangs.id_trang_thai_don_hang=:id_trang_thai WHERE id= :id";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":id_trang_thai", $idTrangThai);
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi: " . $e->getMessage();
    }
  }

  public function checkLikeProduct($idNguoiDung, $idSanPham)
  {
    try {
      $sql = "SELECT * FROM san_pham_yeu_thichs WHERE id_nguoi_dung = :id_nguoi_dung 
                                                  AND id_san_pham = :id_san_pham ";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return $stmt->fetch();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function likeProduct($idNguoiDung, $idSanPham)
  {
    try {

      $sql = "INSERT INTO san_pham_yeu_thichs(id_nguoi_dung, id_san_pham) 
      VALUES (:id_nguoi_dung, :id_san_pham)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function unlikeProduct($idNguoiDung, $idSanPham)
  {
    try {

      $sql = "DELETE FROM san_pham_yeu_thichs WHERE id_nguoi_dung = :id_nguoi_dung
                                                   and id_san_pham = :id_san_pham";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idSanPham);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function getListLikeProduct($idNguoiDung)
  {
    try {
      $sql = "SELECT MIN(hinh_anhs.hinh_anh) AS url, danh_mucs.ten as ten_danh_muc, san_phams.ten as ten_san_pham, san_phams.gia_ban,san_phams.gia_khuyen_mai, san_phams.id 
      FROM san_pham_yeu_thichs JOIN san_phams on san_pham_yeu_thichs.id_san_pham = san_phams.id 
      JOIN hinh_anhs ON san_phams.id = hinh_anhs.id_san_pham JOIN danh_mucs on san_phams.danh_muc_id = danh_mucs.id  
       WHERE san_pham_yeu_thichs.id_nguoi_dung =:id_nguoi_dung  GROUP BY hinh_anhs.id_san_pham";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);

      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function deleteListLike($idNguoiDung)
  {
    try {

      $sql = "DELETE FROM san_pham_yeu_thichs WHERE id_nguoi_dung = :id_nguoi_dung";

      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }

  public function reviewProduct($idProduct, $idNguoiDung, $sao)
  {
    try {

      $sql = "INSERT INTO danh_gias(sao, id_nguoi_danh_gia, id_san_pham) 
      VALUES (:sao, :id_nguoi_danh_gia, :id_san_pham)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":sao", $sao);
      $stmt->bindParam(":id_nguoi_danh_gia", $idNguoiDung);
      $stmt->bindParam(":id_san_pham", $idProduct);

      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo "Lỗi : " . $e->getMessage();
    }
  }
}
