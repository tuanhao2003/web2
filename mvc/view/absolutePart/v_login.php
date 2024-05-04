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
   
   
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php $loginController->login(); ?>" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" id="username" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" id="password" name="password"  required>
                    <label>Password</label>
                </div>
                
                <button type="submit" class="btn" id="Login" name="Login">Login</button>
                <div class="login-register">
                    <p?>Don't have an account? <a href="#" class="register-link">Register</a></p>
                </div>
            </form>
        </div>
        <div class="form-box register">
            <h2>Registration</h2>
            <form action="<?php $loginController->register(); ?>" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="text" id="username-rg" name="username-rg" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" id="password-rg" name="password-rg"  required>
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" id="email-rg" name="email-rg" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                    <input type="tel" id="phone-rg" name="phone-rg" required>
                    <label>Phone</label>
                </div>
                
                <input type="submit" class="btn" value="Register">
                <div class="login-register">
                    <p?>Already havve an account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>
    
    <script src="../web2/public/js/index.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
