<?php include_once('lib/header.php');  
?>
<p>
<?php
    if(isset($_SESSION['message'])&& !empty($_SESSION['message'])){
      echo "<span style='color:green'>".$_SESSION["message"]."</span>";
      session_destroy();
    }
    
?>
</p>
<p> Admin User Page</P>

<?php
  include_once('lib/adminfooter.php');  

?>