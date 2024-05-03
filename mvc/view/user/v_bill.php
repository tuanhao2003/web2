<!DOCTYPE html> 
<?php 
    require_once "mvc/controller/c_admin.php";
    $controller = new c_bill();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/bill1.css">
    <!-- <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css"> -->
    <title>Hóa đơn</title>
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
        <div class="infor_bill">
            <h2 class="title_name">Hóa đơn khách hàng</h2>
            <div class="bill">
                <!-- <div class="bill_items">
                    <img class="bill_img_item" src="public/data/banner1.jpg" alt="">
                    <div class="bill_items_infor">
                        <div class="Name_product">
                            <p>Rolex Pro</p>
                        </div>
                        <div class="Date_buy">
                            <p>Ngày mua: </p>
                            <p>01/01/2000</p>
                        </div>
                        <div class="Date_delivery">
                            <p>Ngày giao: </p>
                            <p>01/01/2000</p>
                        </div>
                        <div class="total">
                            <p class="money_title">Thành tiền: </p>
                            <p class="money">10.000.000đ</p>
                        </div>
                    </div>
                </div> -->
                <?php echo($controller->getAllbills());?> 
                <div class="bill_items2">
                    <div class="bill_details">
                        <div class="id_bill">
                            <p>HD001</p>
                        </div>
                        <button>Xem chi tiết</button>
                    </div>
                    <div class="bill_product">
                        <img class="img_product" src="public/data/banner1.jpg" alt="">
                        <div class="product_infor">
                            <p>Rolex pro</p>
                            <p>Số lượng 1</p>
                        </div>
                    </div>
                    <div class="bill_total">
                        <div class="bill_time">
                            <p>Ngày đặt: 01/01/2000</p>
                            <p>Ngày giao: 02/02/2002</p>
                        </div>
                        <div class="bill_tong">
                            <p>Trạng thái: Đã giao hàng</p>
                            <p>Thành tiền: 5.000.000đ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>
    
        
    <?php require "mvc/view/absolutePart/footer.html"; ?>
</body>
</html>