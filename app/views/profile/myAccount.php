<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Profile</title>
    <?php $this->view("header") ?>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="<?= ASSETS ?>css/myAccount.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/common1.css">
</head>

<body>
    <div class="profile">
        <div class="main-profile row">
            <div class="left">
                <img src="<?=ASSETS?>img/avatar.png" class="pro-img" alt="profile-img">
            </div>
            <div class="right">

                <h3 class="txt-col1">Common</h3>
                <div class="row p2">
                    <div class="col-25">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-50">
                        <label for="fname"><?=$data4->fname?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="lname">Last Name</label>
                    </div>
                    <div class="col-50">
                        <label for="lname"><?=$data4->lname?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="email">Email</label>
                    </div>
                    <div class="col-50">
                        <label for="email"><?=$data4->email?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="tpNumber">Telephone Number</label>
                    </div>
                    <div class="col-50">
                        <label for="tpNumber"><?=$data4->tpNumber?></label>
                    </div>
                </div>
                <div class="m-btns">
                    <a href="<?= ROOT ?>/myAccount/editCommonUser"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                    <a href=""><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                </div>
                <!----------------------seller---------------------------------------------------------------------------->
                <hr class="mg2 hr1 txt-col2">
                <h3 class="txt-col1">Seller Section</h3>
                <div class="row p2">
                    <div class="col-25">
                        <label for="nameWithInitials">Name with Initials</label>
                    </div>
                    <div class="col-50">
                        <label for="nameWithInitials"><?=$data1->nameWithInitials?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="registrationNumber">Registration number</label>
                    </div>
                    <div class="col-50">
                        <label for="registrationNumber"><?=$data1->registrationNumber?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="tpnumber">Telephone Number</label>
                    </div>
                    <div class="col-50">
                        <label for="tpnumber"><?=$data1->tpNumber?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="nic">nic</label>
                    </div>
                    <div class="col-50">
                        <label for="nic"><?=$data1->nic?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-50">
                        <label for="address"><?=$data1->address?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="image">Seller certificate</label>
                    </div>
                    <div class="col-50">
                        <label for="image">First Name</label>
                    </div>
                </div>
                <div class="m-btns">
                    <a href="<?= ROOT ?>/myAccount/editSeller"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                    <a href=""><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                </div>
                <!--------------------------doctor------------------------------------------------------------------------>
                <hr class="mg2 hr1 txt-col2">
                <h3 class="txt-col1">Doctor Section</h3>
                <div class="row p2">
                    <div class="col-25">
                        <label for="nameWithInitials">Name with Initials</label>
                    </div>
                    <div class="col-50">
                        <label for="nameWithInitials"><?=$data2->nameWithInitials?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="col-50">
                        <label for="gender"><?=$data2->gender?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="dob">DOB</label>
                    </div>
                    <div class="col-50">
                        <label for="dob"><?=$data2->dob?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="registrationNumber">Registration Number</label>
                    </div>
                    <div class="col-50">
                        <label for="registrationNumber"><?=$data2->registrationNumber?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="specialties">Specialties</label>
                    </div>
                    <div class="col-50">
                        <label for="specialties"><?=$data2->specialities?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="hospital">Hospital</label>
                    </div>
                    <div class="col-50">
                        <label for="hospital"><?=$data2->hospital?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="city">City</label>
                    </div>
                    <div class="col-50">
                        <label for="city"><?=$data2->city?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-50">
                        <label for="address"><?=$data2->address?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="image">Certificate</label>
                    </div>
                    <div class="col-50">
                        <label for="image">First Name</label>
                    </div>
                </div>
                <div class="m-btns">
                    <a href="<?= ROOT ?>/myAccount/editDoctor"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                    <a href=""><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                </div>
                <!------------------------patient-------------------------------------------------------------------------->
                <hr class="mg2 hr1 txt-col2">
                <h3 class="txt-col1">Patient Section</h3>
                <div class="row p2">
                    <div class="col-25">
                        <label for="nameWithInitials">Name with Initials</label>
                    </div>
                    <div class="col-50">
                        <label for="nameWithInitials"><?=$data3->nameWithInitials?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="gender">Gender</label>
                    </div>
                    <div class="col-50">
                        <label for="gender"><?=$data3->gender?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="dob">D.O.B</label>
                    </div>
                    <div class="col-50">
                        <label for="dob"><?=$data3->DOB?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="nic">nic</label>
                    </div>
                    <div class="col-50">
                        <label for="nic"><?=$data3->nic?></label>
                    </div>
                </div>
                <div class="row p2">
                    <div class="col-25">
                        <label for="image">Image</label>
                    </div>
                    <div class="col-50">
                        <label for="image">First Name</label>
                    </div>
                </div>
                <div class="m-btns">
                    <a href="<?= ROOT ?>/myAccount/editPatient"><button class="editbtn txt-col1 bg-col4">Edit</button></a>
                    <a href=""><button class="deletebtn txt-col1 bg-col3">Delete</button></a>
                </div>
                <!-------------------------------------------------------------------------------------------------->
            </div>
            


        </div>
    </div>
</body>

</html>