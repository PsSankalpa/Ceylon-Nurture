<?php 

class Controller
{
    protected function view($view,$data = [])//reads from the views
    {
        extract($data);
        if(file_exists("../app/views/". $view .".php"))//if the file is found in views
        {
            require "../app/views/". $view .".php";//require the obove path
        }
        else
        {
            require "../app/views/404.php";
        }
    }

    protected function load_model($model)//load models from the folder models
    {
        if(file_exists("../app/models/". $model .".php"))//if the file is found in models
        {
            require "../app/models/". $model .".php";//require the obove path
            return $model = new $model();
        }

        return false;
    }

    protected function redirect($link)
    {
        header("location:".ROOT.trim($link,"/"));
        die;
    }
}

?>