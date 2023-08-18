<?php
session_start();
include 'connexion.php';
if( !empty($_POST["username"]) 
&& !empty($_POST["mdp"])){

    $sql="SELECT mdp FROM utilisateur WHERE username = ?";
    $result=$conn->prepare($sql);
    $result->execute(array($_POST["username"]));
    if ($result->rowCount() === 1) {
        $row = $result->fetch();
        $mdp = $row["mdp"];

        // Vérification du mot de passe haché
        if ($mdp==$_POST["mdp"]) {
            $_SESSION["username"] = $username;
            header("Location:../vue/dashboard.php");
        } else {
            echo'mot de passe incorrect ';
        } 
                             
            
            
            }else{
                echo'ce utilisateur n\'existe pas ';
            }


}

?>