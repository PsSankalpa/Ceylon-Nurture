<html>

<head>
  <title>Doctor's Reports</title>
  <link rel="icon" href="<?= ASSETS ?>img/logo.png" type="image/x-icon" />
  <meta name="viewport" content="width=device-width; initial-scale=1.0;">
  <link rel="stylesheet" href="<?= ASSETS ?>css/docDashboard.css">
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

<body>

  <body class="bg">
    <div id="content">
      <span class="slide">
        <a href="<?= ROOT ?>doctor/reportsview" class="previous">&#8249;</a>
        <a href="#" onclick="openSlideMenue()">

        <i class="fa fa-fw fa-bars"></i></a>
       
        <span class="nav">Payment Reports</span></br>
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
        <a href="<?= ROOT ?>doctor/reportsview"><i class="fa fa-fw fa-book icons"></i>&nbsp;&nbsp; Reports</a>
        <a href="<?= ROOT ?>logout"><i class="fa fa-fw fa-sign-out icons"></i>&nbsp;&nbsp; Sign Out</a>
      </div>
      <div class="clearfix"></div>

       <!--for the search option-->
       <div class="search-container">
            <div class="search_bar">
                <form action="" class="search">
                    <input type="text" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search for a month.." name="search">
                    <!--ternary operator use in the value-->
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        
      <div class="clearfix"></div>

      <div class="col-div-8"><br />

        <div class="box-8">

          <div class="content-box">

            <div style="overflow-y:auto;">
              <table>
            
              <div class="reports">
                  <h3>Monthly Reports -  <?php echo "". date("F"); ?></h3>
            <div class="cardBox">
              <div class="col-div-3">
                <div class="box">
                  <p>Rs.150,000<br/><span>Total Payment</span></p>
                  <i class="fa fa-money box-icon"></i>
                </div>
              </div>

              <div class="col-div-3">
                <div class="box">
                  <p>Rs.121,500<br/><span>Payment Received</span></p>
                  <i class="fa fa-money box-icon"></i>
                </div>
              </div>

              <div class="col-div-3">
                <div class="box">
                  <p>Rs.28,500<br/><span>Payment Arrears</span></p>
                  <i class="fa fa-money box-icon"></i>
                </div>
              </div>
            </div>
            </div>
              <div class="clearfix"></div>
           
                <h3>My Payments</h3>
                  <div class="content-box">
                   
                    <table>
                      <tr>
                           
                      </tr>
                      <?php if ($data) : ?>
                <tr>
                    <th>Date</th>
                    <th>Patient Number</th>
                    <th>Patient Name</th>
                    <th>Doctor Charges</th>
                    <th>Hospital Charges</th>
                    <th>Commission</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>

                
                  <?php foreach ($data as $data) : ?>
                    <tr>
                      <td class="data"><?= $data->date ?></td>
                      <td class="data"><?= $data->patientName ?></td>
                      <td class="data"><?= $data->patientName ?></td>
                      <td class="data"><?= $data->category ?></td>
                      <td class="data"><?= $data->amount ?></th>
                      <td class="data"><?= $data->amount ?></th>
                      <td class="data"><?= $data->amount ?></th>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <h4>No reports</h4>
                <?php endif; ?>

            </div>

          </div>

        </div>

      </div>

    </div>
  </body>

</html>