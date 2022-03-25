<?php

class appointments extends Model
{

	protected $allowedcolumns = [
		'scheduleid',
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
        'noOfPatients',
        'patientCount',
        'availability',





	];

	protected $table = "appointments";
	protected $pk = "appointmentid";
}
