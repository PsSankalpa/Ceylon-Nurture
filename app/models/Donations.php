<?php
/**
 * Donation Model
 */
class donations extends Model
{
    protected $table = "donations";

    protected $allowedcolumns = [
        'date',
        'amount',
		'userName',
        'userID',
        'donationID',
        'status',
    ];

	protected $pk = "feesID";
    protected $pk2 = "donationID";

}