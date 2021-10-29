<!DOCTYPE html>
<html>

<head>
    <title>Seller page</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php
    //echo "<pre>";
    //print_r($data['rows']);
    ?>

    <div class="upperpart">

        <div class="name-section">
            <div class="seller-name">
                <div class="name1">
                    <?php if($data3):?>
                        <h1 class="s-name1">Hello <?= $data3[0]->nameWithInitials ?></h1>
                    <?php else:?>
                        <h1 class="s-name1">Not Registered YSet</h1>
                    <?php endif;?>
                </div>
                <div class="img-seller1">
                    <img class="seller-img" src="<?= ASSETS ?>img/seller2-.png" alt="seller">
                </div>
            </div>
        </div>
        <div class="stat-section">
            <div class="stats">
                <div class="p-count con">
                    <h2 class="count">Product Count</h2>
                    <h2 class="pcount"><?= $data4?></h2>
                </div>
                <div class="h-count con">
                    <h2 class="count">Herbs Count</h2>
                    <h2 class="pcount"><?= $data5?></h2>
                </div>
                <div class="summary con">
                    <h2 class="count">Summary</h2>
                    <h2 class="pcount"><?= $data6?></h2>
                </div>
            </div>
        </div>

        <div class="buttons_section mg1 btn-group center2">
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
                            <div class="img-content">
                                <img src="<?= ASSETS2 . $row->image ?> ">
                            </div>
                            <div class="card-content">
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
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <h4>No Products Yet</h4>
            <?php endif; ?>
        </div>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs.js"></script>

</body>

</html>

<!--
    <div id="id01" class="modal_dele">
        <span onclick="document.getElementById('id01').style.display='none'" class="close_dele" title="Close Modal">×</span>
            <form class="modal-content_dele" action="">
                <div class="container_dele">
                    <h1 class="d-topic">Delete Product</h1>
                    <p class="d-detail">Are you sure you want to delete this product?</p>
                    <input type="hidden" name="id" value="product">

                    <div class="clearfix_dele">
                    <button onclick="document.getElementById('id01').style.display='none'" class="cancelbtn_dele">Cancel</button>
                    <a href="<?= ROOT ?>seller/deleteProduct/<?= $row->productid ?>">
                    <button value="Delete" class="deletebtn_dele">Delete</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

-->