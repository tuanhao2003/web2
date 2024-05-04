<?php
class c_login{
    protected $mlogin;
    public function __construct(){
        require_once "mvc/model/m_login.php";
        require_once "mvc/view/absolutePart/v_login.php";
        $this->mlogin = new m_login();
    }
    public function login()
    {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['Login'])) {
                // Lấy dữ liệu từ form
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Gọi hàm login
                    $this->mlogin->login($username, $password);
                }
            }
        
    }
    public function register()
    {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<script>alert('aaaaaaaaaaaaaaaaaaaaaaaREGISTER11111111111');</script>";
                if (isset($_POST['Register'])) {
                    echo "<script>alert('aaaaaaaaaaaaaaaaaaaaaaaREGISTER');</script>";
                    // Lấy dữ liệu từ form
                    $username = $_POST['username-rg'];
                    $password = $_POST['password-rg'];
                    $email = $_POST['email-rg'];
                    $phone = $_POST['phone-rg'];
                    echo "<script>alert('aaaaaaaaaaaaaaaaaaaaaaaREGISTER22222222222222222222222222222');</script>";
                    // Gọi hàm register
                    $this->mlogin->register($username, $password, $email, $phone);
                    echo "<script>alert('aaaaaaaaaaaaaaaaaaaaaaaREGISTER333333333333333333');</script>";
                }
            }
    }
}
?>