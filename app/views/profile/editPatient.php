<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Patient|Edit</title>
    <?php $this->view("header", $data) ?>
    <link rel="stylesheet" href="<?= ASSETS ?>css/registrationform.css">

</head>

<body class="regi">


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
                    <label for="nameWithInitials">Name With Initials</label>
                </div>

                <div class="col-75">
                    <input type="text" value="<?= get_var('nameWithInitials',$row->nameWithInitials) ?>" id="nameWithInitials" name="nameWithInitials" placeholder="Name With Initials">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="gender">Gender</label>
                </div>

                <div class="col-75">
                    <p class="gender"><input type="radio" name="gender" value="male">Male
                          <input type="radio" name="gender" value="female">Female</p>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="DOB">Date Of Birth</label>
                </div>
                <div class="col-75">
                    <input type="date" id="DOB" name="DOB">
                </div>
            </div>

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