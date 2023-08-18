<?php 

// le debut de la session on va le mettre avec la connexion avec la base de donnee
$servername="localhost";
$dbname="ikram_tc";
$username="root";
$password="meryembirouhifatat";
try {
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     return $conn;
} catch (Exception $e) {
  die("erreur de connexion".$e->getMessage()) ;
}
?>