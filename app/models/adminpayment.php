<?php

class adminpayment extends Model
{

	protected $allowedcolumns = [
		'type',
        'amount',
        'date',
        'adminid',





	];

	protected $table = "adminpayment";
	protected $pk = "adminPaymentid";
}
?>