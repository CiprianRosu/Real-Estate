
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Jquery-->
    <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
    <!-- Css file link-->
    <link rel="stylesheet" type="text/css" href="../style.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Cip's Real estate</title>
</head>
<body>
<header>
    <a href="../index.php"><div id="banner"></div></a>
    
    <ul>
        <a href="../Properties.php"> <li>Properties </li></a>
        <a href="../Map.php"><li>Map</li></a>
        <?php 
        if(isset($_SESSION['user_id'])){
          echo("<li id='userMenuToggler'class='floatRight'>My Profile
               <ul id='userMenu'>
                    <a href='../Settings.php'><li>Settings</li></a>
                    <a href='../PropertiesSettings.php'><li>Properties</li></a>
                    <a href='Logout.php'><li>Logout</li></a>
                </ul>
            </li>");
        }
        else{
          echo("
            <a href='../SignUp.php'> 
                <li class='floatRight'>
                Sign Up
                </li>
            </a>");
          echo("<a href='../login.php'> <li class='floatRight'>Login</li></a>");

        }

        ?>
    </ul>
</header>
<main>
	<div id="content">


<?php
$sKey = $_GET['key']; // key from the url
$user_id = $_GET['id']; // user id from the url


$sjData = file_get_contents( 'data.json' ); // open file
$jData = json_decode( $sjData ); // convert text to object

if(isset($jData->agent->$user_id)){
	if( $jData->agent->$user_id->ActivationCode == $sKey ){
		echo "<h1 class='WelcomeMessage'>Welcome ".$jData->agent->$user_id->Username."</h1>";
		$jData->agent->$user_id->ActivationCode="Activated";	
		$sjData = json_encode( $jData, JSON_PRETTY_PRINT ); // convert json to text
		file_put_contents( 'data.json' , $sjData );  // save text to file
	}else{
		
	} 	
}


if(isset($jData->user->$user_id)){

	if( $jData->user->$user_id->ActivationCode == $sKey ){
		echo "<h1 class='WelcomeMessage'>Welcome ".$jData->user->$user_id->Username."</h1>";
		$jData->user->$user_id->ActivationCode="Activated";
		$sjData = json_encode( $jData, JSON_PRETTY_PRINT ); // convert json to text
		file_put_contents( 'data.json' , $sjData );  // save text to file
	}else{
		
	}

}
include '../footer.php';

