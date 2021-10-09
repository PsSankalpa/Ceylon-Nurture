<?php
/**
 * Authentication class
 */

class  Auth
{
    public static function authenticate($row)
    {
        //code
        $_SESSION['COMMON_USER'] = $row;//create an object COMMON USER and store entire details of that user
    }

    public static function logout()
    {
        //code
        if(isset($_SESSION['COMMON_USER']))
        {
            unset($_SESSION['COMMON_USER']);
        }
    }

    public static function logged_in()//to check user is logged in
    {
        //code
        if(isset($_SESSION['COMMON_USER']))
        {
            return true;
        }
        return false;
    }

    public static function common_user()
    {
     
        if(isset($_SESSION['COMMON_USER']))
        {
            return $_SESSION['COMMON_USER']->fname;
        }
        return false;
    }

    public static function __callStatic($method,$params)//to call a method that not exist in Auth,params is an array
    {
        //$prop = strtolower(str_replace("get","",$method));//from this remove get and take the column name in the table in lower case

        $prop = $method;
        if(isset($_SESSION['COMMON_USER']))
        {
            return $_SESSION['COMMON_USER']->$prop;
        }
        return 'User';
    }

    public function finduser($sellerid = [],$doctorid = [],$patientid = [],$userid)
    {
        
        $userid = $_SESSION['COMMON_USER']->userid;
        
        if(isset($_SESSION['COMMON_USER']))
        {
            if($sellerid == $userid )
            {
                $data = "seller";
            }
            if($doctorid == $userid)
            {
                $data = "doctor";
            }
            if($patientid == $userid)
            {
                $data = "patient";
            }
            if( ($doctorid == $userid) &&($sellerid == $userid ))
            {
                $data = "doctorAndSeller";
            }
            if( ($doctorid == $userid )&& ($patientid == $userid ))
            {
                $data = "doctorAndPatient";
            }
            if( ($sellerid == $userid) && ($patientid == $userid ))
            {
                $data = "sellerAndPatient";
            }
            if(($sellerid == $userid)&& ($patientid == $userid)&& ($doctorid == $userid))
            {
                $data = "allUser";
            }
            
            return $data;
        }
    }

}




?>