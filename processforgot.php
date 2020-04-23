<?php session_start();
require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');

$errorCount=0;
//checks for error
$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;

$_SESSION['email']=$email;

if ($errorCount>0){
    $errorMessage= "You have" ." ". $errorCount." ". "error";
   
    if($errorCount>1){
     $errorMessage.="s";
    }
      $errorMessage.=  " in your form submission";
      //$_SESSION["error"]= $errorMessage;
   set_alert('error',$errorMessage);
     header("Location: forgot.php");
   
   }
   else{
    $allUsers=scandir("db/users/"); //getting all users
    $countAllUsers=count($allUsers); //counting it
    
    for($counter=0; $counter<$countAllUsers; $counter++) {
        $currentUser=$allUsers[$i];
    
        if($currentUser==$email.".JSON"){
         
          /*
          token generation
          */
          $token = generate_token();


          /*
          token generation ends
          */
          
          //send email
          
          $subject = "Password reset link";
          $message = "A password reset has been initiated from your account, if you did not initiate this, please ignore
          other wise, visit: localhost/smhh/reset.php?token=". $token;
          
          //save token to database
          file_put_contents("db/tokens/".$email.'.json' ,json_encode(['token'=>$token]));
          //using the mail function 
          
          send_mail($subject,$message,$email);

          die();
        }
      }
      set_alert('error',"error email not registered: " .$email);
        redirect_to("forgot.php");
   }

?>