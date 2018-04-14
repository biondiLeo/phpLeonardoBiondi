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
      
      <script> 
        function validateForm() {
            var nome = document.forms["form"]["nome"].value;
            var cognome = document.forms["form"]["cognome"].value;
            var password = document.forms["form"]["password"].value;
            var confermaPassword = document.forms["form"]["confermaPassword"].value;
            var email = document.forms["form"]["email"].value;
            var dataNascita = document.forms["form"]["dataNascita"].value;
            var telefono = document.forms["form"]["telefono"].value;
            var numeroPatente = document.forms["form"]["numeroPatente"].value;
            var scadenzaPatente = document.forms["form"]["scadenzaPatente"].value;
            var userName = document.forms["form"]["userName"].value;
           // var controlloData = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
          
          //var mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          
            if (cognome == "" || cognome == "undefined") {
                alert("Campo cognome obbligatorio");
                return false;
            }
            if (nome == "" || nome == "undefined") {
                alert("Campo nome obbligatorio");
                return false;
            }
            if (dataNascita == "" || dataNascita == "undefined") {
                alert("Campo data di nascita obbligatorio");
                return false;
            }
            if (telefono == "" || telefono == "undefined") {
                alert("Campo telefono obbligatorio");
                return false;
            }
            if (email == "" || email == "undefined") {
                alert("Campo email obbligatorio");
                return false;
            }
           if (numeroPatente == "" || numeroPatente == "undefined") {
                alert("Campo numero patente obbligatorio");
                return false;
            }
           if (scadenzaPatente == "" || scadenzaPatente == "undefined") {
                alert("Campo scadenza patente obbligatorio");
                return false;
            }
           if (userName == "" || userName == "undefined") {
                alert("Campo username obbligatorio");
                return false;
            }
            if (password == "" || password == "undefined") {
                alert("Password obbligatoria");
                return false;
            }
            if (confermaPassword == "" || confermaPassword == "undefined") {
                alert("Conferma la tua password");
                return false;
            }
            if (password != confermaPassword) {
                confermaPassword = "";
                alert("Le password non coincidono");
                return false;
            }
          }
        
      </script>
      <style>
          
      html,body{height: 100%;}
      body{background: #eee;}  

      
        /*
        div.message.info{
        background: #EAEBF7 url(info20.png) no-repeat 15px 50%;
        border-color: #8E9AFF}

        div.message.warning{
        background: #FFF0BA url(warning20.png) no-repeat 15px 50%;
        border-color: #E87C29}

        div.message.question{
        background: #E4F6DE url(help20.png) no-repeat 15px 50%;
        border-color: #8FDC79}

        div.message.error{
        background: #FFD8D6 url(error20.png) no-repeat 15px 50%;
        border-color: #FF0038}
        */
        
        #panelHeading{
          background-color: lightseagreen;
        }
        #panelFooter{
          background-color: lightseagreen;
        }
        #titolo{
          color: white;
        }
      .row{
          margin-left: 8%;
       }
      .formStyle {
        height: 32px;
        padding: 6px 12px;
        color: #333333;
        border-radius: 0;
       }

       #pannello{
          width: 550px;
       }
       #btnAnnulla{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 89px;
          color: white;
          background-color: #9E9C9C;
        }
        #btnConferma{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 104px;
          color: white;
          background-color: teal;
        }
       
        
        .marginButtonRadio{
          margin-top: 7px;
        }
        #Contenitore{
          margin: 40px;
        }
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
       
    </style>
  </head>
  <body>
     <?php
      if(isset($_POST["bottoneConferma"]))
      {
        header("location: riepilogoDati.php");
      }
     ?>
    
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
    
    
    <div class="main">
 
      
         <div class="container" style="width:700px; margin: 50px;">
          <div class="panel panel-default" id="pannello" style="margin-left: 75%;">
            <div class="panel-heading" id="panelHeading" style="background-color: lightseagreen;;"><center><h3 id="titolo" style="color: white;"><b> Viaggi disponibili</b></h3></center></div>
              <div class="panel-body" id="panelBody">
         
                <?php
                 include  'conn.inc.php';
                 $idPasseggero = $_SESSION['idPasseggero'];
                 $dataPrenotazione = date("Y/m/d");
                 $stato=false;
                 $dbh = new PDO($conn,$user,$pass);
                 $stm = $dbh->prepare("SELECT * FROM viaggio");
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
                     
                     $posti = $row["disponibile"];
                     $idModaleInfo = "modaleInfo" . $row["idViaggio"];
                     $idModalePrenota = "modalePrenota" . $row["idViaggio"];
                     $btnPrenota = "btnPrenota" . $row["idViaggio"];
                     if($posti > 0)
                     {
                        echo 
                      " <center>
                        <div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: cadetblue; color:white;'><center><i class='fa fa-send' style='font-size:25px; color: white; padding-top: 5px;'></i> <label> Data: " . $row["data"] . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                          
                                  <div><b>Partenza - destinazione:</b> " . $row["partenza"] . " - " . $row["destinazione"] . "</div>
              
                                  <div><b>Autista:</b> " . ricava_NomeAutista($row["idAutista"]) . " " . ricava_CognomeAutista($row["idAutista"]) ."</div>
                             </div>
                             <hr>
                             <div style='float:right;'>
                               <button type='button' class='btn btn-info button' data-toggle='modal' data-target='#$idModaleInfo'> <i class='fa fa-info-circle' style='font-size:18px;'></i> INFO</button>
                               <button type='button' class='btn btn-warning button' data-toggle='modal' data-target='#$idModalePrenota' >PRENOTA </button>
                             </div>
                             <div style='float:left;'>
                               <button type='button' class='btn btn-danger button' data-toggle='modal' data-target='#' >Esamina Feedback </button>
                             </div>
                           </div>
                         </div>
                         </center>
                         
                         <div class='modal fade' id='$idModaleInfo' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header' style='background-color: deepskyblue;'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title' style='color:white'><b>Info viaggio</b></h3></center>
                                </div>
                                <div class='modal-body'>
                                  <div style='margin-left: 55px; text-align: left;'>
                                  
                                    <div><b>Data:</b> " . $row["data"] . "</div>
                                    
                                    <div><b>Posti disponibili:</b> " . $row["disponibile"] . "</div>
                          
                                    <div><b>Partenza:</b> " . $row["partenza"] . "</div>
                                    
                                    <div><b>Destinazione:</b> " . $row["destinazione"] . "</div>
                                    
                                    <div><b>Importo:</b> " . $row["importo"] ." euro</div>
                                    
                                    <div><b>Ora partenza:</b> " . $row["oraPartenza"] . " </div>
                                    
                                    <div><b>Ora arrivo:</b> " . $row["oraArrivo"] . " </div>
                                    
                                    <div><b>Durata:</b> " . $row["durata"] . " </div>
                                    
                                    <div><b>Bagagli:</b> " . $bagagli . "</div>
                                    
                                    <div><b>Animali:</b> " . $animali . "</div>

                                    <div><b>Autista:</b> " . ricava_NomeAutista($row["idAutista"]) . " " . ricava_CognomeAutista($row["idAutista"]) ."</div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          
                          <div class='modal fade' id='$idModalePrenota' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title'><b>Prenota viaggio</b></h3></center>
                                </div>
                                <div class='modal-body'> 
                                
                                  <form method='post' action='' name='formPrenotazione'>
                                    <div style='margin-left: 55px;'>
                                      <b>Prenotazione per il viaggio:</b> " . $row["partenza"] . " - " . $row["destinazione"] ."<br>
                                      <b>Data del viaggio:</b> " . $row["data"] . "
                                    
                                    </div>
                                    <hr>
                                    <center>
                                    <div> 
                                      <a type='button' href='aggiungiPrenotazione.php' class='btn btn-default button'>Annulla</a>
                                    
                                     <button type='submit' class='btn btn-success button' name='$btnPrenota'> Prenota</button>
                                
                                    </div>
                                    </center>
                                  </form>
                                  
                                </div>
                              </div>
                            </div>
                          </div>  
                       ";
                   
                         if (isset($_POST["$btnPrenota"]))
                         {
                           prenotazione($row['idViaggio'], $row['idAutista'], $dataPrenotazione, $stato);
                         }
                     }
                     else
                     {
                        echo 
                      " <center>
                        <div class='panel panel-default' style='width:500px;'>
                          <div class='panel-heading' style='background-color: cadetblue; color:white;'><center><i class='fa fa-send' style='font-size:25px; color: white; padding-top: 5px;'></i> <label> Data: " . $row["data"] . "</label></center></div> 
                          <div class='panel-body'>
                              <div style='margin-left: 55px; text-align: left;'>
                          
                                  <div><b>Partenza - destinazione:</b> " . $row["partenza"] . " - " . $row["destinazione"] . "</div>
              
                                  <div><b>Autista:</b> " . ricava_NomeAutista($row["idAutista"]) . " " . ricava_CognomeAutista($row["idAutista"]) ."</div>
                             </div>
                             <hr>
                             <div style='float:right;'>
                               <button type='button' class='btn btn-info button' data-toggle='modal' data-target='#$idModaleInfo'> <i class='fa fa-info-circle' style='font-size:18px;'></i> INFO</button>
                              
                             </div>
                             <div style='float:left;'>
                               <button type='button' class='btn btn-danger button' data-toggle='modal' data-target='#' >Esamina Feedback </button>
                             </div>
                           </div>
                         </div>
                         </center>
                         
                         <div class='modal fade' id='$idModaleInfo' role='dialog'>
                           <div class='modal-dialog'>
                              <div class='modal-content'>
                                <div id='modalHeader' class='modal-header' style='background-color: deepskyblue;'>
                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                  <center><h3 class='modal-title' style='color:white'><b>Info viaggio</b></h3></center>
                                </div>
                                <div class='modal-body'>
                                  <div style='margin-left: 55px; text-align: left;'>
                                  
                                    <div><b>Data:</b> " . $row["data"] . "</div>
                                    
                                    <div><b>Posti disponibili:</b> " . $row["disponibile"] . "</div>
                          
                                    <div><b>Partenza:</b> " . $row["partenza"] . "</div>
                                    
                                    <div><b>Destinazione:</b> " . $row["destinazione"] . "</div>
                                    
                                    <div><b>Importo:</b> " . $row["importo"] ." euro</div>
                                    
                                    <div><b>Ora partenza:</b> " . $row["oraPartenza"] . " </div>
                                    
                                    <div><b>Ora arrivo:</b> " . $row["oraArrivo"] . " </div>
                                    
                                    <div><b>Durata:</b> " . $row["durata"] . " </div>
                                    
                                    <div><b>Bagagli:</b> " . $bagagli . "</div>
                                    
                                    <div><b>Animali:</b> " . $animali . "</div>

                                    <div><b>Autista:</b> " . ricava_NomeAutista($row["idAutista"]) . " " . ricava_CognomeAutista($row["idAutista"]) ."</div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          
                        
                       ";
                   
                         if (isset($_POST["$btnPrenota"]))
                         {
                           prenotazione($row['idViaggio'], $row['idAutista'], $dataPrenotazione, $stato);
                         }
                     }
                    
                   }
                   
                   
                 }
               
                    function prenotazione($idViaggio, $idAutista, $data, $stato)
                    {
                        include  'conn.inc.php';
                        try
                        {
                           $dbh = new PDO($conn,$user,$pass);
                           $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                           $query = $dbh->prepare("INSERT INTO prenotazione(idPasseggero, idViaggio, idAutista, data, stato) VALUES(:idPasseggero, :idViaggio, :idAutista, :data, :stato)");

                           $query->bindValue(":idPasseggero",$_SESSION['idPasseggero']);
                           $query->bindValue(":idViaggio",$idViaggio);
                           $query->bindValue(":idAutista",$idAutista);
                           $query->bindValue(":data",$data);
                           $query->bindValue(":stato",$stato);
                           $query->execute();

                        }
                        catch(PDOException $e)
                        {
                          echo 'Connection failed:' . $e->getMessage();
                        }
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