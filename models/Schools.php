<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 06/05/19
 * Time: 13:17
 */

class Schools {
	//db connection
	private $conn;
	private $table = 'schools';

	//public properties declarations
	public $id;
	public $digitalAddress;
	public $schoolName;
	public $lat;
	public $lng;
	public $region;


	//Constructor: this runs once the class is instantiated
	public function __construct($db) {
		$this->conn = $db;
	}

	//Get all schools
	public function read() {
		//query
		$query = 'SELECT digitalAddress, schoolName, lat, lng FROM '.$this->table.';';

		//prepare statement then execute
		$stmt = $this->conn->prepare($query);
		$stmt ->execute();
		return $stmt;
	}

	//Get one School
	public function readOne() {
		//query
		$query = 'SELECT schoolName, lat, lng FROM '.$this->table.' Where digitalAddress = ?;';

		//prepare statement
		$stmt = $this->conn->prepare($query);

		//bind placeholder
		$stmt->bindParam(1, $this->digitalAddress);

		//execute query
		$stmt->execute();

		//formatting response
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		//set properties
		$this->schoolName =$row['schoolName'];
		$this->lat        =$row['lat'];
		$this->lng        =$row['lng'];
	}
}