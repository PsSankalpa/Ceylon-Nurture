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
		'userName',
		'commissionNumber',
        'userID',
    ];

	protected $pk = "feesid";

}
