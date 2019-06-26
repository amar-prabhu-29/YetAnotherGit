<?php
require 'db_connect.php';

$repo = $_POST['repository'];
$desc = $_POST['description'];
$user = $_POST['user'];

$query = "INSERT INTO `repositories`(`name`, `description`, `user`) VALUES ('$repo','$desc','$user')";
mysqli_query($connection,$query);
$id = mysqli_insert_id($connection);
echo $id;
?>