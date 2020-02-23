<?php
session_start();
include_once "randomString.php";
var_dump($_FILES);
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$room = (int)$_POST['room'];
$Rext = (int)$_POST['ext'];
isset($_POST['admin'])?(int)$admin=1:(int)$admin=0;


$passedValidation=1;    

$path = $_FILES['profile']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);

 $target_dir = "../../assets/images/users/";
 $new_name =generateRandomString().".".$ext;
 $target_file = $target_dir.$new_name;
 $get_file="../assets/images/users/".$new_name;

function valid_email($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
function validPassword($pass){
  if( strlen($pass) < 8) {
     return false;
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
  if (empty($ext)) {
    echo "<h3>ext is empty</h3>";
    $passedValidation=0; 
  }

  if ($passedValidation ==1) {
    
      // echo "<h2>User Added successfully</h2>";
      include_once "../databaseQueries/insert.php";
     header("refresh:1; url=../userAll.php");
  }else {
    header("refresh:2; url=../userAdd.php");
  }

?>