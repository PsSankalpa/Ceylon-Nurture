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
        <h1 class="h1">Give a Feedback</h1>

        

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">

        <div class="row">
            <div class="col-25">
            <label class="label" for="name">Doctor Name</label>
            </div>

            <div class="col-75">
            <select name="name">
                <option value="<?=get_var('name')?> ?>" >Select Doctor Name</option>
                <?php foreach ($row as $row):?>
                    <option><?=$row->nameWithInitials?>  </option>
                <?php endforeach;?>
            </select>
                    
            </div>
                    
        </div>

            <div class="row">
            <div class="col-25">
                <label for="nic">Feedback</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('feedback')?>" id="feedback" name="feedback" placeholder="feedback">
            </div>
            </div>

            

            <div class="row">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            </div>
        </form>


    </div>

    
    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->
    </body>
</html>