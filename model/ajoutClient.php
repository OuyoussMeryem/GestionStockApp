<?php
session_start();
include 'connexion.php';
if(!empty($_POST["nom"]) 
&& !empty($_POST["prenom"]) 
&& !empty($_POST["telephone"]) 
&& !empty($_POST["adresse"])){

 $sql="INSERT INTO client(nom,prenom,telephone,adresse) values(?,?,?,?)";
 $result=$conn->prepare($sql);
 $result->execute(array($_POST["nom"] 
                        , $_POST["prenom"] 
                        , $_POST["telephone"] 
                        , $_POST["adresse"]));
if($result->rowCount()!=0){
    $_SESSION["message"]["text"]='Client ajouté avec succés';
    $_SESSION["message"]["type"]='success';
}else{
    $_SESSION["message"]["text"]="Une erreur s'est produit lors de l'ajout du client";
    $_SESSION["message"]["type"]="danger";
}


}else{
    $_SESSION["message"]["text"]="Une information obligatoire non rensignée";
    $_SESSION["message"]["type"]="danger";
  // pour le message il faut l'afficher dans le fichier client.php  
}
header("location:../vue/client.php");

?>