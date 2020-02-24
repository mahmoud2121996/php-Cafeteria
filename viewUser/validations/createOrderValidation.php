<?php


$customerSelected=$_POST['customerSelected'];
$products=$_POST['products'];
$total=$_POST['total'];
$notes=$_POST['notes'];

$passedValidation=1;
$orderObject=json_decode($products) ;


if (empty($customerSelected)||empty($products)||empty($total)) {
    echo "fail";
    $passedValidation == 0;
}


if ($passedValidation == 1) {
    include_once "../databaseQueries/createOrder.php";
}else {
    echo "<h1 style='color:red;'><strong>Failed Validation</strong></h1>";
}


?>