<!DOCTYPE html>
<html>
    <head>
        <title>
            Forum   
        </title>
        <link rel="stylesheet" href="<?=ASSETS?>css/commonStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/forumStyle.css">
        <link rel="stylesheet" href="<?=ASSETS?>css/channelingStyle.css">


        <?php $this -> view ("header")?>
    </head>

    <body class="regi">

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="errorpage">
        <h2 class="errorpage_body"> Forum Content is Verified. Please add the content to the articles. </h2>
        <a href="<?=ROOT?>doctor/addArticles"><button class="button_typeB"> Add to Articles </button></a>
    </div>


        <!--footer-->
        <?php $this->view("footer") ?>
        <!--end of footer-->

    </body>
</html>