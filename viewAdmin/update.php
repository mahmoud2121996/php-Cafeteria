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
        $updateQuery = "update users set name= ?, email= ?, is_admin=? , profile_path=? , room_No=?, Ext=? where id=?";

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST["email"];
        $is_admin = $_POST["is_admin"];
        $room_No = $_POST["room_No"];
        $ext = $_POST["ext"];


        $imgPath = $_POST["profile_path"];

        if (isset($_FILES["file"]) && !empty($_FILES["file"])) {
            $images = "userImages";
            $imageTmpName = $_FILES["file"]["tmp_name"];
            $imageName = $_FILES["file"]["name"];
            $fileType = $_FILES["file"]["type"];
            echo "file uploaded...";
            if ($fileType == "image/png" || $fileType == "image/jpeg") {
                if (move_uploaded_file($imageTmpName, $images . "/" . $imageName)) {
                    echo "image moved...";
                    $imgPath = $images . "/" . $imageName;
                } else {
                    echo "image is not png or jpg...";
                }
            }
        }


        try {

            include_once "databaseQueries/connection.php";
            if ($conn->prepare($updateQuery)->execute([$name, $email, $is_admin, $imgPath, $room_No, $ext, $id])) {
                echo "updated...";
            } else {
                echo "not updated...";
            }

            header('Location: userAll.php');
        } catch (\Throwable $sth) {

            //throw sth;
        }
    } else {
        $selectQuery = "select * from users where id = ?";

        try {
            include_once "databaseQueries/connection.php";
            $results = $conn->prepare($selectQuery);
            $results->execute([$_GET["id"]]);
            $row = $results->fetch();

            $name = $row['name'];
            $email = $row["email"];
            $is_admin = $row["is_admin"];
            $room_No = $row["room_No"];
            $ext = $row["Ext"];
            $imgPath = $row["profile_path"];

            echo "<form action='update.php' enctype='multipart/form-data' method='POST'>";
            echo "<input type='text' name='name' required placeholder='name' value = '" . $name . "'><br><br>
            <input type='text' name='email' required placeholder='email' value = '" . $email . "'><br><br>
            <input type='text' name='is_admin' required placeholder='isadmin' value= '" . $is_admin . "' ><br><br>
            <input type='text' name='room_No' required placeholder='roomno' value= '" . $room_No . "' ><br><br>
            <input type='text' name='ext' required placeholder='ext' value= '" . $ext . "' ><br><br>
            <input type='file' name='file'><br><br>
            <input type='hidden' name='id' value = '" . $_GET["id"] . "'><br><br>
            <input type='hidden' name='profile_path' value = '" . $imgPath . "'><br><br>
            <input type='submit' name='update' value = 'update '></form>";
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    ?>

</body>

</html>