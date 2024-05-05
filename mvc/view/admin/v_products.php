<?php
$controller = new c_productsManage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <script src="/web2/public/js/productsManage.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Manage</title>
</head>

<body>
    <div class="popup">
        <div class="addProductPopup">
            <form id="productForm" action method="POST">
                <input type="text" name="masp">
                <input type="text" name="tensp">
                <input type="number" name="donGia">
                <input type="number" name="giaBan">
                <input type="number" name="soLuong">
                <input type="text" name="hinhAnh">
                <input type="text" name="maHang">
                <input style="display: none;" type="number" name="trangThai">
                <input type="submit">
            </form>
        </div>
    </div>
    <section>
        <div class="d-flex">
            <?php require "mvc/view/absolutePart/adminSideBar.php"; ?>
            <div style="width: 80%; height: 100%;">
                <div class="tools">
                    <button onclick="setFormToAdd();" class="addBtn">+</button>
                </div>
                <div class="dataContainer">
                    <table>
                        <tbody>
                            <tr>
                                <th style="width: 20%">Image</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 15%">Price</th>
                                <th style="width: 15%">Selling Price</th>
                                <th style="width: 10%">Quantity</th>
                                <th style="width: 10%">Type</th>
                                <th style="width: 10%">Status</th>
                            </tr>
                            <?php echo $controller->getAllProducts(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<style>
    .adminSideBar li:nth-child(2) {
        background-color: black;
    }

    .adminSideBar li:nth-child(2) a {
        color: white;
    }
</style>

<script>
    function setFormToUpdate(){
        document.getElementById("productForm").setAttribute("action", "<?php $controller->updateProduct() ?>");
    }

    function setFormToAdd(){
        document.getElementById("productForm").setAttribute("action", "<?php $controller->addProduct() ?>");
    }
</script>