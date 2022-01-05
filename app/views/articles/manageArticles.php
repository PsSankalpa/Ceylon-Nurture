<!DOCTYPE html>
<html>

<head>
    <title>Articles Page</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/articles.css">
</head>

<body class="a-body">

    <div class="m-articles">

        <div class="myBtnContainer A-btns">
            <button class="tablinks active" onclick="changesection(event, 'myArticles')" id="defaultOpen">My Articles</button>
            <a href="<?= ROOT ?>/doctor/addArticles"><button class="tablinks" onclick="changesection(event, 'addArticles')"> Add Article</button></a>
        </div>

        <!--articles--> 
        <div class="tabcontent" id="myArticles" style="display:block;">
            <?php if ($data) : ?>
                <?php foreach ($data as $data) : ?>
                    <div class="articles-row">
                        <div class="image"><img src="<?= ASSETS2 . $data->image ?> "></div>
                        <div class="article-name"><?= $data->articleName ?></div>
                        <div class="viewbtn"><a href="<?= ROOT ?>/articles/articleDetails/<?= $data->articleid ?>"><button class="A-btn">View</button></a></div>
                    </div>
                    <hr class="a-hr">
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
    <!--<script type="text/javascript" src="<?= ASSETS ?>js/article.js"></script>-->
</body>

</html>