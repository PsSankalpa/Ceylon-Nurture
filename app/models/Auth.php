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

    public static function authenticate2($row)
    {
        //code
        $_SESSION['ADMIN'] = $row;//create an object ADMIN and store entire details of that user
    }

    public static function logout()
    {
        //code
        if(isset($_SESSION['COMMON_USER']))
        {
            unset($_SESSION['COMMON_USER']);
        }

        if(isset($_SESSION['ADMIN']))
        {
            unset($_SESSION['ADMIN']);
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

    public static function logged_in_admin()//to check user is logged in
    {
    if(isset($_SESSION['ADMIN']))
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

    public static function admin()
    {
     
        if(isset($_SESSION['ADMIN']))
        {
            return $_SESSION['ADMIN']->fname;
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
            die;
        }
        //if(isset($_SESSION['ADMIN']))
        //{
        //    return $_SESSION['ADMIN']->$prop;
//}

        return 'Admin';

    }

   

    public function finduser()
    {
        $seller = new sellers();
        $doctor = new doctors();
        $patient = new patients();
        $userid = Auth::userid();

        //sellerid
        if(!empty($row = $seller->where('userid',$userid) ))
        {
           $row = $row[0];
           $sellerid = $row->userid;
        }
        else{
           $sellerid = "";
        }

        //dotctorid
        if(!empty($row2 = $doctor->where('userid',$userid) ))
        {
           $row2 = $row2[0];
           $doctorid = $row2->userid;
        }
        else{
           $doctorid = "";
        }

        //patientid
        if(!empty($row3 = $patient->where('userid',$userid) ))
        {
           $row3 = $row3[0];
           $patientid = $row3->userid;
        }
        else{
           $patientid = "";
        }
        
        $userid = $_SESSION['COMMON_USER']->userid;

        
        $data="none";

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