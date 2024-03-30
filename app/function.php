<?php
    include '../config/database.php';

function login($username, $password)
{
    $conn = connect(); // Hàm connect() cần phải được định nghĩa ở một nơi khác

    if (empty($username)) {
        echo "<script>alert('Please do not leave the username field blank!');</script>";
        header("Refresh: 0; url=".$_SERVER['HTTP_REFERER']);
    } else if (empty($password)) {
        echo "<script>alert('Please do not leave the password field blank!');</script>";
        header("Refresh: 0; url=".$_SERVER['HTTP_REFERER']);
    } else {
        // Chống SQL Injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // // Mã hóa mật khẩu
        // $hashed_password = md5($password); // Bạn nên sử dụng một phương pháp mã hóa mật khẩu mạnh mẽ hơn trong môi trường thực tế

        $sql = "SELECT * FROM TaiKhoan WHERE TenDangNhap = '$username' AND MatKhau = '$password'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
        }

        $rows_count = mysqli_num_rows($result);

        if ($rows_count == 1) {
            // Đăng nhập thành công
            session_start();
            $_SESSION['isLoggedIn'] = true;
            echo "<script>alert('Welcome to page admin!!');</script>";
            header("Location: ./user/index.php"); // Chuyển hướng đến trang chào mừng sau khi đăng nhập thành công
            exit();
        } else {
            // Đăng nhập thất bại
            echo "<script>alert('Incorrect username or password!');</script>";
            header("Refresh: 0; url=".$_SERVER['HTTP_REFERER']);
        }
    }

    $conn->close();
}
function returnLogin(){
    header("Location: ./login.php"); // Chuyển hướng đến trang chào mừng sau khi đăng nhập thành công
            exit();
}
?>