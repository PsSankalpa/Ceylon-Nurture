<?php
class sellers extends Model
{
	protected $table = "sellers";

	public function validate($DATA)
	{
		$this->errors = array();
		//validations
		//for name
		if(empty($DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Cannot Keep this empty";
		}
		elseif(!preg_match('/^[a-zA-Z-.]+$/',$DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Only letters allowed in the name";
		}

		//for registration number
		if(empty($DATA['registrationNumber']))
		{
			$this->errors['registrationNumber'] = "Cannot Keep this empty";
		}
		elseif(!preg_match('/^[a-zA-Z-0-9]+$/',$DATA['registrationNumber']))
		{
			$this->errors['registrationNumber'] = "Cannot allowed symbols";
		}

		//for tp number
		if(empty($DATA['tpNumber']))
		{
			$this->errors['tpNumber'] = "Cannot Keep this empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['tpNumber']))
		{
			$this->errors['tpNumber'] = "Only numbers allowed";
		}
		elseif(!strlen($DATA['tpNumber'])>10)
		{
			$this->errors['tpNumber'] = "Only 10 numbers allowed";
		}

		//for NIC
		if(empty($DATA['nic']))
		{
			$this->errors['nic'] = "Cannot Keep this empty";
		}
		elseif(!preg_match('/^[0-9-vV]+$/',$DATA['nic']))
		{
			$this->errors['nic'] = "Cannot allowed symbols";
		}

		//for address
		if(empty($DATA['address']))
		{
			$this->errors['address'] = "Cannot Keep this empty";
		}
		elseif(!preg_match('/^[A-Za-z0-9\-\/,.]+$/',$DATA['address']))
		{
			$this->errors['address'] = "Cannot allowed symbols";
		}

		if(count($this->errors) == 0)
		{
			return true;
		}
		return false;
	}
	
}