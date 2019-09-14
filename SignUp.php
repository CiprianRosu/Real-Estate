<?php
include "header.php"
?>
<form action="action_page.php">

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>


    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>    

    <label for="rePassword"><b>Repeat password</b></label>
    <input type="rePassword" placeholder="Repeat password" name="rePassword" required>

    <label for="accountType"><b>Choose type of the account</b></label>
	<input type="radio" name="accountType" value="customer">Customer<br>
	<input type="radio" name="accountType" value="agent">Agent<br>

    <button type="submit">SignUp</button>
  </div>
</form>
<?php
include "footer.php";
?>