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
            var telefono = document.forms["form"]["telefono"].value;
            var numeroPatente = document.forms["form"]["numeroPatente"].value;
            var scadenzaPatente = document.forms["form"]["scadenzaPatente"].value;
            var userName = document.forms["form"]["userName"].value;
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
            if (telefono == "" || telefono == "undefined") {
                alert("Campo telefono obbligatorio");
                return false;
            }
            if (email == "" || email == "undefined") {
                alert("Campo email obbligatorio");
                return false;
            }
           if (numeroPatente == "" || numeroPatente == "undefined") {
                alert("Campo numero patente obbligatorio");
                return false;
            }
           if (scadenzaPatente == "" || scadenzaPatente == "undefined") {
                alert("Campo scadenza patente obbligatorio");
                return false;
            }
           if (userName == "" || userName == "undefined") {
                alert("Campo username obbligatorio");
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
          
      html,body{height: 100%;}
      body{background: #eee;}  

      .navbar-brand,
      .navbar-nav > li > a{
        height:60px;
        line-height:30px;
      }

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
        
        #panelHeading{
          background-color: green;
        }
        #panelFooter{
          background-color: green;
        }
        #titolo{
          color: white;
        }
      .row{
          margin-left: 8%;
       }
      .formStyle {
        height: 32px;
        padding: 6px 12px;
        color: #333333;
        border-radius: 0;
       }
      .col-lg-4  { width: 33.33333333333333%;  }
      .col-lg-6  { width: 50%; }
       #pannello{
          width: 550px;
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
       
        
        .marginButtonRadio{
          margin-top: 7px;
        }
        #Contenitore{
          margin: 50px;
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
              <a class="navbar-brand" href="index.html">CAR POOLING</a>
            </div>
          </div>
        </nav>
      <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo"><b>Iscrizione autista</b></h3></div>
            <div class="panel-body" id = "panelBody">
              <form id="form" class="form-horizontal" name="form" onsubmit="return validateForm()" action="riepilogoAutista.php" method="post"> 
                
                <div class="form-group">
                  <label class="control-label col-md-4">Cognome:</label>
                  <div class="col-md-6">
                     <input class="form-control" id="cognome" type="text" placeholder="Inserisci cognome" name="cognome"/>
                   </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Nome:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci nome" name="nome"/>
                  </div>
                </div>
                 <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Data di nascita:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="date" name="dataNascita"/>
                  </div>
                </div>
                <hr>
                 <div class="form-group">
                  <label class="control-label col-md-4">Sesso:</label>
                  <div class="col-md-3 marginButtonRadio">          
                    <input type="radio" name="sesso" value="Maschile" checked/>Maschile
                  </div>
                  <div class="col-md-3 marginButtonRadio">          
                    <input type="radio" name="sesso" value="Femminile"/>Femminile
                  </div>
                </div>
                <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Nazionalita':</label>
                 <div class="col-md-6">
                    <select class="form-control" id="select" name="select" form="form">
                      <option value="italiana">Italia</option>
                      <option value="francese">Francia</option>
                      <option value="tedesca">Germania</option>
                      <option value="inglese">Inghilterra</option>
                      <option value="inglese">Spagna</option>
                      <option value="inglese">Stati Uniti</option>
                      <option value="inglese">Portogallo</option>
                      <option value="inglese">Austria</option>
                      <option value="inglese">Cina</option>
                      <option value="inglese">Giappone</option>
                    </select>
                  </div>
                 </div>
                <hr> 
                <div class="form-group">
                  <label class="control-label col-md-4">Telefono:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci telefono" name="telefono"/>
                  </div>
                </div>
                <hr>  
                <div class="form-group">
                  <label class="control-label col-md-4">Email:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="email" placeholder="Inserisci email" name="email"/>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Numero patente:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci numero patente" name="numeroPatente"/>
                  </div>
                </div>
                <hr>
                 <div class="form-group">
                  <label class="control-label col-md-4">Scadenza patente:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="date" name="scadenzaPatente"/>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Username:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="text" placeholder="Inserisci username" name="userName"/>
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="control-label col-md-4">Password:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="password" placeholder="Inserisci password" name="password"/>
                  </div>
                  <label class="control-label col-md-4">Conferma password:</label>
                  <div class="col-md-6">          
                    <input class="form-control" type="password" placeholder="Conferma password" name="confermaPassword"/>
                  </div>
                </div>
                 <hr>
                <div class="form-group">
                  <div> 
                   <button id="btnAnnulla" type="reset" name="bottoneAnnulla">Annulla</button>  
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