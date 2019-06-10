<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 06/05/19
 * Time: 12:27
 */

class Database {
	//db params
	private $host = 'alv4v3hlsipxnujn.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	';
	private $dbName = 'xnbhmfw1cnbr71v3';
	private $user = 'oxyip5zim4ck16ix';
	private $password = 'agh76r9s7js292nt';
	private $port = 3306;

	private $conn;


	//connect to db
	public function connect() {
		$this->conn = null;

		//PDO Instance
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName,$this->user,$this->password, $this->port);
			//set error
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception){
			echo 'Connection error'.$exception->getMessage();
		}
		return $this->conn;
	}

}
