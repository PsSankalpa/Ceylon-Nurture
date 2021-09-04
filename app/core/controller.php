<?php 

class Controller
{
    protected function view($view)//reads from the views
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

    protected function loadModel($model)//load models from the folder models
    {
        if(file_exists("../app/models/". $model .".php"))//if the file is found in models
        {
            include "../app/models/". $model .".php";//include the obove path
            return $model = new $model();
        }

        return false;
    }
}

?>