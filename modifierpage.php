<?php
// CECI EST LA PAGE DE MODIFICATION D'ARTICLE DU BLOG
session_start(); // DEBUT DE LA SESSION
// INSERTION FICHIER DE CONFIGURATION
require_once 'config/init.conf.php';
require_once 'config/bdd.conf.php';
require_once 'include/fonction.inc.php';
// INSERTION PARTIE HTML
require_once 'include/connexion.inc.php';
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';
// INSERTION SMARTY
require_once("libs/Smarty.class.php");

?>





<?php

if (isset($_POST['titre']) && isset($_POST['texte'])) {

		// DEBUT REEQUETE
		$sql = 'UPDATE bootstrap SET texte=:texte, titre=:titre WHERE id=:id';
		
		$sth = $bdd->prepare($sql); 
		$sth->execute(array(
        "texte"=> $_POST['texte'],
		"id"=> $_POST['id'],
		"titre"=>$_POST['titre']
    ));
		
		$sth =null;
		/*// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base
		mysql_close();*/
		

		// MESSAGE PERMETTANT DE SE RENDRE COMPTE DE LA MODIFICATION EFFECTUEE
		echo 'Le nouveau mot de passe de '.$_POST['titre'].' est : '.$_POST['texte'];
		$url_redirect ='index.php';
        
           header("Location:$url_redirect");
}
else {
$smarty = new Smarty();
//INSERTION SMARTY
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');



//** un-comment the following line to show the debug console
//$smarty->debugging = true;
//INSERTION SMARTY
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';

$smarty->display('modifierpage.tpl');

include_once 'include/footer.inc.php';

//On insert les parties HTML du site
}
?>
<!-- pour recupéré l'id passé en get -->        
<script type="text/javascript">
    document.getElementById('id').value = <?php echo $_GET['id']?>;
 </script>        
        
        
</body>
</html>
