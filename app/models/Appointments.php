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
        'nic',
        'tpNumber',
        'totalPayment',
        'commission',
        'doctorName',
        'date',



	];

	protected $table = "appointments";
	protected $pk = "appointmentid";
}