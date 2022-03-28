<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Users</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/adminUserStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">

    </head>

    <body id="body">
    <button class="backbtn"><a href="<?=ROOT?>admin/users">&times;</a></button>

    <div class="container center">
            <div class="containerA">
                <div class="main">
                    <div class="content"> 
                        <h2>Update User</h2>
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
                        <form method="post">
                            <input  type="text" value="<?=get_var('nameWithInitials',$row->nameWithInitials)?>" name="nameWithInitials" placeholder="Name with Initials" > 
                            <input  type="text" value="<?=get_var('username',$row->username)?>" name="username" placeholder="User Name"  > 
                            <select name="gender">
                            <option <?=get_select('gender',$row->gender)?> value="<?=$row->gender?>"><?=ucwords($row->gender)?></option>  
                            <option>Male</option>
                            <option>Female</option>                                 
                            </select>
                            <input  type="email" value="<?=get_var('email',$row->email)?>" name="email" placeholder="E-mail address"  >
                            <input  type="tel" value="<?=get_var('tpNumber',$row->tpNumber)?>" name="tpNumber" placeholder="Telephone Number" > 
                            <!--<input type="password" value="<?=get_var('password')?>"  id="psw" name="password" placeholder="Password"  > 
                            
                            <input type="password" value="<?=get_var('password2')?>" name="password2" placeholder="Re-type Password"  >-->
                            <input class="addUserButton" type="submit" value="Update User">
                          
                        </form>
                        <?php else:?>
                    The User is not Found!
                <?php endif;?>
                    </div>
                </div>
            </div>
        </div> 
        <script type="text/javascript" src="<?=ASSETS?>js/password"></script>     
        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>        
    </body>
</html>