<!DOCTYPE html> 
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">

    <link rel="stylesheet" href="public/css/customer.css">
    <title>Information_Customer</title>
</head>
<body >
    <?php require "mvc/view/absolutePart/header.php"; ?>
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
        <div class="information_customer">
            <div class="information_customer_text">
                <form action="" method="post">
                <h1 class="title_form">Thông tin khách hàng</h1>
                    <table>
                        <tr>
                            <td class="td_name">
                                <label for="username">Tên đăng nhập:</label>
                            </td>
                            <td>
                                <label for="name_username">Danh2003</label> <br>
                            </td>
                        </tr>

                        <tr>
                            <td class="td_name">
                                <label for="username">Tên</label>
                            </td>
                            <td>
                                <input class="inp_text" type="text" id="name" name="name" required><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_name">
                                <label for="email">Email</label>
                            </td>
                            <td>
                                <input class="inp_text" type="text" id="email" name="email"><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_name">
                                <label for="address">Địa chỉ</label>
                            </td>
                            <td>
                                <input class="inp_text" type="text" id="address" name="address"><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_name">
                                <label for="SĐT">Số điện thoại</label>
                            </td>
                            <td>
                                <input class="inp_text" type="text" id="SĐT" name="SĐT" ><br>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_name">
                                <label for="ngaysinh">Ngày sinh</label>
                            </td>
                            <td>
                                <select name="ngay" id="ngay">
                                    <option>30</option>
                                </select>
                                <select name="thang" id="thang">
                                    <option>12</option>
                                </select>
                                <select name="nam" id="nam">
                                    <option>2000</option>
                                </select><br>
                            </td>
                        </tr>
                    </table>
                    <button class="save_btn">Lưu</button>
                </form>
            </div>
            <div class="information_customer_image">
                <img src="public/data/banner1.jpg" alt=""><br>
                <button>Chọn ảnh</button>
                <div>
                    <p>Dung lượng file tối đa 1MB</p>
                    <p>Định dạng: JPG, PNG</p>
                </div>
            </div>
        </div>
    </section>
    <?php require "mvc/view/absolutePart/footer.html"; ?>
</body>
</html>