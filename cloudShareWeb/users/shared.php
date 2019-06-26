<?php
session_start();
include 'connection.php';
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    $query = "SELECT * FROM `repositories` WHERE user='$user'";
    $result = mysqli_query($connection,$query);
}
else{
  header('Location: index.php');
}
?>
<html>
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Yet Another Git</title>
        <style>
            body{
                background-image: url('background.jpg');
            }
            main,header{
            padding-left:300px;
          } 
          .input-field label {
            color: #ee6e73;
          }
          .input-field input:focus + label {
            color: #ee6e73 !important;
          }
          .input-field input:focus {
            border-bottom: 1px solid #ee6e73 !important;
            box-shadow: 0 1px 0 0 #ee6e73 !important;
          }
          .input-field .prefix.active {
            color: #ee6e73;
          }
        @media only screen and (max-width: 768px){
           main,header{
            padding-left:0px;
        } 
        } 
        </style>
    </head>
    <body> 
        <header>
          <nav class="top-nav blue-grey darken-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a class="brand-logo">Shared Repositories</a>
                        <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>


            <div class="side-nav fixed" id="nav-mobile">
                <div class="logo center" style="max-height:200px"></div>
                    <ul style="margin-top:0px">
                    <li class="bold wave-effects wave-teal center"><h5>Main Menu</h5></li>
                      <li class="bold"><a href="repositories.php" class="waves-effect waves-teal">My Repositories</a></li>
                      <li class="bold active"><a href="shared.php" class="waves-effect waves-teal">Shared With Me</a></li>
                      <li class="bold"><a class="waves-effect waves-teal modal-trigger" href="logout.php">Logout</a></li>
                    </ul>
              </div>

              
        </header>   

        <main>
        <div class="row">
            <?php

              $query = "SELECT * FROM share WHERE user='$user'";
              $shares = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($shares)){
                $query = "SELECT * FROM `repositories` WHERE id=$row[repository]";
                $result = mysqli_query($connection,$query);
                $details = mysqli_fetch_assoc($result);
                echo'
                    
                    <div class="col s12 m6 l4">
                      <div class="card blue-grey darken-1">
                        <div class="card-content white-text">
                          <span class="card-title">'.$details['name'].'</span>
                          <p>'.$details['description'].'</p>
                          <p>Shared By: '.$details['user'].'</p>
                        </div>
                        <div class="card-action">
                          <a href="view_repository.php?repo='.$details['id'].'">View Repository</a>
                        </div>
                      </div>
                    </div>
                  
                    
                    ';

              }



            ?>
        </main>
 

        </div>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script>
        $(".button-collapse").sideNav();
        $('.modal').modal();  
      </script>
      
    </body>
</html>