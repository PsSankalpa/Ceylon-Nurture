<!DOCTYPE html>
<html>
    <head>
        <title>Delete User</title>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/adminUserStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">

    </head>

    <body id="body">
    <button class="backbtn"><a href="<?=ROOT?>home">&times;</a></button>

    <div class="container center">
            <div class="container">
                <div class="main">
                    <div class="content"> 
                        <h2>Delete User</h2>
                        
                        <?php if($row):?>
                        <form method="post">
                            <input disabled type="text" value="<?=get_var('nameWithInitials',$row->nameWithInitials)?>" name="nameWithInitials" placeholder="Name with Initials" > 
                            <input disabled type="text" value="<?=get_var('fname',$row->fname)?>" name="fname" placeholder="First Name"  > 
                            <input disabled type="text" value="<?=get_var('lname',$row->lname)?>" name="lname" placeholder="Last Name" > 
                            <input disabled type="text" value="<?=get_var('username',$row->username)?>" name="username" placeholder="User Name"  > 
                            <select disabled name="gender">
                            <option <?=get_select('gender',$row->gender)?> value="<?=$row->gender?>"><?=ucwords($row->gender)?></option>                        
                            </select>
                            <input disabled type="date" value="<?=get_var('dob',$row->dob)?>" id="dob" name="dob" >
                            <input disabled type="email" value="<?=get_var('email',$row->email)?>" name="email" placeholder="E-mail address"  >
                            <input disabled type="tel" value="<?=get_var('tpNumber',$row->tpNumber)?>" name="tpNumber" placeholder="Telephone Number" > 
                            <input type="hidden" name="id">
                            <input class="addUserButton" type="submit" value="Delete User">
                          
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