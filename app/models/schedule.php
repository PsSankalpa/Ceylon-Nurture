<?php
class schedule extends Model
{

	protected $allowedcolumns = [
		'slotNumber',
		'dateofSlot',
		'arrivalTime',
        'departureTime',
        'noOfPatient',
		'timePerPatient',
		'doctorCharge',
        'doctorNote',
		'doctorName',
		'doctorid',
	];
    protected $table = "schedule";
	protected $pk = "scheduleid";
	protected $pk2 = "userid";

	public function validate($DATA,$FILES)
	{
       //print_r($DATA);
       
        //-------------------------------------------------------------------------------------------------------------------------------------
		//for schedule
        $this->errors2 = array();
		//for slotNumber
		if(empty($DATA['slotNumber']))
		{
			$this->errors2['slotNumber'] = "Cannot Keep Product name empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['slotNumber']))
		{
			$this->errors2['slotNumber'] = "Only numbers allowed in the slot number";
		}

		//for dateofSlot
		if(empty($DATA['dateofSlot']))
		{
			$this->errors2['dateofSlot'] = "Cannot Keep Date of Slot empty";
		}
		

		//Validations for Arrival Time
		if(empty($DATA['arrivalTime']))
		{
		}
		elseif(!preg_match("#(([0-1])|([1-12]).([0-5])([0-9]))#", $DATA['arrivalTime']))
		{
			$this->errors2['arrivalTime'] = "Wrong Time Format in Arrival Time";
		}

        //Validations for Departure Time
		if(empty($DATA['departureTime']))
		{
			$this->errors2['departureTime'] = "Cannot Keep Departure Time empty";
		}
        elseif(!preg_match("#(([0-1])|([1-12]).([0-5])([0-9]))#", $DATA['departureTime']))
		{
			$this->errors2['departureTimearrivalTime'] = "Wrong Time Format in Departure Time";
		}

        //Validations for No of Patients
        if(empty($DATA['noOfPatient']))
		{
			$this->errors2['noOfPatient'] = "Cannot Keep No of Patients empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['noOfPatient']))
		{
			$this->errors2['noOfPatient'] = "Only numbers allowed in No of Patients";
		}

        //Validations for Time Per Patient
        if(empty($DATA['timePerPatient']))
		{
			$this->errors2['timePerPatient'] = "Cannot Keep No of Patients empty";
		}
		elseif(!preg_match("#(([0-1])|([1-12]).([0-5])([0-9]))#", $DATA['timePerPatient']))
		{
			$this->errors2['timePerPatient'] = "Wrong Time Format in Time Per Patient";
		}

        //Validations for Doctor Charge
        if(empty($DATA['doctorCharge']))
		{
			$this->errors2['doctorCharge'] = "Cannot Keep the Doctor Charge empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['doctorCharge']))
		{
			$this->errors2['doctorCharge'] = "Only numbers allowed in the Doctor Charge";
		}
		
        //Validations for Doctor Note
        if(empty($DATA['doctorNote']))
		{
			$this->errors2['doctorNote'] = "Cannot Keep Doctor Note empty";
		}

        if(count($this->errors2) == 0)
        {
            return true;
        }
        return false;

	
    }


}