<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Seller|Registration</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/sellers.css">
    </head>

    <body class="regi">

    
    <div class="container center">
        <h2>Are you want to delete the Product</h2>

        <?php if($row):?>

        

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">
        <?php foreach ($rows as $row):?>
            <div class="row">
            <div class="col-25">
                <label for="productName">Product/Herb Name</label>
            </div>
            <div class="col-75">
                <input disabled type="text" value="<?=get_var('productName',$row->productName)?>" id="productName" name="productName" placeholder="Product Name">
                <input type="hidden" name="id"><!--to make a dumy post value-->
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="productPrice">Price</label>
            </div>
            <div class="col-75">
                <input disabled type="text" value="<?=get_var('productPrice',$row->productPrice)?>" id="productPrice" name="productPrice" placeholder="Price">
            </div>
            </div>
            <?php endforeach;?>
            <div class="row">
            <input type="submit" value="Delete">
            <input type="reset" value="Reset">
            </div>
        </form>

        <?php else:?>
            Product was not found
        <?php endif;?>
    </div>

    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>

    </body>
</html>
