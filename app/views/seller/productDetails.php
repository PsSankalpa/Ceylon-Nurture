<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Seller|Registration</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/sellers.css">
    </head>

    <body class="regi">

    
    <div class="container center seller-grid-container">
        <h2>Product</h2>
        <h2>Product Details</h2>
        
        <?php foreach ($rows as $row):?>
        <div>
            <h3><?=$row->productName?> </h3>
            <img src="<?=ASSETS2.$row->image?> ">
        </div>
        <div class="">
            <h3>Details</h3>

            <div>
                <h4>Price : <?="RS.".$row->productPrice?></h4>
                <p><?=$row->description?></p>
            </div>

        </div>
        <?php endforeach;?>

        
    </div>

    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
    
    </body>
</html>