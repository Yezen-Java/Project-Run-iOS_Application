<?php
include 'Connect.php';
include 'UserManagement.php';

$username = $_POST['username'];
$password = $_POST['password'];


$userManagementClass = new UserManagementClass();
$result = $userManagementClass->loginUserSession($username,$password);

if ($result) {
	echo $result;
}else{
	echo false;
}





?>