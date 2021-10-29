<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Patient|Registration</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/registrationform.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">


    </head>

    <body id="body">

    
    <div class="container center">
        <h1 class="h1">Update as a Patient</h1>

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
                <label for="nic">NIC</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('nic')?>" id="nic" name="nic" placeholder="NIC">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="image" >Medical records</label>
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