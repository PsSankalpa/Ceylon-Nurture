<?php

class Database
{
	
	private function connect()
	{
		$string = DB_TYPE . ":host=".DB_HOST.";dbname=".DB_NAME;
		if(!$con = new PDO($string,DB_USER,DB_PASS)){
			die("could not connect to database");
		}

		return $con;
	}

	public function query($query,$data = array(),$data_type = "object")
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		if($stm){
			$check = $stm->execute($data);
			if($check){
				if($data_type == "object"){
					$data = $stm->fetchAll(PDO::FETCH_OBJ);
				}else{
					$data = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				if(is_array($data) && count($data) >0){
					return $data;
				}
			}
		}

		return false;
	}

	
}

?>