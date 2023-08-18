<?php 
session_start();
include '../model/fonction.php';
?>
<!DOCTYPE html>
<style>
  a.reinscrire{
    text-decoration: none;
    color:#fff;
    background: #D63C53;
    border: 1px solid #fff;
    border-radius: 6px;
    padding: 10px 50px 10px 50px ;
  }
  a.reinscrire:hover{
    text-decoration: none;
    color:#D63C53;
    background: #fff;
    border:1px solid #D63C53;
    border-radius: 6px;
    padding: 10px 50px 10px 50px ;
  }
</style>
<html lang="fr" dir="ltr">
  <head>
    <style>
      
    </style>
    <meta charset="UTF-8" />
    <title>
         <?php
         echo ucfirst(str_replace(".php","",Basename($_SERVER["PHP_SELF"])));
         // cette commande nous permettons d'afficher le lien actuel ou nous avons alors il va nous aider de afficher le titre d'une maniere dynamique 
        // l'ajout de la fonction base name nous permettons d'avoir juste le nom de fichier 
        //  aprés cette étape il reste d'elever l'extension .php et recuperer seulement le nom pour realiser cela on vient d'utiliser une autre fonction qui'ete str_replace() 
        // l'etape suivant c'est de mettre le premiere caractere en majuscule alors qu'on va utiliser une autre fonction
       
         ?>
  </title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="../public/image/logo_ikram.jpeg" >
  </head>
  <body>
   
    <div class="sidebar hidden-print ">
      <div class="logo-details">
        <img src="../public/image/logo_ikram.jpeg" alt="" style="width: 45px;height:45px;">
        <span class="logo_name">IKRAM-PROJET</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="dashboard.php"?"active":""  ?>" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="vente.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="vente.php"?"active":""  ?>">
          <i class="bx bx-shopping-bag" ></i>
            <span class="links_name">Vente</span>
          </a>
        </li>
        <li>
          <a href="client.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="client.php"?"active":""  ?>" >
          <i class="bx bx-user"></i>
            <span class="links_name">Client</span>
          </a>
        </li>
        <li>
          <a href="article.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="article.php"?"active":""  ?>" >
            <i class="bx bx-box"></i>
            <span class="links_name">Article</span>
          </a>
        </li>
        <li>
          <a href="fournisseur.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="fournisseur.php"?"active":""  ?>" >
          <i class="bx bx-user"></i>
            <span class="links_name">Fournisseur</span>
          </a>
        </li>
        <li>
          <a href="commande.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="commande.php"?"active":""  ?>">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>

        <li>
          <a href="categorie.php" class="<?php echo basename($_SERVER["PHP_SELF"])=="categorie.php"?"active":""  ?>">
            <i class="bx bx-category"></i>
            <span class="links_name">Catégorie</span>
          </a>
        </li>

       
     
       
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
          <li class="log_out">
        
           <a href="deconnexion.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav class="hidden-print">
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"><?php
                                  echo ucfirst(str_replace(".php","",Basename($_SERVER["PHP_SELF"])));?></span>
        </div>
        <!-- <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div> -->
        <div class="profile-details">
          <!--<img src="images/profile.jpg" alt="">-->
          <a class="reinscrire" href="inscrire.php">Réinscrire</a href="inscrire.php">
          
        </div>
      </nav>
      <!-- comment on peut faire pour effectuer le vente 
       ilfaut chercher si l'article est disponoble dans le stock ou pas
      à chaque fois qu'on a vendu un article il faut on a le reduit du stock 
      -->
      <!-- on va comprendre maintenant comment on peut effectuer une commande  -->