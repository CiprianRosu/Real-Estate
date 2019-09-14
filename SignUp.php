<?php
include "header.php"
?>
<form method="post" action="api/SignUp.php">

  <div class="SignUp">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>    

    <label for="rePassword"><b>Repeat password</b></label>
    <input type="rePassword" placeholder="Repeat password" name="rePassword" required>

    <label for="accountType"><b>Choose type of the account</b></label>
    <div class="radioButton">
    	<input type="radio" name="accountType" value="customer">
    	<div>Customer</div>
    </div>
    <div class="radioButton">
		<input type="radio" name="accountType" value="agent">
    	<div>Agent</div>
    </div>
	
    <button type="submit">SignUp</button>
  </div>
</form>
<?php
include "footer.php";
?>