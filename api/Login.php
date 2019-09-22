<?php
if( $_POST ){ // Check that the user has clicked on login
  // TODO: Validate the email and password
  $sjUsers = file_get_contents('data.json');
  // Convert to object
  $jUsers = json_decode( $sjUsers );
  // Loop and find a match email and password

  foreach( $jUsers->agent as $key => $jUser ){  	
    if( $jUser->Username == $_POST['username'] &&
        $jUser->Password == $_POST['password']
    ){
    	session_start();
		$_SESSION['user_id'] = $key;

		header('Location: ../index.php');
    }
  }
  foreach( $jUsers->user as  $key => $jUser  ){
    if( $jUser->Username == $_POST['username'] &&
        $jUser->Password == $_POST['password']
    ){
    	session_start();
    	$_SESSION['user_id'] = $key;
    	header('Location: ../index.php');
    }
  }
  header('Location: ../Login.php');
}

?>