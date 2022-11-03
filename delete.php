<?php
require 'bdd.php';
$id = $_GET['id'];
$datArch=date('y-m-d');
$sql = 'UPDATE personnel SET etat= 1 ,dateArchivage=:datear WHERE id=:id';
$ins = $pdo->prepare($sql);



if ($ins->execute([':id' => $id,':datear' => $datArch])) {
  header("Location: pageadmin.php");
}



// require 'bdd.php';
// $id = $_GET['id'];
// $sql = 'DELETE FROM personnel WHERE id=:id';
// $ins = $pdo->prepare($sql);
// if ($ins->execute([':id' => $id])) {
//   header("Location: pageadmin.php");
// }

?>