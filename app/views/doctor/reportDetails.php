<html>
<head>
<title>Report Details</title>
<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/reports.css">
</head>
<body>
<div class="background">
    <div class="container">
        <div class="row">
            <div class="column">
            <h1>Appointment Report</h1>
                <form class="regi_form" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="Name of the Doctor">Name of the Doctor</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="nameWithInitials" name="nameWithInitials" placeholder="W.M.S.Perera">
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Specialities">Specialities</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="specialities" name="specialities" placeholder="Internal Medicine">
                        </div>
                    </div>
                    <h2>Patient Details</h2>
                    <div class="row">
                        <div class="col-25">
                            <label for="Name of the Patient">Name of the Patient</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="nameofPatient" name="nameofPatient" placeholder="Natasha Perera">
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Symptoms">Symptoms</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="symptoms" name="symptoms" placeholder="Arthritis">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="National ID">National ID</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="NIC" name="NIC" placeholder="9660166939V">
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Telephone">Telephone</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="teleNo" name="teleNo" placeholder="0777439535">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Prescription">Prescription</label>
                        </div>
                        <div class="col-75">
                                <img src="<?=ASSETS?>/img/pdf.png">
                        </div>
                    </div>
                </form>
            </div>
            <div class="column">
            <h1>15/11/2021</h1>
                <form class="regi_form" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label for="Hospital">Hospital</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="hospital" name="hospital" placeholder="Osu Deepa Hospital">
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Date">Date</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="date" name="date" placeholder="15/11/2021">
                        </div>
                    </div>
                    <h2>Payment Details</h2>
                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor Charges">Doctor Charges</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="doctorCharge" name="doctorCharge" placeholder="Rs.2500">
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Hospital Charges">Hospital Charges</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="hospitalCharge" name="hospitalCharge" placeholder="Rs.500">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Commission">Commission</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="commission" name="commission" placeholder="Rs.200">
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Total Amount">Total Amount</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="total" name="total" placeholder="Rs.3200">
                        </div>
                    </div>
                </form>
                <a href="<?=ROOT?>doctor/reports">
                    <button class="backbtn">Back</button>
                </a>
            </div>
        </div>




    </div>
</body>
</html>