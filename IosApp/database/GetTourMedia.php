<?php

include 'Connect.php'; 
include 'TourClass.php';

$locationid = $_POST['LocationID'];


$tour = new TourClass();
echo $tour->getTourMedia($locationid,$dbconn);


?>