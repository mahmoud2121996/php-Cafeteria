<html>

<head>
    <link rel="stylesheet" href="style.css" />
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
        $dateFrom = $_POST["dateFrom"];
        $dateTo = $_POST["dateTo"];
        $dsn = "mysql:dbname=cafeteria_php;host=localhost;port=3308;";
        $user = "dalia";
        $pass = "123";
        Select($dsn, $user, $pass, $dateFrom, $dateTo);

        function Select($dsn , $user, $pass , $dateFrom , $dateTo)
        {

            $conn = new PDO($dsn , $user, $pass);
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
                    echo "<a href=\"productsImg.php?id=".$row['id']."\"> + </a>";
                    echo "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    if ($row["status"] == "processing"){
                        echo"<td>";
                        echo "<a href=\"cancelOrder.php?id=".$row['id']."\">Cancel</a>";
                        echo "</td>";
                    }
                echo "</tr>";
            }
            echo '</table>';
        }
    ?>
</body>

</html>