<?php
class app
{
    protected $page;
    protected $func;
    protected $params;

    function __construct()
    {
        $page = "home";
        $func = "";
        $params = [];

        $this->mapping();
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
}
?>