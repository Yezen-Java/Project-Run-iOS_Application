
<?php

include 'Connect.php';
include 'Classes/TourClass.php';
$tourId = $_POST['TourId'];
$tour = new TourClass();
echo $tour->ValidateTourCode($tourId,$dbconn);



?>