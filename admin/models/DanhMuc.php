<?php
class DanhMuc
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function postData($tenDanhMuc, $trangThai, $hinhAnh)
    {
        try {
            $sql = "INSERT INTO danh_mucs (ten,hinh_anh,trang_thai) VALUES (:ten_danh_muc,:hinh_anh,:trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_danh_muc', $tenDanhMuc);
            $stmt->bindParam(':hinh_anh', $hinhAnh);
            $stmt->bindParam(':trang_thai', $trangThai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getDetailData($id)
    {
        try {
            $sql = "SELECT * FROM danh_mucs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function updateData($id, $tenDanhMuc, $trangThai, $hinhAnh)
    {
        try {
            $sql = "UPDATE danh_mucs SET ten=:ten_danh_muc ,hinh_anh=:hinh_anh,trang_thai=:trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_danh_muc', $tenDanhMuc);
            $stmt->bindParam(':hinh_anh', $hinhAnh);
            $stmt->bindParam(':trang_thai', $trangThai);
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
            $sql = "DELETE FROM danh_mucs WHERE id=:id";
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
