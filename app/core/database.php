<?php

class Database
{
    public function db_connect()
    {
        try
        {
            $variables = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;//don't spaces between variables 
            return $db = new PDO($variables,DB_USER,DB_PASS);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function read($query,$data = [])
    {
        $db = $this->db_connect();
        $stm = $db->prepare($query);

        if(count($data)==0)//use this because some queries doesn't contain variables
        {
            $stm = $db->query($query);
            $check = 0;
            if($stm)
            {
                $check = 1;
            }
        }
        else
        {
            $check = $stm->execute($data);
        }
        
        if($check)
        {
            return $data = $stm->fetchAll(PDO::FETCH_OBJ);//fetch this as pdo object 
        }
        else
        {
            return false;
        }

    }

    public function write($query,$data = [])
    {
        $db = $this->db_connect();
        $stm = $db->prepare($query);

        if(count($data)==0)//use this because some queries doesn't contain variables
        {
            $stm = $db->query($query);
            $check = 0;
            if($stm)
            {
                $check = 1;
            }
        }
        else
        {
            $check = $stm->execute($data);
        }
        
        if($check)
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}

?>