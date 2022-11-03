<?php
$message="";
$message1="";
require 'bdd.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM personnel WHERE id=:id';
$ins = $pdo->prepare($sql);
$ins->execute([':id' => $id ]);
$person = $ins->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['nom'])  && isset($_POST['email']) && isset($_POST['prenom']) ) {
  $name = $_POST['nom'];
  $email = $_POST['email'];
  $prenom = $_POST['prenom'];
  $sql = 'UPDATE personnel SET nom=:nom, email=:email, prenom=:prenom WHERE id=:id';
  $ins = $pdo->prepare($sql);
  if ($ins->execute([':nom' => $nom, ':email' => $email,  ':prenom' => $prenom, ':id' => $id])) {
    header("Location: /");
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Modification</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Nom</label>
          <input value="<?= $person->nom; ?>" type="text" name="nom" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Prenom</label>
          <input value="<?= $person->prenom; ?>" type="text" name="prenom" id="prenom" class="form-control">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Modifier</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>