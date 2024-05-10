<?php
require_once "mvc/entity/e_hang.php";
require_once "mvc/config/database.php";

class m_hang {
    protected $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect();
    }

    public function getHangList(){
        $query = "SELECT * FROM Hang WHERE MaHang IN (SELECT DISTINCT MaHang FROM SanPham)";
        $result = $this->conn->query($query);
        $hangs = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $hang = new e_hang();
                $hang->setMaHang($row['MaHang']);
                $hang->setTenHang($row['TenHang']);
                $hangs[] = $hang;
            }
        }
        return $hangs;
    }
}
?>
