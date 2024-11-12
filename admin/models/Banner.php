<?php
class Banner
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAll($search)
    {
        try {
            $sql = "SELECT * FROM banners WHERE tieu_de LIKE '%$search%'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function postData($tieuDe, $hinhAnh, $trangThai)
    {
        try {
            $sql = "INSERT INTO banners (hinh_anh,tieu_de,trang_thai) VALUES (:hinh_anh,:tieu_de,:trang_thai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de', $tieuDe);
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
            $sql = "SELECT * FROM banners WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function updateData($id, $tieuDe, $hinhAnh, $trangThai)
    {
        try {
            $sql = "UPDATE banners SET tieu_de=:tieu_de, hinh_anh=:hinh_anh, trang_thai=:trang_thai WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tieu_de', $tieuDe);
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
            $sql = "DELETE FROM banners WHERE id=:id";
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
