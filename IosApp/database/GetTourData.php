<?php 

include 'Connect.php';

$tourId = $_POST['TourID'];


$escape = pg_escape_string($tourId);


$query = "SELECT * From tour where tourid = $1";

$result = pg_prepare($dbconn,"TourData_query", $query);

$escaped = pg_escape_string($tourId);


$result = pg_execute($dbconn, "TourData_query", array($escaped));


if (pg_num_rows($result)>0) {

	while($rows=pg_fetch_array($result)){

		echo "<div class='span2'>
			 
          <button onclick='show('Page3');' style='text-decoration: none'  class='pageButtons btn-default btn-lg btn-block' >
      		<span ><img class='imageButtons' img-block src='images/mriMachine.jpg' width='600px' align='left' ><p class='imgTextTop' align='left'>Cardiac</p><p align='left' class='imgBottomText' >North Wing</p>
			    </span> 
		      </button> 
		    </div>";

	}
	
}





 ?>