<?php
session_start();
include 'connexion.php';
if(!empty($_POST["nom"]) 
&& !empty($_POST["prenom"]) 
&& !empty($_POST["username"]) 
&& !empty($_POST["mdp"])){
  $username=$_POST["username"];
  $sql="SELECT username FROM utilisateur WHERE username='$username'";
  $result=$conn->query($sql);
  
  if($result->rowCount() > 0){
   echo"ce utilisateur esy déjà existe";
    
    
     }
 else{ 
    
            $sql="INSERT INTO utilisateur(nom,prenom,username,mdp) values(?,?,?,?)";
                     $result=$conn->prepare($sql);
                     $result->execute(array($_POST["nom"] 
                                             , $_POST["prenom"] 
                                             ,$username
                                             , $_POST["mdp"]));
                                             $_SESSION["nom"] = $_POST["nom"];
                                             $_SESSION["prenom"] = $_POST["prenom"];
                                             header("location:../vue/index.php");
}
    
         
                 }else{
                    echo"remplir les cases vides ";
                 }                 

?>