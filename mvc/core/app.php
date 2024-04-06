<?php
class app
{
    protected $page;
    protected $subPage;

    function __construct()
    {
        $this->page = "notFound";
        $this->subPage = "";

        $this->mapping();
        // $this->httpReq();
    }

    function mapping()
    {
        if (isset($_GET["url"])) {
            $urlPath = explode("/", filter_var(trim($_GET["url"], "/")));
            if(file_exists("mvc/controller/c_" . $urlPath[0] . ".php")) {
                $this->page = $urlPath[0];
            }            

            if(isset($urlPath[1])){
                $controllerFile = "mvc/controller/c_" . $this->page . ".php";
                if(file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $class = "c_" . $this->page;
                    if(class_exists($class)) {
                        $open = new $class();
                        $methodName = $urlPath[1];
                        if(method_exists($open, $methodName)) {
                            $open->$methodName();
                        }
                    }
                }
            }else{
                require_once "mvc/controller/c_" . $this->page . ".php";
                $class = "c_" . $this->page;
                $open = new $class($this->page);
            }

        }
    }

 

    // function httpReq(){
    //     $url = $_SERVER("REQUEST_URI");
    //     $method = $_SERVER("REQUEST_METHOD");
    //     if($method == "GET"){

    //     }else if($method == "POST"){
            
    //     }else if($method == "DELETE"){
            
    //     }

    // }
}
?>