<?php
/**
 * Common User Model
 */
class donations extends Model
{
    protected $table = "donations";

    protected $allowedcolumns = [
        'date',
        'amount',
		'userName',
		'donationNumber',
        'userID',
        'method',
        'status_message',
    ];

	protected $pk = "feesid";

}