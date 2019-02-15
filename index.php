<?php
// CECI EST L'INDEX DU BLOG
session_start();
// INSERTION DES FICHIERS DE CONFIGURATION
include_once 'config/bdd.conf.php';
include_once 'config/init.conf.php';
// INSERTION DES PARTIES HTML
require_once 'include/connexion.inc.php';
include_once 'include/header.inc.php';
include_once 'include/nav.inc.php';
require_once 'include/fonction.inc.php';

if (isset($_SESSION['notification'])){
    $color_notification = $_SESSION['notification']['result'] == TRUE ? 'succes' : 'danger';
}
// ARTICLE
$page_courante = !empty($_GET['page']) ? $_GET['page'] : 1;

$index_depart_MySQL = indexPagination($page_courante, _nb_art_par_page);

$nb_total_article_publie = nb_total_article_publie($bdd);

$nb_pages = ceil($nb_total_article_publie / _nb_art_par_page);

?>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">A Bootstrap 4 Starter Template</h1>
          <?php if (isset($_SESSION['notification'])) { ?>
          <div class="alert alert-<?= $color_notification ?> alerte" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
            <?= $_SESSION['notification']['message'] ?>
            <?php unset($_SESSION['notification']) ?>
          </div>
          <?php } ?>
        </div>
      </div>
          <?php
          $q = !empty($_GET['q']) ? $_GET['q'] : NULL; 
          $sql_select = "SELECT "   // REQUETE BASE DE DONNEES ARTICLE
				  ."id, "
                  ."titre, "
                  ."texte, "
                  ."publie, "
                  ."DATE_FORMAT(date, '%d/%m/%y') as date_fr "
                  ."FROM bootstrap "
                  ."WHERE publie = :publie "
                  ."LIMIT :index_depart, :nb_limit ";
          /*@var $bdd PDO*/
          $sth = $bdd->prepare($sql_select);
          
          $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
          $sth->bindValue(':index_depart', $index_depart_MySQL, PDO::PARAM_INT);
          $sth->bindValue(':nb_limit', _nb_art_par_page, PDO::PARAM_INT);
          
          $sth->execute();
          $tab_bootstrap = $sth->fetchAll(PDO::FETCH_ASSOC);
          
          //print_r2($tab_bootstrap);
		  
		  // RECHERCHE
		  //RECUPERATION VARIABLE

$publie = 1;
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
	   $sql = "SELECT * FROM bootstrap where publie = :publie and titre= :recherche or texte like :texte";
  // ARTICLE
 $sth = $bdd->prepare($sql); 
 $sth->execute(array(
        "recherche"=> $_GET['q'],
		"publie"=> $publie,
		"texte"=> $texte
    ));
	// BOUCLE
while($data = $sth->fetch()){
	  ?>
                <div class="col-md-12">
                 <div class="card">
                   <div class="card-body">
                     <h5 class="card-title"><?= $data['titre']; ?></h5>
                     <p class="card-text"><?= $data['texte']; ?></p>
                     <a href="#" class="btn btn-primary " name="btn" ><?= $data['date']; ?></a>
                     <?php if(($is_connect) == "TRUE"){
                      echo'<a href="modifierpage.php" class="btn btn-warning">Modifier</a>';
                      } ?>
                   </div>
                 </div>
               </div>
          <?php
  }
}
 if(!$q){        
          foreach ($tab_bootstrap as $value) {
           ?>
                <div class="col-md-12">
                 <div class="card">
                   <div class="card-body">
                     <h5 class="card-title"><?= $value['titre']; ?></h5>
                     <p class="card-text"><?= $value['texte']; ?></p>
                     <a href="#" class="btn btn-primary " name="btn" ><?= $value['date_fr']; ?></a>
                     <?php if(($is_connect) == "TRUE"){
                      echo'<a href="modifierpage.php?id='.$value['id'].'" class="btn btn-warning">Modifier</a>';
                      } ?>
                   </div>
                 </div>
               </div>
          <?php
          }
 }
          ?>
            <ul class="pagination">
                <?php for ($i = 1; $i <=$nb_pages; $i++){?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
            </ul>
        <!--
            <nav aria-label="Page navigation example">
            <ul class="pagination">   
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
           </nav>-->
      </div>
    

<?php
include_once 'include/footer.inc.php'; //INSERTION DU BAS DE PAGE
?>