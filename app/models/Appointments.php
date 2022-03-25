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








	];

	protected $table = "appointments";
	protected $pk = "appointmentid";
}
