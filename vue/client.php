<?php 
include 'entete.php';
if(!empty($_GET["id"])){
// on utilise get car id va etre presenter dans url 
$client=getClient($_GET["id"]);
// maintenant il suffit f'afficher les donner de l'client dans les input du formulaire
}
?>

<div class="home-content">
  <div class="overview-boxes">
    <div class="box" style="">
        <form action="<?= !empty($_GET["id"]) ? "../model/modifClient.php" : "../model/ajoutClient.php"  ?>" method="POST">
            <label for="nom">Nom du client</label>
            <input value="<?= !empty($_GET["id"]) ? $client["nom"] : "" ?>" type="text" name="nom" id="nom" placeholder="veuillez saisir le nom">
            <input value="<?= !empty($_GET["id"]) ? $client["id"] : "" ?>" type="hidden" name="id" id="id">
            <!-- pour select on va utiliser l'attribut selected -->
            <label for="prenom">Prénom du client</label>
            <input value="<?= !empty($_GET["id"]) ? $client["prenom"] : "" ?>" type="text" name="prenom" id="prenom" placeholder="veuillez saisir le prenom">
            
           
             <label for="telephone"> N° de téléphone </label>
            <input value="<?= !empty($_GET["id"]) ? $client["telephone"] : "" ?>" type="text" name="telephone" id="telephone"  placeholder="veuillez saisir le N° de téléphone" >
           
            <label for="adresse">Adresse</label>
            <input value="<?= !empty($_GET["id"]) ? $client["adresse"] : "" ?>" type="text" name="adresse" id="adresse"  placeholder="veuillez saisir l'adresse">
           
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
                $clients=getClient(null,$_GET);
              } else {
                $clients=getClient();
              }    
              
              if(!empty($clients) && is_array($clients)){
                foreach($clients as $key=> $value){
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