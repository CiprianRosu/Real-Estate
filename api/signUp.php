<?php
if( $_POST ){
  print_r($_POST);
  // TODO: validate name
  $sUsername = $_POST['username'];
  $sEmail = $_POST['email'];
  $sPassword = $_POST['password'];
  $sRePassword = $_POST['rePassword'];
  $sAccountType = $_POST['accountType'];
  $jUser = new stdClass();
  $jUser->Username = $sUsername;
  $jUser->Email = $sEmail;
  $jUser->Password = $sPassword;
  $jUser->AccountType = $sAccountType;
  print_r($jUser);
  if($sAccountType == "agent"){
    $jUser->properties = new stdClass();
  }
  $sUniqueId = uniqid();
  $sjData = file_get_contents('data.json');
  $jData = json_decode( $sjData );
  $jData->user->$sUniqueId = $jUser;
  $sjData = json_encode( $jData, JSON_PRETTY_PRINT );
  file_put_contents( 'data.json', $sjData );
}
?>