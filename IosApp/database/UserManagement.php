<?php

/**
* 
*/
class UserManagementClass extends AnotherClass
{
	
public function loginUserSession($username,$password){

$escape = pg_escape_string($username);
$result = pg_query("SELECT * FROM users WHERE Username='{$escape}'");

	if ($result) {
	  $row = pg_fetch_row($result);
	  $userId = $row[0];
	  $usernameR = $row[3];
	  $passwordR = $row[5];
	  $active = $row[7];
	}
	if($username === $usernameR  && $password === $passwordR){
		  if($active == 1){
		   return true;
		 }else{
		  return false;
		 }
	}else{
	  
	  return false;
	}
return false;

}




public function InsertLocationCoordinates($locationName,$latitude,$longitude,$dbconn){
	$Query = "INSERT INTO location (lname,latitude,longitude) values ($1,$2,$3);";
	$results = pg_prepare($dbconn,"query",$Query);
	$results = pg_execute($dbconn,"query",array($locationName,$latitude,$longitude));

	if (pg_affected_rows($results)>0) {
		return true;
	}

	return false;
}
}









?>