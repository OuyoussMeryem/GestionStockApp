<?php 
include 'entete.php';
if(!empty($_GET["id"])){
// on utilise get car id va etre presenter dans url 
$article=getCommande($_GET["id"]);
// maintenant il suffit f'afficher les donner de l'article dans les input du formulaire
}
?>

<div class="home-content">
  <div class="overview-boxes">
    <div class="box" style="">
        <form action="<?= !empty($_GET["id"]) ? "../model/modifCommande.php" : "../model/ajoutCommande.php"  ?>" method="POST">
            <input value="<?= !empty($_GET["id"]) ? $article["id"] : "" ?>" type="hidden" name="id" id="id">
            <!-- pour select on va utiliser l'attribut selected -->
            <label for="id_article">Article</label>
            <select name="id_article" id="id_article">
            <option value="">--choisir un article--</option>
            <?php 
              $articles=getArticle();
              if(!empty($articles) && is_array($articles)){
               foreach($articles as $key=>$value){
                 ?>
                 <option data-prix="<?=$value["prix_unitaire"] ?>" value="<?=$value["id"] ?>"><?=$value["nom_article"]." - ".$value["quantite"]." disponible" ?></option>
                <?php
              }   
                  
             }
            ?>
            </select>
            <label for="id_fournisseur">Fournisseur</label>
            <select name="id_fournisseur" id="id_fournisseur">
            <option value="">--choisir un fournisseur--</option>
            <?php 
              $fournisseurs=getfournisseur();
              if(!empty($fournisseurs) && is_array($fournisseurs)){
               foreach($fournisseurs as $key=>$value){
                 ?>
                 <option  value="<?=$value["id"] ?>"><?=$value["nom"]." ".$value["prenom"] ?></option>
                <?php
              }   
                 
             }
            ?>
            </select>
           
            <label for="quantite"> Quantité</label>
            <input onkeyup="setPrix()" value="<?= !empty($_GET["id"]) ? $article["quantite"] : "" ?>" type="number" name="quantite" id="quantite"  placeholder="veuillez saisir la quantité" >
           
            <label for="prix">Prix</label>
            <input value="<?= !empty($_GET["id"]) ? $article["prix"] : "" ?>" type="number" name="prix" id="prix"  placeholder="veuillez saisir le prix">
            
            <button type="submit">Valider</button>
            <?php 
            if(!empty($_SESSION["message"]["text"])){
            ?>
            
            <div class="alert <?= $_SESSION["message"]["type"]?>">
            <?= $_SESSION["message"]["text"]?>
             </div>
 
           <?php    
            }
            ?>
        </form>
        </div>
        <div class="box" style="margin-right:50px">
            <table class="mtable" >
              <tr>
                <th>Article</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Date de commande</th>
                <th>Prix</th>
                <th>Action</th>
                
                
              </tr>
              <?php    
              $ventes=getCommande();
              if(!empty($ventes) && is_array($ventes)){
                foreach($ventes as $key=> $value){
                  ?>
                  <tr>
                    <td>
                      <?= $value["nom_article"] ?>
                    </td>
                    <td>
                      <?= $value["nom"]." ".$value["prenom"] ?>
                    </td>
                    <td>
                      <?= $value["quantite"] ?>
                    </td>
                    <td>
                      <?= date("d/m/Y H:i:s",strtotime($value["date_commande"]))  ?>
                    </td>
                    <td>
                      <?= $value["prix"] ?> 
                    </td>
                     
                    <td>
                      <a href="recuCommande.php?id=<?= $value["id"] ?>"><i class="bx bx-receipt"></i></a>
                      <a  onclick="annulecommande(<?= $value['id'] ?>,<?= $value['idarticle'] ?>,<?= $value['quantite'] ?>)" style="color:red;"><i class="bx bx-stop-circle"></i></a>
                    
                    </td>
                   
                    
                  </tr>
                   <?php
                }
              }
            ?>
            </table>

        </div>
  </div>     
</div>
</section>
<!--pour afficher les messages on va utiliser les sessions-->
<!-- pour modifier un article il faut d'abord assurer que les donner vont etre afficher encore une fois dans la formulaire pour faire la modification -->
<?php 
include 'pied.php';
?>
<script>
  function annulecommande(idcommande,idarticle,quantite){
if(confirm("voulez-vous vraiment annuler cette commande")){
  window.location.href="../model/annulecommande.php?idcommande="+idcommande+"&idarticle="+idarticle+"&quantite="+quantite;
}
}
// on va creer une foncton qui va nous permettre de calcul la sommme de vente d'une maniere automatique
function setPrix(){
  var article=document.querySelector("#id_article");
  var quantite=document.querySelector("#quantite");
  var prix=document.querySelector("#prix");

  var prixUnitaire=article.options[article.selectedIndex].getAttribute("data-prix");
  prix.value=Number(quantite.value)*Number(prixUnitaire);
}
</script>
<!--  on va passer maintenant a la creation du facture -->