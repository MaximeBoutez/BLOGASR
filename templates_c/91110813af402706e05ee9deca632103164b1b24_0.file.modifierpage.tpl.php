<?php
/* Smarty version 3.1.33, created on 2019-01-16 13:39:14
  from 'C:\wamp64\www\bootstrap\templates\modifierpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3f3402ed8a16_33282883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91110813af402706e05ee9deca632103164b1b24' => 
    array (
      0 => 'C:\\wamp64\\www\\bootstrap\\templates\\modifierpage.tpl',
      1 => 1547645950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3f3402ed8a16_33282883 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <body>
	
<form action = "modifierpage.php" method = "post">
		<input name="texte" id="texte" placeholder="texte">
		<input name="titre" id="titre" placeholder="titre">
		<!-- pour recupéré l'id passé en get -->    
		<input type="hidden" value="" id="id" name="id">
		<input type="submit" value="Modifier"/>
	</form>	
	</body>
</html><?php }
}
