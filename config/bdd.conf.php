<?php
// PAGE DE CONFIGURATION BASE DE DONNEES
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', '');
    $bdd->exec("set names utf8");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

