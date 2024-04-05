<?php
class app
{
    protected $page;
    protected $func;
    protected $params;

    function __construct()
    {
        $this->page = "notFound";
        $this->func = "";
        $this->params = [];

        $this->mapping();
        $this->httpReq();
    }

    function mapping()
    {
        if (isset($_GET["url"])) {
            $urlPath = explode("/", filter_var(trim($_GET["url"], "/")));
            
            if(file_exists("mvc/controller/c_" . $urlPath[0] . ".php")) {
                $this->page = $urlPath[0];
            }
            
            require_once "mvc/controller/c_" . $this->page . ".php";
        }
    }

    //home/hao?name=asdf method: get
    function httpReq(){
        $url = $_SERVER("REQUEST_URI");
        $method = $_SERVER("REQUEST_METHOD");
        if($method == "GET"){
            
        }else if($method == "POST"){
            
        }else if($method == "DELETE"){
            
        }

    }
}
?>