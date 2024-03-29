<?php
// session_start();
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password </title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="<?= ASSETS ?>css/resetPasswordStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/addSchedule.css">

</head>

<body>
    <div class="OTP-Verification">
        <div class="message">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>

            <div class="container">
                <div class="content">

                    <form class="changePassword_form" action="" method="post">
                        </br>
                        <h3>Enter New Password</h3>
                        <hr>

                        <!--for the errors-->
                        <?php if ($errors) : ?>
                            <div class="alertwarning">
                                <button class="closebtn" onclick="closebutton()">&times;</button>
                                <strong>Error!</strong>
                                <?php foreach ($errors as $error) : ?>
                                    <br /><?= $error ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-25">
                                <label for="New Password">New Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" name="new_password" placeholder="New Password" required> </br>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Confirm Password">Confirm Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" name="confirm_password" placeholder="Confirm Password" required> </br>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="button" type="submit" name="password_update">Update</button>
                        </div>
                        </br>
                        <div class="login-container">
                            <a href="<?= ROOT ?>login/login">Log In</a>
                        </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs"></script>
</body>

</html>