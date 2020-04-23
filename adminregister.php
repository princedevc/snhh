<?php include_once('lib/header.php');  
/* if(!isset($_SESSION['pin'])){
    header("Location:superadminverify.php");
    session_destroy();
  }*/
?>
    <h3>Register an admin user</h3>

    <p><strong> All fields are required</strong></p>
    <form method="POST" action="adminprocessregister.php">
    <p>
          <?php
              if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
                  echo "<span style='color:red'>".$_SESSION["error"]."</span>";
                  session_destroy();
                }else{
                    if(isset($_SESSION['message'])&& !empty($_SESSION['message'])){
                        echo "<span style='color:green'>".$_SESSION["message"]."</span>";
                        session_destroy();
                      }
                }
              
          ?>
    </p>
    <p>
    <label>Email</label>
    <input 
    <?php
              if(isset($_SESSION['email'])){
                  echo "value=".$_SESSION['email'];
              }
          ?>
    type="email" name="email" id="email" placeholder="Enter email" required>
    </p>
<button type='submit'>Add</button>
</p>

    </form> 
  <?php
  include_once('lib/adminfooter.php');  
?>