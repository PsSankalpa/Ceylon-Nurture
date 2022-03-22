<html>

<head>
    <title>Ceylon Nurture|Profile</title>
    <?php $this->view("header") ?>
    <meta name="viewport" content="width=device-width; initial-scale=1.0;">
    <link rel="stylesheet" href="<?= ASSETS ?>css/myAccount.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/common1.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/payments.css">
    <link rel="stylesheet" href="<?= ASSETS ?>css/commonStyle.css">

</head>

<body>
    <div class="form">
        <form method="post" class="payform" action="https://sandbox.payhere.lk/pay/checkout">
            <input type="hidden" name="merchant_id" value="1218919"> <!-- Replace your Merchant ID -->
            <input type="hidden" name="return_url" value="https://ceylon-nurture.live/seller">
            <input type="hidden" name="cancel_url" value="https://ceylon-nurture.live/seller ">
            <input type="hidden" name="notify_url" value="https://ceylon-nurture.live/seller/productCommission">

            <h2 class="h2p txt-col1 topics">Commission Details</h2><br>
            <div class="p-details row">
                <h3 class="h2p txt-col1 topics">Payment Type</h3>
                <div class="p-inputs">
                    <input type="hidden" name="order_id" value="<?= get_var('order_id', $dataid) ?>">
                    <input type="text" class="col-3 p-in" name="items" value="Commission"><br>
                    <input type="text" class="col-3 p-in" name="currency" value="LKR">
                    <input type="text" class="col-3 p-in" name="amount" value="<?= get_var('amount', $data2) ?>">
                </div>
            </div>
            <div class="user-detail row">
                <br><br>
                <h3 class="txt-col1 topics">Customer Details</h3><br>
                <div class="p-inputs">
                    <div class="row2">
                        <input type="text" name="first_name" class="col-3 p-in" value="<?= get_var('first_name', $data->fname) ?>">
                        <input type="text" name="last_name" class="col-3 p-in" value="<?= get_var('last_name', $data->lname) ?>">
                    </div>
                    <div class="row2">
                        <input type="text" name="email" class="col-3 p-in" value="<?= get_var('email', $data->email) ?>">
                        <input type="text" name="phone" class="col-3 p-in" value="<?= "0" . get_var('phone', $data->tpNumber) ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="address" value="No.1, Galle Road">
            <input type="hidden" name="city" value="Colombo">
            <input type="hidden" name="country" value="Sri Lanka"><br><br>
            <input type="submit" class="col-2 btn1 btn" value="Pay Now">
        </form>
    </div>

    <!--footer-->
    <?php $this->view("footer") ?>
    <!--end of footer-->
</body>

</html>
