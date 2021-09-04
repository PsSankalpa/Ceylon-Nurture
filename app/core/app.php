<?php

class app
{
    private $controller = "home";
    private $method = "index";
    private $params = [];//values in the url which after controler php name and its method, stores here

    //get the url and run specific function inside
    public function __construct()
    {
        $url = $this->splitURL();

        if(file_exists("../app/controllers/". strtolower($url[0]) .".php"))
        {
            $this->controller = strtolower($url[0]);
            unset($url[0]); 
        }

        require "../app/controllers/" .  $this->controller . ".php";
        $this->controller = new $this->controller;

        if(isset($url[1]))
        {
            if(method_exists($this->controller,$url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //run the class and method
        $this->params = array_values($url);
        call_user_func_array([$this->controller, $this->method] ,$this->params);
    }

    private function splitURL()
    {
        $url = isset($_GET['url'])?$_GET['url']:"home";//after the main part of the url,if there is nothing this directed to the home page(currently default)
        return explode("/", filter_var(trim($url,"/"),FILTER_SANITIZE_URL));//sanitize the url
    }
}

?>
