<?php
    require_once "mvc/view/v_login.php";
    require_once "mvc/model/m_login.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Gọi hàm login
        login($username, $password);
    }
?>