<?php
session_start();
$userEmail;
$userPassword;
$selectFlag = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        echo "mail is empty...";
        $selectFlag = 0;
    } else {
        $userEmail = $_POST["email"];
    }


    if (empty($_POST["pass"])) {
        echo "password is empty...";
        $selectFlag = 0;
    } else {
        $userPassword = $_POST["pass"];
    }

    if ($selectFlag === 1) {
        try {
            $dbn = "mysql:dbname=cafeteria_php;host=127.0.0.1;port=3306;";
            $dbUser = "root";
            $dbPassword = "";
            $db = new PDO($dbn, $dbUser, $dbPassword);
            $selectQuery = " SELECT * from users where email = ? and password = ?";
            $results = $db->prepare($selectQuery);
            $results->execute([$userEmail, $userPassword]);
            if ($results = $results->fetch()) {
                if ($results["email"] == $userEmail && $results["password"]) {
                    $_SESSION["name"] = $results["name"];
                    
                    // echo "welcom ".$_SESSION["name"]." to dummy home page...";
                    header('Location: dumyHome.php');
                } else {
                    echo "email or password is wrong...";
                }
            } else {
                echo "email or password is wrong...";
            }

            // echo "num of rows : " . $results->num ;
        } catch (PDOException $e) {
            //throw $th;
        }
    }
} else {
    echo "wrong method...";
}
