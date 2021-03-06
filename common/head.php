<?php

session_start();
require_once(dirname(__FILE__).'/var.conf.php');


require_once(DOCUMENT_ROOT.'/common/utils.php');
require_once(DOCUMENT_ROOT.'/class/Database.class.php');
require_once(DOCUMENT_ROOT.'/class/Auth.class.php');
require_once(DOCUMENT_ROOT.'/class/Query.class.php');
require_once(DOCUMENT_ROOT.'/class/Smarty_HEHLan.class.php');


// Variables
$connected = false;
$database = new Database();
$smarty = new Smarty_HEHLan();

// Test if a user is connected
$connected = Auth::isLogged();
if($connected){
	$ics = $_SESSION['id_joueur'];
}
elseif(preg_match('#login#i',$_SERVER['REQUEST_URI'])==0){
	header('Location: '.WEB_ROOT.'/modules/login.php');
}
else{
	
	$ics = 0;
}

// Notif last seen
$lastSeenNotif = $database->getLastNotifJoueur($ics);

// Assign variables to view
$smarty->assign('connected', $connected);
$smarty->assign('con', $connected);
$smarty->assign('next_matches', $database->getNextMatches($connected));
$smarty->assign('navTournois', $database->getNavTournois()); 
$smarty->assign('lastSeenNotif', $connected);
$smarty->assign('id_current_session', $ics);
?>