<?php
    //session_start();

    $dateFrom = $_POST["dateFrom"];
    $dateTo = $_POST["dateTo"];

    // echo $dateFrom;

    /*$dsn = "mysql:dbname=cafeteria_php;host=localhost;port=3308;";
    $user = "dalia";
    $pass = "123";

    $_SESSION["dsn"] = $dsn;
    $_SESSION["user"] = $user;
    $_SESSION["pass"] = $pass;

    $_SESSION["dateFrom"] = $dateFrom;
    $_SESSION["dateTo"] = $dateTo;*/

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
                <th>Status</th>
                <th>price</th>
                <th>Action</th>
                <th>Products</th>
            </tr>';
        while ($row = $stmt->fetch()) {
            echo "<tr>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "<td>" . $row["status"] . "</td>";
                echo "<td>" . $row["total"] . "</td>";
                if ($row["status"] == "processing"){
                    echo"<td>";
                    echo "<a href=\"cancelOrder.php?id=".$row['id']."\">Cancel</a>";
                    echo "</td>";
                }
                echo "<td>";
                echo "<div class='pImages'> + </div>";
                echo "</td>";
            echo "</tr>";
        }
        echo '</table>';
    }
?>
