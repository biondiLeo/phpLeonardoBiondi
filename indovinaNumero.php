<!DOCTYPE html>
<html>
  <body>
    <style>
      #btnConferma{
        background-color: orangered;
        color: white;
        width: 89px;
        height: 34px;
      }
      #Contenitore{
        border: 1px solid black;
        background-color: palegreen;
        width: 425px;
        height: 292px;
      }
      #textBox{
        background-color: yellow;
      }
      #bottoneGiocaDiNuovo
      {
        background-color: green;
        color: white;
        width: 130px;
        height: 34px;
      }
    </style>

    <center><div id="Contenitore">
       <h2 class="title"><center> Gioco dell'indovina numero </center>
    </h2>
      
    <?php
    if(isset($_GET["bottoneConferma"]))
    {
      $nRandom = $_GET["randomNumber"];
      $nTentativi = $_GET["tentativi"];
      $nTentativi = $nTentativi + 1;
      if($nTentativi > 7)
      {
        echo "<h3>Spiacenti...</h3>";
        echo "<h3>Hai superato il max di 7 tentativi.</h3>";
      ?>
       <center><button id="bottoneGiocaDiNuovo" onclick = "location.href = 'index.html'"> Gioca di nuovo </button></center>
      <?php
      }
      else if($_GET["numero"]==$_GET["randomNumber"])
      {
       $nTentativi = $nTentativi - 1;
       echo "<h3>BRAVO!</h3>";
       echo "<h3>Hai indovinato in " . $nTentativi . " tentativi.</h3>";
       ?>
      <center><button id="bottoneGiocaDiNuovo" onclick = "location.href = 'index.html'"> Gioca di nuovo </button></center>
      <?php
      }
      else
      {
        if($_GET["numero"]<$_GET["randomNumber"])
        {
          echo "<h3>Il numero e' troppo piccolo!</h3>"; 
        } 
        else if($_GET["numero"]>$_GET["randomNumber"])
        {
          echo "<h3>Il numero e' troppo grande!</h3>";
        } 
        echo "Tentativo n." . $nTentativi;
       ?>
        <center><b>Inserisci il numero</b></center></br>
        <form action = "" method = "get">
          <center><input type = "hidden" name = "randomNumber" value = <?php echo $nRandom; ?> </center>
          <center><input type = "hidden" name = "tentativi" value = <?php echo $nTentativi; ?> </center>
          <center><input id = "textBox" type = "text" name = "numero"></center></br>
          <center><button id = "btnConferma" type = "submit" name="bottoneConferma">Conferma</button></center>
        </form></br>
       <?php
      }
      
    }
    else
    {
      $nRandom = rand(1,100); 
      $nTentativi = 1;
      echo "Tentativo n." . $nTentativi;
          ?>
        <center><b>Inserisci il numero</b></center></br>
        <form action = "" method = "get">
          <center><input type = "hidden" name = "randomNumber" value = <?php echo $nRandom; ?> </center>
          <center><input type = "hidden" name = "tentativi" value = <?php echo $nTentativi; ?> </center>
          <center><input id = "textBox" type = "text" name = "numero"></center></br>
          <center><button id = "btnConferma" type = "submit" name="bottoneConferma">Conferma</button></center>
        </form></br>
       <?php
    }
    ?>
    </div></center>
   
  </body>
  
</html>