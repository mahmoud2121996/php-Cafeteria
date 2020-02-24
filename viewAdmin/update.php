
<?php
    session_start();
    include_once "validations/middleware.php";

    $id=$_SESSION['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $is_admin=$_POST["is_admin"];
    //$profilepath=$_POST["profile_path"];
    $room_No=$_POST["room_No"];
    $ext=$_POST["ext"];
    $imgPath;
    if (isset($_FILES["file"]) && !empty($_FILES["file"])){
        $images="userImages";
        $imageTmpName = $_FILES["file"]["tmp_name"];
        $imageName = $_FILES["file"]["name"];
        $fileType = $_FILES["file"]["type"];
        echo "file uploaded...";
        if ($fileType == "image/png" || $fileType == "image/jpeg"){
            if (move_uploaded_file($imageTmpName,$images."/".$imageName)){
                echo "image moved...";
                $imgPath = $images."/".$imageName;
            }
            else {
                echo "image is not png or jpg...";
            }
        }
    }

    //$id = $_GET['id'];
    
     
    try {
        // $con = new PDO("mysql:host=127.0.0.1;dbname=cafeteria_php;", $username, $password);
        include_once "databaseQueries/connection.php";
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $query = "UPDATE users SET name= '$name' , email= '$email',  is_admin='$is_admin' , profile_path='$imgPath' , room_No='$room_No', ext='$ext' where id='$id' ;";
      
        $pdoResult = $conn->prepare($query);
        
        $pdoExec = $pdoResult->execute();
        header('Location: view-users.php');
      
    } catch(PDOException $e)
    {
          echo "Connectionupdatefailed: " . $e->getMessage();
    }
    

?>
