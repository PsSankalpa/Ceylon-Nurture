<?php

class patientRate extends Model
{
	

	protected $allowedcolumns = [
		'userid',
		'date',
		'feedback',
		'doctorid',
		'doctorName',
		'patientName',


	];

	protected $table = "patientRate";
	protected $pk = "patientRateid";

}
