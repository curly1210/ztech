<?php
class Home extends Base
{

    public function getSlider()
    {
        try {
            $sql = "SELECT * FROM banners WHERE banners.trang_thai = 2 
            ORDER BY banners.id DESC LIMIT 3
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getAllProducts()
    {
        try {

            $sql = "SELECT san_phams.*, danh_gias.sao, COUNT(danh_gias.sao) AS so_danh_gia, AVG(danh_gias.sao) AS so_sao, MIN(hinh_anhs.hinh_anh) AS url 
            FROM hinh_anhs JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id 
            LEFT JOIN danh_gias ON danh_gias.id_san_pham = san_phams.id 
            WHERE san_phams.trang_thai = 2 
            GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham LIMIT 16";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getNewProducts()
    {
        try {

            $sql = "SELECT san_phams.*, danh_gias.sao, COUNT(danh_gias.sao) AS so_danh_gia, AVG(danh_gias.sao) AS so_sao, MIN(hinh_anhs.hinh_anh) AS url 
            FROM hinh_anhs JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id 
            LEFT JOIN danh_gias ON danh_gias.id_san_pham = san_phams.id 
            WHERE san_phams.trang_thai = 2 
            GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham
            ORDER BY san_phams.id DESC LIMIT 4 ;
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getFavouriteProducts()
    {
        try {

            $sql = "SELECT san_phams.*,SUM(chi_tiet_don_hangs.so_luong) as tong_so_luong_ban,danh_gias.sao, COUNT(danh_gias.sao) AS so_danh_gia, AVG(danh_gias.sao) AS so_sao, MIN(hinh_anhs.hinh_anh) AS url 
            FROM hinh_anhs 
            JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id 
            LEFT JOIN danh_gias ON danh_gias.id_san_pham = san_phams.id 
            JOIN chi_tiet_don_hangs ON chi_tiet_don_hangs.id_san_pham = san_phams.id 
            JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang 
            JOIN trang_thai_don_hangs on trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang 
            WHERE san_phams.trang_thai = 2 AND trang_thai_don_hangs.ten='Giao hàng thành công' 
            GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham 
            ORDER BY tong_so_luong_ban 
            DESC LIMIT 6;
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getNewTinTuc()
    {
        try {
            $sql = "SELECT * FROM tin_tucs WHERE tin_tucs.trang_thai = 2  ORDER BY tin_tucs.id LIMIT 3";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
}
