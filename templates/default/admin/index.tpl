{* Smarty *}
<!DOCTYPE html>
<html lang="fr">
    <head>
        {include file="meta.tpl"} 
        <script type="text/javascript" src="{#domain#}/assets/js/jquery.js"></script>
        <script type="text/javascript" src="{#domain#}/assets/js/jquery-ui.js"></script>
        <script type="text/javascript" src="{#domain#}/assets/js/getXhr.js"></script>
        <script type="text/javascript" src="{#domain#}/assets/js/admin_index.js"></script>		
    </head>

    <body role="document">	
        {include file="header.tpl" con=$con next_matches=$next_matches}
        {include file="nav.tpl"  con=$con navTournois=$navTournois}

        <?php require_once('modules/menuTop.php'); ?>

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
                                            try {

                                            while($equipes=$requete_preparee->fetch(PDO::FETCH_ASSOC)) 
                                            {
                                            echo'
                                            <h6 class="EquipeAdmin" value="'.$equipes["id_equipes"].'">'.$equipes["nom"].'</h6>
                                            ';
                                            }

                                            }

                                            catch(PDOException $e) {
                                            echo 'Base de données est indisponible pour le moment!';
                                            }

                                            ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="listeEquipeJoueurAdmin">

                                        </div>
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
                                        <div id="InfoJoueurEquipes" style="height:250px;">

                                        </div>
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


        {include file="footer.tpl"}
        {if $chat}
            <script type="text/javascript">
                $("#bloc_chat_message").keyup(function (event)
                {
                    if (event.keyCode == 13)
                    {
                        $("#bloc_chat_bouton").click();
                    }
                });

                afficher(0);
                users();
            </script>
        {/if}
    </body>
</html>