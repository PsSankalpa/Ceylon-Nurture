<?php

class Database
{
	//---------------------------------------FORGOT PASSWORD---------------------------//
	private $host = 'localhost';
	private $user = 'root';
	private $ass = 'ceylonG12$$prg';
	private $dbname = 'ceylon_nurture_db';
	//Will be the PDO object
	private $dbh;
	private $stmt;
	private $error;

	public function __construct()
	{
		//Set DSN
		$dsn = 'mysql:host=' .$this->host. ';dbname=' .$this->dbname;
		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);
		//Create PDO instance
		try{
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
		}catch(PDOException $e){
			$this->error = $e->getMessage();
			echo $this->error;
		}  	
	}
	//Prepare statement with queryy
	public function queryy($sql){
		$this->stmt = $this->dbh->prepare($sql);
	}

	//Bind values to prepared statement using named parameters
	public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_int($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_int($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}

	//Execute the prepared statement
	public function execute(){
		return $this->stmt->execute();
	}

	//Return multiple records
	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	//Return a single record
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

	//Get row count
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
	//---------------------------------------FORGOT PASSWORD---------------------------//
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