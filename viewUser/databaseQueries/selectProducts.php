<?php
include_once "connection.php";
$stmAllProduct = $pdo->query("SELECT * FROM products;");
$productsAll = $stmAllProduct->fetchAll(PDO::FETCH_NUM);


// foreach ($productsAll as $customer) {
//    echo $customer[0]."</br>";
//    echo $customer[1]."</br>";
// }

?>