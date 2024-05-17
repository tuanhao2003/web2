<?php
require_once "mvc/model/m_cart.php";

class c_cart {
    protected $model;

    public function __construct() {
        $this->model = new m_cart();
    }

    public function getCartItems() {
        if ($_SERVER["REQUEST_METHOD"]=="GET"){
            if (isset($_COOKIE['loginingAccount']) ? $_COOKIE['loginingAccount'] : null) {
                echo json_encode(["error" => "Bạn cần đăng nhập để xem giỏ hàng."]);
                return;
            }
    
            $maTK = $_COOKIE['loginingAccount'];
            $cartItems = $this->model->getCartItems($maTK);
            return $cartItems;
        }
    }
}
?>
