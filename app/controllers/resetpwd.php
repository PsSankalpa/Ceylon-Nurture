<?php

use Mpdf\Tag\P;
use PHPMailer\PHPMailer\PHPMailer;

class resetpwd extends Controller
{
    function index()
    {

        $reset1 = new resetpassword();
        $commonuser = new common_user();

        //require php mailer
        require_once __DIR__ . '/../models/PHPMailer/src/PHPMailer.php';
        require_once __DIR__ . '/../models/PHPMailer/src/Exception.php';
        require_once __DIR__ . '/../models/PHPMailer/src/SMTP.php';

        $resetModel;
        $userModel;
        $mail;

        //setup phpmailer
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.mailtrap.io';
        $this->mail->SMTPAuth = true;
        $this->mail->Port = 2525;
        $this->mail->Username = 'd6641c4c72af1f';
        $this->mail->Password = 'a15c5de6910419';

        //send the email
        if (count($_POST) > 0) {

            $post1 = htmlspecialchars($_POST['email']);
            $userEmail = trim($post1);

            //will be used to query the user from the database
            $selector = bin2hex(random_bytes(8));
            //will be used for confirmationonce the database entry has been matched
            $token = random_bytes(32);
            //below is for validator
            $validator = bin2hex($token);

            $url = ROOT . '/resetpwd/resetpassword/' . $selector . '/' . $validator;
            //Expiration date will last for half an hour
            $expires = date("U") + 1800;

            //if there existing reset entry for the email we need to delete it
            if ($reset1->where('resetEmail', $userEmail)) {
                $reset1->delete2('resetEmail', $userEmail);
            }
            //hash the token
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);

            $arr['resetEmail'] = $userEmail;
            $arr['resetSelector'] = $selector;
            $arr['resetTocken'] = $hashedToken;
            $arr['resetExpires'] = $expires;


            //insert the data into reset password table
            $reset1->insert($arr);

            // print_r($arr);
            // die;

            //sending the email
            $subject = "Reset your password";
            $message = "<p>We recieved your password reset request.</p>";
            $message .= "<p>Here is your password reset link:</p>";
            $message .= "<a href=" . $url . ">" . $url . "</a>";

            $this->mail->setFrom('ceylonnurture@gmail.com');
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;
            $this->mail->addAddress($userEmail);

            //send the email
            $this->mail->send();


            $this->redirect('landing');
        }

        $this->view('login/passwordreset', [
            // 'row' => $row,
            // 'rows' => $data1,
        ]);
    }

    public function resetpassword($selector = null, $validator = null)
    {

        $reset1 = new resetpassword();
        // print_r($selector);
        // print_r("reset");
        // print_r($validator);
        // die;

        //to check the selector and validator and load the view
        if ($selector == null || $validator == null) {
            echo "could not validate the password";
            $this->redirect2('login');
        } else {
            $selector1 = $selector;
            $validator1 = $validator;

            $arr['selector'] = $selector;
            $arr['validator'] = $validator1;


            //----------------------------------------------------------

            if (ctype_xdigit($selector) && ctype_xdigit($validator)) {

                //check the expire date
                $currentDate = date("U");
                $query = "select * from resetpassword where resetSelector = :selector1 and resetExpires >= :currentDate";
                $arr2['selector1'] = $arr['selector'];
                $arr2['currentDate'] = $currentDate;
                $check1 = $reset1->query($query, $arr2);

                // print_r($currentDate);
                //     print_r($check1);
                //     die;

                if (empty($check1)) {
                    echo "Sorry Link no longer valid";
                    $this->redirect2('login');
                } else {
                    $check1 = $check1[0];
                    // print_r($check1);
                    // die;
                }

                $errors = array();
                //after submit the password-----------------------
                if (count($_POST) > 0) {
                    $commonuser = new common_user();
                    

                    // $arr3['password'] = htmlspecialchars($_POST['new_password']);
                    // $arr['re-password'] = htmlspecialchars($_POST['confirm_password']);

                    $tokenBin = hex2bin($arr['validator']);
                    $tokenCheck = password_verify($tokenBin, $check1->resetTocken);
                    if (!$tokenCheck) {
                        echo "You need to resubmit your reset request";
                        $this->redirect2('login');
                    } else {
                        $rEmail = $check1->resetEmail;

                        if ($commonuser->validate3($_POST)) {

                            $arr3['password'] = htmlspecialchars(password_hash($_POST['new_password'],PASSWORD_DEFAULT));
                            
                            $commonuser->update2($rEmail, $arr3);
                            //print_r($_POST);
                            $this->redirect('login');
                        } else {
                            //errors
                            $errors = $commonuser->errors;
                        }
                    }
                }

                //neeed to put the change password view
                $this->view('login/changePassword', [
                    'errors' => $errors,
                ]);
            } else {
                echo "Could not validate your email";
                $this->redirect2('login');
            }
        }
    }
}
