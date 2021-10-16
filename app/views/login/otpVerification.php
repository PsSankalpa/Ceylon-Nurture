<html>
    <head>
        <title>Reset Password </title>
        <link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/otpVerificationStyle.css">
    </head>

    <body>
           <div class ="OTP-Verification">
        <div class="message">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <p><strong>Sucessfully Sent!</strong> We have sent a 4 digit code to your email address for verification. Please enter the code here.</p>
        </div>
                <div class="container">
                    <div class="main">
                        
                        <div class="content">
                        <h3>To verify your email address .....@gmail.com , we have sent a 4 digit code to your email.
                             Enter the code in the OTP box.</h3>
                        <form action="" method="post">
                        </br>
                        <label>OTP</label>
                        <input type="number" name="OTP" placeholder="Enter the OTP Code" required > 
                        <div class="two-buttons">
                        <button class="btn" type="submit"><a href="<?=ROOT?>login">Confirm</a></button>
                        <a href="<?=ROOT?>login/resetPassword.php">Resend OTP</a>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>