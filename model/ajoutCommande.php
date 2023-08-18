<?php
session_start();

include 'connexion.php';
include_once "fonction.php";
if(!empty($_POST["id_article"]) 
&& !empty($_POST["id_fournisseur"]) 
&& !empty($_POST["quantite"]) 
&& !empty($_POST["prix"])
)
{
// avant d'ajouter le vente il faut verifier la disponibilite de l4article dans le stocke

   
   $sql="INSERT INTO commande(id_article,id_fournisseur,quantite,prix) values(?,?,?,?)";
        $result=$conn->prepare($sql);
        $result->execute(array($_POST["id_article"]
                                ,$_POST["id_fournisseur"]
                                ,$_POST["quantite"]
                                ,$_POST["prix"]
                                ));
        if($result->rowCount()!=0){

            $sql="UPDATE article SET quantite=quantite+? WHERE id=?";
            $result=$conn->prepare($sql);
            $result->execute(array($_POST["quantite"],$_POST["id_article"]));

            if ($result->rowCount()!=0) {
               $_SESSION["message"]["text"]='Commande effectué avec succés';
               $_SESSION["message"]["type"]='success';
            } else {
                $_SESSION["message"]["text"]="Impossible d'effectuer lo commande";
                $_SESSION["message"]["type"]="danger";
            }
             
}else{
            $_SESSION["message"]["text"]="Une erreur s'est produit lors de la commande ";
            $_SESSION["message"]["type"]="danger";
}


   


}else{
    $_SESSION["message"]["text"]="Une information obligatoire non rensignée";
    $_SESSION["message"]["type"]="danger";
  // pour le message il faut l'afficher dans le fichier article.php  
}
header("location:../vue/commande.php");

?>