<?php


$connect = mysqli_connect("localhost","root","ITIintake40","cafeteria");
// $query = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
// $queryremovecomment2="DELETE FROM comments WHERE post_id ='$idpost' AND idcomment='$comment_id' AND user_id='$user_id' ";
// $queryeditpost="UPDATE posts SET post = '$post' WHERE idpost ='$idpost' AND title ='$title' ";
// $query = "INSERT INTO posts (title,post,user_id) VALUES('$title','$post','$iduser')";
$query   = "SELECT * FROM admin where user_name='naguib' ";
$result = mysqli_query($connect,$query);
// var_dump($result);
 $data[]=mysqli_fetch_assoc($result); 
 echo $data[0]['user_name'];


?>