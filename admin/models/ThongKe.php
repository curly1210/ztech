<?php
class ThongKe
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getTotalRevenue()
    {
        try {
            $sql = "SELECT SUM(don_hangs.thanh_toan) AS TongDoanhThu FROM don_hangs 
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang 
            WHERE trang_thai_don_hangs.ten LIKE 'Giao hàng thành công' 
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getTotalOrder()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHang FROM don_hangs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusDangCho()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangDangCho FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Chờ xác nhận' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusDaXacNhan()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangDaXacNhan FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Đã xác nhận' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusDaGiao()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangDaGiao FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Đã giao' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusDangGiao()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangDangGiao FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Đang giao' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusGiaoThanhCong()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangGiaoThanhCong FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Giao hàng thành công' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusGiaoThatBai()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangGiaoThatBai FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Giao hàng thất bại' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderStatusDaHuy()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHangDaHuy FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Đã hủy' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getTotalCustomer()
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongKhachHang FROM nguoi_dungs WHERE `admin` = 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    //biểu đồ thống kê
    public function getAllThongKe()
    {
        try {
            $sql = "SELECT *  FROM thong_kes";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function insertThongKe($ngayThongKe, $tongDoanhThu, $soDonHang)
    {
        try {
            $sql = "INSERT INTO thong_kes (tong_doanh_thu,so_don_hang,ngay_thong_ke) VALUES (:tong_doanh_thu,:so_don_hang,:ngay_thong_ke)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ngay_thong_ke', $ngayThongKe);
            $stmt->bindParam(':tong_doanh_thu', $tongDoanhThu);
            $stmt->bindParam(':so_don_hang', $soDonHang);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function updateThongKe($id, $tongDoanhThu, $soDonHang)
    {
        try {
            $sql = "UPDATE thong_kes SET  tong_doanh_thu = :tong_doanh_thu, so_don_hang = :so_don_hang WHERE id = :id";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':tong_doanh_thu', $tongDoanhThu);
            $stmt->bindParam(':so_don_hang', $soDonHang);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getOrderByDateTime($ngayThongKe)
    {
        try {
            $sql = "SELECT COUNT(*) AS SoLuongDonHang FROM don_hangs  
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang  
            WHERE trang_thai_don_hangs.ten = 'Giao hàng thành công' AND don_hangs.ngay_dat_hang= :ngayThongKe ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ngayThongKe', $ngayThongKe);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getTotalRevenueByDateTime($ngayThongKe)
    {
        try {
            $sql = "SELECT SUM(don_hangs.thanh_toan) AS TongDoanhThu FROM don_hangs 
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang 
            WHERE trang_thai_don_hangs.ten = 'Giao hàng thành công'  AND don_hangs.ngay_dat_hang= :ngayThongKe 
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ngayThongKe', $ngayThongKe);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getAllDonHangs()
    {
        try {
            $sql = "SELECT date(don_hangs.ngay_dat_hang) as ngay_dat, COUNT(don_hangs.id) as so_don_hang, SUM(don_hangs.tong_tien) as tong_tien FROM don_hangs JOIN trang_thai_don_hangs on don_hangs.id_trang_thai_don_hang = trang_thai_don_hangs.id
            WHERE trang_thai_don_hangs.ten LIKE 'Giao hàng thành công'
            GROUP by DATE(don_hangs.ngay_dat_hang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
}
