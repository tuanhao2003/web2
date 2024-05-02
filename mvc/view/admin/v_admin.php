<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/index.css">
    <link rel="stylesheet" href="/web2/public/css/admin.css">
    <script src="/web2/public/js/index.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Manage</title>
</head>

<body>
    <div style="background-color: rgb(80,80,80);">
        <?php require "mvc/view/absolutePart/header.php"; ?>
    </div>
    <section>
        <div class="d-flex">
            <?php require "mvc/view/absolutePart/adminSideBar.php"; ?>
            <div class="dataContainer">
                <h1>Wellcome to admin page!</h1>
            </div>
        </div>
    </section>

    <?php require "mvc/view/absolutePart/footer.html"; ?>
</body>

</html>