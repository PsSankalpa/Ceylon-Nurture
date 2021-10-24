<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Add New User</title>
        
        <link rel="stylesheet" href="<?=ASSETS?>css/adminStyle1.css">

    </head>

    <body class="bg">
   

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
                    <input  type="text" value="<?=get_var('nameWithInitials',$row->nameWithInitials)?>" name="nameWithInitials" placeholder="Name with Initials" > 
                    <input  type="text" value="<?=get_var('fname',$row->fname)?>" name="fname" placeholder="First Name"  > 
                    <input  type="text" value="<?=get_var('lname',$row->lname)?>" name="lname" placeholder="Last Name" > 
                    <input  type="text" value="<?=get_var('username',$row->username)?>" name="username" placeholder="User Name"  >
                    <select name="gender">
                        <option value="<?=get_var('gender',$row->gender)?>">--Select a Gender--</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <input type="date" value="<?=get_var('dob',$row->dob)?>" id="dob" name="dob" > 
                    <input  type="email" value="<?=get_var('email',$row->email)?>" name="email" placeholder="E-mail address"  >
                    <input  type="tel" value="<?=get_var('tpNumber',$row->tpNumber)?>" name="tpNumber" placeholder="Telephone Number" > 
                   <!-- <input type="password" value="<?=get_var('password')?>" name="password" placeholder="Password"  > 
                    <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password"  > -->
                    <input class="addUserButton" type="submit" value="Update User">
                    <input class="addUserButton" type="reset" value="Reset"> 
                    <button  class="addUserButton" onclick="goBack()"> Back </button>

                </form>
                <?php else:?>
                    The User is not Found!
                <?php endif;?>
                    </div>
     
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script> 
        
        <script>
            function goBack() {
            window.history.back();
            }
        </script>
    </body>
</html>