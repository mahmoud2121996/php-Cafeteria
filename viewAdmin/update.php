

<?php
    session_start();
    $id=$_SESSION['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $is_admin=$_POST["is_admin"];
    $profilepath=$_POST["profile_path"];
    $room_No=$_POST["room_No"];
    $ext=$_POST["ext"];
   

    //$id = $_GET['id'];
    
     
    try {
        $con = new PDO("mysql:host=127.0.0.1;dbname=cafeteria_php;", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
        $query = "UPDATE users SET name= '$name' , email= '$email',  is_admin='$is_admin' , profile_path='$profilepath' , room_No='$room_No', ext='$ext' where id='$id' ;";
       echo $query;
        $pdoResult = $con->prepare($query);
        
        $pdoExec = $pdoResult->execute();
         echo"success";
    } catch(PDOException $e)
    {
          echo "Connectionupdatefailed: " . $e->getMessage();
    }
    

?>
