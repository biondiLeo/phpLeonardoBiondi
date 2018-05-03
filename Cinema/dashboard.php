<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <style>
      
      #btnLogin{
         margin-top: 14px;
         margin-left: 15px;
       }
      
      #btnSubmit{
         margin-top: 14px;
         margin-left: 15px;
      }
      
      #modalHeader{
        background-color: indianred;
        color: white;
      }
      
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">CAR POOLING</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"> LOGIN<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="loginAutista.php">Autista</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="loginPasseggero.php">Passeggero</a></li>
              </ul>
            </li>
          </ul>
        
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
     <section class="cover">
      <div class="cover__filter"></div>
      <div class="cover__caption">
        <div class="cover__caption__copy">
          <h1><b>Car Pooling</b></h1>
          <h3>Mobilita flessibile e personalizzata in termini di percorsi e costi</h3>
           <button type="button" class="btn btn-danger button" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> SIGNUP</button>
        </div>
      </div>
    </section>
    
    
   
  </body>
</html>