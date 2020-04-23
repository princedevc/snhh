
<?php include_once('lib/header.php');
require_once('functions/alert.php');
require_once('functions/user.php');

if(is_user_logged_in() && !is_token_set()){
    $_SESSION['error'] = "You are not authorized to view page";
    header("Location:login.php");
}

?>

<h3> Reset Password</h3>
<p> Reset password associated with your account : [email]</p>
<form action="processreset.php" method="POST">
<p>
    <?php
     print_alert(); 
    ?>
</p>
<?php if ( is_user_logged_in() ) {?>
<input 
<?php 
    if(is_token_set_in_session()){
    echo "value='" . $_SESSION['token'] . "'";
    }else{
        echo "value='" . $_GET['token'] . "'";
    }
?>
<?php } ?>
type="hidden" name="token"/>
<p>
    <label>Email</label><br/>
    <input 
    <?php if(isset($_SESSION['email'])){
    echo "value='" . $_SESSION['email'];
    }
    ?>

    type="text" name="email" placeholder="Email" />
    </p>
    <input type="hidden" value="<?php echo $_GET['token'] ?>" />
<p>
    <label>Password</label><br/>
    <input type="password" name="password" id="password" placeholder="Password" required>
    </p>

    <button type='submit'>Reset Password</button>

</form>
<?php include_once('lib/footer.php')?>