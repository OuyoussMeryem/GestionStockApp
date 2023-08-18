<?php 
include 'entete.php';
if(!empty($_GET["id"])){
// on utilise get car id va etre presenter dans url 
$article=getArticle($_GET["id"]);
// maintenant il suffit f'afficher les donner de l'article dans les input du formulaire
}
?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="box" style="">
        <form action="<?= !empty($_GET["id"]) ? "../model/modifArticle.php" : "../model/ajoutArticle.php"  ?>" method="POST" enctype="multipart/form-data">
            <label for="nom_article">Nom de l'article</label>
            <input value="<?= !empty($_GET["id"]) ? $article["nom_article"] : "" ?>" type="text" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom">
            <input value="<?= !empty($_GET["id"]) ? $article["id"] : "" ?>" type="hidden" name="id" id="id">
            <!-- pour select on va utiliser l'attribut selected -->
            <label for="id_categorie">Catégorie</label>
             <select name="id_categorie" id="id_categorie">
             <option value="">--choisir une catégorie--</option>
            <?php 
              $categories=getCategorie();
              if(!empty($categories) && is_array($categories)){
               foreach($categories as $key=>$value){
                 ?>
                 
                 <option <?= !empty($_GET["id"]) && $value["libelle_categorie"] =="Ordinateur" ? "selected" : "" ?> value="<?=$value["id"]?>"><?=$value["libelle_categorie"]?></option>
                <?php
              }   
                 
             }
            ?>
            </select>

            <label for="quantite">Quantité</label>
            <input value="<?= !empty($_GET["id"]) ? $article["quantite"] : "" ?>" type="number" name="quantite" id="quantite"  placeholder="veuillez saisir la quantité" >
           
            <label for="prix_unitaire">Prix unitaire </label>
            <input value="<?= !empty($_GET["id"]) ? $article["prix_unitaire"] : "" ?>" type="number" name="prix_unitaire" id="prix_unitaire"  placeholder="veuillez saisir le prix">
           
            <label for="date_creation">Date de création</label>
            <input value="<?= !empty($_GET["id"]) ? $article["date_creation"] : "" ?>" type="datetime-local" name="date_creation" id="date_creation" placeholder="date de création ">
            
            <label for="images">Image </label>
            <input value="<?= !empty($_GET["id"]) ? $article["images"] : "" ?>" type="file" name="images" id="images" >
            
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
        <div class="box" style="margin-right:50px;display:block;">
        
        <form action="" method="GET">

<table class="mtable" >
  <tr>
    <th>Nom de l'article</th>
    <th>Catégorie</th>
    <th>Quantité</th>
    <th>Prix unitaire</th>
    <th>Date de création</th>
    
    
  </tr>
  <tr>
    <td><input type="text" name="nom_article" id="nom_article" placeholder="saisir le nom"></td>
    
    <td>
    <select name="id_categorie" id="id_categorie">
      <option value="">--choisir une catégorie--</option>
          <?php 
            $categories=getCategorie();
            if(!empty($categories) && is_array($categories)){
            foreach($categories as $key=>$value){
              ?>
              
              <option <?= !empty($_GET["id"]) && $value["libelle_categorie"] =="Ordinateur" ? "selected" : "" ?> value="<?=$value["id"]?>" placeholder="saisir le nom"><?=$value["libelle_categorie"]?></option>
              <?php
            }   
              
          }
          ?>
    </select>
    </td>
    
    <td><input type="number" name="quantite" id="quantite"  placeholder="saisir la quantité" >
    </td>
    
    <td><input type="number" name="prix_unitaire" id="prix_unitaire"  placeholder="saisir le prix">
    </td>

    <td><input type="date" name="date_creation" id="date_creation" placeholder="date de création ">
    </td>
    
  </tr>
</table>
<br>
<button type="submit">Valider</button>
</form>
   <br>        
        <table class="mtable" >
              <tr>
                <th>Nom de l'article</th>
                <th>Catégorie</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Date de création</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              
              <?php 
              if (!empty($_GET)) {
                $articles=getArticle(null,$_GET);
              } else {
                $articles=getArticle();
              }
                 
              
              if(!empty($articles) && is_array($articles)){
                foreach($articles as $key=> $value){
                  ?>
                  <tr>
                    <td>
                      <?= $value["nom_article"] ?>
                    </td>
                    <td>
                      <?= $value["libelle_categorie"] ?>
                    </td>
                    <td>
                      <?= $value["quantite"] ?>
                    </td>
                    <td>
                      <?= $value["prix_unitaire"] ?>
                    </td>
                    <td>
                      <?= date("d/m/Y H:i:s",strtotime($value["date_creation"]))  ?>
                    </td>
                    <td>
                     <img width="100" height="100" src="<?= $value["images"] ?>" alt="<?= $value["nom_article"] ?>">
                    </td>
                    <td>
                      <a href="?id=<?= $value["id"] ?>"><i class="bx bx-edit-alt"></i></a>
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
























