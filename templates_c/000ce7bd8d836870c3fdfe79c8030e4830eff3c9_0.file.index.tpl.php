<?php
<<<<<<< HEAD:templates_c/000ce7bd8d836870c3fdfe79c8030e4830eff3c9_0.file.index.tpl.php
/* Smarty version 3.1.29, created on 2016-02-22 01:48:23
  from "D:\DATA\heh-www\BACKUP INTRANET\www\templates\default\index.tpl" */
=======
/* Smarty version 3.1.29, created on 2016-02-21 22:54:54
  from "E:\wamp\www\Intranet\templates\default\index.tpl" */
>>>>>>> ba852f18a7582363267003b5386053a4fd406876:templates_c/383b9127da1d29cf3682df83709f3a9249af6cc2_0.file.index.tpl.php

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
<<<<<<< HEAD:templates_c/000ce7bd8d836870c3fdfe79c8030e4830eff3c9_0.file.index.tpl.php
  'unifunc' => 'content_56ca5ad7226e41_91871670',
=======
  'unifunc' => 'content_56ca322e94af64_43319796',
>>>>>>> ba852f18a7582363267003b5386053a4fd406876:templates_c/383b9127da1d29cf3682df83709f3a9249af6cc2_0.file.index.tpl.php
  'file_dependency' => 
  array (
    '000ce7bd8d836870c3fdfe79c8030e4830eff3c9' => 
    array (
      0 => 'D:\\DATA\\heh-www\\BACKUP INTRANET\\www\\templates\\default\\index.tpl',
      1 => 1455886514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
<<<<<<< HEAD:templates_c/000ce7bd8d836870c3fdfe79c8030e4830eff3c9_0.file.index.tpl.php
function content_56ca5ad7226e41_91871670 ($_smarty_tpl) {
=======
function content_56ca322e94af64_43319796 ($_smarty_tpl) {
>>>>>>> ba852f18a7582363267003b5386053a4fd406876:templates_c/383b9127da1d29cf3682df83709f3a9249af6cc2_0.file.index.tpl.php
?>

<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'templates/default/paths.conf', null, 0);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)$_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'templatePath'))."meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
 
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/assets/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/assets/js/getXhr.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript">
            function news_toggle(idn)
            {
                var nom = '#contenu_news_' + idn;
                $(nom).toggle();
            }
        <?php echo '</script'; ?>
>
    </head>
    <body role="document">
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)$_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'templatePath'))."header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('con'=>$_smarty_tpl->tpl_vars['con']->value,'next_matches'=>$_smarty_tpl->tpl_vars['next_matches']->value), 0, true);
?>

        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)$_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'templatePath'))."nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('con'=>$_smarty_tpl->tpl_vars['con']->value,'navTournois'=>$_smarty_tpl->tpl_vars['navTournois']->value), 0, true);
?>

        <div id="container" class="container-fluid">
            <div class="row">
                <div id="bloc_news" class="col-lg-6 col-xs-12">
                    <h3>News</h3>
                    <?php
$__section_sec1_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1'] : false;
$__section_sec1_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['newsList']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sec1_0_total = $__section_sec1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = new Smarty_Variable(array());
if ($__section_sec1_0_total != 0) {
for ($__section_sec1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] = 0; $__section_sec1_0_iteration <= $__section_sec1_0_total; $__section_sec1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']++){
?>
                        <div class="une_news" id="bloc_news_<?php echo $_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['id_news'];?>
">
                            <div class="titre_news" id="titre_news_<?php echo $_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['id_news'];?>
" onclick="news_toggle(<?php echo $_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['id_news'];?>
);">
                                <?php echo nl2br($_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['titre']);?>

                                <div class="date_news" id="footer_news_<?php echo $_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['id_news'];?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['quand'];?>

                                </div>
                            </div>
                            <div class="contenu_news" id="contenu_news_<?php echo $_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['id_news'];?>
">
                                <?php echo nl2br($_smarty_tpl->tpl_vars['newsList']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['texte']);?>

                            </div>
                        </div>
                    <?php
}
}
if ($__section_sec1_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = $__section_sec1_0_saved;
}
?>
                </div>		
                <div id="bloc_chat" class="col-lg-6 col-xs-12">
                    <?php if ($_smarty_tpl->tpl_vars['con']->value) {?>
                        <h3>HEHLan Chat</h3>
                        <?php if ($_smarty_tpl->tpl_vars['chat']->value) {?>
                            <div id="bloc_chat_box">
                                <div id="bloc_chat_texte"></div>
                                <div id="bloc_chat_users">
                                    <strong>Connectés :</strong><br>				
                                </div>
                                <div id="bloc_chat_send">
                                    <input type="text" name="message" id="bloc_chat_message" />
                                    <input type="button" value="Envoyer" id="bloc_chat_bouton" onclick="ecrire();" />
                                </div>
                            </div>
                        <?php } else { ?>
                            <div id="bloc_chat_texte">			
                                <strong>Sorry les gars ... le chat est désactivé :o/</strong>
                            </div>
                        <?php }?>
                    <?php } else { ?>
                        <h3 id="bloc_chat_titre">Connexion</h3>	
                        <div id="bloc_connexion">
                            <form method="POST" id="bloc_connexion_form">
                                <table id="bloc_connexion_table">
                                    <tr>
                                        <td><label><strong>Login</strong></label></td>
                                        <td><input type="text" name="login" /></td>
                                    </tr>
                                    <tr>
                                        <td><label><strong>Password</strong></label></td>
                                        <td><input type="password" name="pwd" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" value="Connexion" /></td>						
                                    </tr>					
                                </table>
                            </form>
                        </div>
                    <?php }?>
                </div>
            </div>			
        </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((string)$_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'templatePath'))."footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        <?php if ($_smarty_tpl->tpl_vars['chat']->value) {?>
            <?php echo '<script'; ?>
 type="text/javascript">
                $("#bloc_chat_message").keyup(function (event)
                {
                    if (event.keyCode === 13)
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
