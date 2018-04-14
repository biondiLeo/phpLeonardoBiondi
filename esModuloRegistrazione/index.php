<!DOCTYPE html>
<html>
  <head>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <script> </script>
  </head>
  <?php //history.back - form nascosto per mandare alla terza pagina - fare il set delle checkbox per vedere se sono settate
  ?>
  <body>
    <style>
      #pannello{
        width: 368px;
        margin-top: 50px;
      }
      #panelBody{
        background-color: dodgerblue;
      }
      #panelHeading{
        background-color: dodgerblue;
      }
      #panelFooter{
        background-color: dodgerblue;
        height: 62px; 
      }
     .panel-default {
        border-style: none;
      }
      #titolo{
        color: white;
      }
      #cognome{
        width: 198px;
        border-radius: 5px;
        margin-left: 20px;
      }
      #nome{
        width: 198px;
        border-radius: 5px;
        margin-left: 20px;
      }
      #radioMaschio{
        margin-left: 22px;
      }
      #select{
        width: 198px;
        margin-left: 22px;
        margin-right: 8px;
        height: 27px;
        border-radius: 5px;
        margin-top: 15px;
      }
      #cb1{
        margin-left: 23px;
      }
      #email{
        width: 198px;
        border-radius: 5px;
        margin-left: 20px;
        margin-bottom: 15px;
        margin-top: 15px;
      }
      #password{
        width: 198px;
        border-radius: 5px;
        margin-left: 20px;
        margin-bottom: 15px;
      }
      #btnAnnulla{
        position: absolute;
        top: 489px;
        left: 855px;
        border-radius: 5px;
        border-color: #9E9C9C;
        height: 30px;
        width: 89px;
        color: white;
        background-color: #9E9C9C;
      }
      #btnConferma{
        position: absolute;
        top: 489px;
        left: 968px;
        border-radius: 5px;
        border-color: #9E9C9C;
        height: 30px;
        width: 104px;
        color: white;
        background-color: #DE525B;
      }
      #divNome{
        margin-left: 23px;
        margin-bottom: 15px;
        margin-top: 15px;
      }
      #divCognome{
    
      }
      #divRadioMaschio{
        margin-right: 106px;
      }
      #divRadioFemmina{
        position: absolute;
        left: 990px;
        top: 224px;
      }
      #divPatente1{
        margin-right: 132px;
        margin-top: 15px;
      }
      #divPatente2{
        position: absolute;
        left: 975px;
        top: 303px;
      }
      #divMail{
        margin-left: 24px;
      }
      #divPassword{
        margin-left: 2px;
      }
  
    </style>
    
    <?php
      if(isset($_POST["bottoneConferma"]))
      {
        header("location: riepilogoDati.php");
      }
    ?>
    <center>
        <div class="container" id="Contenitore">
          <div class="panel panel-default" id = "pannello">
            <div class="panel-heading" id = "panelHeading"><h3 id="titolo">Modulo di iscrizione</h3></div>
            <div class="panel-body" id = "panelBody">

               <form id="form" action = "riepilogoDati.php" method = "post">
                   <div id = "divCognome"><center>Cognome: <input id ="cognome" type = "text" name = "cognome" /></center></div>
                   <div id = "divNome"><center>Nome: <input id ="nome" type = "text" name = "nome" /></center></div>
                   <div id = "divRadioMaschio"><center>Sesso: <input id = "radioMaschio" type = "radio" name = "sesso" value="Maschile" checked/>Maschile</center></div>
                   <div id = "divRadioFemmina"><center><input id = "radioFemmina" type = "radio" name = "sesso" value="Femminile"/>Femminile</center></div>
                   <div id = "divSelect">Nazionalita': <select id = "select" name="select" form="form">
                      <option value="italiana">italiana</option>
                      <option value="francese">francese</option>
                      <option value="tedesca">tedesca</option>
                      <option value="inglese">inglese</option>
                     </select></div>
                   <div id = "divPatente1"><center>Patente: <input id = "cb1" type = "checkbox" name = "A" />cat. A</center></div>
                   <div id = "divPatente2"><center><input id = "cb2" type = "checkbox" name = "B" />cat. B</center></div>
                   <div id = "divMail"><center>e-Mail: <input id = "email" type = "email" name = "email" /></center></div>
                   <div id = "divPassword"><center>Password: <input id = "password" type = "password" name = "password" /></center></div>
                   <div id = "divConfermaPassword"><center>Conferma password: <input id = "password" type = "password" name = "password" /></center></div>
                   <center><button id = "btnConferma" type = "submit" name="bottoneConferma">Conferma</button></center>
                   <center><button id = "btnAnnulla" type = "reset" name="bottoneAnnulla">Annulla</button></center>
                </form>
            </div>
            <div class="panel-footer" id ="panelFooter"></div>
          </div>
        </div>
       
      </div>
    </center>
  </body>
</html>