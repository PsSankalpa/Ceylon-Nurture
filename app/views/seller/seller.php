<!DOCTYPE html>
<html>

<head>
    <title>Seller page</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
</head>

<body>

    <?php
    //echo "<pre>";
    //print_r($data['rows']);
    ?>

    <div class="upperpart">
        <div class="buttons_section mg1 btn-group center">
            <?php if ((!$data2 == "seller") || (!$data2 == "doctorAndSeller") || (!$data2 == "sellerAndPatient") || (!$data2 == "allUser")) : ?>
                <a href="<?= ROOT ?>seller/registration"><button class="">Register</button></a>
            <?php endif; ?>
            <?php if (($data2 == "seller") || ($data2 == "doctorAndSeller") || ($data2 == "sellerAndPatient") || ($data2 == "allUser")) : ?>
                <a href="<?= ROOT ?>seller/uploadProduct"><button class="">Add Proucts</button></a>
            <?php endif; ?>
        </div>
    </div>

    <div class="products-section">
        <div class="cardrow">
            <?php if ($rows) : ?>
                <?php foreach ($rows as $row) : ?>
                    <div class="cardcolumn">
                        <div class="card">
                            <img src="<?= ASSETS2 . $row->image ?> ">
                            <h3><?= $row->productName ?> </h3>
                            <p><?= "RS." . $row->productPrice ?> </p>
                            <div class="div">
                                <a href="<?= ROOT ?>/seller/productDetails/<?= $row->productid ?>">
                                    <button class="cardbutton view">View Infomation</button>
                                </a>
                            </div>
                            <a href="<?= ROOT ?>/seller/editProduct/<?= $row->productid ?>">
                                <button class="cardbutton btn1">Edit</button>
                            </a>
                            <a href="<?= ROOT ?>seller/deleteProduct/<?= $row->productid ?>">
                                <button class="cardbutton cancel btn1">Delete</button>
                            </a>
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