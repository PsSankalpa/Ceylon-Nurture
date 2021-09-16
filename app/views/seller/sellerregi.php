<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Seller|Registration</title>
        <?php $this -> view ("header",$data)?>
        
    </head>

    <body class="regi">

    <?php  print_r($data['errors']); ?>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/sellerStyle">
    <link rel="stylesheet" href="<?=ASSETS?>css/common.css">

    <div class="container center">
        <h2>Update as a Seller</h2>
        <hr>
        <form class="regi_form" method="POST">

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
                <label for="image">Image of the Certificate</label>
            </div>
            <div class="col-75">
            <input type="file" id="image" name="image" placeholder="Address">
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