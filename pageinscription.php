<!-- je mets ici mon code php de connexion et d'envoi en attendant de voir le MVC -->
<?php
include('totalRequetePageInscrpt.php');
$message="";
    $message1="";
// ini_set("display_errors", "1");
// error_reporting(E_ALL);
// $email = "thomas@waytolearnx.com";

// @$nom=$_POST["nom"];
// @$prenom=$_POST["prenom"];
// @$email=$_POST["email"];
// @$role=$_POST["role"];
// @$photo=$_POST["photo"];
// @$confirmPassword=$_POST["confirm-password"];
// @$password=$_POST["password"];

// @$valider=$_POST["valider"];

// $message="";
// $message1="";

// if (isset($valider)) {
//     if (empty($nom)) {
//         $message.="<li>Non invalide!</li>";
//     }
//     if (empty($prenom)) {
//         $message.="<li>Prénom invalide!</li>";
//     }
   
//     if(empty($email) or !filter_var($email,FILTER_VALIDATE_EMAIL))
//     {
//         $message.="<li>email non valide!</li>";
//     }
  
//     if (empty($password)) {
//         $message.="<li>un mot de passe est obligatoire!</li>";
//     }

//     if (empty($confirmPassword)) {
//         $message.="<li>un mot de passe est obligatoire!</li>";
//     }else if($confirmPassword != $password)
//     {
//         $message="Les mots de passe ne correspondent pas";
//     }

//     if (($role != "Admin")&&($role != "Simple_User")) {
//         $message.="<li>Il faut définir le role</li>";
//     }


//     if (empty($message)) 
//     {
//         include('bdd.php');
//         // ../MesRequetes/NomFichier(coté MesRequetes).php

//         include('ifEmailExist.php');
//         // $req=$pdo->prepare("select    id from personnel where email=? limit 1");
//         // $req->setFetchMode(PDO::FETCH_ASSOC);
//         // $req->execute(array($email));
//         // $tab=$req->fetchAll();
//         if (count($tab)>0) {
//             $message1="<li>Email existe déjà!</li>";
            
//         } else {
            
//             $idPrecedent=$pdo->lastInsertId();
//             $eta=0;
//             if($role=="Admin") $etaRole=6;
//             if($role=="Simple_User") $etaRole=3;
//             include('insertionBD.php');
//             // $ins=$pdo->prepare("insert into personnel(nom,prenom,email,password,roles,etat,photo,dateInscription,etatRole)values(?,?,?,?,?,?,?,now(),?)");
//             // $ins->execute(array($nom,$prenom,$email,md5($password),$role,$eta,$photo,$etaRole));
//             $message1 ="<div>
//             <span>Inscription reussie</span><br>
//             <span>Voulez vous vous connecter?</span><br>
//             <button><a href='pageconnexion.php'>Oui</a></button>
//             <button><a href='pageinscription.php'>Non</a></button>
//             </div>";

           
//         }
//         // auto generation de matricule
//         include('generMatricule.php');
//         // $sql = "SELECT id, roles FROM personnel WHERE email = '".$email."'";
//         //         $id = $pdo->prepare($sql);
//         //         $id->execute();
//         //         $row = $id->fetch(PDO::FETCH_ASSOC);
//         //         //on modifie le matricule
//         //         $matricule =$row['roles'].'-'.$row['id'];
//         //         //on modifie la derniere matricule du BD
//         //         $sql2 = "UPDATE personnel SET  matricule = '$matricule' WHERE email = '".$email."'";
//         //         $matricule2 = $pdo->prepare($sql2);
//         //         $matricule2->execute();
//         // var_dump($nom);
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="fich.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <!-- <script src="script.js"></script> -->
</head>
<body>
   <div class="contenantGlogal">
    <form  id="create-account-form" method="POST" enctype="multipart/form-data" action="pageinscription.php">
      
      <div class="title">
            <h2>Creez un compte</h2>
      </div>
        <?php if(!empty($message1)){ ?>
       <div id="message1"><?php echo $message1 ?></div>
       <?php } ?>
         
        <!-- USERNAME -->
        <div class="contenantPartieGDduFormulaire">

            <div class="blocGD">
                    <div class="input-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" placeholder="Nom" name="nom">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                    <!-- PASSWORD -->
                    <div class="input-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" placeholder="Password" name="password">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                        <!-- EMAIL -->
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Email" name="email">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                    <!-- La selection de photo -->
                    <div class="input-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                   
            </div>
            <div class="blocGD">
                    <div class="input-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" placeholder="EX: Ousmane" name="prenom">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                    <!-- CONFIRM PASSWORD -->
                    <div class="input-group">
                        <label for="confirm-password">Confirmation password</label>
                        <input type="password" id="confirm-password" placeholder="Password" name="confirm-password">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                    <!-- Le role -->
                    <div class="input-group">
                        <label for="role">Rôle</label>
                        <select name="role" id="role">
                            <option id="role">Indefini</option>
                            <option id="role">Admin</option>
                            <option id="role">Simple_User</option>
                        </select>
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                    
            </div>
            
        </div>
        <button type="submit" name="valider" class="btn">S'inscrire</button>
        <a href="Pageconnexion.php"><h5>Je me connecte</h5></a>
    </form>
  </div>
                           
    <script src="fich.js"></script>
</body>
</html>