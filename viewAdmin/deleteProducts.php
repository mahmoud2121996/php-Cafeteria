<?php
$deleteQuery = "delete from products where id = ?";
$dbn = "mysql:dbname=cafeteria_php;host=127.0.0.1;port=3306;";
$dbUser = "root";
$dbPassword = "";

try {
    $db = new PDO($dbn, $dbUser, $dbPassword);
    $db->prepare($deleteQuery)->execute([$_GET['id']]);
    header('Location: viewProduct.php');
} catch (\Throwable $th) {
    //throw $th;
}
