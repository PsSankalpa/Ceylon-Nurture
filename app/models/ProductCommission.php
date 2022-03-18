<?php
/**
 * Product_commission Model
 */
class pcommission extends Model
{
    protected $table = "productCommission";

    protected $allowedcolumns = [
        'date',
        'amount',
		'userName',
		'commissionNumber',
        'userID',
        'method',
        'status_message',
    ];

	protected $pk = "feesid";

}