
<?php
include 'header.php';
include "restricted.php";

$sjData = file_get_contents('api/data.json');
$jUsers = json_decode( $sjData );

$jUserData=getData($userType,$jUsers,$user_id);

function getData($usertype,$jUsers,$user_id){
	return $jUsers->$usertype->$user_id;
}
?>


<form method="Post" action="api/Profile.php">

  <div class="SignUp">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required value="<?php echo htmlspecialchars($jUserData->Username); ?>">


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required value="<?php echo htmlspecialchars($jUserData->Email); ?>">

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required value="<?php echo htmlspecialchars($jUserData->Password); ?>">    
	
    <button type="submit">Save</button>
    <button id="deleteAccountButton" type="button">Delete account</button>
  </div>
</form>

<?php
include 'footer.php';
?>