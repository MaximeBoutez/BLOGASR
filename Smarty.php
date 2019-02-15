<?php

require_once("libs/Smarty.class.php");

$prenom = 'audric'; 




$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');

$smarty->assign('name','$prenom');

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';

$smarty->display('smarty-test.tpl');

include_once 'includes/footer.inc.php';

?>
