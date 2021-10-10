<html>
<head>
<title>View Schedule</title>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/viewSchedule.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="background">
        <div class="container1">
        <div class="container2">

                <img src="<?=ASSETS?>img/avatar.png" alt="Person" style="width:100%">
                    <h4><b>Dr.W.M.S.Perera</b></h4>
          
            <ul>
                <li><a href="#account"><i class="fa fa-fw fa-home"></i>My Account</a></li>
                <li><a class="active" href="#schedule"><i class="fa fa-fw fa-book"></i>Schedule</a></li>
                <li><a href="#feedback"><i class="fa fa-fw fa-comment"></i>Feedback</a></li>
                <li><a href="#calendar"><i class="fa fa-fw fa-calendar"></i>Appointments</a></li>
                <li><a href="#book"><i class="fa fa-fw fa-book"></i>Reports</a></li>
            </ul>
        </div>
            <div class="container3">
                    <div class="row">
                    <input type="view" value="View Slots"></a>
                    <a href="<?=ROOT?>doctor/addSchedule"><input type="add" value="Add a New Slot">
                     
                    </div> 
                    <div class="products-section">
            <div class="cardrow">
                <!--<?php if($rows):?>
                    <?php foreach ($rows as $row):?>-->
                        <div class="cardcolumn">
                            <div class="card">
                                
                                <h3><?=$row->slotNumber?> </h3>
                                <p><?=$row->dateofSlot?> </p>
                                <div class="div">
                                    <a href="<?=ROOT?>/doctor/scheduleDetails/<?=$row->scheduleid?>">
                                        <button class="cardbutton">View Infomation</button>
                                    </a>
                                </div>
                               <!-- <a href="<?=ROOT?>/seller/editProduct/<?=$row->scheduleid?>">
                                    <button class="cardbutton">Edit</button>
                                </a>
                                <a href="<?=ROOT?>seller/deleteProduct/<?=$row->scheduleid?>">
                                    <button class="cardbutton cancel">Delete</button>
                                </a>-->
                            </div>
                        </div>
                        <?php endforeach;?>
                <?php else:?>
                    <h4>No Products Yet</h4>
 			    <?php endif;?>
            </div>
        </div>
    </div> 
</body>