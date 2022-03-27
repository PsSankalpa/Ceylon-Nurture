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
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 2525;
        $this->mail->Username = '4bb96c18776356';
        $this->mail->Password = '45a854d2d60f4c';
        
    }

    public function sendEmail(){
        //Santize POST data
       /* $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $userEmail = trim($_POST['email']);

        if(empty($userEmail)){
            flash("reset", "Please input email");
            $this->redirect('admin/users');
        }

        if(!filter_var($userEmail,FILTER_VALIDATE_EMAIL)){
            flash("reset", "Please input email");
            redirect("../password_reset.php");  
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