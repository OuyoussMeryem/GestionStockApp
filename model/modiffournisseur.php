<?php
session_start();
include 'connexion.php';
if(!empty($_POST["nom"]) 
&& !empty($_POST["prenom"]) 
&& !empty($_POST["telephone"]) 
&& !empty($_POST["adresse"])
&& !empty($_POST["id"])){

 $sql="UPDATE fournisseur SET nom=?,prenom=?,telephone=?,adresse=? WHERE id=?";
 $result=$conn->prepare($sql);
 $result->execute(array($_POST["nom"] 
                    , $_POST["prenom"] 
                    , $_POST["telephone"] 
                    , $_POST["adresse"]
                    , $_POST["id"]));
if($result->rowCount()!=0){
    $_SESSION["message"]["text"]='fournisseur modifié avec succés';
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
header("location:../vue/fournisseur.php");

?>