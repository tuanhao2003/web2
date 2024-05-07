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
            
        }
        require_once "mvc/model/m_bill.php";
        require_once "mvc/entity/e_hoadon.php";
        $this->m_bill = new m_bill();
    }

    public function getAllbills(){
        
        $data = $this->m_bill->getAllbills();
        return $data;
    }
    
    public function getbill_view(){
    
        $data = $this->m_bill->getAllbills();
        return $data;
    }

    public function getBillid($MaHD){

        $data = $this->m_bill->getbillid($MaHD);
        return $data;
    }
    
}


