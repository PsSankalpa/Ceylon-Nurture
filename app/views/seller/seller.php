<!DOCTYPE html>
<html>
    <head>
        <title>Seller page</title>
        <?php $this -> view ("header")?>
    </head>
    <body>
        
        

        <?php 
            //echo "<pre>";
            //print_r($data['rows']);
	    ?>

        <link rel="stylesheet" href="<?=ASSETS?>css/sellerStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/common.css">

        <div class="">

            <img src="<?=ASSETS?>img/products.jpg" alt="top-image" class="upperpart">
            <div class="buttons_section mg1 btn-group center">
                        <a href="<?=ROOT?>seller/registration"><button class="">Register</button></a>
                        <a href="<?=ROOT?>upload"><button class="">Add Proucts</button></a>
            </div>

       

            <!--products form-->
         <div class="form-popup" id="productForm">
                <form  class="form-container" method="POST">
                    <h1>Products</h1><br />

                    <label for="title"><b>Title</b></label>
                    <input type="text" placeholder="Enter Title" name="title" required>

                    <label for="file"><b>Image</b></label>
                    <input type="text" placeholder="Registration Number" name="file" required>

                    <label for="description"><b>description</b></label>
                    <input type="text" placeholder="description" name="description" required>

                    <button type="submit" class="btn" name="submit">Submit</button>
                    <button type="button" class="btn cancel" onclick="closeproductForm()">Close</button>
                </form>
            </div>

        <div class="products-section">
            
        </div>

        <script type="text/javascript" src="<?=ASSETS?>js/sellerJs.js"></script>

    </body>
</html>