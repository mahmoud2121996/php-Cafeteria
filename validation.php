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
            $dbUser = "dalia";
            $dbPassword = "123";
            $db = new PDO($dbn, $dbUser, $dbPassword);
            $selectQuery = " SELECT * from users where email = ? and password = ?";
            $results = $db->prepare($selectQuery);
            $results->execute([$userEmail, $userPassword]);
            if ($results = $results->fetch()) {
                if ($results["email"] == $userEmail && $results["password"]) {
                    $_SESSION["loggedId"] = $results["id"];
                    $_SESSION["name"] = $results["name"];
                    $_SESSION["is_admin"] = $results["is_admin"];
                    $_SESSION["profile_path"] = $results["profile_path"];

                    if ($_SESSION["is_admin"]) {
                        header('Location: viewAdmin/home.php');
                    }else {
                        header('Location: viewUser/home.php');
                    }
                    
                } else {
                    echo "<h1 style='color:red;'>email or password is wrong...<h1>";
                    header('refresh:1; login.php');
                }
            } else {
                echo "<h1 style='color:red;'>email or password is wrong...<h1>";
                    header('refresh:2; login.php');
            }

            // echo "num of rows : " . $results->num ;
        } catch (PDOException $e) {
            //throw $th;
        }
    }
} else {
    echo "wrong method...";
}
