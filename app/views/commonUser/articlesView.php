<!DOCTYPE html>
<html>
    <head>
        <title>Articles Page</title>
        <?php $this -> view ("header")?>
        
        <link rel="stylesheet" href="<?=ASSETS?>css/common.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/articles.css">

    </head>
    <body class="a-body">

    <?php if($rows2):?>
        <?php if( ($rows2 == "doctor")||($rows2 == "doctorAndSeller")||($rows2 == "doctorAndPatient")||($rows2 == "allUser") ):?>
            <div class="access-buttons">
                <button class="my-A">My Articles</button>
                <button class="add-A">Add Article</button>
            </div>
        <?php endif;?>
    <?php endif;?>
        <div class="carousel">
            <div class="carousel__track-container">
            <span class="prev carousel__button-prev" onclick = "left_mover(0)">&#10094;</span>
                <?php if($rows):?>
                    <?php foreach ($rows as $row):?>
                        <div class="article-card">
                            <h1><?=$row->articleName?></h1>
                            <picture>
                                <img src="<?=ASSETS2.$row->image?>" alt="Denim Jeans" style="width:100%">
                            </picture>
                            <br>
                            <p><?=$row->description?></p>
                            <p><a href="<?=ROOT?>/articles/articleDetails/<?=$row->articleid?>"><button>View Information</button></a></p>
                        </div> 
                    <?php endforeach;?>
                <?php else:?>
                    <h4>No Articles Yet</h4>
 			    <?php endif;?>
                 <span class="next carousel__button-next" onclick = "right_mover(1)">&#10095;</span>
            </div>

            

            <div class="carousel__nav">
                <?php if($rows):?>
                    <?php for($n=0;$n<count($rows);$n++){?>
                        <button class="carousel__indicator dot"></button>
                    <?php };?>
                <?php endif;?>
            </div>

        </div>
<script type="text/javascript" src="<?=ASSETS?>js/article.js"></script>
    </body>
</html>