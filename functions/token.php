<?php

//implement token
function generate_token(){
$token = "";
          $alphabets = ['a','b','c','d','e','f', 'g', 'h', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
          for($i=0; $i<20; $i++){
            $index = mt_rand(0,count($alphabets)-1);
            $token.=$alphabets[$index];
            print_r($token);
            die();

          }
          return $token;
        }
  
function find_token($email=""){
  $allUserTokens=scandir("db/tokens/"); //checks the folder
  $countAllUserToken=count($allUserTokens);

  for($counter=0; $counter<$countAllUserToken; $counter++) {
      $currentTokenFile=$allUserTokens[$counter];
  
      if($currentTokenFile==$email.".JSON"){
          $tokenContent=file_get_contents("db/tokens/".$currentTokenFile);
          
          $tokenObject=json_decode($tokenContent);
          //$tokenFromDB = $tokenObject->token;
        return $tokenObject;
          
        }
    }return false;
}

        