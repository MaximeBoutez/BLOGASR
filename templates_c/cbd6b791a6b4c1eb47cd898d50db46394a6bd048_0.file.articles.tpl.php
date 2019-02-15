<?php
/* Smarty version 3.1.33, created on 2019-02-01 12:52:28
  from 'C:\wamp64\www\Projet\Blog\bootstrap\templates\articles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c54410c8ef863_89791656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbd6b791a6b4c1eb47cd898d50db46394a6bd048' => 
    array (
      0 => 'C:\\wamp64\\www\\Projet\\Blog\\bootstrap\\templates\\articles.tpl',
      1 => 1547219041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c54410c8ef863_89791656 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class ="mt-5">Ajouter un article</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <form action="article.php" method="post" enctype="multipart/form-data" id="form_article">
                    <div class="form-group">
                        <label for="titre" class="col-form-label">Titre</label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de votre article" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="texte">Texte</label>
                        <textarea class="form-control" id="text" name="texte" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" id="image" name="image" class="custom-file-input">
                            <label class="custom-file-label" for="image">choisir un fichier</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <label for="publie" class="form-check-label">
                                <input class="form-check-input" name="publie" id="publie" type="checkbox" value="1"> Publié ?
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="ajouter">Ajouter l'article</button>
                </form>
            </div>
        </div>
    </div><?php }
}
