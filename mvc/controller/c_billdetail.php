<?php
class c_billdetail{
    protected $m_billdetail;
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

    

}