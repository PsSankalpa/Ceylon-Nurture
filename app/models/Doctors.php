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
		'profilePhoto',
		'qualifications',
	];

	protected $table = "doctors";

	public function validate($DATA,$FILES)
	{
		$this->errors = array();
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
        if(empty($DATA['gender']))
		{
			$this->errors['gender'] = "Cannot Keep Gender empty";
		}
	
        //validation for DOB
		if(empty($DATA['dob']))
		{
			$this->errors['dob'] = "Cannot Keep Date of Birth empty";
		}
		/*elseif (intval($parts[3]) < 1871)
		{
			$this->errors['dob'] = "Please check whether your birth year is reasonable";
		}*/
		
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
		if(empty($DATA['specialities']))
		{
			$this->errors['specialities'] = "Cannot Keep specialities number empty";
		}
		
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