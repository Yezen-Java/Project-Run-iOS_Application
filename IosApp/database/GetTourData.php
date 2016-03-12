<?php 

include 'Connect.php';


$tourId = $_POST['TourID'];
$functionName = $_POST['functionName'];
$query = "SELECT * from tour_res, location where tour_res.tourid = $1 and tour_res.locationid = location.locationid;";
$result = pg_prepare($dbconn,"TourData_query", $query);


if ( $functionName === "GetTourLocationDiv") {
	# code...
	GetTourLocationDiv();
}

function GetTourLocationDiv(){
$escaped = pg_escape_string($tourId);
$result = pg_execute($dbconn, "TourData_query", array($escaped));
if (pg_num_rows($result)>0) {
	while($rows=pg_fetch_array($result)){
		$name = $rows['lname'];
		$id = $rows['locationid'];
		echo "<div class='span2'>
          <button onclick=\"show('Page3');\" value='$id' style='text-decoration: none' class='pageButtons btn-default btn-lg btn-block'>
      		<span ><img class='imageButtons' img-block src='images/mriMachine.jpg' width='600px' align='left' ><p class='imgTextTop' align='left'>$name</p><p align='left' class='imgBottomText' >North Wing</p>
			    </span> 
		      </button> 
		    </div>";
	}
}
}



if($GET['functionName1'] === 'getTourLocationJson' ){

getTourLocationJson();
}


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