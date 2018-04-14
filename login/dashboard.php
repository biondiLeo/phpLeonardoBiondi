<?php
 session_start();
 if(!isset($_SESSION['idCliente']))
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
      
    <style>
      
      #panelBody{
         height: 500px;
      }
      #pannello{
        padding-top: 37px;
      }
      html,body{height: 100%;}
      body{background: #eee;}  

      .navbar-brand,
      .navbar-nav > li > a{
        height:60px;
        line-height:30px;
      }
   
    </style>
  </head>
  <body>
     <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">HOME</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="signout.php"><span class="glyphicon glyphicon-log-out"></span> LOG OUT</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </br>
    <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo"><b><h2><b>  Your dashboard </b></h2></b></h3></div>
            <div class="panel-body" id = "panelBody">
                
              </div>
             <div class="panel-footer" id ="panelFooter"></div>
              </div>
            </div>
          </div>
       </div>
    </center>
    
  </body>
</html>