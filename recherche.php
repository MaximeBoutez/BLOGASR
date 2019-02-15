<?php
// PAGE DE RECHERCHE DU BLONG
session_start(); //DEBUT SESSION
// INSERTION FICHIER DE CONFIGURATION
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.inc.php';
// INSERTION PARTIE HTML
require_once 'include/connexion.inc.php';
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';
//INSERTION SMARTY
require_once("libs/Smarty.class.php");
?>



<?php





//ACTIVATION ERREUR PHP
error_reporting(E_ALL);
ini_set('display-errors','on');

// ACTIVATION ERREUR PDO
try{
  
  // ACTIVATION ERREUR PDO
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // MODE DE FETCH PAR DEFAUT : FETCH_ASSOC / FETCH_OBJ / FETCH_BOTH
   $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e){
  echo "Erreur : ".$e->getMessage();
}


//RECUPERATION PROPRE AVANT DE LES UTILISER
$q = !empty($_GET['q']) ? $_GET['q'] : NULL; 
$publie = "oui";
//pour pouvoir faire une recherche de texte dans une chaine de caractère, il faut ajouter % devant et derrière la recherche
$texte = !empty($_GET['q']) ? "%".$_GET['q']."%" : NULL;

if($q){
  $s = explode(" ", $q);
  /*$sql = "SELECT bootstrap "
        . "id, "
        . "titre, "
        . "texte, "
        . "publie, "
        . "FROM bootstrap "
        . "WHERE publie = :publie "
        . "AND (titre =:recherche OR texte = :recherche) "
       /* . "LIMIT :index, :nb_article_par_page"; */
	   $sql = "SELECT * FROM bootstrap where publie = :publie and (titre= :recherche or texte like :texte)";
  // REQUETE BASE DE DONNEES
 $sth = $bdd->prepare($sql); 
 $sth->execute(array(
        "recherche"=> $_GET['q'],
		"publie"=> $publie,
		"texte"=> $texte
    ));
  $i = 0;/*
  foreach($s as $mot){
      if(strlen($mot) > 3){
          if($i==0){
              $sql.=(' WHERE ');
          }
          else{
              $sql.('" OR ');
          }
          $sql.=('keywords LIKE  "%'.$mot.'%"');
          $i++;
               
      }
  }
   
  //execution "propre" d'une requête 
  try{
    $result = $bdd->query($sql);
  }catch(Exception $e){
    echo "Erreur dans la requête :" .$sql ." <br>".$e->getMessage();
  }*/
  
  while($data = $sth->fetch()){
	  echo $data['texte'];
	  echo "<br>";
  }
}

// INSERTION SMARTY
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');



//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//INSERTION PAGE HEADER, NAVIGATION
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';

$smarty->display('recherche.tpl');
// INSERTION BAS DE PAGE
include_once 'include/footer.inc.php';




?>