<?php
// CECI EST LA PAGE DE CREATION DES COMPTES UTILISATEUR
session_start(); // DEBUT DE SESSION
//INSERTION FICHIER DE CONFIGURATION
include_once 'config/bdd.conf.php';
include_once 'config/init.conf.php';
//INSERTION PARTIE HTML
require_once 'include/connexion.inc.php';

include_once 'include/fonction.inc.php';
// INSERTION SMARTY
require_once("libs/Smarty.class.php");


if (isset($_POST['submit'])){
    print_r2($_POST);
    print_r2($_FILES);

    $sid = isset($_POST['sid']) ? $_POST['sid'] : 0;
    
    // REQUETE BASE DE DONNEES CREATION COMPTE
    $sql_insert = "INSERT INTO utilisateur"
            ."(nom, prenom, email, mdp, sid)"
            ."VALUES (:nom, :prenom, :email, :mdp, :sid);";
    $sth = $bdd-> prepare($sql_insert);
    // CREATION DES CHAMPS A REMPLIR
    $sth->bindvalue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $sth->bindvalue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $sth->bindvalue(':email', $_POST['email'], PDO::PARAM_STR);
    $sth->bindvalue(':mdp', cryptPassword ($_POST['mdp']), PDO::PARAM_STR);
    $sth->bindvalue(':sid', $sid, PDO::PARAM_STR);
    
    $result = $sth->execute(); // DEBUT REQUETE
    
    var_dump($result);
    
    $id_utilisateur = $bdd->lastInsertId();
    
    $notification = "<b>Bravo !</b> L'utilisateur a été inséré dans la base de données."; // MESSAGE DE NOTIFICATION 
    $result_notification = TRUE; // MESSAGE SI LA VARIABLE RENVOIE TRUE
    
    $_SESSION['notification']['message'] = $notification;
    $_SESSION['notification']['result'] = $result_notification;
    // INSERTION DU FICHIER INDEX
    header("Location: index.php");
    exit(); // FIN DE LA REQUETE
}else{


  //INSERTION SMARTY 
$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');



//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//INSERTION PAGE HEADER ET NAVIGATION
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';

$smarty->display('utilisateur.tpl');

include_once 'include/footer.inc.php';


}

?>

