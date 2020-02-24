<html>

<head>
    <link rel="stylesheet" href="../assets/css/styleDate.css" />
</head>

<body>
    <form method="POST" enctype="multipart/form-data" action="date.php">
        <div class="container">
            <div class="DF">
                <label>Date From:</label>
                <input type="date" data-format="dd-MM-yyyy" name="dateFrom">
            </div>
            <div class="DT">
                <label>Date To:</label>
                <input type="date" data-format="dd-MM-yyyy" name="dateTo">
            </div>
            <button class="search"> Search </button>
        </div>
        <?php
        //session_start();
        
        
        // $db_config = parse_ini_file('config.sample.ini');
        // $conn = new PDO("mysql:dbname={$db_config['db_name']};".
        //                         "host={$db_config['db_host']};".
        //                         "port={$db_config['db_port']};",
        //                         $db_config['db_user'],
        //                         $db_config['db_pass']);
        // $dateFrom = $_POST["dateFrom"];
        // $dateTo = $_POST["dateTo"];
        include_once "databaseQueries/connection.php";
        /*$dsn = "mysql:dbname=cafeteria_php;host=localhost;port=3308;";
        $user = "dalia";
        $pass = "123";*/
        //var_dump($_SESSION);
        /*$_SESSION["dsn"] = $dsn;
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;

        $_SESSION["dateFrom"] = $dateFrom;
        $_SESSION["dateTo"] = $dateTo;*/
        

        // var_dump($conn);
        //echo $_SESSION["test"];

        Select($dateFrom, $dateTo, $conn);

        function Select($dateFrom, $dateTo, $conn)
        {
            // I want the customer_id from previous screen !!!!!!!!!!!!!!!!
            // $conn = new PDO($dsn , $user, $pass);
            try {
                $query = "SELECT * FROM orders WHERE created_at BETWEEN '$dateFrom' AND '$dateTo'; ";
                $stmt = $conn->prepare($query);
                $stmt->execute();

                echo '<table border="3">
                <tr>
                    <th>Date</th>
                    <th>Products</th>
                    <th>Status</th>
                    <th>price</th>
                    <th>Action</th>
                </tr>';
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row["created_at"] . "</td>";
                    echo "<td>";
                    echo "<a href=\"productsImg.php?id=" . $row['id'] . "\"> + </a>";
                    echo "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    if ($row["status"] == "processing") {
                        echo "<td>";
                        echo "<a href=\"cancelOrder.php?id=" . $row['id'] . "\">Cancel</a>";
                        echo "</td>";
                    }
                    echo "</tr>";
                    echo "<tr>";
                    $query2 = "SELECT * FROM order_product WHERE order_id = '$row[id]';";
                    $stmt2 = $conn->prepare($query2);
                    $stmt2->execute();
                    $num = $stmt2->rowCount();
                    echo '<table border="3">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>price</th>
                            </tr>';
                    while ($row2 = $stmt2->fetchAll(PDO::FETCH_ASSOC)) {
                        for ($i = 0; $i < $num; $i++) {
                            $pro = $row2[$i]["product_id"];
                            $amount = $row2[$i]["number"];
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
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                echo '</table>';
            } catch (PDOException $e) {
                echo "Connection Failed: " . $e->getMessage();
            }
        }
        ?>
</body>

</html>