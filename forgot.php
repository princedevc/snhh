<?php include_once('lib/header.php');
        require_once('functions/alert.php');
?>
<h3> Forgot Password</h3>
<p> Provide the email address associated with your account</p>
<form action="processforgot.php" method="POST">
<p>
    <?php
    print_alert();
    ?>
</p>

<p>
    <label>Email</label><br/>
    <input 
    <?php
              if(isset($_SESSION['email'])){
                  echo "value=".$_SESSION['email'];
              }
          ?>
    type="email" name="email" id="email" placeholder="Email address" required>
    </p>

    <button type='submit'>Send reset code</button>

</form>
<?php include_once('lib/footer.php')?>