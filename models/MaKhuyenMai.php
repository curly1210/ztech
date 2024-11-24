<?php
class MaKhuyenMai extends Base
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }


    public function getAllMaKhuyenMai()
    {
        try {
            $sql = "SELECT * FROM ma_khuyen_mais";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getMaKhuyenMaiCurrent()
    {
        try {
            $sql = "SELECT * FROM ma_khuyen_mais WHERE trang_thai = 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
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
}
