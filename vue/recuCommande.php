<?php 
include 'entete.php';
if(!empty($_GET["id"])){
// on utilise get car id va etre presenter dans url 
$commande=getCommande($_GET["id"]);
// maintenant il suffit f'afficher les donner de l'article dans les input du formulaire
}
?>

<div class="home-content">
  
    <button class="hidden-print" id="btnPrint" style="position:relative;left:45%;"><i class="bx bx-printer"></i> Imprimer</button>
  
   <div class="page">
    
     <div class="cote-a-cote">
      <h2>TEMARA-COMPUTER</h2>
      <div>
        <p>Reçu N° #: <?= $commande["id"] ?></p>
        <p>Date : <?= date("d/m/Y H:i:s",strtotime($commande["date_commande"])) ?></p>
     </div>
     </div>
       <br><br>
      <div class="cote-a-cote" style="width:50%">
        <stronger>Nom complete :</stronger>
        <p><?= $commande["nom"]." ".$commande["prenom"] ?></p>
      
      </div>

      <div class="cote-a-cote" style="width:50%">
        <p>Téléphone :</p>
        <p><?= $commande["telephone"]?></p>
      
      </div>

      <div class="cote-a-cote" style="width:50%">
        <p>Adresse :</p>
        <p><?= $commande["adresse"]?></p>
      
      </div>
      
    <br>
    <table class="mtable" >
              <tr>
                <th>Désignation</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
                
               
                
              </tr>
             
                  <tr>
                    <td>
                      <?= $commande["nom_article"] ?>
                    </td>
                    <td>
                      <?= $commande["quantite"] ?>
                    </td>
                    <td>
                      <?= $commande["prix_unitaire"] ?>
                    </td>
                    <td>
                      <?= $commande["prix"]  ?>
                    </td>
                   
                  </tr>
                   
            </table>

       
</div>
</div>
</section>
<!--pour afficher les messages on va utiliser les sessions-->
<!-- pour modifier un article il faut d'abord assurer que les donner vont etre afficher encore une fois dans la formulaire pour faire la modification -->
<?php 
include 'pied.php';
?>
<script>
  // on va realiser dans cette partie le code qui va nous permettre de imprimer la facture
var btnPrint =document.querySelector('#btnPrint');
btnPrint.addEventListener("click",()=>{
window.print();

})

// on va creer une foncton qui va nous permettre de calcul la sommme de commande d'une maniere automatique
function setPrix(){
  var article=document.querySelector("#id_article");
  var quantite=document.querySelector("#quantite");
  var prix=document.querySelector("#prix");

  var prixUnitaire=article.options[article.selectedIndex].getAttribute("data-prix");
  prix.value=Number(quantite.value)*Number(prixUnitaire);
}
</script>
<!--  on va passer maintenant a la creation du facture -->
<!-- pour annuler le vente il faut ajouter un variable qui de type booleen qui indique que le vente annuler si il est egal a 0  et n'est pas annuler s'il est egal a 1 -->