<?php
/**
 * Common User Model
 */
class common_user extends Model
{
    protected $table = "common_user";

    protected $allowedcolumns = [
        'nameWithInitials',
        'username',
        'gender',
        'email',
		'tpNumber',
        'image',
		'password',
        'date',
    ];

	protected $pk = "userid";
    protected $pk2 = "email";

    protected $prefunctions = [
        'make_common_user_id',
        'hash_password'
    ];

    public function validate($data,$id=" ")
    {
        $this->errors = array();

        //validations for namewithInitials
        if(empty($data['nameWithInitials']))
        {
            $this->errors['nameWithInitials'] = "Cannot Keep Name With Initials empty";
        }
        elseif(!preg_match('/^[a-zA-Z\s\.]+$/',$data['nameWithInitials']))
        {
            $this->errors['nameWithInitials'] = "Only letters allowed in the Name With Initials";
        }

        //check for username
        if(empty($data['username']))
		{
			$this->errors['username'] = "Cannot Keep username empty";
		}
		elseif(!preg_match('/^[a-zA-Z0-9\s]+$/',$data['username']))
		  {
			$this->errors['username'] = "The Username should contain only letters";
		  }


        //check if username exists
        if(trim($id) == ''){
            if ($this->where('username',$data['username'])) 
            {
                $this->errors['username'] = "The username already existing";
            }
        
        }else{
            if ($this->query ("select username from $this->table where username=:username && userid !=:id",['username'=>$data['username'],'id'=>$id])) 
                {
                    $this->errors['username'] = "The username already existing";
                }

        }
        

        //validation for gender
        if(empty($data['gender']))
		{
			$this->errors['gender'] = "Cannot Keep Gender empty";
		}
	
        //validation for DOB
        /*$y=date("Y");
    
      
		if(empty($data['dob']))
		{
			$this->errors['dob'] = "Cannot Keep Date of Birth empty";
		}
        
		elseif ($y-(intval($data['dob'])) < 18)
		{
			$this->errors['dob'] = "Please check whether your age is above 18";
		}
		elseif($y - (intval($data['dob'])) > 100)
		{
			$this->errors['dob'] = "Please check whether your birth year is reasonable ";
		}*/
		
        //check for email address
        if (empty($_POST["email"])) 
        {
            $emailErr = "Email is required";
        }
        // check if e-mail address is well-formed
        elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
         {
            $this->errors['email'] = "Email format is not valid";
        }

        //check if email exists
        if(trim($id) == " "){
            if ($this->where('email',$data['email']))
                {
                    $this->errors['email'] = "The email already existing";
                }
        }
        else{
            if ($this->query ("select email from $this->table where email=:email && userid !=:id",['email'=>$data['email'],'id'=>$id])) 
                {
                   $this->errors['email'] = "The email already existing";
                }
        }
        
        //check telephone number
		if(empty($data['tpNumber']))
		{
			$this->errors['tpNumber'] = "Cannot Keep tp number empty empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$data['tpNumber']))
		{
			$this->errors['tpNumber'] = "Only numbers allowed in the tp number";
		}
		elseif(strlen($data['tpNumber'])>10 || strlen($data['tpNumber'])<10 )
		{
			$this->errors['tpNumber'] = "Only 10 numbers allowed in the tp number";
		}

        //check for password
        if(isset($data['password'])){
            if(empty($data['password']))
            {
                $this->errors['password'] = "Cannot Keep password empty";
            }
            elseif($data['password'] != $data['password2'])
            {
                $this->errors[] = "The passwords do not match";
            }
            //check for password length
            if(strlen($data['password']) <= 8)
            {
                $this->errors['password'] = "Password must be at least 8 characters long ";
            }
        }
        
        /*check the checkbox
		if(empty($data['conditions']))
		{
			$this->errors['conditions'] = "Cannot Keep the checkbox unticked";
		}*/


        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;

    }
    public function validate2($DATA, $FILES, $UName, $userid,$dest)
	{
        $this->errors = array();
		$this->errors2 = array();


    /*validations for profile image*/
    if ($FILES['image']['size'] == 0) {
        $myAccount = new myAccount();
        $myAccount->get_destination($dest);

        if (count($this->errors) == 0) {
            return true;
        }
    } else {
        //upload the file to following dir
        $folder = "profile_pictures/";
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
            $myAccount = new myAccount();
            $myAccount->get_destination($destination); //send the address of the file path to doctor controller to save in the database 
        }
    }
		return false;
	}

    public function validate3($data,$id=" ")
    {
        $this->errors = array();

        //check for password
        if(isset($data['new_password'])){
            if(empty($data['new_password']))
            {
                $this->errors['new_password'] = "Cannot Keep password empty";
            }
            elseif($data['new_password'] != $data['confirm_password'])
            {
                $this->errors[] = "The passwords do not match";
            }
            //check for password length
            if(strlen($data['new_password']) <= 8)
            {
                $this->errors['new_password'] = "Password must be at least 8 characters long ";
            }
        }

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;

    }



    public function make_common_user_id($data)
    {
        $data['common_user_id'] = $this->random_string(50);
        return $data;

    }

    private function random_string($length)
    {
        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $text = "";
        
        for($x = 0; $x < $length; $x++)
        {
            $random = rand(0,61);
            $text .= $array[$random];
        }
        return $text;
    }

    public function hash_password($data)
    {
        $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);
        return $data;
    }

}


