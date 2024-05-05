<?php
class c_bill{
    protected $m_bill;
    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->view;
            require_once $this->model;
            $this->m_bill = new m_bill();
        }
    }

    public function getAllbills(){
        require_once "mvc/model/m_bill.php";
        require_once "mvc/entity/e_hoadon.php";
        $this->m_bill = new m_bill();
    
        $data = $this->m_bill->getAllbills();


        $dataToHTML = "";
        if (!empty($data)){
            foreach ($data as $bill){

                $dataToHTML .= '<div class="bill_items2">
                    <div class="bill_details">
                        <div class="id_bill">
                            <p>' . $bill->getMaHD() . '</p>
                        </div>
                        <button>Xem chi tiết</button>
                    </div>
                    <div class="bill_product">
                        <img class="img_product" src="public/data/banner1.jpg" alt="">
                        <div class="product_infor">
                            <p> Rolex Pro . </p>
                            <p> Số lượng 1 . </p>
                        </div>
                    </div>
                    <div class="bill_total">
                        <div class="bill_time">
                            <p>Ngày Lập: ' . $bill->getNgayLap() . '</p>
                            <p>Hình thức thanh toán: ' . $bill->getHinhThucTra() . '</p>
                        </div>
                        <div class="bill_tong">
                            <p>Trạng thái: Đã giao</p>
                            <p>Thành tiền: ' . $bill->getTongGiaGoc() . '</p>
                        </div>
                    </div>
                </div>';
            }
        }



        return $dataToHTML;
    }
    

    public function getbillcustomer(){
        require_once "mvc/model/m_bill.php";
        $this->m_bill = new m_bill();

        $data = $this->m_bill->getAllbills();
        $dataToHTML = "";
        if (!empty($data)){
            foreach ($data as $bill){

                $dataToHTML .= "<div class='bill_items2'>
                <div class='bill_details'>
                    <div class='id_bill>
                        <p>HD001</p>
                    </div>
                    <button>Xem chi tiết</button>
                </div>
                <div class='bill_product'>
                    <img class='img_product' src='public/data/banner1.jpg' alt=''>
                    <div class='product_infor'>
                        <p>Rolex pro</p>
                        <p>Số lượng 1</p>
                    </div>
                </div>
                <div class='bill_total'>
                    <div class='bill_time'>
                        <p>Ngày Lập: 01/01/2000</p>
                        <p>Hình thức thanh toán: Momo</p>
                    </div>
                    <div class='bill_tong'>
                        <p>Trạng thái: Đã giao hàng</p>
                        <p>Thành tiền: 5.000.000đ</p>
                    </div>
                </div>
            </div>";

            }
        }
        return $dataToHTML;
    }
    
}


