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
	];
    protected $table = "schedule";
	protected $pk = "scheduleid";

	public function validate($DATA,$FILES)
	{
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
			$this->errors2['dateofSlot'] = "Cannot Keep dateofSlot empty";
		}
		

		//Validations for Arrival Time
		if(empty($DATA['arrivalTime']))
		{
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['arrivalTime']))
		{
			$this->errors2['arrivalTime'] = "Only numbers allowed in the arrival time";
		}

        //Validations for Departure Time
		if(empty($DATA['departureTime']))
		{
			$this->errors2['departureTime'] = "Cannot Keep Departure Time empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['departureTime']))
		{
			$this->errors2['departureTime'] = "Only numbers allowed in the Departure Time";
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
        if(empty($DATA['noOfPatient']))
		{
			$this->errors2['noOfPatient'] = "Cannot Keep No of Patients empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['noOfPatient']))
		{
			$this->errors2['noOfPatient'] = "Only numbers allowed in No of Patients";
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

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;

	
    }


}