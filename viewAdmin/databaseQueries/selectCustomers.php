<?php 
include_once "connection.php";
$stmAll = $pdo->query("SELECT * FROM users where is_admin = 0;");
$customersAll = $stmAll->fetchAll(PDO::FETCH_NUM);

// foreach ($customersAll as $customer) {
//    echo $customer[0]."</br>";
//    echo $customer[1]."</br>";
// }

?>