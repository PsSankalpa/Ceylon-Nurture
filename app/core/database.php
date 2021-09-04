<?php

class Database
{
    public function db_connect()
    {
        try
        {
            $variables = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;//don't spaces between variables 
            $db = new PDO($variables,DB_USER,DB_PASS);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //1.17.29
}

?>