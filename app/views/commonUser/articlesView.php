<!DOCTYPE html>
<html>

<head>
    <title>Articles Page</title>
    <?php $this->view("header") ?>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/articles.css">

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

            <section class="A-view">
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
            </section>

    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
    
    <script type="text/javascript" src="<?= ASSETS ?>js/article.js"></script>
</body>

</html>