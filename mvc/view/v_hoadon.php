<!DOCTYPE html> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
</head>
<body>
    <?php require "mvc/view/absolutePart/header.php"; ?>
    <h2>Hóa đơn khách hàng</h2>
    <form action="" method="post">
 
            <label for="ma_hd">Mã hóa đơn: </label>
            <label for="ma_hd">HD001</label> <br>

            <label for="ma_kh">Mã khách hàng: </label>
            <label for="ma_kh">KH001</label> <br>

            <label for="ngay_lap">Ngày lập: </label>
            <label for="ngay_lap">01/01/2024</label> <br>

            <label for="ngay_xuat">Ngày xuất: </label>
            <label for="ngay_xuat">02/01/2024</label> <br>

            <label for="tong_tien">Tổng tiền gốc:</label>
            <label for="tong_tien">1.500.000đ</label> <br>
            
            <label for="tong_tien_sauKM">Tổng tiền sau KM:</label>
            <label for="tong_tien_sauKM">1.300.000đ</label>
    </form>
    
</body>
</html>