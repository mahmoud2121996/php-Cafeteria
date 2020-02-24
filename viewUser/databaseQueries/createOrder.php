<?php 
try {
    $db_config = parse_ini_file('../../config.sample.ini');
    $conn = new PDO("mysql:dbname={$db_config['db_name']};".
                        "host={$db_config['db_host']};".
                        "port={$db_config['db_port']};",
                        $db_config['db_user'],
                        $db_config['db_pass']);

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
} catch( PDOExecption $e ) {
    print "Error!: " . $e->getMessage() . "</br>";
} 



?>