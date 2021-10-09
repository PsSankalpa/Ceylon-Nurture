<!DOCTYPE html>
<html>
    <head>
        <title>Ceylon Nurture|Doctor|Schedule Details</title>
        <?php $this -> view ("header",$data)?>
        <link rel="stylesheet" href="<?=ASSETS?>css/sellers.css">
    </head>

    <body class="regi">

    
    <div class="container center seller-grid-container">
        <h2>Slot Number</h2>
        <h2>Date of The Slot</h2>
        
        <?php foreach ($rows as $row):?>
        <div>
            <h3><?=$row->slotNumber?> </h3>
        </div>
        <div class="">
            <h3>Details</h3>

            <div>
                <h4>Price : <?=$row->dateofSlot?></h4>
            </div>

        </div>
        <?php endforeach;?>

        
    </div>

    <script type="text/javascript" src="<?=ASSETS?>js/sellerJs"></script>
    
    </body>
</html>