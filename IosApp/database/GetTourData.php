<?php 

include 'Connect.php'; 
include 'TourClass.php';

$tourId = $_POST['TourId'];
$tour = new TourClass();
echo $tour->getTourLocation($tourId,$dbconn);



 ?>