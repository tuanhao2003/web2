<?php

class m_bill{

    protected $sql;
    public function __construct(){
        require 'mvc/config/database.php';
        require_once 'mvc/entity/e_hoadon.php';
        require_once 'mvc/entity/e_giaohang.php';
        require_once 'mvc/entity/e_cthoadon.php';
        $this->sql = new database();
    }

    public function getAllbills(){
        try {
            $conn = $this->sql->connect();
            $query = "select * from hoadon";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setNgayLap($row["NgayLap"]);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $entity->setHinhThucTra($row["HinhThucTra"]);
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

    public function getbillid($ma){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM hoadon WHERE MaHD = '". $ma ."'";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setNgayLap($row["NgayLap"]);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $entity->setHinhThucTra($row["HinhThucTra"]);
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
    
    public function getDeliveryInfo($maHD){
        try {
            $conn = $this->sql->connect();
            $query = "SELECT * FROM giaohang WHERE MaHD = '". $maHD ."'";
            $data = $conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_giaohang();
                    $entity->setMaVanDon($row["MaVanDon"]);
                    $entity->setNgayGiao($row["NgayGiao"]);
                    $entity->setTinhTrang($row["TinhTrang"]);
                    $entity->setDiaDiem($row["DiaDiem"]);
                    $entity->setMaHoaDon($row["MaHD"]);
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
    
    public function getBilldetail_byMaHD_inHD($MaHD){
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

    public function getProductName_byMaSP_inHD($MaSP){
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
 
}
?>