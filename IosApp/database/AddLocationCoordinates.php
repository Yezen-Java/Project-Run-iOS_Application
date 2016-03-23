<?php

include 'Connect.php';
include 'UserManagement.php';

$LocationName = $_POST['LocationName'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$userManagementClass = new UserManagementClass();
$result = $userManagementClass->InsertLocationCoordinates($LocationName,$latitude,$longitude,$dbconn);


if ($result) {
	echo $result;
}else{
	echo false;
}


?>