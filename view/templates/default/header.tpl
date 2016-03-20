{* Smarty *}
<header id="header" class="row" >
    <div id="logo" class="col-lg-9 col-sm-9 col-xs-12" >
        <a href="index.php">
            <img src="{#assets#}/img/logoheh.png" alt="HEHLan" width="250px">
        </a>
    </div>
    <div id="login" class="col-lg-3 col-sm-3 col-xs-12" >
        {if $con}
            <p>Bienvenue {$smarty.session.login} !</p>
			<div id="userbar" class="" >
				<a href="profile.php"><img src="{#assets#}/img/userbar/profile.png" alt="Votre profil" data-toggle="tooltip" data-placement="bottom" title="Votre profil"></a>
				<a href="#" id="notifBlock"
					data-container="body" data-toggle="popover" data-placement="bottom" title="Vos notifications" data-content='<div id="notifPane">Aucune notification</div>'>
					<img src="{#assets#}/img/userbar/notif_off.png" alt="Vos Notifications" data-toggle="tooltip" data-placement="bottom" title="Vos notifications">
					<!--<div id="notifPane" notif-lastUpdate="0" class="fade bottom in"> 
						<div class="arrow" style="left:50%;"></div>
						<h3 class="popover-title">Vos notifications</h3>
						<div class="popover-content" id="notifBox">
							Aucune notification trouvée
						</div>
					</div>-->
				</a>
				<a href="#" class=""
					data-container="body" data-toggle="popover" data-placement="bottom" title="Votre adresse IP est" data-content="{$smarty.server.REMOTE_ADDR}">
					<img src="{#assets#}/img/userbar/ip.png" alt="Votre adresse IP" data-toggle="tooltip" data-placement="bottom" title="Votre adresse IP">
				</a>
				<a href="commande.php"><img src="{#assets#}/img/userbar/command.png" alt="Passer une commande" data-toggle="tooltip" data-placement="bottom" title="Passer une commande"></a>
				<a href="common/logout.php"><img src="{#assets#}/img/userbar/logout.png" alt="Se déconnecter" data-toggle="tooltip" data-placement="bottom" title="Se déconnecter"></a>
			</div>
			
        {else}
            <p>Bienvenue, <a href="{#domain#}/modules/login.php">se connecter</a></p>
        {/if}
        {if $con & isset($next_matches) & !empty($next_matches)}
            <strong>Prochains matchs</strong><br>
            {section name=sec1 loop=$next_matches}
                {$next_matches[sec1].jour} {$next_matches[sec1].heure} {$next_matches[sec1].nom}<br>
            {/section}
        {/if}       
    </div>	     
</header>
