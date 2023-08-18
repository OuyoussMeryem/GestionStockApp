<?php 
include 'entete.php';
if(!empty($_GET["id"])){
// on utilise get car id va etre presenter dans url 
$categorie=getCategorie($_GET["id"]);
// maintenant il suffit f'afficher les donner de l'categorie dans les input du formulaire
}
?>

<div class="home-content">
  <div class="overview-boxes">
    <div class="box" style="">
        <form action="<?= !empty($_GET["id"]) ? "../model/modifCategorie.php" : "../model/ajoutCategorie.php"  ?>" method="POST">
            <label for="libelle_categorie">Libelle</label>
            <input value="<?= !empty($_GET["id"]) ? $categorie["libelle_categorie"] : "" ?>" type="text" name="libelle_categorie" id="libelle_categorie" placeholder="veuillez saisir le nom">
            <input value="<?= !empty($_GET["id"]) ? $categorie["id"] : "" ?>" type="hidden" name="id" id="id">
            
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
        <div class="box" style="margin-right:100px">
            <table class="mtable" >
              <tr>
                
                <th>Libelle</th>
                <th>Action</th>
              </tr>
              <?php    
              $categories=getCategorie();
              if(!empty($categories) && is_array($categories)){
                foreach($categories as $key=> $value){
                  ?>
                  <tr>
                    <td>
                      <?= $value["libelle_categorie"] ?>
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
<!-- pour modifier un categorie il faut d'abord assurer que les donner vont etre afficher encore une fois dans la formulaire pour faire la modification -->
<?php 
include 'pied.php';
?>
