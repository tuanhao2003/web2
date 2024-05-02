<?php

class m_admin {
    protected $conn;
    public function __construct() {
        require 'mvc/config/database.php';
        require 'mvc/model/e_sanpham.php';
        $this->conn = connect();
    }

    public function getAllProducts(){
        try {
            $query = "select * from sanpham";
            $data = $this->conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while($row = $data->fetch_assoc()){
                    $entity = new e_sanpham();
                    $entity->setMasp($row["MaSP"]);
                    $entity->setTensp($row["TenSP"]);
                    $entity->setDonGia($row["DonGia"]);
                    $entity->setGiaBan($row["GiaBan"]);
                    $entity->setSoLuong($row["SoLuong"]);
                    $entity->setHinhAnh($row["HinhAnh"]);
                    $entity->setTrangThaiTonTai($row["TrangThaiTonTai"]);
                    $entity->setMaHang($row["MaHang"]);
                    $arr[] = $entity;
                }
            }
            
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            return null;
        }
    }

    public function getAllUsers(){
        try {
            $query = "select * from khachhang";
            $data = $this->conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while($row = $data->fetch_assoc()){
                    $entity = new e_khachhang();
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setTenKH($row["TenKH"]);
                    $entity->setDiaChi($row["DiaChi"]);
                    $entity->setngaySinh($row["NgaySinh"]);
                    $entity->setEmail($row["Email"]);
                    $entity->setSdt($row["SDT"]);
                    $entity->setMaTK($row["MaTK"]);
                    $arr[] = $entity;
                }
            }
            
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            return null;
        }
    }
}
?>