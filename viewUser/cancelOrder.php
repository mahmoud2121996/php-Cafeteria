<?php
    // session_start();
    include("databaseConnection.php");
    $id = $_REQUEST['id'];
    try 
    {
        $conn = $_SESSION["conn"];
        $query = "DELETE FROM orders WHERE id = $id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        // $conn = null;
    }
    catch(PDOException $e)
    {
        echo "Connection Failed: " . $e->getMessage();
    }
    

?>