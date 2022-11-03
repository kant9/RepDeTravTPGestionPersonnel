<!-- je mets ici mon code php de connexion et d'envoi en attendant de voir le MVC -->
<?php
// ini_set("display_errors", "1");
// error_reporting(E_ALL);
// $email = "thomas@waytolearnx.com";

@$nom=$_POST["nom"];
@$prenom=$_POST["prenom"];
@$email=$_POST["email"];
@$role=$_POST["role"];
@$photo=$_POST["photo"];
@$confirmPassword=$_POST["confirm-password"];
@$password=$_POST["password"];

@$valider=$_POST["valider"];

$message="";
$message1="";

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
//         try {
//             $pdo=new PDO("mysql:host=localhost;dbname=papa", "root", "");
//         } catch(PDOException $e) {
//             echo $e->getMessage();
//         }

//         $req=$pdo->prepare("select   id from personnel where email=? limit 1");
//         $req->setFetchMode(PDO::FETCH_ASSOC);
//         $req->execute(array($email));
//         $tab=$req->fetchAll();
//         if (count($tab)>0) {
//             $message1="<li>Email existe déjà!</li>";
            
//         } else {
            
//             $idPrecedent=$pdo->lastInsertId();
           
//             $eta=0;
//             if($role=="Admin") $etaRole=6;
//             if($role=="Simple_User") $etaRole=3;
//             $ins=$pdo->prepare("insert into personnel(nom,prenom,email,password,role,etat,photo,dateInscription,etatRole)values(?,?,?,?,?,?,?,now(),?)");
//             $ins->execute(array($nom,$prenom,$email,$password,$role,$eta,$photo,$etaRole));
//             $message1.="Bien inscrit, connectez-vous";

           
//         }
//         // auto generation de matricule
//         $sql = "SELECT id FROM personnel WHERE email = '".$email."'";
//                 $id = $pdo->prepare($sql);
//                 $id->execute();
//                 $row = $id->fetch(PDO::FETCH_ASSOC);
//                 //on modifie le matricule
//                 $matricule =$row['id'].'-'.$row['role'].'-PRSN';
//                 //on modifie la derniere matricule du BD
//                 $sql2 = "UPDATE personnel SET  matricule = '$matricule' WHERE email = '".$email."'";
//                 $matricule2 = $pdo->prepare($sql2);
//                 $matricule2->execute();
//         // var_dump($nom);
//     }
// }

session_start();
 include('bdd.php');
// try {
//         $pdo=new PDO("mysql:host=localhost;dbname=papa", "root", "");
//    } catch(PDOException $e) {
//         echo $e->getMessage();
//     }

  if(isset($_POST["valider"])){
    
    
    @$motdepass=$_POST["password"];
    @$email=$_POST["email"];
   // @$repass=$_POST["repass"];
    $res=$pdo->prepare("SELECT * from personnel where email=:email and password=:passwords ");
    $res->setFetchMode(PDO::FETCH_ASSOC);
   // $res->execute(array($login,$motdepass));   FIIII LAY BAXEE
   $res->execute(array(
        "email" => @$email,
        "passwords" => md5($password)
       
   ));

    $tab=$res->fetchAll();
    // var_dump($tab);
    // exit;
    
    if(count($tab)>0)
    {
        $_SESSION["autoriser"]="oui";
        $messagePrenomNom=$_SESSION["nomPrenom"]=strtoupper($tab[0]["nom"]." ".$tab[0]["prenom"]);
        $messageMatricule=$_SESSION["LeMatricule"]=strtoupper($tab[0]["matricule"]);
        $messageDatInsc=$_SESSION["dateInscription"]=strtoupper($tab[0]["dateInscription"]);
        $_SESSION['photo'] = $tab[0]['photo'];

        $_SESSION["LeRole"]=strtoupper($tab[0]["roles"]);
        // $message.="connection reussi";
        if($_SESSION["LeRole"]=="ADMIN")
        {
            header("Location: pageadmin.php");
        } else if($_SESSION["LeRole"]=="SIMPLE_USER")
             {
                header("Location: pageuser.php");
             }
    }
    else{
        $message1="<li>Mauvais login ou mot de passe!</li>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="fichcon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
 
</head>
<body>
   <div class="contenantGlogal">
    <form  id="create-account-form" method="POST" enctype="multipart/form-data" action="pageconnexion.php">
        
      <div class="title">
            <h2>Authentifiez-vous</h2>
      </div>
        <?php if(!empty($message1)){ ?>
       <div id="message1"><?php echo $message1 ?></div>
       <?php } ?>
         
        <!-- USERNAME -->
        <div class="contenantPartieGDduFormulaire">

            <div class="blocGD">
                    
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
                    <div class="input-group">
                        <button type="submit" name="valider" class="btn">Se connecter</button>
                        <a href="pageinscription.php"><h5>Je m'inscris</h5></a>
                    </div>

                   
            </div>
           
            
        </div>
        
    </form>
  </div>           
    <script src="fichFormulaireconn.js"></script>
</body>
</html>