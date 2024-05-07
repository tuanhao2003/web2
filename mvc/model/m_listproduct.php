<?php
require_once('mvc/config/database.php');

class m_listproduct {
    public function getProducts($offset, $limit) {
        $db = new database();
        $conn = $db->connect();
    
        $sql = "SELECT * FROM sanpham LIMIT ?, ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        
        $stmt->close();
        $conn->close();
        
        return $products;
    }
    

    public function getTotalProducts() {
        $db = new database();
        $conn = $db->connect();

        $sql = "SELECT COUNT(*) AS total FROM sanpham";
        $result = $conn->query($sql);
        $total = $result->fetch_assoc()['total'];

        $conn->close();

        return $total;
    }
}
?>
