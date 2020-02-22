<?php
session_start();
$id = $_GET['id'];

$dsn = $_SESSION["dsn"];
$user = $_SESSION["user"];
$pass = $_SESSION["pass"];

$dateForm = $_SESSION["dateForm"];
$dateTo = $_SESSION["dateTo"];

// echo $id;
try {

    $conn = new PDO($dsn, $user, $pass);
    $query = "SELECT product_id FROM order_product WHERE order_id = '$id';";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    // echo $num."<br>";
    // $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($row);
    // echo "<br>";
    while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
        // print_r($row);
        for ($i = 0; $i < $num; $i++) {
            // echo $i . "<br>";
            $pro = $row[$i]["product_id"];
            // echo $pro;
            $amount = $row["number"];
            $query1 = "SELECT * FROM products WHERE id = '$pro'";
            $stmt1 = $conn->prepare($query1);
            $stmt1->execute();
            $row1 = $stmt1->fetch();
            // echo $row["image"];
            echo "<img src=../assets/images/products/" . $row1["image"] . " height='70' width='70'><br>";
        }
    }
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
