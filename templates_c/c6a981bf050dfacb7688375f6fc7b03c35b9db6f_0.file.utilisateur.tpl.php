<?php
/* Smarty version 3.1.33, created on 2019-01-18 12:29:12
  from 'C:\wamp64\www\Projet\Blog\bootstrap\templates\utilisateur.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c41c69862b125_11081918',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6a981bf050dfacb7688375f6fc7b03c35b9db6f' => 
    array (
      0 => 'C:\\wamp64\\www\\Projet\\Blog\\bootstrap\\templates\\utilisateur.tpl',
      1 => 1547214047,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c41c69862b125_11081918 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class ="mt-5">Ajouter un utilisateur</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12 text-center">
                <form action="utilisateur.php" method="post" enctype="multipart/form-data" id="form_article">
                    <div class="form-group">
                        <label for="nom" class="col-form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="prenom" class="col-form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" required>
                    </div>
                    
                     <div class="form-group">
                        <label for="mdp" class="col-form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" value="" required>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" value="ajouter">Ajouter l'utilisateur</button>
                </form>
            </div>
        </div>
    </div>
<?php }
}
