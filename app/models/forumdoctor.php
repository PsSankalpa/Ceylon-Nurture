<?php

class forumdoctor extends Model
{

	protected $allowedcolumns = [
		'name',
		'description',
        'tpNumber',
		'location'
	];

	protected $table = "forumdoctor";
	protected $pk = "forumDoctorid";

    public function validate($data)
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

        if(isset($data['tpNumber'])){
            
            if(!preg_match('/^[0-9]+$/',$data['tpNumber']))
            {
                $this->errors['tpNumber'] = "Only numbers allowed in the tp number";
            }
            elseif(strlen($data['tpNumber'])>10)
            {
                $this->errors['tpNumber'] = "Only 10 numbers allowed in the tp number";
            }
        }

         if(count($this->errors) == 0)
         {
             return true;
         }
         return false;

    }

}


?>