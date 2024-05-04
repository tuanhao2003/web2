<?php
class m_login{
    public function __construct(){
        require_once 'mvc/config/database.php';
    }
    public function login($username, $password)
    {
        $conn = connect(); // Hàm connect() cần phải được định nghĩa ở một nơi khác
    
        if (empty($username)) {
            echo "<script>alert('Please do not leave the username LOGINNNNNNNNN field blank!');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
        } else if (empty($password)) {
            echo "<script>alert('Please do not leave the password field blank!');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
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
                $matk = $result->fetch_assoc()["MaTK"];
                $query = "select PhanQuyen from quyen where MaTK='$matk'";
                
                // Đăng nhập thành công
                session_start();
                $_SESSION['isLoggedIn'] = true;
                echo "<script>alert('Welcome to page admin!!');</script>";
                if($conn->query($query)->fetch_assoc()["PhanQuyen"] == "admin"){
                    header("Location: /web2/admin");
                }else{
                    header("Location: /web2/home"); // Chuyển hướng đến trang chào mừng sau khi đăng nhập thành công
                }
                exit();
            } else {
                // Đăng nhập thất bại
                echo "<script>alert('Incorrect username or password!');</script>";
                header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
            }
        }
    
        $conn->close();
    }
    public function register($username, $password, $email, $phone)
    {
        echo "<script>alert('aaaaaaaaaaaaaaaaaaaaaaa');</script>";
        $conn = connect(); // Hàm connect() cần phải được định nghĩa ở một nơi khác

        echo "<script>alert('aaaa'. $username . 'aloooooooooooooooooooooooo');</script>";

        if (empty($username)) {
            // echo "<script>alert('Please do not leave the username REGISTER field blank!');</script>";
            echo "<script>alert('Username: $username');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
        } else if (empty($password)) {
            echo "<script>alert('Please do not leave the password field blank!');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
        } else if (empty($email)) {
            echo "<script>alert('Please do not leave the email field blank!');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
        } else if (empty($phone)) {
            echo "<script>alert('Please do not leave the phone field blank!');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
        } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
            echo "<script>alert('Phone number must contain exactly 10 digits and only digits!');</script>";
            header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
        } else {
            // Chống SQL Injection
            $username = mysqli_real_escape_string($conn, $username);
            $password = mysqli_real_escape_string($conn, $password);
            $email = mysqli_real_escape_string($conn, $email);
            $phone = mysqli_real_escape_string($conn, $phone);

            // Kiểm tra xem username đã tồn tại chưa
            $check_query = "SELECT * FROM taikhoan WHERE TenDangNhap = '$username'";
            $check_result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
                echo "<script>alert('Username already exists!');</script>";
                header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
                exit();
            }

            // Kiểm tra xem email đã tồn tại chưa
            $check_query = "SELECT * FROM taikhoan WHERE Email = '$email'";
            $check_result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_result) > 0) {
                echo "<script>alert('Email already exists!');</script>";
                header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $sql = "SELECT COUNT(*) AS total FROM taikhoan";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $totalAccounts = $row['total'];
            $MaTK = "";
            if ($totalAccounts < 10) {
                $MaTK = "TK00" . $totalAccounts;
            } elseif ($totalAccounts >= 10 && $totalAccounts < 100) {
                $MaTK = "TK0" . $totalAccounts;
            } else {
                $MaTK = "TK" . $totalAccounts;
            }
            echo "<script>alert($MaTK);</script>";

            // Thêm người dùng mới vào CSDL
            $sql = "INSERT INTO taikhoan (MaTK,TenDangNhap, MatKhau, TrangThai) VALUES ('$MaTK','$username', '$password', 0)";
            if ($conn->query($sql) === TRUE) {
                // Đăng ký thành công
                echo "<script>alert('Registration successful!');</script>";
                header("Refresh: 0; url=" . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                // Đăng ký thất bại
                echo "<script>alert('Registration error');</script>";
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    }


}
?>