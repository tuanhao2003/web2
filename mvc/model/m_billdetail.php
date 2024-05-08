<?php

class m_billdetail{

    protected $sql;

    public function __construct(){
        require 'mvc/config/database.php';
        require 'mvc/entity/e_cthoadon.php';
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
    
    
    
}