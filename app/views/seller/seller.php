<!DOCTYPE html>
<html>
    <head>
        <title>Seller page</title>
        <?php $this -> view ("header")?>
        
        <link rel="stylesheet" href="<?=ASSETS?>css/common.css">
    </head>
    <body>

        <?php 
            //echo "<pre>";
            //print_r($data['rows']);
	    ?>
        
        <div class="">

            <img src="<?=ASSETS?>img/products.jpg" alt="top-image" class="upperpart">
            <div class="buttons_section mg1 btn-group center">
                        <a href="<?=ROOT?>seller/registration"><button class="">Register</button></a>
                        <a href="<?=ROOT?>seller/uploadProduct"><button class="">Add Proucts</button></a>
            </div>

        <div class="products-section">
            
        </div>

        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs.js"></script>

    </body>
</html>