<html>

<head>
    <title>Doctor's Add Schedule</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">

    <link rel="stylesheet" href="<?= ASSETS ?>css/addSchedule.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function openSlideMenue() {
            document.getElementById('mySidenav').style.width = '250px';
            document.getElementById('content').style.marginLeft = '250px';
        }

        function closeSlideMenue() {
            document.getElementById('mySidenav').style.width = '0';
            document.getElementById('content').style.marginLeft = '0';
        }
    </script>
</head>

<body class="bg">
    <div id="content">
        <span class="slide">
            <a href="<?= ROOT ?>doctor/docDashboard" class="previous">&#8249;</a>
            <a href="#" onclick="openSlideMenue()">

                <i class="fa fa-fw fa-bars"></i></a>

            <span class="nav">Schedule</span></br>
        </span>
        </br>
        <div id="mySidenav" class="sidenav">
            <a href="#" class="close" onclick="closeSlideMenue()">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <a href="<?= ROOT ?>doctor/docDashboard"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp; Home</a>
            <a class="active" href="<?= ROOT ?>doctor/docDashboard"><i class="fa fa-fw fa-dashboard"></i>&nbsp;&nbsp; Dashboard</a>
            <a href="<?= ROOT ?>doctor/addschedule"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Schedule</a>
            <a href="<?= ROOT ?>doctor/feedback"><i class="fa fa-fw fa-comment icons"></i>&nbsp;&nbsp; Feedback</a>
            <a href="<?= ROOT ?>appointments"><i class="fa fa-fw fa-calendar icons"></i>&nbsp;&nbsp; Appointments</a>
            <a href="<?= ROOT ?>articles/articleDetails"><i class="fa fa-fw fa-list icons"></i>&nbsp;&nbsp; Articles</a>
            <a href="<?= ROOT ?>doctor/reports"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Reports</a>
            <a href="<?= ROOT ?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp; Sign Out</a>
        </div>
        <div class="clearfix"></div>
        <div class="container3">
            <!--for the errors-->
            <?php if (count($errors) > 0) : ?>
                <div class="alertwarning">
                    <button class="closebtn" onclick="closebutton()">&times;</button>
                    <strong>Error!</strong>
                    <?php foreach ($errors as $error) : ?>
                        <br /><?= $error ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <div class="header-container">
                <div class="button-container">
                    <a href="<?= ROOT ?>doctor/addSchedule"><button class="viewbtn">Add Slots</button></a>
                    <a href="<?= ROOT ?>doctor/viewSchedule"><button class="viewbtn">View Slots</button></a>
                </div>
            </div>
            <div class="regi_form">
                <form enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="Slot Number">Slot Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" value="<?= get_var('slotNumber') ?>" id="slotNumber" name="slotNumber" placeholder="01">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Date of the slot">Date of the Slot</label>
                        </div>
                        <div class="col-75">
                            <input type="date" value="<?= get_var('dateofSlot') ?>" id="dateofSlot" name="dateofSlot" placeholder="15/12/2021">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Arrival Time">Arrival Time</label>
                        </div>
                        <div class="col-75">
                            <input type="time" value="<?= get_var('arrivalTime') ?>" id="arrivalTime" name="arrivalTime" placeholder="8.00 ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Departure Time">Departure Time</label>
                        </div>
                        <div class="col-75">
                            <input type="time" value="<?= get_var('departureTime') ?>" id="departureTime" name="departureTime" placeholder="12.00 ">
                        </div>
                    </div>
                    
                    <!-- <div class="row">
                        <div class="col-25">
                            <label for="No of patients">Estimated No of patients</label>
                        </div>
                        <div class="col-75">
                            <input type="number" value="<?= get_var('noOfPatient') ?>" id="noOfPatient" name="noOfPatient" placeholder="16">
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-25">
                            <label for="Time per patient">Estimated Time per patient</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="timePerPatient" value="<?= get_var('timePerPatient') ?>" name="timePerPatient" placeholder="15 ">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor">Doctor Charges </label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="doctorCharge" value="<?= get_var('doctorCharge') ?>" name="doctorCharge" placeholder="2500">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor's Note">Doctor's Note</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="doctorNote" value="<?= get_var('doctorNote') ?>" name="doctorNote" placeholder="Note">
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" value="Schedule">
                    </div>
                </form>
            </div>
            <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs.js"></script>
        </div>
    </div>
    </div>
</body>

</html>