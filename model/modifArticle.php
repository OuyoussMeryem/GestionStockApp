<?php
session_start();
include 'connexion.php';
if(!empty($_POST["nom_article"]) 
&& !empty($_POST["id_categorie"]) 
&& !empty($_POST["quantite"]) 
&& !empty($_POST["prix_unitaire"])
&& !empty($_POST["date_creation"])
&& !empty($_POST["id"])){

 $sql="UPDATE article SET nom_article=?,id_categorie=?,quantite=?,prix_unitaire=?,date_creation=? WHERE id=?";
 $result=$conn->prepare($sql);
 $result->execute(array($_POST["nom_article"] 
                        , $_POST["id_categorie"] 
                        , $_POST["quantite"] 
                        , $_POST["prix_unitaire"]
                        , $_POST["date_creation"]

                        , $_POST["id"]));
if($result->rowCount()!=0){
    $_SESSION["message"]["text"]='article modifié avec succés';
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
header("location:../vue/article.php");

?>