<?php
session_start();
include_once "randomString.php";
var_dump($_POST);
echo generateRandomString();
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$room = $_POST['room'];
$phone = $_POST['phone'];
$is_admin = $_POST['is_admin'];

$passedValidation=1;    


 $target_dir = "../assets/images/users";
 $target_file = $target_dir.generateRandomString().basename($_FILES["profile"]["name"]);


function valid_email($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
  
}
function validPassword($pass){
  $uppercase = preg_match('@[A-Z]@', $pass);
  $special = preg_match('/[w!$£#%&*\^]/', $pass);
  if( $special || $uppercase || strlen($pass) != 8) {
     return false;
     $passedValidation=0; 
  }else{
      return true;
  }
}


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<h3>email is invalid[filter]</h3>";
    $passedValidation=0; 
  } 

  if(empty($email)) {
  echo "<h3>email is empty</h3>";
  $passedValidation=0; 
  }else {
    if (!valid_email($email)) {
      echo "<h3>Please check the email format</h3>";
      $passedValidation=0; 
    }
  }



  if (empty($pass)) {
    echo "<h3>password is empty</h3>";
    $passedValidation=0; 
  }else {
    if (!validPassword($pass)) {
      echo "<h3>Please check the pass format</h3>";
      $passedValidation=0; 
    }
  }



  if(empty($name)) {
  echo "<h3>name is empty</h3>";
  $passedValidation=0; 
  }

  if (empty($room)) {
    echo "<h3>room is empty</h3>";
    $passedValidation=0; 
  }
  if (empty($phone)) {
    echo "<h3>phone is empty</h3>";
    $passedValidation=0; 
  }

//   if ($passedValidation ==1) {
    
//       echo "<h2>User Added successfully</h2>";
//       include_once "insert.php";
//      header("refresh:2; url=dashboard.php");
//   }else {
//     header("refresh:2; url=info.php");
//   }

?>