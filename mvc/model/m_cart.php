<?php

require_once "mvc/config/database.php";
require_once "mvc/entity/e_giohang.php";

class m_cart {
    protected $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect();
    }


    public function getCartItems($maTK) {
        $query = "
            SELECT
                SP.TenSP AS TenSanPham,
                SP.DonGia AS DonGia,
                SP.HinhAnh AS HinhAnhSanPham,
                COUNT(GH.MaSP) AS SoLuong
            FROM
                GioHang GH
            INNER JOIN
                SanPham SP ON GH.MaSP = SP.MaSP
            INNER JOIN
                KhachHang KH ON GH.MaKH = KH.MaKH
            INNER JOIN
                TaiKhoan TK ON KH.MaTK = TK.MaTK
            WHERE
                TK.MaTK = ?
            GROUP BY
                SP.MaSP, SP.TenSP, SP.DonGia, SP.HinhAnh;";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maTK);
        $stmt->execute();
        $result = $stmt->get_result();

        $cartItems = [];
        while ($row = $result->fetch_assoc()) {
            $cartItems[] = [
                'TenSanPham' => $row['TenSanPham'],
                'DonGia' => $row['DonGia'],
                'HinhAnhSanPham' => $row['HinhAnhSanPham'],
                'SoLuong' => $row['SoLuong']
            ];
        }

        return $cartItems;
    }
}

?>
