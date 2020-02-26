<!DOCTYPE html>
<html>

<head>
    <title> update product </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php

session_start();
include_once "validations/middleware.php";

    if (isset($_POST["update"])) {
        $updateQuery = "update products set product_name=?,price= ?, category_id=? , image = ? where id = ?";
        // $dbn = "mysql:dbname=cafeteria_php;host=127.0.0.1;port=3306;";
        // $dbUser = "root";
        // $dbPassword = "";

        $productId = $_POST["id"];
        $productName = $_POST["product_name"];
        $productPrice = $_POST["price"];
        $categoryId = $_POST["category_id"];
        $productImage = $_POST["old_image"];

        if (isset($_FILES["image"]) && !empty($_FILES["image"])) {
            $filesPath = "products_images";
            $tmpName = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            if ($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg") {

                if (move_uploaded_file($tmpName, $filesPath."/"."$fileName")) {
                    $img = $filesPath . "/" . $fileName;
                    $productImage = $img;
                    echo "<br>file moved...<br>";
                } else {
                    echo "<br>error in moving the file...<br>";
                }
            } else {
                echo "this file is not png or jpg image";
            }
        }



        try {
            // $db = new PDO($dbn, $dbUser, $dbPassword);
            include_once "databaseQueries/connection.php";
            if ($conn->prepare($updateQuery)->execute([$productName, $productPrice, $categoryId, $productImage, $productId])) {
                echo "updated...";
            } else {
                echo "not updated...";
            }

            header('Location: productAll.php');
        } catch (\Throwable $th) {
            //throw $th;
        }
    } else {
        $selectQuery = "select * from products where id = ?";
        // $dbn = "mysql:dbname=cafeteria_php;host=127.0.0.1;port=3306;";
        // $dbUser = "root";
        // $dbPassword = "";
        try {
            // $db = new PDO($dbn, $dbUser, $dbPassword);
            include_once "databaseQueries/connection.php";
            $results = $conn->prepare($selectQuery);
            $results->execute([$_GET["id"]]);
            $row = $results->fetch();

            $productName = $row["product_name"];
            $productPrice = $row["price"];
            $categoryId = $row["category_id"];
            $productImage = $row["image"];
            echo "<form action='updateProduct.php' enctype='multipart/form-data' method='POST'>";
            echo "<input type='text' name='product_name' required placeholder='product_name' value = '" . $productName . "'><br><br>
                <input type='text' name='price' required placeholder='price' value = '" . $productPrice . "'><br><br>
                <input type='text' name='category_id' required placeholder='category id' value= '" . $categoryId . "' ><br><br>
                <input type='file' name='image'><br><br>
                <input type='hidden' name='id' value = '" . $_GET["id"] . "'><br><br>
                <input type='hidden' name='old_image' value = '" . $productImage . "'><br><br>
                <input type='submit' name='update' value = 'update product'></form>";
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    ?>

</body>

</html>