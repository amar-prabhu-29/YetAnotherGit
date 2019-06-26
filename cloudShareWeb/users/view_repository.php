<?php
    session_start();
    include 'connection.php';
    if(isset($_GET['repo'])){
        $id = $_GET['repo'];
    }
    $query = "SELECT * FROM versions WHERE repository=$id ORDER BY id ASC";
    $result = mysqli_query($connection,$query);
    $versions =  mysqli_num_rows($result);

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
        <script>
            function display(){
                hide();
                let version = document.getElementById("version").value;
                document.getElementById(version).style.display = "block";
            }
            function hide(){
                const vers = <?php echo $versions; ?>;
                for(let i=1;i<=vers;i++){
                    document.getElementById(i).style.display = "none";
                }
            }
        </script>
    </head>
    <body onload="display()"> 
        <header>
          <nav class="top-nav blue-grey darken-1">
                <div class="container">
                    <div class="nav-wrapper">
                        <a class="brand-logo">My Repositories</a>
                        <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a>
                    </div>
                </div>
            </nav>


            <div class="side-nav fixed" id="nav-mobile">
                <div class="logo center" style="max-height:200px"></div>
                    <ul style="margin-top:0px">
                    <li class="bold wave-effects wave-teal center"><h5>Main Menu</h5></li>
                      <li class="bold"><a class="waves-effect waves-teal" href="repositories.php">My Repositories</a></li>
                      <li class="bold"><a class="waves-effect waves-teal modal-trigger" href="logout.php">Logout</a></li>
                    </ul>
              </div>

              
        </header>   

        <main>
            <br>
        <div class="row">
        <div class="input-field col l4">
    <select onchange="display()" id="version">
      <?php
        for($i=1;$i<=$versions;$i++){
            if($i==$versions){
                echo '<option value="'.$i.'" selected>Version '.$i.'</option>';
            }
            else{
                echo '<option value="'.$i.'">Version '.$i.'</option>';
            }
        }
        ?>
    </select>
    <label>Select Version</label>
  </div>
    </div>
  <?php
  $i=1;
  while($row = mysqli_fetch_assoc($result)){
      echo '<div id="'.$i++.'" style="display:none">';
      $query = "SELECT * FROM files WHERE version=$row[id]";
      $files = mysqli_query($connection,$query);
      echo'
      <table class="highlight">
      <thead>
        <tr>
            <th>File Name</th>
            <th>File Key</th>
            <th>Comment</th>
            <th>Download</th>
        </tr>
      </thead>

      <tbody>';
      foreach($files as $file){
          echo '<tr><td>'.$file['name'].'</td><td>'.$file['filekey'].'</td><td>'.$file['message'].'</td><td><a href="download.php?file='.$file['id'].'&actual='.$file['name'].'" class="btn">Download</a></td></tr>';
      }
      echo '
      </tbody>
    </table>

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
        $(document).ready(function() {
    $('select').material_select();
  });
        
      </script>
      
    </body>
</html>