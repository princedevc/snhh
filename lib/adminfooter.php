<p>
<a href="adminindex.php">Home</a>|

<?php if(!isset($_SESSION['loggedIn'])){?>
<a href="adminlogin.php">Login</a>|
<a href="adminregister.php">Register</a>
<a href="adminforgot.php">Forgot</a>|
<?php }else{?>
    <a href="adminlogout.php">Logout</a> |
    <a href="adminreset.php">Reset</a>
    
  </p>  
