<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>
            <?php echo $data['page_title'] ?>
        </title>
        <link rel="stylesheet" href="<?ASSETS?>css/signInStyle.css">
        <script type="text/javascript" src="<?ASSETS?>js/sellerJs.js"></script>
    </head>

    <body>
        <?php $this->view("header",$data)?>
        //only the main body
        <?php $this->view("footer",$data)?>1.44
    </body>
</html>