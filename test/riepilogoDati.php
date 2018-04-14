<!DOCTYPE html>
<html>
  <head>
     <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script>
        function goBack() {
          window.history.back();
        }
      </script>
      <style>
         #panelHeading{
          background-color: #737171;
        }
        #panelFooter{
          background-color: #737171;
        }
        #titolo{
          color: white;
        }
      .row{
          margin-left: 8%;
       }
         .col-lg-6  { width: 50%; }
        #pannello{
          width: 400px;
          margin-top: 50px;
       }
         #btnCorreggi{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 89px;
          color: white;
          background-color: #737171;
        }
        #btnRegistra{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 104px;
          color: white;
          background-color: #51A35F;
        }
        
      </style>
    </head>
    <body>
        <?php
          $cognome = input($_POST["cognome"]);
          $nome = input($_POST["nome"]);
          $dataNascita = input($_POST["dataNascita"]);
          $sesso = $_POST["sesso"];
          $nazionalita = input($_POST["select"]);
          $patente;
          $patenteA;
          $patenteB;
          $email = input($_POST["email"]);
          $password = input($_POST["password"]);
          $passwordCriptata = md5($password);
        
          
          if(isset($_POST["A"]))
          {
            $patente = "cat. A";
            $patenteA = true;
            $patenteB = false;
          }
          if(isset($_POST["B"]))
          {
            $patente = "cat. B";
            $patenteB = true;
            $patenteA = false;
          }
          if(isset($_POST["B"]) && isset($_POST["A"]))
          {
            $patente = "cat. A" . " - ". "cat. B";
            $patenteA = true;
            $patenteB = true;
          }
          if(isset($_POST["B"]) == false && isset($_POST["A"]) == false)
          {
            $patente = "Nessuna patente indicata";
            $patenteA = false;
            $patenteB = false;
          }
     
          function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
              
          if(isset($_POST["bottoneRegistra"]))
          {
            header("location: esitoRegistrazione.php");
          }
          $cognomeHide = $cognome;
          $nomeHide = $nome;
          $dataNascitaHide = $_POST["dataNascita"];
          $sessoHide = $sesso;
          $nazionalitaHide = $nazionalita;
          $emailHide = $email;
          $passwordHide = $password;
    
       ?>
       <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo"><b>Riepilogo dati</b></h3></div>
            <div class="panel-body" id = "panelBody">
              <form id="form" action="esitoRegistrazione.php" method="post">
                <div class="row">
                  <center>
                   <label id="cognome" class="col-lg-3 control-label">
                     Cognome:
                   </label>
                   <div class="col-md-6">
                     <?php echo $cognome; ?>
                   </div>
                    </center>
                 </div>
                
                 <hr>
                 <div class="row">
                   <label id="nome" class="col-lg-3 control-label">
                     Nome:
                   </label>
                   <div class="col-md-6">
                     <?php echo $nome; ?>
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="dataNascita" class="col-lg-3 control-label">
                     Data di </br>
                     nascita:
                   </label>
                   <div class="col-md-6">
                     <?php echo $dataNascita; ?>
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="sesso" class="col-lg-3 control-label">
                     Sesso:
                   </label>
                   <div class="col-md-6">
                     <?php echo $sesso;?>
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                  <label id="nazionalita" class="col-lg-3 control-label">
                    Nazionalita':
                  </label>
                  <div class="col-md-6">
                   <?php echo $nazionalita; ?>
                  </div>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="patente" class="col-lg-3 control-label">
                     Patente:
                   </label>
                   <div class="col-md-6">
                     <?php echo $patente; ?>
                   </div>  
                 </div>
                 <hr>
                 <div class="row">
                   <label id="email" class="col-lg-3 control-label">
                     e-mail:
                   </label>
                   <div class="col-md-6">
                      <?php echo $email ?>
                   </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col"> 
                        <input id="cognomeHide" type="hidden" name="cognomeHide" value=<?php echo $cognomeHide; ?> /></center>
                  </div>
                  <div class="col"> 
                       <input id="nomeHide" type="hidden" name="nomeHide" value=<?php echo $nomeHide; ?> /></center>
                  </div>
                </div>
                <div class="row">
                  <div class="col">    
                     <input id="dataNascitaHide" type="hidden" name="dataHide" value=<?php echo $dataNascitaHide; ?> /></center>
                  </div>            
                </div>
                <div class="row">
                  <div class="col"> 
                          <input id="sessoHide" type="hidden" name="sessoHide" value=<?php echo $sessoHide; ?> /></center>
                  </div>
                  <div class="col"> 
                       <input id="nazionalitaHide" type="hidden" name="nazionalitaHide" value=<?php echo $nazionalitaHide; ?> /></center>
                  </div>
                </div>
                <div class="row">
                 
                  <div class="col"> 
                        <input id="patenteA" type="hidden" name="patenteA" value=<?php echo $patenteA; ?> /></center>
                  </div>
                  <div class="col"> 
                        <input id="patenteB" type="hidden" name="patenteB" value=<?php echo $patenteB; ?> /></center>
                </div>
                </div>
                <div class="row">
                  <div class="col">    
                     <input id="emailHide" type="hidden" name="emailHide" value=<?php echo $emailHide; ?> /></center>
                  </div>
                  <div class="col"> 
                     <input id="passwordHide" type="hidden" name="passwordCriptata" value=<?php echo $passwordCriptata; ?> /></center>
                </div>
                </div>
                    
                   <div class="row">
                     <div class="col-md-4 col-md-offset-1"> 
                        <button id="btnCorreggi" type="button" onClick="goBack()" name="bottoneCorreggi">Correggi</button>
                     </div>
                     <div class="col-md-4 col-md-offset-1">
                        <button id="btnRegistra" type="submit" name="bottoneRegistra">Registra</button>
                    </div>
                   </div>
                </form>
              </div>
            </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
       
      </div>
    </center>
      
      
      
      
    </body>
</html>
      
   
    