<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Patient|Registration</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/forum.css">

    </head>

    <body class="regi">

   
    
    <div class="container center">
        <h1>Delete Forum</h1>
        
        
        <hr>
        
        <?php if($row):?>

        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
            <div class="col-25">
                <label for="name">Name of the Doctor</label>
            </div>

            <div class="col-75">
                <input disabled type="text" value="<?=get_var('name',$row[0]->name)?>"  name="name" placeholder="Name of the Doctor">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>

            <div class="col-75">
                <input disabled type="text" value="<?=get_var('description',$row[0]->description)?>" id="description" name="description" placeholder="Write a Description">
            </div>
            </div>

           
            <div class="row">
            <div class="col-25">
                <label for="tpNumber">Telephone Number</label>
            </div>

            <div class="col-75">
            <input disabled type="text" value="<?=get_var('tpNumber',$row[0]->tpNumber)?>" id="tpNumber" name="tpNumber" placeholder="TP Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="location">Location of the Doctor</label>
            </div>

            <div class="col-75">
                <input  disabled type="text" value="<?=get_var('location',$row[0]->location)?>" id="location" name="location" placeholder="Location of the Doctor">
            </div>
            </div>

            

            <div class="row">
                <input type="hidden" name="id">
            <input type="submit" value="Delete">
            </div>
        </form>

        <?php else:?>
                    The Forum is not Found!
        <?php endif;?>
    </div>

    
    </body>
</html>