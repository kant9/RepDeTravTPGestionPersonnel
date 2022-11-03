<?php
require 'bdd.php';
$id = $_GET['id'];
// $sql1="SELECT etat from personnel where id='$id'";


//  if($sql1==1)
//  {
    $sql = 'UPDATE personnel SET etat= 0 WHERE id=:id';
    $ins = $pdo->prepare($sql);
    $ins->execute([':id' => $id]);
    header("Location: pageArchive.php");
 //}
 


// require 'bdd.php';
// $id = $_GET['id'];
// $sql = 'DELETE FROM personnel WHERE id=:id';
// $ins = $pdo->prepare($sql);
// if ($ins->execute([':id' => $id])) {
//   header("Location: pageadmin.php");
// }

?>

