<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Add New User</title>
        
        <link rel="stylesheet" href="<?=ASSETS?>css/adminStyle1.css">

    </head>

    <body>
    <div class="bg_image_container">
        <img class="bg_image" src="<?=ASSETS?>img/admin.jpg">
    </div>

        <div class ="addNewUser_content">
                    <h2> Update User</h2>
                    <?php if(count($errors) > 0):?>
                    <div class="alertwarning">
                    <button class="closebtn" onclick="closebutton()">&times;</button>
                        <strong>Errors!</strong>
                        <?php foreach($errors as $error):?>
                          <br><?=$error?>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>

                    <?php if($row):?>
                    <form class="addNewUser_form" method="post">
                    <input  type="text" value="<?=get_var('fname',$row->fname)?>" name="fname" placeholder="First Name"  > 
                    <input  type="text" value="<?=get_var('lname',$row->lname)?>" name="lname" placeholder="Last Name" > 
                    <input  type="text" value="<?=get_var('username',$row->username)?>" name="username" placeholder="User Name"  > 
                    <input  type="email" value="<?=get_var('email',$row->email)?>" name="email" placeholder="E-mail address"  >
                    <input  type="tel" value="<?=get_var('tpNumber',$row->tpNumber)?>" name="tpNumber" placeholder="Telephone Number" > 
                    <input type="password" value="<?=get_var('password')?>" name="password" placeholder="Password"  > 
                    <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password"  > 
                    <input class="addUserButton" type="submit" value="Update User">
                    <input class="addUserButton" type="reset" value="Reset"> 
                    <input class="addUserButton" type="reset" value="Cancel">

                </form>
                <?php else:?>
                    The User is not Found!
                <?php endif;?>
                    </div>
     
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>        
    </body>
</html>