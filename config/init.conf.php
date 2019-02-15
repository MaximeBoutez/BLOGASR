<?php
// PAGE DE CONFIGURATION 
error_reporting(E_ALL);
ini_set("display_error",1);

function print_r2($param){
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

define('_nb_art_par_page', 2);
?>
