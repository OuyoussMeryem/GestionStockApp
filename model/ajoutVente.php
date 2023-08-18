<?php
session_start();

include 'connexion.php';
include_once "fonction.php";
if(!empty($_POST["id_article"]) 
&& !empty($_POST["id_client"]) 
&& !empty($_POST["quantite"]) 
&& !empty($_POST["prix"])
&& !empty($_POST["mode"]))
{
// avant d'ajouter le vente il faut verifier la disponibilite de l4article dans le stocke
$article=getArticle($_POST["id_article"]);
if (!empty($article) && is_array($article)) {
   if($_POST["quantite"] > $article["quantite"]){
    $_SESSION["message"]["text"]="la quantité à vendre n'est pas disponible ";
    $_SESSION["message"]["type"]="danger";
   }else{
   $sql="INSERT INTO vente(id_article,id_client,quantite,prix,mode) values(?,?,?,?,?)";
        $result=$conn->prepare($sql);
        $result->execute(array($_POST["id_article"]
                                ,$_POST["id_client"]
                                ,$_POST["quantite"]
                                ,$_POST["prix"]
                                ,$_POST["mode"]));
        if($result->rowCount()!=0){

            $sql="UPDATE article SET quantite=quantite-? WHERE id=?";
            $result=$conn->prepare($sql);
            $result->execute(array($_POST["quantite"],$_POST["id_article"]));

            if ($result->rowCount()!=0) {
               $_SESSION["message"]["text"]='Vente effectué avec succés';
               $_SESSION["message"]["type"]='success';
            } else {
                $_SESSION["message"]["text"]="Impossible d'effectuer le vente";
                $_SESSION["message"]["type"]="danger";
            }
             
}else{
            $_SESSION["message"]["text"]="Une erreur s'est produit lors du vente ";
            $_SESSION["message"]["type"]="danger";
}


   }
}

}else{
    $_SESSION["message"]["text"]="Une information obligatoire non rensignée";
    $_SESSION["message"]["type"]="danger";
  // pour le message il faut l'afficher dans le fichier article.php  
}
header("location:../vue/vente.php");

?>