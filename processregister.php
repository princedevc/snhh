<?php  session_start();
require_once('functions/user.php');

$errorCount=0;
//checks is the details are not empty with a tenary operation
$fName = $_POST['firstname']!="" ? $_POST['firstname'] :$errorCount++ ;
$lName = $_POST['lastname']!="" ? $_POST['lastname'] : $errorCount++;
$email = $_POST['email']!="" ? $_POST['email'] : $errorCount++;
$password = $_POST['password']!="" ? $_POST['password'] : $errorCount++;
$gender = $_POST['gender']!="" ? $_POST['gender'] : $errorCount++;
$designation =$_POST['designation']!="" ? $_POST['designation'] : $errorCount++;
$department = $_POST['department']!="" ? $_POST['department'] : $errorCount++;
//saves current date
$date_reg=date("Y,m,d");

$_SESSION['firstname']=$fName;
$_SESSION['lastname']=$lName;
$_SESSION['email']=$email;
$_SESSION['gender']=$gender;
$_SESSION['designation']=$designation;
$_SESSION['department']=$department;
$_SESSION['date_reg']=$date_reg;


if ($errorCount>0){
  $errorMessage= "You have" ." ". $errorCount." ". "error";
 
  if($errorCount>1){
   $errorMessage.="s";
  }
    $errorMessage.=  " in your form submission";
    $_SESSION["error"]= $errorMessage;
 
   header("Location: register.php");
 
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

    $newUserId=$countAllUsers-1;

$fileName="db/users/".$email.".JSON";

  $userObject=[
      'id'=>$newUserId,
      'First_Name'=>$fName,
      'Last_Name'=>$lName,
      'Email'=> $email,
      'Password'=>password_hash($password, PASSWORD_DEFAULT),
      'Gender'=>$gender,
      'Designation'=>$designation,
      'Department'=>$department,
      'date_reg'=>$date_reg
  ];

  $userExists= find_user($email);

    if($userExists){
      $_SESSION["error"]="Registration Failed,User already exists";
      header("Location: register.php");
      die();
    }
  
    save_user($userObject);
  
  $_SESSION["message"]= "You have registered successfully";
  header("Location: login.php");
}

?>

