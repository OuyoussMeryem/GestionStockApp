<?php
session_start();
include 'connexion.php';
if(!empty($_POST["libelle_categorie"])
&& !empty($_POST["id"]) ){

 $sql="UPDATE categorie_article SET libelle_categorie=? WHERE id=?";
 $result=$conn->prepare($sql);
 $result->execute(array($_POST["libelle_categorie"]
                        ,$_POST["id"]));
if($result->rowCount()!=0){
    $_SESSION["message"]["text"]='Catégorie modifié avec succés';
    $_SESSION["message"]["type"]='success';
}else{
    $_SESSION["message"]["text"]="rien a été modifié";
    $_SESSION["message"]["type"]="warning";
}


}else{
    $_SESSION["message"]["text"]="Une information obligatoire non rensignée";
    $_SESSION["message"]["type"]="danger";
  // pour le message il faut l'afficher dans le fichier article.php  
}
header("location:../vue/categorie.php");

?>