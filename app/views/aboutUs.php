<!DOCTYPE html>
<html>

<head>
  <title>
    About Us
  </title>
  <link rel="stylesheet" href="<?= ASSETS ?>css/aboutUsStyle.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php $this->view("header") ?>
</head>

<body>
  <div class="about-section">
    <h1>About Ceylon Nurture</h1>
    <p>We was able to identify some of the difficulties whicch people have to face with the current ayurvedic system so our main goal of this online Ayurvedic platform is to provide patients an easy way to channel ayurvedic doctors,
      users to find ayurvedic herbs and to find ayurvedic products and also here we give the opportunity to the sellers to market their products through
      our platform and the doctors can register with our system to make it easy to connect with their patients.The system will consist of fully functional components like channelling,selling,appointments,articles,forums</p>
  </div>
  </br>
  <h2 style="text-align:center">Our Team</h2>
  <div class="row">
    <div class="column">
      <div class="card">
        <img src="<?= ASSETS ?>img/piyum.jpeg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Piyum Sankalpa</h2>
          <p class="title">Developer</p>
          <p>piyumsankalpaps@gmail.com</p>
          <!--<p><button class="button">Contact</button></p>-->
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="<?= ASSETS ?>img/chamodi.jpg" alt="Mike" style="width:100%">
        <div class="container">
          <h2>Chamodhi Dilshani</h2>
          <p class="title">Developer</p>
          <p>cham.dil333@gmail.com</p>
          <!-- <p><button class="button">Contact</button></p>-->
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card">
        <img src="<?= ASSETS ?>img/avishi.jpeg" alt="John" style="width:100%">
        <div class="container">
          <h2>Avishi Jayaweera</h2>
          <p class="title">Developer</p>
          <p>avijayaweera1@gmail.com</p>
          <!-- <p><button class="button">Contact</button></p>-->
        </div>
      </div>
    </div>
  </div>
  <?php $this->view("footer") ?>
  <!--end of footer-->
</body>

</html>