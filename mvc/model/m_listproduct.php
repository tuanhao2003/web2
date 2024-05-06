<?php
require_once('mvc/config/database.php');

class ListProductModel {
    public function getProducts($offset, $limit) {
        $db = new database();
        $conn = $db->connect();

        $sql = "SELECT * FROM sanpham LIMIT $offset, $limit";
        $result = $conn->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

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
