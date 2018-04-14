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
    
    try
    {
       $dbh = new PDO($conn,$user,$pass);
       $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query = $dbh->prepare("INSERT INTO passeggero(nomePasseggero, cognomePasseggero, email, password, userName, telefono, dataNascita, sesso, nazionalita) VALUES(:nome, :cognome, :email, :password, :userName, :telefono, :dataNascita, :sesso, :nazionalita)");
      
       $query->bindValue(":nome",$_POST['nomeHide']);
       $query->bindValue(":cognome",$_POST['cognomeHide']);
       $query->bindValue(":dataNascita",$_POST['dataHide']);
       $query->bindValue(":sesso",$_POST['sessoHide']);
       $query->bindValue(":nazionalita",$_POST['nazionalitaHide']);
       $query->bindValue(":userName",$_POST['userNameHide']);
       $query->bindValue(":telefono",$_POST['telefonoHide']);
       $query->bindValue(":email",$_POST['emailHide']);  
       $query->bindValue(":password",$_POST['passwordHide']);
      
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
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo">Esito registrazione</h3></div>
              <div class="panel-body" id = "panelBody">
                <div class="row">
                   <label id="esito">
                     Dati correttamente registrati 
                   </label>
                </div>
                <hr>
                <div class="row">
                  <center><a href="index.html" id="btnChiudi" name="bottoneRegistra" type="button">Chiudi</a></center>  
                </div>
              </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
      </div>
     </center>
  </body>
</html>