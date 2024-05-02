<?php

class m_bill{

    protected $conn;
    public function __construct(){
        require 'mvc/config/database.php';
        require 'mvc/model/e_hoadon.php';
        $this->conn = connect();
    }

    public function getAllbills(){
        try {
            $query = "select * from hoadon";
            $data = $this->conn->query($query);
            $arr = array();
            if($data->num_rows > 0){
                while ($row = $data->fetch_assoc()) {
                    $entity = new e_hoadon();
                    $entity->setMaHD($row["MaHD"]);
                    $entity->setMaKH($row["MaKH"]);
                    $entity->setNgayLap($row["NgayLap"]);
                    $entity->setNgayXuat($row["NgayXuat"]);
                    $entity->setTongGiaGoc($row["TongGiaGoc"]);
                    $entity->setTongGiaSauGiam($row["TongGiaSauGiam"]);
                    $arr[] = $entity;
                }
            }

            return $arr;
        } catch (Exception $e) {
            echo "<script>alert('$e');</script>";
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