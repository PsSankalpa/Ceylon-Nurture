<?php

//main model
class Model extends Database
{

	public function __construct()
	{
		/*if(!property_exists($this,'table'))
        {
            $this->table = strtolower($this::class);
        }*/
        //we can use above condition if we use php8 in wamp server
        !property_exists($this,'table');
	}

	public $errors = array();


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

    public function insert($data)
	{
        $keys = array_keys($data);
        $columns = implode(',',$keys);//take the array of the column names and put it like in an insert query 
        $values = implode(',:',$keys);//for the values

        $query = "insert into $this->table($columns) values (:$values)";
        echo $query;

		return $this->query($query,$data);
	}

    public function update($userid,$data)
	{
		print_r($data);

		$str = "";
		foreach($data as $key => $value)
		{
			$str .= $key. "=:" .$key. ",";//by putting . we add new content to the string not replace it
		}
        $str = trim($str,",");//trim the "," at the beginin and the end of the string
		$data['userid'] = $userid;

        $query = "update $this->table set $str where userid = :userid";
        echo $query;

		return $this->query($query,$data);
	}

    public function delete($userid)
	{

		$query = "delete from $this->table where userid = :userid";
		$data['userid'] = $userid;
		return $this->query($query,$data);
	}

	
}