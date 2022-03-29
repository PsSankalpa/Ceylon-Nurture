<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Reports for Doctor </title>

    <?php $this->view("header") ?>

    <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/reports1.css">

</head>

<body id="body">
    <button class="back"><a href="<?= ROOT ?>doctor/patientReports">&times;</a></button>

    <div class="patientReport">

</br>
        <h6><?php echo "" . date("d/m/Y"); ?></h6>

       
       

        <div class="title1" style="width: 95%;">
            <div class="mtitle" style="width: 100%;text-align: center;">
                <h1>Ceylon Nuture</h1>
            </div>
        </div>
        <hr>
        <div class="title2">
            <h2>Channeling Details</h2>
            <div class="logo" style="width: 100%;text-align: center;"><img src="<?= ASSETS ?>img/logo.png" style="width: 15%;align-items: center;"></div>
        </div>
</br>
</br>
        <table style="border-collapse: collapse;border-spacing: 0;width: 85%;border: 1px solid #ddd;margin: 5% auto;">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Slot No</th>
                    <th>Time</th>
                    <th>Time per Patient</th>
                    <th>No of Patients</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($row) : ?>
                    <?php foreach ($row as $row) : ?>
                        <tr>
                            <td><?= $row->doctorName ?></td>
                            <td><?= $row->patientName ?></td>
                            <td><?= $row->category ?> </td>
                            <td><?= $row->date ?></td>
                            <td><?= $row->nic ?></td>
                            <td><?= $row->totalPayment ?></td>
                            <td class="data"><a href="<?= ROOT ?>doctor/appointmentDetails/<?= $row->scheduleid ?>"><button class="appviewbtn">View Information</button></a></td>
                        </tr>
        </table>

        <a href="<?= ROOT ?>make_pdf">
            <div class="payButton"><a href="<?= ROOT ?>make_pdf/<?= $row['patient'][0]->userid ?>/<?= $row['channeling'][0]->channelingid ?>/<?= $row['schedule'][0]->scheduleid ?>"><button class="buttonA">Generate PDF</button></a>
        </a>
    </div>

    </div>

    <!--footer-->

    <!--end of footer-->
    </div>
<?php endforeach; ?>
<?php endif; ?>

</body>

</html>