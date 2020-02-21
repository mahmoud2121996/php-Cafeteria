
<!DOCTYPE html>
<html>
    <head>
        <title> UPDATE DATA </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       
        <form action="update.php" enctype="multipart/form-data" method="POST">
            
            <input type="text" name="name" required placeholder=" Name"><br><br>
            <input type="text" name="email" required placeholder="email"><br><br>
            <input type="text" name="is_admin" required placeholder="is_admin"><br><br>
            <input type="text" name="profile_path" required placeholder=" profile_path"><br><br>
            <input type="text" name="room_No" placeholder="room_No"><br><br>
            <input type="text" name="ext" placeholder="ext"><br><br>
            <input type="submit" name="update" required placeholder="Update Data">
        </form>
      
    </body>
</html>
<?php
   session_start();
   $id = $_GET['id'];
  $_SESSION['id']=$id; 
  echo $id;
  
?>