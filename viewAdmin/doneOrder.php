<?php
    // session_start();
    // include("../viewUser/databaseConnection.php");
    include_once "databaseQueries/connection.php";
    $id = $_REQUEST['id'];
    try 
    {
        // $conn = $_SESSION["conn"];
        $query = " UPDATE orders SET `status`= 'done' WHERE id = $id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        // $conn = null;
    }
    catch(PDOException $e)
    {
        echo "Connection Failed: " . $e->getMessage();
    }
    

?>