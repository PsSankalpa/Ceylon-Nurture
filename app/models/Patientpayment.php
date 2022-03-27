<?php

class patientpayment extends Model
{

	protected $allowedcolumns = [
		'paymentid',
		'appointmentid',
        'patientName',
        'totalPayment',
        'commission',
        'doctorName',
        'date',
        'doctorCharge',
        'status',
        'doctorid',




	];

	protected $table = "patientpayment";
	protected $pk = "paymentid";
}
