<?php
class c_billdetail{
    protected $m_billdetail;
    protected $view;
    protected $model;

    public function __construct($url = null){
        if ($url !== null) {
            $this->view = "mvc/view/user/v_" . $url . ".php";
            $this->model = "mvc/model/m_" . $url . ".php";
            require_once $this->model;
            require_once $this->view;
        }
            $this->m_billdetail = new m_billdetail();
    }

    public function allfunction($ma){

        return $this->getAllbillsdetail().$this->getBilldetail_byMaHD($ma);
    }


    public function getAllbillsdetail(){
        
    
        $data = $this->m_billdetail->getAllbillsdetail();
        $dataToHTML = "";
        if (!empty($data)){
            foreach ($data as $bill){
                $dataToHTML .= 
                '   <div class="title_detail">
                        <h2 class="title_name">Chi tiết Hóa đơn</h2>
                    </div>
                    
                    <div class="bill_time_infor">
                        <div>
                            <p>' . $bill->getMaHD() . '</p>
                            <p>Ngày đặt: 01/01/2000</p>
                            <p>Ngày nhận: 02/02/2002</p>
                        </div>
                        <div>
                            <p>Địa chỉ: 273 An Dương Vương, P1, Q5, TP.HCM</p>
                        </div>
                    </div>
                    <div class="all_product">
                        <div class="product">
                            <div class="img_product">
                                <img class="img_product" src="public/data/banner1.jpg" alt="">
                            </div>
                            <div class="infor_product">
                                <p>' . $bill->getMaSP() . '</p>
                                <p>' . $bill->getSoLuong() . '</p>
                            </div>
                            <div class="price">
                                <p> Giá: ' . $bill->getGiaTien() . '</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="total_price">
                        <p>
                            Thành tiền: 10.000.000đ
                        </p>
                    </div>';
            }   
        }
        return $dataToHTML;
    }

    public function getBilldetail_byMaHD($MaHD){


        $data = $this->m_billdetail->getBilldetail_byMaHD($MaHD);

        $dataToHTML = "";
        
        if (!empty($data)){
            foreach ($data as $bill){
                $dataToHTML .= '<div class="infor_bill_detail">
                    <div class="title_detail">
                        <h2 class="title_name">Chi tiết Hóa đơn</h2>
                    </div>
                    
                    <div class="bill_time_infor">
                        <div>
                            <p>' . $bill->getMaHD() . '</p>
                            <p>Ngày đặt: 01/01/2000</p>
                            <p>Ngày nhận: 02/02/2002</p>
                        </div>
                        <div>
                            <p>Địa chỉ: 273 An Dương Vương, P1, Q5, TP.HCM</p>
                        </div>
                    </div>
                    <div class="all_product">
                        <div class="product">
                            <div class="img_product">
                                <img class="img_product" src="public/data/banner1.jpg" alt="">
                            </div>
                            <div class="infor_product">
                                <p>' . $bill->getMaSP() . '</p>
                                <p>' . $bill->getSoLuong() . '</p>
                            </div>
                            <div class="price">
                                <p> Giá: ' . $bill->getGiaTien() . '</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="total_price">
                        <p>
                            Thành tiền: 10.000.000đ
                        </p>
                    </div>
                </div>';
            }   
        }
        return $dataToHTML;
    }


}