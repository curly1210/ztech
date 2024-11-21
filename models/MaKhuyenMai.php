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
            $sql = "SELECT * FROM ma_khuyen_mais WHERE trang_thai = 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
}
