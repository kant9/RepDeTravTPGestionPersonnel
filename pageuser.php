<?php
session_start();
include('bdd.php');
ini_set("display_errors", "1");
error_reporting(E_ALL);

$sql = 'SELECT * FROM personnel WHERE etat= 0';
$ins = $pdo->prepare($sql);
$ins->execute();
$people = $ins->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5d64d3d6b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

   
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet"
    />
    <title>Espace Admin</title>
</head>
<body>
    <div id="contenantBloc">
        
        <div class="header">
            <div class="side-nav">
                <a href="" class="logo">
                    <img src="log.jpg " alt="" class="logo-img">
                    <img src="logComp.jpg" alt="" class="logComp">
                </a>
                <ul class="nav-links">
                   
                    <li><a href="#"><i class="material-icons-outlined"> grid_view </i><p>Tableau de bord</p></a></li>
                    <li><a href="pageadmin.php"><i class="fa fa-user-times" aria-hidden="true"></i><p>Personnel actif</p></a></li>
                    <li><a href="pageArchive.php"><i class="fa fa-archive" aria-hidden="true"></i><p>Archives</p></a></li>
                    <li><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><p>Paramètres</p></a></li>
                    <div class="active"></div>
                </ul>
            </div>
    
        </div>
        <!-- <div id="gauche"> -->
           
            <!-- Le logo -
            <div id="zoneLogo"> 

                <img src="log.jpg" alt="Logo" >
            </div>
            - Le tableau de bord...
            <div id="zoneTableauDeBord">
                <div class="ligne">
                    <a href=""><i class="fa fa-home" aria-hidden="true"></i></a>
                    <a href=""><h2>Tableau de bord Admin</h2></a>
                </div>

                <div class="ligne">
                    <a href=""><i class="fa fa-address-book" aria-hidden="true"></i></a>
                    <a href=""><h2>Personnel actif</h2></a>
                </div>

                <div class="ligne">
                    <a href=""><i class="fa fa-archive" aria-hidden="true"></i></a>
                    <a href=""><h2>Liste des archives</h2></a>
                </div>

                <div class="ligne">
                    <a href=""><i class="fa fa-cog" aria-hidden="true"></i></a>
                    <a href=""><h2>Paramètres</h2></a>
                </div>  

            </div>
            -->
        <!-- </div> -->

        <div id="hautEtCentr">
            <!-- La barre d'en haut -->
            <div id="haut"> 

                <div class="cont">
                    <div class="sectG">
                        <img src="<?='data:image/jpg;base64,'.base64_encode($_SESSION['photo'])?>" alt=""  class="im">
                        <p><?php
                        echo $_SESSION['LeMatricule'] ;
                        
                        ?></p>
                    </div>
                    <div class="sectD">
            
                        <h3><?php
                        echo $_SESSION['nomPrenom'] ;
                        
                        ?></h3>
                        <nav>
                            <ul>
                              
                             <li>
                                  <p  class="profile"> +profil
                                   <!-- <img src="images/profile.png" class="profile" /> -->
                                     <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                  </p>
                                <ul>
                                  <li class="sub-item">
                                    <span class="material-icons-outlined"> grid_view </span>
                                    <p>Infos complétes</p>
                                  </li>
                                  <li class="sub-item">
                                    <span class="material-icons-outlined"> manage_accounts </span>
                                    <p>Modifier Profil</p>
                                  </li>
                                  <li class="sub-item">
                                    <a href="Pageconnexion.php"><span class="material-icons-outlined"> logout </span></a>
                                    <a href="Pageconnexion.php">Déconnexion</a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </nav>
                        <!-- <h6>
                               
                                <ul>
                                   <li class="profile">
                                         +profil
                                       <span class="fa fa-chevron-down" aria-hidden="true"></span>
                            
                                        <ul> 
                                            <li class="sub-item">
                                                <span class="material-icons-outlined">  </span>
                                                <p>Update Profile</p>
                                            </li>
                                            <li class="sub-item">
                                                <span class="material-icons-outlined"></span>
                                                <p>Logout</p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>            
                              
                        </h6>
                       -->
                    </div>
                </div>
            </div>
            <!-- Le centre composé du tableaux... -->
            <div id="centre">
            
                <div class="rech">
                    <input type="text" placeholder="Entrez votre recherche" name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>

                <div id="TitrTableau">
                    <h2>Personnes en activité</h2>
                </div>

                <div class="leTableau">

                <?php
                    require 'bdd.php';
                    $sql = 'SELECT * FROM personnel where etat=0';
                    $ins = $pdo->prepare($sql);
                    $ins->execute();
                    $people = $ins->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <?php require 'header.php'; ?>
                    <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                        
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Matricule</th>
                            <th>Role</th>
                            <th>Date d'inscription</th>
                           
                            </tr>
                            <?php foreach($people as $person): ?>
                            <tr>
                                <td><?= $person->prenom; ?></td>
                                <td><?= $person->nom; ?></td>
                                <td><?= $person->email; ?></td>
                                <td><?= $person->matricule; ?></td>
                                <td><?= $person->roles; ?></td>
                                <td><?= $person->dateInscription; ?></td>
                               
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        </div>
                    </div>
                    </div>
                    <?php require 'footer.php'; ?>

                </div>
 

               
            </div>
        </div>
        
    </div>
</body>
</html>