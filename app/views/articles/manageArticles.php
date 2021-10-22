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
            <button class="tablinks" onclick="changesection(event, 'addArticles')"> Add Article</button>
        </div>

        <div class="tabcontent" id="myArticles" style="display:block;">
            <?php if ($data) : ?>
                <?php foreach ($data as $data) : ?>
                    <div class="articles-row">
                        <div class="image"><img src="<?= ASSETS2 . $data->image ?> "></div>
                        <div class="article-name"><?= $data->articleName ?></div>
                        <div class="viewbtn"><a href="<?= ROOT ?>/articles/articleDetails/<?= $data->articleid ?>"><button class="A-btn">View</button></a></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="tabcontent form-container" id="addArticles" style="display:none;">
            <h2>Add Article</h2>
            <form action="">
                <div class="row">
                    <div class="col-25">
                        <label for="fname">First Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="description">Description</label>
                    </div>
                    <div class="col-75">
                        <textarea id="description" name="description" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="uses">Uses</label>
                    </div>
                    <div class="col-75">
                        <textarea id="uses" name="uses" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Side Effects">Side Effects</label>
                    </div>
                    <div class="col-75">
                        <textarea id="Side Effects" name="Side Effects" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="precautions">Precautions</label>
                    </div>
                    <div class="col-75">
                        <textarea id="precautions" name="precautions" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="interaction">Interactions</label>
                    </div>
                    <div class="col-75">
                        <textarea id="interaction" name="interaction" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="dosing">Dosing</label>
                    </div>
                    <div class="col-75">
                        <textarea id="dosing" name="dosing" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="image">Image of the herb</label>
                    </div>
                    <div class="col-75">
                        <input type="file" id="image" value="<?= get_var('image') ?>" name="image">
                    </div>
                </div>

                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="<?= ASSETS ?>js/article.js"></script>
</body>

</html>