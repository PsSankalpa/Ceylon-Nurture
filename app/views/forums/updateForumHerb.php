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
        <h1>Update Forum</h1>
        
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
        
        <?php if($row):?>

        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
            <div class="col-25">
                <label for="name">Name of the Doctor</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('name',$row[0]->name)?>"  name="name" placeholder="Name of the Doctor">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>

            <div class="col-75">
                <input type="text" value="<?=get_var('description',$row[0]->description)?>" id="description" name="description" placeholder="Write a Description">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="image" >Medical records <br> <p style="font-size:14px; color:#05445E;"> (Format:UserName_MedicalRecord)</p></label>
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

        <?php else:?>
                    The Forum is not Found!
                <?php endif;?>
    </div>

    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>        

    </body>
</html>