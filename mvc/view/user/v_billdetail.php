<!DOCTYPE html> 
<?php 
    require_once "mvc/controller/c_admin.php";
    $controller = new c_billdetail();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/bill1.css">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <title>Chi tiết Hóa đơn</title>
</head>
<body>

<section>
        <?php

            $khachhang = $controller->getCustomerInfoFromBill(json_decode($_COOKIE["paramObj"])->billid);

            $html = '<div class="infor_column">
            <div class="img_text">
                <div>
                    <img class="infor_img" src="/web2/public/data/banner1.jpg" alt=""><br>
                </div>
                <div class="infor_text">
                    <p>'.$khachhang->getTenKH().'</p>
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
        </div>';
        echo($html);
        ?>
        
        <div class="infor_bill_detail">
            <div class="infor_bill_detail2">
                <div class="title_detail">
                        <h2 class="title_name">Chi tiết Hóa đơn</h2>
                    </div>
                <?php 
                    $mang = array();
                    $mang = $controller->getBilldetail_byMaHD(json_decode($_COOKIE["paramObj"])->billid);

                    $hoadon = $controller->getbillid_fromdetail(json_decode($_COOKIE["paramObj"])->billid);

                    $giaohang = $controller->getDeliveryInfo(json_decode($_COOKIE["paramObj"])->billid);

                    $khachhang = $controller->getCustomerInfoFromBill(json_decode($_COOKIE["paramObj"])->billid);

                    $html1 =   
                    '<div class="bill_time_infor">
                        <div>
                            <p>' . $hoadon->getMaHD() . '</p>
                            <p>Ngày đặt: ' . $hoadon->getNgayLap() . '</p>
                            <p>Ngày giao:' . $giaohang->getNgayGiao() . '</p>
                        </div>
                        <div>
                            <p>Địa chỉ: ' . $giaohang->getDiaDiem() . '</p>
                            <p>Khách hàng: ' . $khachhang->getTenKH() . '</p>
                        </div>
                    </div>';
                    echo($html1);

                    foreach($mang as $bill){
                        $html2 =
                        '<div class="all_product">
                        <div class="product">
                            <div class="img_product">
                                <img class="img_product" src="public/data/banner1.jpg" alt="">
                            </div>
                            <div class="infor_product">
                                <p>' . $controller->getProductName_byMaSP($bill->getMaSP()) . '</p>
                                <p>' . $bill->getSoLuong() . '</p>
                            </div>
                            <div class="price">
                                <p> Giá: ' . $bill->getGiaTien() . '</p>
                            </div>
                        </div>
                    </div>';
                        echo($html2);
                    }    
                    
                    $html3 = '<div class="total_price">
                        <p> Thành tiền: ' . $hoadon->getTongGiaGoc() . '</p>
                    </div>';
                    echo($html3);
                    
                
                ?>
            </div>

            <?php

            // $mang = array();
            // $mang = $controller->getProductInfo_byMaSP("SP001");
            //     foreach($mang as $data){
            //         echo($data);
            //     }    
                
            // ?>
             
            
        </div>
</section>
<?php require "mvc/view/absolutePart/footer.php"; ?>
</body>
</html>