<?php

require_once "mvc/entity/e_sanpham.php";
require_once "mvc/config/database.php";

class m_product {
    protected $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect();
    }

    public function getListProductPaginated($start, $limit){
        $query = "SELECT * FROM SanPham LIMIT $start, $limit";
        $result = $this->conn->query($query);
        $products = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product = new e_sanpham();
                $product->setMasp($row['MaSP']);
                $product->setTensp($row['TenSP']);
                $product->setDonGia($row['DonGia']);
                $product->setMoTa($row['MoTa']);
                $product->setHinhAnh($row['HinhAnh']);
                $product->setTrangThaiTonTai($row['TrangThaiTonTai']);
                $product->setMaHang($row['MaHang']);
                $products[] = $product;
            }
        }
        return $products;
    }

    // Phương thức để lấy tổng số sản phẩm
    public function getTotalProducts($tenHang = null) {
        $query = "SELECT COUNT(*) AS total FROM SanPham";
        if ($tenHang) {
            $query .= " INNER JOIN Hang ON SanPham.MaHang = Hang.MaHang WHERE Hang.TenHang = '$tenHang'";
        }
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    

    public function getFilteredProductsByHang($start, $limit, $tenHang) {
        $query = "SELECT SanPham.MaSP, SanPham.TenSP, SanPham.DonGia, SanPham.HinhAnh, SanPham.TrangThaiTonTai, SanPham.MoTa, SanPham.MaHang 
                  FROM SanPham 
                  INNER JOIN Hang ON SanPham.MaHang = Hang.MaHang 
                  WHERE Hang.TenHang = '$tenHang' 
                  LIMIT $start, $limit";
        $result = $this->conn->query($query);
        $products = array();
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $product = new e_sanpham();
                $product->setMasp($row['MaSP']);
                $product->setTensp($row['TenSP']);
                $product->setDonGia($row['DonGia']);
                $product->setMoTa($row['MoTa']);
                $product->setHinhAnh($row['HinhAnh']);
                $product->setTrangThaiTonTai($row['TrangThaiTonTai']);
                $product->setMaHang($row['MaHang']);
                $products[] = $product;
            }
        }
        return $products;
    }
}
?>
