<!DOCTYPE html> 
<?php 
    require_once "mvc/controller/c_admin.php";
    $controller = new c_billdetail();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/bill1.css">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <title>Chi tiết Hóa đơn</title>
</head>
<body>

<section>
        <div class="infor_column">
            <div class="img_text">
                <div>
                    <img class="infor_img" src="public/data/banner1.jpg" alt=""><br>
                </div>
                <div class="infor_text">
                    <p>Danh2003</p>
                </div>
            </div>
            <div class="infor_personal">
                <img src="public/data/address.png" alt="">
                <a href="">Địa chỉ</a>
            </div>
            <div class="infor_personal">
                <img src="public/data/discount.png" alt="">
                <a href="">Khuyến mãi</a>
            </div>
            <div class="infor_personal">
                <img src="public/data/bill.png" alt="">
                <a href="">Hóa đơn</a>
            </div>
        </div>
        <div class="infor_bill_detail">

            <div class="title_detail">
                <h2 class="title_name">Chi tiết Hóa đơn</h2>
            </div>
            
            <div class="bill_time_infor">
                <p>Mã hóa đơn: HD001</p>
                <p>Ngày đặt: 01/01/2000</p>
                <p>Ngày giao: 02/02/2002</p>
            </div>

            <div class="all_product">
                <div class="product">
                    <div class="img_product">
                        <img class="img_product" src="public/data/banner1.jpg" alt="">
                    </div>
                    <div class="infor_product">
                        <p>Apple Watch</p>
                        <p>Số lượng 1</p>
                    </div>
                    <div class="price">
                        <p>Giá: 5.000.000đ</p>
                    </div>
                </div>
                <div class="product">
                    <div class="img_product">
                        <img class="img_product" src="public/data/banner1.jpg" alt="">
                    </div>
                    <div class="infor_product">
                        <p>Apple Watch</p>
                        <p>Số lượng 1</p>
                    </div>
                    <div class="price">
                        <p>Giá: 5.000.000đ</p>
                    </div>
                </div>
            </div>

            <div class="total_price">
                <p>
                    Thành tiền: 10.000.000đ
                </p>
            </div>
        </div>
</section>
<?php require "mvc/view/absolutePart/footer.html"; ?>
</body>
</html>