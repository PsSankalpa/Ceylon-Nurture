<?php

class adminpaymentdoctor extends Model
{

	protected $allowedcolumns = [
		'doctorName',
        'amount',
        'date',
        'doctorid',





	];

	protected $table = "adminpaymentdoctor";
	protected $pk = "adminPaymentid";
}
?>