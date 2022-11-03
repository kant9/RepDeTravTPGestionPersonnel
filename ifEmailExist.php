<?php
// session_start();
include('bdd.php');
$req=$pdo->prepare("select  id from personnel where email=? limit 1");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array($email));
$tab=$req->fetchAll();
?>