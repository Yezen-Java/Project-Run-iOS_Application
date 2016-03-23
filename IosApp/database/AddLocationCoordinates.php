<?php

include 'Connect.php';
include 'Classes/UserManagement.php';

$locationName = $_POST['LocationName'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$userManagementClass = new UserManagementClass();
$result = $userManagementClass->InsertLocationCoordinates($locationName,$latitude,$longitude,$dbconn);


if ($result) {
	echo true;
}else{
	echo false;
}


?>