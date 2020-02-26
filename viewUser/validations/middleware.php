<?php
    // session_start();

    if (isset($_SESSION["is_admin"])){
        if ($_SESSION["is_admin"]==1) {
            header("location: ../viewAdmin/home.php");
        }
    }else {
            header('Location: ../login.php');

    }
   
?>