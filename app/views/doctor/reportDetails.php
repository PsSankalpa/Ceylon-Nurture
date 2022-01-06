<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>  Patient Reports </title>

            <?php $this -> view ("header")?>

           
            <link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/reports1.css">

</head>
<body id="body">
<button class="backbtn"><a href="<?=ROOT?>doctor/reports">&times;</a></button>
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
                             <h5>W.M.S.Perera</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Specialities">Specialities</label>
                            </div>
                            <div class="col-75">
                            <h5>Internal Medicine</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Hospital">Hospital</label>
                            </div>
                            <div class="col-75">
                            <h5>Osu Sewana</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="City">City</label>
                            </div>
                            <div class="col-75">
                            <h5>Kandy</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="City">Address</label>
                            </div>
                            <div class="col-75">
                            <h5>No 12,Main Street,Kandy</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Date">Date</label>
                            </div>
                            <div class="col-75">
                            <h5>03/02/2022</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                            <label for="Time">Time</label>
                            </div>
                            <div class="col-75">
                            <h5>09.00am - 11.00am</h5>
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
                            <h5>Natasha Perera</h5>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Symptoms">Symptoms</label>
                        </div>
                        <div class="col-75">
                            <h5>Arthritis</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="National ID">National ID</label>
                        </div>
                        <div class="col-75">
                            <h5>96601669393</h5>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Telephone">Telephone</label>
                        </div>
                        <div class="col-75">
                            <h5>0777439535</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Prescription">Prescription</label>
                        </div>
                        <div class="col-75">
                                <img src="<?=ASSETS?>/img/prescription.png" class="prescription" width="50" height="50">
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
                            <h5>Rs.2500</h5>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Hospital Charges">Hospital Charges</label>
                        </div>
                        <div class="col-75">
                            <h5>Rs.500</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Commission">Commission</label>
                        </div>
                        <div class="col-75">
                            <h5>Rs.200</h5>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="Total Amount">Total Amount</label>
                        </div>
                        <div class="col-75">
                            <h5>Rs.3200</h5>
                        </div>
                    </div>
                    </br>
        <a href="<?=ROOT?>make_pdf"><div class="payButton"><button class="buttonA">Generate PDF</button></a></div>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->


</body>
</html>