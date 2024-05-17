<?php

class m_customer{
    protected $sql;
    public function __construct()
    {
        require_once 'mvc/config/database.php';
        require_once 'mvc/entity/e_khachhang.php';
        $this->sql = new database();
    }

    public function getUser_byid($id){
        try {
            $conn=$this->sql->connect();
            $query = "SELECT * from khachhang WHERE MaKH = '" . $id . "'";
            $data = $conn->query($query);
            $entity = new e_khachhang();
            if ($data->num_rows > 0) {
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

    public function save_info($userid, $name, $email, $diachi, $sdt, $ngaysinh) {
        echo "<script>alert('Thông tin đã qua model');</script>";
        try {
            $conn = $this->sql->connect();
            echo "<script>alert('".$userid."');</script>";
            
            // Sử dụng câu lệnh chuẩn bị trước để ngăn ngừa SQL injection
            $query = "UPDATE khachhang SET 
                TenKH = ?, 
                DiaChi = ?, 
                NgaySinh = ?, 
                Email = ?, 
                SDT = ?
                WHERE MaKH = ?";
            
            $stmt = $conn->prepare($query);
            if ($stmt) {
                $stmt->bind_param("ssssss", $name, $diachi, $ngaysinh, $email, $sdt, $userid);
                $result = $stmt->execute();
                $stmt->close();
                echo "<script>alert('Thông tin đã update');</script>";
                return $result; 
            } else {
                throw new Exception("Failed to prepare statement");
            }
        } catch (Exception $e) {
            echo "<script>alert('".$e->getMessage()."');</script>";
            if (isset($conn)) {
                $conn->close();
            }
            return false;
        }
    }
    

    
}

?>