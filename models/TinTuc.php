<?php
class TinTuc extends Base
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllTinTucs()
    {
        try {
            $sql = "SELECT * FROM tin_tucs WHERE trang_thai=2";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
}
