<!DOCTYPE html>
<html>

<head>
    <title>Articles Page</title>
    <?php $this->view("header") ?>

    <link rel="stylesheet" href="<?= ASSETS ?>css/common.css">
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
                    <div id="myBtnContainer">
                        <button class="btn active" onclick="filterSelection('Overview')"> Overview</button>
                        <button class="btn" onclick="filterSelection('Uses')"> Uses</button>
                        <button class="btn" onclick="filterSelection('Side effects')"> Side effects</button>
                        <button class="btn" onclick="filterSelection('Precautions')"> Precautions</button>
                        <button class="btn" onclick="filterSelection('Interactions')"> Interactions</button>
                        <button class="btn" onclick="filterSelection('Dosing')"> Dosing</button>
                        <button class="btn" onclick="filterSelection('Reviews')"> Reviews</button>
                        <div class="back-btn">
                            <a href="<?= ROOT ?>header/viewArticles"><button class="back">&times;</button></a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="filterDiv Overview"><?= $row->description ?></div>
                        <div class="filterDiv Uses"><?= $row->uses ?></div>
                        <div class="filterDiv Side effects"><?= $row->sideEffects ?></div>
                        <div class="filterDiv Precautions"><?= $row->precautions ?></div>
                        <div class="filterDiv Interactions"><?= $row->interactions ?></div>
                        <div class="filterDiv Dosing"><?= $row->dosing ?></div>
                        <div class="filterDiv Reviews">
                            <div class="pro-image">
                                <?= $row->reviewOwner ?>
                            </div>
                            <div class="review">
                                <?= $row->review ?>
                            </div>
                        </div>
                        <?php if( ($data2)&&($row) ): ?>
                            <?php if (($data2 == "doctor") || ($data2 == "doctorAndSeller") || ($data2 == "doctorAndPatient") || ($data2 == "allUser")) : ?>
                                <div class="access-buttons Mbtns">
                                    <div class="editbtn"><a href="<?=ROOT?>/doctor/editarticles/<?=$row->articleid?>"><button>Edit</button></a></div>
                                    <div class="deletebtn"><button>Delete</button></div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>


            </div>


        <?php endforeach; ?>
    </div>

    <script src="<?= ASSETS ?>js/article.js"></script>
</body>

</html>