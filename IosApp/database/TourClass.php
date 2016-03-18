<?php

/**
* 
*/
class TourClass 
{

	public function ValidateTourCode($tourId,$dbconn){
		$query = "SELECT * From tour where tourid = $1";
		$result = pg_prepare($dbconn,"Tour_query", $query);
	    $result = pg_execute($dbconn, "Tour_query", array($tourId));
		if(pg_num_rows($result)>0){
			$rows = pg_fetch_array($result);
			$tourIdPg = $rows['tourId'];
			return true;			
	    }
	    return false;

	}



	public function getTourLocation($tourId,$dbconn){
		$htmlTage = '';
		$query = "SELECT * from tour_res, location where tour_res.tourid = $1 and tour_res.locationid = location.locationid;";
			$result = pg_prepare($dbconn,"TourData_query", $query);
			$escaped = pg_escape_string($tourId);
			$result = pg_execute($dbconn, "TourData_query", array($escaped));
			if (pg_num_rows($result)>0) {
				while($rows=pg_fetch_array($result)){
					$name = $rows['lname'];
					$id = $rows['locationid'];
					$htmlTage = $htmlTage."<div class='span2'>
			          <button onclick=\"show('Page3');\" value='$id' style='text-decoration: none' class='pageButtons btn-default btn-lg btn-block'>
			      		<span ><img class='imageButtons' img-block src='images/mriMachine.jpg' width='600px' align='left' ><p class='imgTextTop' align='left'>$name</p><p align='left' class='imgBottomText' >North Wing</p>
						    </span> 
					      </button> 
					    </div>";
				}
			}

			return $htmlTage;
	}
	

}



?>