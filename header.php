<?php
session_start();
if(isset( $_SESSION['user_id'])){
$user_id= $_SESSION['user_id'];
  $sjData = file_get_contents('api/data.json');
  $jUsers = json_decode( $sjData );
  if(isset($jUsers->agent->$user_id)){
    if($jUsers->agent->$user_id->ActivationCode!="Activated"){
    header('Location: ../activateYourAccount.php');   
    }  
  }
    if(isset($jUsers->user->$user_id)){
      if($jUsers->user->$user_id->ActivationCode!="Activated"){
        header('Location: ../activateYourAccount.php');   
      }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Jquery-->
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <!-- Css file link-->
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Cip's Real estate</title>
</head>
<body>
<header>
    <a href="index.php"><div id="banner"></div></a>
    
    <ul>
        <a href="Properties.php"> <li>Properties </li></a>
        <a href="Map.php"><li>Map</li></a>
        <?php 
        if(isset($_SESSION['user_id'])){
          echo("<a href='Profile.php'> <li class='floatRight'>My Profile</li></a>");
        }
        else{
          echo("<a href='SignUp.php'> <li class='floatRight'>Sign Up</li></a>");
          echo("<a href='login.php'> <li class='floatRight'>Login</li></a>");

        }

        ?>
    </ul>
</header>
<main>
	<div id="content">

