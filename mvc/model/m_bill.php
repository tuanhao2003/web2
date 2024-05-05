<?php

class m_bill{

    protected $sql;
    public function __construct(){
        require 'mvc/config/database.php';
        require 'mvc/entity/e_hoadon.php';
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

    // public function get_bill_list($bill_id){
    //     $conn = connect();

    //     $sql = "SELECT * FROM Hoadon WHERE MaHD == '' AND MaKH == '' "
        
    //     // $result = mysqli_query($conn, $sql);
    
    //     if (!$result) {
    //         echo "Error: " . mysqli_error($conn);
    //     }

    //    $conn->close();
    // }
}
?>