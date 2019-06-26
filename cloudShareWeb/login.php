<?php
require 'db_connect.php';
if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];
    $query = "SELECT * FROM `users` WHERE `username`='$username' and `password`='$password'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) == 1){
        $creds = mysqli_fetch_assoc($result);
        echo $creds['id']."-".$creds['name'];
    }
    else{
        echo "e";
    }
    
}
?>