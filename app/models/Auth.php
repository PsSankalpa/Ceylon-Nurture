<?php
/**
 * Authentication class
 */

class  Auth
{
    public static function authenticate($row)
    {
        //code
        $_SESSION['COMMON_USER'] = $row;
    }

    public static function logout()
    {
        //code
        if(isset($_SESSION['COMMON_USER']))
        {
            unset($_SESSION['COMMON_USER']);
        }
    }

    public static function logged_in()
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

}




?>