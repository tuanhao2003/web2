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
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Gọi hàm login
            $this->mlogin->login($username, $password);
        }
    }
    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            // Gọi hàm register
            $this->mlogin->register($username, $password, $email, $phone);
        }
    }

}
?>