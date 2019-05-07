<?php
/**
 * Created by PhpStorm.
 * User: kwabenatu
 * Date: 07/05/19
 * Time: 11:43
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


//get query param
if ($school->digitalAddress = isset($_GET['digitalAddress']) ? $_GET['digitalAddress'] : die()){
	//call on readOne method
	$school->readOne();

//response
	$school_arr = array(
		'schoolName' => $school->schoolName,
		'lat' => $school->lat,
		'lng' => $school->lng
	);

//json
	print_r(json_encode($school_arr));
}else {
	echo json_encode(
		array(
			'Status' => 'Not Found',
			'Message' => 'No such school'
		));
}
