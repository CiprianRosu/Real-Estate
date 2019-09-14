<?php
$sKey = $_GET['key']; // key from the url
$user_id = $_GET['id']; // user id from the url
echo "<h1>Welcome {$_GET['id']} $sKey</h1>";

$sjData = file_get_contents( 'data.json' ); // open file
$jData = json_decode( $sjData ); // convert text to object

if(isset($jData->agent->$user_id)){
	if( $jData->agent->$user_id->ActivationCode == $sKey ){
		echo 'match found';
		$jData->agent->$user_id->ActivationCode="Activated";
		$sjData = json_encode( $jData, JSON_PRETTY_PRINT ); // convert json to text
		file_put_contents( 'data.json' , $sjData );  // save text to file
	}else{
		echo 'no match found';
	} 	
}


if(isset($jData->user->$user_id)){

	if( $jData->user->$user_id->ActivationCode == $sKey ){
		echo 'match found';
		$jData->user->$user_id->ActivationCode="";
		$sjData = json_encode( $jData, JSON_PRETTY_PRINT ); // convert json to text
		file_put_contents( 'data.json' , $sjData );  // save text to file
	}else{
		echo 'no match found';
	}

}


