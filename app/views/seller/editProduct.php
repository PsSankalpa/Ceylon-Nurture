<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Seller|Registration</title>
        <?php $this -> view ("header",$data)?>
    </head>

    <body class="regi">

    
    <div class="container center">
        <h2>Edit the Product</h2>

        <?php if($row):?>

        <!--for the errors-->
        <?php if(count($errors) > 0 ):?>
        <div class="alertwarning">
        <button class="closebtn" onclick="closebutton()">&times;</button>   
            <strong>Error!</strong> 
            <?php foreach($errors as $error ):?>
                <br /><?=$error?>
            <?php endforeach;?>
        </div>
        <?php endif;?>

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
            <div class="col-25">
                <label for="productName">Product/Herb Name</label>
            </div>
            <div class="col-75">
                <input type="text" value="<?=get_var('productName',$row->productName)?>" id="productName" name="productName" placeholder="Product Name">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="productPrice">Price(only add the value)</label>
            </div>
            <div class="col-75">
                <input type="text" value="<?=get_var('productPrice',$row->productPrice)?>" id="productPrice" name="productPrice" placeholder="Price">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="description">Description</label>
            </div>
            <div class="col-75">
            <input type="text" value="<?=get_var('description',$row->description)?>" id="description" name="description" placeholder="Description">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="image" >Image of the product</label>
            </div>
            <div class="col-75">
            <input type="file" id="image" value="<?=get_var('image')?>" name="image">
            </div>
            </div>

            <div class="row">
            <div class="col-25">
                <label for="category" >Product Category</label>
            </div>
            <div class="col-75">
            <input type="text" id="category" value="<?=get_var('category',$row->category)?>" name="category" placeholder="(Product/herb)">
            </div>
            </div>

            <div class="row">
            <input type="submit" value="Submit">
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
