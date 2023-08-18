<?php 

include 'connexion.php';
// maintenant on va creer la fonction qui va nous permettre d'obtenir tout les article qu'on a 
function getArticle($id=null,$searchData=array()){
    if(!empty($id)){
        $sql="SELECT a.id,nom_article,libelle_categorie,quantite,prix_unitaire,date_creation,
        id_categorie,images FROM article AS a,categorie_article AS c where a.id_categorie=c.id AND a.id=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array($id));
        return $result->fetch();

    }elseif (!empty($searchData)) {
       $search="";
    //    la fonction extract nous permettons de mettre en place l'index et de recuperer la valeur coresspond a ce index 
       extract($searchData);
       if(!empty($nom_article)) $search .="AND a.nom_article LIKE '%$nom_article%' ";
       if(!empty($id_categorie)) $search .="AND a.id_categorie = $id_categorie ";
       if(!empty($quantite)) $search .="AND a.quantite = $quantite ";
       if(!empty($prix_unitaire)) $search .="AND a.prix_unitaire = $prix_unitaire ";
       if(!empty($date_creation)) $search .="AND date(a.date_creation) = '$date_creation' ";
       
       $sql="SELECT a.id,nom_article,libelle_categorie,quantite,prix_unitaire,date_creation,id_categorie,images FROM article AS a,categorie_article AS c where a.id_categorie=c.id $search";
       // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
       $result=$GLOBALS["conn"]->prepare($sql);
       $result->execute();
       return $result->fetchAll(); 

    } else{

        $sql="SELECT a.id,nom_article,libelle_categorie,quantite,prix_unitaire,date_creation,id_categorie,images FROM article AS a,categorie_article AS c where a.id_categorie=c.id";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }
    
}

function getClient($id=null,$searchData=array()){
    if(!empty($id)){
        $sql="SELECT * FROM client where id=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array($id));
        return $result->fetch();

    }elseif (!empty($searchData)) {
        $search="";
     //    la fonction extract nous permettons de mettre en place l'index et de recuperer la valeur coresspond a ce index 
        extract($searchData);
        if(!empty($nom)) $search .="WHERE nom LIKE '%$nom%' ";
        if(!empty($prenom)) $search .="WHERE prenom LIKE '%$prenom%' ";
        if(!empty($telephone)) $search .="WHERE telephone LIKE '%$telephone%' ";
        if(!empty($adresse)) $search .="WHERE adresse LIKE '%$adresse%' ";

        $sql="SELECT * FROM client $search";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute();
        return $result->fetchAll();
 
     } else{

        $sql="SELECT * FROM client";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }
    
}

function getVente($id=null,$searchData=array()){
    // dans ce cas pour recuperer les choses il faut faire la jointure 
    if(!empty($id)){
        $sql="SELECT v.id,nom_article , nom , prenom , v.quantite , prix , date_vente,prix_unitaire,adresse,telephone,v.mode FROM vente AS v ,client AS c ,article AS a WHERE v.id_article = a.id AND v.id_client = c.id AND v.id=? AND etat=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array($id,1));
        return $result->fetch();

    }else{

        $sql="SELECT  v.id,nom_article , nom , prenom , v.quantite , prix , date_vente,v.mode,a.id AS idarticle FROM vente AS v ,client AS c ,article AS a WHERE v.id_article = a.id AND v.id_client = c.id AND etat=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array(1));
        return $result->fetchAll();
    }
    
}

function getfournisseur($id=null,$searchData=array()){
    if(!empty($id)){
        $sql="SELECT * FROM fournisseur where id=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array($id));
        return $result->fetch();

    }elseif (!empty($searchData)) {
        $search="";
     //    la fonction extract nous permettons de mettre en place l'index et de recuperer la valeur coresspond a ce index 
        extract($searchData);
        if(!empty($nom)) $search .="WHERE nom LIKE '%$nom%' ";
        if(!empty($prenom)) $search .="WHERE prenom LIKE '%$prenom%' ";
        if(!empty($telephone)) $search .="WHERE telephone LIKE '%$telephone%' ";
        if(!empty($adresse)) $search .="WHERE adresse LIKE '%$adresse%' ";

        $sql="SELECT * FROM fournisseur $search";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute();
        return $result->fetchAll();
 
     }else{

        $sql="SELECT * FROM fournisseur";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute();
        return $result->fetchAll();
    }
    
}
function getCommande($id=null){
    // dans ce cas pour recuperer les choses il faut faire la jointure 
    if(!empty($id)){
        $sql="SELECT co.id,nom_article , nom , prenom , co.quantite , prix , date_commande,prix_unitaire,adresse,telephone FROM commande AS co ,fournisseur AS f ,article AS a WHERE co.id_article = a.id AND co.id_fournisseur = f.id AND co.id=? AND etat=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array($id,1));
        return $result->fetch();

    }else{

        $sql="SELECT  co.id,nom_article , nom , prenom , co.quantite , prix , date_commande,a.id AS idarticle FROM commande AS co ,fournisseur AS f ,article AS a WHERE co.id_article = a.id AND co.id_fournisseur = f.id AND etat=?";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array(1));
        return $result->fetchAll();
    }
    
}
// dans cette partie on va creer une fonction qui va recuperer tout les commandes et les presenter dans le dashboard

function getAllcommande(){
        $sql="SELECT COUNT(*) AS nbre FROM commande";
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute();
        return $result->fetch();
}

function getAllvente(){
    $sql="SELECT COUNT(*) AS nbre FROM vente WHERE etat=?";
    $result=$GLOBALS["conn"]->prepare($sql);
    $result->execute(array(1));
    return $result->fetch();
}
function getAllarticle(){
    $sql="SELECT COUNT(*) AS nbre FROM article";
    $result=$GLOBALS["conn"]->prepare($sql);
    $result->execute();
    return $result->fetch();
}
function getCA(){
    $sql="SELECT SUM(prix) AS prix FROM vente where etat=?";
    $result=$GLOBALS["conn"]->prepare($sql);
    $result->execute(array(1));
    return $result->fetch();
}


function getLastvente($id=null){


        $sql="SELECT  v.id,nom_article , nom , prenom , v.quantite , prix , date_vente,v.mode,a.id AS idarticle FROM vente AS v ,client AS c ,article AS a WHERE v.id_article = a.id AND v.id_client = c.id AND etat=? ORDER BY date_vente DESC LIMIT 10  ";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array(1));
        return $result->fetchAll();
    }

    function getMostvente($id=null){


        $sql="SELECT  v.id,nom_article,  SUM(prix) AS prix FROM vente AS v ,client AS c ,article AS a WHERE v.id_article = a.id AND v.id_client = c.id AND etat=? GROUP BY a.id ORDER BY SUM(prix) DESC LIMIT 10 ";
        // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
        $result=$GLOBALS["conn"]->prepare($sql);
        $result->execute(array(1));
        return $result->fetchAll();
    }

    function getCategorie($id=null){
        if(!empty($id)){
            $sql="SELECT * FROM categorie_article where id=?";
            // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
            $result=$GLOBALS["conn"]->prepare($sql);
            $result->execute(array($id));
            return $result->fetch();
    
        }else{
    
            $sql="SELECT * FROM categorie_article";
            // pour que la variable connexion marche a l'interieur de notre fonction il faut utiliser la variable global 
            $result=$GLOBALS["conn"]->prepare($sql);
            $result->execute();
            return $result->fetchAll();
        }
        
    }
    


?>