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

    public function getAllProducts($user)
    {
        try {
            $idNguoiDung = empty($user) ? NULL : $user['id'];
            $sql = "SELECT san_phams.*, COUNT(DISTINCT danh_gias.id) AS so_danh_gia, AVG(danh_gias.sao) AS so_sao, MIN(hinh_anhs.hinh_anh) AS url,
            CASE 
                WHEN san_pham_yeu_thichs.id_nguoi_dung IS NOT NULL THEN 1 
                ELSE 0 
            END AS is_favorite
            FROM san_phams 
            LEFT JOIN hinh_anhs ON hinh_anhs.id_san_pham = san_phams.id 
            LEFT JOIN danh_gias ON danh_gias.id_san_pham = san_phams.id 
            LEFT JOIN san_pham_yeu_thichs on san_phams.id = san_pham_yeu_thichs.id_san_pham and san_pham_yeu_thichs.id_nguoi_dung = :id_nguoi_dung
            WHERE san_phams.trang_thai = 2 
            GROUP BY san_phams.id LIMIT 8";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }
    public function getNewProducts()
    {
        try {

            $sql = "SELECT san_phams.*, danh_gias.sao, COUNT(DISTINCT danh_gias.id) AS so_danh_gia, AVG(danh_gias.sao) AS so_sao, MIN(hinh_anhs.hinh_anh) AS url 
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

            $sql = "SELECT 
            san_phams.*,
            SUM(chi_tiet_don_hangs.so_luong) AS tong_so_luong_ban,
            COUNT(DISTINCT danh_gias.id) AS so_danh_gia,
            AVG(danh_gias.sao) AS so_sao,
            (SELECT hinh_anh FROM hinh_anhs WHERE hinh_anhs.id_san_pham = san_phams.id LIMIT 1) AS url
            FROM san_phams
            JOIN chi_tiet_don_hangs ON chi_tiet_don_hangs.id_san_pham = san_phams.id 
            JOIN don_hangs ON don_hangs.id = chi_tiet_don_hangs.id_don_hang 
            JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.id_trang_thai_don_hang 
            LEFT JOIN danh_gias ON danh_gias.id_san_pham = san_phams.id 
            WHERE san_phams.trang_thai = 2 AND trang_thai_don_hangs.ten = 'Thành công' 
            GROUP BY san_phams.id 
            ORDER BY tong_so_luong_ban DESC LIMIT 6;
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

    public function getPaginationListProductFilter($category, $search, $min, $max, $offset, $numsOnPage, $arrange, $user)
    {
        try {
            $idUser = empty($user) ? NULL : $user['id'];

            $sql = "SELECT danh_mucs.ten as ten_danh_muc, san_phams.*, MIN(hinh_anhs.hinh_anh) AS url , 
			CASE 
                WHEN san_pham_yeu_thichs.id_nguoi_dung IS NOT NULL THEN 1 
                ELSE 0 
            END AS is_favorite
            FROM hinh_anhs JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id JOIN danh_mucs on danh_mucs.id = san_phams.danh_muc_id LEFT JOIN san_pham_yeu_thichs on san_phams.id = san_pham_yeu_thichs.id_san_pham and san_pham_yeu_thichs.id_nguoi_dung = :id_nguoi_dung
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
                $sql .= " AND san_phams.ten LIKE '%$search%'";
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

            $stmt->bindParam(":id_nguoi_dung", $idUser);

            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    // public function getProductById($id)
    // {
    //     try {

    //         $sql = "SELECT * FROM san_phams WHERE id = :id  ";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':id', $id);
    //         $stmt->execute();
    //         return $stmt->fetch();
    //     } catch (PDOException $e) {
    //         echo "Lỗi : " . $e->getMessage();
    //     }
    // }

    public function getCommentByProduct($id)
    {
        try {

            $sql = "SELECT * FROM binh_luans JOIN nguoi_dungs on binh_luans.id_nguoi_dung = nguoi_dungs.id
             WHERE id_san_pham = :id  and binh_luans.trang_thai = 2";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getReviewByProduct($id)
    {
        try {

            $sql = "SELECT * FROM danh_gias JOIN nguoi_dungs ON danh_gias.id_nguoi_danh_gia = nguoi_dungs.id
             WHERE id_san_pham = :id  ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getProductByCategory($id)
    {
        try {
            $sql = "SELECT san_phams.*, MIN(hinh_anhs.hinh_anh) AS url 
            FROM hinh_anhs JOIN san_phams ON hinh_anhs.id_san_pham = san_phams.id 
            WHERE danh_muc_id = :id and san_phams.trang_thai = 2 
            GROUP BY hinh_anhs.id_san_pham LIMIT 5";

            // $sql = "SELECT * FROM san_phams WHERE danh_muc_id = :id  LIMIT 5";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getImagesByProduct($id)
    {
        try {
            $sql = "SELECT * FROM hinh_anhs WHERE id_san_pham = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function checkLikeProduct($idNguoiDung, $idSanPham)
    {
        try {
            $sql = "SELECT * FROM san_pham_yeu_thichs WHERE id_nguoi_dung = :id_nguoi_dung 
                                                  AND id_san_pham = :id_san_pham ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);
            $stmt->bindParam(":id_san_pham", $idSanPham);

            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getNumberLikeProduct($idSanPham)
    {
        try {
            $sql = "SELECT * FROM san_pham_yeu_thichs WHERE id_san_pham = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $idSanPham);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    public function getNumberReviewProduct($idSanPham)
    {
        try {
            $sql = "SELECT * FROM danh_gias WHERE id_san_pham   = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $idSanPham);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "Lỗi : " . $e->getMessage();
        }
    }

    // public function getListLikeProduct($idNguoiDung)
    // {
    //     try {
    //         $sql = "SELECT * FROM san_pham_yeu_thichs WHERE id_nguoi_dung = :id_nguoi_dung";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(":id_nguoi_dung", $idNguoiDung);

    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     } catch (PDOException $e) {
    //         echo "Lỗi : " . $e->getMessage();
    //     }
    // }
}
