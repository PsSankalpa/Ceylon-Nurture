<html>
<head>
<title>Ceylon Nurture|Doctor|Delete Schedule</title>
<?php $this -> view ("header",$data)?>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/deleteSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
        <div class="container2">
            
                <img src="<?=ASSETS?>/img/avatar.png" alt="Person" style="width:100%">
                    <h4><b>Dr.W.M.S.Perera</b></h4>
         
            <ul>
                <li><a href="#account"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                <li><a class="active" href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                <li><a href="#feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                <li><a href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                <li><a href="#book"><i class="fa fa-fw fa-book"></i>Reports</a></li>
            </ul>
        </div>
        <?php if($row):?>
            <div class="container3">
                <form class="regi_form" enctype="multipart/form-data" method="POST">
                    <h2>Do you want to delete the Slot <?=get_var('slotNumber',$row->slotNumber)?> of the schedule?</h2>
                    <input type="hidden" name="id">
                    <hr>
                    <br>
                    <p>Deleting your slot will remove all your information of your schedule from our database.</p>
                    <h3><b>This cannot be undone</b></h3>
                    <div class="row">
                        <input class="yesbtn" type="submit" value="Delete">

                        <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->scheduleid?>">
                            <input class="nobtn" type="reset" value="Reset">
                        </a>

                    </div>
                </div>  
                </form>
        <?php else:?>
            Product was not found
        <?php endif;?>
        </div>

<script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>

</body>
</html>

    