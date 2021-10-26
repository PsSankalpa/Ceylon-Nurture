<?php
session_start();

  //require_once("core/database.php");
  require "../app/dbcon.php";

   function password_reset()
    {
      
        $common_user = new common_user();
        //$resetPassword = new resetPassword();

        $this->view("password_reset"); //in here put the relevent page name and the path
    }

    function send_password_reset($get_email,$token)
    {
        $to_email = "$get_email";
        $subject  = 'Reset the Account Password';
        $body  = "Hi, We received a request to reset your account password.If you want to reset your password,Please click the link below

        <a href='http://localhost/Grp12/public/login/changePassword.php?token=$token&email=$get_email'>Click Me</a>

                CEYLON NURTURE
        ";

        $headers  = "From:ceylonnurture@gmail.com";
                               
        if(mail($to_email, $subject, $body, $headers))
        {
            echo'<script>alert("Email sucessfully sent to $to_email...")</script>';
        }else{
            echo '<script>console.log("Email sending Failed")</script>';
        }
    }
    //Sending the token for password reset

    if(isset($_POST['password_reset_link']))
    {
        $email = mysqli_real_escape_string($mysql,$_POST['email']);
        $token = md5(rand()); //This will create random alphabet numbers

        //checking the email from the database
        $check_email = "SELECT email FROM common_user WHERE email='$email' LIMIT 1";
        $check_email_run = mysqli_query($mysql, $check_email);

        if(mysqli_num_rows($check_email_run) > 0)
        {
            $row = mysqli_fetch_array($check_email_run);
           // $get_name = $row['nameWithInitials'];
            $get_email = $row['email'];

            $update_token = "UPDATE common_user SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
            $update_token_run = mysqli_query($mysql, $update_token);

                if($update_token_run)
                {
                    send_password_reset(/*$get_name,*/$get_email,$token);
                    echo 'Hello';
                    $_SESSION['status'] = "We have sent an email containing a password reset link";
                    header("location:../password_reset.php");
                    //exit(0);
                }else{

                    $_SESSION['status'] = "Something Went Wrong. #1";
                    header("location:../password_reset.php");
                    //exit(0);
                }
            }else{
                $_SESSION['status'] = "No Email Found";
                header("location:../password_reset.php");
                //exit(0);
            }
        }
         //Updating a new password
    if(isset($_POST['password_update']))
    {
        $email = mysqli_real_escape_string($mysql,$_POST['email']);
        $new_password = mysqli_real_escape_string($mysql, $_POST['new_password']);
        $confirm_password = mysqli_real_escape_string($mysql, $_POST['confirm_password']);

        $token =mysqli_real_escape_string($mysql, $POST['password_token']);

        if(!empty($token))
        {
            if(!empty($email) && !empty($new_password) && $confirm_password)
            {
                $check_token = "SELECT verify_token FROM common_user WHERE verify_token='$token' LIMIT 1";

                $check_token_run = mysqli_query($mysql, $check_token);

                if(mysqli_num_rows($check_token_run) > 0)
                {
                    if($new_password == $confirm_password){
                        $update_password_run = "UPDATE common_user SET password = '$new_password' WHERE verify_token='$token' LIMIT 1";
                        $update_to_new_token_run = mysqli_query($mysql, $update_to_new_token);

                        if($update_password_run){
                            $new_token = md5(rand());
                            $update_to_new_token = "UPDATE common_user SET verify_token = '$new_token' WHERE verify_token = '$token' LIMIT 1";
                            $update_to_new_token_run = mysqli_query($mysql, $update_to_new_token);

                            $SESSION['status'] = "Password sucessfully updated";
                            header("location: ..login/login.php");
                        }else{ 
                            $_SESSION['status'] = "Did not update password.Something went wrong";
                            header("location: ../changePassword.php?token=$token&email=$email");
                        }
                    }else{
                        $_SESSION['status'] = "Did not update password.Something went wrong";
                        header("location: ../changePassword.php?token=$token&email=$email");
                    } 
                }else{
                    $_SESSION['status'] = "Passwordand Confirm Password does not match!";
                    header("location: ../changePassword.php?token=$token&email=$email");
                }
            } else{
                $_SESSION['status'] = "Invalid Token";
                header("location: ../changePassword.php?token=$token&email=$email");
            } 
        }else{
            $_SESSION['status'] = "All fields are required";
            header("location: ../changePassword.php?token=$token&email=$email");                       
        }
    }

?>