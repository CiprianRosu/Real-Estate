<?php

include "Connections.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$sUserId = $user_id;
	$sUsername = $_POST['username'];
	$sEmail = $_POST['email'];
	$sPassword = $_POST['password'];
	$sjData = file_get_contents( 'data.json' ); // text from file
	$jData = json_decode( $sjData ); // convert text to JSON
// Update the data
$jData->$userType->$sUserId->Username = $sUsername;
$jData->$userType->$sUserId->Password = $sPassword;
$jData->$userType->$sUserId->Email = $sEmail;
$sjData = json_encode( $jData , JSON_PRETTY_PRINT ); // convert JSON to text
file_put_contents( 'data.json' , $sjData );
header('Location: ../Settings.php');



}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
	$sjData = file_get_contents( 'data.json' ); // text from file
	$jData = json_decode( $sjData ); // convert text to JSON
	$sjData = json_encode( $jData , JSON_PRETTY_PRINT ); // convert JSON to text
	print_r($jData);
	unset($jData->$userType->$user_id);
	print_r($jData);
	unset($_SESSION["user_id"]);
	$sjData = json_encode( $jData , JSON_PRETTY_PRINT ); // convert JSON to text
	file_put_contents( 'data.json' , $sjData );
	include "Logout.php";

	header('Location: ../Login.php');
}

