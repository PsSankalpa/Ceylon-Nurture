<?php

//main model
class Model extends Database
{

	public function images($FILES,$destination,$imageFileType,$uploadOk)
	{
		$errors = "";
		$uploadOk = 1;
		// Check if file already exists
		if (file_exists($destination)) {
			$errors = "Sorry, file already exists.";
			$uploadOk = 0;
		}
		elseif($FILES["image"]["size"] > 500000){
			$errors = "Sorry, your file is too large.";//check file size
			$uploadOk = 0;
		}
		elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
			$errors = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";// Allow certain file formats
			$uploadOk = 0;
		}
		
		return $errors;
	}

	public function __construct()

	{
		/*if(!property_exists($this,'table'))
        {
            $this->table = strtolower($this::class);
        }*/
        //we can use above condition if we use php8 in wamp server
        !property_exists($this,'table');//to get the table value
		!property_exists($this,'pk');//to get the primary key value
	}


	public $errors = array();


//----------------------------------------------------------------------------------------------------------------

	public function where($column,$value)
	{

		$column = addslashes($column);//from this it check the column,sanitize iput
		$query = "select * from $this->table where $column = :value";
		return $this->query($query,[
			'value'=>$value
		]);
	}

	public function findAll()
	{

		$query = "select * from $this->table ";
		return $this->query($query);
	}

//---------------------------------------------------------------------------------------------------------------	

	
    public function insert($data)
	{
		//remove unwanted columns
		if(property_exists($this,'allowedcolumns'))
        {
            foreach($data as $key => $column)
			{
				if(!in_array($key,$this->allowedcolumns))
				{
					unset($data[$key]);
				}
			}
        }

		//run functions before insert
		if(!property_exists($this,'prefunctions'))
        {
            foreach($this->prefunctions as $funk)
			{
				$data = $this->$funk($data);
			}
        }


        $keys = array_keys($data);
        $columns = implode(',',$keys);//take the array of the column names and put it like in an insert query 
        $values = implode(',:',$keys);//for the values

        $query = "insert into $this->table($columns) values (:$values)";
        

		return $this->query($query,$data);
	}
//------------------------------------------------------------------------------------------------------------------------
    public function update($id,$data)
	{
		print_r($data);

		$str = "";
		foreach($data as $key => $value)
		{
			$str .= $key. "=:" .$key. ",";//by putting . we add new content to the string not replace it
		}
		print_r($str);
		
        $str = trim($str,",");//trim the "," at the beginin and the end of the string
		$data['id'] = $id;

        $query = "update $this->table set $str where $this->pk = :id";
        print_r($query);


		return $this->query($query,$data);
	}


    public function delete($id)

	{
		$data['id'] = $id;
		$query = "delete from $this->table where $this->pk = :id";
		
		return $this->query($query,$data);
	}


	
}