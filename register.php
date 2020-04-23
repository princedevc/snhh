<?php include_once('lib/header.php');  
require_once('functions/alert.php');
if(isset($_SESSION['loggedIn'])&& !empty($_SESSION['loggedIn'])){
    header("Location:dashboard.php");
  }

?>
        <div class="container">
        <div class="row col-6">


            <h3 class="">Register here</h3>
</div>
<div class="row col-6">        
        <p><strong> All fields are required</strong></p>
        </div>
        <div class="row col-6">
            <form method="POST" action="processregister.php">
            <p>
                <?php
                    print_alert();
                ?>
            </p>
            <p>
            <label>First Name</label> <br/>
            <input
            <?php
                if(isset($_SESSION['firstname'])){
                        echo "value=". $_SESSION['firstname'];
                    }
                ?>
            type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
            </p>

            <p>
            <label>Last Name</label> <br/>
            <input 
            <?php
                    if(isset($_SESSION['lastname'])){
                        echo "value=".$_SESSION['lastname'];
                    }
                ?>
                type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required >
            </p>

            <p>
            <label>Email</label><br/>
            <input 
            <?php
                    if(isset($_SESSION['email'])){
                        echo "value=".$_SESSION['email'];
                    }
                ?>
            type="email" class="form-control" name="email" id="email" placeholder="Email address" required>
            </p>

            <p>
            <label>Password</label><br/>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </p>

            <p>
            <label>Gender</label><br/>
            <select name="gender" class="form-control" id="gender" required>
            <?php
                    if(isset($_SESSION['gender'])){
                        echo "value=".$_SESSION['gender'];
                    }
                ?>
            <option value="">Select One</option> <br/>
                <option
                <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender']=='Male'){
                        echo "selected";
                    }
                ?>
                > Male</option>

                <option
                <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender']=='Female'){
                        echo "selected";
                    }
                ?>
                >Female</option>
            </select>
            </p>


            <p>
            <label>Designation</label> <br/>
            <select name="designation" class="form-control" id="designation" >
            <?php
                    if(isset($_SESSION['designation'])){
                        echo "value=".$_SESSION['designation'];
                    }
                ?>
            <option value="">Select One</option><br/>
                <option
                <?php
                    if(isset($_SESSION['designation'])&&$_SESSION['designation']=='Patient'){
                        echo "selected";
                    }
                ?>     
                >Patient</option>
                <option
                <?php
                    if(isset($_SESSION['designation'])&&$_SESSION['designation']=='Doctor'){
                        echo "selected";
                    }
                ?>
                >Doctor</option>
            </select>
            </p>

            <p>
            <label class="label" for="department">Department</label><br/>
            <input 
            <?php
                    if(isset($_SESSION['department'])){
                        echo "value=".$_SESSION['department'];
                    }
                ?>
            type="text" class="form-control" name="department" id="department" placeholder="department" >
            </p>
        <hr>

        <p>
        <button class="btn btn-success"type='submit'>Register</button>
        </p>
        <p>
            <a class="p-2 text-dark" href="forgot.php">Forgot</a>
            <a class="p-2 text-dark" href="login.php">Already have an account? Login</a>
        
        </p>

            </form>
 </div>
                    </div>
    <?php
  include_once('lib/footer.php');  

?>