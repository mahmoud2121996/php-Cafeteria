<?php
    // session_start();
    $id = $_GET['id'];
    include("databaseConnection.php");
    
    try {
        $conn = $_SESSION["conn"];
        // $conn = new PDO($dsn, $user, $pass);
        // echo $conn;
        $query = "SELECT * FROM order_product WHERE order_id = '$id';";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $num = $stmt->rowCount();
        echo '<table border="3">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>price</th>
                </tr>';
        while ($row = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            for ($i = 0; $i < $num; $i++) {
                $pro = $row[$i]["product_id"];
                $amount = $row[$i]["number"];
                $query1 = "SELECT * FROM products WHERE id = '$pro'";
                $stmt1 = $conn->prepare($query1);
                $stmt1->execute();
                $row1 = $stmt1->fetch();
                $name = $row1["product_name"];
                $price = $row1["price"];
                echo "<tr>";
                    echo "<td>";
                    echo "<img src=../assets/images/products/" . $row1["image"] . " height='100' width='100'>";
                    echo "</td>";
                    echo "<td>" . $name . "</td>";
                    echo "<td>" . $amount . "</td>";
                    echo "<td>" . $price . "</td>";
                echo "</tr>";
            }
        }
    } catch (PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }
?>



