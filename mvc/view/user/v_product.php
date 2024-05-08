<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sản phẩm</title>
    <link rel="stylesheet" href="public/css/productstyle.css">
</head>
<body>
    <div class="container">
        <h2>Danh mục sản phẩm</h2>
        <div class="product-grid">
            <?php $count = 0; ?>
            <?php foreach ($products as $product): ?>
                <?php if ($count % 3 == 0): ?>
                    <div class="product-row">
                <?php endif; ?>
                <div class="product-item">
                    <img src="public/data/SanPham/<?php echo $product['HinhAnh']; ?>" alt="<?php echo $product['TenSP']; ?>">
                    <h3><?php echo $product['TenSP']; ?></h3>
                    <p>Giá: <?php echo number_format($product['DonGia']); ?> VNĐ</p>
                    <p><?php echo $product['MoTa']; ?></p>
                </div>
                <?php if (($count + 1) % 3 == 0 || ($count + 1) == count($products)): ?>
                    </div>
                <?php endif; ?>
                <?php $count++; ?>
            <?php endforeach; ?>
        </div>
        <!-- Pagination -->
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" <?php if ($currentPage == $i) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>
    <script src="public/js/product.js"></script>
</body>
</html>
