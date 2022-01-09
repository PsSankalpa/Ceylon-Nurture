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
		'doctorid'
	];

	protected $table = "doctors";
	protected $pk = "userid";
	//protected $pk2 = "doctorid";

	public function validate($DATA,$FILES)
	{
		$this->errors = array();		
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
			$this->errors['specialities'] = "Cannot Keep specialities  empty";
		}

		//validation for Hospital
		if(empty($DATA['hospital']))
		{
			$this->errors['hospital'] = "Cannot Keep hospital  empty";
		}

		//validation for City
		if(empty($DATA['city']))
		{
			$this->errors['city'] = "Cannot Keep city  empty";
		}

		//validation for Address
		if(empty($DATA['address']))
		{
			$this->errors['address'] = "Cannot Keep address  empty";
		}

		//validation for Qualifications
		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors['image'] = "Cannot keep image empty";
		}
		else
        {
        //upload the file to following dir
        $folder = "public/doctor_qualification/";
         if(!file_exists($folder))//if dir doesn't exist,create it like below with file permissions
        {
            mkdir($folder,0777,true);
        }

        //create the destination 
		$folder2 = "doctor_qualification/";

        $destination2 = $folder2 . $FILES['image']['name'];
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
			$doctor->get_destination($destination2);//send the address of the file path to doctor controller to save in the database 
		}
		}

		if(count($this->errors) == 0)
		{
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}

		return false;

		//validation for Profile Pic
		
		if($FILES['image2']['size'] == 0 )
		{
			 $this->errors['image2'] = "Cannot keep image empty";
		}
			else
			{
	            //upload the file to following dir
		        $folder = "public/doctor_profilepic/";
				 if(!file_exists($folder))//if dir doesn't exist,create it like below with file permissions
				 {
					 mkdir($folder,0777,true);
				 }
	 
				 //create the destination 
				 $folder2 = "doctor_profilepic/";
				 $destination = $folder . $FILES['image2']['name'];
				 $destination2 = $folder2 . $FILES['image2']['name'];
				 
				 $imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
				 $uploadOk = 1;
				 $results = $this->images($FILES,$destination,$imageFileType,$uploadOk);
				 if(!empty($results))
				 {
					 $this->errors['image2'] =$results;
				 }
				 else
				 {
					 $doctor = new doctor();
					 $doctor->get_destination($destination2);//send the address of the file path to doctor controller to save in the database 
				 }
			 }
	 
			 if(count($this->errors) == 0)
			 {
				 move_uploaded_file($FILES['image2']['tmp_name'], $destination);
				 return true;
			 }
	 
			 return false;
	}

}