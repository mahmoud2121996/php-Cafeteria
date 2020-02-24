<?php
include_once "connection.php";
$stmAllProduct = $conn->query("SELECT * FROM products;");
$productsAll = $stmAllProduct->fetchAll(PDO::FETCH_NUM);


?>