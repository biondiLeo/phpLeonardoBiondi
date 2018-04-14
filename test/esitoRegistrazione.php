<?php
include  'conn.inc.php';
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
    <style>
        #pannello{
          width: 368px;
          margin-top: 50px;
        }
        #panelHeading{
          background-color: #F5C400;
          color: white;
        }
        #panelFooter{
          background-color: #F5C400;
        }
       #btnChiudi{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 89px;
          color: white;
          background-color: #C2C2C2;
        }
    </style>
    
  </head>
  <body>
    <?php
    try
    {
       $dbh = new PDO($conn,$user,$pass);
       $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query = $dbh->prepare("INSERT INTO registrazione(nomeCliente, cognomeCliente, dataNascita, sesso, nazionalita, patenteA, patenteB, email, password) VALUES(:nome, :cognome, :dataNascita, :sesso, :nazionalita, :patenteA, :patenteB, :email, :password)");
      
       $query->bindValue(":nome",$_POST['nomeHide']);
       $query->bindValue(":cognome",$_POST['cognomeHide']);
       $query->bindValue(":dataNascita",$_POST['dataHide']);
       $query->bindValue(":sesso",$_POST['sessoHide']);
       $query->bindValue(":nazionalita",$_POST['nazionalitaHide']);
       $query->bindValue(":patenteA",$_POST['patenteA']);
       $query->bindValue(":patenteB",$_POST['patenteB']);
       $query->bindValue(":email",$_POST['emailHide']);  
       $query->bindValue(":password",$_POST['passwordCriptata']);
      
       if(!$query->execute())
       echo "Non è stato inserito niente";
       else
       echo "Inserimento valido";
      
    }
    catch(PDOException $e)
    {
      echo 'Connection failed:' . $e->getMessage();
    }
    
    ?>
      <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo">Esito registrazione</h3></div>
              <div class="panel-body" id = "panelBody">
                <div class="row">
                   <label id="esito">
                     Dati correttamente registrati 
                   </label>
                </div>
                <hr>
                <div class="row">
                  <center><button id="btnChiudi" name="bottoneRegistra" type="button" href=”javascript:self.close()”>Chiudi</button></center>  
                </div>
              </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
      </div>
     </center>
  </body>
</html>