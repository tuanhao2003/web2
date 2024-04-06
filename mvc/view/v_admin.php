<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <script src="public/js/index.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin</title>
</head>

<body>
    <?php require "mvc/view/absolutePart/header.php";?>
    <section>
        <div class="d-flex">
            <div class="adminSideBar">
                <ul class="controlMenu">
                    <li>
                        <a href="./admin/customer">
                            Customers
                        </a>
                    </li>
                    <li>
                        <a href="">                            
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="">                            
                            Bills
                        </a>
                    </li>
                    <li>
                        <a href="">                            
                            Setting
                        </a>
                    </li>
                    <li>
                        <a href="">                            
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <?php require "mvc/view/absolutePart/footer.html"; ?>
</body>
</html>