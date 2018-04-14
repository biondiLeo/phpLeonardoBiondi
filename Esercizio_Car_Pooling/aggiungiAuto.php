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
          background-color: darkred;
        }
        #panelFooter{
          background-color: darkred;
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
          background-color: #DE525B;
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
      <a href="#contact"><i class="fa fa-sign-out" style="font-size:20px"></i> Logout</a>
    </div>

<div class="main">
   <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><i class="fa fa-car" style="font-size:25px; color: white; padding-top: 5px;" ></i><h3 id="titolo"><b> Aggiungi Auto</b></h3></div>
            <div class="panel-body" id = "panelBody">
              <form id="form" class="form-horizontal" name="form" onsubmit="return validateForm()" action="inserisciAuto.php" method="post"> 
                
                <div class="form-group">
                  <label class="control-label col-md-4">Marca:</label>
                  <div class="col-md-6">
                     <input class="form-control" type="text" placeholder="Inserisci marca" name="marca"/>
                   </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Modello:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci modello" name="modello"/>
                  </div>
                </div>
                 <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Cilindrata:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci cilindrata" name="cilindrata"/>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Potenza:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci potenza" name="potenza"/>
                  </div>
                </div>
                <hr>  
                <div class="form-group">
                  <label class="control-label col-md-4">Targa:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci targa" name="targa"/>
                  </div>
                </div>
                <hr>
                
                
                <div class="form-group">
                  
                    <input type="hidden" name="idAutista" value=<?php echo $_SESSION['idAutista']; ?> />
                    <?php 

                     //include  'conn.inc.php';

                     //$dbh = new PDO($conn,$user,$pass);
                     //$stm = $dbh->prepare("SELECT idAutista, cognomeAutista, nomeAutista FROM autista WHERE email=:e");
                     //$stm->bindValue(":e",$_SESSION['idAutista']);
                     //$query = $dbh->prepare("SELECT idAutista, cognomeAutista, nomeAutista FROM auto A INNER JOIN autista Au ON A.idAutista=Au.idAutista WHERE idAutista=:");
                     //$stm->execute();

                     //if($stm->rowCount() > 0)
                     //{
                      //  $row=$stm->fetch();
                    // }
                    ?>
                  
                </div>
                
                
                <div class="form-group">
                  <div> 
                   <button id="btnAnnulla" type="reset" name="bottoneAnnulla">Annulla</button>  
                   <button id="btnConferma" type="submit" name="bottoneConferma">Conferma</button>
                  </div>
                </div>              
              </form>          
            </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
       
      </div>
    </center>
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