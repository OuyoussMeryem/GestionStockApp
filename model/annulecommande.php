<?php
include 'connexion.php';
// pour annuler le vente on a besoin de le quantite vender pour le ajouter au stock et aussi on a besoin de id de l'article avec lequel le vente est effectuée

if(!empty($_GET["idcommande"])
&& !empty($_GET["idarticle"])
&& !empty($_GET["quantite"])){

$sql="UPDATE commande SET etat=? where id=?";
$result=$conn->prepare($sql);
$result->execute(array(0,$_GET["idcommande"]));
// il faut rajouter les articles au stock
if($result->rowCount()!=0){

   $sql="UPDATE article SET quantite = quantite - ? where id=? "; 
   $result=$conn->prepare($sql);
   $result->execute(array($_GET["quantite"],$_GET["idarticle"]));
}

}
header("location:../vue/commande.php");
?>