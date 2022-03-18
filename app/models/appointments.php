<?php

class appointments extends Model
{

	protected $allowedcolumns = [
		'scheduleid',
		'appointmentid',
        'patientid',
		'symptoms',
        'doctorid',
        'patientName',
        'nationalID',
        'tpNumber',
        'totalPayment',
        'commission',

	];

	protected $table = "appointments";
	protected $pk = "appointmentid";
}