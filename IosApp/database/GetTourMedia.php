<?php

include 'Connect.php'; 
include 'TourClass.php';

$locationid = $_POST['LocationID'];
$tour = new TourClass();
$html = $tour->getTourMedia($locationid,$dbconn);


echo $html;


?>