<?php

class m_customer{
    protected $sql;
    public function __construct()
    {
        require 'mvc/config/database.php';
        require 'mvc/entity/e_khachhang.php';
        $this->sql = new database();
    }

    public function getUser_byid($id){
        try {
            $conn=$this->sql->connect();
            $query = "SELECT * from khachhang WHERE MaKH = '" . $id . "'";
            $data = $conn->query($query);
            $arr = array();
            if ($data->num_rows > 0) {
                while ($row = $data->fetch_assoc()) {
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
            $conn->close();
            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return null;
        }
    }

    public function update_info($arr){
        try{
            $conn = $this->sql->connect();

            $query = "UPDATE khachhang SET 
            TenKH = '".$arr[0]."',
            DiaChi = '".$arr[1]."',
            NgaySinh = '".$arr[2]."',
            Email = '".$arr[3]."',
            SDT = '".$arr[4]."'
            WHERE MaKH = 'KH001'";
            
            $result = $conn->query($query);
            $conn->close();
            
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }

    public function save_info($arr){
        try{
            $conn = $this->sql->connect();

            $query = "UPDATE khachhang SET 
            TenKH = '".$arr."' 
            WHERE MaKH = 'KH001'";

            $result = $conn->query($query);
            $conn->close();

            return $result; 
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
            $conn->close();
            return false;
        }
    }
    
}

?>