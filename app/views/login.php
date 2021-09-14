<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php echo $data['page_title'] ?>
        </title>

        <link rel="stylesheet" href="<?=ASSETS?>css/loginStyle.css">
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs.js"></script>

        <link rel="stylesheet" href="<?ASSETS?>css/loginStyle.css">
        <script type="text/javascript" src="<?ASSETS?>js/sellerJs.js"></script>

    </head>

    <body>
        <?php $this->view("header",$data)?>
        <div class ="Login-form">
            <div class="container">
                <div class="main">
                   <div class="content">
                   <h2>Log In</h2>
                   <form action="" method="post">
                        <input type="text" name="name" placeholder="User Name" required > 
                        <input type="password" name="password" placeholder="Password" required > 
                        <button class="btn" type="submit">Log In</button>
                    </form>
                    <p class="account"><a href="#">Forgot password?</a></p>    
                    </br>
                    <p class="account">Don't have an account? <a href="#">Sign Up</a></p>
                    </div>
                        <div class="form-img">
                            <img src="../images/logo.png">
                        </div>
                </div>
            </div>
        </div>
    <?php $this->view("footer",$data)?>1.44
    </body>
</html>