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

    public function finduser()
    {
        $seller = new sellers();
        $doctor = new doctors();
        $patient = new patients();
        if(isset($_SESSION['COMMON_USER']))
        {
            $userid = $_SESSION['COMMON_USER']->userid;

            if($seller->where('userid',$userid))
            {
                return "seller";
            }
            elseif($doctor->where('userid',$userid))
            {
                return "doctor";
            }
            elseif($patient->where('userid',$userid))
            {
                return "patient";
            }
            elseif( ($doctor->where('userid',$userid)) && ($seller->where('userid',$userid)) )
            {
                return "doctorAndSeller";
            }
            elseif( ($doctor->where('userid',$userid)) && ($patient->where('userid',$userid)) )
            {
                return "doctorAndPatient";
            }
            elseif( ($seller->where('userid',$userid)) && ($patient->where('userid',$userid)) )
            {
                return "sellerAndPatient";
            }
            elseif( ($seller->where('userid',$userid)) && ($patient->where('userid',$userid)) && ($doctor->where('userid',$userid)))
            {
                return "allUser";
            }
        }
    }

}




?>