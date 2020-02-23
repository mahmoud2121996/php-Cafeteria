<?php
    session_start();
    $id = $_REQUEST['id'];
    $dsn = $_SESSION["dsn"];
    $user = $_SESSION["user"];
    $pass = $_SESSION["pass"];

    $dateForm = $_SESSION["dateForm"];
    $dateTo = $_SESSION["dateTo"];

    try 
    {
        $conn = new PDO($dsn , $user, $pass);
        $query = "DELETE FROM orders WHERE id = $id;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $conn = null;
    }
    catch(PDOException $e)
    {
        echo "Connection Failed: " . $e->getMessage();
    }
    

?>