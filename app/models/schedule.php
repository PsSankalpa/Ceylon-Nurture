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
		//'doctorName',
		//'city',
		'doctorid',
	];
	protected $table = "schedule";
	protected $pk = "scheduleid";
	protected $pk2 = "doctorid";

	public function validate($DATA, $FILES)
	{

		//for schedule

		$this->errors2 = array();
		//for slotNumber
		if (empty($DATA['slotNumber'])) {
			$this->errors2['slotNumber'] = "Cannot Keep Slot Number name empty";
		} elseif (!preg_match('/^[0-9]+$/', $DATA['slotNumber'])) {
			$this->errors2['slotNumber'] = "Only numbers allowed in the slot number";
		}

		//for dateofSlot
		if (empty($DATA['dateofSlot'])) {
			$this->errors2['dateofSlot'] = "Cannot Keep Date of Slot empty";
		}


		//Validations for Arrival Time
		if (empty($DATA['arrivalTime'])) {
		} elseif (!preg_match("#(([0-1])|([1-12]).([0-5])([0-9]))#", $DATA['arrivalTime'])) {
			$this->errors2['arrivalTime'] = "Wrong Time Format in Arrival Time";
		}

		//Validations for Departure Time
		if (empty($DATA['departureTime'])) {
			$this->errors2['departureTime'] = "Cannot Keep Departure Time empty";
		} elseif (!preg_match("#(([0-1])|([1-12]).([0-5])([0-9]))#", $DATA['departureTime'])) {
			$this->errors2['departureTimearrivalTime'] = "Wrong Time Format in Departure Time";
		}

		// //Validations for No of Patients
		// if (empty($DATA['noOfPatient'])) {
		// 	$this->errors2['noOfPatient'] = "Cannot Keep No of Patients empty";
		// } elseif (!preg_match('/^[0-9]+$/', $DATA['noOfPatient'])) {
		// 	$this->errors2['noOfPatient'] = "Only numbers allowed in No of Patients";
		// }

		//Validations for Time Per Patient
		if (empty($DATA['timePerPatient'])) {
			$this->errors2['timePerPatient'] = "Cannot Keep time per patient empty";
		} elseif (!preg_match("#(([0-1])|([1-12]).([0-5])([0-9]))#", $DATA['timePerPatient'])) {
			$this->errors2['timePerPatient'] = "Wrong Time Format in Time Per Patient";
		}

		//Validations for Doctor Charge
		if (empty($DATA['doctorCharge'])) {
			$this->errors2['doctorCharge'] = "Cannot Keep the Doctor Charge empty";
		} elseif (!preg_match('/^[0-9]+$/', $DATA['doctorCharge'])) {
			$this->errors2['doctorCharge'] = "Only numbers allowed in the Doctor Charge";
		}

		//Validations for patient count
		if (!empty($DATA['arrivalTime']) && !empty($DATA['departureTime'])) 
		{
			
			$a_t = strtotime($DATA['arrivalTime']);
			$d_t = strtotime($DATA['departureTime']);

			// if($a_t>=$d_t){
			// 	print_r("true");
			// }else print_r("false");

			// die;

			if (($a_t>= $d_t) || ($a_t == $d_t))
			{
				$this->errors2['arrivalTime'] = "Arrival time and departure time is not valid";
			} 
			else
			 {
				 //posibilities 3!
				if ($this->query("select slotNumber  from $this->table where slotNumber=:slotNumber && dateofSlot =:dateofSlot", ['slotNumber' => $DATA['slotNumber'],'dateofSlot' => $DATA['dateofSlot'] ] ) ) 
				{
					$this->errors2['slotNumber'] = "cannot put same slot number on same day";
				} 
				if ($this->query("select slotNumber  from $this->table where slotNumber=:slotNumber && dateofSlot =:dateofSlot && arrivalTime=:arrivalTime", ['arrivalTime' => $DATA['arrivalTime'], 'slotNumber' => $DATA['slotNumber'], 'dateofSlot' => $DATA['dateofSlot']])) 
				{
					$this->errors2['arrivalTime'] = "cannot put same arrival time on same day";
				}
				if ($this->query("select slotNumber  from $this->table where slotNumber=:slotNumber && dateofSlot =:dateofSlot && (arrivalTime<=:arrivalTime && departureTime>=:arrivalTime || departureTime>=:departureTime)", ['arrivalTime' => $DATA['arrivalTime'], 'departureTime' => $DATA['departureTime'], 'slotNumber' => $DATA['slotNumber'], 'dateofSlot' => $DATA['dateofSlot']])) 
				{
					$this->errors2['arrivalTime'] = "invalid arrival time";
				}
				if ($this->query("select slotNumber  from $this->table where dateofSlot =:dateofSlot && arrivalTime=:arrivalTime", ['arrivalTime' => $DATA['arrivalTime'], 'dateofSlot' => $DATA['dateofSlot']])) 
				{
					$this->errors2['arrivalTime'] = "cannot put same arrival time on same day in different slots";
				}
				if ($this->query("select slotNumber  from $this->table where dateofSlot =:dateofSlot && (arrivalTime<=:departureTime && departureTime>=:departureTime)", ['departureTime' => $DATA['departureTime'], 'dateofSlot' => $DATA['dateofSlot']])) 
				{
					$this->errors2['arrivalTime'] = "invalid depature time";
				}
				if ($this->query("select slotNumber  from $this->table where dateofSlot =:dateofSlot && (arrivalTime<=:arrivalTime && departureTime>=:arrivalTime || departureTime>=:departureTime)", ['arrivalTime' => $DATA['arrivalTime'], 'departureTime' => $DATA['departureTime'], 'dateofSlot' => $DATA['dateofSlot']])) 
				{
					$this->errors2['arrivalTime'] = "invalid arrival time";
				}   
				elseif(!empty($DATA['timePerPatient'])) 
				{
					$arrivalTime = date_create($DATA['arrivalTime']);
					$departureTime = date_create($DATA['departureTime']);

					$difference = date_diff($arrivalTime, $departureTime); //take the time differance,this will give dif as an object

					//converting to minutes
					$minutes = $difference->days * 24 * 60;
					$minutes += $difference->h * 60;
					$minutes += $difference->i;

					//taking the appropriate patient count
					$diff = $minutes / $DATA['timePerPatient'];
					$patientcount = ceil($diff);

					// print_r($minutes);
					// print_r("\n");
					// print_r($arrivalTime);

					// die;

					//send the patient count to doctor controller
					$doctor = new doctor();
					$doctor->get_patientcount($patientcount);
				}
			}
		}



		if (count($this->errors2) == 0) {
			return true;
		}
		return false;
	}
}
