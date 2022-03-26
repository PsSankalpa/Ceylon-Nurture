<?php

class article extends Model
{
	protected $allowedcolumns = [
		'articleName',
		'description',
		'uses',
		'sideEffects',
		'precautions',
		'interactions',
		'dosing',
		'image',
		'doctorid',
		'date',
	];

	protected $table = "articles";
	protected $pk = "articleid";
	protected $pk2 = "docotrid";

	public function validate($DATA, $FILES)
	{
		//-------------------------------------------------------------------------------------------------------------------------------------
		//for article
		$this->errors2 = array();
		//print_r($DATA);
		//for article name
		if (empty($DATA['articleName'])) {
			$this->errors2['articleName'] = "Cannot Keep Product name empty";
		} elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $DATA['articleName'])) {
			$this->errors2['articleName'] = "Only letters allowed in the product name";
		}

		//for description
		if (empty($DATA['description'])) {
			$this->errors2['description'] = "Cannot Keep description empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;\\""]+$/', $DATA['description'])) {
			$this->errors2['description'] = "Only letters allowed in the description";
		}

		//for uses
		if (empty($DATA['uses'])) {
			$this->errors2['uses'] = "Cannot Keep uses empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;\\""]+$/', $DATA['uses'])) {
			$this->errors2['uses'] = "Only letters allowed in the uses";
		}

		//for side effects
		if (empty($DATA['sideEffects'])) {
			$this->errors2['sideEffects'] = "Cannot Keep sideEffects empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;:\\""]+$/', $DATA['sideEffects'])) {
			$this->errors2['sideEffects'] = "Only letters allowed in the side effects";
		}

		//for precautions
		if (empty($DATA['precautions'])) {
			$this->errors2['precautions'] = "Cannot Keep precautions empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;:-?\-()\'?,:\\""]+$/', $DATA['precautions'])) {
			$this->errors2['precautions'] = "Only letters allowed in the precautions";
		}

		//for interactions
		if (empty($DATA['interactions'])) {
			$this->errors2['interactions'] = "Cannot Keep interactions empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;:\\""]+$/', $DATA['interactions'])) {
			$this->errors2['interactions'] = "Only letters allowed in the interactions";
		}

		//for dosing
		if (empty($DATA['dosing'])) {
			$this->errors2['dosing'] = "Cannot Keep dosing empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;:?\-()\'?,;\\""]+$/', $DATA['dosing'])) {
			$this->errors2['dosing'] = "Only letters allowed in the dosing";
		}

		//for image		
		if ($FILES['image']['size'] == 0) {
			$this->errors2['image'] = "Cannot keep image empty";
		} else {
			//upload the file to following dir
			$folder = "articles_images/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//create the destination 
			$destination = $folder . $FILES['image']['name'];

			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors2['image'] = $results;
			} else {
				$seller = new doctor();
				$seller->get_destination($destination); //send the address of the file path to seller controller to save in the database 
			}
		}

		if (count($this->errors2) == 0) {
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}
		return false;
	}

	public function validate2($DATA, $FILES, $UName, $articleid, $dest)
	{
		//-------------------------------------------------------------------------------------------------------------------------------------
		//for article
		$this->errors2 = array();
		//print_r($DATA);
		//for article name
		if (empty($DATA['articleName'])) {
			$this->errors2['articleName'] = "Cannot Keep Product name empty";
		} elseif (!preg_match('/^[a-zA-Z0-9\s]+$/', $DATA['articleName'])) {
			$this->errors2['articleName'] = "Only letters allowed in the product name";
		}

		//for description
		if (empty($DATA['description'])) {
			$this->errors2['description'] = "Cannot Keep description empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;\\""]+$/', $DATA['description'])) {
			$this->errors2['description'] = "Only letters allowed in the description";
		}

		//for uses
		if (empty($DATA['uses'])) {
			$this->errors2['uses'] = "Cannot Keep uses empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;\\""]+$/', $DATA['uses'])) {
			$this->errors2['uses'] = "Only letters allowed in the uses";
		}

		//for side effects
		if (empty($DATA['sideEffects'])) {
			$this->errors2['sideEffects'] = "Cannot Keep sideEffects empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;:\\""]+$/', $DATA['sideEffects'])) {
			$this->errors2['sideEffects'] = "Only letters allowed in the side effects";
		}

		//for precautions
		if (empty($DATA['precautions'])) {
			$this->errors2['precautions'] = "Cannot Keep precautions empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;:-?\-()\'?,:\\""]+$/', $DATA['precautions'])) {
			$this->errors2['precautions'] = "Only letters allowed in the precautions";
		}

		//for interactions
		if (empty($DATA['interactions'])) {
			$this->errors2['interactions'] = "Cannot Keep interactions empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;?\-()\'?,;:\\""]+$/', $DATA['interactions'])) {
			$this->errors2['interactions'] = "Only letters allowed in the interactions";
		}

		//for dosing
		if (empty($DATA['dosing'])) {
			$this->errors2['dosing'] = "Cannot Keep dosing empty";
		} elseif (!preg_match('/^[a-zA-Z\s0-9\.,;:?\-()\'?,;\\""]+$/', $DATA['dosing'])) {
			$this->errors2['dosing'] = "Only letters allowed in the dosing";
		}

		//for image		
		if ($FILES['image']['size'] == 0) {
			$doctor = new doctor();
			$doctor->get_destination($dest);

			if (count($this->errors) == 0) {
				return true;
			}
		} else {
			//upload the file to following dir
			$folder = "articles_images/";
			if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
			{
				mkdir($folder, 0777, true);
			}

			//for delete the previous image
			$row = $this->where('articleid', $articleid); //in here row is an array
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
			// $destination = $folder . $FILES['image']['name'];

			$imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
			if (!empty($results)) {
				$this->errors2['image'] = $results;
			} else {
				$doctor = new doctor();
				$doctor->get_destination($destination); //send the address of the file path to seller controller to save in the database 
			}

			if (count($this->errors2) == 0) {
				move_uploaded_file($FILES['image']['tmp_name'], $destination);
				return true;
			}

		}
		return false;
	}
}
