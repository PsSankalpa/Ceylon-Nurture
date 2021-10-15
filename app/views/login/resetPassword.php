<html>
    <head>
        <title>Reset Password </title>
        <link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/resetPasswordStyle.css">
    </head>

    <body>
           <div class ="ResetPassword">
                <div class="container">
                    <div class="main">
                        <div class="content">
                        <h2>Reset Your Password</h2>
                        <hr>
                        <p>Send a code to your email address ...... to reset your password</p>
                       <!-- <img src="./images/user.png" style="width:200px">-->
                        <hr>
                        <div class="two-buttons">
                        <button class="btn" type="submit"><a href="<?=ROOT?>login/otpCodeSent">Continue</a></button>
                        <button class="btn" type="submit"><a href="<?=ROOT?>login/forgotPassword">Not You</a></button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>