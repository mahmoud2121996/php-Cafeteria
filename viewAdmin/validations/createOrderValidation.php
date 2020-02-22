<?php

var_dump($_POST);

$customerSelected=$_POST['customerSelected'];
$products=$_POST['products'];
$total=$_POST['total'];
$notes=$_POST['notes'];

$passedValidation=1;
$orderObject=json_decode($products) ;
foreach ($orderObject as $key => $value) {
    echo "product id is : ". $key." & number of units is : ".$value."</br>";
}


if (empty($customerSelected)||empty($products)||empty($total)) {
    $passedValidation == 0;
}


if ($passedValidation == 1) {
    
}else {
    echo "<h1 style='color:red;'><strong>Failed Validation</strong></h1>";
}


?>