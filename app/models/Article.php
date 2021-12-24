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

    public function validate($DATA,$FILES)
	{
        //-------------------------------------------------------------------------------------------------------------------------------------
		//for article
        $this->errors2 = array();
		print_r($DATA);
		//for article name
		if(empty($DATA['articleName']))
		{
			$this->errors2['articleName'] = "Cannot Keep Product name empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s]+$/',$DATA['articleName']))
		{
			$this->errors2['articleName'] = "Only letters allowed in the product name";
		}

		//for description
		if(empty($DATA['description']))
		{
			$this->errors2['description'] = "Cannot Keep description empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.,]+$/',$DATA['description']))
		{
			$this->errors2['description'] = "Only letters allowed in the description";
		}

        //for uses
        if(empty($DATA['uses']))
		{
			$this->errors2['uses'] = "Cannot Keep description empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.,]+$/',$DATA['uses']))
		{
			$this->errors2['uses'] = "Only letters allowed in the description";
		}

        //for side effects
        if(empty($DATA['sideEffects']))
		{
			$this->errors2['sideEffects'] = "Cannot Keep description empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.,]+$/',$DATA['sideEffects']))
		{
			$this->errors2['sideEffects'] = "Only letters allowed in the description";
		}

        //for precautions
        if(empty($DATA['precautions']))
		{
			$this->errors2['precautions'] = "Cannot Keep description empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.,]+$/',$DATA['precautions']))
		{
			$this->errors2['precautions'] = "Only letters allowed in the description";
		}

        //for interactions
        if(empty($DATA['interactions']))
		{
			$this->errors2['interactions'] = "Cannot Keep description empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.,]+$/',$DATA['interactions']))
		{
			$this->errors2['interactions'] = "Only letters allowed in the description";
		}

        //for dosing
        if(empty($DATA['dosing']))
		{
			$this->errors2['dosing'] = "Cannot Keep description empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.,]+$/',$DATA['dosing']))
		{
			$this->errors2['dosing'] = "Only letters allowed in the description";
		}

        //for image		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors2['image'] = "Cannot keep image empty";
		}
		else
        {
            //upload the file to following dir
            $folder = "articles_images/";
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
				$this->errors2['image'] =$results;
			}
			else
			{
				$seller = new doctor();
				$seller->get_destination($destination);//send the address of the file path to seller controller to save in the database 
			}
            
        }

        if(count($this->errors2) == 0)
		{
            move_uploaded_file($FILES['image']['tmp_name'], $destination);
			return true;
		}
		return false;
    }
}
