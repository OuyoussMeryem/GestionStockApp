<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>inscrire</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="style1.css">
    <!--Stylesheet-->
    <link rel="icon" type="image/png" href="../public/image/logo_ikram.jpeg" >
</head>
<body>


    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <form name="form" action="../model/ajoutUtilisateur.php" method="POST" class=form>
        <h3>Inscription </h3>
        <label for="username">Saisir le nom</label>
        <input type="text" placeholder="Nom" name="nom" id="nom" require>
        <label for="username">Saisir le prenom</label>
        <input type="text" placeholder="Prenom" name="prenom" id="prenom" require>
        <label for="username">Saisir le login</label>
        <input type="text" placeholder="Login" name="username" id="username" require>
        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Password" name="mdp" id="mdp" require>
        <button type="submit" name="connexion" >Inscription</button><br><br>
        <pre>si vous avez déjà inscrire -- &nbsp; <a  href="index.php" >Connexion </a></pre>

     </form>

     <?php 
include 'pied.php';
?>
    
</body>
</html>