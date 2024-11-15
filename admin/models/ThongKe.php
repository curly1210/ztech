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
}
