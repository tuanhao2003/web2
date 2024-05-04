<?php 
require_once "mvc/controller/c_login.php";
$loginController = new c_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web2/public/css/login.css">
    <title>Login</title>
</head>
<body>
   
    <div class="Login">
        <div class="Login1">
            <div class="Part">
                <div class="Img-login">
                    Hình ảnh
                </div>
            </div>
            <div class="Part">
                <div class="Information">
                    <h2>Đăng nhập</h2>
                    <form action="<?php $loginController->login(); ?>" method="post">
                        
                        <input type="text" id="username" name="username" placeholder="username..." required><br>
                        
                        <input type="password" id="password" name="password" placeholder="password..." required><br><br>
                        <button class= "submit" type="submit" value="Login">Login</button>
                    </form>
                </div>
            </div>
        
        
        </div>
        
    </div>
    
</body>
</html>
