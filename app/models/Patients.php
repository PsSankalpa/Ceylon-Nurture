<?php

class patients extends Model
{
	

	protected $allowedcolumns = [
		'userid',
		'nameWithInitials',
		'gender',
		'DOB',
		'nic',
		'image',
	];

	protected $table = "patients";

	public function validate($DATA,$FILES)
	{
		$this->errors = array();
		$this->errors2 = array();
		//validations
		//for name
		if(empty($DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Cannot Keep name empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.]+$/',$DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Only letters allowed in the name";
		}


		//for gender number
		if(empty($DATA['gender']))
		{
			$this->errors['gender'] = "Cannot Keep gender empty";
		}
		

		//for NIC
		if(empty($DATA['nic']))
		{
			$this->errors['nic'] = "Cannot Keep nic number empty";
		}
		elseif(!preg_match('/^[0-9-vV]+$/',$DATA['nic']))
		{
			$this->errors['nic'] = "Cannot allowed symbols in the nic number";
		}

		//for DOB
		if(empty($DATA['DOB']))
		{
			$this->errors['DOB'] = "Cannot Keep date of birth empty";
		}
		
		
		//for image
		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors['image'] = "Cannot keep image empty";
		}
		else
        {
            //upload the file to following dir
            $folder = "medical_records/";
            if(!file_exists($folder))//if dir doesn't exist,create it like below with file permissions
            {
                mkdir($folder,0777,true);
            }

            //create the destination 
            $destination = $folder . $FILES['image']['name'];
			
			$imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
			$uploadOk = 1;
			$results = $this->images($FILES,$destination,$imageFileType,$uploadOk);
			if(!empty($results))
			{
				$this->errors['image'] =$results;
			}
			else
			{
				$patient = new patient();
				$patient->get_destination($destination);//send the address of the file path to patient controller to save in the database 
			}

		if(count($this->errors) == 0)
		{
			
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}

		return false;
	}

}

}
