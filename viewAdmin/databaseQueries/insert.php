<?php
include_once "connection.php";

$sql = "INSERT INTO users (name,email,Ext,room_NO,password,is_admin,profile_path) VALUES (?,?,?,?,?,?,?)";
$stmtInsert= $pdo->prepare($sql);
$stmtInsert->execute([$name,$email,$ext,$$room,$pass,$admin, $get_file]);
$source = $_FILES["profile"]['tmp_name'];
move_uploaded_file($source,$target_file);

