<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once '../models/ResetPassword.php';
//require_once '../models/ResetPassword.php';
require_once '../models/common_user.php';
//Require PHP Mailer
require_once '../PHPMailer/src/PHPMailer.php';
require_once '../PHPMailer/src/Exception.php';
require_once '../PHPMailer/src/SMTP.php';

class ResetPasswords{
    private $resetModel;
    private $userModel;
    private $mail;

    public function __construct()
    {
        $this->resetModel = new ResetPasswords;
        $this->userModel  = new common_user;
        $this-> mail = new PHPMailer();
        $this->hpmailer->isSMTP();
        $this->Host = 'smtp.mailtrap.io';
        $this->SMTPAuth = true;
        $this->Port = 2525;
        $this->Username = 'fd0f062a7ad592';
        $this->Password = 'a4109516d7f235';
    }

    public function sendEmail(){
        //Santize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $userEmail = trim($_POST['email']);

        /*if(empty($userEmail)){
            flash("reset", "Please input email");
            redirect("../reset-password.php");
        }

        //if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            flash("reset", "Please input email");
            redirect("../reset-password.php");  
        }*/
    }
}

$init = new ResetPasswords;

//Ensure that user is sending a post request
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'send':
            $init->sendEmail();
            break;

    }

}else{
    header("location: ../index.php");
}
?>