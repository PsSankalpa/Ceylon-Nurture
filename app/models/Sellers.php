<?php

class sellers extends Model
{

	protected $allowedcolumns = [
		'userid',
		'nameWithInitials',
		'registrationNumber',
		'tpNumber',
		'nic',
		'address',
		'image',
	];

	protected $table = "sellers";
	protected $pk = "userid";

	public function validate($DATA, $FILES, $UName)
	{
		$this->errors = array();
		$this->errors2 = array();
		//validations
		//for name
		/*if(empty($DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Cannot Keep name empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.]+$/',$DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Only letters allowed in the name";
		}*/

		//for registration number
		if (empty($DATA['registrationNumber'])) {
			$this->errors['registrationNumber'] = "Cannot Keep registration number empty";
		} elseif (!preg_match('/^[a-zA-Z-0-9]+$/', $DATA['registrationNumber'])) {
			$this->errors['registrationNumber'] = "Cannot allowed symbols in the registration number";
		}

		//for tp number
		/*if(empty($DATA['tpNumber']))
		{
			$this->errors['tpNumber'] = "Cannot Keep tp number empty empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$DATA['tpNumber']))
		{
			$this->errors['tpNumber'] = "Only numbers allowed in the tp number";
		}
		elseif(!strlen($DATA['tpNumber'])>10)
		{
			$this->errors['tpNumber'] = "Only 10 numbers allowed in the tp number";
		}*/

		//for NIC
		if (empty($DATA['nic'])) {
			$this->errors['nic'] = "Cannot Keep nic number empty";
		} elseif (!preg_match('/^[0-9-vV]+$/', $DATA['nic'])) {
			$this->errors['nic'] = "Cannot allowed symbols in the nic number";
		}

		//for address
		if (empty($DATA['address'])) {
			$this->errors['address'] = "Cannot Keep address empty";
		} elseif (!preg_match('/^[A-Za-z0-9\-\/,.\s]+$/', $DATA['address'])) {
			$this->errors['address'] = "Cannot allowed symbols in the address";
		}

		//for image

		if ($FILES['image']['size'] == 0) {
			$this->errors['image'] = "Cannot keep image empty";
		} else {
			//upload the file to following dir
			$folder = "seller_certificates/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//renaming the image with a username which doctor uploads
			$temp = explode("-", $FILES['image']['name']);
			$newfilename = $UName . '-' . end($temp);

			//create the destination 
			$destination = $folder . $newfilename;

			//create the destination 
			//$destination = $folder . $FILES['image']['name'];

			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors['image'] = $results;
			} else {
				$seller = new seller();
				$seller->get_destination($destination); //send the address of the file path to seller controller to save in the database 
			}

			if (count($this->errors) == 0) {

				move_uploaded_file($FILES['image']['tmp_name'], $destination);
				return true;
			}

			return false;
		}
	}

	//---------------------------------------------------------------------------------------------------------------------------------------

	public function validate2($DATA, $FILES, $UName, $userid,$dest)
	{
		$this->errors = array();
		$this->errors2 = array();

		//validations
		//for name
		if (empty($DATA['nameWithInitials'])) {
			$this->errors['nameWithInitials'] = "Cannot Keep name empty";
		} elseif (!preg_match('/^[a-zA-Z\s\.]+$/', $DATA['nameWithInitials'])) {
			$this->errors['nameWithInitials'] = "Only letters allowed in the name";
		}

		//for registration number
		if (empty($DATA['registrationNumber'])) {
			$this->errors['registrationNumber'] = "Cannot Keep registration number empty";
		} elseif (!preg_match('/^[a-zA-Z-0-9]+$/', $DATA['registrationNumber'])) {
			$this->errors['registrationNumber'] = "Cannot allowed symbols in the registration number";
		}

		//for tp number
		if (empty($DATA['tpNumber'])) {
			$this->errors['tpNumber'] = "Cannot Keep tp number empty empty";
		} elseif (!preg_match('/^[0-9]+$/', $DATA['tpNumber'])) {
			$this->errors['tpNumber'] = "Only numbers allowed in the telephone number";
		} elseif (strlen($DATA['tpNumber']) > 10) {
			$this->errors['tpNumber'] = " Only 10  numbers allow in telephone number";
		}elseif (strlen($DATA['tpNumber']) < 10) {
			$this->errors['tpNumber'] = "Telephone number is not valid";
		}

		//for NIC
		if (empty($DATA['nic'])) {
			$this->errors['nic'] = "Cannot Keep nic number empty";
		} elseif (!preg_match('/^[0-9-vV]+$/', $DATA['nic'])) {
			$this->errors['nic'] = "Cannot allowed symbols in the nic number";
		}

		//for address
		if (empty($DATA['address'])) {
			$this->errors['address'] = "Cannot Keep address empty";
		} elseif (!preg_match('/^[A-Za-z0-9\-\/,.\s]+$/', $DATA['address'])) {
			$this->errors['address'] = "Cannot allowed symbols in the address";
		}

		//for image

		if ($FILES['image']['size'] == 0) {
			$seller = new seller();
			$seller->get_destination($dest);

			if (count($this->errors) == 0) {
				return true;
			}
		} else {
			//upload the file to following dir
			$folder = "seller_certificates/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//for delete the previous image
			$row = $this->where('userid', $userid); //in here row is an array
			if ($row) {
				$row = $row[0];
				if (file_exists($row->image)) {
					unlink($row->image);
				}
			}

			//renaming the image with a username which doctor uploads
			$temp = explode("-", $FILES['image']['name']);
			$newfilename = $UName . '-' . end($temp);

			//create the destination 
			$destination = $folder . $newfilename;

			//create the destination 
			//$destination = $folder . $FILES['image']['name'];

			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors['image'] = $results;
			} else {
				$seller = new seller();
				$seller->get_destination($destination); //send the address of the file path to seller controller to save in the database 
			}

			if (count($this->errors) == 0) {

				move_uploaded_file($FILES['image']['tmp_name'], $destination);
				return true;
			}

		}
		// -------------------------------------------------------------------------------------------------------------------------------------------

		return false;
	}
}
