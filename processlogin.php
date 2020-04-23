<?php session_start();

require_once('functions/alert.php');
require_once('functions/redirect.php');
require_once('functions/token.php');
require_once('functions/user.php');

$errorCount=0;
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

  redirect_to("login.php");

}else{
  $currentUser = find_user($email);
  
    if($currentUser){
     $userString=file_get_contents("db/users/".$currentUser->email.".json");
      $userObject=json_decode($userString);
      $passwordFromDb=$userObject->Password;
      $passwordFromUser=password_verify($password, $passwordFromDb);
      
      if($passwordFromDb==$passwordFromUser){
        $_SESSION['fullname']=$userObject->first_Name." ". $userObject->last_Name;
        $_SESSION['email']=$userObject->email;
        $_SESSION['id']=$userObject->id;
        $_SESSION['role']=$userObject->Designation;
        $_SESSION['date_reg']=$userObject->date_reg; 
        
        $_SESSION['time']= date("y,m,d , h:i a ");


        //try to get the log in date and time saved into the log folder
        if(isset($_SESSION['time']) && !empty($_SESSION['time'])){
          $log="log/".$_SESSION['email']. ".txt";
          file_put_contents($log, $_SESSION['time']." ",FILE_APPEND);
          
          $file_cont=file_get_contents($log);

        }
        if($userObject->Designation=='Patient'){
          redirect_to("patient.php");
        }else{
          redirect_to("doctor.php");
          }
        die();
      }
    
  }
  
  set_alert('error',"Invalid Email/Password");
  redirect_to("login.php");
  die();
}

?>