<?php

class doctors extends Model
{
	protected $prefunctions = [
		'check_image',
	];

	protected $allowedcolumns = [
		'nameWithInitials',
		'gender',
        'dob',
        'registrationNumber',
		'specialities',
		'profilePhoto',
		'qualifications',
	];

	protected $table = "doctors";

	public function validate($DATA,$FILES)
	{
		$this->errors = array();
		$this->errors2 = array();
		//validations
		//validations for name
		if(empty($DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Cannot Keep name empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.]+$/',$DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Only letters allowed in the name";
		}
        //validation for gender
        $genders = ['female','male'];

		if(empty($DATA['gender']) || !in_array($data['gender'], $genders))
        {
            $this->errors['gender'] = "Gender is not valid";

        } 
	
        //validation for DOB
		if(empty($DATA['tpNumber']))
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
		}

		//validation for registration number
		if(empty($DATA['registrationNumber']))
		{
			$this->errors['registrationNumber'] = "Cannot Keep registration number empty";
		}
		elseif(!preg_match('/^[a-zA-Z-0-9]+$/',$DATA['registrationNumber']))
		{
			$this->errors['registrationNumber'] = "Cannot allowed symbols in the registration number";
		}

		//validation for Specialities
		if(empty($DATA['nic']))
		{
			$this->errors['nic'] = "Cannot Keep nic number empty";
		}
		elseif(!preg_match('/^[0-9-vV]+$/',$DATA['nic']))
		{
			$this->errors['nic'] = "Cannot allowed symbols in the nic number";
		}
		
		//validation for Profile Pic
		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors['image'] = "Cannot keep image empty";
		}
		else
        {
            //upload the file to following dir
            $folder = "doctor_profilepic/";
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
				$doctor = new doctor();
				$doctor->get_destination($destination);//send the address of the file path to doctor controller to save in the database 
			}
		}

		if(count($this->errors) == 0)
		{
			
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}

		return false;

        //validation for Qualifications
		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors['image'] = "Cannot keep image empty";
		}
		else
        {
            //upload the file to following dir
            $folder = "doctor_qualification/";
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
				$doctor = new doctor();
				$doctor->get_destination($destination);//send the address of the file path to doctor controller to save in the database 
			}
		}

		if(count($this->errors) == 0)
		{
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}

		return false;
	}

}