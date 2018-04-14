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
        function validateForm() {
            var nome = document.forms["form"]["nome"].value;
            var cognome = document.forms["form"]["cognome"].value;
            var password = document.forms["form"]["password"].value;
            var confermaPassword = document.forms["form"]["confermaPassword"].value;
            var email = document.forms["form"]["email"].value;
            var dataNascita = document.forms["form"]["dataNascita"].value;
           // var controlloData = /^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/;
          
          //var mail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          
            if (cognome == "" || cognome == "undefined") {
                alert("Campo cognome obbligatorio");
                return false;
            }
            if (nome == "" || nome == "undefined") {
                alert("Campo nome obbligatorio");
                return false;
            }
            if (dataNascita == "" || dataNascita == "undefined") {
                alert("Campo data di nascita obbligatorio");
                return false;
            }
            if (email == "" || email == "undefined") {
                alert("Campo email obbligatorio");
                return false;
            }
            if (password == "" || password == "undefined") {
                alert("Password obbligatoria");
                return false;
            }
            if (confermaPassword == "" || confermaPassword == "undefined") {
                alert("Conferma la tua password");
                return false;
            }
            if (password != confermaPassword) {
                confermaPassword = "";
                alert("Le password non coincidono");
                return false;
            }
          }
        
      </script>
      <style>
        /*
        div.message.info{
        background: #EAEBF7 url(info20.png) no-repeat 15px 50%;
        border-color: #8E9AFF}

        div.message.warning{
        background: #FFF0BA url(warning20.png) no-repeat 15px 50%;
        border-color: #E87C29}

        div.message.question{
        background: #E4F6DE url(help20.png) no-repeat 15px 50%;
        border-color: #8FDC79}

        div.message.error{
        background: #FFD8D6 url(error20.png) no-repeat 15px 50%;
        border-color: #FF0038}
        */
        
          html,body{height: 100%;}
      body{background: #eee;}  

      .navbar-brand,
      .navbar-nav > li > a{
        height:60px;
        line-height:30px;
      }
        
        #panelHeading{
          background-color: dodgerblue;
        }
        #panelFooter{
          background-color: dodgerblue;
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
        #btnConferma{
          border-radius: 5px;
          border-color: #9E9C9C;
          height: 30px;
          width: 104px;
          color: white;
          background-color: #DE525B;
        }
        #patente
        {
          margin-right: -9%;
          margin-left: -1%;
        }
        #sesso{
          margin-right: -9%;
          margin-left: -1%;
        }
    </style>
  </head>
  <body>
     <?php
      if(isset($_POST["bottoneConferma"]))
      {
        header("location: riepilogoDati.php");
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
              <a class="navbar-brand" href="index.html">HOME</a>
            </div>
            </div>
          </div>
        </nav>
    </br>
      <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo"><b>Modulo di iscrizione</b></h3></div>
            <div class="panel-body" id = "panelBody">
              <form id="form" name="form" onsubmit="return validateForm()" action = "riepilogoDati.php" method = "post">
              
                
                <div class="row">
                  <center>
                   <label id="cognome" class="col-lg-3 control-label">
                     Cognome:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" id="cognome" type="text" name="cognome"/>
                   </div>
                    </center>
                 </div>
                
                 <hr>
                 <div class="row">
                   <label id="nome" class="col-lg-3 control-label">
                     Nome:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" id="nome" type="text" name="nome" /> 
                   </div>
                 </div>
                <hr>
                 <div class="row">
                   <label id="dataNascita" class="col-lg-3 control-label">
                     Data di </br>
                     nascita:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" type="date" name="dataNascita">
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="sesso" class="col-lg-4 control-label">
                     Sesso:
                   </label>
                   <div class="col-md-4">
                     <input id="radioMaschio" type="radio" name="sesso" value="Maschile" checked/>Maschile
                   </div>
                   <div class="col-md-4">
                    <input id="radioFemmina" type="radio" name="sesso" value="Femminile"/>Femminile
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                  <label id="nazionalita" class="col-lg-3 control-label">
                    Nazionalita':
                  </label>
                  <div class="col-md-6">
                    <select class="form-control" id = "select" name="select" form="form">
                      <option value="italiana">italiana</option>
                      <option value="francese">francese</option>
                      <option value="tedesca">tedesca</option>
                      <option value="inglese">inglese</option>
                    </select>
                  </div>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="patente" class="col-lg-4 control-label">
                     Patente:
                   </label>
                   <div class="col-md-3">
                     <input id="cb1" type="checkbox" name="A" />cat. A
                   </div>  
                   <div class="col-md-3">
                     <input id="cb2" type = "checkbox" name="B" />cat. B
                   </div>
                 </div>
                 <hr>
                 <div class="row">
                   <label id="email" class="col-lg-3 control-label">
                     e-mail:
                   </label>
                   <div class="col-lg-6">
                     <input class="form-control" id="email" type="email" name="email" />
                   </div>
                 </div>
                 <hr>
                  <div class="row">
                   <label class="col-lg-3 control-label">
                     Password:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" id="password" type="password" name="password" />
                   </div>
               </div>
                <div class="row">
                   <label class="col-lg-3 control-label">
                     Conferma </br>
                     password:
                   </label>
                   <div class="col-md-6">
                     <input class="form-control" id="confermaPassword" type="password" name="confermaPassword" />
                   </div> 
                 </div>
                <hr id="divisioneBottoni">
                <div class="row">
                   <div class="col-md-4 col-md-offset-1">
                      <button id="btnAnnulla" type="reset" name="bottoneAnnulla">Annulla</button>
                   </div>
                   <div class="col-md-4 col-md-offset-1">
                      <button id="btnConferma" type="submit" name="bottoneConferma">Conferma</button>
                   </div>
                 </div>
 
              </form>
            </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
       
      </div>
    </center>
  </body>
  
</html>