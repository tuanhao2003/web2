<?php
require_once '/mvc/config/database.php'; // Import file chứa lớp database

class ProductList extends database
{
    public function getProducts()
    {
        $conn = $this->connect(); // Kết nối đến cơ sở dữ liệu

        $sql = "SELECT * FROM SanPham"; // Truy vấn danh sách sản phẩm
        $result = $conn->query($sql);

        $products = array(); // Mảng chứa danh sách sản phẩm

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Thay đổi đường dẫn tới hình ảnh
                $row['HinhAnh'] = '/public/data/SanPham/' . $row['HinhAnh'];
                $products[] = $row;
            }
        }

        $conn->close(); // Đóng kết nối

        return $products; // Trả về danh sách sản phẩm
    }
}

// Sử dụng hàm truy vấn để lấy danh sách sản phẩm
$productList = new ProductList();
$products = $productList->getProducts();

// In danh sách sản phẩm (ví dụ)
foreach ($products as $product) {
    echo "Mã SP: " . $product['MaSP'] . "<br>";
    echo "Tên SP: " . $product['TenSP'] . "<br>";
    echo "Đơn giá: " . $product['DonGia'] . "<br>";
    echo "Hình ảnh: " . $product['HinhAnh'] . "<br>";
    echo "Mô tả: " . $product['MoTa'] . "<br>";
    echo "<hr>";
}
?>
