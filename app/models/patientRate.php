<?php

class patientRate extends Model
{
	

	protected $allowedcolumns = [
		'userid',
		'date',
		'feedback',
		'doctorid',
		'doctorName',


	];

	protected $table = "patientRate";
	protected $pk = "patientRateid";

}