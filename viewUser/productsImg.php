<?php
    session_start();
    $id = $_GET['id'];
 
    $dsn = $_SESSION["dsn"];
    $user = $_SESSION["user"];
    $pass = $_SESSION["pass"];

    $dateForm = $_SESSION["dateForm"];
    $dateTo = $_SESSION["dateTo"];

    // echo $id;
    try{

        $conn = new PDO($dsn , $user, $pass);
        $query = "SELECT product_id FROM order_product WHERE order_id = '$id';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        //$num = $stmt->rowCount();
        while($row = $stmt->fetch()){
            $pro = $row["product_id"];
            echo $pro;
            $amount = $row["number"];
            $query = "SELECT * FROM products WHERE id = '$pro'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch();
            echo $row["image"];
            echo "<img src=../assets/images/products/". $row["image"] ." height='70' width='70'>";
        }
    }
    catch(PDOException $e)
        {
            echo "Connection Failed: " . $e->getMessage();
        }
?>