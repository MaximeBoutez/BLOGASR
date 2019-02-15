<?php
session_start();

require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'includes/connexion.inc.php';

include_once 'includes/fonctions.inc.php';

require_once('libs/Smarty.class.php');

$smarty = new Smarty();

$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('configs/');
//$smarty->setCacheDir('cache/');

$smarty->assign('name','Romain');

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

include_once 'include/header.inc.php';
include_once 'include/menu.inc.php';

$smarty->display('smarty-test.tpl');

include_once 'include/footer.inc.php';

?>
