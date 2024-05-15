<!DOCTYPE html> 
<?php 
    require_once "mvc/controller/c_admin.php";
    $controller = new c_bill();
    // $controller2 = new c_billdetail();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/bill1.css">
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
                <?php 
                    $mang = array();
                    $mang = $controller->getBillid("HD002");
                    foreach($mang as $bill){
                        $html = 
                        '<div class="bill_items2">
                            <div class="bill_details">
                                <div class="id_bill">
                                    <p>' . $bill->getMaHD() . '</p>
                                </div>
                                <button>Xem chi tiết</button>
                            </div>';

                            echo($html);

                            $mangsp = array();
                            $mangsp = $controller->getBilldetail_byMaHD_inHD("HD002");
                            foreach($mangsp as $sanpham){
                                $html2 = 
                                '<div class="bill_product">
                                <img class="img_product" src="public/data/banner1.jpg" alt="">
                                <div class="product_infor">
                                    <p> ' . $controller->getProductName_byMaSP_inHD($sanpham->getMaSP()) . '</p>
                                    <p> Số lượng: ' . $sanpham->getSoLuong() . '</p>
                                </div>
                                </div>';
                                echo($html2);
                            };

                            $giaohang = $controller->getDeliveryInfo("HD002");

                            $html3 =

                            '<div class="bill_total">
                                <div class="bill_time">
                                    <p>Ngày Lập: ' . $bill->getNgayLap() . '</p>
                                    <p>Ngày Giao: ' . $giaohang->getNgayGiao() . '</p>
                                    <p>Hình thức thanh toán: ' . $bill->getHinhThucTra() . '</p>
                                </div>
                                <div class="bill_tong">
                                    <p>Trạng thái: '.$giaohang->getTinhTrang().'</p>
                                    <p>Thành tiền: '. $bill->getTongGiaGoc() .'</p>
                                </div>
                            </div>
                        </div>';
                        echo($html3);
                    }

                    $mang2 = array("KH002","Momo","2024-01-01 00:00:00",200000); 
                    $controller->addBill($mang2);  // Thêm hóa đơn mới khi thanh toán

                    $mang3 = array("2024-01-01 00:00:00","2024-01-01 00:00:00", "Đang giao", "Đường A, Phường B","HD003");
                    $controller->addDeliveryInfo($mang3); // Thêm giao hàng mới kèm theo hóa đơn
                ?>
            </div>
        </div>
    </section>
    <?php require "mvc/view/absolutePart/footer.php"; ?>
</body>
</html>