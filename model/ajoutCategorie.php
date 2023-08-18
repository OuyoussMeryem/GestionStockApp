<?php
session_start();
include 'connexion.php';
if(!empty($_POST["libelle_categorie"])){

 $sql="INSERT INTO categorie_article(libelle_categorie) values(?)";
 $result=$conn->prepare($sql);
 $result->execute(array($_POST["libelle_categorie"]));
if($result->rowCount()!=0){
    $_SESSION["message"]["text"]='Catégorie ajouté avec succés';
    $_SESSION["message"]["type"]='success';
}else{
    $_SESSION["message"]["text"]="Une erreur s'est produit lors de l'ajout de la catégorie";
    $_SESSION["message"]["type"]="danger";
}


}else{
    $_SESSION["message"]["text"]="Une information obligatoire non rensignée";
    $_SESSION["message"]["type"]="danger";
  // pour le message il faut l'afficher dans le fichier categorie_article.php  
}
header("location:../vue/categorie.php");

?>