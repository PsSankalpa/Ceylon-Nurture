<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|SignUp Page</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/signupStyle.css">
    </head>

    <body>
    <button class="backbtn"><a href="<?=ROOT?>home">&times;</a></button>
        <div class ="Signup-form">
            <div class="container">
                <div class="main">
                    <div class="content"> 
                        <h2>Sign Up</h2>
                        <?php if(count($errors) > 0):?>
                        <div class="alertwarning">
                            <button class="closebtn" onclick="closebutton()">&times;</button>
                            <strong>Errors!</strong>
                            <?php foreach($errors as $error):?>
                            <br><?=$error?>
                            <?php endforeach;?>
                        </div>
                        <?php endif;?>
                        <form method="post">
                            <input  type="text" value="<?=get_var('nameWithInitials')?>" name="nameWithInitials" placeholder="Name with Initials"  > 
                            <input  type="text" value="<?=get_var('fname')?>" name="fname" placeholder="First Name"  > 
                            <input  type="text" value="<?=get_var('lname')?>" name="lname" placeholder="Last Name" > 
                            <input  type="text" value="<?=get_var('username')?>" name="username" placeholder="User Name"  > 
                            <select name="gender">
                                <option>--Select a Gender--</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <input type="date" value="<?=get_var('dob')?>" id="dob" name="dob" >
                            <input  type="email" value="<?=get_var('email')?>" name="email" placeholder="E-mail address"  >
                            <input  type="tel" value="<?=get_var('tpNumber')?>" name="tpNumber" placeholder="Telephone Number" > 
                            <input type="password" value="<?=get_var('password')?>"  id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Password"  > 
                            <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
                            <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password"  > 
                            <button class="submitbtn">Submit</button>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div> 
        <script type="text/javascript" src="<?=ASSETS?>js/password"></script>     
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>        
    </body>
</html>