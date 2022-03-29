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
                        <th>Product Name</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>PDF</th>
                    </tr>
                    <?php foreach ($rows as $row) : ?>
                        <tr>
                            <td><?= $row->productName ?></td>
                            <td><?= $row->date ?></td>
                            <td><?= "Rs.".$row->amount ?></td>
                            <td><a href="<?= ROOT ?>seller/generatepdf/<?= $row->productid ?>"><button class="pdfbtn">PDF</button></a></td>
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