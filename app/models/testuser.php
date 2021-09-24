<?php

class user
{

    function login($POST)
    {
        $db = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username'])&&isset($POST['username']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $query = "select # from users where username = :username && password = :password limit 1";
            $data = $db->read($query,$arr);//return array of objects
            if (is_array($data))//check if the data come as an array
            {
                //logged in, and these returned things are objects
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address; 
            }
            else
            {
                $_SESSION['error'] = "please enter valid user name and password";
            }
        }
        else
        {
            $_SESSION['error'] = "wrong user name or password";
        }
        
    }

    function register($POST)
    {
        $db = new database();

        $_SESSION['error'] = "";
        if(isset($POST['username'])&&isset($POST['password']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $arr['email'] = $POST['email'];

            $query = "insert into users (username,password,email) values(:username,:password,:email)";
            $data = $db->write($query,$arr);//return array of objects
            if ($data)//check if the data come as an array
            {
                 header("Location:".ROOT."seller");
                 die;
            }
        }
        else
        {
            $_SESSION['error'] = "";
        }
    }

    function check_logged_in($POST)
    {
        if(isset($_SESSION['user_url']))
        {
            $db = new database();
            $arr['user_url'] = $_SESSION['user_url'];

            $query = "select # from users where url_address = :user_url limit 1";
            $data = $db->read($query,$arr);//return array of objects
            if (is_array($data))//check if the data come as an array
            {
                //logged in, and these returned things are objects
                $_SESSION['user_id'] = $data[0]->userid;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address; 

                return true;
            }
        }
        return false;
    }
}