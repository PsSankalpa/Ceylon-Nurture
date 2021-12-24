<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Common|Edit</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/registrationform.css">

    </head>

    <body class="regi">

    
    <div class="container center" style="background-color:#D4F1F4 ;">
        <h1>Edit Common User Detials</h1>

        <?php if($row):?>
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
                <label for="fname">First Name</label>
            </div>
            <div class="col-75">
                <input type="text" value="<?=get_var('fname',$row->fname)?>" id="fname" name="fname" placeholder="Name With Initials">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
                <input type="text" value="<?=get_var('lname',$row->lname)?>" id="lname" name="lname" placeholder="Registration Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="email">Email</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('email',$row->email)?>" id="email" name="email" placeholder="TP Number">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="tpNumber">Tp Number</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('tpNumber',$row->tpNumber)?>" id="tpNumber" name="tpNumber" placeholder="tpNumber">
            </div>
            </div>

            <div class="row">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            </div>
        </form>
        <?php endif;?>
    </div>

    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
    
    </body>
</html>