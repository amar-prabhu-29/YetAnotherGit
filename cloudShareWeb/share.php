<?php
require 'db_connect.php';

$repository = $_POST['repo'];
$touser = $_POST['user'];

$query = "SELECT * FROM users WHERE username='$touser'";
$result = mysqli_query($connection,$query);
if(mysqli_num_rows($result) == 1){
    $name = mysqli_fetch_assoc($result)['username'];
    $query = "INSERT INTO `share`(`repository`, `user`) VALUES ($repository,'$name')";
    mysqli_query($connection,$query);
    echo "Shared Successfully";
}
else{
    echo "Error in given data";
}




?>



