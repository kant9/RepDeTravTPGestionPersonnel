<?php
require 'bdd.php';
$message="";
    $message1="";
$id = $_GET['id'];
$sql = 'SELECT * FROM personnel WHERE id=:id';
$ins = $pdo->prepare($sql);
$ins->execute([':id' => $id ]);
$person = $ins->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nom'])  && isset($_POST['email']) && isset($_POST['prenom']) ) {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $prenom = $_POST['prenom'];
  $datMod=date('y-m-d');
  $sql = 'UPDATE personnel SET nom=:nom, email=:email, prenom=:prenom,dateModif=:datMod WHERE id=:id';
  $ins = $pdo->prepare($sql);
  if ($ins->execute([':nom' => $nom, ':email' => $email, ':prenom' => $prenom, ':datMod' => $datMod, ':id' => $id])) {
    header("Location:pageadmin.php");
  }



}





 ?>
<?php require 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de modification</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="fichConnexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <script src="script.js"></script>
</head>
<body>
   <div class="contenantGlogal">
   <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
    <form  id="create-account-form" method="POST" action="">
        
      <div class="title">
            <h2>Formulaire de modification</h2>
      </div>
         
        <!-- USERNAME -->
        <div class="contenantPartieGDduFormulaire">

            <div class="blocGD">
                    <div class="input-group">
                        <label for="prenom">Nom</label>
                        <input type="text" id="nom" placeholder="EX: Ousmane" name="nom" value="<?= $person->nom; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>

                    <div class="input-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" id="prenom" placeholder="EX: Ousmane" name="prenom" value="<?= $person->prenom; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                    <!-- EMAIL -->
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" placeholder="Email" name="email" value="<?= $person->email; ?>">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <p>Error Message</p>
                    </div>
                   

            <button type="submit" name="ok" class="btn">Modifier</button>
        
               
        </div>
        
            
        
    </form>
  </div>
                           
    <script src="fichModif.js"></script>
</body>
</html>