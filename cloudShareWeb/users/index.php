<?php
session_start();
include 'connection.php';
$error = 0;
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users where username='$username' and password='$password'";
if(mysqli_num_rows(mysqli_query($connection,$query)) == 1){
    $_SESSION['username'] = $username;
    echo "Hello";
    header('Location: repositories.php');
}
else{
    $error = 1;
}
}


?>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            body{
                background-image: url('images/pattern.jpg');
                background-repeat: no-repeat;
                background-size: cover
            }
        </style>
    </head>
    <body class="body">
        <!-- Main Navbar -->
        <nav class="blue-grey darken-1">
            <div class="nav-wrapper">
              <a href="#" class="brand-logo center">Yet Another Git - YAG</a>
            </div>
          </nav><br>
        <!-- Main Navbar Ends -->

        <div class="row">
            <div class="col l3"></div>
            <div class="col l6 m12 s12">
                <div class="card-panel hoverable" style="margin:auto">
                    <h3 style="color: #009688;font-weight: 300;text-align: center">Login</h3>
                    <form action="" method="post">
                        <div class="input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="username" type="text" name="username">
                            <label for="username">Username</label>
                            <?php
                                if($error)
                                 echo '<span class="helper-text">Error Message Goes Here</span>';
                            ?>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password">
                            <label for="username">Password</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Login
                            <i class="material-icons right">send</i>
                        </button>          
                    </form>
                </div>
            </div>
            <div class="col l3"></div>
        </div>
        
            
        


            <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
</html>