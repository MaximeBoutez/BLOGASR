<?php
//CECI EST LA PAGE DE DECONNEXION
session_start(); //DEBUT DE LA REQUETE

//INSERTION DES PAGES DE CONFIGURATION
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.inc.php';
// INSERTION DES PARTIES HTML 
require_once 'include/connexion.inc.php';
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';


setcookie('sid', '', -1);
header("Location: index.php");
?>
