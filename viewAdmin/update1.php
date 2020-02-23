
<!DOCTYPE html>
<html>
    <head>
        <title> UPDATE DATA </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
       
        <form action="update.php" enctype="multipart/form-data" method="POST">
            
           <label for="name">Name</label>
            <input type="text" name="name" required placeholder=" Name"><br><br>
            <label for="email">Email</label>
            <input type="text" name="email" required placeholder="email"><br><br>
            <label for="is_admin">Is Admin</label>
            <input type="text" name="is_admin" required placeholder="is_admin"><br><br>
            <label for="profile_path">profile path</label>
       
        <input type="file" name="file" id="file"><br>
        <label for="room_No">Room No</label>
            <input type="text" name="room_No" placeholder="room_No"><br><br>
            <label for="ext">Ext</label>
            <input type="text" name="ext" placeholder="ext"><br><br>
            <input type="submit" name="update" required placeholder="Update Data">
        </form>
      
    </body>
</html>
<?php
   session_start();
   include_once "validations/middleware.php";

   $id = $_GET['id'];
  $_SESSION['id']=$id; 
 
  
?>