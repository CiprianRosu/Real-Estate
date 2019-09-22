<?php
session_start();
if(isset( $_SESSION['user_id'])){
$user_id= $_SESSION['user_id'];
$userType="none";
  $sjData = file_get_contents('api/data.json');
  $jUsers = json_decode( $sjData );
  if(isset($jUsers->agent->$user_id)){
    $userType="agent";
    if($jUsers->agent->$user_id->ActivationCode!="Activated"){
    header('Location: activateYourAccount.php');   
    }  
  }
    if(isset($jUsers->user->$user_id)){
        $userType="user";
      if($jUsers->user->$user_id->ActivationCode!="Activated"){
        header('Location: activateYourAccount.php');   
      }
    }

}
?>