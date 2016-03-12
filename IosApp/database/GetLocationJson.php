<?php 

echo getTourLocationJson();


function getTourLocationJson(){
$escaped = pg_escape_string($tourId);
$result = pg_execute($dbconn, "TourData_query", array($escaped));
$myArray = array();
while ($rows = pg_fetch_array($result)) {
	//set up the nested associative arrays using literal array notation
	$firstArray = array("id" => $rows['locationid'], "latitude" => $rows['latitude'], "logitude"=> $rows['logitude']);
	//push items onto main array with bracket notation (this will result in numbered indexes)
	$myArray[] = $secondArray;
}

return $json = json_encode($myArray);

}



 ?>