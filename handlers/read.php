<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 06/05/19
 * Time: 13:33
 */

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../models/Schools.php';

//set up database
$database = new Database();
$db = $database->connect();


//set up school object
$school = new Schools($db);

//hit the read function
$result = $school->read();

//get number of lines
$num = $result->rowCount();

//check for schools
if ($num > 0){
	//init array
	$schools_arr = array();
	$schools_arr['data'] = array();

	//loop through results
	while ($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);

		$school_item = array(
			'digitalAddress' => $digitalAddress,
			'schoolName' => $schoolName,
			'lat' => $lat,
			'lng' => $lng
		);

		//push to "data"
		array_push($schools_arr['data'], $school_item);
	}

	//convert to JSON
	echo json_encode($schools_arr);

}else{
	//no schools
	echo json_encode(
		array(
			'Status' => 'Not Found',
			'Message' => 'No schools'
		));
}