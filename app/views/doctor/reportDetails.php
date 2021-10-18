<html>
<head>
<title>Report Details</title>
<meta name="viewport" content="width=device-width; initial-scale=1.0;">
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
                            <h3>W.M.S.Perera</h3>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Specialities">Specialities</label>
                        </div>
                        <div class="col-75">
                            <h3>Internal Medicine</h3>
                        </div>
                    </div>
                    <h2>Patient Details</h2>
                    <div class="row">
                        <div class="col-25">
                            <label for="Name of the Patient">Name of the Patient</label>
                        </div>
                        <div class="col-75">
                            <h3>Natasha Perera</h3>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Symptoms">Symptoms</label>
                        </div>
                        <div class="col-75">
                            <h3>Arthritis</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="National ID">National ID</label>
                        </div>
                        <div class="col-75">
                            <h3>96601669393</h3>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Telephone">Telephone</label>
                        </div>
                        <div class="col-75">
                            <h3>0777439535</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Prescription">Prescription</label>
                        </div>
                        <div class="col-75">
                                <img src="<?=ASSETS?>/img/pdf.png" class="prescription" width="50" height="50">
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
                            <h3>Osu Deepa Hospital</h3>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Date">Date</label>
                        </div>
                        <div class="col-75">
                            <h3>15/11/2021</h3>
                        </div>
                    </div>
                    <h2>Payment Details</h2>
                    <div class="row">
                        <div class="col-25">
                            <label for="Doctor Charges">Doctor Charges</label>
                        </div>
                        <div class="col-75">
                            <h3>Rs.2500</h3>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Hospital Charges">Hospital Charges</label>
                        </div>
                        <div class="col-75">
                            <h3>Rs.500</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Commission">Commission</label>
                        </div>
                        <div class="col-75">
                            <h3>Rs.200</h3>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Total Amount">Total Amount</label>
                        </div>
                        <div class="col-75">
                            <h3>Rs.3200</h3>
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