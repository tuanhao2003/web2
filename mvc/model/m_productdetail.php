<?php

require_once "mvc/entity/e_sanpham.php";
require_once "mvc/config/database.php";
require_once "mvc/entity/e_giohang.php";

class m_productdetail {
    protected $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect();
    }

    public function getProductDetail($masp) {
        $query = "SELECT * FROM SanPham WHERE MaSp = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $masp); // Sử dụng 's' để định dạng cho chuỗi
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sanpham = new e_sanpham();
            
            // Kiểm tra xem các phần tử có tồn tại trong mảng $row hay không
            if (isset($row['MaSP'])) {
                $sanpham->setMasp($row['MaSP']);
            }
            if (isset($row['TenSP'])) {
                $sanpham->setTensp($row['TenSP']);
            }
            if (isset($row['DonGia'])) {
                $sanpham->setDonGia($row['DonGia']);
            }
            if (isset($row['HinhAnh'])) {
                $sanpham->setHinhAnh($row['HinhAnh']);
            }
            if (isset($row['MoTa'])) {
                $sanpham->setMoTa($row['MoTa']);
            }
            
            return $sanpham;
        } else {
            return null;
        }
    }

    public function addToCart($maTK, $maSP, $quantity) {
        // Lấy mã khách hàng từ mã tài khoản
        $maKH = $this->getMaKH($maTK);

        // Nếu không tìm thấy mã khách hàng, không thêm vào giỏ hàng
        if($maKH == null) {
            return false;
        }

        // Thêm sản phẩm vào giỏ hàng
        for ($i = 0; $i < $quantity; $i++) {
            $query = "INSERT INTO GioHang (MaKH, MaSP) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ss", $maKH, $maSP);
            $result = $stmt->execute();
        }

        return $result;
    }

    // Phương thức để lấy mã khách hàng từ mã tài khoản
    private function getMaKH($maTK) {
        $query = "SELECT MaKH FROM KhachHang WHERE MaTK = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maTK);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['MaKH'];
        } else {
            return null;
        }
    }
}
?>
