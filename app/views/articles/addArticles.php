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
            <a href="<?=ROOT?>/doctor/myArticles"><button class="tablinks ">My Articles</button></a>
            <a href="<?= ROOT ?>/doctor/addArticles"><button class="tablinks active"> Add Article</button></a>
        </div>

        <!--for the errors-->
        <?php if (count($errors) > 0) : ?>
            <div class="alertwarning">
                <button class="closebtn" id="A_closebtn" onclick="closebutton()">&times;</button>
                <strong>Error!</strong>
                <?php foreach ($errors as $error) : ?>
                    <br /><?= $error ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <!--article form-->
        <div class="tabcontent form-container" id="addArticles">
            <h2>Add Article</h2>

            <form enctype="multipart/form-data" method="POST">

                <div class="row">
                    <div class="col-25">
                        <label for="articleName">Article Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" value="<?= get_var('articleName') ?>" id="articleName" name="articleName" placeholder="Article name..">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="description">Description</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="description" value="<?= get_var('description') ?>" name="description" placeholder="Write something.." style="height:100px">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="uses">Uses</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="uses" name="uses" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="Side Effects">Side Effects</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="Side Effects" name="sideEffects" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="precautions">Precautions</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="precautions" name="precautions" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="interaction">Interactions</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="interaction" name="interactions" placeholder="Write something.." style="height:100px"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="dosing">Dosing</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="dosing" name="dosing" placeholder="Write something.." style="height:100px"></textarea>
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

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->

    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs"></script>
</body>

</html>