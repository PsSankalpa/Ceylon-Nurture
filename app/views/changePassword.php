<?php
// session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password </title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/resetPasswordStyle.css">
       
    </head>

    <body>
        <div class ="OTP-Verification">
        <div class="message">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
       
                <div class="container">  
                        <div class="content">
                        <?php
                            if(isset($_SESSION['status'])){
                            ?>
                                <div class="sucess">
                                    <h5><?= $_SESSION['status'];?></h5>
                                </div>
                            <?php
                                unset($_SESSION['status']);
                            }
                        ?>
                        <form class="changePassword_form" action="" method="post">
                        </br>
                        <h3>Enter New Password</h3>
                        <hr>
                        <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])){
                            echo $_GET['token'];
                        }?>">
                        <input type="email" name="email" class="email" placeholder="Email" value="<?php if (isset($_GET['email'])){
                            echo $_GET['email'];
                        }?>" required>
                        <input type="password" name="new_password" placeholder="New Password" required > 
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required > 
                        
                        <div class="buttons">
                        <a href="<?= ROOT ?>login/login">
                            <button class="button" type="submit" name="password_update">Update</button>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>