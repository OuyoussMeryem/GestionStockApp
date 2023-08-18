<?php 
include 'entete.php';
if(!empty($_GET["id"])){
// on utilise get car id va etre presenter dans url 
$fournisseur=getfournisseur($_GET["id"]);
// maintenant il suffit f'afficher les donner de l'fournisseur dans les input du formulaire
}
?>

<div class="home-content">
  <div class="overview-boxes">
    <div class="box" style="">
        <form action="<?= !empty($_GET["id"]) ? "../model/modiffournisseur.php" : "../model/ajoutfournisseur.php"  ?>" method="POST">
            <label for="nom">Nom du fournisseur</label>
            <input value="<?= !empty($_GET["id"]) ? $fournisseur["nom"] : "" ?>" type="text" name="nom" id="nom" placeholder="veuillez saisir le nom">
            <input value="<?= !empty($_GET["id"]) ? $fournisseur["id"] : "" ?>" type="hidden" name="id" id="id">
            <!-- pour select on va utiliser l'attribut selected -->
            <label for="prenom">Prénom du fournisseur</label>
            <input value="<?= !empty($_GET["id"]) ? $fournisseur["prenom"] : "" ?>" type="text" name="prenom" id="prenom" placeholder="veuillez saisir le nom">
            
           
             <label for="telephone"> N° de téléphone </label>
            <input value="<?= !empty($_GET["id"]) ? $fournisseur["telephone"] : "" ?>" type="text" name="telephone" id="telephone"  placeholder="veuillez saisir le Numéro de téléphone" >
           
            <label for="adresse">Adresse</label>
            <input value="<?= !empty($_GET["id"]) ? $fournisseur["adresse"] : "" ?>" type="text" name="adresse" id="adresse"  placeholder="veuillez saisir le prix">
           
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
        <div class="box" style="margin-right:200px;display:block;">
         <form action="" method="GET">
         <table class="mtable" >
              <tr>
                <th>Nom </th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
              </tr>
              <tr>
                <td><input type="text" name="nom" id="nom" placeholder="saisir le nom">
                </td>

                <td><input type="text" name="prenom" id="prenom" placeholder="saisir le prenom">
                </td>

                <td><input type="text" name="telephone" id="telephone"  placeholder="saisir le N° de téléphone" >
                </td>

                <td><input type="text" name="adresse" id="adresse"  placeholder="saisir l'adresse">
                </td>
                
              </tr>
              
            </table>
            <br>
            <button type="submit">Valider</button>
         </form>
         <br>
         <table class="mtable" >
              <tr>
                <th>Nom </th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Action</th>
                
              </tr>
              <?php
              if (!empty($_GET)) {
                $fournisseurs=getfournisseur(null,$_GET);
              } else {
                $fournisseurs=getfournisseur();
              }     
              
              if(!empty($fournisseurs) && is_array($fournisseurs)){
                foreach($fournisseurs as $key=> $value){
                  ?>
                  <tr>
                    <td>
                      <?= $value["nom"] ?>
                    </td>
                    <td>
                      <?= $value["prenom"] ?>
                    </td>
                    <td>
                      <?= $value["telephone"] ?>
                    </td>
                    <td>
                      <?= $value["adresse"] ?>
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
























<<