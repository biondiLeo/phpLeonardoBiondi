<!DOCTYPE html>
<html>
  <head>
     <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <body>
      
      <style>
        #pannello{
          width: 368px;
          margin-top: 50px;
        }
        #panelBody{
          background-color: #737171;
        }
        #panelHeading{
          background-color: #737171;
          color: white;
        }
        #panelFooter{
          background-color: #737171;
          height: 62px;
        }
       .panel-default {
          border-style: none;
        }
        #divCognome{
          color: #C2C2C2;
          margin-bottom: 15px;
        }
        #divNome{
          color: #C2C2C2;    margin-bottom: 15px;
        }
        #divRadio{
          color: #C2C2C2;
          margin-bottom: 15px;
        }
        #divNazionalità{
          color: #C2C2C2;
          margin-bottom: 15px;
        }
        #divPatente{
          color: #C2C2C2;
          margin-bottom: 15px;
        }
        #divMail{
          color: #C2C2C2;
          margin-bottom: 15px;
        }
        #btnRegistra{
          
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 104px;
          color: white;
          background-color: #51A35F;
        }
        #btnCorreggi{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 89px;
          color: white;
          background-color: #C2C2C2;
        }
      </style>
       <?php
      
         /*registra
           position: absolute;
          top: 383px;
          left: 968px;
          */
      /*
      correggi
      position: absolute;
          top: 383px;
          left: 855px;
      */
      
          $cognome = input($_POST["cognome"]);
          $nome = input($_POST["nome"]);
          $sesso = $_POST["sesso"];
          $nazionalita = input($_POST["select"]);
          $patente;
          $email = input($_POST["email"]);
          $password = input($_POST["password"]);
          
          if(isset($_POST["A"]))
          {
            $patente = "cat. A";
          }
          if(isset($_POST["B"]))
          {
            $patente = "cat. B";
          }
          if(isset($_POST["B"]) && isset($_POST["A"]))
          {
            $patente = "cat. A" . " - ". "cat. B";
          }
          if(isset($_POST["B"]) == false && isset($_POST["A"]) == false)
          {
            $patente = "Nessuna patente indicata";
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
    
       ?>
      <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id="pannello">
            <div class="panel-heading" id="panelHeading"><h3 id="titolo">Riepilogo dati</h3></div>
            <div class="panel-body" id="panelBody">
              <div id="divCognome"><center>Cognome: <?php echo $cognome; ?></center></div>
              <div id="divNome"><center>Nome: <?php echo $nome; ?></center></div>
              <div id="divRadio"><center>Sesso: <?php echo $sesso;?></center></div>
              <div id="divNazionalità"><center>Nazionalita': <?php echo $nazionalita; ?></center></div>
              <div id="divPatente"><center>Patente: <?php echo $patente; ?></center></div>
              <div id="divMail"><center>e-Mail: <?php echo $email; ?></center></div>
              <div class="row">
              
                <form id="form" action="esitoRegistrazione.php" method="post">
                     <input id="cognome" type="hidden" name="cognomeHide" /></center>
                     <input id="nome" type="hidden" name="nomeHide" /></center>
                     <input id="sesso" type="hidden" name="sessoHide" /></center>
                     <input id="nazionalita" type="hidden" name="nazionalitaHide" /></center>
                     <input id="patente" type="hidden" name="patenteHide" /></center>
                     <input id="email" type="hidden" name="mailHide" /></center>
                     <input id="password" type="hidden" name="passwordHide" /></center> 
    <div class="col-sm-2">
                     <center><button id="btnCorreggi" type="reset" name="bottoneCorreggi">Correggi</button></center>  
      </div>  
     <div class="col-sm-2">
                      <center><button id="btnRegistra" type="submit" name="bottoneRegistra">Registra</button></center>
                  
                  </form>
                
               </div>
            </div>
           
          </div>
        </div>
      </div>
     </center>
    </body>
  </head>
</html>