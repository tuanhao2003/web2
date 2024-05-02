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
        $this->m_bill = new m_bill();

        $data = $this->m_bill->getAllbills();
        $dataToHTML = "";
        if (!empty($data)){
            foreach ($data as $bill){
                $dataToHTML .= "<div class='dataRow'><div> Mã HD: " . $bill->getMaHD() . 
                "</div><div> Mã Khách Hàng: " . $bill->getMaKH() . 
                "</div><div> Ngày Lập: " . $bill->getNgayLap() . 
                "</div><div> Ngày Xuất: " . $bill->getNgayXuat() . 
                "</div><div> Tổng Giá Gốc: " . $bill->getTongGiaGoc() . "</div></div>";
                
            }
        }
        return $dataToHTML;
    }
    
}


