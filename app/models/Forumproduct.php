<?php

class forumproduct extends Model
{

	protected $allowedcolumns = [
		'name',
		'description',
        'image',
        'userid',
		'date',

	];

	protected $table = "forumproduct";
	protected $pk = "forumProductid";

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
            $folder = "forum_product/";
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

	public function validate2($DATA, $FILES, $dest,$forumProductid,$userName)
    {
        $this->errors = array();
        $this->errors2 = array();


        /*validations for profile image*/
        if ($FILES['image']['size'] == 0) {
            $forumproduct = new forumproduct();
            $forumproduct->get_destination($dest);
			

            if (count($this->errors) == 0) {
                return true;
            }
        } else {
            //upload the file to following dir
            $folder = "forum_product/";
            if (!file_exists($folder)) //if dir doesn't exist,create it like below with file permissions
            {
                mkdir($folder, 0777, true);
            }

            //for delete the previous image
            $row = $this->where('forumProductid', $forumProductid); //in here row is an array
            if ($row) {
                $row = $row[0];
                if (file_exists($row->image)) {
                    unlink($row->image);
                }
            }

            //renaming the image with a username which doctor uploads
            $temp = explode("-", $FILES['image']['name']);
            $newfilename = $userName . '-' . end($temp);

            //create the destination 
            $destination = $folder . $newfilename;


            $imageFileType = strtolower(pathinfo($destination, PATHINFO_EXTENSION));
            $uploadOk = 1;
            $results = $this->images($FILES, $destination, $imageFileType, $uploadOk);
            if (!empty($results)) {
                $this->errors['image'] = $results;
            } else {
                $forum = new forum();
				$forum->get_destination($destination);//send the address of the file path to doctor controller to save in the database 
            }
            if (count($this->errors) == 0) {

				move_uploaded_file($FILES['image']['tmp_name'], $destination);
				return true;
			}
        }
        return false;
    }


}


?>
