<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  
  <body>
    
    <style>
      #pannello{
          width: 368px;
          margin-top: 50px;
        }
        #panelBody{
          background-color: #F5C400;
        }
        #panelHeading{
          background-color: #F5C400;
          color: black;
        }
        #panelFooter{
          background-color: #F5C400;
          height: 62px;
        }
       .panel-default {
          border-style: none;
        }
        #btnChiudi{
          position: absolute;
          top: 176px;
          left: 916px;
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 89px;
          color: white;
          background-color: #C2C2C2;
        }
    </style>
    <?php
    
 
    ?>
     <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo">Esito registrazione</h3></div>
            <div class="panel-body" id = "panelBody">
              <center><button id = "btnChiudi" type = "submit" name="bottoneRegistra">Chiudi</button></center>  
            </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
      </div>
     </center>
    
  </body>
</html>