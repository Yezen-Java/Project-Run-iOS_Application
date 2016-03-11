<?php 

include 'Connect.php';

$tourId = $_POST['TourID'];


$escape = pg_escape_string($tourId);


$query = "SELECT * From tour where tourid = $1";

$result = pg_prepare($dbconn,"TourData_query", $query);

$escaped = pg_escape_string($tourId);


$result = pg_execute($dbconn, "TourData_query", array($escaped));










 ?>