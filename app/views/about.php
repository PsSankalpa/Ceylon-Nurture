<!DOCTYPE html>
<html>
    <head>
        <title>
            About Us   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/aboutStyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php $this -> view ("header")?>
    </head>
<body>
        <div class="body_container">
            <h1>About Ceylon Nurture</h1>
            <p>The main goal of this online Ayurvedic platform is to provide patients an easy way to channel ayurvedic doctors,
                find ayurvedic herbs and to find ayurvedic products.Here we give the opportunity to the sellers to market their products through
                our platform and the doctors can register with our system to make it easy to join with their patients.</p>
        </div>
        <div class="container2">
            <div class="container3">
                <div class="phone">
                    <img src="<?=ASSETS?>img/phone.png" alt="phone" style="width:15%"> 
                    <h3>+94 76 123 4567</h3>
                </div>
                <div class="fax">
                    <img src="<?=ASSETS?>img/fax.png" alt="phone" style="width:15%"> 
                    <h3>+94 76 123 4567</h3>
                </div>
                <div class="email">
                    <img src="<?=ASSETS?>img/email.png" alt="phone" style="width:15%"> 
                    <h3>ceylonnurture@gmail.com</h3>
                </div>
                
                <div class="icons">
                    <img src="<?=ASSETS?>img/fb.png" alt="fb" style="width:100%">
                    <img src="<?=ASSETS?>img/insta.png" alt="insta" style="width:100%">
                    <img src="<?=ASSETS?>img/twitter.png" alt="twitter" style="width:100%">
                </div>
            </div>
        </div>

<form class="contact_form" method="POST">
<h2>Contact Us</h2>
<div class="row">
    <input type="text" name="Name"  placeholder="Enter your name"> 
</div>
<div class="row">
    <input type="text" name="Email"  placeholder="Enter your email-address">
</div>
<div class="row">
    <input type="text" name="password" placeholder="Enter your message">
</div>
<div class="row">
    <input type="submit" value="Submit">
</div>
</div>
</form>
</body>
</html>
