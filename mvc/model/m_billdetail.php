<?php

class m_billdetail{

    protected $sql;

    public function __construct(){
        require 'mvc/config/database.php';
        require 'mvc/entity/e_cthoadon.php';
        require 'mvc/entity/e_hoadon.php';
        require 'mvc/entity/e_giaohang.php';
        require 'mvc/entity/e_khachhang.php';
        $this->sql = new database();
    }

    public function getAllbillsdetail(){
        try {
            $conn= $this->sql->connect();
            $query = "select * from cthoadon";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_cthoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaSP($row["MaSP"]);
                    $entity->setSoLuong($row["SoLuong"]);
                    $entity->setGiaTien($row["GiaTien"]);
                    $arr[] = $entity;
                }
            }

            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getBilldetail_byMaHD($MaHD){
        try {
            $conn= $this->sql->connect();
            $query = "SELECT * FROM cthoadon WHERE MaHD = '". $MaHD ."'";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_cthoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaSP($row["MaSP"]);
                    $entity->setSoLuong($row["SoLuong"]);
                    $entity->setGiaTien($row["GiaTien"]);
                    $arr[] = $entity;
                }
            }
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getProductName_byMaSP($MaSP){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT cthd.MaHD, sp.TenSP 
                      FROM cthoadon cthd 
                      INNER JOIN sanpham sp ON cthd.MaSP = sp.MaSP 
                      WHERE cthd.MaSP = '$MaSP'";
                      
            $data = $conn->query($query);
            $productName = null;
            if($data->num_rows > 0){
                $row = $data->fetch_assoc();
                $productName = $row["TenSP"];
            }
            $conn->close();
            return $productName;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getProductInfo_byMaSP($MaSP){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT sp.*, cthd.SoLuong, cthd.GiaTien
                      FROM sanpham sp 
                      INNER JOIN cthoadon cthd ON sp.MaSP = cthd.MaSP
                      WHERE sp.MaSP = '$MaSP'";

            $data = $conn->query($query);
            $productInfo = null;
            if($data->num_rows > 0){
                $row = $data->fetch_assoc();
                $productInfo = $row;
            }
            $conn->close();
            return $productInfo;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    
    public function getbillid_fromdetail($ma){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM hoadon WHERE MaHD = '". $ma ."'";
            $data = $conn->query($query);
            $entity = new e_hoadon();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {

                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setNgayLap($row["NgayLap"]);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $entity->setHinhThucTra($row["HinhThucTra"]);

                }
            }

            $conn->close();
            return $entity;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getDeliveryInfo($maHD){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM giaohang WHERE MaHD = '". $maHD ."'";
            $data = $conn->query($query);
            $entity = new e_giaohang();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {

                    $entity->setMaVanDon($row["MaVanDon"]);
                    $entity->setNgayGiao($row["NgayGiao"]);
                    $entity->setTinhTrang($row["TinhTrang"]);
                    $entity->setDiaDiem($row["DiaDiem"]);
                    $entity->setMaHoaDon($row["MaHD"]);
                    $arr[] = $entity;

                }
            }
    
            $conn->close();
            return $entity;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function getCustomerInfoFromBill($maHD){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT khachhang.* 
                      FROM khachhang 
                      INNER JOIN hoadon ON khachhang.MaKH = hoadon.MaKH 
                      WHERE hoadon.MaHD = '". $maHD ."'";
            $data = $conn->query($query);
            $entity = new e_khachhang();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setTenKH($row["TenKH"]);
                    $entity->setDiaChi($row["DiaChi"]);
                    $entity->setngaySinh($row["NgaySinh"]);
                    $entity->setEmail($row["Email"]);
                    $entity->setSdt($row["SDT"]);
                    $entity->setMaTK($row["MaTK"]);
                    
                }
            }
    
            $conn->close();
            return $entity;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }
    
    
}