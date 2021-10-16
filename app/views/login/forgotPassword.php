<html>
    <head>
        <title>Forgot Password</title>
        <link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/forgotPwdStyle.css">
    </head>

    <body>
           <div class ="ForgotPwd-form">
                <div class="container">
                    <div class="main">
                        <div class="content">
                        <h2>Forgot Password</h2>
                        <form action="includes/forgotPasword.inc.php" method="post">
                        <input type="text" name="name" placeholder="User Name" required > 
                        <input type="email" name="email" placeholder="Email- Address" required > 
                        <button class="btn" type="submit"><a href="<?=ROOT?>login/resetPassword">Submit</a></button>
                        </form>
                        </div>
                            <div class="form-img">
                            <img src="<?=ASSETS?>img/logo.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>