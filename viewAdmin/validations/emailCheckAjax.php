<?php
// session_start();
//select email from users =>$emails[];
$emails[]="m.naguib2611@gmail.com";

if (in_array($_GET['email'], $emails)) {
   echo "this email already exists";
}

?>