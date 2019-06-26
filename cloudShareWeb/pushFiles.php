<?php
require 'db_connect.php';
$name = $_POST['name'];
$key = $_POST['key'];
$message = $_POST['message'];
$repo = $_POST['repo'];
$version = $_POST['version'];

echo $version;


$query = "INSERT INTO `files`(`name`, `filekey`, `message`, `repository`, `version`) VALUES ('$name','$key','$message','$repo','$version')";

mysqli_query($connection,$query);

$id = mysqli_insert_id($connection);

move_uploaded_file($_FILES["file"]["tmp_name"],'files/'.$id);

echo $id;
?>