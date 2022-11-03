<?php
session_start();
ini_set("display_errors", "1");
error_reporting(E_ALL);
$email = "thomas@waytolearnx.com";
@$role=$_POST["role"];
if (isset($_POST['valider'])) {
    // var_dump($_POST);
    // var_dump($photo);
    // exit;
    @$nom=$_POST["nom"];
    @$prenom=$_POST["prenom"];
    @$email=$_POST["email"];
    @$role=$_POST["role"];
    @$photo=file_get_contents($_FILES['image']['tmp_name']);
    @$confirmPassword=$_POST["confirm-password"];
    @$password=$_POST["password"];

    @$valider=$_POST["valider"];
   
    $message="";
    $message1="";

    if (empty($nom)) {
        $message.="<li>Non invalide!</li>";
    }
    if (empty($prenom)) {
        $message.="<li>Prénom invalide!</li>";
    }
   
    if(empty($email) or !filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $message.="<li>email non valide!</li>";
    }
  
    if (empty($password)) {
        $message.="<li>un mot de passe est obligatoire!</li>";
    }

    if (empty($confirmPassword)) {
        $message.="<li>un mot de passe est obligatoire!</li>";
    }else if($confirmPassword != $password)
    {
        $message="Les mots de passe ne correspondent pas";
    }

    if (($role != "Admin")&&($role != "Simple_User")) {
        $message.="<li>Il faut définir le role</li>";
    }


    if (empty($message)) 
    {
        include('bdd.php');
        // ../MesRequetes/NomFichier(coté MesRequetes).php

        // include('ifEmailExist.php');
        $req=$pdo->prepare("select  id from personnel where email=? limit 1");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute(array($email));
        $tab=$req->fetchAll();
        if (count($tab)>0) {
            $message1="<li>Email existe déjà!</li>";
            
        } else {
            
            $idPrecedent=$pdo->lastInsertId();
            $eta=0;
            if($role=="Admin") $etaRole=6;
            if($role=="Simple_User") $etaRole=3;
            //include('bdd.php');

             $ins=$pdo->prepare("insert into personnel(nom,prenom,email,password,roles,etat,photo,dateInscription,etatRole)values(?,?,?,?,?,?,?,now(),?)");
             $ins->execute(array($nom,$prenom,$email,md5($password),$role,$eta,$photo,$etaRole));
            // include('insertionBD.php');
            // $ins=$pdo->prepare("insert into personnel(nom,prenom,email,password,roles,etat,photo,dateInscription,etatRole)values(?,?,?,?,?,?,?,now(),?)");
            // $ins->execute(array($nom,$prenom,$email,md5($password),$role,$eta,$photo,$etaRole));
            $message1 ="<div>
            <span>Inscription reussie</span><br>
            <span>Voulez vous vous connecter?</span><br>
            <button><a href='pageconnexion.php'>Oui</a></button>
            <button><a href='pageinscription.php'>Non</a></button>
            </div>";

           
        }
        // auto generation de matricule
        include('generMatricule.php');
        // $sql = "SELECT id, roles FROM personnel WHERE email = '".$email."'";
        //         $id = $pdo->prepare($sql);
        //         $id->execute();
        //         $row = $id->fetch(PDO::FETCH_ASSOC);
        //         //on modifie le matricule
        //         $matricule =$row['roles'].'-'.$row['id'];
        //         //on modifie la derniere matricule du BD
        //         $sql2 = "UPDATE personnel SET  matricule = '$matricule' WHERE email = '".$email."'";
        //         $matricule2 = $pdo->prepare($sql2);
        //         $matricule2->execute();
        // var_dump($nom);
    }
}

?>