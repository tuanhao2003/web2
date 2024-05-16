<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <script src="/web2/public/js/index.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="public/css/productstyle.css"> <!-- Đặt đường dẫn thích hợp tới file CSS -->
</head>
<body>
    <?php include "mvc/view/absolutePart/header.php"; ?>
    <div class="title-container">
        <h1>DANH MỤC SẢN PHẨM</h1>
    </div>
        <!--Thêm mã PHP để lấy danh sách hãng từ controller-->
    <?php
        require_once "mvc/controller/c_product.php";
        $controller = new c_product(null, $currentPage);
        $hangs = $controller->getHangList();
    ?>

    <div class="content-container">
        <!-- Hiển thị danh sách hãng -->
        <div class="hang-container">
            <h2>DANH MỤC</h2>
            <ul>
                <?php
                // Kiểm tra xem trang hiện tại có phải là trang chưa được lọc hay không
                $activeClass = (!isset($_COOKIE["paramObj"]) || (isset($_COOKIE["paramObj"]) && !property_exists(json_decode($_COOKIE["paramObj"]), 'hang'))) ? "active" : "";
                ?>
                <li class="<?php echo $activeClass; ?>" onclick="resetFilter()">Tất cả</li>
                <?php foreach ($hangs as $hang): ?>
                    <?php
                    // Kiểm tra xem danh mục hãng hiện tại có phải là danh mục được chọn hay không
                    $activeClass = (isset($_COOKIE["paramObj"]) && property_exists(json_decode($_COOKIE["paramObj"]), 'hang') && json_decode($_COOKIE["paramObj"])->hang == $hang->getTenHang()) ? "active" : "";
                    ?>
                    <li class="<?php echo $activeClass; ?>" onclick="filterByHang('<?php echo $hang->getTenHang(); ?>')"><?php echo $hang->getTenHang(); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

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
                    <a href="http://localhost/web2/productdetail?masp=<?php echo $product->getMasp(); ?>">
                        <img src="public/data/Sanpham/<?php echo $product->getHinhAnh(); ?>" alt="<?php echo $product->getTensp(); ?>">
                        <div class="product-info">
                            <div class="product-name"><?php echo $product->getTensp(); ?></div>
                            <div class="product-price"><?php echo number_format($product->getDonGia(), 0, ',', '.'); ?> VND</div>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div class="pagination-container">
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
                echo '<a class="'.$activeClass.'" href="#" onclick="updateCookie('.$i.')">'.$i.'</a>';
            }

            // Hiển thị nút "Trang kế" nếu không phải trang cuối cùng
            if ($currentPage < $totalPages) {
                echo '<a href="?page='.($currentPage + 1).'" onclick="updateCookie('.($currentPage + 1).')">Trang kế</a>';
            }
            ?>
        </div>
    </div>
    <!-- JavaScript để cập nhật cookie khi chuyển trang -->
    <script>
        function updateCookie(page) {
            var hang = <?php echo isset($_COOKIE["paramObj"]) && property_exists(json_decode($_COOKIE["paramObj"]), 'hang') ? '"' . json_decode($_COOKIE["paramObj"])->hang . '"' : 'null'; ?>;
            if (hang) {
                document.cookie = 'paramObj={"page":' + page + ',"hang":"' + hang + '"}; path=/';
            } else {
                document.cookie = 'paramObj={"page":' + page + '}; path=/';
            }
            // Sau khi cập nhật cookie, chuyển trang đến trang mới
            window.location.href = 'http://localhost/web2/product?page=' + page;
        }
    </script>
    <script>
        function filterByHang(tenHang) {
            document.cookie = 'paramObj={"page":1,"hang":"' + tenHang + '"}; path=/'; // Cập nhật cookie với thông tin về hãng
            window.location.href = 'http://localhost/web2/product'; // Chuyển trang về trang chính
        }
    </script>
    <script>
        function resetFilter() {
            document.cookie = 'paramObj=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'; // Xóa cookie
            window.location.href = 'http://localhost/web2/product'; // Chuyển hướng về trang sản phẩm ban đầu
        }
    </script>

</body>
<?php include "mvc/view/absolutePart/footer.php"; ?>
</html>
