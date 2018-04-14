<?php
 session_start();
 if(!isset($_SESSION['idAutista']))
  header('Location: index.html');
?>
<!DOCTYPE html>
<html>
  <head>
     <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <style>
              /* Fixed sidenav, full height */
        .sidenav {
          height: 100%;
          width: 200px;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #111;
          overflow-x: hidden;
          padding-top: 20px;
        }
        html,body{height: 100%;}
        body{background: #eee;}  
        /* Style the sidenav links and the dropdown button */
        .sidenav a, .dropdown-btn {
          padding: 6px 8px 6px 16px;
          text-decoration: none;
          font-size: 20px;
          color: #818181;
          display: block;
          border: none;
          background: none;
          width:100%;
          text-align: left;
          cursor: pointer;
          outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover, .dropdown-btn:hover {
          color: #f1f1f1;
        }

        /* Main content */
        .main {
          margin-left: 200px; /* Same as the width of the sidenav */
          font-size: 20px; /* Increased text to enable scrolling */
          padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
          background-color: green;
          color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
          display: none;
          background-color: #262626;
          padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .googleIcon {
          float: right;
          padding-right: 8px;
        }
      #navBarAutista
      {
         width: 100%; 
         margin-top:8px; 
      
      }
       
    </style>
  </head>
  
  <body>
  
    <div class="sidenav">
      <a href="dashboardAutista.php"><i class="fa fa-dashboard" style="font-size:20px"></i> Dashboard </a>
      <a href="aggiungiViaggio.php"><i class="fa fa-send-o" style="font-size:20px"></i> Viaggio <i class="material-icons googleIcon" style="font-size:25px">add_circle</i></a>
      <a href="aggiungiAuto.php"><i class="fa fa-car" style="font-size:18px"></i> Auto <i class="material-icons googleIcon" style="font-size:25px">add_circle</i></a>
      <a href="prenotazioni.php"><i class="fa fa-handshake-o" style="font-size:18px"></i> Prenotazioni</a>
      <button class="dropdown-btn"><i class="fa fa-cog" style="font-size:20px"></i> Opzioni 
        <span class="glyphicon glyphicon-triangle-bottom googleIcon"></span>
      </button>
      <div class="dropdown-container">
        <a href="#"><i class="fa fa-user"></i> Username</a>
        <a href="#"><i class="fa fa-lock" style="font-size:24px"></i> Password</a>
        <a href="#"><i class="fa fa-image" style="font-size:18px"></i> Foto</a>
      </div>
      <a href="signout.php"><i class="fa fa-sign-out" style="font-size:20px"></i> Logout</a>
    </div>
    
    <?php
       function ricava_NomeAutista($idAutista) {
       include  'conn.inc.php';
       $nome;
       $dbh = new PDO($conn,$user,$pass);
       $stm = $dbh->prepare("SELECT * FROM autista WHERE idAutista=:id ");
       $stm->bindValue(":id",$idAutista);
       $stm->execute();
       if($stm->rowCount()>0)
       {
          $row=$stm->fetch();
          $nome=$row["nomeAutista"];
       }
       return $nome;
     }

     function ricava_CognomeAutista($idAutista) {
       include  'conn.inc.php';
       $cognome;
       $dbh = new PDO($conn,$user,$pass);
       $stm = $dbh->prepare("SELECT * FROM autista WHERE idAutista=:id");
       $stm->bindValue(":id",$idAutista);
       $stm->execute();
       if($stm->rowCount()>0)
       {
          $row=$stm->fetch();
          $cognome=$row["cognomeAutista"];
       }
       return $cognome;
     }
    ?>

      <div class="main">
        <div id="navBarAutista">
          <div class="panel panel-default">
            <div class="panel-heading" id="panelHeading" style="background-color: darkgrey;"><center><h3 id="titolo" style="color: white;"><b><i class="fa fa-user" style="font-size:25px; color: white; padding-top: 5px;"></i> <?php echo ricava_NomeAutista($_SESSION["idAutista"]) . " " . ricava_CognomeAutista($_SESSION["idAutista"]) ?></b></h3></center></div>
          </div>
        </div>
        
        <!-- pannello auto -->
        <div class="container" style="float:left; width:700px; margin: 50px;">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id="panelHeading" style="background-color: darkred;"><center><h3 id="titolo" style="color: white;"><b> Auto</b></h3></div>
              <div class="panel-body" id="panelBody">
                <?php
                 include  'conn.inc.php';
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT * FROM auto WHERE idAutista=:id");
                 $stm->bindValue(":id",$_SESSION['idAutista']);
                 $stm->execute();
                 if($stm->rowCount()>0)
                 {
                   $stm->setFetchMode(PDO::FETCH_ASSOC);
                   $iterator = new IteratorIterator($stm);
                   foreach($iterator as $row)
                   {
                    echo 
                      " <center><div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: lightcoral; color:white;'><center><i class='fa fa-car' style='font-size:25px; color: white; padding-top: 5px;'></i> <label>" . $row["targa"] . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                                  <div><b>Marca:</b> " . $row["marca"] . "</div>
                             
                                  <div><b>Modello:</b> " . $row["modello"] . "</div>
                              
                                  <div><b>Cilindrata:</b> " . $row["cilindrata"] . "</div>
                               
                                  <div><b>Potenza:</b> " . $row["potenza"] . "</div>
                                  
                             </div>
                           </div>
                         </div></center>
                       ";
                   }
                 }
                ?>
            </div>
          </div>
        </div>
        
        
           
           
        <!-- pannello viaggi -->
         <div class="container" style="float:right; width:700px; margin: 50px;">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id = "panelHeading" style="background-color: lightseagreen;"><center><h3 id="titolo" style="color: white;"><b> Viaggi</b></h3></div>
            <div class="panel-body" id = "panelBody">
               <?php
                 include  'conn.inc.php';
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT * FROM viaggio WHERE idAutista=:id");
                 $stm->bindValue(":id",$_SESSION['idAutista']);
                 $stm->execute();
                 if($stm->rowCount()>0)
                 {
                  
                   $stm->setFetchMode(PDO::FETCH_ASSOC);
                   $iterator = new IteratorIterator($stm);
                   foreach($iterator as $row)
                   {
                      $animali;
                      $bagagli;
                      if($row["bagagli"] == 0){
                        $bagagli = "Si";
                      }
                      else{
                        $bagagli = "No";
                      }
                      if($row["animali"] == 0){
                        $animali = "Si";
                      }
                      else{
                        $animali = "No";
                      }
                    echo 
                      " <center><div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: darkcyan; color:white;'><center><i class='fa fa-send-o' style='font-size:25px; color: white; padding-top: 5px;'></i> <label>" . $row["data"] . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                                  <div><b>Ora partenza:</b> " . $row["oraPartenza"] . "</div>
                             
                                  <div><b>Ora arrivo:</b> " . $row["oraArrivo"] . "</div>
                              
                                  <div><b>Importo:</b> " . $row["importo"] . " euro</div>
                               
                                  <div><b>Durata:</b> " . $row["durata"] . "</div>
                                  
                                  <div><b>Animali:</b> " . $animali. "</div>
                                   
                                  <div><b>Bagagli:</b> " . $bagagli . "</div>
                                  
                                  <div><b>Posti disponibili:</b> " . $row["disponibile"] . "</div>
                                  
                             </div>
                           </div>
                         </div></center>
                       ";
                   }
                 }
                ?>
            </div>
           </div>
        </div>
       
      </div>


    <script>
      /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
      var dropdown = document.getElementsByClassName("dropdown-btn");
      var i;

      for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var dropdownContent = this.nextElementSibling;
          if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
          } else {
            dropdownContent.style.display = "block";
          }
        });
      }
</script>
    
  </body>
</html>