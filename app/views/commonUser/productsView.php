<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
</head>

<body>

    <?php
    //echo "<pre>";
    //print_r($data['rows']);
    ?>

    <div class="top-container">

        <div class="slide-show">
            <div class="slider-frame">
                <div class="slide-images">
                    <div class="img-container">
                        <img src="<?= ASSETS ?>img/slide1.png" alt="img 1">
                    </div>
                    <div class="img-container">
                        <img src="<?= ASSETS ?>img/slide2.jpg" alt="img 2">
                    </div>
                    <div class="img-container">
                        <img src="<?= ASSETS ?>img/5.jpg" alt="img 3">
                    </div>
                </div>
            </div>
        </div>

        <!-- for the search option category vise -->
        <div class="product-btns">
            <div id="img-p" class="pro-btn c-btns">
                <form action="">
                    <input type="hidden" value="Product" name="search2">
                    <div class="img-s"><img src="<?= ASSETS ?>img/pro-btn.jpg" alt="img 1"></div>
                    <button type="submit" id="btns-p">Products</button>
                </form>

            </div>
            <div id="img-p" class="herb-btn c-btns">
                <form action="">
                    <input type="hidden" value="Herb" name="search2">
                    <div class="img-s"><img src="<?= ASSETS ?>img/herb-btn.jpg" alt="img 2"></div>
                    <button type="submit" id="btns-p">Herbs</button>
                </form>
            </div>
        </div>

    </div>

    <div class="products-section">

        <!--for the search option-->
        <div class="search-container">
            <div class="search_bar">
                <form action="" class="search">
                    <input type="text" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search.." name="search">
                    <!--ternary operator use in the value-->
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>



        <div class="cardrow">

            <!-- <div class="uses1">

                <form action="" class="usesform">
                    <input type="hidden" value="Hair" name="search2">
                    <button class="btn4" type="submit">Hair</button>
                </form>

                <form action="" class="usesform">
                    <input type="hidden" value="Nail" name="search2">
                    <button class="btn4" type="submit">Nail</button>
                </form>


                <form action="" class="usesform">
                    <input type="hidden" value="Foot" name="search2">
                    <button class="btn4" type="submit">Foot</button>
                </form>

            </div> -->

            <?php if ($rows) : ?>
                <?php foreach ($rows as $row) : ?>
                    <div class="cardcolumn">
                        <div class="card">
                            <div class="img-content"><img src="<?= ASSETS2 . $row->image ?> "></div>
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
                <h4>No Products</h4>
            <?php endif; ?>

        </div>

    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->

    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs.js"></script>

</body>

</html>