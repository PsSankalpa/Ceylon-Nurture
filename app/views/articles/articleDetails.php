<!DOCTYPE html>
<html>

<head>
    <title>Articles Page</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/articles.css">

</head>

<body class="a-body">

    <div class="article-details">
        <?php foreach ($rows as $row) : ?>
            <div class="article">
                <div class="a-image">
                    <h3><?= $row->articleName ?> </h3>
                    <img src="<?= ASSETS2 . $row->image ?> ">
                </div>
                <div class="details">
                    <div class="back-btn">
                        <a href="<?= ROOT ?>header/viewArticles"><button class="back">&times;</button></a>
                    </div>
                    <div id="myBtnContainer">
                        <button class="btn active" onclick="filterSelection('Overview')"> Overview</button>
                        <button class="btn" onclick="filterSelection('Uses')"> Uses</button>
                        <button class="btn" onclick="filterSelection('Side effects')"> Side effects</button>
                        <button class="btn" onclick="filterSelection('Precautions')"> Precautions</button>
                        <button class="btn" onclick="filterSelection('Interactions')"> Interactions</button>
                        <button class="btn" onclick="filterSelection('Dosing')"> Dosing</button>
                        <button class="btn" onclick="filterSelection('Reviews')"> Reviews</button>
                    </div>

                    <!--details of the articless-->
                    <div class="container">

                        <div class="filterDiv Overview"><?= $row->description ?></div>
                        <div class="filterDiv Uses"><?= $row->uses ?></div>
                        <div class="filterDiv Side effects"><?= $row->sideEffects ?></div>
                        <div class="filterDiv Precautions"><?= $row->precautions ?></div>
                        <div class="filterDiv Interactions"><?= $row->interactions ?></div>
                        <div class="filterDiv Dosing"><?= $row->dosing ?></div>

                        <!--review section-->
                        <div class="filterDiv Reviews">

                            <div class="reviews1">

                                <?php if ($data4 != null) : ?>

                                    <?php foreach ($data4 as $data4) : ?>
                                        <?php if ($data4->ownerid == Auth::userid()) : ?>
                                            <div class="r-container dark right1">
                                                <p class="o-name right"><?= $data4->reviewOwner ?></p>
                                                <p class="review"><?= $data4->review ?></p>
                                            </div>
                                        <?php elseif ($data4->ownerid != Auth::userid()) : ?>
                                            <div class="r-container">
                                                <p class="o-name"><?= $data4->reviewOwner ?></p>
                                                <p class="review"><?= $data4->review ?></p>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                <?php else : ?>

                                    <div>
                                        <p>There are no reviews yet</p>
                                    </div>

                                <?php endif; ?>

                            </div>

                            <!--for the review submit form-->
                            <div class="r-from">
                                <form method="POST">
                                    <input type="text" class="review-t1" id="review" name="review" placeholder="Add review">
                                    <button class="submit-r">Post</button>
                                </form>
                            </div>

                        </div>

                    </div>

                    <div>
                        <?php if (($data2) && ($row)) : ?>
                            <?php if ($data3 == 'owner') : ?>
                                <div class="access-buttons Mbtns">
                                    <div class="editbtn"><a href="<?= ROOT ?>/doctor/editarticles/<?= $row->articleid ?>"><button>Edit</button></a></div>
                                    <form method="POST">
                                        <input type="hidden" name="delete">
                                        <div class="deletebtn"><button>Delete</button></div>
                                    </form>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>


            </div>


        <?php endforeach; ?>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->

    <script src="<?= ASSETS ?>js/article.js"></script>
</body>

</html>