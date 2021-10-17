<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Doctor|Account Details</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/viewAccount.css">
    </head>

    <body>
    <div class="background">
        <div class="container1">
            <div class="container2">

                        <div class="profilepic">
                        <img src="<?=ASSETS?>/img/avatar.png" alt="Person" style="width:100%">
                        </div>
    
                    <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                    <h4><?=$rows->nameWithInitials?></h4>
    
            
                <ul>
                    <li><a class="active" href="<?=ROOT?>doctor/viewAccount"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                    <li><a href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                    <li><a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                    <li><a href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                    <li><a href="<?=ROOT?>doctor/reports"><i class="fa fa-fw fa-book"></i>Reports</a></li>
                </ul>
            </div>
            <div class="container3">
                <form class="regi_form" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="Name with Initials">Name with Initials</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->nameWithInitials?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Gender">Gender</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->gender?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Date of Birth">Date of Birth</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->dob?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Registration Number">Registration Number</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->registrationNumber?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Specialities">Specialities</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->specialities?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Hospital">Hospital</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->hospital?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="City">City</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->city?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Address">Address</label>
                        </div>
                        <div class="col-75">
                            <h3><?=$rows->address?> </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Qualifications">Qualifications</label>
                        </div>
                        <div class="col-75">
                            <div class="certificate">
                                <img src="<?=ASSETS2.$rows->image?>" style="width:3000%">
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
                </form>
                <div class="row">
                    <a href="<?=ROOT?>doctor/editAccount/<?=$rows->userid?>">
                        <button class="editbtn">Edit Account</button>
                    </a>
                    <a href="<?=ROOT?>doctor/deleteAccount/<?=$rows->userid?>">
                        <button class="deletebtn">Delete Account</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>