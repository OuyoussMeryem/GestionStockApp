<?php
session_start();
include 'connexion.php';
if(!empty($_POST["nom_article"]) 
&& !empty($_POST["id_categorie"]) 
&& !empty($_POST["quantite"]) 
&& !empty($_POST["prix_unitaire"])
&& !empty($_POST["date_creation"])
&& !empty($_FILES["images"])){

 $sql="INSERT INTO article(nom_article,id_categorie,quantite,prix_unitaire,date_creation,images) values(?,?,?,?,?,?)";
 $result=$conn->prepare($sql);
//  avant d'ajouter l'image on va recuperer certain valeur 
$name=$_FILES["images"]["name"];
$rep_temporaire=$_FILES["images"]["tmp_name"];
$folder="../public/image";
$destination="../public/image/$name";
if(!is_dir($folder)){
   mkdir($folder,0777,true);
}

if(move_uploaded_file($rep_temporaire,$destination)){
$result->execute(array($_POST["nom_article"]
                        ,$_POST["id_categorie"]
                        ,$_POST["quantite"]
                        ,$_POST["prix_unitaire"]
                        ,$_POST["date_creation"]
                        ,$destination));
if($result->rowCount()!=0){
    $_SESSION["message"]["text"]='article ajouté avec succés';
    $_SESSION["message"]["type"]='success';
}else{
    $_SESSION["message"]["text"]="Une erreur s'est produit lors de l'ajout de l'article";
    $_SESSION["message"]["type"]="danger";
}
}
}else {
    $_SESSION["message"]["text"]="Une erreur s'est produit lors de l'importation de l'image de l'article";
    $_SESSION["message"]["type"]="danger";

}
 
header("location:../vue/article.php");

?>