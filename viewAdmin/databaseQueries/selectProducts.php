<?php
include_once "connection.php";
$stmAllProduct = $conn->query("SELECT * FROM products;");
$productsAll = $stmAllProduct->fetchAll(PDO::FETCH_NUM);


// foreach ($productsAll as $customer) {
//    echo $customer[0]."</br>";
//    echo $customer[1]."</br>";
// }

?>