<?php
require_once "mvc/entity/e_hang.php";
require_once "mvc/config/database.php";

// Kiểm tra xem yêu cầu Ajax đã được gửi chưa
if (isset($_GET['hang'])) {
    // Lấy tên hãng từ yêu cầu Ajax
    $tenHang = $_GET['hang'];
    
    // Thực hiện truy vấn để lấy danh sách sản phẩm của hãng được chọn
    $query = "SELECT SanPham.MaSP, SanPham.TenSP, SanPham.DonGia, SanPham.HinhAnh, SanPham.MoTa
              FROM SanPham
              INNER JOIN Hang ON SanPham.MaHang = Hang.MaHang
              WHERE Hang.TenHang = '$tenHang'";
              
    // Thực hiện truy vấn và lấy kết quả
    $result = $conn->query($query);

    // Kiểm tra nếu có kết quả trả về
    if ($result->num_rows > 0) {
        // Khởi tạo mảng để chứa kết quả
        $products = array();

        // Lặp qua các hàng kết quả và thêm vào mảng
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        // Trả về kết quả dưới dạng JSON
        echo json_encode($products);
    } else {
        // Trường hợp không có sản phẩm nào của hãng được chọn
        echo json_encode(array('message' => 'Không có sản phẩm nào cho hãng này.'));
    }
} else {
    // Trường hợp không có yêu cầu Ajax được gửi
    echo json_encode(array('message' => 'Không có yêu cầu Ajax.'));
}
?>
