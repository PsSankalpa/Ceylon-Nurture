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
                        <hr><br>
                        <div class="row1">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" name="email" placeholder="Email Address">
                        </div><br>
                        <hr>
                        <div class="two-buttons">
                        <button class="btn" type="submit"><a href="<?=ROOT?>login/otpCodeSent">Send Password Reset Link</a></button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>