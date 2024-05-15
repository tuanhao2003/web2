<?php
require_once "mvc/view/user/v_customer.php";

class c_customer{
    protected $m_customer;
    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->view;
            require_once $this->model;
            
        }
        require_once "mvc/model/m_customer.php";
        // require_once "mvc/entity/e_khachhang.php";
        $this->m_customer = new m_customer();
    }

    public function getUser_byid($id){
        $data = $this->m_customer->getUser_byid($id);
        return $data;
    }
    
    public function update_info($arr){
        
        $result = $this->m_customer->update_info($arr);
        
        if($result === true) {
            return "Cập nhật thông tin thành công!";
        } else {
            return "Đã xảy ra lỗi trong quá trình cập nhật thông tin.";
        }
    }

    public function save_info(){
        if($_SERVER["REQUEST-METHOD"] == "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $sdt = $_POST['sdt'];
            $result = $this->m_customer->save_info($name, $email, $diachi, $sdt);
            error_log("Error message", 3, "/path/to/error.log");
            echo($name);
            if($result === true) {
                return "Lưu thông tin thành công!";
            } else {
                return "Đã xảy ra lỗi trong quá trình lưu thông tin.";
            }
        }
    }
    
}