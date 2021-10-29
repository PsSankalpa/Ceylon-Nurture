<?php
// session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password </title>
        <link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/otpVerificationStyle.css">
    </head>

    <body>
        <div class ="OTP-Verification">
        <div class="message">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 

        <?php
        if(isset($_SESSION['status'])){
        ?>
            <div class="sucess">
                <h5><?= $_SESSION['status']; ?></h5>
            </div>
        <?php
            unset($_SESSION['status']);
        }
        ?>

                <div class="container">
                    <div class="main">
                        
                        <div class="content">
                       
                        <form action="" method="post">
                        </br>
                        <h4>Enter New Password</h4>
                        <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])){
                            echo $_GET['token'];
                        }?>">
                        <input type="text" name="email" class="email" placeholder="Email" value="<?php if (isset($_GET['email'])){
                            echo $_GET['email'];
                        }?>" required>
                        <input type="password" name="new_password" placeholder="New Password" required > 
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required > 
                        
                        <div class="two-buttons">
                        <a href="<?= ROOT ?>changePassword/newPassword">
                            <button class="btn" type="submit" name="password_update">Update</button>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
    </body>
</html>