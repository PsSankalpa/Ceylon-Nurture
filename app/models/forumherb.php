<?php

class forumherb extends Model
{

	protected $allowedcolumns = [
		'name',
		'description',
        'image',
        'userid',
        'date',

	];

	protected $table = "forumherb";
	protected $pk = "forumHerbid";

    public function validate($data,$FILES)
    {
        $this->errors = array();

         //check for name
         if(empty($data['name']))
		{
			$this->errors['name'] = "Cannot Keep name empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s\.]+$/',$data['name']))
		{
			$this->errors['name'] = "Only letters allowed in the name";
		}

        

        if(empty($data['description']))
		{
			$this->errors['description'] = "Please add a description about the Doctor";
		}

        //for image
		
		if($FILES['image']['size'] == 0 )
		{
			$this->errors['image'] = "Cannot keep image empty";
		}
		else
        {
            //upload the file to following dir
            $folder = "forum_herb/";
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
				$forum = new forum();
				$forum->get_destination($destination);//send the address of the file path to patient controller to save in the database 
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


?>
