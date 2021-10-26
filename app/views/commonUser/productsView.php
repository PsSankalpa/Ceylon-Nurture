<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
</head>

<body>

    <?php
    //echo "<pre>";
    //print_r($data['rows']);
    ?>

    <div class="slider-frame">
        <div class="slide-images">
            <div class="img-container">
                <img src="<?=ASSETS?>img/slide1.png" alt="img 1">
            </div>
            <div class="img-container">
                <img src="<?=ASSETS?>img/slide2.jpg" alt="img 1">
            </div>
            <div class="img-container">
                <img src="<?=ASSETS?>img/slide3.jpg" alt="img 1">
            </div>
        </div>
    </div>

    <div class="products-section">
        <div class="cardrow">
            <?php if ($rows) : ?>
                <?php foreach ($rows as $row) : ?>
                    <div class="cardcolumn">
                        <div class="card">
                            <img src="<?= ASSETS2 . $row->image ?> ">
                            <div class="card-content">
                                <h3><?= $row->productName ?> </h3>
                                <p><?= "RS." . $row->productPrice ?> </p>
                                <div class="div">
                                    <a href="<?= ROOT ?>/seller/productDetails/<?= $row->productid ?>">
                                        <button class="cardbutton view2">View Infomation</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h4>No Products Yet</h4>
            <?php endif; ?>
        </div>
    </div>

    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs.js"></script>

</body>

</html>