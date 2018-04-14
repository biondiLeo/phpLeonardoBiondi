<?php
 session_start();
 if(!isset($_SESSION['idPasseggero']))
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
          /* Increased text to enable scrolling */
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
      <a href="dashboardPasseggero.php"><i class="fa fa-dashboard" style="font-size:20px"></i> Dashboard </a>
      <a href="aggiungiPrenotazione.php"><i class="fa fa-calendar" style="font-size:20px"></i> Prenota  <i class="material-icons googleIcon" style="font-size:25px">add_circle</i></a>
      <button class="dropdown-btn"><i class="fa fa-cog" style="font-size:20px"></i> Opzioni 
        <span class="glyphicon glyphicon-triangle-bottom googleIcon"></span>
      </button>
      <div class="dropdown-container">
        <a href="#"><i class="fa fa-user"></i> Username</a>
        <a href="#"><i class="fa fa-lock" style="font-size:24px"></i> Password</a>
      </div>
      <a href="signout.php"><i class="fa fa-sign-out" style="font-size:20px"></i> Logout</a>
    </div>

    <?php
     function ricava_DatiPasseggero() {
     include  'conn.inc.php';
     $arrayPass = null;
     $dbh = new PDO($conn,$user,$pass);
     $stm = $dbh->prepare("SELECT * FROM passeggero WHERE idPasseggero=:id");
     $stm->bindValue(":id",$_SESSION['idPasseggero']);
     $stm->execute();
     if($stm->rowCount()>0)
     {
        $row=$stm->fetch();
        $arrayPass= array($row["nomePasseggero"],$row["cognomePasseggero"]);
     }
     return $arrayPass;
   }
    ?>
      <div class="main">
        <div id="navBarAutista">
          <div class="panel panel-default">
            <div class="panel-heading" id="panelHeading" style="background-color: darkgrey;"><center><h3 id="titolo" style="color: white;"><b><i class="fa fa-user" style="font-size:25px; color: white; padding-top: 5px;"></i> 
              <?php 
              
              $arrPass = ricava_DatiPasseggero(); 
              echo $arrPass[0] . " " . $arrPass[1]; 
              ?></b></h3></center></div>
          </div>
        </div>
        
        
        <!-- pannello prenotazioni in attesa-->
       
         <div class="container" style="width:700px; margin: 50px; float:left;">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id = "panelHeading" style="background-color: orange;"><center><h3 id="titolo" style="color: white;"><b> Prenotazioni in attesa di conferma</b></h3></div>
            <div class="panel-body" id = "panelBody">
               <?php
                 include 'conn.inc.php';
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT viaggio.* FROM viaggio INNER JOIN prenotazione ON viaggio.idViaggio = prenotazione.idViaggio INNER JOIN passeggero ON prenotazione.idPasseggero = passeggero.idPasseggero WHERE passeggero.idPasseggero = :idPasseggero AND prenotazione.stato= 0");
                 $stm->bindValue(":idPasseggero",$_SESSION['idPasseggero']);
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
                      " <center>
                        <div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: coral; color:white;'><center><i class='fa fa-send' style='font-size:25px; color: white; padding-top: 5px;'></i> <label> Data di prenotazione: " . ricava_DataPrenotazione($_SESSION['idPasseggero']) . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                          
                                  <div><b>Data viaggio:</b> " . $row["data"] . "</div>
                                  
                                  <div><b>Partenza - destinazione:</b> " . $row["partenza"] . " - " . $row["destinazione"] . "</div>
                                  
                                  <div><b>Importo:</b> " . $row["importo"] . "</div>
                                  
                                  <div><b>Ora partenza:</b> " . $row["oraPartenza"] . "</div>
                                  
                                  <div><b>Ora arrivo:</b> " . $row["oraArrivo"] . "</div>
                                  
                                  <div><b>Durata:</b> " . $row["durata"] . "</div>
                                  
                                  <div><b>Bagagli:</b> " . $bagagli . "</div>
                                  
                                  <div><b>Animali:</b> " . $animali . "</div>
                                  
                                  <div><b>Posti disponibili:</b> " . $row["disponibile"] . "</div>
              
                                  <div><b>Autista:</b> " . ricava_NomeAutista($row["idAutista"]) . " " . ricava_CognomeAutista($row["idAutista"]) ."</div>
                             </div>
                             <hr>
                             <center>
                              <div>
                               <button type='button' class='btn btn-danger button' data-toggle='modal' data-target='#modalPrenota' >Esamina Feedback </button>
                             </div>
                             </center>
                            
                           </div>
                         </div>
                         </center>";
                   }
                 }
                 
               
                function ricava_DataPrenotazione($idPasseggero) {
                   include  'conn.inc.php';
                   $dataPrenotazione;
                   $dbh = new PDO($conn,$user,$pass);
                   $stm = $dbh->prepare("SELECT * FROM prenotazione WHERE idPasseggero=:id ");
                   $stm->bindValue(":id",$idPasseggero);
                   $stm->execute();
                   if($stm->rowCount()>0)
                   {
                      $row=$stm->fetch();
                      $dataPrenotazione=$row["data"];
                   }
                   return $dataPrenotazione;
                 }
              
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
            </div>
           </div>
           </div>
           
          <!-- pannello prenotazioni attive -->
       
         <div class="container" style="width:700px; margin: 50px; float:right;">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id ="panelHeading" style="background-color: darkgreen;"><center><h3 id="titolo" style="color: white;"><b> Prenotazioni confermate</b></h3></div>
            <div class="panel-body" id = "panelBody">
                <?php
                 include 'conn.inc.php';
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT viaggio.* FROM viaggio INNER JOIN prenotazione ON viaggio.idViaggio = prenotazione.idViaggio INNER JOIN passeggero ON prenotazione.idPasseggero = passeggero.idPasseggero WHERE passeggero.idPasseggero = :idPasseggero AND prenotazione.stato= 1");
                 $stm->bindValue(":idPasseggero",$_SESSION['idPasseggero']);
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
                      " <center>
                        <div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: green; color:white;'><center><i class='fa fa-send' style='font-size:25px; color: white; padding-top: 5px;'></i> <label> Data di prenotazione: " . ricava_DataPrenotazione2($_SESSION['idPasseggero']) . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                          
                                  <div><b>Data viaggio:</b> " . $row["data"] . "</div>
                                  
                                  <div><b>Partenza - destinazione:</b> " . $row["partenza"] . " - " . $row["destinazione"] . "</div>
                                  
                                  <div><b>Importo:</b> " . $row["importo"] . "</div>
                                  
                                  <div><b>Ora partenza:</b> " . $row["oraPartenza"] . "</div>
                                  
                                  <div><b>Ora arrivo:</b> " . $row["oraArrivo"] . "</div>
                                  
                                  <div><b>Durata:</b> " . $row["durata"] . "</div>
                                  
                                  <div><b>Bagagli:</b> " . $bagagli . "</div>
                                  
                                  <div><b>Animali:</b> " . $animali . "</div>
                                  
                                  <div><b>Posti disponibili:</b> " . $row["disponibile"] . "</div>
              
                                  <div><b>Autista:</b> " . ricava_NomeAutista2($row["idAutista"]) . " " . ricava_CognomeAutista2($row["idAutista"]) ."</div>
                             </div>
                             <hr>
                             <center>
                              <div>
                               <button type='button' class='btn btn-danger button' data-toggle='modal' data-target='#modalPrenota' >Esamina Feedback </button>
                             </div>
                             </center>
                            
                           </div>
                         </div>
                         </center>";
                   }
                 }
                 
               
                function ricava_DataPrenotazione2($idPasseggero) {
                   include  'conn.inc.php';
                   $dataPrenotazione;
                   $dbh = new PDO($conn,$user,$pass);
                   $stm = $dbh->prepare("SELECT * FROM prenotazione WHERE idPasseggero=:id ");
                   $stm->bindValue(":id",$idPasseggero);
                   $stm->execute();
                   if($stm->rowCount()>0)
                   {
                      $row=$stm->fetch();
                      $dataPrenotazione=$row["data"];
                   }
                   return $dataPrenotazione;
                 }
              
                function ricava_NomeAutista2($idAutista) {
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
                
                 function ricava_CognomeAutista2($idAutista) {
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