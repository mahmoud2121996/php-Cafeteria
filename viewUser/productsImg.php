<?php
    //session_start();
    $id = $_GET['id'];
    include("databaseConnection.php");
    $conn = $_SESSION["conn"];
    // $dsn = $_SESSION["dsn"];
    // $user = $_SESSION["user"];
    // $pass = $_SESSION["pass"];

    // $dateForm = $_SESSION["dateForm"];
    // $dateTo = $_SESSION["dateTo"];

    try {

        // $conn = new PDO($dsn, $user, $pass);
        // echo $conn;
        $query = "SELECT product_id FROM order_product WHERE order_id = '$id';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            for ($i = 0; $i < $num; $i++) {
                $pro = $row[$i]["product_id"];
                $amount = $row["number"];
                $query1 = "SELECT * FROM products WHERE id = '$pro'";
                $stmt1 = $conn->prepare($query1);
                $stmt1->execute();
                $row1 = $stmt1->fetch();
                echo "<img src=../assets/images/products/" . $row1["image"] . " height='70' width='70'>";
            }
        }
    } catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }
?>



