<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php echo $data['page_title'] ?>
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/signupStyle.css">
    </head>

    <body>
        <?php $this->view("header",$data)?>
        <div class ="Signup-form">
            <div class="container">
                <div class="main">
                    <div class="content">
                    <h2>Sign Up</h2>
                    <form action="" method="post">
                        <input type="text" name="name" placeholder="Full Name" required > </br>
                        <input type="text" name="email" placeholder="E-mail address" required > 
                        <input type="password" name="password" placeholder="Password" required > 
                        <input type="tel" name="phone" placeholder="Telephone Number" pattern="[0-9]{10}" required>
                        <!--<input type="checkbox" name="conditions">-->I agree to <a href='#'>Terms of conditions and privacy policy</a></form>
                        <button class="btn" type="submit">Sign Up</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>         
        <?php $this->view("footer",$data)?>1.44
    </body>
</html>