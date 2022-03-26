<!DOCTYPE html>
<html>

<head>
    <title>Ceylon Nurture|Seller|Registration</title>
    <?php $this->view("header", $data) ?>
    <link rel="stylesheet" href="<?= ASSETS ?>css/sellers.css">
</head>

<body class="regi">

    <div class="table1">
        <div class="detail-table">

            <?php if ($rows) : ?>
                <table class="paydetails">
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>PDF</th>
                    </tr>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row->userName ?></td>
                            <td><?= $row->date ?></td>
                            <td><?= $row->amount ?></td>
                            <td><a href="<?= ROOT ?>commonuser/generatepdf/<?= $row->feesID ?>"><button class="pdfbtn">PDF</button></a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else : ?>
                <h4>No Payments Yet</h4>
            <?php endif; ?>

        </div>
    </div>
    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
    <script type="text/javascript" src="<?= ASSETS ?>js/sellerJs"></script>

</body>

</html>