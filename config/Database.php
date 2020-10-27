<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 06/05/19
 * Time: 12:27
 */

class Database {
	//db params
	private $host = 'klbcedmmqp7w17ik.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
	private $dbName = 'a23uoirtxjsl5dea';
	private $user = 'rdhl6ymnx8qsjlst';
	private $password = 'dikw7xehjno6gebv';
	private $port = 3306;

	private $conn;


	//connect to db
	public function connect() {
		$this->conn = null;

		//PDO Instance
		try{
			$this->conn = new PDO('mysql://'.$this->user.':'.$this->password.'@'.$this->host.':'.$this->port);
			//set error
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception){
			echo 'Connection error'.$exception->getMessage();
		}
		return $this->conn;
	}

}
