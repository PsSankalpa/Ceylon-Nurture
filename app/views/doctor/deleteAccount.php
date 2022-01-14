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
        <div class="sidebar">
            <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
            <?php if($data):?>
                    <h4><?=$data[0]->nameWithInitials?> </h4>
            <?php endif;?>
            <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
            <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
            <a  href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
            <a href="<?=ROOT?>doctor/reportsview"><i class="fa fa-fw fa-book"></i>  Reports</a>
            </div>
                <div class="container3">
                    <?php if($row):?>
                        <form class="regi_form" enctype="multipart/form-data" method="POST">
                            <h2>Do you want to delete the account of <?=get_var('nameWithInitials',$row->nameWithInitials)?> from the system?</h2>
                            <input type="hidden" name="id">
                            <hr>
                            <br>
                            <p>Deleting your Account will remove all your information of your account from our database.</p>
                            <h3><b>This cannot be undone</b></h3>
                            <div class="row">
                                <input class="yesbtn" type="submit" value="Delete">
                                <a href="<?=ROOT?>doctor/viewSchedule/<?=$row->userid?>">
                                    <input class="nobtn" type="reset" value="Reset">
                                </a>
                            </div>
                        </form>
                    <?php else:?>
                        Account not Found
                    <?php endif;?>
                </div>
            <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
        </div>
    </div>
</body>
</html>

    