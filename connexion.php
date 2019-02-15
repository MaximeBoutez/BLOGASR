<?php
//CECI EST LA PAGE DE CONNEXION DU BLOG
session_start();
// INSERTION DES PAGES DE CONFIGURATION
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.inc.php';
// INSERTION DES PARTIES HTML
require_once 'include/connexion.inc.php';
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';
//INSERTION DE SMARTY
require_once("libs/Smarty.class.php");

if (isset($_SESSION['notification'])) {
    $color_notification = $_SESSION['notification']['result'] == TRUE ? 'success' : 'danger'; //NOTIFICATION 
}

if (isset($_POST['submit'])) {
  print_r2($_POST);
  print_r2($_FILES);

  $notification ="";
//REQUETE BASE DE DONNEES CONNEXION UTILISATEUR
  $sql_insert = "SELECT * "
                ."FROM utilisateur "
                ."WHERE email = :email "
                ."AND mdp = :mdp";

      /*@var $bdd PDO*/
      $sth = $bdd->prepare($sql_insert);

$sth->bindValue(':email',$_POST['email'], PDO::PARAM_STR); //ASSOCIATION DE VALEURS
$sth->bindValue(':mdp',cryptPassword($_POST['mdp']), PDO::PARAM_STR); //ASSOCIATION DE VALEURS

$result = $sth->execute(); // EXECUTION DE LA REQUETE

var_dump($result);

//REQUETE DE CONNEXION
if ($sth->rowCount() <1) {
  $notification = '<b>Attention</b> login et/ou mot de passe incorrect.'; // NOTIFICATION MOT DE PASSE INCORRECT
  $result_notification = FALSE;
  $url_redirect ='connexion.php';
}else {

  $sid = sid($_POST['email']);
// CONNEXION DE L'UTILISATEUR
  $sql_update = "UPDATE utilisateur "
                ."SET sid = :sid "
                ."WHERE email = :email;";

  /*@var $bdd PDO*/
  $sth_update = $bdd->prepare($sql_update);

  // SECURISATION DES VARIABLES
  $sth_update->bindValue(':email',$_POST['email'], PDO::PARAM_STR);
  $sth_update->bindValue(':sid',$sid, PDO::PARAM_STR);

  $result_update = $sth_update->execute();

  setcookie('sid', $sid, time() +86400); //DATE DU JOUR

  $notification = '<b>Félicitation</b> Vous êtes bien connecté.'; //NOTIFICATION DE CONNEXION

  $result_notification = TRUE;

  $url_redirect ='index.php';
}

$_SESSION['notification']['message'] = $notification;
$_SESSION['notification']['result'] = $result_notification;

header("Location:$url_redirect");
exit();
// FIN DE LA REQUETE
}
else{


// INSERTION DU MODELE DE TEMPLATE SMARTY
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');



//** un-comment the following line to show the debug console
//$smarty->debugging = true;


if (isset($_SESSION['notification'])) {
$smarty->assign('session_var', $_SESSION);
$smarty->assign('color_notification', $color_notification);
unset($_SESSION['notifications']);
}


// INSERTION DES PAGES INCLUDE
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';

$smarty->display('connexion.tpl');

include_once 'include/footer.inc.php';


}

?>
