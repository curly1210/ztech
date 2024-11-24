<?php
class MaKhuyenMai
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll($search)
    {
        try {
            $sql = "SELECT * FROM ma_khuyen_mais WHERE ten LIKE '%$search%' ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function postData($tenMa, $giaMa, $soLuong, $trangThai, $ngayBatDau, $ngayKetThuc)
    {
        try {
            $sql = "INSERT INTO ma_khuyen_mais (ten,gia,so_luong,trang_thai,ngay_bat_dau,ngay_ket_thuc) VALUES (:ten,:gia,:so_luong,:trang_thai,:ngay_bat_dau,:ngay_ket_thuc)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten', $tenMa);
            $stmt->bindParam(':gia', $giaMa);
            $stmt->bindParam(':so_luong', $soLuong);
            $stmt->bindParam(':trang_thai', $trangThai);
            $stmt->bindParam(':ngay_bat_dau', $ngayBatDau);
            $stmt->bindParam(':ngay_ket_thuc', $ngayKetThuc);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getDetailData($id)
    {
        try {
            $sql = "SELECT * FROM ma_khuyen_mais WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function updateData($id, $tenMa, $giaMa, $soLuong)
    {
        try {
            $sql = "UPDATE ma_khuyen_mais SET ten=:ten, gia=:gia, so_luong=:so_luong   WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten', $tenMa);
            $stmt->bindParam(':gia', $giaMa);
            $stmt->bindParam(':so_luong', $soLuong);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM ma_khuyen_mais WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function updateStatus($id, $trangThai)
    {
        try {
            $sql = "UPDATE ma_khuyen_mais SET trang_thai= :trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":trang_thai", $trangThai);
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
