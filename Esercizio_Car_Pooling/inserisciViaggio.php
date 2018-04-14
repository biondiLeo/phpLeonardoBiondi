<?php
 session_start();
 if(!isset($_SESSION['idAutista']))
  header('Location: index.html');
?>
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
    
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        #pannello{
          width: 368px;
          margin-top: 50px;
        }
        #panelHeading{
          background-color: red;
          color: white;
        }
        #panelFooter{
          background-color: red;
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
    
    try
    {
       $dbh = new PDO($conn,$user,$pass);
       $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       $query = $dbh->prepare("INSERT INTO viaggio(data, partenza, destinazione, importo, oraPartenza, oraArrivo, durata, bagagli, animali, idAutista, disponibile) VALUES(:data, :partenza, :destinazione, :importo, :oraPartenza, :oraArrivo, :durata, :bagagli, :animali, :idAutista, :disponibile)");
      
       $query->bindValue(":data",$_POST['data']);
       $query->bindValue(":partenza",$_POST['partenza']);
       $query->bindValue(":destinazione",$_POST['destinazione']);
       $query->bindValue(":importo",$_POST['importo']);
       $query->bindValue(":oraPartenza",$_POST['oraPartenza']);
       $query->bindValue(":oraArrivo",$_POST['oraArrivo']);
       $query->bindValue(":durata",$_POST['durata']);
       $query->bindValue(":bagagli",$_POST['bagagli']);
       $query->bindValue(":animali",$_POST['animali']);
       $query->bindValue(":idAutista",$_POST['idAutista']);
       $query->bindValue(":disponibile",$_POST['disponibile']);
      
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
                  <center><a href="dashboardAutista.php" id="btnChiudi" name="bottoneRegistra" type="button">Chiudi</a></center>  
                </div>
              </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
      </div>
     </center>
    </div>
     
  </body>
</html>