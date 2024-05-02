<?php
require 'mvc.config/database.php';

class m_bill{
    public function __construct(){}

    public function get_bill_list($bill_id){
        $conn = connect();

        $sql = "SELECT * FROM Hoadon WHERE MaHD == '' AND MaKH == '' "
        
        $result = mysqli_query($conn, $sql);
    
        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        }

       $conn->close();
    }
}