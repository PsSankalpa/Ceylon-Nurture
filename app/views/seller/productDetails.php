<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Seller|Registration</title>
    <?php $this->view("header", $data) ?>
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
</head>

<body class="regi">


    <div class="container center">
        <?php foreach ($rows as $row) : ?>
            <div class="img-con col-25">
                <h2>Product</h2>
                <h3><?= $row->productName ?></h3>
                <img src="<?= ASSETS2 . $row->image ?> ">
            </div>
            <div class="details-con col-75">
                <div>
                    <h2>Product Details</h2>
                    <h4>Price : <?= "RS." . $row->productPrice ?></h4>
                    <p><?= $row->sellerName ?></p>
                    <p><?= $row->description ?></p>
                    <p><?= $row->address ?></p>
                    <p><?= $row->tpNumber ?></p>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs"></script>

</body>

</html>