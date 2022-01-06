<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Patient Reports </title>

    <?php $this->view("header") ?>

    <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/reports1.css">

</head>

<body id="body">
    <button class="backbtn"><a href="<?= ROOT ?>doctor/reports">&times;</a></button>

    <div class="patientReport">
        <h6>15/01/2022</h6>
        <div class="header">
            <a href="<?= ROOT ?>home/home"><img class="logo" src="<?= ASSETS ?>img/logo.png"></a>

            <h2> Appointment Report </h2>
            </br>
            </br>

        </div>
        <hr>

        <div class="doctor">
            <div class="search_container">

                <form class="regi_form" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="Name of the Doctor">Name of the Doctor</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['doctor'][0]->nameWithInitials ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Specialities">Specialities</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['doctor'][0]->specialities ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Hospital">Hospital</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['doctor'][0]->hospital ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="City">City</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['doctor'][0]->city ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="City">Address</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['doctor'][0]->address ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Date">Date</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['schedule'][0]->dateofSlot ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Time">Time</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['schedule'][0]->arrivalTime ?>am - <?= $row['schedule'][0]->departureTime ?>am</h5>
                        </div>
                    </div>




                </form>

            </div>
        </div>

        <hr>

        <div class="patientPayment"><br>

            <div class="patient">
                <div class="header">
                    <h3>Patient Details</h3><br>
                </div>
                <form class="regi_form_patient" enctype="multipart/form-data" method="POST">

                    <div class="row">
                        <div class="col-25">
                            <label for="Name of the Patient">Name of the Patient</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['channeling'][0]->patientName ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Symptoms">Symptoms</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['channeling'][0]->category ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="National ID">National ID</label>
                        </div>
                        <div class="col-75">
                            <h5>96601669393</h5>
                            <!--patient table not added to this-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Telephone">Telephone</label>
                        </div>
                        <div class="col-75">
                            <h5><?= $row['commonuser'][0]->tpNumber ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Prescription">Prescription</label>
                        </div>
                        <div class="col-75">
                            <img src="<?= ASSETS ?>/img/prescription.png" class="prescription" width="50" height="50">
                        </div>
                    </div>
                </form>
            </div>

            <div class="payment">
                <div class="header">
                    <h3>Payment Details</h3><br>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Doctor Charges">Doctor Charges</label>
                    </div>
                    <div class="col-75">
                        <h5>Rs.<?= $row['payments'][0]->doctorCharges ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Hospital Charges">Hospital Charges</label>
                    </div>
                    <div class="col-75">
                        <h5>Rs.<?= $row['payments'][0]->hospitalCharges ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Commission">Commission</label>
                    </div>
                    <div class="col-75">
                        <h5>Rs.<?= $row['payments'][0]->commision ?></h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="Total Amount">Total Amount</label>
                    </div>
                    <div class="col-75">
                        <h5>Rs.<?= $row['payments'][0]->amount ?></h5>
                    </div>
                </div>
                </br>
                <a href="<?= ROOT ?>make_pdf">
                    <div class="payButton"><a href="<?= ROOT ?>make_pdf/<?= $row['patient'][0]->userid ?>/<?= $row['channeling'][0]->channelingid ?>/<?= $row['schedule'][0]->scheduleid?>"><button class="buttonA">Generate PDF</button></a>
                </a>
            </div>

        </div>

        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->
    </div>


</body>

</html>