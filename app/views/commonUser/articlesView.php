<!DOCTYPE html>
<html>

<head>
    <title>Articles Page</title>
    <?php $this->view("header") ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/articles.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">

</head>

<body class="a-body">

    <div class="main-container">
        <div>
            <?php if ($rows2) : ?>
                <?php if (($rows2 == "doctor") || ($rows2 == "doctorAndSeller") || ($rows2 == "doctorAndPatient") || ($rows2 == "allUser")) : ?>
                    <div class="access-buttons">
                        <a href="<?= ROOT ?>/doctor/myArticles"><button class="my-A">My Articles</button></a>
                        <a href="<?= ROOT ?>/doctor/addArticles"><button class="add-A">Add Article</button></a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

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

        <div class="article-ds">

            <div class="div" style="width:100%">
                <h2>Latest</h2>
            </div>

            <div class="A-view">

                <span class="prev carousel__button-prev">&#10094;</span>

                <?php if ($rows) : ?>
                    <?php foreach ($rows as $row) : ?>

                        <div class="article-card product">
                            <h1><?= $row->articleName ?></h1>
                            <picture>
                                <img src="<?= ASSETS2 . $row->image ?>" alt="A-herb" style="width:100%">
                            </picture>
                            <p><?= $row->description ?></p>
                            <p><a href="<?= ROOT ?>/articles/articleDetails/<?= $row->articleid ?>"><button>View Information</button></a></p>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <h4>No Articles Yet</h4>
                <?php endif; ?>

                <span class="next carousel__button-next">&#10095;</span>
            </div>

        </div>


        <div class="products-section">

            <div class="cardrow">
                <?php if ($rows3) : ?>
                    <?php foreach ($rows3 as $row) : ?>

                        <div class="cardcolumn">

                        <div class="article-card product">
                            <h1><?= $row->articleName ?></h1>
                            <picture>
                                <img src="<?= ASSETS2 . $row->image ?>" alt="A-herb" style="width:100%">
                            </picture>
                            <p><?= $row->description ?></p>
                            <p><a href="<?= ROOT ?>/articles/articleDetails/<?= $row->articleid ?>"><button>View Information</button></a></p>
                        </div>

                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <h4>No Articles Yet</h4>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->

    <script type="text/javascript" src="<?= ASSETS ?>js/article.js"></script>
</body>

</html>