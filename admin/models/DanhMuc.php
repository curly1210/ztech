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
    public function __destruct()
    {
        $this->conn = null;
    }
}
