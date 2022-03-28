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
        'noOfPatients',
        'patientCount',
        'availability',
        'date',
        'slotTimeStart',
        'slotTimeEnd',


	];

	protected $table = "appointments";
	protected $pk = "appointmentid";
}
