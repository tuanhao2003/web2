<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/css/responsive.css">
    <script src="public/js/index.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Not Found</title>
</head>


<body>
    <div style="background-color: #333;">
        <?php require "mvc/view/absolutePart/header.php" ?>
    </div>

    <section>
        <div class="gridRow-2">
            <div class="notFoundContainer">
                <div>
                    <b>404</b>
                </div>
                <div><b>page not found!</b></div>
            </div>
            <div class="notFoundImage"></div>
        </div>
    </section>
    <?php require "mvc/view/absolutePart/footer.html" ?>
</body>

</html>