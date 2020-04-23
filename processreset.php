<?php
 session_start();
 require_once('functions/user.php');
 require_once('functions/alert.php');
 require_once('functions/redirect.php'); 

 $errorCount=0;
if(!is_user_logged_in()){

    $token = $_POST['token']!="" ? $_POST['token'] : $errorCount++;
    $_SESSION['token']=$token;
}

$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;

$_SESSION['email']=$email;

if ($errorCount>0){
    $errorMessage= "You have" ." ". $errorCount." ". "error";
   
    if($errorCount>1){
     $errorMessage.="s";
    }
      $errorMessage.=  " in your form submission";
      
        set_alert('error',$errorMessage);
     redirect_to("reset.php");
   
   }else{
       //check if email is registered in token's folder
       //check if the content of the registered token (in our folder), is the same as $token
    
    $checkToken = is_user_logged_in() ? true: find_token($email);

            if($checkToken){
               $userExists= find_user($email);
                /*$allUsers=scandir("db/users/");
                $countAllUsers=count($allUsers);
              
                for($counter=0; $counter<$countAllUsers; $counter++) {
                  $currentUser=$allUsers[$counter];
              */
                  if($userExists){
                   
                  $userObject = find_user($email);

                   $userObject->Password =password_hash($password, PASSWORD_DEFAULT);
                   unlink("db/users". $currentUser); //file delete user data delete
                   unlink("db/token". $currentUser);
                   
                   save_user($userObject);
                   
                   set_alert('message',"Password Reset Successful, you can now login ");
                   send_mail($subject,$message,$email);
      
            $subject = "Password reset successful";
          $message = "Your password has jjust been updated Your password has been changed, if you did not initiate this, please visit snh.org and reset your password immediately";
          send_mail($subject,$message,$email);

                   redirect_to("login.php");
                   return;
                     
                  }
                }
   set_alert('error',"Password Reset Failed, token/email invalid or expired");
    redirect_to("login.php");
   }
?>