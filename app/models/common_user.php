<?php
/**
 * Common User Model
 */
class common_user extends Model
{
    protected $allowedcolumns = [
		'fname',
		'lname',
        'username',
        'email',
		'tpNumber',
		'password',
    ];

    protected $prefunctions = [
        'make_common_user_id',
        'hash_password'
    ];
 
    

   protected $table = "common_user";

   //protected $prefunctions = ['make_common_user_id'];
 

    public function validate($data)
    {
        $this->errors = array();
        //$this->errors2 = array()

        //check for firstname
        if(empty($data['fname']))
		{
			$this->errors['fname'] = "Cannot Keep first name empty";
        }
        elseif(!preg_match('/^[a-zA-Z]+$/',$data['fname']))
        {
            $this->errors['fname'] = "The first name should contain only letters";
        }

        //check for lastname
        if(empty($data['lname']))
		{
			$this->errors['lname'] = "Cannot Keep last name empty";
        }
        elseif(!preg_match('/^[a-zA-Z]+$/',$data['lname']))
        {
            $this->errors['lname'] = "The Last name should contain only letters";
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
        

        //check telephone number
		if(empty($data['tpNumber']))
		{
			$this->errors['tpNumber'] = "Cannot Keep tp number empty empty";
		}
		elseif(!preg_match('/^[0-9]+$/',$data['tpNumber']))
		{
			$this->errors['tpNumber'] = "Only numbers allowed in the tp number";
		}
		elseif(!strlen($data['tpNumber'])>10)
		{
			$this->errors['tpNumber'] = "Only 10 numbers allowed in the tp number";
		}

        //check for password
        if(empty($data['password']))
		{
			$this->errors['password'] = "Cannot Keep name empty";
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
        
        //check the checkbox
		if(empty($data['conditions']))
		{
			$this->errors['conditions'] = "Cannot Keep the checkbox unticked";
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