<?php 
include 'Connect.php';
include 'TourClass.php';

$getTourId = $_GET['TourId'];



$tourClass = new TourClass();

$jsonArray = $tourClass->getLocationObjects($getTourId,$dbconn);


echo $jsonArray ;


 ?>