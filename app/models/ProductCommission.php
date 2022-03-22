<?php
/**
 * Product_commission Model
 */
class productcommission extends Model
{
    protected $table = "productcommission";

    protected $allowedcolumns = [
        'date',
        'amount',
		'productid',
        'userID',
        'status',
        'productName',
    ];

	protected $pk = "feesID";
    protected $pk2 = "productid";

}