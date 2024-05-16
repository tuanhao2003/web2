<!DOCTYPE html> 
<?php
    require_once "mvc/controller/c_admin.php";
    $controller = new c_customer();

    if(isset($_POST['save_but']))
    {
        $controller->save_info();
    } 

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">

    <link rel="stylesheet" href="/web2/public/css/customer.css">
    <title>Information_Customer</title>
</head>
<body >
    <?php require "mvc/view/absolutePart/header.php"; ?>
    <section>

        <?php
            $data = $controller->getUser_byid(json_decode($_COOKIE["paramObj"])->userid);

            $html = '<div class="infor_column">
            <div class="img_text">
                <div>
                    <img class="infor_img" src="/web2/public/data/banner1.jpg" alt=""><br>
                </div>
                <div class="infor_text">
                    <p>'.$data->getTenKH().'</p>
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
        
        <?php
            // $thongtin = array("Trần Kiệt", "Đường 1", "1991-01-01 00:00:00","a@a", "01234" );
            // $controller->update_info($thongtin);
        ?>

        <?php
        
        $data = $controller->getUser_byid(json_decode($_COOKIE["paramObj"])->userid);

            $birthdate = $data->getNgaySinh();
            list($year, $month, $day) = explode('-', $birthdate);

            $days = range(1, 31);
            $months = range(1, 12);
            $years = range(1950, date("Y"));

            $dayOptions = "";
            foreach ($days as $d) {
                $selected = ($d == $day) ? "selected" : "";
                $dayOptions .= "<option value='$d' $selected>$d</option>";
            }

            $monthOptions = "";
            foreach ($months as $m) {
                $selected = ($m == $month) ? "selected" : "";
                $monthOptions .= "<option value='$m' $selected>$m</option>";
            }

            $yearOptions = "";
            foreach ($years as $y) {
                $selected = ($y == $year) ? "selected" : "";
                $yearOptions .= "<option value='$y' $selected>$y</option>";
            }
            $html = 
            '<div class="information_customer">
                <div class="information_customer_text">
                    <form>
                    <h1 class="title_form">Thông tin khách hàng</h1>
                        <table>
                            <tr>
                                <td class="td_name">
                                    <label for="username">Tên</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="name" name="name" value="'.$data->getTenKH().'" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="email">Email</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="email" name="email value="'.$data->getEmail().'" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="address">Địa chỉ</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="address" name="address" value="'.$data->getDiaChi().'"><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="SĐT">Số điện thoại</label>
                                </td>
                                <td>
                                    <input class="inp_text" type="text" id="SĐT" name="SĐT" value="'.$data->getSdt().'"><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_name">
                                    <label for="ngaysinh">Ngày sinh</label>
                                </td>
                                <td>
                                
                                    <select name="ngay" id="ngay">'
                                    . $dayOptions .
                                    '</select>
                                    <select name="thang" id="thang">'
                                    . $monthOptions .
                                    '</select>
                                    <select name="nam" id="nam">'
                                    . $yearOptions .
                                    '</select><br>
                                </td>
                            </tr>
                        </table>
                        <input id="save_but" class="save_btn" type="submit" value"Lưu">
                        
                    </form>
                </div>
                <div class="information_customer_image">
                    <img src="/web2/public/data/banner1.jpg" alt=""><br>
                    <button>Chọn ảnh</button>
                    <div>
                        <p>Dung lượng file tối đa 1MB</p>
                        <p>Định dạng: JPG, PNG</p>
                    </div>
                </div>
            </div>';

            echo($html);

    ?>

        
    </section>
    <?php require "mvc/view/absolutePart/footer.php"; ?>
</body>
</html>