<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Patient|Edit</title>
    <?php $this->view("header", $data) ?>
    <link rel="stylesheet" href="<?= ASSETS ?>css/registrationform.css">

</head>

<body class="regi" style="background-color:#D4F1F4 ;">


    <div class="container center">
        <h1>Edit Patient Details</h1>

        <!--for the errors-->
        <?php if($errors):?>
            <?php if (count($errors) > 0) : ?>
            <div class="alertwarning">
                <button class="closebtn" onclick="closebutton()">&times;</button>
                <strong>Error!</strong>
                <?php foreach ($errors as $error) : ?>
                    <br /><?= $error ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php endif;?>

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
                <div class="col-25">
                    <label for="nic">NIC</label>
                </div>
                <div class="col-75">
                    <input type="text" value="<?= get_var('nic',$row->nic) ?>" id="nic" name="nic" placeholder="NIC">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="image">Medical records</label>
                </div>
                <div class="col-75">
                    <input type="file" id="image" value="<?= get_var('image',$row->image) ?>" name="image">
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