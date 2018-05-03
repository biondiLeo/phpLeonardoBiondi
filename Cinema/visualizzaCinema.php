<?php
include  'conn.inc.php';
$dbh = new PDO($conn,$user,$pass);
$stm = $dbh->prepare("SELECT * FROM cinema");
if($stm->execute())
{
  echo json_encode($stm->fetchAll());
}
?>