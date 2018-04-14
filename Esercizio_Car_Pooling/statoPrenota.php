<?php
 if(isset($_POST["$btnConferma"]))
 {
   include  'conn.inc.php';
   $posti = $datiViaggio[3];

   $posti = $posti - 1;
   $row["stato"] = 1;
   $statoPrenotazione = $row["stato"];
   $dbh3 = new PDO($conn,$user,$pass);
   $stm3 = $dbh3->prepare("UPDATE prenotazione SET stato=:stato WHERE idPrenotazione=:idPrenotazione");
   $stm3->bindValue(":stato",$statoPrenotazione);
   $stm3->bindValue(":idPrenotazione",$row["idPrenotazione"]);
   $stm3->execute();

   $dbh2 = new PDO($conn,$user,$pass);
   $stm2 = $dbh2->prepare("UPDATE viaggio SET disponibile=:disponibile WHERE idViaggio=:idViaggio");
   $stm2->bindValue(":disponibile",$posti);
   $stm2->bindValue(":idViaggio",$idViaggio);
   $stm2->execute();

 }

 if(isset($_POST["$btnRifiuta"]))
 {
   include  'conn.inc.php';
   $dbh = new PDO($conn,$user,$pass);
   $stm = $dbh->prepare("DELETE FROM prenotazione idPrenotazione=:idPrenotazione");
   $stm->bindValue(":idPrenotazione",$row["idPrenotazione"]);
   $stm->execute();

 }
?>