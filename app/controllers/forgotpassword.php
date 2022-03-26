<?php
class forgotpassword extends Controller
{
    function index()
    {
        //assigning the mode 1
        $mode = "enter_email";
        if(isset($_GET['mode'])){//check whether the get variable is set
           $mode = $_GET['mode']; //require the mode in what ever the mode is at the time of get variable 
         } 

        //something is posted
        if(count($_POST) > 0){
            switch($mode) {
                case 'enter_email':
                    //code
                break;

                case 'enter_code':
                    //code
                break;

                case 'enter_password':
                    //code
                break;

                default:
                    //code
                break; 
            }
        }
        $this->view("login/forgotPassword"); 
    }
}