<?php
/* Smarty version 3.1.29, created on 2016-03-05 16:11:32
  from "C:\xampp\htdocs\Intranet\view\templates\admin\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56daf72431d050_67740845',
  'file_dependency' => 
  array (
    '212496e1cb70b6ee7acf6a93a4663d7ff39adbcc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Intranet\\view\\templates\\admin\\index.tpl',
      1 => 1457190545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/meta.tpl' => 1,
    'file:admin/header.tpl' => 1,
    'file:admin/nav.tpl' => 1,
    'file:admin/footer.tpl' => 1,
  ),
),false)) {
function content_56daf72431d050_67740845 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1389056daf7242dd646_69065678';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/assets/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/assets/js/jquery-ui.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/assets/js/getXhr.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/assets/js/admin_index.js"><?php echo '</script'; ?>
>		
    </head>

    <body role="document">	
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('con'=>$_smarty_tpl->tpl_vars['con']->value), 0, false);
?>

        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('con'=>$_smarty_tpl->tpl_vars['con']->value), 0, false);
?>



        <div id="container" class="container-fluid">

            <div id="contenu">
                <h2>Overview</h2>
                <p>Ceci est la page d'acceuil de la partie admin.</p>
                <p>Vous pourrez voir une vue d'ensemble de la gestion de la HEHLan.</p>
                <h3>Statistiques</h3>
                <p>Dessiner de beaux graphes :)</p>
            </div>
        </div>

        <!-- gap to have the footer in the bottom of the window -->
        <div style="height: 450px;">

        </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php if ($_smarty_tpl->tpl_vars['chat']->value) {?>
            <?php echo '<script'; ?>
 type="text/javascript">
                $("#bloc_chat_message").keyup(function (event)
                {
                    if (event.keyCode == 13)
                    {
                        $("#bloc_chat_bouton").click();
                    }
                });

                afficher(0);
                users();
            <?php echo '</script'; ?>
>
        <?php }?>
    </body>
</html><?php }
}
