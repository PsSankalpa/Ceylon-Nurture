<!DOCTYPE html>
<html>
<head>
<title>Ceylon Nurture|Doctor|Registration</title>
<?php $this -> view ("header",$data)?>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/registrationform.css">
</head>

<body class="regi">

    
    <div class="container center">
        <h1>Update as a Doctor</h1>

         <!--for the errors-->
         <?php if(count($errors) > 0 ):?>
        <div class="alertwarning">
        <button class="closebtn" onclick="closebutton()">&times;</button>   
            <strong>Error!</strong> 
            <?php foreach($errors as $error ):?>
                <br /><?=$error?>
            <?php endforeach;?>
        </div>
        <?php endif;?>

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
            <div class="col-25">
                <label for="nameWithInitials">Name With Initials</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('nameWithInitials')?>" id="nameWithInitials" name="nameWithInitials" placeholder="Name With Initials">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="gender">Gender</label>
            </div>

            <div class="col-75">
            <p class="gender">
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female</p>
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="DOB">Date Of Birth</label>
            </div>
            <div class="col-75">
            <input type="date" id="dob" name="dob" >
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="regNo">Registration Number</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('registrationNumber')?>" id="registrationNumber" name="registrationNumber" placeholder="Fill your Medical Registration Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="specialities">Specialities</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('specialities')?>" id="specialities" name="specialities" placeholder="Specialities">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="Hospital">Hospital</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('hospital')?>" id="hospital" name="hospital" placeholder="Hospital">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="City">City</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('city')?>" id="city" name="city" placeholder="City">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="Address">Address</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('address')?>" id="address" name="address" placeholder="Address">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="image" >Qualifications</label>
            </div>
            <div class="col-75">
            <input type="file" id="image" value="<?=get_var('image')?>" name="image">
            </div>
            </div>

            <div class="row">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            </div>
        </form>
    </div>
    </body>
</html>

