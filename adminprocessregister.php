<?php  session_start();

$errorCount=0;
//checks is the details are not empty with a tenary operation

$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;

//saves current date
$date_reg=date("Y,m,d");
$_SESSION['email']=$email;



if ($errorCount>0){
  $errorMessage= "You have" ." ". $errorCount." ". "error";
 
  if($errorCount>1){
   $errorMessage.="s";
  }
    $errorMessage.=  " in your form submission";
    $_SESSION["error"]= $errorMessage;
 
   header("Location: adminregister.php");
 
 }
elseif (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
  $_SESSION["error"]= "Please Use a valid email";
  header("Location: register.php");
}elseif(!preg_match("/^([a-zA-Z' ]+)$/",$_SESSION['firstname'].$_SESSION['lastname'])){
  $_SESSION["error"]= "Name should not have numbers";
  header("Location: register.php");
}elseif(strlen($_SESSION['firstname'].$_SESSION['lastname'])<2){
  $_SESSION["error"]= "Name should not be less than two characters";
  header("Location: register.php");
}
else{

    $allUsers=scandir("db/users/");
    $countAllUsers=count($allUsers);
    $newUserId=$countAllUsers-1;

$file="db/adminuser/".$email.".JSON"; 
//stores the details in an array
  $userObject=[
      'id'=>$newUserId,
      'Email'=> $email,
      'Password'=>password_hash($password, PASSWORD_DEFAULT),
  ];

  for($counter=0; $counter<$countAllUsers; $counter++) {
    $currentUser=$allUsers[$i];

    if($currentUser==$email.".JSON"){
      $_SESSION["error"]="Registration Failed,User already exists";
      header("Location: adminregister.php");
      die();
    }
  }

  file_put_contents($file,json_encode($userObject));
  $_SESSION["message"]= "You have registered successfully";
  header("Location: adminlogin.php");
}

?>

