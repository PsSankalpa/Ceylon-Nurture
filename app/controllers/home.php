<?php
class home
{
    function index()
    {
        $this->view("home"); 
    }

    function view($view)//reads from the views
    {
        if(file_exists("../app/views/". $view .".php"))//if the file is found in views
        {
            include "../app/views/". $view .".php";//include the obove path
        }
        else
        {
            include "../app/views/404.php";
        }
    }
}
