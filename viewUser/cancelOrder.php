<?php
    // session_start();
    $id = $_GET['id'];
 
    // $dsn = $_SESSION["dsn"];
    // $user = $_SESSION["user"];
    // $pass = $_SESSION["pass"];

    // $dateForm = $_SESSION["dateForm"];
    // $dateTo = $_SESSION["dateTo"];



    Delete($dsn , $user, $pass , $id);
    Select($dsn, $user, $pass, $dateFrom, $dateTo);

    function Delete($dsn , $user, $pass , $id)
    {
        try 
        {
            $conn = new PDO($dsn , $user, $pass);

            $query = "DELETE FROM orders WHERE id = $id;";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "Deleted Successfully...";
            $conn = null;
        }
        catch(PDOException $e)
        {
            echo "Connection Failed: " . $e->getMessage();
        }
    }

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
                
            echo "</tr>";
        }
        echo '</table>';
    }


?>