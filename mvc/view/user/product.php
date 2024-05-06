<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Products</title>
    <style>
        /* CSS styles for table display */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <h2>List of Products</h2>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Unit Price</th>
                <th>Sale Price</th>
                <th>Description</th>
                <th>Brand</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Include the controller
            require_once '/mvc/controller/c_productsManage.php';
            // Create a new instance of the controller
            $controller = new c_productsManage();
            // Get all products
            echo $controller->getAllProducts();
            ?>
        </tbody>
    </table>
</body>
</html>
