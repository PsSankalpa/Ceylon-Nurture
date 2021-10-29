<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Seller|Registration</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/registrationform.css">

    </head>

    <body id="body">

    
    <div class="container center">
        <h1 class="h1">Update as a Seller</h1>

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
                <label for="registrationNumber">Registration Number</label>
            </div>
            <div class="col-75">
                <input type="text" value="<?=get_var('registrationNumber')?>" id="registrationNumber" name="registrationNumber" placeholder="Registration Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="tpNumber">TP Number</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('tpNumber')?>" id="tpNumber" name="tpNumber" placeholder="TP Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="nic">NIC</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('nic')?>" id="nic" name="nic" placeholder="NIC">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="address">Address</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('address')?>" id="address" name="address" placeholder="Address">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="image" >Image of the Certificate</label>
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

    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
    
    </body>
</html>