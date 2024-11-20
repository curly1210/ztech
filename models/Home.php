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
            GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham;";
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

            $sql = "SELECT san_phams.*, danh_gias.sao, COUNT(danh_gias.sao) AS so_danh_gia, AVG(danh_gias.sao) AS so_sao, MIN(hinh_anhs.hinh_anh) AS url 
            FROM hinh_anhs JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id 
            LEFT JOIN danh_gias ON danh_gias.id_san_pham = san_phams.id 
            WHERE san_phams.trang_thai = 2 
            GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham
            ORDER BY so_sao DESC LIMIT 6 ;
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

    public function getAllListProductFilter($category, $search, $min, $max)
    {
        try {
            $sql = "SELECT * from san_phams
            WHERE 1 and san_phams.trang_thai = 2 ";
            // $sql = "SELECT * FROM san_phams url  WHERE 1";

            if (!empty($category)) {
                $sql .= " AND danh_muc_id  = '$category'";
            }

            if ($min > 0) {
                $sql .= " AND gia_ban >= '$min'";
            }

            if ($max > 0) {
                $sql .= " AND gia_ban <= '$max'";
            }

            if (!empty($search)) {
                $sql .= " AND ten LIKE '%$search%'";
            }

            // $sql .= "GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham
            // ORDER BY so_sao DESC";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getPaginationListProductFilter($category, $search, $min, $max, $offset, $numsOnPage, $arrange)
    {
        try {
            $sql = "SELECT san_phams.*, MIN(hinh_anhs.hinh_anh) AS url 
            FROM hinh_anhs JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id 
            WHERE 1 and san_phams.trang_thai = 2 ";
            // $sql = "SELECT * FROM san_phams url  WHERE 1";

            if (!empty($category)) {
                $sql .= " AND danh_muc_id  = '$category'";
            }

            if ($min > 0) {
                $sql .= " AND gia_ban >= '$min'";
            }

            if ($max > 0) {
                $sql .= " AND gia_ban <= '$max'";
            }

            if (!empty($search)) {
                $sql .= " AND ten LIKE '%$search%'";
            }

            $sql .= "GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, hinh_anhs.id_san_pham";
            // $sql .= "GROUP BY san_phams.id, san_phams.ten, san_phams.gia_ban, san_phams.trang_thai, danh_gias.sao, hinh_anhs.id_san_pham";

            if ($arrange > 0) {
                if ($arrange == 1) {
                    $sql .= " ORDER BY san_phams.gia_khuyen_mai";
                } else {
                    $sql .= " ORDER BY san_phams.gia_khuyen_mai DESC";
                }
            }

            // $sql .=  " ORDER BY san_phams.gia_khuyen_mai LIMIT $offset, $numsOnPage";
            $sql .=  " LIMIT $offset, $numsOnPage";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
}
