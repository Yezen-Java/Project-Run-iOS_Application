<?php 


$getTourId = $_GET['TourId'];

$query = "SELECT * from tour_res, location where tour_res.tourid = $1 and tour_res.locationid = location.locationid;";
$result = pg_prepare($dbconn,"TourData_query", $query);



$escaped = pg_escape_string($getTourId);
$result = pg_execute($dbconn, "TourData_query", array($escaped));
$myArray = array();
while ($rows = pg_fetch_array($result)) {
	//set up the nested associative arrays using literal array notation
	$firstArray = array("id" => $rows['locationid'], "latitude" => $rows['latitude'], "logitude"=> $rows['logitude']);
	//push items onto main array with bracket notation (this will result in numbered indexes)
	$myArray[] = $secondArray;
}
 $json = json_encode($myArray);
echo $json;




 ?>