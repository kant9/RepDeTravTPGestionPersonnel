<?php
  try {
    $pdo=new PDO("mysql:host=localhost;dbname=papa", "root", "");
} catch(PDOException $e) {
    echo $e->getMessage();
}
?>