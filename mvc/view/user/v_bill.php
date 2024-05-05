<!DOCTYPE html> 
<?php 
    require_once "mvc/controller/c_admin.php";
    $controller = new c_bill();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/bill.css">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <title>Hóa đơn</title>
</head>
<body>
    <section>
        <div class="infor_column">
            <div class="img_text">
                <div>
                    <img class="infor_img" src="/web2/public/data/banner1.jpg" alt=""><br>
                </div>
                <div class="infor_text">
                    <p>Danh2003</p>
                </div>
            </div>
            <div class="infor_personal">
                <img src="/web2/public/data/address.png" alt="">
                <a href="">Địa chỉ</a>
            </div>
            <div class="infor_personal">
                <img src="/web2/public/data/discount.png" alt="">
                <a href="">Khuyến mãi</a>
            </div>
            <div class="infor_personal">
                <img src="/web2/public/data/bill.png" alt="">
                <a href="">Hóa đơn</a>
            </div>
        </div>
        <div class="infor_bill">
            <h2 class="title_name">Hóa đơn khách hàng</h2>
            <div class="bill">
                <?php echo($controller->getAllbills());?> 


                <!-- <?php 
                $data = $controller->getAllbills();
                echo $data;

                // foreach($data as $bill){
                //     echo '<div class="bill_items2">
                //         <div class="bill_details">
                //             <div class="id_bill">
                //                 <p>' . $bill->getMaHD() . '</p>
                //             </div>
                //             <button>Xem chi tiết</button>
                //         </div>
                //         <div class="bill_product">
                //             <img class="img_product" src="/web2/public/data/banner1.jpg" alt="">
                //             <div class="product_infor">
                //                 <p>Rolex Pro . </p>
                //                 <p>Số lượng 1 . </p>
                //             </div>
                //         </div>
                //         <div class="bill_total">
                //             <div class="bill_time">
                //                 <p>Ngày Lập: ' . $bill->getNgayLap() . '</p>
                //                 <p>Hình thức thanh toán: ' . $bill->getHinhThucTra() . '</p>
                //             </div>
                //             <div class="bill_tong">
                //                 <p>Trạng thái: Đã giao</p>
                //                 <p>Thành tiền: ' . $bill->getTongGiaGoc() . '</p>
                //             </div>
                //         </div>
                //     </div>';
                // }
                
                ?> -->
                <!-- <div class="bill_items2">
                    <div class="bill_details">
                        <div class="id_bill">
                            <p>HD001</p>
                        </div>
                        <button>Xem chi tiết</button>
                    </div>
                    <div class="bill_product">
                        <img class="img_product" src="/web2/public/data/banner1.jpg" alt="">
                        <div class="product_infor">
                            <p>Rolex pro</p>
                            <p>Số lượng 1</p>
                        </div>
                    </div>
                    <div class="bill_total">
                        <div class="bill_time">
                            <p>Ngày Lập: 01/01/2000</p>
                            <p>Hình thức thanh toán: Momo</p>
                        </div>
                        <div class="bill_tong">
                            <p>Trạng thái: Đã giao hàng</p>
                            <p>Thành tiền: 5.000.000đ</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <?php require "mvc/view/absolutePart/footer.php"; ?>
</body>
</html>