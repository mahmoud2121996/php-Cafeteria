<?php

    if (isset($_SESSION["is_admin"])){
        if ($_SESSION["is_admin"]==0) {
            header("location: ../viewUser/home.php");
        }
    }else {
            header('Location: ../login.php');

    }
   
?>