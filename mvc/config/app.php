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
    }

    function mapping()
    {
        if (isset($_GET["url"])) {
            $urlPath = explode("/", filter_var(trim($_GET["url"], "/")));
            if (file_exists("mvc/controller/c_" . $urlPath[0] . ".php")) {
                $this->page = $urlPath[0];
            }

            if (isset($urlPath[1])) {
                $controllerFile = "mvc/controller/c_" . $this->page . ".php";
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    $class = "c_" . $this->page;
                    if (class_exists($class)) {
                        $classInit = new $class();
                        $methodName = $urlPath[1];
                        if (method_exists($classInit, $methodName)) {
                            $classInit->$methodName();
                        }else{
                            require_once "mvc/controller/c_notFound.php";
                            new c_notFound();
                        }
                    }
                }
            } else {
                require_once "mvc/controller/c_" . $this->page . ".php";
                $class = "c_" . $this->page;
                new $class($this->page);
            }
        }
    }
}
?>