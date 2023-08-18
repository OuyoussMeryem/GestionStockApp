<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Change password !!</title>
 
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
    
             
  
    
    <form name="form" action="../model/traitement_mdp.php" method="POST" class=form>
        <h3>Changer le mot de passe </h3>
       
        <label for="username">Login</label>
        <input type="text" placeholder="login" name="username" id="username">

        <label for="password">Mot de passe</label>
        <input type="password" placeholder="Password" name="mdp" id="mdp" require>
        <button type="submit" name="connexion" >changer</button><br></br>
        

    </form>
       
</body>
</html>