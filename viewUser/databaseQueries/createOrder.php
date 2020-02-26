<?php 
try {
    include_once "connection.php";

    $sql = "INSERT INTO orders (customer_id,total,notes,status) VALUES(?,?,?,?)";
   
    $stmtInsert= $pdo->prepare($sql);
    $stmtInsert->execute([$customerSelected,$total,$notes,"processing"]);
    $ordrId=$pdo->lastInsertId();
    if ($ordrId) {
        foreach ($orderObject as $key => $value) {
            $sqlOrderProduct = "INSERT INTO order_product (order_id,product_id,number) VALUES(?,?,?)";
            $stmtInsertOrderProduct= $pdo->prepare($sqlOrderProduct);
            $stmtInsertOrderProduct->execute([$ordrId,$key,$value]);
        }    
    }
    header("location:../orders.php");
} catch( PDOExecption $e ) {
    print "Error!: " . $e->getMessage() . "</br>";
} 



?>