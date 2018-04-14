<?php
 session_start();
 if(isset($_SESSION['idUtente']))
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
    <link href="styleLogin.css" rel="stylesheet" type="text/css">
   
  </head>
  
  <body>
    <?php
    include 'conn.inc.php';
    if (isset($_POST['bottoneLogin']))
    {
      $dbh = new PDO($conn,$user,$pass);
      $stm = $dbh->prepare("SELECT * FROM utente WHERE email=:e AND password=MD5(:p)");
      $stm->bindValue(":e",$_POST['email']);
      $stm->bindValue(":p",$_POST['password']);
      $stm->execute();
      if($stm->rowCount() > 0)
      {
        $row=$stm->fetch();
        $_SESSION['idUtente'] = $row['idUtente'];
        echo "<h2> Connesso come " . $row['idUtente'] . "</h2>";
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
      
        <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id="panelHeading"><h3 id="titolo"><b>Login autista</b></h3></div>
            <div class="panel-body" id = "panelBody">
              <form id="form" action="" method="post" class="form-horizontal">
                <div class="form-group">
                   <label class="control-label col-md-3">Email:</label>
                   <div class="col-md-6">          
                     <input class="form-control" type="text" placeholder="Email" name="email"/>
                   </div>
                 </div>
                 <hr>
                 <div class="form-group">
                   <label class="control-label col-md-3">Password:</label>
                   <div class="col-md-6">          
                     <input class="form-control" type="password" placeholder="Password" name="password"/>
                   </div>
                 </div>
                 <hr>
            
                <div class="form-group">
                   <div>
                      <button id="btnLogin" type="submit" name="bottoneLogin">Login</button>
                   </div>
                 </div>
                  <a href="#">Password dimenticata</a>
              </form>
              </div>
            
              </div>
         </div></center>
        <?php
    }
    ?>   
   </body>
</html>
