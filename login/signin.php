<?php
 session_start();
 if(isset($_SESSION['idCliente']))
  header('Location: dashboard.php');
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
     
      html,body{height: 100%;}
      body{background: #eee;}  

      .navbar-brand,
      .navbar-nav > li > a{
        height:60px;
        line-height:30px;
      }

       #panelHeading{
          background-color: darkblue;
        }
        #panelFooter{
          background-color: darkblue;
        }
        #titolo{
          color: white;
        }
      .row{
          margin-left: 8%;
       }
      .form-control {
        height: 32px;
        padding: 6px 12px;
        color: #333333;
        width: 139%;
        border-radius: 0;
       }
      .col-lg-4  { width: 33.33333333333333%;  }
      .col-lg-6  { width: 50%; }
       #pannello{
          width: 419px;
          margin-top: 50px;
       }
       #btnAnnulla{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 89px;
          color: white;
          background-color: #9E9C9C;
        }
        #btnLogin{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 104px;
          color: white;
          background-color: royalblue;
        }
    </style>
  </head>
  
  <body>
    
    <?php
    include 'conn.inc.php';
    if (isset($_POST['bottoneLogin']))
    {
      $dbh = new PDO($conn,$user,$pass);
      $stm = $dbh->prepare("SELECT * FROM registrazione WHERE email=:e AND password=MD5(:p)");
      $stm->bindValue(":e",$_POST['userName']);
      $stm->bindValue(":p",$_POST['password']);
      $stm->execute();
      if($stm->rowCount() > 0)
      {
        $row=$stm->fetch();
        $_SESSION['idCliente'] = $row['email'];
        echo "<h2> Connesso come " . $row['email'] . "</h2>";
        echo '<a href="dashboard.php"> Dashboard </a>';
      }
      else
      {
        echo "<h2> Dati non corretti </h2>";
      }
    }
    else
    {
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
              <a class="navbar-brand" href="index.html">HOME</a>
            </div>
          </div>
        </nav>
    </br>
     <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo"><b>Login</b></h3></div>
            <div class="panel-body" id = "panelBody">
              <form id="form" action="" method="post">
                <div class="row">
                  <center>
                   <label id="userNameLogin" class="col-lg-3 control-label">
                     Email:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" id="userName" type="email" name="userName"/>
                   </div>
                    </center>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="passwordLogin" class="col-lg-3 control-label">
                     Password:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" id="password" type="password" name="password" /> 
                   </div>
                 </div>
                <hr>
                <div class="row">
                   <div class="col-md-4 col-md-offset-1">
                      <button id="btnAnnulla" type="reset" name="bottoneAnnulla">Annulla</button>
                   </div>
                   <div class="col-md-4 col-md-offset-1">
                      <button id="btnLogin" type="submit" name="bottoneLogin">Login</button>
                   </div>
                 </div>
            
              </div>
               <div class="panel-footer" id ="panelFooter"></div>
              </div>
            </div>
          </div>
       </div>
    </center>
 
    <?php
    }
    ?>    
    
  </body>
</html>