
<?php

include 'Connect.php'; 

$tourId = $_POST['TourId'];

$query = "SELECT * From tour where tourid = $1";

$result = pg_prepare($dbconn,"Tour_query", $query);

$escaped = pg_escape_string($tourId);


$result = pg_execute($dbconn, "Tour_query", array($escaped));


if ($result) {
	if(pg_num_rows($result)>0){

		$rows = pg_fetch_array($result);
		$tourIdPg = $rows['tourId'];
		if($tourId === $tourIdPg){
			echo json_encode(array('exists' => $tourId));

		}else{
			echo "Invalid Code";
		}



	}else{

	}
}else{

}



?>