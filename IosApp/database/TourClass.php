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
	

}



?>