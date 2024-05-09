<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="public/css/productstyle.css"> <!-- Đặt đường dẫn thích hợp tới file CSS -->
</head>
<body>
    <h1>Danh mục sản phẩm</h1>
    <div class="product-container">
        <?php
        require_once "mvc/controller/c_product.php";

        // Lấy trang hiện tại từ cookie nếu có, nếu không sẽ sử dụng trang đầu tiên
        $currentPage = isset($_COOKIE["paramObj"]) ? json_decode($_COOKIE["paramObj"])->page : 1;

        // Tạo đối tượng controller và truyền trang hiện tại vào
        $controller = new c_product(null, $currentPage);

        // Lấy danh sách sản phẩm từ controller
        $products = $controller->getProducts();

        // Hiển thị sản phẩm
        foreach ($products as $product) {
            ?>
            <div class="product-card">
                <img src="public/data/Sanpham/<?php echo $product->getHinhAnh(); ?>" alt="<?php echo $product->getTensp(); ?>">
                <div class="product-info">
                    <div class="product-name"><?php echo $product->getTensp(); ?></div>
                    <div class="product-price"><?php echo number_format($product->getDonGia(), 0, ',', '.'); ?> VND</div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Phân trang -->
    <div class="pagination">
        <?php
        // Tính tổng số trang
        $totalPages = $controller->getTotalPages();

        // Hiển thị nút "Trang trước" nếu không phải trang đầu tiên
        if ($currentPage > 1) {
            echo '<a href="?page='.($currentPage - 1).'" onclick="updateCookie('.($currentPage - 1).')">Trang trước</a>';
        }

        // Hiển thị các trang
        for ($i = 1; $i <= $totalPages; $i++) {
            // Đặt class "active" cho trang hiện tại
            $activeClass = ($currentPage == $i) ? "active" : "";
            echo '<a class="'.$activeClass.'" href="?page='.$i.'" onclick="updateCookie('.$i.')">'.$i.'</a>';
        }

        // Hiển thị nút "Trang kế" nếu không phải trang cuối cùng
        if ($currentPage < $totalPages) {
            echo '<a href="?page='.($currentPage + 1).'" onclick="updateCookie('.($currentPage + 1).')">Trang kế</a>';
        }
        ?>
    </div>

    <!-- JavaScript để cập nhật cookie khi chuyển trang -->
    <script>
        function updateCookie(page) {
            document.cookie = 'paramObj={"page":'+page+'}; path=/';
        }
    </script>
</body>
</html>
