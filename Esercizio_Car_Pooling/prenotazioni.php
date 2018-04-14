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
          font-size: 18px; /* Increased text to enable scrolling */
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
      #navBar
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

      <div class="main">
        <div id="navBar">
          <div class="panel panel-default">
            <div class="panel-heading" id="panelHeading" style="background-color: darkgrey;"><center><h3 id="titolo" style="color: white;"><b><i class="fa fa-handshake-o" style="font-size:25px; color: white; padding-top: 5px;"></i> Prenotazioni clienti</b></h3></center></div>
          </div>
        </div>
        
          <!-- pannello prenotazioni da confermare -->
         <div class="container" style="float:left; width:700px; margin: 50px;">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id="panelHeading" style="background-color: darkorange;"><center><h3 id="titolo" style="color: white;"><b> Da confermare</b></h3></div>
            <div class="panel-body" id="panelBody">
               <?php
                 include  'conn.inc.php';
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT * FROM prenotazione WHERE idAutista=:id AND stato=0");
                 $stm->bindValue(":id",$_SESSION['idAutista']);
                 $stm->execute();
                 $count = 0;
                 if($stm->rowCount()>0)
                 {
                   $stm->setFetchMode(PDO::FETCH_ASSOC);
                   $iterator = new IteratorIterator($stm);
                   foreach($iterator as $row)
                   {
            
                     $idPasseggero = $row["idPasseggero"];
                     $idViaggio = $row["idViaggio"];
                     $datiPasseggero = ricava_DatiPasseggero($idPasseggero);
                     $datiViaggio = ricava_DatiViaggio($idViaggio);
                     $idModaleRifiuta = "modaleRifiuta" . $row["idPrenotazione"];
                     $idModaleConferma = "modaleConferma" . $row["idPrenotazione"];
                     $idModaleInfo = "modaleInfo" . $row["idPrenotazione"];
                     $btnConferma = "btnConferma" . $row["idPrenotazione"];
                     $btnRifiuta = "btnRifiuta" . $row["idPrenotazione"];
                     echo 
                      " <center><div id='' class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: orange; color:white;'><center><i class='fa fa-send-o' style='font-size:25px; color: white; padding-top: 5px;'></i> <label> Data prenotazione: " . $row["data"] . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                                  <form method='post' action=''>
                                    <div><b>Passeggero:</b> " . $datiPasseggero[0] . " " . $datiPasseggero[1] . " <button style='float: right;' type='button' class='btn btn-info button' data-toggle='modal' data-target='#$idModaleInfo'><i class='fa fa-info-circle' style='font-size:18px;'></i> INFO</button></div> 
                                    <hr>
                                    <div><b>Data viaggio:</b> " . $datiViaggio[0] . "</div>

                                    <div><b>Partenza - destinazione:</b> " . $datiViaggio[1] . " - " . $datiViaggio[2] . "</div>

                                    <div><b>Posti disponibili:</b> " . $datiViaggio[3] . "</div>
                                    <hr>

                                    <div style='float:right;'>
                                      <button type='button' class='btn btn-danger button' name='$btnRifiuta' data-toggle='modal' data-target='#$idModaleRifiuta'> <i class='fa fa-times-circle' style='font-size:18px;'></i> Rifiuta</button>
                                      <button type='submit' class='btn btn-success button' name='$btnConferma' data-toggle='modal' data-target='#$idModaleConferma' modaleControllo> <i class='fa fa-check-circle' style='font-size:18px;'></i> Conferma</button>
                                    </div>
                                  </form>
                             </div>
                           </div>
                         </div></center>
                         
                         <div class='modal fade' id='$idModaleInfo' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header' style='background-color: deepskyblue;'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title' style='color:white'><b>Info passeggero</b></h3></center>
                                </div>
                                <div class='modal-body'>
                                  <div style='margin-left: 55px; text-align: left;'>
                                  
                                    <div><b>Cognome:</b> " . $datiPasseggero[1] . "</div>
                          
                                    <div><b>Nome:</b> " . $datiPasseggero[0] . "</div>
                                    
                                    <div><b>Data nascita:</b> " . $datiPasseggero[3] . "</div>
                                    
                                    <div><b>Sesso:</b> " . $datiPasseggero[4] . "</div>
                                    
                                    <div><b>Nazionalita:</b> " . $datiPasseggero[2]." </div>
                                    
                                    <div><b>Telefono:</b> " . $datiPasseggero[5] . " </div>
                                    
                                    <div><b>Email:</b> " . $datiPasseggero[6] . " </div>
                               
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          
                          <div class='modal fade' id='$idModaleConferma' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header' style='background-color: green;'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title' style='color:white'><b>Prenotazione confermata</b></h3></center>
                                </div>
                                <div class='modal-body'>
                                  <center><h4 style='color:green;'><b>Conferma avvenuta con successo</b></h4></center>
                                </div>
                              </div>
                            </div>
                          </div>  
                          
                         <div class='modal fade' id='$idModaleRifiuta' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header' style='background-color: red;'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title' style='color:white'><b>Prenotazione rifiutata</b></h3></center>
                                </div>
                                <div class='modal-body'>
                                  <center><h4 style='color:red;'><b>Prenotazione cliente rifiutata</b></h4></center>
                                </div>
                              </div>
                            </div>
                          </div>  
                       ";
                     
                     //fare un hidden form che manda i dati alla pagina statoPrenotzioni.php
                       $datiPasseggero = null;
                       $datiViaggio = null;

                   }
                 }
              
                function ricava_DatiPasseggero($idPasseggero) {
                   include  'conn.inc.php';
                   $arrayPasseggero = null;
                   $dbh = new PDO($conn,$user,$pass);
                   $stm = $dbh->prepare("SELECT * FROM passeggero WHERE idPasseggero=:id ");
                   $stm->bindValue(":id",$idPasseggero);
                   $stm->execute();
                   if($stm->rowCount()>0)
                   {
                      $row=$stm->fetch();
                      $arrayPasseggero =  array($row["nomePasseggero"],$row["cognomePasseggero"],$row["nazionalita"],$row["dataNascita"],$row["sesso"],$row["telefono"],$row["email"]);
                   }
                   return $arrayPasseggero;
                 }
              
                function ricava_DatiViaggio($idViaggio) {
                   include  'conn.inc.php';
                   $arrayViaggio = null;
                   $dbh = new PDO($conn,$user,$pass);
                   $stm = $dbh->prepare("SELECT * FROM viaggio WHERE idViaggio=:id");
                   $stm->bindValue(":id",$idViaggio);
                   $stm->execute();
                   if($stm->rowCount()>0)
                   {
                      $row=$stm->fetch();
                      $arrayViaggio= array($row["data"],$row["partenza"],$row["destinazione"],$row["disponibile"]);
                   }
                   return $arrayViaggio;
                 }
                ?>
            </div>
           </div>
        </div>
           
           
           <!-- pannello prenotazioni confermate -->
         <div class="container" style="float:left; width:700px; margin: 50px;">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id = "panelHeading" style="background-color: darkgreen;"><center><h3 id="titolo" style="color: white;"><b> Confermate</b></h3></div>
            <div class="panel-body" id = "panelBody">
               <?php
                 include  'conn.inc.php';
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT * FROM prenotazione WHERE idAutista=:id AND stato=1");
                 $stm->bindValue(":id",$_SESSION['idAutista']);
                 $stm->execute();
                 if($stm->rowCount()>0)
                 {
                   $stm->setFetchMode(PDO::FETCH_ASSOC);
                   $iterator = new IteratorIterator($stm);
                   foreach($iterator as $row)
                   {
                     
                     $idPasseggero = $row["idPasseggero"];
                     $idViaggio = $row["idViaggio"];
                     $datiPasseggero2 = ricava_DatiPasseggero2($idPasseggero);
                     $datiViaggio2 = ricava_DatiViaggio2($idViaggio);
                     $idModaleInfo = "modaleInfo" . $row["idPrenotazione"];
                    echo 
                      " <center><div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: green; color:white;'><center><i class='fa fa-send-o' style='font-size:25px; color: white; padding-top: 5px;'></i> <label> Data prenotazione: " . $row["data"] . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                                  <form method='post' action=''>
                                    <div><b>Passeggero:</b> " . $datiPasseggero2[0] . " " . $datiPasseggero2[1] . " <button style='margin-left:140px;' type='button' class='btn btn-info button' data-toggle='modal' data-target='#$idModaleInfo'> <i class='fa fa-info-circle' style='font-size:18px;'></i> INFO</button></div> 
                                    <hr>
                                    <div><b>Data viaggio:</b> " . $datiViaggio2[0] . "</div>

                                    <div><b>Partenza - destinazione:</b> " . $datiViaggio2[1] . " - " . $datiViaggio2[2] . "</div>

                                    <div><b>Posti disponibili:</b> " . $datiViaggio2[3] . "</div>
                                    
                                  </form>
                             </div>
                           </div>
                         </div></center>
                         
                         <div class='modal fade' id='$idModaleInfo' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header' style='background-color: deepskyblue;'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title' style='color:white'><b>Info passeggero</b></h3></center>
                                </div>
                                <div class='modal-body'>
                                  <div style='margin-left: 55px; text-align: left;'>
                                  
                                    <div><b>Cognome:</b> " . $datiPasseggero2[1] . "</div>
                          
                                    <div><b>Nome:</b> " . $datiPasseggero2[0] . "</div>
                                    
                                    <div><b>Data nascita:</b> " . $datiPasseggero2[3] . "</div>
                                    
                                    <div><b>Sesso:</b> " . $datiPasseggero2[4] . "</div>
                                    
                                    <div><b>Nazionalita:</b> " . $datiPasseggero2[2]." </div>
                                    
                                    <div><b>Telefono:</b> " . $datiPasseggero2[5] . " </div>
                                    
                                    <div><b>Email:</b> " . $datiPasseggero2[6] . " </div>
                               
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          
                         
                       ";
                     
                   }
                 }
              
                function ricava_DatiPasseggero2($idPasseggero) {
                   include  'conn.inc.php';
                   $arrayPasseggero;
                   $dbh = new PDO($conn,$user,$pass);
                   $stm = $dbh->prepare("SELECT * FROM passeggero WHERE idPasseggero=:id ");
                   $stm->bindValue(":id",$idPasseggero);
                   $stm->execute();
                   if($stm->rowCount()>0)
                   {
                      $row=$stm->fetch();
                      $arrayPasseggero = array($row["nomePasseggero"],$row["cognomePasseggero"],$row["nazionalita"],$row["dataNascita"],$row["sesso"],$row["telefono"],$row["email"]);
                   }
                   return $arrayPasseggero;
                 }
              
                function ricava_DatiViaggio2($idViaggio) {
                   include  'conn.inc.php';
                   $arrayViaggio;
                   $dbh = new PDO($conn,$user,$pass);
                   $stm = $dbh->prepare("SELECT * FROM viaggio WHERE idViaggio=:id ");
                   $stm->bindValue(":id",$idViaggio);
                   $stm->execute();
                   if($stm->rowCount()>0)
                   {
                      $row=$stm->fetch();
                      $arrayViaggio= array($row["data"],$row["partenza"],$row["destinazione"],$row["disponibile"]);
                   }
                   return $arrayViaggio;
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