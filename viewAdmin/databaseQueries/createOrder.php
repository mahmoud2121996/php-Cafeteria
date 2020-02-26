<?php 
try {
    include_once "connection.php";

    $sql = "INSERT INTO orders (customer_id,total,notes,status) VALUES(?,?,?,?)";
   
    $stmtInsert= $conn->prepare($sql);
    $stmtInsert->execute([$customerSelected,$total,$notes,"processing"]);
    $ordrId=$conn->lastInsertId();
    if ($ordrId) {
        foreach ($orderObject as $key => $value) {
            $sqlOrderProduct = "INSERT INTO order_product (order_id,product_id,number) VALUES(?,?,?)";
            $stmtInsertOrderProduct= $conn->prepare($sqlOrderProduct);
            $stmtInsertOrderProduct->execute([$ordrId,$key,$value]);
        }    
    }
    header("location:../orders.php");
} catch( PDOException $e ) {
    print "Error!: " . $e->getMessage() . "</br>";
} 



?>