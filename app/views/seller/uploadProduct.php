<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Seller|uploadProduct</title>
    <?php $this->view("header", $data) ?>
    <link rel="stylesheet" href="<?= ASSETS ?>css/registrationform.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
</head>

<body class="regi">


    <div class="container1 center3">
        <h2>Add a Product</h2>

        <!--for the errors-->
        <?php if (count($errors) > 0) : ?>
            <div class="alertwarning">
                <button class="closebtn" onclick="closebutton()">&times;</button>
                <strong>Error!</strong>
                <?php foreach ($errors as $error) : ?>
                    <br /><?= $error ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <hr>
        <form class="regi_form" enctype="multipart/form-data" method="POST">

            <div class="row">
                <div class="col-25">
                    <label for="productName">Product/Herb Name</label>
                </div>
                <div class="col-75">
                    <input type="text" value="<?= get_var('productName') ?>" id="productName" name="productName" placeholder="Product Name">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="productPrice">Price(only add the value)</label>
                </div>
                <div class="col-75">
                    <input type="text" value="<?= get_var('productPrice') ?>" id="productPrice" name="productPrice" placeholder="Price">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="description">Description</label>
                </div>
                <div class="col-75">
                    <input type="text" value="<?= get_var('description') ?>" id="description" name="description" placeholder="Description">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="image">Image of the product <br>
                        <p style="font-size:14px; color:#05445E;"> (Format:UserName_ProductName)</p>
                    </label>
                </div>
                <div class="col-75">
                    <input type="file" id="image" value="<?= get_var('image') ?>" name="image">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="category">Product Category</label>
                </div>
                <div class="col-75">
                    <select id="category" name="category">
                        <option value="Product">Product</option>
                        <option value="Herb">Herb</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs"></script>

</body>

</html>