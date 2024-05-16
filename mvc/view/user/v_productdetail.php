<?php
require_once "mvc/controller/c_productdetail.php";

// Lấy mã sản phẩm từ URL
$masp = isset($_COOKIE['paramObj']) ? json_decode($_COOKIE['paramObj'])->masp : null;

// Tạo controller để lấy thông tin chi tiết của sản phẩm
$controller = new c_productdetail($masp);
$productDetail = $controller->getProductDetail();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/productdetailstyle1.css"> <!-- Đặt đường dẫn thích hợp tới file CSS -->
    <title>Chi tiết sản phẩm</title>
</head>
<body class="container">
    <h1>Chi tiết sản phẩm</h1>
    <div class="product-detail">
        <div class="product-image">
            <img src="public/data/Sanpham/<?php echo $productDetail->getHinhAnh(); ?>" alt="<?php echo $productDetail->getTensp(); ?>">
        </div>
        <div class="product-info">
            <h2><?php echo $productDetail->getTensp(); ?></h2>
            <p class="price"> <?php echo number_format($productDetail->getDonGia(), 0, ',', '.'); ?> VND</p>
            <!-- Nút tăng giảm số lượng -->
            <div class="quantity-control">
                <button onclick="decreaseQuantity()">-</button>
                <input type="number" id="quantity" value="1" min="1">
                <button onclick="increaseQuantity()">+</button>
            </div>
            <!-- Nút thêm vào giỏ hàng -->
            <button class="add-to-cart" onclick="addToCart('<?php echo $productDetail->getMasp(); ?>')">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <div class="product-description">
        <p>Mô tả: <?php echo $productDetail->getMoTa(); ?></p>
    </div>

    <script>
        // Hàm tăng giảm số lượng
        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        // Hàm thêm vào giỏ hàng
        function addToCart(masp) {
            var quantity = document.getElementById('quantity').value;
            // Thực hiện thêm sản phẩm vào giỏ hàng
            // Có thể sử dụng Ajax để gửi yêu cầu thêm vào giỏ hàng mà không cần tải lại trang
        }
    </script>
</body>
</html>
