<?php 
define('USER',"root"); 
define('PASSWD',""); 
define('SERVER',"localhost"); 
define('BASE',"bibliotheque_iut"); 


function dbconnect(){ 
    $dsn="mysql:dbname=".BASE.";host=".SERVER; 
    try{ 
      $connexion=new PDO($dsn,USER,PASSWD); 
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activer le rapport d'erreurs
      $connexion->exec("set names utf8"); 
    } 
    catch(PDOException $e){ 
      printf("Échec de la connexion: %s\n", $e->getMessage()); 
      exit(); 
    } 
    return $connexion; 
  }
  
?> 
