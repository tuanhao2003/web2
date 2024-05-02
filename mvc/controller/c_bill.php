<?php

require_once "mvc/view/v_bill.php";

class c_bill{
    protected $mbill;

    public function __construct(){
        $this->mbill = new m_bill();
    }

    
}

require_once "mvc/view/user/v_bill.php";

