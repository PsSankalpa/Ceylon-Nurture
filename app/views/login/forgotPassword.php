<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/forgotPwdStyle.css">
</head>

<body>
    <div class="ForgotPwd-form">
        <div class="container">
            <div class="main">
                <div class="content">
                    <?php
                    if(count($_POST) > 0){
                        switch($mode) {
                            case 'enter_email':
                            //code
                            ?>
                            <form method="post" action="forgot.php?mode=enter_email>
                            <h2>Forgot Password</h2>
                            <h3>Enter the Email Address</h3>
                            <input type="email" name="email" placeholder="Email- Address" required>
                            <input type="submit"><a href="<?= ROOT ?>login/resetPassword">Submit</a></button>
                            </form>
                            <?php
                             break;

                             case 'enter_code':
                            //code
                            ?>
                            <form method="post" action="forgot.php?mode=enter_code">
                            <h2>Forgot Password</h2>
                            <h3>Enter your code sent to your email address</h3>
                            <input type="text" name="code" placeholder="12345"><br>
                            <input type="submit" value="Next" style="float: right;">
                            <a href="forgotpassword.php">
                            <input type="button" value="Start Over">
                            </a>
                            <br><br>
                            <div><a href="<?= ROOT ?>login/login.php"></a></div>
                            </form>
                            <?php
                             break;

                            case 'enter_password':
                            //code
                            ?>
                            <form method="post" action="forgot.php?mode=enter_code">
                            <h2>Forgot Password</h2>
                            <h3>Enter your code sent to your email address</h3>
                            <input type="text" name="text" placeholder="12345"><br>
                            <input type="text" name="text" placeholder="12345"><br>
                            <input type="submit" value="Next" style="float: right;">
                            <a href="forgotpassword.php">
                            <input type="button" value="Start Over">
                            </a>
                            <br><br>
                            <div><a href="<?= ROOT ?>login/login.php"></a></div>
                            </form>
                            <?php
                             break;

                            default:
                            //code
                             break;
                        }
                    }
                    ?>
                    <form action="post" target="_self">
                        <h2>Forgot Password</h2>
                        <h3>Enter the Email Address</h3>
                        <input type="email" name="email" placeholder="Email- Address" required>
                        <button class="btn" type="submit"><a href="<?= ROOT ?>login/resetPassword">Submit</a></button>
                    </form>
                </div>
                <div class="form-img">
                    <img src="<?= ASSETS ?>img/logo.png">
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>