<?php
require 'bdd.php';
require 'totalRequetePageInscrpt.php';

$id = (int) $_GET['id'];
$role = $pdo->query("SELECT roles FROM personnel WHERE id=$id")->fetchColumn();
// var_dump($role);
// exit;
if($role=='Admin')
{
    $rol='Simple_User';
    $sql = 'UPDATE personnel SET roles=:rol WHERE id=:id';
    $ins = $pdo->prepare($sql);
    if ($ins->execute(['rol' => $rol,'id' => $id])) {
      header("Location: pageadmin.php");
    }
    
}else{
    $rol='Admin';
    $sql = 'UPDATE personnel SET roles=:rol WHERE id=:id';
    
    $ins = $pdo->prepare($sql);
    if ($ins->execute(['rol' => $rol,':id' => $id])) {
      header("Location: pageadmin.php");
    }
}