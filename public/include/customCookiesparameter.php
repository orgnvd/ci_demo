<?php
//$loadFile = include('development.php');
/* $loadFile = require_once 'development.php';
echo '<pre>'; print_R($loadFile);die; */

$loadFile = (object)array(
			'database'=>(object)array(
				'hostname'=>'localhost',
				'database'=>'db_mahindra_926',
				'username'=>'phpdbusr',
				'password'=>'$76hYts8'
				));
$dbdetail = $loadFile->database;

$mysqli = new mysqli($dbdetail->hostname, $dbdetail->username, $dbdetail->password, $dbdetail->database);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$sql = "select tc.country_name,tc.country_key,tcl.country_id as cc,tcl.language_id, tl.language_id, tl.language_name, tl.language_code from tbl_country as tc INNER JOIN tbl_country_language as tcl ON tc.country_id=tcl.country_id INNER JOIN tbl_language as tl ON tl.language_id=tcl.language_id";
//echo $sql; die;
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
	$custom_array = array();
	$i=0;
    while($row = $result->fetch_assoc()) {
       $key = strtolower($row['country_name'].'/'.$row['language_code']);
	   $custom_array[$key]=$row;
    }
	return $custom_array;
} else {
    echo "0 results";
}






//mysql_close($link);

