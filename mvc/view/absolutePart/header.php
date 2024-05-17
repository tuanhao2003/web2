<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .text{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .text span{
        padding:12px;
        font-weight: 500;
    }
    .offcanvas-body span{
        padding:10px;
        font-size: 10px;
        
    }
</style>
<header>
    <div class="navBar">
        <div class="logo">
            <a href="" class="logol">Watch<span>Point</span></a>
        </div>

        <div class="searchBar">
            <div class="d-flex">
                <div class="searchIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0  5.5 5.5 0 0 1 11 0" />
                    </svg>
                </div>
                <div class="searchBoxContainer">
                    <input type="text" id="searchBox">
                    <div class="hideBox">
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <ul class="list-style-none">
            <li>Home</li>
            <li>About Us</li>
            <li>Product</li>
            <li>Contact Us</li>
            <li>News</li>
            <li class="showcart">
                <a href="#" id="showCartBtn" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart">>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1-4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1-4 0 2 2 0 0 1-4 0" />
                    </svg>
                </a>
            </li>
            <?php include "loginStatus.php" ?>
        </ul>
    </div>
</header>

<div class="offcanvas offcanvas-end" id="cart">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title">Giỏ hàng</h1>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="d-flex justify-content:center text">
        <li class="W-100 jutify-content:space-between">
            <span>Hình ảnh</span>
            <span>Sản phẩm</span>
            <span>Giá tiền</span>
            <span>Số lượng</span>
        </li>
    </div>
    <div class="offcanvas-body">
    </div>
    <button class="btn btn-secondary" type="button">THANH TOÁN</button>
</div>

<?php
require_once "mvc/controller/c_cart.php";
?>
<?php
$controller = new c_cart();
$cartItems = $controller->getCartItems();
?>

<script>
    document.getElementById('showCartBtn').addEventListener('click', function(event) {
        event.preventDefault();
        let cartHtml = '';
        cartHtml += '<ul>';
        let data = <?php echo json_encode($cartItems); ?>;
        data.forEach(item => {
            cartHtml += `<li>
                        <span><img style='width:50px; height: 50px;' src='public/data/Sanpham/${item.HinhAnhSanPham}' alt='${item.TenSanPham}'></span>
                        <span>${item.TenSanPham}</span>
                        <span>${item.DonGia*item.SoLuong} VND</span>
                        <span>${item.SoLuong}</span>
                    </li>`;
        });
        cartHtml += '</ul>';
        document.querySelector('#cart .offcanvas-body').innerHTML = cartHtml;
    });
</script>