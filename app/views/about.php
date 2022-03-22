<!DOCTYPE html>
<html>

<head>
    <title>
        About Us
    </title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/aboutStyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php $this->view("header") ?>
</head>

<body>
    <div class="body_container">
        <h1>About Ceylon Nurture</h1>
        <p>The main goal of this online Ayurvedic platform is to provide patients an easy way to channel ayurvedic doctors,
            find ayurvedic herbs and to find ayurvedic products.Here we give the opportunity to the sellers to market their products through
            our platform and the doctors can register with our system to make it easy to join with their patients.</p>
    </div>

    <!--beginin of the detail container-->
    <div class="detail-container">

        <form class="contact_form" method="POST" action="contact-form-handler">
            <h2>Contact Us</h2>
            <br/>
            <br/>
            <div class="row">
                <input type="text" name="Name" placeholder="Enter your name">
            </div>
            <div class="row">
                <input type="email" name="Email" placeholder="Enter your email-address">
            </div>
            <div class="row">
                <input type="text" name="Message" placeholder="Enter your message">
            </div>
            <div class="row">
                <input type="submit" value="Submit">
            </div>
        </form>

        <div class="container2">
            <div class="container3">
                <div class="contacts">
                    <div class="phone">
                        <img src="<?= ASSETS ?>img/phone.png" alt="phone">
                        <h3>+94 76 123 4567</h3>
                    </div>
                    <div class="fax">
                        <img src="<?= ASSETS ?>img/fax.png" alt="phone">
                        <h3>+94 76 123 4567</h3>
                    </div>
                    <div class="email">
                        <img src="<?= ASSETS ?>img/email.png" alt="phone">
                        <h3>ceylonnurture@gmail.com</h3>
                    </div>
                </div>

                <div class="icons">
                    <img src="<?= ASSETS ?>img/fb.png" alt="fb" >
                    <img src="<?= ASSETS ?>img/insta.png" alt="insta" >
                    <img src="<?= ASSETS ?>img/twitter.png" alt="twitter" >
                </div>
            </div>
        </div>

    </div>
    <!--end of the detail container-->

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->

</body>

</html>