<?php
/**
 * User Model
 */
class user extends Model
{
    protected $allowedcolumns = [
		'fname',
		'lname',
        'username',
        'email',
		'tpNumber',
		'password',
	//];

	//protected $table = "user";
    protected $prefunctions = [
        'make_user_id',
        'hash_password'
    ];

    public function validate($DATA)
    {
        $this->errors = array();
        $this->errors2 = array();

        //check for firstname
        if(empty($DATA['fname']))
		{
			$this->errors['fname'] = "Cannot Keep name empty";
        }
        elseif(!preg_match('/^[a-zA-Z]+$/',$DATA['fname'])
        {
            $this->errors['fname'] = "The first name should contain only letters"
        }

        //check for lastname
        if(empty($DATA['lname']))
		{
			$this->errors['lname'] = "Cannot Keep name empty";
        }
        elseif(!preg_match('/^[a-zA-Z]+$/',$DATA['lname'])
        {
            $this->errors['lname'] = "The Last name should contain only letters"
        }

        //check for username
        if(empty($DATA['username']))
		{
			$this->errors['username'] = "Cannot Keep name empty";
		}
		elseif(!preg_match('/^[a-zA-Z\s]+$/',$DATA['username']))
		  {
			$this->errors['username'] = "The Username should contain only letters";
		  }

        //check for email address
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        // check if e-mail address is well-formed
        elseif (!filter_var($DATA['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email format is not valid";
            }
        }

        //check telephone number
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

        //check for password
        if(empty($DATA['password']))
		{
			$this->errors['password'] = "Cannot Keep name empty";
		}
        elseif($DATA['password'] != $DATA['password2'])
        {
            $this->errors[] = "The passwords do not match"
        }
        //check for password length
        if(strlen($DATA['password']) <= 8)
		{
			$this->errors['password'] = "Password must be at least 8 characters long ";
		}
        
        //check the checkbox
		if(empty($DATA['conditions']))
		{
			$this->errors['conditions'] = "Cannot Keep the checkbox unticked";
		}

        if(count($this->errors) == 0)
        {
            return true;
        }
        return false;

    }
}