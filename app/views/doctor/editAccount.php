<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Doctor|Eddit Account</title>
        <?php $this -> view ("header",$data)?>
        <meta name="viewport" content="width=device-width; initial-scale=1.0;">
        <link rel="stylesheet" href="<?=ASSETS?>css/editAccount.css">
    </head>

    <body>
    <div class="background">
        <div class="container1">
             <div class="sidebar">
            <img src="<?=ASSETS?>img/avatar.png" alt="Person" class="pro-pic" width="200" height="100">
            <?php if($row):?>
                    <h4><?=$row->nameWithInitials?> </h4>
            <?php endif;?>
                    
        <a  href="<?=ROOT?>doctor/addschedule"><i class="fa fa-fw fa-book"></i>  Schedule</a>
        <a href="<?=ROOT?>doctor/feedback"><i class="fa fa-fw fa-comment"></i>  Feedback</a>
        <a   href="<?=ROOT?>appointments"><i class="fa fa-fw fa-calendar"></i>  Appointments</a>
        <a href="<?=ROOT?>doctor/reportsview"><i class="fa fa-fw fa-book"></i>  Reports</a>
        </div>
            <div class="container3">
                <?php if($row):?> 
                    <form class="regi_form" enctype="multipart/form-data" method="POST">
                        <h2>Edit the Account</h2>
                        <hr>
                        
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
                        <div class="row">
                            <div class="col-25">
                                <label for="Name with Initials">Name with Initials</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('nameWithInitials',$row->nameWithInitials)?>" id="nameWithInitials" name="nameWithInitials" placeholder="Name with Initials">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Gender">Gender</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('gender',$row->gender)?>" id="gender" name="gender" placeholder="Gender">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Date of Birth">Date of Birth</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('dob',$row->dob)?>" id="dob" name="dob" placeholder="Date of Birth">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Registration Number">Registration Number</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('registrationNumber',$row->registrationNumber)?>" id="registrationNumber" name="registrationNumber" placeholder="Registration Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Specialities">Specialities</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('specialities',$row->specialities)?>" id="specialities" name="specialities" placeholder="Specialities">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Hospital">Hospital</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('hospital',$row->hospital)?>" id="hospital" name="hospital" placeholder="Hospital">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="City">City</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('city',$row->city)?>" id="city" name="city" placeholder="City">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Address">Address</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('address',$row->address)?>" id="address" name="address" placeholder="Address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="Qualifications">Qualifications</label>
                            </div>
                            <div class="col-75">
                                <input type="file" value="<?=get_var('image')?>" name="image">
                            </div>
                        </div>

                        <!--<div class="row">
                        <div class="col-25">
                            <label for="Profile Pic">Profile Pic</label>
                        </div>
                        <div class="col-75">
                        <input type="file" value="<?=get_var('image2')?>" name="image2">
                        </div>
                        </div>-->

                        <div class="row">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </div>
                    </form>
                <?php endif;?>
            </div>
            <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
        </div>
    </div>
</body>
</html>