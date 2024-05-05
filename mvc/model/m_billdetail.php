<?php

class m_billdetail{

    protected $conn;

    public function __construct(){
        require 'mvc/config/database.php';
        require 'mvc/model/e_cthoadon.php';
        $this->conn = connect();
    }

    public function getAllbillsdetail(){
        try {
            $query = "select * from cthoadon";
            $data = $this->conn->query($query);
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

            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            return null;
        }
    }

    public function getBilldetail_byMaHD($MaHD){
        try {
            $query = "SELECT * FROM cthoadon WHERE MaHD = '". $MaHD ."'";
            $data = $this->conn->query($query);
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
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            return null;
        }
    }
}