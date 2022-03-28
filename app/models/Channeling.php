<?php

class channeling extends Model
{
    protected $allowedcolumns = [
		'channelingid',
        'doctorName',
		'patientName',
        'recordNumber',
        'amount',
        'date',
        'category',
        'description',
        'DoctorID',
        'PatientID',
        'scheduleID',


	];
    protected $table = "channeling";
	protected $pk = "channelingid";

}

?>
