<!--<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reset Password </title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/resetPasswordStyle.css">
    </head>
<body>
    <div class ="ResetPassword">
        <div class="container">
            <div class="main">
                 <div class="content">
                 
                    <?php
                    if (isset($_SESSION['status'])) {
                    ?>
                            <div class="sucess">
                            <h4><?= $_SESSION['status']; ?></h4>
                            </div>
                            <?php
                            //unset($SESSION['status']);
                        }
                            ?>
                        <h2>Forgot Password</h2>
                        <hr><br>
                        <form action="" method="POST">
                        <div class="row1">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="Enter Email Address">
                        </div><br>
                        <hr>
                        <div class="two-buttons">
                        <a href="login/login.php"><button  class="btn">Back</a></button>
                        <button type="submit" name="password_reset_link" class="btn" required >Send Password Reset Link</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>-->

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reset Password </title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/resetPasswordStyle.css">
</head>

<body>
    <div class="ResetPassword">
        <div class="container">
            <div class="main">
                <div class="content">
                <h2>Forgot Password</h2>
                        <hr><br>
                    <form action="./controllers/ResetPasswords.php" method="POST">
                        <input type="hidden" name="type" value="send">
                        <div class="row1">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" name="email" placeholder="Enter Email Address">
                        </div><br>
                        <hr>
                        <div class="two-buttons">
                            <a href="login/login.php"><button class="btn">Back</a></button>
                            <button type="submit" name="password_reset_link" class="btn" required>Send Password Reset Link</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>