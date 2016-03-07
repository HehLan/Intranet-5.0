{* Smarty *}
<!DOCTYPE html>
<html lang="fr">
    <head>
        {include file="default/meta.tpl"} 
        <link rel="stylesheet" type="text/css" href="{#assets#}/css/index.css" />
        <script type="text/javascript" src="{#domain#}/src/js/jquery.js"></script>
        <script type="text/javascript" src="{#domain#}/src/js/getXhr.js"></script>
        <script type="text/javascript">
            function news_toggle(idn)
            {
                var nom = '#contenu_news_' + idn;
                $(nom).toggle();
            }
        </script>
    </head>
    <body role="document">
        {include file="default/header.tpl" con=$con next_matches=$next_matches}
        {include file="default/nav.tpl"  con=$con navTournois=$navTournois}
        <div id="container" class="container-fluid">
            <div class="row">
                <div id="bloc_news" class="col-lg-6 col-xs-12">
                    <h3>News</h3>
                    {section name=sec1 loop=$newsList}
                        <div class="une_news" id="bloc_news_{$newsList[sec1].id_news}">
                            <div class="titre_news" id="titre_news_{$newsList[sec1].id_news}" onclick="news_toggle({$newsList[sec1].id_news});">
                                {$newsList[sec1].titre|nl2br}
                                <div class="date_news" id="footer_news_{$newsList[sec1].id_news}">
                                    {$newsList[sec1].quand}
                                </div>
                            </div>
                            <div class="contenu_news" id="contenu_news_{$newsList[sec1].id_news}">
                                {$newsList[sec1].texte|nl2br}
                            </div>
                        </div>
                    {/section}
                </div>		
                <div id="bloc_chat" class="col-lg-6 col-xs-12">
                    {if $con}
                        <h3>HEHLan Chat</h3>
                        {if $chat}
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
                        {else}
                            <div id="bloc_chat_texte">			
                                <strong>Sorry les gars ... le chat est désactivé :o/</strong>
                            </div>
                        {/if}
                    {else}
                        <h3 id="bloc_chat_titre">Connexion</h3>	
                        <div id="row bloc_connexion">
                            <form class="well col-lg-8" method="POST" id="bloc_connexion_form">
                                <fieldset id="bloc_connexion_fieldset">
                                    <div class="form-group">
                                        <label for="login">Login </label>
                                        <input id="login" class="form-control" type="text" name="login">  
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Password </label>
                                        <input id="pwd" class="form-control" type="password" name="pwd">  
                                    </div>
                                    <button class="btn btn-primary" type="submit">Log on</button>
                                </fieldset>                           
                            </form>                            
                        </div>
                    {/if}
                </div>
            </div>			
        </div>
        {include file="default/footer.tpl"}
        {if $chat}
            <script type="text/javascript">
                $("#bloc_chat_message").keyup(function (event)
                {
                    if (event.keyCode === 13)
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