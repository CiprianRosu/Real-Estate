<?php
function saveProperty($id,$type,$property,$jData){
	  $sPropertyUniqueId = uniqid();
	$jData->$type->$id->properties->$sPropertyUniqueId=$property;
	$sjData = json_encode( $jData, JSON_PRETTY_PRINT );
	file_put_contents( 'data.json', $sjData );
}
function deleteProperty($id,$type,$propertyid,$jData){
  unset($jData->$type->$id->properties->$propertyid);
  $sjData = json_encode( $jData, JSON_PRETTY_PRINT );
  file_put_contents( 'data.json', $sjData );
}

include "Connections.php";
include "../restricted.php";
if($userType=="user"){
	exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $sUniqueImageName = uniqid();
  move_uploaded_file( $_FILES['myFile']['tmp_name'] , 
                      __DIR__."/images/$sUniqueImageName" );
  

  $sName = $_POST['name'];
  $sLocation = $_POST['location'];
  $sPrice = $_POST['price'];
  $sSize = $_POST['size'];
  // echo $sPrice;

  $jProperty = new stdClass();
  $jProperty->name = $sName;
  $jProperty->location = $sLocation;
  $jProperty->price = $sPrice;
  $jProperty->size = $sSize;
  $jProperty->image = $sUniqueImageName;
  // echo json_encode( $jProperty );
  $sjData = file_get_contents( 'data.json' ); // text from file
	$jData = json_decode( $sjData ); // convert text to JSON

  // echo json_encode( $jProperties );
  saveProperty($user_id,$userType,$jProperty,$jData);
header('Location: ../Settings.php');


}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  //echo("delete");
  $data = file_get_contents("php://input");
  $pieces = explode("=", $data);
  $id=$pieces[1];

  $sjData = file_get_contents(__DIR__.'/data.json');
    $jData = json_decode( $sjData );
  deleteProperty($user_id,$userType,$id,$jData);

	// $sjData = file_get_contents( 'data.json' ); // text from file
	// $jData = json_decode( $sjData ); // convert text to JSON
	// $sjData = json_encode( $jData , JSON_PRETTY_PRINT ); // convert JSON to text
	// print_r($jData);
	// unset($jData->$userType->$user_id);
	// print_r($jData);
	// unset($_SESSION["user_id"]);
	// $sjData = json_encode( $jData , JSON_PRETTY_PRINT ); // convert JSON to text
	// file_put_contents( 'data.json' , $sjData );
	// include "Logout.php";

	// header('Location: ../Login.php');
}

