<?php 
include 'Connect.php';
include 'Classes/TourClass.php';

$getTourId = $_POST['TourId'];



$tourClass = new TourClass();

$jsonArray = $tourClass->getLocationObjects($getTourId,$dbconn);


echo $jsonArray ;


 ?>