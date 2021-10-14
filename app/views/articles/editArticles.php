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

        <div class="container">

            <div class="addArticles">
                <div class="form-container">
                    <h2>Edit Article</h2>
                    <form enctype="multipart/form-data" method="POST">
                        <div class="row">
                            <div class="col-25">
                                <label for="herbname">Herb Name</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('herbname',$data->articleName)?>" id="herbname" name="herbname" placeholder="Product Name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="description">Description</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('description',$data->description)?>" id="description" name="description" placeholder="description">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="description">Uses</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('uses',$data->uses)?>" id="uses" name="uses" placeholder="uses">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="uses">Uses</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('uses',$data->uses)?>" id="uses" name="uses" placeholder="uses">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="descripsideEffects">Side effects</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('sideEffects',$data->sideEffects)?>" id="sideEffects" name="sideEffects" placeholder="sideEffects">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="precautions">Precautions</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('precautions',$data->precautions)?>" id="precautions" name="precautions" placeholder="precautions">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="interactions">Interactions</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('interactions',$data->interactions)?>" id="interactions" name="interactions" placeholder="interactions">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="dosing">Dosing</label>
                            </div>
                            <div class="col-75">
                                <input type="text" value="<?=get_var('dosing',$data->dosing)?>" id="dosing" name="dosing" placeholder="dosing">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="image">Image of the herb</label>
                            </div>
                            <div class="col-75">
                                <input type="file" id="image" value="<?=get_var('image')?>" name="image">
                            </div>
                        </div>

                        <div class="row">
                            <input type="submit" value="Submit">
                            <input type="reset" value="Reset">
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    </div>

    <script type="text/javascript" src="<?= ASSETS ?>js/article.js"></script>
</body>

</html>