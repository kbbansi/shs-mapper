<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 06/05/19
 * Time: 12:27
 */

class Database {
	//db params
	private $url;
	private $conn;

	/**
	 * @return mixed
	 */
	public function getUrl() {

		return getenv("CLEARDB_DATABASE_URL");
	}

	private $host;
	private $user;
	private $password;
	private $db;

	/**
	 * @param mixed $host
	 *
	 * @return string host
	 */
	public function setHost( $host ) {
		return $this->host = $this->url['host'];
	}


	/**
	 * @param mixed $user
	 *
	 * @return string user
	 */
	public function setUser( $user ) {
		return $this->user = $this->url['user'];
	}


	/**
	 * @param mixed $password
	 *
	 * @return string password
	 */
	public function setPassword( $password ) {
		return $this->password = $this->url['pass'];
	}


	/**
	 * @param mixed $db
	 *
	 * @return bool|string
	 */
	public function setDb( $db ) {
		return $this->db = substr($this->url['path'], 1);
	}
	//connect to db
	public function connect() {
		$this->conn = null;

		//PDO Instance
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->user,$this->password);
			//set error
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $exception){
			echo 'Connection error'.$exception->getMessage();
		}
		return $this->conn;
	}

}
