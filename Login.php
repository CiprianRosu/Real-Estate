<?php
include 'header.php';
?>
<form method="post" action="api/Login.php">
  

  <div class="Login">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit">Login</button>
    <?php
?>
  
    <div class="container">
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </div>
</form>
<?php
include 'footer.php';
?>