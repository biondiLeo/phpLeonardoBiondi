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
        #pannello{
          width: 550px;
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
        
             html,body{height: 100%;}
      body{background: #eee;}  

      .navbar-brand,
      .navbar-nav > li > a{
        height:60px;
        line-height:30px;
      }
          #Contenitore{
          margin: 50px;
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
          $email = input($_POST["email"]);
          $password = input($_POST["password"]);
          $telefono = input($_POST["telefono"]);
          $userName = input($_POST["userName"]);
          $passwordCriptata = md5($password);
        
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
     
    
       ?>
          <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">CAR POOLING</a>
            </div>
          </div>
        </nav>
       <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo"><b>Riepilogo dati</b></h3></div>
            <div class="panel-body" id = "panelBody">
               <form id="form" class="form-horizontal" name="form" onsubmit="return validateForm()" action="esitoPasseggero.php" method="post"> 
                
                <div class="form-group">
                  <label class="control-label col-md-4">Cognome:</label>
                  <div class="col-md-6"><?php echo $cognome; ?></div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Nome:</label>
                  <div class="col-md-6"><?php echo $nome; ?></div>
                </div>
                 <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Data di nascita:</label>
                  <div class="col-md-6"><?php echo $dataNascita; ?></div>
                </div>
                <hr>
                 <div class="form-group">
                  <label class="control-label col-md-4">Sesso:</label>
                  <div class="col-md-6"><?php echo $sesso; ?></div>
                </div>
                <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Nazionalita':</label>
                  <div class="col-md-6"><?php echo $nazionalita; ?></div>
                </div>
                <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Telefono:</label>
                  <div class="col-md-6"><?php echo $telefono; ?></div>
                </div>
                <hr>  
                <div class="form-group">
                  <label class="control-label col-md-4">Email:</label>
                  <div class="col-md-6"><?php echo $email; ?></div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Username:</label>
                  <div class="col-md-6"><?php echo $userName; ?></div>
                </div>
                <hr>
                <div class="form-group">
                  <input type="hidden" name="cognomeHide" value=<?php echo $cognome; ?> />
                  <input type="hidden" name="nomeHide" value=<?php echo $nome; ?> />
                  <input type="hidden" name="dataHide" value=<?php echo $dataNascita; ?> />
                  <input type="hidden" name="sessoHide" value=<?php echo $sesso; ?> />
                  <input type="hidden" name="nazionalitaHide" value=<?php echo $nazionalita; ?> />
                  <input type="hidden" name="telefonoHide" value=<?php echo $telefono; ?> />
                  <input type="hidden" name="emailHide" value=<?php echo $email; ?> />
                  <input type="hidden" name="userNameHide" value=<?php echo $userName; ?> />
                  <input type="hidden" name="passwordHide" value=<?php echo $passwordCriptata; ?> />
               </div>

                <div class="form-group">
                 <div> 
                   <button id="btnCorreggi" type="button" onClick="goBack()" name="bottoneCorreggi">Correggi</button>
                   <button id="btnRegistra" type="submit" name="bottoneRegistra">Registra</button>
                 </div>
                </div>          
               </form>
                
              </div>
              <div class="panel-footer" id ="panelFooter"></div>
            </div>
            
          </div>
        </div>
       
      </div>
    </center>
      
      
      
      
    </body>
</html>
      
   
    