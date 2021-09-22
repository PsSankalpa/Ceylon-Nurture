<?php

class sellers extends Model
{
	protected $prefunctions = [
		'check_image',
	];

	protected $allowedcolumns = [
		'nameWithInitials',
		'registrationNumber',
		'tpNumber',
		'nic',
		'address',
		'image',
	];


	protected $table = "sellers";

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
		elseif(!preg_match('/^[a-zA-Z\s]+$/',$DATA['nameWithInitials']))
		{
			$this->errors['nameWithInitials'] = "Only letters allowed in the name";
		}

		//for registration number
		if(empty($DATA['registrationNumber']))
		{
			$this->errors['registrationNumber'] = "Cannot Keep registration number empty";
		}
		elseif(!preg_match('/^[a-zA-Z-0-9]+$/',$DATA['registrationNumber']))
		{
			$this->errors['registrationNumber'] = "Cannot allowed symbols in the registration number";
		}

		//for tp number
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

		//for NIC
		if(empty($DATA['nic']))
		{
			$this->errors['nic'] = "Cannot Keep nic number empty";
		}
		elseif(!preg_match('/^[0-9-vV]+$/',$DATA['nic']))
		{
			$this->errors['nic'] = "Cannot allowed symbols in the nic number";
		}

		//for address
		if(empty($DATA['address']))
		{
			$this->errors['address'] = "Cannot Keep address empty";
		}
		elseif(!preg_match('/^[A-Za-z0-9\-\/,.]+$/',$DATA['address']))
		{
			$this->errors['address'] = "Cannot allowed symbols in the address";
		}
		
		//for image
		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors['image'] = "Cannot keep image empty";
		}
		else
        {
            //upload the file to following dir
            $folder = "seller_certificates/";
            if(!file_exists($folder))//if dir doesn't exist,create it like below with file permissions
            {
                mkdir($folder,0777,true);
            }

            //create the destination 
            $destination = $folder . $FILES['image']['name'];
			
			$imageFileType = strtolower(pathinfo($destination,PATHINFO_EXTENSION));
			$uploadOk = 1;
			$Sellers = new Sellers();
			$results = $Sellers->images($FILES,$destination,$imageFileType,$uploadOk);
			if(!empty($results))
			{
				$this->errors['image'] =$results;
			}
			else
			{
				$seller = new seller();
				$seller->get_destination($destination);//send the address of the file path to seller controller to save in the database 
			}

		if(count($this->errors) == 0)
		{
			
			move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}

		return false;
	}

//---------------------------------------------------------------------------------------------------------------------------------------
	

	/*public function uploadProduct($POST,$FILES)
	{
		$this->errors = array();

		$allowed[] = "image/jpeg";

		if(isset($POST['title']) && isset($FILES['file']))
        {
            
            //check for file name is not empty,check is there any error,look for file type in the array and the array name
            if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0 && in_array($FILES['file']['type'], $allowed))
            {
                //upload the file to following dir
                $folder = "uploads/";
                if(!file_exists($folder))//if dir doesn't exist,create it like below with file permissions
                {
                    mkdir($folder,0777,true);
                }

                //create the destination 
                $destination = $folder . $FILES['file']['name'];
                //create a folder where images need to send
                move_uploaded_file($FILES['file']['tmp_name'], $destination);
            }else
            {
                $_SESSION['error'] = "cannot upload";
            }

            if($_SESSION['error']=="")
            {
               
            }
        }
	}*/

	
	}

}