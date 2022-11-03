<?php
// session_start();
include('bdd.php');
$sql = "SELECT id, roles FROM personnel WHERE email = '".$email."'";
                $id = $pdo->prepare($sql);
                $id->execute();
                $row = $id->fetch(PDO::FETCH_ASSOC);
                //on modifie le matricule
                $matricule =$row['roles'].'-'.$row['id'];
                //on modifie la derniere matricule du BD
                $sql2 = "UPDATE personnel SET  matricule = '$matricule' WHERE email = '".$email."'";
                $matricule2 = $pdo->prepare($sql2);
                $matricule2->execute();
?>