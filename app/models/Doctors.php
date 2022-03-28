<?php

class doctors extends Model
{

	protected $allowedcolumns = [
		'userid',
		'nameWithInitials',
		'gender',
		'dob',
		'registrationNumber',
		'specialities',
		'hospital',
		'city',
		'address',
		'image',

	];

	protected $table = "doctors";
	protected $pk = "userid";
	//protected $pk2 = "doctorid";

	public function validate($DATA, $FILES, $UName)
	{
		$this->errors = array();
		//validation for registration number
		if (empty($DATA['registrationNumber'])) {
			$this->errors['registrationNumber'] = "Cannot Keep registration number empty";
		} elseif (!preg_match('/^[a-zA-Z-0-9]+$/', $DATA['registrationNumber'])) {
			$this->errors['registrationNumber'] = "Cannot allowed symbols in the registration number";
		}

		//validation for Specialities
		if (empty($DATA['specialities'])) {
			$this->errors['specialities'] = "Cannot Keep specialities  empty";
		}

		//validation for Hospital
		if (empty($DATA['hospital'])) {
			$this->errors['hospital'] = "Cannot Keep hospital  empty";
		}

		//validation for City
		if (empty($DATA['city'])) {
			$this->errors['city'] = "Cannot Keep city  empty";
		}

		//validation for Address
		if (empty($DATA['address'])) {
			$this->errors['address'] = "Cannot Keep address  empty";
		}

		//validation for Qualifications

		if ($FILES['image']['size'] == 0) {
			$this->errors['image'] = "Cannot keep image empty";
		} else {
			//upload the file to following dir
			$folder = "doctor_qualification/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//renaming the image with a username which doctor uploads
			$temp = explode("-", $FILES['image']['name']);
			$newfilename = $UName . '-' . end($temp);

			//create the destination 
			$destination = $folder . $newfilename;


			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors['image'] = $results;
			} else {
				$doctor = new doctor();
				$doctor->get_destination($destination); //send the address of the file path to doctor controller to save in the database 
			}
		}

		if (count($this->errors) == 0) {
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}

		return false;

		//validation for Profile Pic

		if ($FILES['image2']['size'] == 0) {
			$this->errors['image2'] = "Cannot keep image empty";
		} else {
			//upload the file to following dir
			$folder = "doctor_profilepic/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//create the destination 
			$destination = $folder . $FILES['image2']['name'];

			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors['image2'] = $results;
			} else {
				$doctor = new doctor();
				$doctor->get_destination($destination); //send the address of the file path to doctor controller to save in the database 
			}
		}

		if (count($this->errors) == 0) {
			move_uploaded_file($FILES['image2']['tmp_name'], $destination);
			return true;
		}

		return false;
	}
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

		//for address
		if (empty($DATA['address'])) {
			$this->errors['address'] = "Cannot Keep address empty";
		} elseif (!preg_match('/^[A-Za-z0-9\-\/,.\s]+$/', $DATA['address'])) {
			$this->errors['address'] = "Cannot allowed symbols in the address";
		}

		//for image

		if ($FILES['image']['size'] == 0) {
			$doctors = new doctor();
			$doctors->get_destination($dest);

			if (count($this->errors) == 0) {
				return true;
			}
		} else {
			//upload the file to following dir
			$folder = "doctor_certificates/";
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
				$doctors = new doctor();
				$doctors->get_destination($destination);
				//$doctors->get_destination($destination); //send the address of the file path to doctor controller to save in the database 
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
