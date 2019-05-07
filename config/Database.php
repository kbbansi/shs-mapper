<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 06/05/19
 * Time: 12:27
 */

class Database {
	//db params
	private $host = 'localhost';
	private $dbName = 'school-mapper';
	private $user = 'YOUR_DB_USER';
	private $password = 'YOUR_DB_PASSWORD';

	private $conn;


	//connect to db
	public function connect() {
		$this->conn = null;

		//PDO Instance
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName,$this->user,$this->password);
			//set error
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception){
			echo 'Connection error'.$exception->getMessage();
		}
		return $this->conn;
	}

}
