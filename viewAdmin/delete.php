<?php

// php delete data in mysql database using PDO
$servername = "localhost";
$username = "root";
$password = "";
$id = $_GET['id'];
echo $id;
    try {
        $con = new PDO("mysql:host=127.0.0.1;dbname=cafeteria_php;", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdoQuery = "DELETE FROM users WHERE id = $id;";
    
        $pdoResult = $con->prepare($pdoQuery);
        $pdoExec = $pdoResult->execute();
        echo"deleted successfully";
    
    } catch(PDOException $e)
    {
    echo "Connection delete failed: " . $e->getMessage();
    }
    
    
    
    
   
    
    
    

?>