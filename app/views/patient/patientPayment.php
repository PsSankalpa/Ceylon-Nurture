<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>  Channeling </title>

            <?php $this -> view ("header")?>
            <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
            <link rel="stylesheet" href="<?=ASSETS?>css/channelingPaymentStyle.css">





</head>
<body id="body">
    <div class="paymentInvoice">
        <h2> Payment Invoice </h2><br>
        <h3> Doctor details</h3><br>

        <div class="doctor">
            <div class="search_container">

                <?php if($row):?>


                    <form class="regi_form" enctype="multipart/form-data" method="POST">
                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="name">Name</label>
                        </div>

                        <div class="col">
                            <?=$row->nameWithInitials?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="speciality">Speciality</label>
                        </div>

                        <div class="col">
                            <?=$row->specialities?>
                        
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">Hospital</label>
                        </div>

                        <div class="col">
                            <?=$row->hospital?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">City</label>
                        </div>

                        <div class="col">
                            <?=$row->city?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">Address</label>
                        </div>

                        <div class="col">
                            <?=$row->address?>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">Date</label>
                        </div>

                        <div class="col">
                            05/11/2021
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">Time</label>
                        </div>

                        <div class="col">
                            09:00 - 10:00 AM
                        </div>
                        </div>

                        

                    </form> 
                    <?php else:?>
                        The User is not Found!
                    <?php endif;?>
            </div>  
        </div>
<hr>
        <div class="patientPayment"><br>
        <?php if($row2):?>
            <?php if($row3):?>

            <div class="patient">
                <h3>Patient Details</h3><br>
            <form class="regi_form_patient" enctype="multipart/form-data" method="POST">
                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="name">Name of the Patient</label>
                        </div>

                        <div class="col-75">
                        <input type="text" value="<?=get_var('name',$row3->nameWithInitials)?>" id="name" name="name" placeholder="Patient Name">
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="symptoms">Symptoms</label>
                        </div>

                        <div class="col-75">
                        <input type="text" value="<?=get_var('symptoms')?>" id="symptoms" name="symptoms" placeholder="Symptoms">
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="nic">National ID</label>
                        </div>

                        <div class="col-75">
                        <input type="text" value="<?=get_var('nic',$row2->nic)?>" id="nic" name="nic" placeholder="National ID">
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="tpNumber">Telephone Number</label>
                        </div>

                        <div class="col-75">
                        <input type="text" value="<?=get_var('tpNumber',$row3->tpNumber)?>" id="tpNumber" name="tpNumber" placeholder="Telephone Number">
                        </div>
                        </div>
                        

                    </form>
                    <?php else:?>
                        The User is not Found!
                    <?php endif;?>
                    <?php else:?>
                        The User is not Found!
                    <?php endif;?> 
            </div>
            <div class="payment">

            <h3>Payment Details</h3><br>
            <form class="regi_form_payment" enctype="multipart/form-data" method="POST">
                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="name">Doctor Charge</label>
                        </div>

                        <div class="col">
                            Rs.2500
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="speciality">Commission</label>
                        </div>

                        <div class="col">
                            Rs.200
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-25">
                            <label class="label" for="hospital">Total</label>
                        </div>

                        <div class="col">
                            Rs.2700
                        </div>
                        </div>

                        
                        

                    </form> 
            </div>
        </div>

        
        <div class="payButton"><button class="buttonA">Proceed to Pay</button></div>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
        <!--end of footer-->


</body>
</html>