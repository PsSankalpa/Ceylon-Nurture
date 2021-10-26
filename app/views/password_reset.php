<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password </title>

        <link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/resetPasswordStyle.css">
    </head>
<body>
    <div class ="ResetPassword">
        <div class="container">
            <div class="main">
                 <div class="content">
                 
                    <?php
                        if(isset($_SESSION['status']))
                        {
                        ?>
                            <div class="sucess">
                            <h5><?= $_SESSION['status']; ?></h5>
                            </div>
                            <?php
                            unset($SESSION['status']);
                        }
                    ?>

                        <h2>Forgot Password</h2>
                        <hr><br>
                        <form action="./contoller/password_reset_code.php" method="POST">
                        <div class="row1">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="Enter Email Address">
                        </div><br>
                        <hr>
                        <div class="two-buttons">
                        <a href="login/login.php"><button type="button" class="back">Back</button></a>
                        <button type="submit" name="password_reset_link" class="btn" type="submit">Send Password Reset Link</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
