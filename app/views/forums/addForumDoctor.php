<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Patient|Registration</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/forum.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/registrationForm.css">


    </head>

    <body id="body">

   
    
    <div class="container center">
        <h1>Add to Forum</h1>
        
        <?php if(count($errors) > 0):?>
                    <div class="alertwarning">
                    <button class="closebtn" onclick="closebutton()">&times;</button>
                        <strong>Errors!</strong>
                        <?php foreach($errors as $error):?>
                          <br><?=$error?>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
        <!--for the errors-->

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
            <div class="col-25">
                <label for="name">Name of the Doctor</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('name')?>" id="name" name="name" placeholder="Name of the Doctor">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('description')?>" id="description" name="description" placeholder="Write a Description">
            </div>
            </div>

           
            <div class="row">
            <div class="col-25">
                <label for="tpNumber">Telephone Number</label>
            </div>

            <div class="col-75">
            <input type="text" value="<?=get_var('tpNumber')?>" id="tpNumber" name="tpNumber" placeholder="TP Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="location">Location of the Doctor</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('location')?>" id="location" name="location" placeholder="Location of the Doctor">
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