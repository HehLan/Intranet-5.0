<?php
/* Smarty version 3.1.29, created on 2016-03-07 10:37:21
  from "C:\xampp\htdocs\Intranet\view\templates\admin\equipes.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56dd4bd19c7f91_80422987',
  'file_dependency' => 
  array (
    '45a645cc6d37acf0eb25a63d72368f5cdb9a02b8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Intranet\\view\\templates\\admin\\equipes.tpl',
      1 => 1457342619,
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
function content_56dd4bd19c7f91_80422987 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '168656dd4bd18f84a3_84241226';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/meta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
 
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'adminAssets');?>
/css/equipes.css" >
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/src/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/src/js/jquery-ui.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/src/js/getXhr.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'domain');?>
/src/js/admin_index.js"><?php echo '</script'; ?>
>		
    </head>

    <body role="document">	
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('con'=>$_smarty_tpl->tpl_vars['con']->value), 0, false);
?>

        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:admin/nav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('con'=>$_smarty_tpl->tpl_vars['con']->value), 0, false);
?>



        <div id="container" class="container-fluid">

            <div id="contenu">
                <div id="ListeEquipeAdmin">
                    <fieldset>
                        <legend>Liste des équipes</legend>
                        <table class="listeEquipes">
                            <thead>
                                <tr>
                                    <th>Les équipes</th>
                                    <th>Joueurs dans l'équipe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="listeEquipeAdmin">
                                            <?php
$_from = $_smarty_tpl->tpl_vars['teams']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_team_0_saved_item = isset($_smarty_tpl->tpl_vars['team']) ? $_smarty_tpl->tpl_vars['team'] : false;
$_smarty_tpl->tpl_vars['team'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['team']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['team']->value) {
$_smarty_tpl->tpl_vars['team']->_loop = true;
$__foreach_team_0_saved_local_item = $_smarty_tpl->tpl_vars['team'];
?>
                                                <h6 class="EquipeAdmin" value="<?php echo $_smarty_tpl->tpl_vars['team']->value['id_equipes'];?>
"><?php echo $_smarty_tpl->tpl_vars['team']->value['nom'];?>
</h6>
                                            <?php
$_smarty_tpl->tpl_vars['team'] = $__foreach_team_0_saved_local_item;
}
if ($__foreach_team_0_saved_item) {
$_smarty_tpl->tpl_vars['team'] = $__foreach_team_0_saved_item;
}
?>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="listeEquipeJoueurAdmin"></div>
                                        <input id="submitNewPlayerInTeam" type="button" value="Ajouter un joueur" style="display: none;">
                                    </td>
                                </tr>
                                <tr>
                                    <td  colspan="2" style="font-size: 16px; font-weight: bold; color: #fff;">
                                        Informations du joueur
                                    </td>
                                </tr>
                                <tr>
                                    <td  colspan="2">
                                        <div id="InfoJoueurEquipes" style="height:250px;"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>        
                    </fieldset>

                    <fieldset>
                        <legend>Ajouter une équipe</legend>
                        <div id="creerTeamAdmin" >
                            <label for="Team">Nom de la team :</label>
                            <input type="text" name="Team" id="Team"><br />

                            <div id="pseudoboxTeam" style="border: none; margin: 0px; padding: 0px"></div>

                            <label for="TagTeam">Tag de la team :</label>
                            <input type="text" name="TagTeam" id="TagTeam"><br />
                            <div id="pseudoboxTagTeam" style="border: none; margin: 0px; padding: 0px"></div>

                            <label for="new_psw_equipe">Mot de passe : </label>
                            <input type="password" name="new_psw_equipe" id="new_psw_equipe" /><br/>
                            <label for="new_psw_equipe2">Confirmer mot de passe : </label>
                            <input type="password" name="new_psw_equipe2" id="new_psw_equipe2" />
                        </div>
                        <div id="erreurNewTeamAdmin" style="height: auto;"></div>
                        <input type="button" id="submitCreerNewEquipeAdmin" value="Ajouter l'équipe">
                    </fieldset>
                    <div id="infoEquipeAdmin" style="display: none"></div>
                </div>
            </div>

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
