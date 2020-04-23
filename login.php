<?php include_once('lib/header.php');  
      require_once('functions/alert.php');


//checks if user is logged in and redirects to the dashboard if so
if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
  header("Location:dashboard.php");
}
?>
<p>
<?php
    print_alert(); 
    
?>
</p>
<div class="container">
        <div class="row col-6">
    <p>Please Login Here</p>
</div>
<div class="row col-6">
    <form method="POST" action="processlogin.php">
        <?php
           // error();
          ?>
    <p>
    <label>Email</label>
    <input 
    <?php
          if(isset($_SESSION['email'])){
              echo "value=".$_SESSION['email'];
              }
          ?>
    type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
    </p>

    <p>
    <label>Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    </p>

<p>
<button class="btn btn-sm btn-primary" type='submit'>Login</button>
</p>
<p>
       <a class="p-2 text-dark" href="forgot.php">Forgot</a>
      <a class="p-2 text-dark" href="register.php">Don't have an account? Login</a>
        
        </p>
    </form>
    </div>
    </div>  
    <?php
  include_once('lib/footer.php');  

?>