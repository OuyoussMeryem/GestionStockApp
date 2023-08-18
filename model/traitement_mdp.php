<?php
include 'connexion.php';
if( !empty($_POST["username"]) 
&& !empty($_POST["mdp"])){

    
            $sql="UPDATE utilisateur SET mdp = ? WHERE username = ?";
            $result=$conn->prepare($sql);
            $result->execute(array($_POST["mdp"] 
                                    , $_POST["username"]));
                                    header("location:../vue/index.php");
                 }else{
                    echo'Erreur lors du changement de mot de passe';
                 }

?>