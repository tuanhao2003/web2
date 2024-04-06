<?php
class c_home{
    protected $url;
    public function __construct($url = null) {
        if ($url !== null) {
            require_once "mvc/view/v_" . $url . ".php";
        }
    }

    public function test(){
        $this->url = "mvc/controller/c_admin.php";
        require_once $this->url;
    }
}
?>