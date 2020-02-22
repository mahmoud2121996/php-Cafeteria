<?php 
// order status   0 -> recieved
//                1 -> outforDelivery
//                2 -> done



try {
    include_once "connection.php";

    $stmt = $pdo->prepare("INSERT INTO orders (customer_id, admin_id,notes,total) VALUES(?,?)");

    try {
        $dbh->beginTransaction();
        $tmt->execute( array('user', 'user@example.com'));
        $dbh->commit();
        print $dbh->lastInsertId();
    } catch(PDOExecption $e) {
        $dbh->rollback();
        print "Error!: " . $e->getMessage() . "</br>";
    }
} catch( PDOExecption $e ) {
    print "Error!: " . $e->getMessage() . "</br>";
} 



?>