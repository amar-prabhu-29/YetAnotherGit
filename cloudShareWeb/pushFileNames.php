<?php
require 'db_connect.php';
$repo = $_POST['repo'];
$data = $_POST['files'];
$query = "INSERT INTO `versions`(`files`, `repository`) VALUES ('$data','$repo')";
mysqli_query($connection,$query);

echo mysqli_insert_id($connection);


?>