<?php

include 'Connect.php'; 
include 'TourClass.php';

$locationid = $_POST['LocationID'];
$tourid = $_POST['TourId'];
$tour = new TourClass();
$html = $tour->getTourMedia($tourid,$locationid,$dbconn);


echo $html;


?>