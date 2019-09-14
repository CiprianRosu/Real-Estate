<?php
if( $_POST ){
  print_r($_POST);
  include_once("sendEmail.php");
  // TODO: validate name
  $sUsername = $_POST['username'];
  $sEmail = $_POST['email'];
  $sPassword = $_POST['password'];
  $sRePassword = $_POST['rePassword'];
  $sAccountType = $_POST['accountType'];
  $ActivationCode = uniqid();
  // Check if entered passwords are same
  if($sRePassword!=$sPassword){
    echo("Password does't match!");
    // exit if passwords doesnt match
    exit();
  }
  $jUser = new stdClass();
  $jUser->Username = $sUsername;
  $jUser->Email = $sEmail;
  $jUser->Password = $sPassword;
  $jUser->ActivationCode = $ActivationCode;

  print_r($jUser);
  
  $sUniqueId = uniqid();
  $sjData = file_get_contents('data.json');
  $jData = json_decode( $sjData );
  // if account type is agent create additional fields and save it to agents
  if($sAccountType == "agent"){
    $jUser->properties = new stdClass();
    $jData->agent->$sUniqueId = $jUser;
  }else{
    // save to users
    $jData->user->$sUniqueId = $jUser; 
  }
  
  $sjData = json_encode( $jData, JSON_PRETTY_PRINT );
  file_put_contents( 'data.json', $sjData );
  sendEmail($ActivationCode,$sEmail,$sUniqueId);
  header('Location: ../Login.php');
}
?>