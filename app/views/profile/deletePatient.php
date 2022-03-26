<html>

<head>
    <title>Delete Patient Account</title>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" type="text/css" href="<?= ASSETS ?>css/registrationform.css">
</head>

<body class="regi" style="background-color:#D4F1F4 ;">
    <div class="container center">
        <h1>Delete Doctor Account</h1>
        <?php if ($row) : ?>
            <form class="regi_form" enctype="multipart/form-data" method="POST">
                <h2>Do you want to delete the account <?= get_var('nic',$row->nic) ?></h2>
                <input type="hidden" name="id">
                <hr>
                <br>
                <p>Deleting your account will remove all your information of your account from our database.</p>
                <h3><b>This cannot be undone</b></h3>
                <br>
                <hr>
                <br>
                <div class="row">
                    <input type="submit" value="Delete">
                    <input type="reset" value="Reset">
                </div>

            </form>
        <?php else : ?>
            Account was not found
        <?php endif; ?>
        <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs"></script>
    </div>
    </div>
</body>

</html>