<?php
// Thêm require_once cho model mới
require_once "mvc/model/m_hang.php";

class c_productdetail {
    protected $view;
    protected $model;
    protected $m_sanpham;
    protected $masp;

    public function __construct($masp = null){
        if ($masp !== null) {
            $this->view = "mvc/view/user/v_productdetail.php";
            $this->model = "mvc/model/m_productdetail.php";
            require_once $this->model;
            require_once $this->view;
        }
        $this->m_sanpham = new m_productdetail();
        $this->masp = $masp;
    }    

    // Phương thức để lấy thông tin chi tiết của sản phẩm từ model
    public function getProductDetail() {
        return $this->m_sanpham->getProductDetail($this->masp);
    }
}
?>

