<?php
    
    include_once "../databaseQueries/connection.php";
    $email = $_GET['email'];

    $sql = "SELECT * FROM users where email = '$email'"; 
    $resultAjax = $conn->prepare($sql); 
    $resultAjax->execute(); 
    $number_of_rows = $resultAjax->fetchColumn(); 

    echo  $number_of_rows ;
    if (($number_of_rows)>0) {
        echo "anything to show the error message;" ;
    }
   



?>